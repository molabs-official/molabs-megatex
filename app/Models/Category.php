<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'name', 'category_image', 'meta_data', 'meta_description'];

    /**
     * This is used to get categories
     *
     * @param $params
     * @return mixed
     */
    public static function getCategories($params)
    {
        $url = $params['url'];
        return Category::select(
            DB::raw("CONCAT('$url', '/' ,image) as image"),
            'name',
            'id',
            'user_id'
        )->paginate(50);
    }
}
