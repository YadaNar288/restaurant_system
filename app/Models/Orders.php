<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'table_number', // or table_no if you used that
        'items',        // store as JSON or string
        'status',       // pending, in_progress, done
    ];

    // If items are stored as JSON, add this
    protected $casts = [
        'items' => 'array',
    ];
}
