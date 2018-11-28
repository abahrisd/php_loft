<?php

namespace App\Models;

use Illuminate\Database\Capsule\Manager as Capsule;
use App\Config;

class MainModel
{
    protected $capsule;

    public function __construct()
    {
        $this->capsule = new Capsule;
        $this->capsule->addConnection([
            'driver'    => 'mysql',
            'host'      => '127.0.0.1',
            'database'  => Config::$dbname,
            'username'  => 'root',
//            'password'  => '',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);
        // Make this Capsule instance available globally via static methods... (optional)
        $this->capsule->setAsGlobal();
        // Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
        $this->capsule->bootEloquent();
    }

    public function getUserByEmail($email)
    {
        return $this->capsule->table('users')
            ->where([
                ['user_email', '=', $email],
            ])
            ->select(['user_id', 'user_name', 'password_hash', 'user_age', 'user_description', 'user_photo', 'user_email'])
            ->first();
    }

    public function isEmailExist($email)
    {
        return !empty($this->capsule->table('users')
            ->where([
                ['user_email', '=', $email],
            ])
            ->select(['user_id'])
            ->first());
    }

    /**
     * Проверяет наличие почты в системе и доавляет нового пользователя
     * @param $email
     * @param $password
     * @return array
     */
    public function registerUser($email, $password)
    {

        if ($this->isEmailExist($email)) {
            return ['error' => 'Данный email уже существует в системе'];
        }

        $userId = $this->capsule->table('users')
            ->insertGetId([
                'user_email' => $email,
                'password_hash' => password_hash($password, PASSWORD_DEFAULT)
                ], 'user_id');

        return ['id' => $userId];
    }
}
