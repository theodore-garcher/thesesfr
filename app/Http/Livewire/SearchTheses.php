<?php

namespace App\Http\Livewire;

use App\Models\These;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class SearchTheses extends Component
{
    use WithPagination;

    public $search = "";
    //protected $queryString = ['search'];

    public function render()
    {
        return view('livewire.search-theses', [
                'theses' => These::where('auteur', 'like', '%'.$this->search.'%')
                    ->orWhere('titre', 'like', '%'.$this->search.'%')
                    ->paginate(100)
            ]
        );
    }
}
