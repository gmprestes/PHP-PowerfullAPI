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
You need tell to Powerful API where are your controller files. For this, edit api.php adding you controller's classes like in the sample:

```php
<?php

//spl_autoload_register(); // don't load our classes unless we use them

require 'PowerfulAPI.php';
require 'controllers/TestController.php';
require 'Test2Controller.php';

$server = new PowerfulAPI();

$server->addClass('TestController');
$server->addClass('Test2Controller');
$server->handle();
```



Authentication is unique for each application. But tying your authentication mechanisms into RestServer is easy. By simply adding a method named authorize to your Controller all requests will call that method first. If authorize() returns false, the server will issue a 401 Unauthorized response. If authorize() returns true, the request continues on to call the correct controller action. All actions will run the authorization first unless you add @noAuth in the action's docs (I usually put it above the @url mappings).

Inside your authentication method you can use PHP's getallheaders function or $_COOKIE depending on how you want to authorize your users. This is where you would load the user object from your database, and set it to $this->user = getUserFromDatabase() so that your action will have access to it later when it gets called.

RestServer is meant to be a simple mechanism to map your application into a REST API. The rest of the details are up to you.

Throwing and Handling Errors

You may provide errors to your API users easily by throwing an excetion with the class RestException. Example:

    /**
     * Gets the user by id or current user
     *
     * @url GET /users/$id
     * @url GET /users/current
     */
    public function getUser($id = null)
    {
        if ($id) {
            $user = User::load($id); // possible user loading method

            if (!$user) {
                throw new RestException(404, 'User not found');
            }

        } else {
            $user = $_SESSION['user'];
        }

        return $user; // serializes object into JSON
    }
You have control over how your REST service handles errors. You can add an error controller using $server->addErrorClass('ErrorController');. This controller can define methods named handle401 or handle404 to add your own custom error handling logic.
