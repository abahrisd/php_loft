<?php

namespace App\Models;

class UserModel extends MainModel
{

    public function getUserById($userId)
    {
        return $this->capsule->table('users')
            ->leftJoin('photos', 'users.photo_id', '=', 'photos.photo_id')
            ->where([
                ['users.user_id', '=', $userId],
            ])
            ->select(['users.user_id', 'users.user_name', 'users.user_age', 'users.user_description', 'photos.photo_path', 'users.user_email'])
            ->first();
    }

    public function getAllUsers($sort)
    {
        if (!in_array($sort, ['asc', 'desc'])) {
            $sort = 'asc';
        }

        return $this->capsule->table('users')
            ->leftJoin('photos', 'users.photo_id', '=', 'photos.photo_id')
            ->select(['users.user_name', 'users.user_age', 'users.user_description', 'photos.photo_path', 'users.user_email'])
            ->orderBy('user_age', $sort)
            ->get();
    }

    public function updateUserById($params)
    {
        $update = [
            'user_name' => $params['user_name'],
            'user_age' => $params['user_age'],
            'user_description' => $params['user_description']
        ];

        if ($params['photo_id']) {
            $update['photo_id'] = $params['photo_id'];
        }

        return $this->capsule->table('users')
            ->where([
                ['user_id', '=', $params['user_id']],
            ])
            ->update($update);
    }
}
