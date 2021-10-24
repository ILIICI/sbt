<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $table = 'products';
    protected $primaryKey = 'id';
    
    protected $fillable =[
        'product_title',
        'product_description',
        'product_price',
        'product_attributes'
    ];
    protected $cast = [
        'product_title' => 'string',
        'product_description' => 'string',
        'product_price' => 'integer'
    ];

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
    
    public function attributes(){
        return $this->hasOne(Attribute::class);
    }
}
