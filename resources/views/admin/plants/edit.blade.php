@extends(request()->header('layout') ??  request()->header('layout') ?? 'adminetic::admin.layouts.app')

@section('content')
<x-adminetic-edit-page name="plants" route="plants" :model="$plants">
    <x-slot name="content">
        {{-- ================================Form================================ --}}
        @include('admin.layouts.modules.plants.form')
        {{-- =================================================================== --}}
    </x-slot>
</x-admin.edit-page>
@endsection

@section('custom_js')
@include('admin.layouts.modules.plants.scripts')
@endsection