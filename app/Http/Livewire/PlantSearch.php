<?php

namespace App\Http\Livewire;
use App\Models\Admin\Plant;
use Livewire\WithPagination;

use Livewire\Component;

class PlantSearch extends Component
{
    protected $debug = true;
    public $searchTerm = '';



    public function render()
    {

        sleep(1);
        $searchTerm = strtolower($this->searchTerm);

            return view('livewire.plant-search', [
                'plants' =>  Plant::whereRaw('LOWER(common_name) LIKE ?', ["%{$searchTerm}%"])
                ->orWhereRaw('LOWER(scientific_name) LIKE ?', ["%{$searchTerm}%"])
                ->orWhereRaw('LOWER(okun) LIKE ?', ["%{$searchTerm}%"])
                ->orWhereRaw('LOWER(igala) LIKE ?', ["%{$searchTerm}%"])
                ->orWhereRaw('LOWER(ebira) LIKE ?', ["%{$searchTerm}%"])
                ->orWhereRaw('LOWER(family) LIKE ?', ["%{$searchTerm}%"])
                ->paginate(20)
            ]);

    }
}
