<?php

namespace App\Controllers;


use App\Models\Product;
use Libs\Helper;
use PDO;

class ProductController extends Controller
{
    public function index()
    {

        $product = (new Product())
            ->with('type')
            ->get();

        Helper::printBlock($product);

        die;


        $sql = "SELECT * FROM products";
        $statement = $this->conn->prepare($sql);
        $statement->execute();
        $product = $statement->fetchAll(PDO::FETCH_ASSOC);
        http_response_code(200);
        echo json_encode($product);
    }

    public function show($id)
    {

        $product = (new Product())->find($id);

        Helper::printBlock($product);

        die;


        $sql = "SELECT * FROM products where id=:id";
        $statement = $this->conn->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();


        $product = $statement->fetchObject(Product::class);
        Helper::printBlock($product);
        die;




        $product = $statement->fetchAll(PDO::FETCH_ASSOC);
        $product = array_shift($product);
        http_response_code(200);
        echo json_encode($product);
    }

    public function store()
    {
        $post = $_POST;
        if (isset($post['name'])) {
            $sql = "INSERT INTO products (name) VALUES (:name)";
            $statement = $this->conn->prepare($sql);
            $statement->bindParam(':name', $post['name']);
            if ($statement->execute()) {
                http_response_code(200);
                echo json_encode(['Status' => 'success']);
            } else {
                http_response_code(400);
                echo json_encode(['Error' => 'Malformed request']);
            }
        } else {
            http_response_code(400);
            echo json_encode(['Error' => 'Malformed request']);
        }
    }

    public function update($id)
    {

        parse_str(file_get_contents("php://input"), $put);

        foreach ($put as $key => $value) {
            unset($put[$key]);
            $put[str_replace('amp;', '', $key)] = $value;
        }

        if (isset($put['name'])) {
            $sql = "UPDATE products SET name=:name WHERE id=:id";
            $statement = $this->conn->prepare($sql);
            $statement->bindParam(':name', $put['name']);
            $statement->bindParam(':id', $id);
            if ($statement->execute()) {
                http_response_code(200);
                echo json_encode(['Status' => 'success']);
            } else {
                http_response_code(400);
                echo json_encode(['Error' => 'Malformed request']);
            }
        } else {
            http_response_code(400);
            echo json_encode(['Error' => 'Malformed request']);
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM products where id=:id";
        $statement = $this->conn->prepare($sql);
        $statement->bindParam(':id', $id);
        if ($statement->execute()) {
            http_response_code(200);
            echo json_encode(['Status' => 'success']);
        } else {
            http_response_code(400);
            echo json_encode(['Error' => 'Malformed request']);
        }
    }
}