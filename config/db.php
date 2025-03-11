<?php
class Database
{
    private static $conn = null;

    public static function getConnection()
    {
        if (self::$conn === null) {
            try {
                self::$conn = new PDO('mysql:host=localhost;dbname=voiture_db', 'root', 'root');
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }

        return self::$conn;
    }
}
// class Database
// {
//     private $host;
//     private $dbname;
//     private $username;
//     private $password;
//     private $pdo;

//     public function __construct($host, $dbname, $username, $password)
//     {
//         $this->host = $host;
//         $this->dbname = $dbname;
//         $this->username = $username;
//         $this->password = $password;
//         $this->connect();
//     }

//     private function connect()
//     {
//         try {
//             $this->pdo = new PDO(
//                 "mysql:host={$this->host};dbname={$this->dbname}",
//                 $this->username,
//                 $this->password
//             );
//             $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//         } catch (PDOException $e) {
//             error_log("Erreur de connexion à la base de données : " . $e->getMessage());
//             throw new Exception("Erreur de connexion à la base de données.");
//         }
//     }

//     public function getConnection()
//     {
//         return $this->pdo;
//     }
// }
// 
// 
// 
/*
mysqli example

class Database
{
    private static $conn = null;

    public static function getConnection()
    {
        if (self::$conn === null) {
            self::$conn = new mysqli('localhost', 'root', 'root', 'voiture_db');
            if (self::$conn->connect_error) {
                die("Connection failed: " . self::$conn->connect_error);
            }
        }

        return self::$conn;
    }
}
*/
?>