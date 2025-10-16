<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    // Allow these fields to be mass-assigned
    protected $fillable = [
        'title',
        'authors',
        'year',
        'link',
    ];
}
