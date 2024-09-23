<?php

abstract class DBConnectSettingPUT
{
    protected static function connectDataBase() 
    {
        try {
            return $mysqlClient = new PDO('mysql:host=127.0.0.1;dbname=POOF;charset=utf8', 'root', '');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}

class ModificationSetting extends DBConnectSettingPUT
{
    public function treatment($id) 
    {
        if (empty($_POST['firstName']) || empty($_POST['lastName']) || empty($_POST['pseudo']) || empty($_POST['email']) || empty($_POST['password'])) {
            header('Location: ../../../index.php?page=profilSetting');
            exit;
        } elseif (strlen($_POST['pseudo']) < 4) {
            header('Location: ../../../index.php?page=profilSetting');
            exit;
        } elseif ($_POST['Oldpassword'] === $_POST['password']) {
            $connectDB = parent::connectDataBase();
            $requete = $connectDB->prepare('UPDATE user SET firstName = :firstName, lastName = :lastName, pseudo = :pseudo, profileImage = :profileImage, email = :email, password = :password WHERE user_id= :id');
            $requete->execute([
                'firstName' => strip_tags($_POST['firstName']),
                'lastName' => strip_tags($_POST['lastName']),
                'pseudo' => strip_tags($_POST['pseudo']),
                'profileImage' => strip_tags($_POST['profileImage']),
                'email' => strip_tags($_POST['email']),
                'password' => strip_tags($_POST['password']),
                'id' => $id,
            ]);
            header('Location: ../../../index.php?page=profilSetting');
            exit;
        } elseif (preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).{4,8}$/", $_POST['password'])) {
            $connectDB = parent::connectDataBase();
            $requete = $connectDB->prepare('UPDATE user SET firstName = :firstName, lastName = :lastName, pseudo = :pseudo, profileImage = :profileImage, email = :email, password = :password WHERE user_id= :id');
            $requete->execute([
                'firstName' => strip_tags($_POST['firstName']),
                'lastName' => strip_tags($_POST['lastName']),
                'pseudo' => strip_tags($_POST['pseudo']),
                'profileImage' => strip_tags($_POST['profileImage']),
                'email' => strip_tags($_POST['email']),
                'password' => strip_tags($_POST['password']),
                'id' => $id,
            ]);
            header('Location: ../../../index.php?page=profilSetting');
            exit;
        } else {
            header('Location: ../../../index.php?page=profilSetting');
            exit;
        }
    }
}

$callModificationSetting = new ModificationSetting;
$response = $callModificationSetting->treatment($_POST['user_id']);

var_dump($response);