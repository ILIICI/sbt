<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tags';
    protected $primaryKey = 'id';
    
    protected $fillable =[
        'tag_name'
    ];
    protected $cast = [
        'tag_name' => 'string' 
    ];

    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
