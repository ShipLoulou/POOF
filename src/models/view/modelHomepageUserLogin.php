<?php

declare(strict_types=1);

namespace App\HomepageUserLogin;

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

/**
 * récupération des données de l'utilisateur connecter
 * avec le user_id stocker dans le tableaux $_SESSION[user]
 */
class GetInfoUserWithId extends DBConnect
{
    private array $UserInfoLogin;

    public function setSelectDataWithId($idSession) : void
    {
        $connectDB = parent::dataBase();
        $requete = $connectDB->query('SELECT * FROM user');
        $array = $requete->fetchAll();
        foreach ($array as $item) {
            if ($item['user_id'] === $idSession) {
                $this->UserInfoLogin = $item;
            }
        }
    }

    public function getSelectDataWithId() : array
    {
        return $this->UserInfoLogin;
    }

}