module.exports = function(grunt) {
  return {
    pkg: grunt.file.readJSON('package.json'),
    compass: {
      oldstyle: {
        options: {
          sassDir: 'sass/old',
          cssDir: 'css',
          imagesPath: 'img',
          outputStyle: 'compact',
          noLineComments: true
        }
      },
      newstyle: {
        options: {
          sassDir: 'sass/new',
          cssPath: './css',
          cssDir: 'css',
          imagesPath: './img',
          imagesDir: 'img',
          outputStyle: 'expanded',
          relativeAssets: true,
          httpPath: '',
          noLineComments: false
        }
      }
    },
    watch: {
      sass: {
        files: 'sass/**/*.scss',
        tasks: ['compass:newstyle'],
        options: {
          livereload: true
        }
      }
    },
    jshint: {
      files: [
        '*.js',
        'grunt/**/*.js'
      ],
      options: {
        curly: true,
        eqeqeq: true,
        immed: true,
        latedef: true,
        newcap: true,
        noarg: true,
        sub: true,
        undef: true,
        unused: true,
        boss: true,
        eqnull: true,
        browser: true,
        es3: true,
        globals: {
          jQuery: true,
          module: false,
          require: false,
          console: false
        }
      }
    },
    styleguide: {
      dist: {
        options: {
          framework: {
            name: 'kss'
          },
          template: {
            src: 'docs/templates/styleguide',
            include: ''
          }
        },
        files: {
          'docs/styleguide': 'sass/new/*.scss'
        }
      }
    },
    clean: {
      docs: ['docs/styleguide']
    },
    viewdocs: {
      dev: {
        options: {
          port: 9002,
          base: 'docs/styleguide'
        }
      }
    },
    modernizr: {
      devFile: 'js/components/modernizr/modernizr.js',
      outputFile: 'js/vendor/modernizr.js',
      extra: {
        shiv: false,
        printshiv: false,
        load: false,
        mq: false,
        cssclasses: true
      },
      extensibility: {
        addtest: false,
        prefixed: false,
        teststyles: false,
        testprops: false,
        testallprops: false,
        hasevents: false,
        prefixes: false,
        domprefixes: false
      },
      uglify: true,
      parseFiles: false
    },
    copy: {
      docs: {
        files: [
          {
            src: ['css/**/*'],
            dest: 'docs/templates/styleguide/public/'
          },
          {
            src: ['img/**/*'],
            dest: 'docs/templates/styleguide/public/'
          }
        ]
      }
    }
  };
};