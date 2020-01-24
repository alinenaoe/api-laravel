<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Professional;
use App\Tecnology;
use Illuminate\Support\Facades\DB;

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

        $tecnologyId = $request->tecnology;
        $tecnology = Tecnology::find($tecnologyId);

        $result = $newProfessional->save(); //coloca em result para fazer validações - o result dá true or false

        if($tecnology) {
            $tecnology->professionals()->attach($newProfessional->id);
        } else {
            return response()->json(["error"=>"O ID da tecnologia não existe"]);
        }

        // DB::table('professionals_tecnologies')->insert([
        //     ['professional_id' => $newProfessional->id, 'tecnology_id' => $tecnologyId],
        // ]);
      
        return response()->json($newProfessional); //usa o $newProfessional pq o $result é só verdadeiro ou falso
    }
}
