<?php
/**
 * Created by PhpStorm.
 * User: Agris
 * Date: 02.08.2018
 * Time: 0:07
 */

namespace App\Models;


class Type extends Model
{
    protected $table = 'types';

    public function sizes(){
        return $this->belongsToMany();
    }

}