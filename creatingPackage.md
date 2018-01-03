Laravel Package Development:

	Package are the primary way of adding functionality to laravel. Basically they are just the group of functionality packed together to perform certain task. Package help us to build the more robust and maintainable code.

	For this demo purpose we will create a very simple laravel package which will just return us a hello world message output. The primary purpose here is to demonstrate how to create the package and tie up the build package with our application so that we can test the building package simultaneously while building so lets download the fresh laravel application in our system and setup the env file and starting building our package.
	
	creating the Package in laravel:

		1) Creating the work space
				lets create folder name "Packages" on the root of our application where all of our packages resides.

		2) Naming the package
				Every package has its name, which actually consist of the two parts i.e. "vendor or creator section"  and the next part being the "Package Name" itself. If you see the vendor folder itself it has the package name laravel/laravel,the first part of name represents the vendor and the letter part obviously representing the package name.

				so lets go inside our recently created "Packages" folder and for this tutorial purpose lets create the folder name "olivemediapackage" inside the packages and inside the "olivemediapackage" lets create the folder name "demopackage".
		
				so now our package name will be "olivemediapackage/demopackage" and we have to call refering to this name once our package is deployed. In this case "olivemediapackage" represents our vendor name and "demopackage" being the package name.
		
		3) creating the standard folder structure for the package development
				Most important thing will creating the package, is that we must have a "src" folder where our whole code reside and composer.json file where our dependency for package are written. Inside src folder we can structure our package any why we like.

		4) Set up the composer.json for our package
				For this tutorial purpose we will keep our composer.json file as simple as possible. So go to the root
				for our pace which in our case happens to be "demopackage" via command interface and type the "composer init" command which will initialized our project with the composer.json file. During the process composer will ask some question to and just stick around and type the answer accordingly.  

				sample composer file

					{
					    "name": "olivemediapackage/demopackage",
					    "description": "Demo package for olivemedia.",
					    "keywords": ["Demo package", "laravel demo package"],
					    "license": "MIT",
					    "authors": [
					        {
					            "name": "Basu Regami",
					            "email": "basuregami@gmail.com"
					        }
					    ],
					    "require": {}
					}

				so lets setup our composer.json file

						The most important section in the composer.json file is the autoload section which helps us to load all the file we need, we can load the file, we can load the namespace. The "autoload" section takes two object first  being the "psr-4" where we can load our "namespace" and the section is "files" array where we can load the file.
						
						For this tuts purpose we will create a function.php file inside the "src" folder which we will load in the composer file.
						Note that the "\\" at the "psr-4" is very important

						{
						    "name": "olivemediapackage/demopackage",
						    "description": "Demo package for olivemedia.",
						    "keywords": ["Demo package", "laravel demo package"],
						    "license": "MIT",
						    "authors": [
						        {
						            "name": "Basu Regami",
						            "email": "basuregami@gmail.com"
						        }
						    ],
						    "autoload": [
								"psr-4":{
            						"olivemediapackage\\demopackage\\": "src/"
									},
									"files":[
										"src/function.php"
									]
						    ]
						    "require": {
						    	"Illuminate/support": "~5"
						    }
						}

						the most important section in our composer.json file is the require section which is an object where we can pass our dependency of our package. since we are building a very simple package which only return the hello world message we don't need any much dependency. for the example purpose lets we would load "illuminate\support" package of laravel.

			5) Service Provider

						so lets create a ServiceProvider inside our "src" folder. Service Provider is way of important everything in one plate. Basically it helps us to bind everything in one thing.

						sample
							<?php

								namespace olivemediapackage\demopackage;

								use Illuminate\Support\ServiceProvider;

								class AppServiceProvider extends ServiceProvider
								{
								    /**
								     * Bootstrap any application services.
								     *
								     * @return void
								     */
								    public function boot()
								    {
								        //
								    }

								    /**
								     * Register any application services.
								     *
								     * @return void
								     */
								    public function register()
								    {
								        //
								    }
								}

						  Note:
						  		*we have given the namspace of our package name to the provider
								* We have extend the illuminate support helper seriveprovider class which we have "required" in comoser.json file
								* By default service provider has the two method
									1) boot method 
									2) register method

									so basically the idea behind the method is that whatever our file are in our package is we must register need and the boot method loads it on our main application whenever the application is booted. 

									 public function boot()
								    {
								        $this->app->bind('demo_package',function(){
								        	return new DemoPackage;
								        });
								    }

								    so lets bind our package when anyone call our "demo_package", like that since we are returning DemoPackage class, which we dont have at the movement, lets just create the file DemoPackage inside our src folder.


								    so lets make our package little more interacting. so lets create a bunch of folder inside src folder.
					

 


				6) Tieing the package with main application

							one you create your package, we must be able to use it to our application. To tie up the package created with our main appliation we must autoload our package at the composer.json file and load the package with the help of service provider present in our main application. 

							here a sample composer.json file and service provider example to make things clear



							Main composer json file of our application


							{
							    "name": "laravel/laravel",
							    "description": "The Laravel Framework.",
							    "keywords": ["framework", "laravel"],
							    "license": "MIT",
							    "type": "project",
							    "require": {
							        "php": ">=7.0.0",
							        "fideloper/proxy": "~3.3",
							        "guzzlehttp/guzzle": "^6.3",
							        "laravel/framework": "5.5.*",
							        "laravel/tinker": "~1.0"
							    },
							    "require-dev": {
							        "filp/whoops": "~2.0",
							        "fzaninotto/faker": "~1.4",
							        "mockery/mockery": "~1.0",
							        "phpunit/phpunit": "~6.0"
							    },
							    "autoload": {
							        "classmap": [
							            "database/seeds",
							            "database/factories"
							        ],
							        "psr-4": {
							            "Sanila\\SanilaPackage2\\": "packages/Sanila/SanilaPackage2/src",
							            "Sanila\\SanilaPackage\\": "packages/Sanila/SanilaPackage/src",
							            "Basu\\TestPackage\\": "packages/Basu/TestPackage/src",
							            "Basu\\TestPackage\\": "packages/Basu/TestPackage/src",
							            "App\\": "app/",
							            "olivemediapackage\\demopackage\\": "Packages/olivemediapackage/demopackage/src/",
							            "olivemediapackage\\PackageManage\\": "Packages/olivemediapackage/PackageManage/src/"

							        },
							        "files": [
							            "Packages/olivemediapackage/demopackage/src/function.php"
							        ]
							    },
							    "autoload-dev": {
							        "psr-4": {
							            "Sanila\\SanilaPackage2\\": "packages/Sanila/SanilaPackage2/src",
							            "Sanila\\SanilaPackage\\": "packages/Sanila/SanilaPackage/src",
							            "Basu\\TestPackage\\": "packages/Basu/TestPackage/src",
							            "Basu\\TestPackage\\": "packages/Basu/TestPackage/src",
							            "Tests\\": "tests/"
							        }
							    },
							    "extra": {
							        "laravel": {
							            "dont-discover": [
							            ]
							        }
							    },
							    "scripts": {
							        "post-root-package-install": [
							            "@php -r \"file_exists('.env') || copy('.env.example', '.env');\""
							        ],
							        "post-create-project-cmd": [
							            "@php artisan key:generate"
							        ],
							        "post-autoload-dump": [
							            "Illuminate\\Foundation\\ComposerScripts::postAutoloadDump",
							            "@php artisan package:discover"
							        ]
							    },
							    "config": {
							        "preferred-install": "dist",
							        "sort-packages": true,
							        "optimize-autoloader": true
							    },
							    "repositories": {
							        "packagist": { "url": "https://packagist.org", "type": "composer" }
							    }

							}



							Service provider file
							 need to add this line on app.php file present on config directory to load our serviceprovider.

							\olivemediapackage\demopackage\DemoPackageServiceProvider::class,
















