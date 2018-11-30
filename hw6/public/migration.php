<?php

require_once "../vendor/autoload.php";
require_once "../app/config.php";

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as CapsuleManager;

CapsuleManager::schema()->dropIfExists('products');
CapsuleManager::schema()->create('products', function (Blueprint $table) {
    $table->increments('product_id');
    $table->string('product_name'); //varchar 255
    $table->integer('category_id'); //varchar 255
    $table->integer('product_price')->default(0);
    $table->timestamps(); //created_at&updated_at тип datetime
});
//=========================
/*CapsuleManager::schema()->table('products', function (Blueprint $table) {
    $table->string('product_description');
});*/
CapsuleManager::schema()->dropIfExists('categories');
CapsuleManager::schema()->create('categories', function (Blueprint $table) {
    $table->increments('category_id');
    $table->string('category_name'); //varchar 255
    $table->timestamps(); //created_at&updated_at тип datetime
});
