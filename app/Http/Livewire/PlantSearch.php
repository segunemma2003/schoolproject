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


            return view('livewire.plant-search', [
                'plants' => Plant::where('common_name', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('scientific_name', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('okun', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('igala', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('ebira', 'like', '%' . $this->searchTerm . '%')
                ->paginate(20),
            ]);

    }
}
