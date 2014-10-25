# Product #

A simple product management system.

## Technologies used ##

* IDE         : PhpStorm 7.1
* DataBase    : MySQL
* PHP Version : 5.5.6
* Frameworks  : [Symfony2](http://symfony.com/) + [Backbone.js](http://backbonejs.org/)
* Server      : XAMPP 1.8.3

## Bundles ##

- Demo
- File
- Product
- Profile

### DemoBundle ###

This is main bundle of project. In other words this is the app's core.

## Routes ##

- /
- /home
- /login
- /oauth/
- /oauth/admin/
- /oauth/user/

## How it works? ##

"/", "/login" will forward user to "/home" that consists product list and login form which is hidden.
There is a hyperlink on top right corner named "Login" that user may click to view login form.
Login form also can be hidden. AJAX calls are used both log in and also log out.
There are two users for now, whose usernames are "user" and "admin". They can be anything. I kept this way to make easier.
There is one page can be viewed by all authenticated user but when logging in, user will be redirected to page depending on the role for now.
User doesn't have any action such as write or read however admin has a permission for all CRUD operations.

To add new entry which represents a product, all fields have to be filled with right formats.