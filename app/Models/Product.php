<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','name','category_id','image','product_code','product_brand','description','purchase_price','price','ingredients','meta_data','meta_description'];

    /**
     * This is used to get products data
     *
     * @param $params
     * @return mixed
     */
    public static function getProducts($params)
    {
        $url = $params['url'];
        return Product::select(
            DB::raw("CONCAT('$url','/',image) as image"),
            'name', 'id', 'price', 'product_brand', 'product_code', 'ingredients', 'description', 'category_id', 'user_id'
        )->paginate(50);
    }

    /**
     * This is used to get user products
     *
     * @param $params
     * @return mixed
     */
    public static function getUserProductList($params)
    {
        $url = $params['url'];
        $id = $params['id'];
        return Product::select('name','id','price','description','user_id',
            DB::raw("CONCAT('$url', '/' ,image) as image")
        )->where('category_id',$id)->get()->toArray();
    }
}
