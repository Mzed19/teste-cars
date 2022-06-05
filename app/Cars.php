<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    use HasFactory;

    protected $fillable = [
        'img',
        'city',
        'brand',
        'model',
        'description',
        'year',
        'mileage',
        'exchange',
        'store_phone',
        'value'];
}
