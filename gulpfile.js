var gulp = require('gulp'),
      gutil = require('gulp-util'),
      uglify = require('gulp-uglify'),
      concat = require('gulp-concat'),
      minifyCSS = require('gulp-minify-css');

/*Create a variable array holding all the source file paths*/
var jsSources = [
'old/js/main.js',
'old/js/myapp.js',
'old/js/controllers/meetings.js',
'old/js/controllers/registration.js',
];

/*Create a variable array holding all the source file paths*/
var cssSources = [
'old/css/main.css',
'old/css/responsive.css',
'old/css/transitions.css',
];

/*Task2 - Create a compile task to compile, concat and minify all the js in the components folder*/
gulp.task('compile', function(){ /*Name of the task is 'compile' */
gulp.src(jsSources)
.pipe(uglify()) /*uglify can also take inputs - www.gulpjs.com*/
.pipe(gulp.dest('final/js')) /*Store the destination inside the js folder*/
});/*end of the task compile*/


/*Task2.5 - Create a process task to concat and minify all the css into the css folder*/
gulp.task('process', function(){
gulp.src(cssSources)
.pipe(minifyCSS({keepBreaks:true}))
.pipe(gulp.dest('final/css'))
});/*end of the process task function*/

gulp.task('default', ['process', 'compile']);/*end of the task default*/