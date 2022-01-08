<?php

namespace App\Http\Livewire;

use App\Models\These;
use App\Models\Coordonnee;
use App\Models\Coord;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PageGraphiques extends Component
{
    public $search = "";
    protected $listeners = ["updateData", "dataUpdated"];

    public function mount() {
        $this->updateData();
    }

    public function updateData() {
        $years = DB::select("SELECT EXTRACT(YEAR FROM date_soutenance) as year, COUNT(*) as count FROM theses WHERE date_soutenance IS NOT NULL AND EXTRACT(YEAR FROM date_soutenance) NOT LIKE '1970' AND (auteur LIKE '%".$this->search."%' OR titre LIKE '%".$this->search."%') GROUP BY EXTRACT(YEAR FROM date_soutenance) ORDER BY EXTRACT(YEAR FROM date_soutenance)");
        $discs = DB::select("SELECT discipline, COUNT(discipline) as count FROM `theses` WHERE auteur LIKE '%".$this->search."%' OR titre LIKE '%".$this->search."%' GROUP BY discipline ORDER BY count DESC LIMIT 10");
        $etabs = DB::select("SELECT etablissement_soutenance, COUNT(etablissement_soutenance) as count FROM `theses` WHERE auteur LIKE '%".$this->search."%' OR titre LIKE '%".$this->search."%' GROUP BY etablissement_soutenance ORDER BY count DESC LIMIT 20");
        $coords = DB::select("SELECT DISTINCT(coordonnees.id_etablissement), latitude, longitude, etablissement_soutenance FROM `coordonnees` JOIN theses ON coordonnees.id_etablissement = theses.id_etablissement WHERE auteur LIKE '%".$this->search."%' OR titre LIKE '%".$this->search."%'");
        $this->dispatchBrowserEvent('dataUpdated', ['years' => $years, 'discs' => $discs, 'etabs' => $etabs, 'coords' => $coords]);
    }

    public function coordImport() {
        $data = DB::select("SELECT DISTINCT(id_etablissement) FROM `theses` WHERE id_etablissement IS NOT NULL");
        foreach ($data as $id) {
            //dd(json_decode(file_get_contents("https://data.enseignementsup-recherche.gouv.fr/api/records/1.0/search/?dataset=fr-esr-principaux-etablissements-enseignement-superieur&q=".$id->id_etablissement."&rows=10&fileds=identifiant_idref&fields=identifiant_idref,coordonnees"), true));
            $result = json_decode(file_get_contents("https://data.enseignementsup-recherche.gouv.fr/api/records/1.0/search/?dataset=fr-esr-principaux-etablissements-enseignement-superieur&q=".$id->id_etablissement."&rows=10&fileds=identifiant_idref&fields=identifiant_idref,coordonnees"), true);
            if ($result["nhits"] != 0) {
                $coordonnee = Coordonnee::firstOrCreate([
                    'id_etablissement' => $id->id_etablissement,
                    'longitude' => $result["records"][0]["fields"]["coordonnees"][0],
                    'latitude' => $result["records"][0]["fields"]["coordonnees"][1],
                ]);
            }
        }
    }

    public function render()
    {
        return view('livewire.page-graphiques');
    }
}
