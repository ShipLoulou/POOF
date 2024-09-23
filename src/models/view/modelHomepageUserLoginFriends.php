<?php

declare(strict_types=1);

namespace App\HomepageUserLogin\Friend;

/**
 * Connection à la BDD
 */
abstract class DBConnect
{
    protected static function dataBase() 
    {
        try {
            return $mysqlClient = new \PDO('mysql:host=127.0.0.1;dbname=POOF;charset=utf8', 'root', '');
        } catch (\Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}


class ShowFriendsIfOfUser extends DBConnect
{
    private array $allFriends;

    private array $allFriendsInfo = [];

    /**
     * Récupération des amis de l'utilisateur (avec les id)
     */
    public function setFriendOfUser($idSession) : void
    {
        $connectDB = parent::dataBase();
        $requete = $connectDB->prepare('SELECT * FROM friend WHERE user_id = :id');
        $requete->execute([
            'id' => $idSession,
        ]);
        $this->allFriends = $requete->fetchAll();
    }

    public function getFriendOfUser () 
    {
        return $this->allFriendsInfo;

    }

    /**
     * Récupère les infos des amis de l'utilisateur
     */
    public function setUserInfo() : void
    {
        $connectDB = parent::dataBase();
        $requete = $connectDB->query('SELECT * FROM user');
        $allUsers = $requete->fetchAll();
        foreach ($this->allFriends as $friend) {
            foreach ($allUsers as $user) {
                if ($user['user_id'] === $friend['friend_id']) {
                    array_push($this->allFriendsInfo, $user);
                }
            }
        }
    }

    /**
     * Récupère les infos de l'utilisateur
     */
    public function getUserInfo($idSession)
    {
        $connectDB = parent::dataBase();
        $requete = $connectDB->query('SELECT * FROM user');
        $array = $requete->fetchAll();
        foreach ($array as $item) {
            if ($item['user_id'] === $idSession) {
                return $item;
            }
        }
    }
}
?>
