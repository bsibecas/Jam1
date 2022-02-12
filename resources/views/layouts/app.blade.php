<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/51f1720f6a.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Sucksessors</title>
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
</head>
<body class="bg-white">
    <nav class="navbar navbar-expand-lg p-6 flex justify-between mb-6 w-full">
        <div class="container-fluid">
            <!---NAVBAR FOR MOBILE WHEN SCREEN IS SHRINKED--->
            <a class="navbar-brand" href="/">
                <img src="logov1.jpg" alt="Sucksessors" class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">   
                    <i class="fa fa-navicon" style="color:#fff; font-size:28px;"></i>
                </span> 
            </button>
            <!---NAVBAR FOR COMPUTER--->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!---LEFT NAVR "Home, Dashboard, Create Ad, View Ad"--->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                      <a class="nav-link active p-3 font-bold text-yellow-800 hover:underline hover:text-pink-900" href="/">Home</a>
                    </li>
                    @auth
                    <li class="nav-item">
                      <a class="nav-link p-3 font-bold text-yellow-800 hover:underline hover:text-pink-900" href="{{ route('dashboard')}}">Dashboard</a>
                    </li>
                    
                        <li>
                          <a class="nav-link p-3 font-bold text-yellow-800 hover:underline hover:text-pink-900" href="{{route('ads')}}">Add Sucksess</a>
                        </li>
                    @endauth
                    <li>
                      <a class=" nav-link p-3 font-bold text-yellow-800 hover:underline hover:text-pink-900" href="{{route('viewads')}}">Discover</a>
                    </li>
                </ul>
                <div class="pt-2 relative mx-auto d-none d-md-block text-gray-600">
                    <form type="get" action="{{route('search')}}">
                        <input name="query" class="border-2 border-gray-300 h-10 px-5 pr-16 rounded-lg
                        focus:outline-none focus:ring-2 focus:ring-yellow-800 focus:border-transparent shadow-lg hover:bg-gray-100"
                        type="search" placeholder="Search products">
                        <button type="submit"   >
                            <i class="fa fa-search"></i>
                        </button>
                    </form>
                </div>
                <ul class="navbar-nav ml-auto">
                @auth
                    <li class="nav-item dropdown">  
                        <a class="nav-link dropdown-toggle p-3 focus:border-red-900 font-bold text-yellow-800 hover:underline hover:text-pink-900" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          {{auth()->user()->name}}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-star bg-yellow-100 rounded-lg" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item block px-4 py-2 text-gray-800 hover:bg-yellow-300 hover:text-yellow-800" href="{{route('users.ads', auth()->user())}}">My Ads</a></li>
                            <li><a class="dropdown-item block px-4 py-2 text-gray-800 hover:bg-yellow-300 hover:text-yellow-800" href="{{route('adsliked', auth()->user())}}">My Interests</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item block px-4 py-2 text-gray-800 hover:bg-yellow-500 hover:text-yellow-100" href="{{route('editUser')}}">Update Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item block px-4 py-2 text-gray-800 hover:bg-red-400 hover:text-white" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth
                @guest
                    <li>
                        <a class="p-5 mx-auto lg:mx-2 transition ease-out duration-700 hover:bg-yellow-100 bg-yellow-300 text-gray-800 font-bold rounded-full mt-4 lg:mt-0 py-4 px-10 shadow opacity-75" href="{{ route('register') }}">Register</a>
                    </li>
                    <li>
                        <a class="p-5 mx-auto lg:mx-0 transition ease-out hover:bg-yellow-100 bg-yellow-300 text-gray-800 font-bold rounded-full mt-4 lg:mt-0 py-4 px-10 shadow opacity-75" href="{{ route('login')}}">Log In</a>
                    </li>
                @endguest
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
  </body>
</html>
