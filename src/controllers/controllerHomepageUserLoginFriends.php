<?php

require_once 'src/models/view/modelHomepageUserLoginFriends.php';

use App\HomepageUserLogin\Friend\ShowFriendsIfOfUser;

function controllerHomepageUserLoginFriends() {

    $initClass = new ShowFriendsIfOfUser;
    $setFriendOfUser = $initClass->setFriendOfUser($_SESSION['user']['user_id']);
    $setUserInfo = $initClass->setUserInfo();
    $getUserInfo = $initClass->getUserInfo($_SESSION['user']['user_id']);
    $getFriendOfUser = $initClass->getFriendOfUser();

    require 'templates/homepageUserLoginFriends.php';
}