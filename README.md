# PowerfulAPI
A powerful and very light-weight PHP REST API Server

* Very easy to set up and get going, you just need to copy files into working directory.
* Independent from other libraries and frameworks.
* Supports HTTP authentication.

Support the following formats :
* text/plain
* text/html
* application/json
* application/xml

# Installation
Just put files .htaccess and PowerfulAPI.php into directory that you'd like to work with API and enjoy it :)

# Configuration
You need tell to Powerful API where are your controller files (wherever they are). For this, edit api.php adding your controller's classes like in the sample:

```php
<?php

require 'PowerfulAPI.php';
require 'controllers/TestController.php';
require 'Test2Controller.php';

$server = new PowerfulAPI();

$server->addClass('TestController');
$server->addClass('Test2Controller');
$server->handle();
```
# Routing
Is too easy to add routes and they are informed in controllers adding @url documentation tag 

You need tell to Powerful API what are your routes (whatever you need). To do this, add a @url documentation tag on your methods to tell for Powerful API what routes are allowed for this method, like in the sample:

* Adding a GET route to /home
```php
    /**
     * @url GET /home
     */
    public function test()
    {
        return "Home API";
    }
```

* Adding a GET route with variable ($id) to /home/1
Variable name can be whatever you want
```php
    /**
     * @url GET /home/$id
     */
    public function home($id)
    {
        return $id;
    }
```

* Adding a POST route to /home/save
```php
    /**
     * @url POST /home/save
     * @noAuth
     */
    public function save()
    {
        $data = $_POST['XYZ']; 
        // TO DO
        //Save data
    }
```
If you try access a method that not exist, API will return 404 - Not Found response.

# Autentication

By default, autentication is disabled, but you can enable it adding a method named authorize to your controller. All requests will call that method first. If authorize() returns false, the server will issue a 401 Unauthorized response. If authorize() returns true, the request continues on to call the correct controller action. All actions will run the authorization first unless you add @noAuth in the action's docs (I usually put it above the @url mappings).
Inside your authentication method you can use PHP's getallheaders function or $_COOKIE depending on how you want to authorize your users.


This project is forked from https://github.com/jacwright/RestServer created by Jacob Wright, but some modifications were made to improve it. 


