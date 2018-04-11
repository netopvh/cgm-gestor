let gulp = require('gulp');
let concat = require('gulp-concat');
let cleanCss = require('gulp-clean-css');
let uglify = require('gulp-uglify');
let less = require('gulp-less');
let rename = require('gulp-rename');

const PATH = 'resources/assets/';
const PATH_TEMPLATE = PATH + 'template/';
const PATH_SCRIPT = PATH + 'js/actions/';

/**
 * CSS
 */

gulp.task('styles', function () {
    return gulp.src([
        PATH_TEMPLATE + 'less/_main_full/bootstrap.less',
        PATH_TEMPLATE + 'less/_main_full/core.less',
        PATH_TEMPLATE + 'less/_main_full/components.less',
        PATH_TEMPLATE + 'less/_main_full/colors.less'
    ])
        .pipe(less())
        .pipe(concat('all.min.css'))
        .pipe(cleanCss())
        .pipe(gulp.dest('public/css'))
});

gulp.task('icons', function () {
   return gulp.src([
       PATH_TEMPLATE + 'icons/icomoon/styles.css'
   ])
       .pipe(rename('fonts.min.css'))
       .pipe(cleanCss())
       .pipe(gulp.dest('public/css'))
});

/**
 * JAVASCRIPT
 */
gulp.task('scripts', function () {
    gulp.src([
        PATH_TEMPLATE + 'js/core/libraries/jquery.min.js',
        PATH_TEMPLATE + 'js/core/libraries/bootstrap.min.js',
        PATH_TEMPLATE + 'js/plugins/http/axios/dist/axios.js',
        PATH_TEMPLATE + 'js/plugins/ui/ripple.min.js',
        PATH_TEMPLATE + 'js/plugins/ui/nicescroll.min.js',
        PATH_TEMPLATE + 'js/core/app.js',
        PATH_TEMPLATE + 'js/pages/layout_fixed_custom.js',
        PATH_TEMPLATE + 'js/plugins/tables/datatables/datatables.min.js',
        PATH_TEMPLATE + 'js/plugins/tables/datatables/extensions/responsive.min.js',
        PATH_TEMPLATE + 'js/plugins/tables/datatables/extensions/buttons.min.js',
        PATH_TEMPLATE + 'js/plugins/forms/selects/select2.min.js',
        PATH_SCRIPT + 'users.js'
    ])
        .pipe(concat('bundle.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('public/js'))
});

/**
 * OTHER FILES
 */

gulp.task('fonts', function () {
    return gulp.src([
        PATH_TEMPLATE + 'icons/fontawesome/fonts/*',
        PATH_TEMPLATE + 'icons/glyphicons/*',
        PATH_TEMPLATE + 'icons/icomoon/fonts/*',
        PATH_TEMPLATE + 'icons/summernote/*',
    ])
        .pipe(gulp.dest('public/fonts'))
});

gulp.task('images', function () {
    return gulp.src([
        PATH_TEMPLATE + 'images/**/**'
    ])
        .pipe(gulp.dest('public/images'))
});


//gulp.task('default',['styles','scripts','icons','fonts','images']);
gulp.task('default',['scripts']);
