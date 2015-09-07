var postcss = require('gulp-postcss');
var gulp = require('gulp');
var autoprefixer = require('autoprefixer');
var mqpacker = require('css-mqpacker');
var csswring = require('csswring');
var gutil = require('gulp-util');
var opacity = function (css, opts) {
    css.eachDecl(function(decl) {
        if (decl.prop === 'opacity') {
            decl.parent.insertAfter(decl, {
                prop: '-ms-filter',
                value: '"progid:DXImageTransform.Microsoft.Alpha(Opacity=' + (parseFloat(decl.value) * 100) + ')"'
            });
        }
    });
};

gulp.task('css', function () {
    var processors = [
        autoprefixer({browsers: ['last 1 version']}),
        csswring
    ];
    return gulp.src('src/*.css')
          .pipe(postcss(processors))
          .pipe(gulp.dest('dest'));
});

gulp.task('admin', function () {
    var processors = [
        autoprefixer({browsers: ['> 1%']}),
        opacity,
        csswring
    ];
    return gulp.src('./src/admin/*.css')
          .pipe(postcss(processors))
          .pipe(gulp.dest('./public_html/admin/css/'));
});

gulp.task('site', function () {
    var processors = [
        autoprefixer({browsers: ['> 1%']}),
        opacity,
        csswring
    ];
    return gulp.src('/src/site/*.css')
          .pipe(postcss(processors))
          .pipe(gulp.dest('/public_html/css/'));
});