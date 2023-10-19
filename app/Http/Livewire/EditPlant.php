<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;
use App\Models\Admin\Plant;
use App\Models\Admin\Disease;
use Auth;

class EditPlant extends Component
{
    use WithFileUploads;

    public $plant;
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

    public $newDisease;
    public $selectedDiseases = [];
    public $diseases;

    public function mount(Plant $plant)
    {
        $this->plant = $plant;
        $this->family = $plant->family;
        $this->species = $plant->species;
        $this->yoruba = $plant->yoruba;
        $this->hausa = $plant->hausa;
        $this->igbo = $plant->igbo;
        $this->common_name = $plant->common_name;
        $this->part_used = $plant->part_used;
        $this->medicinal_use = $plant->medicinal_use;
        $this->price = $plant->price;
        $this->diseases = Disease::all();
        $this->selectedDiseases = $plant->diseases->pluck('id')->toArray();
    }


    public function hydrate()
    {
        $this->emit('select2');
    }


    public function removeDisease($diseaseId)
    {
        $this->selectedDiseases = array_diff($this->selectedDiseases, [$diseaseId]);
    }

    public function updatePlant()
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
            'picture' => 'nullable|image|max:1024', // You can adjust the max file size as needed.
            'price' => 'required|numeric',
        ]);

        if (count($this->getErrorBag()->all()) > 0) {
            $firstError = array_shift($this->getErrorBag()->all());
            $this->emit('notifyError', $firstError);
        } else {
            if ($this->picture) {
                $picturePath = $this->picture->store('admin/plants', 'public');

                // Update the plant's picture with the new path
                $this->plant->update(['picture' => $picturePath]);

                $image = Image::make(public_path('storage/' . $picturePath));
                $image->resize(200, 200); // Resize the image to a specific size
                $image->save();
            }

            $this->plant->update([
                'family' => $this->family,
                'species' => $this->species,
                'yoruba' => $this->yoruba,
                'hausa' => $this->hausa,
                'igbo' => $this->igbo,
                'common_name' => $this->common_name,
                'part_used' => $this->part_used,
                'medicinal_use' => $this->medicinal_use,
                'price' => $this->price,
            ]);

            if(count($this->selectedDiseases) > 0){

                $this->plant->diseases()->detach();
                $this->plant->diseases()->sync($this->selectedDiseases);

            }else{
                $this->plant->diseases()->detach();
            }

            // Emit a success event to the front-end
            $this->emit('plantSaved', 'success', 'Plant updated successfully');
            return redirect('/admin/plant');
        }
    }

    public function render()
    {
        return view('livewire.edit-plant');
    }
}
