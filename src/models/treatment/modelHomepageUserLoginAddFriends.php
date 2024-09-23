<?php

abstract class DBConnectAddFriend
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

class AddFriend extends DBConnectAddFriend
{

    public int $userNameId;

    public function treatment($pseudo)
    {
        $connectDB = parent::connectDataBase();
        $requete = $connectDB->query('SELECT * FROM user');
        $array = $requete->fetchAll();
        foreach ($array as $item) {
            if($item['pseudo'] === $pseudo) {
                $this->userNameId = $item['user_id'];
                return true;
            }
        }
        header('Location: ../../../index.php?page=addFriend');
        exit;
    }

    public function noName($myUserId) {
        $connectDB = parent::connectDataBase();
        $requete = $connectDB->prepare('INSERT INTO friend(user_id, friend_id) VALUES (:user_id, :friend_id)');
        $requete->execute([
            'user_id' => $myUserId,
            'friend_id' => $this->userNameId,
        ]);
        header('Location: ../../../index.php?page=myFriends');
        exit;
    }
}

$callLogIn = new AddFriend;
$response = $callLogIn->treatment($_POST['pseudo']);
$response1 = $callLogIn->noName($_POST['user_id']);

var_dump($response1);