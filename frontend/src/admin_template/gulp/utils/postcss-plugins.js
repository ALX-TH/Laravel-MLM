module.exports = [
    require('postcss-partial-import')(),
    require('postcss-nested')(),
    require('postcss-advanced-variables')(),
    require('postcss-selector-matches')(),
    require('autoprefixer')({browsers: 'last 15 versions'}),
    require('postcss-inline-svg')(),
    require('postcss-size')(),
    require('postcss-position')(),
    require('postcss-automath')(),
    require('postcss-assets')({
        loadPaths: ['img/', 'fonts/'],
        relative: 'css/',
        basePath: 'dist/'
    }),
    require('postcss-sassy-mixins')(),
    require('postcss-css-variables')(),
];
