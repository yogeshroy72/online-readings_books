<?php

namespace App\Models;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model  implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $fillable=[
        'name',
        'description',
        'status',
       
    ];
}
