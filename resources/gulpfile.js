const gulp = require("gulp");
const plumber = require("gulp-plumber");
const sass = require("gulp-sass");
const postcss = require("gulp-postcss");
const autoprefixer = require("autoprefixer");
const groupmq = require("gulp-group-css-media-queries");
const bs = require("browser-sync");
const cleanCSS = require("gulp-clean-css");
var rename = require("gulp-rename");
var concat = require("gulp-concat");
const minify = require("gulp-minify");
const { task } = require("gulp");

const SASS_SOURCES = ["style.scss"];

/**
 * Compile Sass files
 */ gulp.task("css", () =>
  gulp
    .src(SASS_SOURCES, { base: "./" })
    .pipe(plumber())
    .pipe(
      sass({
        indentType: "tab",
        indentWidth: 1,
        outputStyle: "compressed",
      })
    )
    .on("error", sass.logError)
    .pipe(
      postcss([
        autoprefixer({
          browsers: ["last 2 versions"],
          cascade: false,
        }),
      ])
    )
    .pipe(cleanCSS({ compatibility: "ie8" }))
    .pipe(
      rename({
        basename: "build_styles",
        suffix: ".min",
      })
    )
    .pipe(gulp.dest("../public/css/"))
    .pipe(bs.stream())
);


// Minifies JS into build file
gulp.task("js", function () {
  return gulp
    .src(["js/*.js"])
    .pipe(concat("main.js"))
    .pipe(minify())
    .pipe(gulp.dest("../js"));
});

function minifyCSS(){
  gulp
    .src(SASS_SOURCES, { base: "./" })
    .pipe(plumber())
    .pipe(
      sass({
        indentType: "tab",
        indentWidth: 1,
        outputStyle: "compressed",
      })
    )
    .on("error", sass.logError)
    .pipe(
      postcss([
        autoprefixer({
          browsers: ["last 2 versions"],
          cascade: false,
        }),
      ])
    )
    .pipe(cleanCSS({ compatibility: "ie8" }))
    .pipe(
      rename({
        basename: "build_styles",
        suffix: ".min",
      })
    )
    .pipe(gulp.dest("../public/css/"))
    .pipe(bs.stream())
}


function watch() {
  gulp.watch(
    [
      "../blocks/**/*.scss",
      "scss/**/*.scss",
    ],
    minifyCSS
  );
}

task(watch)