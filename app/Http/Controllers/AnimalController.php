<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index() {
        return Animal::paginate(20);
    }

    public function create(Request $request) {

        $request->validate([
            'type_of_animal' => 'required',
            'name' => 'required',
            'age' => 'required',
            'about_the_animal' => 'required',
            'eat' => 'required'
        ]);

        return Animal::create($request->all());
    }

    public function show($id) {
        return Animal::find($id);
    }

    public function edit(Request $request, $id) {
        $animal = Animal::find($id);
        $animal->update($request->all());
        return $animal;
    }

    public function destroy($id) {
        $dalete = Animal::destroy($id);
        if($dalete) {
            return response([
                'message' => 'animals deleted succesfully'
            ],200);
        }else {
            return response([
                'message' => 'not animals'
            ],404); 
        }
    }
}
