<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function authors()
    {
        $this->belongsToMany(Author::class , 'book_author');
    }

    public function catrgories()
    {
        $this->belongsTo(Category::class);
    }

    public function publishers()
    {
        $this->belongsTo(Publisher::class);
    }

}
