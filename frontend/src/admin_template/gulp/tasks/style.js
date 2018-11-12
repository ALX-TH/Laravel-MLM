import gulp from 'gulp';
import rename from 'gulp-rename';
import sass from 'gulp-sass';
import minifycss from 'gulp-minify-css';
import autoprefixer from 'gulp-autoprefixer';
import conf from '../utils/conf';

const style = () => {
    return gulp.src(conf.SCSS_TOOLKIT_SOURCES)
        .pipe(sass({
            outputStyle: 'nested',
            precision: 10,
            onError: console.error.bind(console, 'Sass error:')
        }))
        .pipe(autoprefixer())
        .pipe(minifycss({
            keepSpecialComments: false,
            keepBreaks: true,
            processImport: false
        }))
        .pipe(rename({
            extname: '.min.css'
        }))
        .pipe(gulp.dest(conf.CSS_DIST));
};

export default style;