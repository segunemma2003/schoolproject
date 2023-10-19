@extends(request()->header('layout') ??  request()->header('layout') ?? 'adminetic::admin.layouts.app')

@section('content')
<x-adminetic-create-page name="plant" route="plant">
    <x-slot name="content">
        {{-- ================================Form================================ --}}
        {{--  @include('admin.layouts.modules.plant.form')
         --}}
         @livewire('add-plant')
        {{-- =================================================================== --}}
    </x-slot>
</x-admin.create-page>
@endsection

@section('custom_js')
@include('admin.layouts.modules.plant.scripts')
@endsection
