module.exports = function (grunt) {
	// load all deps
	require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

	var config = {
		phpFileRegex:            '[^/]+\.php$',
		phpFileInSubfolderRegex: '.*?\.php$',
	}

	// configuration
	grunt.initConfig({
		pgk: grunt.file.readJSON('package.json'),

		// https://npmjs.org/package/grunt-contrib-compass
		compass: {
			all: {
				options: {
					sassDir:        'assets/lib',
					cssDir:         'assets/stylesheets',
					imagesDir:      'assets/images',
					outputStyle:    'compact',
					relativeAssets: true,
					noLineComments: true,
					watch:          true
				}
			}
		},

		// Parse CSS and add vendor-prefixed CSS properties using the Can I Use database. Based on Autoprefixer.
		// https://github.com/nDmitry/grunt-autoprefixer
		autoprefixer: {
			dev: {
				files: [{
					expand: true,
					cwd:    'assets/stylesheets',
					src:    '*.css',
					dest:   'assets/stylesheets'
				}]
			}
		},

		// https://npmjs.org/package/grunt-contrib-watch
		watch: {
			options: {
				livereload: true,
				spawn:      false
			},

			// autoprefix the files
			autoprefixer: {
				files: ['assets/stylesheets/*.css'],
				tasks: ['autoprefixer:dev'],
			},

			// PHP files
			other: {
				files: ['**/*.php', 'assets/**/*.js'],
			},
		},

		// https://npmjs.org/package/grunt-concurrent
		concurrent: {
			server: [
				'compass',
				'watch'
			]
		},

		// https://npmjs.org/package/grunt-contrib-jshint
		jshint: {
			dist: {
				jshintrc: true,
				files: {
					src: ['assets/js/custom.js', 'Gruntfile.js']
				}
			}
		},

		// https://www.npmjs.com/package/grunt-wp-i18n
		makepot: {
			target: {
				options: {
					domainPath:      'languages/',
					include:         [config.phpFileRegex, '^inc/'+config.phpFileInSubfolderRegex, '^woocommerce/'+config.phpFileInSubfolderRegex],
					mainFile:        'style.css',
					potComments:     'Copyright (C) {year} ProteusThemes \n# This file is distributed under the GPL 2.0.',
					potFilename:     'carpress.pot',
					potHeaders:      {
						poedit:                 true,
						'report-msgid-bugs-to': 'http://support.proteusthemes.com/',
					},
					type: 'wp-theme',
					updateTimestamp: false,
					updatePoFiles:   true,
				}
			}
		},

		// https://www.npmjs.com/package/grunt-wp-i18n
		addtextdomain: {
			options: {
				updateDomains: true
			},
			target: {
				files: {
					src: [
						'*.php',
						'inc/**/*.php',
						'woocommerce/**/*.php'
					]
				}
			}
		},

		// https://www.npmjs.com/package/grunt-po2mo
		po2mo: {
			files: {
				src:    'languages/*.po',
				expand: true,
			},
		},
	});

	// when developing
	grunt.registerTask('server', [
		'concurrent:server'
	]);

	// linting
	grunt.registerTask('lint', ['jshint']);

	// defaults to the server
	grunt.registerTask('default', [
		'server'
	]);

	// update languages files
	grunt.registerTask( 'languages', [
		'addtextdomain',
		'makepot',
		'po2mo',
	] );
};