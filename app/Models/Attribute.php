<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attribute extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'attributes';
    protected $primaryKey = 'id';

    protected $fillable =[
        'attribute_weight',
        'attribute_height',
        'attribute_length',
        'attribute_width'
    ];
    protected $cast = [
        'attribute_weight' => 'integer',
        'attribute_height' => 'integer',
        'attribute_length' => 'integer',
        'attribute_width' => 'integer'
    ];
}
