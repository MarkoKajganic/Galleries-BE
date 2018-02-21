<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use App\User;

class GalleriesController extends Controller
{
   
    
    public function index()
    {
        $term = request()->input('term');
        if ($term) {
            return Gallery::search($term);
        } else {
            return Gallery::getAllGalleries();
        }

    }


    public function show($id)
    {
        return Gallery::getOneGallery($id);
    }


    public function store(Request $request)
    {
        return Gallery::create($request->all());
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


