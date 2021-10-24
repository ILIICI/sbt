<?php

namespace App\Http\Controllers;

use App\Models\Tag;
class TagController extends Controller
{
    public static function getAllTags(){
        $tags = (new Tag)->get();
        return $tags;
    }
}
