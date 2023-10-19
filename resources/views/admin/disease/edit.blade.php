@extends(request()->header('layout') ??  request()->header('layout') ?? 'adminetic::admin.layouts.app')

@section('content')
<x-adminetic-edit-page name="disease" route="disease" :model="$disease">
    <x-slot name="content">
        {{-- ================================Form================================ --}}
        {{--  @include('admin.layouts.modules.disease.form')  --}}
        {{-- =================================================================== --}}
        @livewire('edit-disease', ['disease'=>$disease], key($disease->id))
    </x-slot>
</x-admin.edit-page>
@endsection

@section('custom_js')
@include('admin.layouts.modules.disease.scripts')
@endsection
