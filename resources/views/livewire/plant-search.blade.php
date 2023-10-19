<!-- resources/views/livewire/plant-search.blade.php -->

<div class="container mt-5">
    <form method="get">
    <input type="text" wire:model="searchTerm" placeholder="Search for plants..." class="form-control">
      {{--  <button  class="btn btn-primary mt-3">Search</button>  --}}
    </form>
    <div wire:loading>Searching plants...</div>
    <div wire:loading.remove>

    @if ($searchTerm == "")
        <div class="text-gray-500 text-sm">
            Enter a term to search for plants.
        </div>
    @else

    <div class="text-center mt-4">
        <h2>Search Results:</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Common Name</th>
                    <th>Family</th>
                    <th>Species</th>
                    <th>Yoruba</th>
                    <th>Hausa</th>
                    <th>Igbo</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if (!$plants->isEmpty())
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
                            <a href="{{ route('plant-search-details', ['id' => $plant->id]) }}" class="btn btn-success">View Details</a>
                        </td>
                    </tr>
                @endforeach

                <tr>
                    <div class="px-4 mt-4">
                        {{$plants->links()}}
                    </div>
                </tr>
                @else
   <tr> <div class="text-center mt-4">
        <p>No information on this plant yet.</p>
    </div></tr>
@endif
            </tbody>
        </table>
    </div>


@endif
</div>
