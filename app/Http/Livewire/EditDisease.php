<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Admin\Disease;
use App\Models\Admin\Plant;
use Auth;

class EditDisease extends Component
{
    public $disease;
    public $name;
    public $description;
    public $newPlant;
    public $selectedPlants = [];
    public $plants;


    public function mount(Disease $disease)
    {
        $this->disease = $disease;
        $this->name = $disease->name;
        $this->description = $disease->description;
        $this->selectedPlants = $disease->plants->pluck('id')->toArray();
        $this->plants = Plant::all();

    }


    public function hydrate()
    {
        $this->emit('select2');
    }

    public function removePlant($plantId)
    {
        $this->selectedPlants = array_diff($this->selectedPlants, [$plantId]);
    }

    public function updateDisease()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        if (count($this->getErrorBag()->all()) > 0) {
            $firstError = array_shift($this->getErrorBag()->all());
            $this->emit('notifyError', $firstError);
        } else {
            $this->disease->update([
                'name'=> $this->name,
                'description'=> $this->description
            ]);
            if(count($this->selectedPlants) > 0){

                $this->disease->plants()->detach();
                $this->disease->plants()->sync($this->selectedPlants);

            }else{
                $this->disease->plants()->detach();
            }

            $this->emit('diseaseSaved','success', 'Disease Updated successfully');
            // return redirect('/admin/disease');
        }
    }
    public function render()
    {
        return view('livewire.edit-disease');
    }
}
