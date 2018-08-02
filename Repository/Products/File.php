<?php

namespace Repository\Products;


use Libs\Helper;

class File implements IProduct
{

    private $fileName = "Products.txt";

    private $cols = ['id', 'name'];


    public function get()
    {
        $path =  getenv('STORAGE_FILE_DIR_PATH');

//        Helper::printBlock(var_dump($path));

        $this->fileHandle = fopen( $path.DIRECTORY_SEPARATOR.$this->fileName, "r" );

        $row = 0;
        while (($data = fgetcsv($this->fileHandle, 1000, "|")) !== FALSE) {
            echo "<p> fields $data[0] in line $row: <br /></p>\n";

            $row++;

        }


    }
}