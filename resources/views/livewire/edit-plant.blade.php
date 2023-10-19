<div>
    <form wire:submit.prevent="updatePlant">
        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
                <p class="text-red">{{ $error }}</p><br />
            @endforeach
        @endif

        <div class="row">
            <div class="col-md-6">
                <label class="form-label" for="family">Family<span class="text-danger">*</span></label>
                <input type="text" wire:model.defer="family" id="family" class="form-control" placeholder="Family" name="family" value="{{ $family ?? old('family') }} }}">
                @error('family') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="species">Species<span class="text-danger">*</span></label>
                <input type="text" wire:model="species" id="species" class="form-control" placeholder="Species" name="species">
                @error('species') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label class="form-label" for="yoruba">Yoruba<span class="text-danger">*</span></label>
                <input type="text" wire:model="yoruba" id="yoruba" class="form-control" placeholder="Yoruba" name="yoruba">
                @error('yoruba') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="hausa">Hausa<span class="text-danger">*</span></label>
                <input type="text" wire:model="hausa" id="hausa" class="form-control" placeholder="Hausa" name="hausa">
                @error('hausa') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label class="form-label" for="igbo">Igbo<span class="text-danger">*</span></label>
                <input type="text" wire:model="igbo" id="igbo" class="form-control" placeholder="Igbo" name="igbo">
                @error('igbo') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="common_name">Common Name<span class="text-danger">*</span></label>
                <input type="text" wire:model="common_name" id="common_name" class="form-control" placeholder="Common Name" name="common_name">
                @error('common_name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label class="form-label" for="part_used">Part Used<span class="text-danger">*</span></label>
                <input type="text" wire:model="part_used" id="part_used" class="form-control" placeholder="Part Used" name="part_used">
                @error('part_used') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="medicinal_use">Medicinal Use<span class="text-danger">*</span></label>
                <input type="text" wire:model="medicinal_use" id="medicinal_use" class="form-control" placeholder="Medicinal Use" name="medicinal_use">
                @error('medicinal_use') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label class="form-label" for="picture">Picture<span class="text-danger">*</span></label>
                <input type="file" wire:model="picture" id="picture" class="form-control" placeholder="Picture" name="picture">
                @if ($picture)
                    <img src="{{ $picture->temporaryUrl() }}" alt="Uploaded Image" class="img-thumbnail">
                @endif
                @error('picture') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="price">Price<span class="text-danger">*</span></label>
                <input type="number" wire:model="price" id="price" class="form-control" placeholder="Price" name="price">
                @error('price') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
         <br>
    <div class="row">
        <div class="col-lg-6">
            <label for="selectedDisease">Diseases</label>
            <div class="input-group" wire:ignore>
                <select wire:model="selectedDiseases" id="select2" class="select2" style="width:100%" multiple>
                    <option value="" selected disabled>Select Diseases ..</option>
                    @foreach ($diseases as $disease)
                        <option value="{{ $disease->id }}">{{ $disease->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

        <hr>
        <input type="submit" wire:click="updatePlant" value="{{ $plant ? 'Edit Plant' : 'Create Plant' }}" class="btn btn-{{ $plant ? 'warning' : 'primary' }}">
    </form>
</div>
@push('livewire_third_party')
    <script>
        Livewire.on('plantSaved', function (type, message) {
            var notify = $.notify({
                title: "<i class='{{ config('adminetic.notify_icon', 'fa fa-bell-o') }}'></i> " + type,
                message: message
            }, {
                type: type,
                allow_dismiss: true,
                delay: 2000, // You can adjust the delay
                showProgressbar: true,
                timer: 300,
                newest_on_top: true,
                mouse_over: true,
                spacing: 1,
                animate: {
                    enter: 'animated fadeInDown',
                    exit: 'animated fadeOutUp'
                }
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#select2').select2();
            $('#select2').on('change', function (e) {
                var data = $('#select2').select2("val");
            @this.set('selectedDiseases', data);
            });
        });
    </script>


@endpush
