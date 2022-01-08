<?php

namespace App\Http\Controllers;

use App\Models\These;
use Illuminate\Http\Request;

class ThesesApiController extends Controller
{
    public function thesesApi(Request $request) {
        $inputJSON = $request->json()->all();
        $output_auteur = $inputJSON["auteur"];
        $output_titre = $inputJSON["titre"];

        $result = These::query();
        if ($output_auteur != "") {
            $result->where('auteur', 'like', '%'.$output_auteur.'%');
        }
        if ($output_titre != "") {
            $result->where('titre', 'like', '%'.$output_titre.'%');
        }
        $result = $result->get();
        $resp = array (
        );
        foreach ($result as $these) {
            $resp[] = array(
                "titre" => $these->titre,
                "auteur" => $these->auteur,
                "id_auteur" => $these->id_auteur,
                "directeur" => $these->directeur,
                "etablissement_soutenance" => $these->etablissement_soutenance,
                "discipline" => $these->discipline,
                "date_publi" => $these->publi_thesesfr,
                "id_these" => $these->id_these
            );
        }
        return response()->json($resp,200, ['Charset' => 'utf-8'],JSON_UNESCAPED_UNICODE);
    }
}
