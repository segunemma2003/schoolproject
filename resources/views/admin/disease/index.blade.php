@extends(request()->header('layout') ??  request()->header('layout') ?? 'adminetic::admin.layouts.app')

@section('content')
<x-adminetic-index-page name="disease" route="disease">
    <x-slot name="content">
        {{-- ================================Card================================ --}}
        <table class="table table-striped table-bordered datatable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($diseases as $disease)
                <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{ $disease->name }}</td>
                    <td>
                        <x-adminetic-action :model="$disease" route="disease" />
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>
        {{-- =================================================================== --}}
    </x-slot>
</x-adminetic-index-page>
@endsection

@section('custom_js')
@include('admin.layouts.modules.disease.scripts')
@endsection
