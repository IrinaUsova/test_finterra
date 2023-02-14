<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Man extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'men'; //Явно объявляем таблицу (для удобства)
    protected $guarded = []; //разрешаем create в базу
}
