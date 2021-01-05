import babel from '@rollup/plugin-babel';
import {nodeResolve} from '@rollup/plugin-node-resolve';
import commonjs from '@rollup/plugin-commonjs';
import json from "@rollup/plugin-json";
import {terser} from "rollup-plugin-terser";
import build from "./rollup.build";

const isProduction = () => process.env.BUILD === 'production';
const entryFile = process.env.BUILD_FILE || 'resources/js/portfolio.js';

const plugins = [
    json(),
    commonjs(),
    nodeResolve({jsnext: true, preferBuiltins: true, browser: true}),
    babel({babelHelpers: 'bundled', exclude: ['node_modules/**']}),
];

if (isProduction()) {
    plugins.push(terser());
}

plugins.push(build({manifestFile: 'public/assets/mix-manifest.json'}));

export default {
    input: entryFile,
    output: {
        dir: 'public/assets/js/',
        format: 'es',
    },
    plugins
}
