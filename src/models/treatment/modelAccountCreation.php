<?php

abstract class DBConnect
{
    protected static function dataBase() 
    {
        try {
            return $mysqlClient = new PDO('mysql:host=127.0.0.1;dbname=POOF;charset=utf8', 'root', '');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}

class SignIn extends DBConnect
{
    public function treatment() 
    {
        if (empty($_POST['firstName']) || empty($_POST['lastName']) || empty($_POST['pseudo']) || empty($_POST['email']) || empty($_POST['password'])) {
            header('Location: ../../../index.php?page=signIn');
            exit;
        } elseif (strlen($_POST['pseudo']) < 4) {
            header('Location: ../../../index.php?page=signIn');
            exit;
        } elseif (preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).{4,8}$/", $_POST['password'])) {
            $connectDB = parent::dataBase();
            $requete = $connectDB->prepare('INSERT INTO user(firstName, lastName, pseudo, profileImage, email, password) VALUES (:firstName, :lastName, :pseudo, :profileImage, :email, :password)');
            $requete->execute([
                'firstName' => strip_tags($_POST['firstName']),
                'lastName' => strip_tags($_POST['lastName']),
                'pseudo' => strip_tags($_POST['pseudo']),
                'profileImage' => "https://img.freepik.com/photos-premium/avatar-dessin-anime-3d-immersif-vue-captivante-profil-homme-blanc-10-ans-h-noir_983420-10038.jpg",
                'email' => strip_tags($_POST['email']),
                'password' => strip_tags($_POST['password']),
            ]);
            header('Location: ../../../index.php');
            exit;
        } else {
            header('Location: ../../../index.php?page=signIn');
            exit;
        }
    }
}

$callSignIn = new SignIn;
$response = $callSignIn->treatment();