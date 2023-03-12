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

        CrudModel::create([
            'name' => $request->name,
            'title' => $request->title,
            'description' => $request->description,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keyvord' => $request->meta_keyvord,
        ]);

        return [
            'message' => 'Crud create successfully'
        ];

    }

    public function update(Request $request, $id) {

        $crud = CrudModel::findOrFail($id);

        $res = $request->validate([
            'name' => ['required'],
            'title' => ['required'],
            'description' => ['required'],
            'meta_title' => ['required'],
            'meta_description' => ['required'],
            'meta_keyvord' => ['required'],
        ]);

        $crud->update([
            'name' => $request->name,
            'title' => $request->title,
            'description' => $request->description,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keyvord' => $request->meta_keyvord,
        ]);

        return [
            'message' => 'Update crud successfully'
        ];

    }

    public function delete($id) {

        $delete = CrudModel::findOrFail($id);
        $delete->delete();

        return [
            'message' => 'crud delete successfully'
        ];

    }

    public function show($id) {

        if($show = CrudModel::findOrFail($id)){
            return $show;
        }
        
        return [
            'message' => 'crud not found'
        ];

    }



}
