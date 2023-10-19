<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;
use App\Models\Admin\Plant;
use App\Models\Admin\Disease;
use Auth;

class AddPlant extends Component
{
    use WithFileUploads;

    public $family;
    public $species;
    public $yoruba;
    public $hausa;
    public $igbo;
    public $common_name;
    public $part_used;
    public $medicinal_use;
    public $picture;
    public $price;

    public $selectedDiseases = [];
    public $diseases;



    public function mount()
    {
        $this->diseases = Disease::all();

    }

    public function hydrate()
    {
        $this->emit('select2');
    }

    public function savePlant()
    {
        $validatedData = $this->validate([
            'family' => 'required',
            'species' => 'required',
            'yoruba' => 'required',
            'hausa' => 'required',
            'igbo' => 'required',
            'common_name' => 'required',
            'part_used' => 'required',
            'medicinal_use' => 'required',
            'picture' => 'image|max:1024', // You can adjust the max file size as needed.
            'price' => 'required|numeric',
        ]);

        if (count($this->getErrorBag()->all()) > 0) {
            $firstError = array_shift($this->getErrorBag()->all());
            $this->emit('notifyError', $firstError);
        } else {
        $plant = Plant::create([
            'family' => $this->family,
            'species' => $this->species,
            'yoruba' => $this->yoruba,
            'hausa' => $this->hausa,
            'igbo' => $this->igbo,
            'common_name' => $this->common_name,
            'part_used' => $this->part_used,
            'medicinal_use' => $this->medicinal_use,
            'price' => $this->price,
            'user_id' => auth()->user()->id
        ]);

        if ($this->picture) {
            $picturePath = $this->picture->store('admin/plants', 'public');
            $plant->update(['picture' => $picturePath]);

            $image = Image::make(public_path('storage/' . $picturePath));
            $image->save();
        }

        if(count($this->selectedDiseases)>0){
            // $selectedPlants = array_map('intval', $this->selectedPlants);
            $plant->diseases()->sync($this->selectedDiseases);
        }


        // Emit a success event to the front-end
        $this->emit('plantSaved','success', 'Plant saved successfully');
    }
        // Clear the form fields after saving
        // $this->resetValidation();
        // $this->reset(['family', 'species', 'yoruba', 'hausa', 'igbo', 'common_name', 'part_used', 'medicinal_use', 'picture', 'price']);

        return redirect('/admin/plant');
    }

    public function render()
    {
        return view('livewire.add-plant');
    }
}
