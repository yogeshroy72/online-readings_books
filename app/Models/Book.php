<?php

namespace App\Models;

use App\Models\Author;
use App\Models\Category;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Book extends Model  implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $fillable=[
        'name',
        'description',
        'category_id',
        'author_id',
        'quantity',
        'status',
        'price',
       
    ];
    /**
     * Get the user that owns the Book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
   
    /**
     * Get the user that owns the Book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
   public function category(){
     return  $this->belongsTo(Category::class);
   
    }
   public function author(){
     return  $this->belongsTo(Author::class);
   
    }
}

