<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;

class GalleriesController extends Controller
{
   
    
    public function index()
    {
        return Gallery::all();
    }


    public function show($id)
    {
        return Gallery::findOrFail($id);
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


