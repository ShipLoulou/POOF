<?php

require_once 'src/models/view/modelHomepageUserLogin.php';

use App\HomepageUserLogin\GetInfoUserWithId as UserInfoHomepage;

function controllerHomepageUserLogin() {
    $initClass = new UserInfoHomepage;
    $set = $initClass->setSelectDataWithId($_SESSION['user']['user_id']);
    $get = $initClass->getSelectDataWithId();


    require 'templates/homepageUserLogin.php';
}