<!DOCTYPE html>
<html lang="en">

<head>
    {{-- Meta --}}

    {{-- ASSET LINKS --}}
    <link rel="stylesheet" type="text/css" href="{{asset('adminetic/assets/css/vendors/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('adminetic/assets/css/vendors/slick-theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('adminetic/assets/css/vendors/animate.css')}}">
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('adminetic/assets/css/vendors/bootstrap.css')}}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{asset('adminetic/assets/css/style.css')}}">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{asset('adminetic/assets/css/responsive.css')}}">

    <style>
        .btn-group {
          display: flex;
          justify-content: center;
        }
        .input-group-btn .btn {
            display: block;
        }

        @media (max-width: 576px) {
          .navbar {
            flex-direction: column;
          }
          .navbar-brand {
            text-align: center;
          }
          .navbar-toggler {
            margin-bottom: 1rem;
          }
        }
      </style>

      {{--  @livewireStyles  --}}
</head>
  <body>
    <!-- tap on top starts-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
          <a class="navbar-brand" href="#">Plant and Disease Database</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                @guest
                <a class="nav-link" href="{{route('login')}}">Login</a>
                @else

                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i data-feather="log-out"></i>{{ __('Logout') }}
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </a>
                                @endguest

              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="container mt-5">
    <form method="get">
    <input type="text" name="searchTerm" placeholder="Search for plants..." class="form-control">
      <button  class="btn btn-primary mt-3">Search</button>
    </form>


    <div class="text-center mt-4">
        <h2>Search Results:</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Common Name</th>
                    <th>Family</th>
                    <th>Scientific Name</th>
                    <th>Igala</th>
                    <th>Ebira</th>
                    <th>Okun</th>
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
                        <td>{{ $plant->scientific_name }}</td>
                        <td>{{ $plant->igala }}</td>
                        <td>{{ $plant->ebira }}</td>
                        <td>{{ $plant->okun }}</td>
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



</div>
      {{--  @livewireScripts  --}}
      @section('custom_js')
    {{-- ASSET SCRIPTS --}}
      <!-- latest jquery-->
    <script src="{{asset('adminetic/assets/js/jquery-3.5.1.min.js')}}"></script>
    <!-- Bootstrap js-->
    <script src="{{asset('adminetic/assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
    <!-- feather icon js-->
    <script src="{{asset('adminetic/assets/js/icons/feather-icon/feather.min.js')}}"></script>
    <script src="{{asset('adminetic/assets/js/icons/feather-icon/feather-icon.js')}}"></script>
@stack('livewire_third_party')
    <script src="{{asset('adminetic/assets/js/tooltip-init.js')}}"></script>
    <script src="{{asset('adminetic/assets/js/animation/wow/wow.min.js')}}"></script>
    <script src="{{asset('adminetic/assets/js/landing_sticky.js')}}"></script>
    <script src="{{asset('adminetic/assets/js/landing.js')}}"></script>
    <script src="{{asset('adminetic/assets/js/jarallax_libs/libs.min.js')}}"></script>
    <script src="{{asset('adminetic/assets/js/slick/slick.min.js')}}"></script>
    <script src="{{asset('adminetic/assets/js/slick/slick.js')}}"></script>
    <script src="{{asset('adminetic/assets/js/landing-slick.js')}}"></script>
    <!-- Plugins JS Ends-->
  </body>

</html>
