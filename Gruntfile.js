module.exports = function (grunt) {
  // Load Grunt tasks declared in the package.json file
  require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    // VERSION INFO

    WebApp: 'Synthesise 2.1.1',

    // CONCENTRATE AND MINIFY JAVASCRIPT

    uglify: {

      init: {
        options: {
          banner: '/*! <%= pkg.name %> Init Script <%= grunt.template.today("dd-mm-yyyy") %> */\n'
        },
        files: {
          'public/js/init.min.js': ['bower_components/modernizr/modernizr.js', 'bower_components/respond/respond.src.js']
        }
      },

      plugins: {
        options: {
          banner: '/*! <%= pkg.name %> jQuery Plugins <%= grunt.template.today("dd-mm-yyyy") %> */\n'
        },
        files: {
          'public/js/plugins.min.js': [
           'bower_components/html5-boilerplate/js/plugins.js',
           'bower_components/bootstrap/js/alert.js',
           'bower_components/bootstrap/js/collapse.js',
           'bower_components/bootstrap/js/dropdown.js',
           'bower_components/bootstrap/js/tooltip.js',
           'bower_components/bootstrap/js/transition.js'
           ]
        }
      },

      iframe: {
        options: {
          banner: '/*! <%= pkg.name %> jQuery iFrame Fix <%= grunt.template.today("dd-mm-yyyy") %> */\n'
        },
        files: {
          'public/js/iframe.min.js': ['bower_components/iframe-resizer/src/iframeResizer.js']
        }
      },

      add2home: {
        options: {
          banner: '/*! <%= pkg.name %> add2Home function <%= grunt.template.today("dd-mm-yyyy") %> */\n'
        },
        files: {
          'public/js/add2home.min.js': ['bower_components/add-to-homescreen/src/addtohomescreen.js']
        }
      },

      interactiveVideo: {
        options: {
          banner: '/*! <%= pkg.name %> Interactive Video <%= grunt.template.today("dd-mm-yyyy") %> */\n'
        },
        files: {
          'public/js/interactive-videos.js': ['app/assets/coffee/interactive-videos.js']
        }
      }


    },

    // CONCENTRATE AND MINIFY COFFEESCRIPT

    coffee: {
      compile: {
        files: {
          'app/assets/coffee/interactive-videos.js': 'app/assets/coffee/interactive-videos.coffee'
        }
      }
    },

    // CONCENTRATE AND MINIFY LESS & CSS

    less: {
      main: {
        options: {
          paths: ['app/assets/less/', 'bower_components/bootstrap/less/'],
          cleancss: true
        },
        files: {
          'public/css/main.css': 'app/assets/less/main.less'
        }
      },

      add2home: {
        options: {
          cleancss: true
        },
        files: {
          'public/css/add2home.css': 'bower_components/add-to-homescreen/style/addtohomescreen.css'
        }
      },
      
      animate: {
        options: {
          cleancss: true
        },
        files: {
          'public/css/animate.css': 'bower_components/animate.css/animate.css'
        }
      }

    },


    // COPY FILES

    copy: {
      main: {
        files: [
          // inculde jQuery
          {
            expand: true,
            flatten: true,
            src: ['bower_components/jquery/dist/jquery.min.js'],
            dest: 'public/js/vendor/'
          },

          // includes Flowplayer
          {
            expand: true,
            cwd: 'bower_components/',
            src: ['flowplayer/**'],
            dest: 'public/'
          }
        ]
      },
      livereload: {
        files: [
          {
            expand: true,
            flatten: true,
            cwd: 'bower_components/',
            src: ['livereload/dist/livereload.js'],
            dest: 'public/js'
          }
        ]
      }
    },

    // WATCH FILES AND RELOAD BROWSER

    watch: {
      scripts: {
        files: ['app/assets/coffee/*.coffee'],
        tasks: ['compile:coffee']
      },

      less: {
        files: ['app/assets/less/*.less'],
        tasks: ['compile:less']
      },
      tests: {
        files: ['tests/unit/*.php', 'tests/functional/*.php', 'app/models/*.php', 'app/controllers/*.php', 'app/views/*.php', 'app/classes/*.php', 'app/*.php'],
        tasks: ['shell:runtests']
      },
      livereload: {
        options: { livereload: true },
        files: ['public/**','app/models/*.php', 'app/controllers/*.php', 'app/views/**', 'app/classes/*.php', 'app/*.php']
      },
    },

    // grunt-open will open your browser at the project's URL
    open: {
      all: {
        // Gets the port from the connect configuration
        path: 'http://synthesise.local:8000'
      }
    },

    // CLEAN UP

    clean: {
      scripts: {
        src: 'app/assets/coffee/*.js'
      }
    },

    // SERVER CONFIG

    secret: grunt.file.readJSON('secret.json'),

    localDir: '/Users/fabianmundt/Dropbox/Inventionate/Projekte/Synthesise\\ 3',

    // SFTP DEPLOY


    shell: {

      server: {
        command: [
       "/Applications/AMPPS/mysql/support-files/mysql.server start",
       "php artisan serve"
     ].join('&&')
      },

      createFilesystem: {
        command: "sshpass -p <%= secret.password %>  sftp  <%= secret.username %>@<%= secret.host %> <<< $'mkdir synthesise\n mkdir public_html\n exit'"
      },
      
      runtests: {
        command: "vendor/bin/codecept run"
      },

      deployAll: {
        command: [
       // SYNTHESISE 2 CORE FILES AND FOLDERS
       "sshpass -p <%= secret.password %> scp -r <%= localDir %>/app <%= secret.username %>@<%= secret.host %>:synthesise",
       "sshpass -p <%= secret.password %> scp <%= localDir %>/artisan <%= secret.username %>@<%= secret.host %>:synthesise",
       "sshpass -p <%= secret.password %> scp -r <%= localDir %>/bootstrap <%= secret.username %>@<%= secret.host %>:synthesise",
       "sshpass -p <%= secret.password %> scp -r <%= localDir %>/bower_components <%= secret.username %>@<%= secret.host %>:synthesise",
       "sshpass -p <%= secret.password %> scp <%= localDir %>/bower.json <%= secret.username %>@<%= secret.host %>:synthesise",
       "sshpass -p <%= secret.password %> scp <%= localDir %>/CHANGELOG.md <%= secret.username %>@<%= secret.host %>:synthesise",
       "sshpass -p <%= secret.password %> scp <%= localDir %>/codeception.yml <%= secret.username %>@<%= secret.host %>:synthesise",
       "sshpass -p <%= secret.password %> scp <%= localDir %>/composer.json <%= secret.username %>@<%= secret.host %>:synthesise",
       "sshpass -p <%= secret.password %> scp <%= localDir %>/composer.lock <%= secret.username %>@<%= secret.host %>:synthesise",
       "sshpass -p <%= secret.password %> scp <%= localDir %>/composer.phar <%= secret.username %>@<%= secret.host %>:synthesise",
       "sshpass -p <%= secret.password %> scp <%= localDir %>/Gruntfile.js <%= secret.username %>@<%= secret.host %>:synthesise",
       "sshpass -p <%= secret.password %> scp -r <%= localDir %>/node_modules <%= secret.username %>@<%= secret.host %>:synthesise",
       "sshpass -p <%= secret.password %> scp <%= localDir %>/package.json <%= secret.username %>@<%= secret.host %>:synthesise",
       "sshpass -p <%= secret.password %> scp <%= localDir %>/phpunit.xml <%= secret.username %>@<%= secret.host %>:synthesise",
       "sshpass -p <%= secret.password %> scp -r <%= localDir %>/scripts <%= secret.username %>@<%= secret.host %>:synthesise",
       "sshpass -p <%= secret.password %> scp <%= localDir %>/secret.json <%= secret.username %>@<%= secret.host %>:synthesise",
       "sshpass -p <%= secret.password %> scp <%= localDir %>/server.php <%= secret.username %>@<%= secret.host %>:synthesise",
       "sshpass -p <%= secret.password %> scp -r <%= localDir %>/vendor <%= secret.username %>@<%= secret.host %>:synthesise",
       // PUBLIC FOLDER
       "sshpass -p <%= secret.password %>  scp -r <%= localDir %>/public/* <%= secret.username %>@<%= secret.host %>:public_html"
     ].join('&&')
      },

      storagePermissions: {
        command: "sshpass -p <%= secret.password %> ssh <%= secret.username %>@<%= secret.host %> <<< $'chmod -R 777 synthesise/storagechm\n exit'"
      },

      deployPublic: {
        command: "sshpass -p <%= secret.password %> scp -r <%= localDir %>/public/* <%= secret.username %>@<%= secret.host %>:public_html"
      },

      deployViews: {
        command: "sshpass -p <%= secret.password %> scp -r <%= localDir %>/app/views <%= secret.username %>@<%= secret.host %>:synthesise/app"
      },

      deployControllers: {
        command: "sshpass -p <%= secret.password %> scp -r <%= localDir %>/app/controllers <%= secret.username %>@<%= secret.host %>:synthesise/app"
      },

      deployModels: {
        command: "sshpass -p <%= secret.password %> scp -r <%= localDir %>/app/models <%= secret.username %>@<%= secret.host %>:synthesise/app"
      },

      deployDatabase: {
        command: "sshpass -p <%= secret.password %> scp -r <%= localDir %>/app/database <%= secret.username %>@<%= secret.host %>:synthesise/app"
      },

      deployRoutes: {
        command: "sshpass -p <%= secret.password %> scp <%= localDir %>/app/routes.php <%= secret.username %>@<%= secret.host %>:synthesise/app"
      },

      deployConfig: {
        command: "sshpass -p <%= secret.password %> scp -r <%= localDir %>/app/config <%= secret.username %>@<%= secret.host %>:synthesise/app"
      },

      deployAssets: {
        command: [
          "sshpass -p <%= secret.password %> scp -r <%= localDir %>/app/assets <%= secret.username %>@<%= secret.host %>:synthesise/app",
          "sshpass -p <%= secret.password %> scp -r <%= localDir %>/public/css <%= secret.username %>@<%= secret.host %>:public_html",
          "sshpass -p <%= secret.password %> scp -r <%= localDir %>/public/js <%= secret.username %>@<%= secret.host %>:public_html",
          "sshpass -p <%= secret.password %> scp -r <%= localDir %>/public/fonts <%= secret.username %>@<%= secret.host %>:public_html",
          "sshpass -p <%= secret.password %> scp -r <%= localDir %>/public/img <%= secret.username %>@<%= secret.host %>:public_html",
          "sshpass -p <%= secret.password %> scp -r <%= localDir %>/public/flowplayer <%= secret.username %>@<%= secret.host %>:public_html"
        ].join('&&')
      },

      deployBower: {
        command: [
          "sshpass -p <%= secret.password %> scp -r <%= localDir %>/bower_components <%= secret.username %>@<%= secret.host %>:synthesise",
          "sshpass -p <%= secret.password %> scp <%= localDir %>/bower.json <%= secret.username %>@<%= secret.host %>:synthesise"
        ].join('&&')
      },

      deployGrunt: {
        command: [
          "sshpass -p <%= secret.password %> scp -r <%= localDir %>/node_modules <%= secret.username %>@<%= secret.host %>:synthesise",
          "sshpass -p <%= secret.password %> scp <%= localDir %>/package.json <%= secret.username %>@<%= secret.host %>:synthesise",
          "sshpass -p <%= secret.password %> scp <%= localDir %>/Gruntfile.js <%= secret.username %>@<%= secret.host %>:synthesise"
        ].join('&&')
      },

      options: {
        stdout: true,
        failOnError: true
      }

    },

    // NOTIFY

    notify: {
      less: {
        options: {
          title: 'Erfolgreich kompiliert',
          message: 'LESS wurde erfolgreich zu CSS kompiliert und komprimiert.'
        }
      },
      coffee: {
        options: {
          title: 'Erfolgreich kompiliert',
          message: 'CoffeeSCript wurde erfolgreich zu JavaScript kompiliert und komprimiert.'
        }
      },
      assets: {
        options: {
          title: 'Assets erfolgreich integriert',
          message: 'Bibliotheken und Erweiterungen von Dritten erfolgreich kopiert und optimiert.'
        }
      },
      deployAll: {
        options: {
          title: '<%= WebApp %> veröffentlicht',
          message: '<%= WebApp %> wurde erfolgreich auf <%= secret.host %> veröffentlicht.'
        }
      },

      deployPublic: {
        options: {
          title: '<%= WebApp %> aktualisiert',
          message: 'Der »Public« Ordner wurde auf <%= secret.host %> aktualisiert.'
        }
      },

      deployViews: {
        options: {
          title: '<%= WebApp %> aktualisiert',
          message: 'Die »Views« wurden auf <%= secret.host %> aktualisiert.'
        }
      },

      deployControllers: {
        options: {
          title: '<%= WebApp %> aktualisiert',
          message: 'Die »Controller« wurden auf <%= secret.host %> aktualisiert.'
        }
      },

      deployModels: {
        options: {
          title: '<%= WebApp %> aktualisiert',
          message: 'Die »Models« wurden auf <%= secret.host %> aktualisiert.'
        }
      },

      deployDatabase: {
        options: {
          title: '<%= WebApp %> aktualisiert',
          message: 'Die »Datenbank Seeds und Migrationen« wurden auf <%= secret.host %> aktualisiert.'
        }
      },

      deployRoutes: {
        options: {
          title: '<%= WebApp %> aktualisiert',
          message: 'Die »Routes« wurden auf <%= secret.host %> aktualisiert.'
        }
      },

      deployConfig: {
        options: {
          title: '<%= WebApp %> aktualisiert',
          message: 'Die »Konfigurationen« wurden auf <%= secret.host %> aktualisiert.'
        }
      },

      deployAssets: {
        options: {
          title: '<%= WebApp %> aktualisiert',
          message: 'Die »Assets« wurden auf <%= secret.host %> aktualisiert.'
        }
      },

      deployBower: {
        options: {
          title: '<%= WebApp %> aktualisiert',
          message: '»Bower« wurde auf <%= secret.host %> aktualisiert.'
        }
      },

      deployGrunt: {
        options: {
          title: '<%= WebApp %> aktualisiert',
          message: '»Grunt« wurde auf <%= secret.host %> aktualisiert.'
        }
      },

      watching: {
        options: {
          title: 'LiveReload Server gestartet',
          message: 'LESS und CoffeeScript werden automatisch kompiliert.'
        }
      }

    }

  });

  // DEFAULT
  grunt.registerTask('default', [
    'open'
  ]);

  // SERVER
  grunt.registerTask('server', [
    'open',
    'shell:server'
  ]);
  
  // RUN TESTS
  grunt.registerTask('test', [
    'watch:tests'
  ]);

  //  ASSET PUBLISH
  grunt.registerTask('asset:publish', [
    'copy',
    'uglify:init',
    'uglify:plugins',
    'uglify:iframe',
    'uglify:add2home',
    'less:main',
    'less:add2home',
    'less:animate',
    'notify:assets'
  ]);

  // LESS
  grunt.registerTask('compile:less', [
    'less:main',
    'notify:less'
  ]);

  // COFFEESCRIPT
  grunt.registerTask('compile:coffee', [
    'coffee:compile',
    'uglify:interactiveVideo',
    'clean:scripts',
    'notify:coffee'
  ]);

  // WATCH
  grunt.registerTask('serve:watch', [
    'open',
    'watch',
    'notify:watching'
  ]);

  // DEPLOY ALL
  grunt.registerTask('deploy:all', [
    'shell:createFilesystem',
    'shell:deployAll',
    'shell:storagePermissions',
    'notify:deployAll'
  ]);

  // DEPLOY PUBLIC
  grunt.registerTask('deploy:public', [
    'shell:deployPublic',
    'notify:deployPublic'
  ]);

  // DEPLOY VIEWS
  grunt.registerTask('deploy:views', [
    'shell:deployViews',
    'notify:deployViews'
  ]);

  // DEPLOY CONTROLLERS
  grunt.registerTask('deploy:controllers', [
    'shell:deployControllers',
    'notify:deployControllers'
  ]);

  // DEPLOY MODELS
  grunt.registerTask('deploy:models', [
    'shell:deployModels',
    'notify:deployModels'
  ]);

  // DEPLOY DATABASE
  grunt.registerTask('deploy:database', [
    'shell:deployDatabase',
    'notify:deployDatabase'
  ]);

  // DEPLOY ROUTES
  grunt.registerTask('deploy:routes', [
    'shell:deployRoutes',
    'notify:deployRoutes'
  ]);

  // DEPLOY CONFIG
  grunt.registerTask('deploy:config', [
    'shell:deployConfig',
    'notify:deployConfig'
  ]);

  // DEPLOY ASSETS
  grunt.registerTask('deploy:assets', [
    'shell:deployAssets',
    'notify:deployAssets'
  ]);

  // DEPLOY BOWER
  grunt.registerTask('deploy:bower', [
    'shell:deployBower',
    'notify:deployBower'
  ]);

  // DEPLOY GRUNT
  grunt.registerTask('deploy:grunt', [
    'shell:deployGrunt',
    'notify:deployGrunt'
  ]);

};
