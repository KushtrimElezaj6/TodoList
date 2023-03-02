<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodosTgas extends Model
{
    use HasFactory;

    protected $fillable = ['todo_id', 'tag_id'];
}
