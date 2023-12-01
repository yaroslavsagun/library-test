<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string name
 */
class Book extends Model
{


    use HasFactory;

    public function publishers()
    {
        return $this->belongsToMany(Publisher::class, "book_publisher");
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class, "book_author");
    }
}
