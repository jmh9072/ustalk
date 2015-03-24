uStalk is a project written in PHP which allows users to create lists of users on [bungie.net](http://www.bungie.net) to track the last time they have been online.

This code is licensed under the New BSD License. If you use it or parts of it in another project, please give credit to the authors. At the time of this writing, the authors are jmh9072 and Firebird347.

**How to get things up and running:**

1. Upload files in directory "uStalk" to server

2. Import Database from setupdatabase.sql

3. Create a file local\_settings.php. Inside of it place your databse connection settings, as well as the name/email you'd like to have appear when an error occurs. The file should look like:
```
<?
return array(
	'contact_name' => 'Your b.net user name',
	'mysql' => array (
		'host' => 'hostname',
		'db' => 'db name',
		'username' => 'username',
		'password' => 'password'
	)
);
```

4. You should be good to go! Access your site and login using the username "root" and password "admin". You should change your password to something more secure immediately. The current list of moderators have been added by default, and you may delete or change these to whatever you wish. Have fun!