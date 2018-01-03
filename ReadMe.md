Laravel Package Development

	Package are the primary way of adding functionality to laravel. Basically they are just the group of functionality packed together to perform certain task. Package help us to build the more robust and maintainable code.

	For this demo purpose we will create a very simple laravel package which will just return us a hello world message output. The primary purpose here is to demonstrate how to create the package and tie up the build package with our application so that we can test the building package simultaneously while building so lets download the fresh laravel application in our system and setup the env file and starting building our package.

#Package Name: olivemediapackage/demopackage
	

#Installation 
	
	 1. In order to install demo_package, just add the following to your composer.json file. Then run  composer update

	   add this on composer require: "olivemediapackage/demopackage": "dev-master"

	   add this repository to download the package: 

	   		"repositories": [
        		{
            		"type": "git",
            		"url":  "https://github.com/basuregami/demo_package.git"
        		}
        	]

     2. Register on the service provider on app.php file inside config folder

     	 Add this on provider  	
     	 		\olivemediapackage\demopackage\DemoPackageServiceProvider::class,
 			
 		 Add this on aliases          
 		 		'DemoPackage' =>  \olivemediapackage\demopackage\Facades\DemoPackage::class,

 	3. Testing package

 			Add this on Routes/web.php

 				Route::get('/', function () {
				    return demo_package()->index();
				});

				

