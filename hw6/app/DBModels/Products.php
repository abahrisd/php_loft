<?php

namespace App\DBModels;

//use Illuminate\Database\Eloquent\Model as EloquentModel;

class Product extends Illuminate\Database\Eloquent\Model
{
    protected $fillable = ['product_name', 'product_price'];//разрешено редактировать только это, остальное запрещено
//    protected $guarded = ['id']; //запрещено редактировать только это, все остальное разрешено
    //created_at - дата создания
    //update_at - дата последнего редактирования
//    public $timestamps = false;
    public $table = "products";
    protected $primaryKey = 'product_id';

    public function cetegoryData()
    {
        return $this->belongsTo('Category', 'category_id', 'category_id');
    }
}
