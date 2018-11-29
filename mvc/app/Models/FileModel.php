<?php

namespace App\Models;

class FileModel extends MainModel
{

    /**
     * Добавляет путь до фото в базу и возвращает photo_id добавленной записи
     * @param $photoPath
     * @param $user_id
     * @return boolean
     */
    public function addPhoto($photoPath, $user_id)
    {
        return $this->capsule->table('photos')
            ->insertGetId([
                'photo_path' => $photoPath,
                'user_id' => $user_id
            ], 'photo_id');
    }

    /**
     * Возвращает все файлы загруженные пользователем
     * @param $email
     */
    public function getUserFiles($email)
    {
        return $this->capsule->table('photos')
            ->leftJoin('users', 'users.user_id', '=', 'photos.user_id')
            ->where('users.user_email', '=', $email)
            ->select(['photos.photo_path'])
            ->get();
    }
}
