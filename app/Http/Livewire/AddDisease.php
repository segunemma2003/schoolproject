<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Admin\Disease;
use App\Models\Admin\Plant;

use Auth;

class AddDisease extends Component
{

    public $name;
    public $description;
    public $selectedPlants = [];
    public $plants;



    public function mount()
    {
        $this->plants = Plant::all();

    }


    public function hydrate()
    {
        $this->emit('select2');
    }

    public function saveDisease(){
        $validatedData = $this->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        if (count($this->getErrorBag()->all()) > 0) {
            $firstError = array_shift($this->getErrorBag()->all());
            $this->emit('notifyError', $firstError);
        } else {

            $disease = Disease::create([
                'name'=> $this->name,
                'description'=> $this->description,
                'user_id'=>auth()->user()->id
            ]);
            if(count($this->selectedPlants)>0){
                // $selectedPlants = array_map('intval', $this->selectedPlants);
                $disease->plants()->sync($this->selectedPlants);
            }

            $this->emit('diseaseSaved','success', 'Disease saved successfully'.count($this->selectedPlants));
            // $this->resetValidation();
            // $this->reset(['name', 'description','selectedPlants']);
            return redirect('/admin/disease');
        }

    }
    public function render()
    {
        return view('livewire.add-disease');
    }
}
