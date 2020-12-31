import babel from '@rollup/plugin-babel';
import {nodeResolve} from '@rollup/plugin-node-resolve';
import commonjs from '@rollup/plugin-commonjs';
import json from "@rollup/plugin-json";
import {terser} from "rollup-plugin-terser";
import build from "./rollup.build";
import multi from '@rollup/plugin-multi-entry';

const isProduction = () => process.env.BUILD === 'production';


const plugins = [
    multi({entryFileName: 'portfolio.js'}),
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
    input: ['resources/js/portfolio.js'],
    output: {
        dir: 'public/assets/js/',
        format: 'es',
    },
    plugins
}
