import gulp from 'gulp';
import rename from 'gulp-rename';
import babel from 'gulp-babel';
import uglify from "gulp-uglify";
import sourcemaps from 'gulp-sourcemaps';
import rigger from 'gulp-rigger';
import conf from '../utils/conf';

const scripts = callback => {

    return gulp.src(conf.JS_TOOLKIT_SOURCES)
        .pipe(babel({ presets: ['es2017'] }))
        .pipe(rigger())
        .pipe(sourcemaps.init())
        .pipe(uglify())
        .pipe(sourcemaps.write())
        .pipe(rename({ extname: '.min.css'}))
        .pipe(gulp.dest(conf.JS_DIST));


};

export default scripts;