<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guitar extends Model
{
    use HasFactory;

    protected $table = 'guitars'; //table name for which is model

    protected $fillable = ['manufacturer', 'number_of_strings', 'type', 'model']; //all the fields that will be filled
}
