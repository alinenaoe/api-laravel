<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Professional;

class ProfessionalController extends Controller
{
    public function list(Request $request) {
        $professionalsList = Professional::all();
        //return view ('/profissionais', ['list'=>$list] ); -- seria isso se não fosse API
        return response()->json($professionalsList);
    }

    public function create(Request $request) {
        $newProfessional = new Professional();
        $newProfessional->name = $request->name;
        $newProfessional->github = $request->github;

        $result = $newProfessional->save(); //coloca em result para fazer validações - o result dá true or false

        return response()->json($newProfessional); //usa o $newProfessional pq o $result é só verdadeiro ou falso
    }
}
