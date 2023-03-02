<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    const LOW = 'low';
    const MEDIUM = 'medium';
    const HIGHT = 'hight';
    const RISK = 'risk';

    protected $fillable = [
        'title',
        'content',
        'complated_at',
        'due_date',
        'priority',
        'user_id',
        'project_id'
    ];

    protected $dates = ['due_dates'];

    public static function getPriority()
    {
        return [
            'low' => self::LOW,
            'medium' => self::MEDIUM,
            'hight' => self::HIGHT,
            'risk' => self::RISK
        ];
    }
    public function tags(){

        return $this->belongsToMany(Tag::class, 'todo_tag', 'todo_id', 'tag_id');
    }

    public function projects(){

        return $this->belongsToMany(Project::class , 'project_id', 'todo_id');
    }

}
