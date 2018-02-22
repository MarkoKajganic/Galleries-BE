<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use App\User;

class GalleriesController extends Controller
{
   
    //prikazi sve
    public function index()
    {
        $user = request()->input('user_id');
        $term = request()->input('term');

        if ($term) {
            return Gallery::search($term);

        } elseif ($user) {
            return Gallery::getGalleriesFromSameUser($user);

        } else {
            return Gallery::getAllGalleries();
        }

    }

    //prikazi jednu galeriju
    public function show($id)
    {
        return Gallery::getOneGallery($id);
    }


    public function store(Request $request)
    {
        return Gallery::storeGallery($request->all());
    }


    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->update($request->all());
        return $gallery;
    }


    public function destroy($id)
    {
        Gallery::destroy($id);
    }
}


