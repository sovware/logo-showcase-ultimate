/* import necessary npm packages */
const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const sourcemaps = require('gulp-sourcemaps');
const autoPrefixer = require('gulp-autoprefixer');
src = {
        'scss': './assets/css/style.scss'
}

dest = {
        'css': './assets/css/'
}


function styleCss(done) {
        var styleScss = [
                './assets/css/style.scss'
        ];
        gulp.src(styleScss)
                .pipe(sourcemaps.init())
                .pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
                .pipe(autoPrefixer('last 10 versions'))
                .pipe(gulp.dest(dest.css))
        done();
}
gulp.task('allTask', gulp.series(styleCss));
/*-- Watch --*/
function watchFiles() {
        gulp.watch(src.scss, gulp.series(styleCss));
}

gulp.task('default', gulp.series('allTask',gulp.parallel(watchFiles)));

