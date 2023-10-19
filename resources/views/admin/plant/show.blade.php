@extends(request()->header('layout') ??  request()->header('layout') ?? 'adminetic::admin.layouts.app')

@section('content')
    <x-adminetic-show-page name="plant" route="plant" :model="$plant">
        <x-slot name="content">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="card shadow-lg custom-card p-2 my-2">
                        <div class="card-header"><img class="img-fluid" src="{{ logoBanner() }}" alt="plant profile"></div>
                        <div class="card-profile">
                            <img class="rounded-circle" src="{{ asset('storage/' . $plant->picture) }}"
                                alt="{{ $plant->common_name ?? 'N/A' }}">
                            </div>
                    </div>
                </div>
                <div class="col-lg-8">


                            <div class="card shadow-lg my-2 p-3">
                                <div class="card-body">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td>Family:</td>
                                                <td class="users-view-username">{{ $plant->family ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Species:</td>
                                                <td class="users-view-name">{{ $plant->species ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Yoruba:</td>
                                                <td class="users-view-email">{{ $plant->yoruba ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Hausa:</td>
                                                <td>{{ $plant->hausa ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Igbo:</td>
                                                <td>{{ $plant->igbo ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Common Name:</td>
                                                <td>{{ $plant->common_name ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Part  Used:</td>
                                                <td>{{ $plant->part_used ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Medicinal Use:</td>
                                                <td>{{ $plant->medicinal_use ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Price:</td>
                                                <td>{{ $plant->price ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Diseases:</td>
                                                @if ($plant->has('diseases'))
                                                @foreach ($plant->diseases as $disease)
                                                <tr>
                                                    <th>{{ $loop->index+1 }}</th>
                                                    <td><a href="{{ route('disease.show', $disease->id) }}">{{ $disease->name }}</a></td>
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
    @include('admin.layouts.modules.plant.scripts')
@endsection
