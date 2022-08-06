<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    public static function getProducts(){
        return DB::table('products')
        ->get();
    }

    //global create
    public static function addDataTable($table='', $data='')
    {   
                DB::table($table)
                ->insert($data);
        return DB::getPdo()->lastInsertId();
    }

    public static function getProductDetails($id){
        return DB::table('products')
        ->where('id',$id)
        ->first();
    }

    public static function updateDataTable($table='', $data='')
    {
                DB::table($table)
                ->where('id', $data['id'])
                ->update($data);
        return  DB::table($table)
                ->where('id', $data['id'])
                ->first();
    }

    public static function deleteProduct($id){
        return DB::table('products')
            ->where('id', $id)
            ->delete();
    }
}
