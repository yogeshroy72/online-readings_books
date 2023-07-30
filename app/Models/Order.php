<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'book_id',
        'address',
        'phone',
        'select_mode',
        'price'
    ];
    
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
    
}
