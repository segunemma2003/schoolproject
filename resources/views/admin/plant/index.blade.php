@extends(request()->header('layout') ??  request()->header('layout') ?? 'adminetic::admin.layouts.app')

@section('content')
<x-adminetic-index-page name="plant" route="plant">
    <x-slot name="content">
        {{-- ================================Card================================ --}}
        <table class="table table-striped table-bordered datatable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Common Name</th>
                    <th>Family</th>
                    <th>Scientific Name</th>
                    <th>Okun</th>
                    <th>Ebira</th>
                    <th>Igala</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($plants as $plant)
                <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{ $plant->common_name }}</td>
                    <td>{{ $plant->family }}</td>
                    <td>{{ $plant->scientific_name }}</td>
                    <td>{{ $plant->okun }}</td>
                    <td>{{ $plant->ebira }}</td>
                    <td>{{ $plant->igala }}</td>

                    <td>
                        <x-adminetic-action :model="$plant" route="plant" />
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                <th>ID</th>
                    <th>Common Name</th>
                    <th>Family</th>
                    <th>Scientific Name</th>
                    <th>Okun</th>
                    <th>Ebira</th>
                    <th>Igala</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>
        {{-- =================================================================== --}}
    </x-slot>
</x-adminetic-index-page>
@endsection

@section('custom_js')
@include('admin.layouts.modules.plant.scripts')
@endsection
