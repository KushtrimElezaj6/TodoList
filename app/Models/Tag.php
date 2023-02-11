<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function todo()
    {
        return $this->belongsToMany(Todo::class, 'todo_tags, todo_id', 'tag_id');
    }
}
