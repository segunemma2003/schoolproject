<div>
    <form wire:submit.prevent="saveDisease">
        @if (!empty($errors))
        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
                <p class="text-red">{{ $error }}</p><br />
            @endforeach
        @endif
    @endif
    <div class="row">
        <div class="col-md-6">
            <label class="form-label" for="name">Name<span class="text-danger">*</span></label>
            <input type="text" wire:model="name" id="name" class="form-control" placeholder="Name" name="name">
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="col-md-6">
            <label class="form-label" for="description">Description<span class="text-danger">*</span></label>
            <input type="text" wire:model="description" id="description" class="form-control" placeholder="Description" name="description">
            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-6">
            <label for="selectedPlant">Plants</label>
            <div class="input-group" wire:ignore>
                <select wire:model="selectedPlants" id="select2" class="select2" style="width:100%" multiple>
                    <option value="" selected disabled>Select plant ..</option>
                    @foreach ($plants as $plant)
                        <option value="{{ $plant->id }}">{{ $plant->common_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <hr>
    <input type="submit" wire:click="saveDisease" value="{{ isset($disease) ? 'Edit Disease' : 'Create Disease' }}" class="btn btn-{{ isset($disease) ? 'warning' : 'primary' }}">
    </form>
</div>


@push('livewire_third_party')
    <script>


        Livewire.on('diseaseSaved', function (type, message) {
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
            @this.set('selectedPlants', data);
            });
        });
    </script>


@endpush

