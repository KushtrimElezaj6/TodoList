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
        'priority'
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
}
