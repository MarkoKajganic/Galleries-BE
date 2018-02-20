<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    //Seeder will automatically try to fill created_at and updated_at unless
    //we explicitly tell it not to do that by adding this:
	public $timestamps = false;
	
	//This is allowing us to use mass assignment
	protected $fillable = [
        'title', 'description', 'image_urls', 
    ];

    //Making Accessor & Mutator
    // protected $casts = [
    //   'image_urls' => 'array'
    // ];

    public static function search($term)      //($term, $skip, $take)
    {
        return self::where('title', 'LIKE', '%'.$term.'%')->get();
        //return self::where('title', 'LIKE', '%'.$term.'%')->skip($skip)->take($take)->get();
    }

    public function author() {
        return $this->hasOne(User::class);
    }

}