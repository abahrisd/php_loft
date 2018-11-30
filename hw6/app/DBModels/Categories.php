<?php

namespace App\DBModels;

//use Illuminate\Database\Eloquent\Model as EloquentModel;

class Category extends Illuminate\Database\Eloquent\Model
{
    protected $fillable = ['category_name'];//разрешено редактировать только это, остальное запрещено
//    protected $guarded = ['id']; //запрещено редактировать только это, все остальное разрешено
    //created_at - дата создания
    //update_at - дата последнего редактирования
//    public $timestamps = false;
    public $table = "category";
    protected $primaryKey = 'category_id';


    public function products()
    {
        return $this->hasMany('Product', 'category_id', 'category_id');
    }
}
