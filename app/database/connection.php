<?php

namespace app\database;

use PDO;
use Dotenv\Dotenv;
require_once __DIR__.'/../../vendor/autoload.php';


$dotenv =Dotenv::createImmutable(__DIR__.'/../../');
$dotenv->load();

class Connection
{

    private static $instance;
    private  $connection;

    private function __construct(){

            $servername = $_ENV['DB_HOST'];
            $username = $_ENV['DB_USER'];
            $password = $_ENV['DB_PASSWORD'];
            $dbname = $_ENV['DB_NAME'];
            try{
                $this->connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                echo "done";
            }catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            } 
        }
        public static function getInstence(){
            if(!isset(self::$instance)){
                self::$instance = new Connection();
            }
            return self::$instance;
        }

        public function getConnect(){
            return $this->connection;
        }
}


?>

