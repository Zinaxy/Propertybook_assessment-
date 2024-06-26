<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurStory extends Model
{
    use HasFactory;

    protected $fillable = [
             'heading',
            'about_us',
            'vision',
            'history',
            'cover',
        ];
}
