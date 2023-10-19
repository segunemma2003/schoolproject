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
                    <th>Species</th>
                    <th>Yoruba</th>
                    <th>Hausa</th>
                    <th>Igbo</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($plants as $plant)
                <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{ $plant->common_name }}</td>
                    <td>{{ $plant->family }}</td>
                    <td>{{ $plant->species }}</td>
                    <td>{{ $plant->yoruba }}</td>
                    <td>{{ $plant->hausa }}</td>
                    <td>{{ $plant->igbo }}</td>

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
                    <th>Species</th>
                    <th>Yoruba</th>
                    <th>Hausa</th>
                    <th>Igbo</th>
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
