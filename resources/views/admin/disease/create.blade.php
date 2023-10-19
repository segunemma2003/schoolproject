@extends(request()->header('layout') ??  request()->header('layout') ?? 'adminetic::admin.layouts.app')

@section('content')
<x-adminetic-create-page name="disease" route="disease">
    <x-slot name="content">
        {{-- ================================Form================================ --}}
        {{--  @include('admin.layouts.modules.disease.form')  --}}
        @livewire('add-disease')
        {{-- =================================================================== --}}
    </x-slot>
</x-admin.create-page>
@endsection

@section('custom_js')
@include('admin.layouts.modules.disease.scripts')
@endsection
