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

gulp.task('admin', function () {
    var processors = [
        autoprefixer({browsers: ['> 1%']}),
        opacity,
        csswring
    ];
    return gulp.src('src/admin/**/*.css')
          .pipe(postcss(processors))
          .pipe(gulp.dest('public_html/admin_theme/'));
});

gulp.task('site', function () {
    var processors = [
        autoprefixer({browsers: ['> 1%']}),
        opacity,
        csswring
    ];
    return gulp.src('src/site/**/*.css')
          .pipe(postcss(processors))
          .pipe(gulp.dest('public_html/'));
});