<?php
/**
 * Created by PhpStorm.
 * User: Agris
 * Date: 01.08.2018
 * Time: 23:53
 */

namespace App\Models;


use Libs\Helper;
use PDO;
use PDOException;

class Model
{
    protected $conn;
    public $relations = [];

    public function __construct()
    {
        try {
            $this->conn = new PDO('mysql:host=' . env("DB_HOST") . ';dbname=' . env("DB_NAME"), env('DB_USER'), env('DB_PASSWORD'));
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            exit;
        }
    }

    public function getTableName()
    {
        return $this->table;
    }

    public function with($class)
    {
        $this->relations[] = $class;
        return $this;
    }

    public function belongsTo($className, $foreignKey, $localKey)
    {
        $class = new $className;
        $sql = "SELECT * FROM ".$class->getTableName()." WHERE  $localKey=:localKey";
        $statement = $this->conn->prepare($sql);
        $statement->bindParam(':localKey', $this->$foreignKey);
        $statement->execute();
        $relation = $statement->fetchObject( $className );
        return $relation;
    }

    public function belongsToMany($className, $table, $foreignKey, $localKey){
//        $class = new $className;
//        $sql = "SELECT * FROM ".$class->getTableName()." WHERE  $localKey=:localKey";
//
//
//        $statement = $this->conn->prepare($sql);
//        $statement->bindParam(':localKey', $this->$foreignKey);
//        $statement->execute();
//        $relation = $statement->fetchObject( $className );
//        return $relation;
    }



    public function get()
    {
        $sql = "SELECT * FROM $this->table";
        $statement = $this->conn->prepare($sql);
        $statement->execute();
        $products = $statement->fetchAll(PDO::FETCH_CLASS, get_called_class());

        foreach ($this->relations as $relation) {
            foreach ($products as &$product){
                $product->relations[$relation] = $product->$relation();
            }
        }

        Helper::printBlock($products);
        dd();

        return $products;
    }
}