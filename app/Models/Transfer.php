<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $fillable = [
        'men_from_id',
        'men_to_id',
        'sum',
        'date_transfer',
    ];
}
