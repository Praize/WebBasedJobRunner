<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $table = 'jobs';

    protected $fillable = [

        'queue',
        'payload',
        'reserved_at',
        'priority', 
        'delay', 
        'created_at', 
        'attempts', 
        'available_at'
    ];
}
