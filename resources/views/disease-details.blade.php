
<!DOCTYPE html>
<html lang="en">

<head>
    {{-- Meta --}}
    @include('adminetic::admin.layouts.components.meta')
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
</head>
  <body class="">
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
      <div class="row">

        <div class="col-lg-12">


                    <div class="card shadow-lg my-2 p-3">
                        <div class="card-body">
                            <div class="flex mr-auto justify-content-end">
                                <a href="{{ URL('/') }}" type="button" class="btn btn-primary btn-lg" style=" white-space: nowrap; margin-left: 10px;">Go back to home</a>
                                </div>
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
                                            <td><a href="{{ route('plant-search-details', $plant->id) }}">{{ $plant->common_name }}</a></td>
                                            <td>{{ $plant->scientific_name }}</td>
                                        </tr>

                                        @endforeach
                                        @endif
                                    </tr>
                                </tbody>
                            </table>

                    </div>


        </div>
    </div>
    @section('custom_js')
    {{-- ASSET SCRIPTS --}}
      <!-- latest jquery-->
    <script src="{{asset('adminetic/assets/js/jquery-3.5.1.min.js')}}"></script>
    <!-- Bootstrap js-->
    <script src="{{asset('adminetic/assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
    <!-- feather icon js-->
    <script src="{{asset('adminetic/assets/js/icons/feather-icon/feather.min.js')}}"></script>
    <script src="{{asset('adminetic/assets/js/icons/feather-icon/feather-icon.js')}}"></script>


    @livewireScripts
<script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
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
