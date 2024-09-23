<?php

// require_once 'src/models/treatment/modelHomepageUserLoginAddFriends.php';
require_once 'src/models/view/modelHomepageUserLoginFriends.php';

function controllerHomepageUserLoginAddFriends() {

    $showFriendsIfOfUser = new ShowFriendsIfOfUser;
    $setFriendOfUser = $showFriendsIfOfUser->setFriendOfUser($_SESSION['user']['user_id']);
    $setUserInfo = $showFriendsIfOfUser->setUserInfo();
    $getUserInfo = $showFriendsIfOfUser->getUserInfo($_SESSION['user']['user_id']);
    $getFriendOfUser = $showFriendsIfOfUser->getFriendOfUser();

    require 'templates/homepageUserLoginAddFriends.php';
}