import hasha from "hasha";

const glob = require('glob-fs')({gitignore: true});
const fs = require('fs');
const path = require('path');

/**
 * Format bytes as human-readable text.
 *
 * @param bytes Number of bytes.
 * @param si True to use metric (SI) units, aka powers of 1000. False to use
 *           binary (IEC), aka powers of 1024.
 * @param dp Number of decimal places to display.
 *
 * @return Formatted string.
 */
function humanFileSize(bytes, si = false, dp = 1) {
    const thresh = si ? 1000 : 1024;

    if (Math.abs(bytes) < thresh) {
        return bytes + ' B';
    }

    const units = si
        ? ['kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB']
        : ['KiB', 'MiB', 'GiB', 'TiB', 'PiB', 'EiB', 'ZiB', 'YiB'];
    let u = -1;
    const r = 10 ** dp;

    do {
        bytes /= thresh;
        ++u;
    } while (Math.round(Math.abs(bytes) * r) / r >= thresh && u < units.length - 1);


    return bytes.toFixed(dp) + ' ' + units[u];
}

const inProduction = () => process.env.BUILD === 'production';

const removeOldFiles = (dir, filename) => {
    const oldFiles = glob.readdirSync(filename.replace(/(\.(.*))$/gm, `.*$&`), {cwd: path.resolve(dir)});
    Array.from(oldFiles).forEach(file => {
        if (String(file).match(/(.*)-nomodule(.*)/gm)) {
            return;
        }
        fs.unlinkSync(path.resolve(dir, file));
    });
}

const addToManifest = (manifestFile, fullPath, newPath) => {
    const manifest = JSON.parse(fs.readFileSync(manifestFile).toString('utf-8'));
    const relativeManifestUrl = fullPath.replace(path.dirname(manifestFile), '');
    manifest[relativeManifestUrl] = newPath.replace(path.dirname(manifestFile), '');
    fs.writeFileSync(manifestFile, JSON.stringify(manifest));
}
const stats = (bundle, dir) => {
    const sizes = [];
    Object.keys(bundle).forEach(filename => {
        const fullPath = path.resolve(dir, filename);
        const stats = fs.statSync(fullPath);

        sizes.push({Filename: filename, Size: humanFileSize(stats.size)})
    });

    console.table(sizes);
}

const build = (opts = {}) => {
    const pluginOptions = Object.assign({}, opts);
    const manifestFile = path.resolve('./', pluginOptions.manifestFile);
    return {
        name: 'build',
        writeBundle: function (options, bundle) {
            const dir = options.dir;
            stats(bundle, dir);
            Object.keys(bundle).forEach(filename => {
                const data = bundle[filename];
                if (data.type === 'asset' || !data.isEntry) return;

                const fullPath = path.resolve(dir, filename);

                if (!inProduction()) {
                    addToManifest(manifestFile, fullPath, fullPath);
                    return;
                }

                removeOldFiles(dir, filename);


                const hash = hasha(data.code, {algorithm: 'md5'}).substr(0, 20);
                const newFilename = filename.replace(/(\.(.*))$/gm, `.${hash}$&`);
                const newPath = path.resolve(dir, newFilename);

                addToManifest(manifestFile, fullPath, newPath);
                fs.renameSync(fullPath, newPath);
            });
        }
    }
}

const writeCSS = (config) => {
    return function (styles, nodes) {
        Object.keys(nodes).forEach(file => {
            const filename = String(path.basename(file)).replace(/(\.(.*))$/gm, '.css');
            const fullPath = path.resolve(config.dir, filename);
            fs.writeFileSync(fullPath, nodes[file]);
        })
    }
}

export {writeCSS};

export default build;
