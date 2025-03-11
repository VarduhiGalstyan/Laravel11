<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'name',
        'description',
        'date_of_birth',
    ];

    public function images(){
        return $this->hasMany(ProductImage::class);
    }
}
