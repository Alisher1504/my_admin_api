<?php

namespace App\Http\Controllers;

use App\Models\CrudModel;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    
    
    public function index() {
        return CrudModel::all();
    }


    public function create(Request $request) {

        $validate = $request->validate([
            'name' => ['required'],
            'title' => ['required'],
            'description' => ['required'],
            'meta_title' => ['required'],
            'meta_description' => ['required'],
            'meta_keyvord' => ['required'],
        ]);

        $respons = CrudModel::create([
            'name' => $request->name,
            'title' => $request->title,
            'description' => $request->description,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keyvord' => $request->meta_keyvord,
        ]);

        return $respons;

    }

}
