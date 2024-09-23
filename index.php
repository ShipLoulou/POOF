<?php 
session_start();
function homepage() {
    require 'templates/homepageUserNotLogged.php';
}

// var_dump($_GET);
// var_dump($_SESSION['user']['firstName']);
require_once 'src/controllers/controllerAccountCreation.php';
require_once 'src/controllers/controllerAccountLogin.php';
require_once 'src/controllers/controllerHomepageUserLogin.php';
require_once 'src/controllers/controllerHomepageUserLoginSetting.php';
require_once 'src/controllers/controllerHomepageUserLoginFriends.php';
require_once 'src/controllers/controllerHomepageUserLoginAddFriends.php';

// index.php?page=nomDeLaPage


if($_GET['page'] !== null ) {
    if ($_GET['page'] === 'signIn') {
        controllerAccountCreation();
    } elseif ($_GET['page'] === 'logIn') {
        controllerAccountLogin();
    } elseif ($_GET['page'] === $_SESSION['user']['lastName'] . $_SESSION['user']['firstName']) {
        controllerHomepageUserLogin();
    } elseif ($_GET['page'] === 'profilSetting') {
        controllerHomepageUserLoginSetting();
    } elseif ($_GET['page'] === 'myFriends') {
        controllerHomepageUserLoginFriends();
    } elseif ($_GET['page'] === 'addFriend') {
        controllerHomepageUserLoginAddFriends();
    } elseif ($_GET['page'] === 'exit' ) {
        session_destroy();
        homepage();
    }
} else {
    homepage();
}

