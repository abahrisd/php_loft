<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class UserPopulateModel extends EloquentModel
{
    protected $guarded = ['user_id', 'photo_id'];
    public $timestamps = false;
    public $table = "users";
    protected $primaryKey = 'user_id';
}
