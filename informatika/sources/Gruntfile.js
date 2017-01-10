module.exports = function (grunt) {
    require('load-grunt-tasks')(grunt);
    // Project configuration
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        concurrent:
        {
            target:
            {
                tasks: ["watch:sass", "watch:concat", "watch:uglify"],
                options:{
                    logConcurrentOutput: true
                }
            }
        },
        watch:
        {
            sass:
            {
                files: 'sass/**/*',
                tasks: ['sass']
            },

            concat:
            {
                files: 'javascript/**/*',
                tasks: ['concat']
            },

            uglify:
            {
                files: ['javascript/**/*.js'],
                tasks: ['uglify']
            }
        },
        
        sass: {
            dist: {
                options: {
                    style: 'compressed'
                },
                files: {
                    '../css/main.min.css': 'sass/main.scss'
                }
            }
        },
        
        concat: {
            dist: {
                options: {
                    separator: '\n\r',
                },
                src: [
                    'node_modules/angular/angular.js',
                    'node_modules/angular-route/angular-route.js',
                    'node_modules/angular-sanitize/angular-sanitize.js',
                    'javascript/components/**/*.js',
                    'javascript/app.js'
                ],
                dest: '../js/main.js'
            }
        },

        uglify: {
            options: {
                mangle: false,
                compress: false
            },
            target: {
                files: {
                    '../js/main.min.js': [
                        'javascript/main.js',
                        'javascript/header.js',
                        'javascript/shopping-cart.js',
                        'javascript/product.js'
                    ]
                }
            }
        }

    });

    grunt.registerTask("default", ['sass']);

};
