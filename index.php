<?php

// start session
session_start();
// require all the classes & functions files
require "includes/class-db.php";
require "includes/class-user.php";
require "includes/class-authenthication.php";   
require "includes/class-form-validation.php";
require "includes/class-csrf.php";
require "includes/class-post.php";
// get route from the global variable
$path = $_SERVER["REQUEST_URI"];
//remove beginning & ending trailing slash
$path = trim( $path, '/');
//remove all the URL parameters that starts with ?
$path = parse_url($path, PHP_URL_PATH);

switch($path){
    case 'login':
        require "pages/login.php";
        break;
    case 'signup':
        require "pages/signup.php";
        break;  
    case 'dashboard':
        require "pages/dashboard.php";
        break;  
    case 'post':
        require "pages/post.php";
        break;
    case 'manage-posts':
        require "pages/manage-posts.php";
        break;
    case 'manage-posts-add':
        require "pages/manage-posts-add.php";
        break;
    case 'manage-posts-edit':
        require "pages/manage-posts-edit.php";
        break;
    case 'manage-users':
        require "pages/manage-users.php";
        break;
    case 'manage-users-add':
        require "pages/manage-users-add.php";
        break;
    case 'manage-users-edit':
        require "pages/manage-users-edit.php";
        break;
    case 'logout':
        require "pages/logout.php";
        break; 
    default:
        require "pages/home.php";
        break; 
     

}