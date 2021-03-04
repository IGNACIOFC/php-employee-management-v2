# php-employee-management-v2
_A Employees manager to do a CRUD with employees, and create new users and admins_

## Start 🚀

Get a clone of the project in local.
You need to have installed xampp in your computer to develop the proyect.

### Requirements 📋

_You need to install xampp_

Go to [xampp](https://www.apachefriends.org/es/index.html) download and install the program.

### Instalation 🔧


_First clone the repository_

```
git clone https://github.com/IGNACIOFC/php-employee-management-v2.git
```
_Then install xampp_

_Then run mysql and apache in xampp_

_In the file "resources/db.sql" you need to change the default value avatar to you server path:

```
Insert here your server path (example: http://localhost/php-employee-management-v2)/assets/images/no-user.png
```

_Open phpmyadmin, import the file : "resources/db.sql"_

_Before you can run the project in your local host you need to create a file "config.php" inside config folder (you must create the config folder in the root directory of the project)_

_Inside this new created file you will have to declare your db credentials_

```
define('PROTOCOL', (!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS'] == 'on')) ? 'https://' : 'http://');
define('DOMAIN', $_SERVER['HTTP_HOST']);
define('URL', preg_replace("/\/$/", '', PROTOCOL . DOMAIN . str_replace(array('\\', "index.php", "index.html"), '', dirname(htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES))), 1) . '/');


define('HOST', 'Insert here your host');
define('DATABASE', 'employees_manager');
define('USER', 'Insert here your database user');
define('PASSWORD', 'Insert here your database password');
define('CHARSET', 'utf8mb4');
define('APIKEY', 'You need to take a uiFaces apiKey and insert here');
```


## Build with 🛠️

* [xampp](https://www.apachefriends.org/es/index.html) 

## contributing 🖇️

If you want to contribute, please fork the repository, create a new branch, and push the branch as a pull requests.

## Author ✒️

* **Estefanía Cordeiro** - [estefaniacordeiro](https://github.com/estefaniacordeiro)
* **Ignacio Fernandez** - [IGNACIOFC](https://github.com/IGNACIOFC)
* **Raúl Cátedra** - [RaulCatedra3003](https://github.com/RaulCatedra3003)

---
⌨️ whit ❤️ by [estefaniacordeiro](https://github.com/estefaniacordeiro), [IGNACIOFC](https://github.com/IGNACIOFC) and [RaulCatedra3003](https://github.com/RaulCatedra3003) based on [this proyect](https://github.com/joserra-15/php-employee-management-v1) 😊
