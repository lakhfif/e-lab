<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $fillable = ['titre','article','file'];

    public static function readMoreHelper($story_desc, $chars = 255) {
	$story_desc = substr($story_desc,0,$chars);  
	$story_desc = substr($story_desc,0,strrpos($story_desc,' '));  
	 
	return $story_desc;  
} 


}
