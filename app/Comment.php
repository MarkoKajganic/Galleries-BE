<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    
	
	protected $fillable = [
        'body'                  //i id-evi
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function gallery() {
        return $this->belongsTo(Gallery::class);
    }

    public function getComments($gallery_id) {
        return self::with('user')->where('gallery_id', 'LIKE', '%'.$gallery_id.'%')->get();
    }

}