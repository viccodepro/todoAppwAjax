<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    // We defined a table variable here if the database table name is different from the plural of the model 
    // EG: 
    // protected $table = 'table_name';
}
