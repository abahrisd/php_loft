<?php

namespace App\Models;

class UserModel extends MainModel
{

    public function getUserById($userId)
    {
        return $this->capsule->table('users')
            ->where([
                ['user_id', '=', $userId],
            ])
            ->select(['user_id', 'user_name', 'user_age', 'user_description', 'user_photo', 'user_email'])
            ->first();
    }
}
