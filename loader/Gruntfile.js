module.exports = function(grunt) {

	grunt.initConfig({

		// Import package manifest
		pkg: grunt.file.readJSON("boilerplate.jquery.json"),

		// Banner definitions
		meta: {
			banner: "/*\n" +
				" *  <%= pkg.title || pkg.name %> - v<%= pkg.version %>\n" +
				" *  <%= pkg.description %>\n" +
				" *  <%= pkg.homepage %>\n" +
				" *\n" +
				" *  Made by <%= pkg.author.name %>\n" +
				" *  Under <%= pkg.licenses[0].type %> License\n" +
				" */\n"
		},

		// Concat definitions
		concat: {
			dist: {
				src: ["src/jquery.loading-indicator.js"],
				dest: "dist/jquery.loading-indicator.js"
			},
			options: {
				banner: "<%= meta.banner %>"
			}
		},

		// Lint definitions
		jshint: {
			files: ["src/jquery.loading-indicator.js"],
			options: {
				jshintrc: ".jshintrc"
			}
		},

		// Minify definitions
		uglify: {
			my_target: {
				src: ["dist/jquery.loading-indicator.js"],
				dest: "dist/jquery.loading-indicator.min.js"
			},
			options: {
				banner: "<%= meta.banner %>"
			}
		},
		
		// Less
		less: {
			development: {
				options: {
				  paths: ["dist"]
				},
				files: {
					"dist/jquery.loading-indicator.css": "src/jquery.loading-indicator.less"
				}
			},
			production: {
				options: {
					paths: ["dist"],
					cleancss: true
				},
				files: {
					  "dist/jquery.loading-indicator.css": "src/jquery.loading-indicator.less"
				}
			}
		}
		

	});

	grunt.loadNpmTasks("grunt-contrib-concat");
	grunt.loadNpmTasks("grunt-contrib-jshint");
	grunt.loadNpmTasks("grunt-contrib-uglify");
	grunt.loadNpmTasks('grunt-contrib-less');

	grunt.registerTask("default", ["jshint", "concat", "uglify", "less"]);
	grunt.registerTask("travis", ["jshint"]);

};
