/*global module:false */

module.exports = function(grunt) {
	
	'use strict';
	
	grunt.initConfig({
		
		pkg : grunt.file.readJSON('package.json'),
		
		info : {
			
			short : '/*! ' +
			        '<%= pkg.title || pkg.name %>' +
			        '<%= pkg.version ? " v" + pkg.version : "" %>' +
			        '<%= pkg.licenses ? " | " + pkg.license.type : "" %>' +
			        '<%= pkg.author.url ? " | " + pkg.author.url : "" %>' +
			        ' */\n'
			
		},
		
	/* ############################################################
	   WATCH
	   ############################################################ */
		
		/**
		 * Run predefined tasks whenever watched file patterns are added, changed
		 * or deleted.
		 *
		 * $ grunt watch
		 *
		 * @see https://github.com/gruntjs/grunt-contrib-watch
		 */
		
		watch : {
			
			tmpl : {
				
				files : [
					
					'./less/**/*',
					'./js/**/*'
					
				],
				
				tasks : ['dev']
				
			}
			
		},
		
	/* ############################################################
	   JS Hint
	   ############################################################ */
		
		/**
		 * Validate files with JSHint.
		 *
		 * @see https://github.com/gruntjs/grunt-contrib-jshint
		 * @see http://www.jshint.com/docs/
		 */
		
		jshint : {
			
			options : {
				
				jshintrc : '.jshintrc'
				
			},
			
			dev : {
				
				files : {
					
					src : [
						
						'./Gruntfile.js'
						
					]
					
				}
				
			},
			
			pro : {
				
				files : {
					
					src: [
						
						'./Gruntfile.js',
						'./js/ads.js',
						'./js/nav.js',
						'./js/ultra-img.js',
						'./js/scrollto.js'
						
					]
					
				}
				
			}
			
		},
		
	/* ############################################################
	   CLEAN
	   ############################################################ */
		
		/**
		 * Clean files and folders.
		 *
		 * @see https://github.com/gruntjs/grunt-contrib-clean
		 */
		
		clean : {
			
			options : {
				
				force : true // Sketchy!
				
			},
			
			dist : [
				
				'../assets/**/*'
				
			]
			
		},
		
	/* ############################################################
	   JS | UGLIFY
	   ############################################################ */
		
		/**
		 * Minify files with UglifyJS.
		 *
		 * @see https://github.com/gruntjs/grunt-contrib-uglify
		 * @see http://lisperator.net/uglifyjs/
		 */
		
		uglify : {
			
			dev : {
				
				options : {
					
					mangle : false,
					beautify : true
					
				},
				
				files : {
					
					'../assets/js/<%= pkg.name %>.js' : [
						
						'./js/ads.js',
						'./js/nav.js',
						'./js/ultra-img.js',
						'./js/scrollto.js'
						
					]
					
				}
				
			},
			
			pro : {
				
				options : {
					
					banner : '<%= info.short %>'
					
				},
				
				files : {
					
					'../assets/js/<%= pkg.name %>.min.js' : [
						
						'./js/ads.js',
						'./js/nav.js',
						'./js/ultra-img.js',
						'./js/scrollto.js'
						
					]
					
				}
				
			}
			
		},
		
	/* ############################################################
	   CSS | LESS
	   ############################################################ */
		
		/**
		 * Compile LESS files to CSS.
		 *
		 * @see https://github.com/gruntjs/grunt-contrib-less
		 */
		
		less : {
			
			options : {
				
				compress : true
				
			},
			
			dev : {
				
				files : {
					
					'../assets/css/<%= pkg.name %>.css' : './less/styles.less'
					
					
				}
				
			},
			
			pro : {
				
				options : {
					
					yuicompress : true
					
				},
				
				files : {
					
					'../assets/css/<%= pkg.name %>.min.css' : './less/styles.less'
					
				}
				
			}
			
		},
		
	/* ############################################################
	   COPY
	   ############################################################ */
		
		/**
		 * Copy files and folders.
		 *
		 * @see https://github.com/gruntjs/grunt-contrib-copy
		 * @see http://gruntjs.com/configuring-tasks#globbing-patterns
		 */
		
		copy : {
			
			dev : {
				
				files : [
					
					{
						
						expand : true,
						src : [
							
							'./i/**/*',
							'./fonts/**/*',
							'./js/**/*',
							'!./js/unused/**/*',
							'!./js/unused',
							'./swf/**/*'
							
						],
						dest : '../assets/'
						
					}
					
				]
				
			},
			
			pro : {
				
				files : [
					
					{
						
						expand : true,
						src : [
							
							'./i/**/*',
							'./fonts/**/*',
							'./swf/**/*'
							
						],
						dest : '../assets/'
						
					}
					
				]
				
			}
			
		}
		
	});
	
/* ############################################################
   Tasks
   ############################################################ */
	
	// DEVELOPMENT
	grunt.loadNpmTasks('grunt-contrib-watch');
	
	
	// JS
	grunt.loadNpmTasks('grunt-contrib-jshint');
	
	grunt.loadNpmTasks('grunt-contrib-uglify');
	
	
	// MOVE + CLEAN
	grunt.loadNpmTasks('grunt-contrib-clean');
	
	grunt.loadNpmTasks('grunt-contrib-copy');
	
	
	// CSS
	grunt.loadNpmTasks('grunt-contrib-less');
	
	//----------------------------------
	
	grunt.registerTask('default', ['clean', 'less:dev']);
	
	grunt.registerTask('dev', ['jshint:dev', 'clean', 'less:dev', 'uglify:dev', 'copy:dev']);
	
	grunt.registerTask('pro', ['jshint:pro', 'clean', 'less:pro', 'uglify:pro', 'copy:pro']);
	
};