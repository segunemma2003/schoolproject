@extends(request()->header('layout') ??  request()->header('layout') ?? 'adminetic::admin.layouts.app')

@section('content')
<x-adminetic-edit-page name="plant" route="plant" :model="$plant">
    <x-slot name="content">
        {{-- ================================Form================================ --}}
        {{--  @include('admin.layouts.modules.plant.form')  --}}
        @livewire('edit-plant', ['plant'=>$plant], key($plant->id))
        {{-- =================================================================== --}}
    </x-slot>
</x-admin.edit-page>
@endsection

@section('custom_js')
@include('admin.layouts.modules.plant.scripts')
@endsection
