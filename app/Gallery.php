<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    
	public $timestamps = false;
	
	protected $fillable = [
        'user_id', 'title', 'description', 'image_urls', 'created_at'
    ];


//FUNKCIJE
    public static function getAllGalleries() {
        return self::with('user')->get();
    }

    public static function getOneGallery($id) {     //With comments - lose resenje
        $gallery = self::with('user')->find($id);   //nadji galeriju
        $comments = new Comment();                  //da bi mogao da pozove funkciju iz Comment modela
        $gallery->comments = $comments->getComments($gallery->id); //nadji komentare i dodaj ih u galleriju
        return $gallery;
    }

    public static function getGalleriesFromSameUser($id) {
        return self::with('user')->where('user_id', 'LIKE', '%'.$id.'%')->get();
    }

    public static function storeGallery($request) {
        $user = new User();
        $idUser = $user->findId();

        return self::create([
            'user_id' => $idUser,
            'title' => $request['title'],
            'description' => $request['description'],
            'image_urls' => $request['image_urls'],
            'created_at' => date("Y-m-d H:i:s")
        ]);
    }

    public static function search($term)      //($term, $skip, $take)
    {
        return self::with('user')->where('title', 'LIKE', '%'.$term.'%')
                                 ->orWhere('description', 'LIKE', '%'.$term.'%')
                                 ->orWhereHas('user', function ($query) use ($term) {
                                    return $query->where('first_name', 'LIKE', '%' . $term . '%');
                                    })
                                 ->get();
    }

//RELACIJE
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

}