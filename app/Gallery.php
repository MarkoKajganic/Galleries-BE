<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    
	public $timestamps = false;
	
	protected $fillable = [
        'title', 'description', 'image_urls', 
    ];

    //Making Accessor & Mutator
    // protected $casts = [
    //   'image_urls' => 'array'
    // ];

    public static function getAllGalleries() {
        return self::with('user')->get();
    }

    public static function getOneGallery($id) {
        return self::with('user')->find($id);
    }

    public static function search($term)      //($term, $skip, $take)
    {
        return self::with('user')->where('title', 'LIKE', '%'.$term.'%')
                                 ->orWhere('description', 'LIKE', '%'.$term.'%')->get();
                                 

        
        //return self::where('title', 'LIKE', '%'.$term.'%')->skip($skip)->take($take)->get();
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

}