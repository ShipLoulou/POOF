<?php

session_start();

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

class LogIn extends DBConnect
{
    public function treatment($pseudo, $password) {
        $connectDB = parent::dataBase();
        $requete = $connectDB->query('SELECT * FROM user');
        $array = $requete->fetchAll();
        foreach ($array as $item) {
            if($item['pseudo'] === $pseudo || $item['email'] === $pseudo) {
                if ($item['password'] === $password) {
                    $_SESSION['user'] = [
                        'user_id' => $item['user_id'],
                        'firstName' => $item['firstName'],
                        'lastName' => $item['lastName'],
                    ];
                    header('Location: ../../../index.php?page=' . $item['lastName'] . $item['firstName']);
                    exit;
                } else {
                    header('Location: ../../../index.php?page=logIn');
                    exit;
                }
            }
        }
        header('Location: ../../../index.php?page=logIn');
        exit;
    }
}

$initClass = new LogIn;
$response = $initClass->treatment($_POST['pseudo'], $_POST['password']);