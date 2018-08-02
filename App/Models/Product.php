<?php

namespace App\Models;


use PDO;

class Product extends Model
{
    public $table = 'products';

    public $name;
    public $price;
    public $type_id;
    public $created_at;


    public function find($id){
        $sql = "SELECT * FROM $this->table where id=:id";
        $statement = $this->conn->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
        return $statement->fetchObject(self::class);
    }




    public function type(){
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }


}