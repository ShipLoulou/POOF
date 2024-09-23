<?php

require_once 'src/models/view/modelHomepageUserLoginSetting.php';

use App\HomepageUserLogin\Setting\GetInfoUserWithId as UserInfoHomepageSetting;

function controllerHomepageUserLoginSetting() {
    $initClass = new UserInfoHomepageSetting;
    $set = $initClass->setSelectDataWithId($_SESSION['user']['user_id']);
    $get = $initClass->getSelectDataWithId();

    require 'templates/homepageUserLoginSetting.php';
}