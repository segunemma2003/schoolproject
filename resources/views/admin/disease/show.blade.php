@extends(request()->header('layout') ??  request()->header('layout') ?? 'adminetic::admin.layouts.app')

@section('content')
    <x-adminetic-show-page name="disease" route="disease" :model="$disease">
        <x-slot name="content">
            <div class="row">

                <div class="col-lg-12">


                            <div class="card shadow-lg my-2 p-3">
                                <div class="card-body">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td>Name:</td>
                                                <td class="users-view-username">{{ $disease->name ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Description:</td>
                                                <td class="users-view-name">{{ $disease->description ?? '' }}</td>
                                            </tr>

                                            <tr>
                                                <td>Diseases:</td>
                                                @if ($disease->has('plants'))
                                                @foreach ($disease->plants as $plant)
                                                <tr>
                                                    <th>{{ $loop->index+1 }}</th>
                                                    <td><a href="{{ route('plant.show', $plant->id) }}">{{ $plant->common_name }}</a></td>
                                                </tr>

                                                @endforeach
                                                @endif
                                            </tr>
                                        </tbody>
                                    </table>

                            </div>


                </div>
            </div>
        </x-slot>
    </x-admin.show-page>

@endsection

@section('custom_js')
    @include('admin.layouts.modules.disease.scripts')
@endsection
