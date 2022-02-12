@extends('layouts.app')

@section('content')

<div class="flex items-center justify-center bg-white">
    <div class="w-1/3 bg-white p-10 rounded-lg border shadow-lg">
        @if (session('status'))
            <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
                 {{session ('status')}}
            </div>
        @endif
            <form action="{{ route('login') }}" method="post">
        @csrf
            <div>
                <p class="text-center text-3xl">LOGIN TO SUCKSESS</p></br></br>
            <div>
            <div class="mb-4">
                <label for="email" class="sr-only">Email</label>
                <input type="email" name="email" id="email" placeholder="your@email.com"
                class="bg-gray-100 border-2 w-full p-4 rounded-lg
                focus:outline-none focus:ring-2 focus:ring-yellow-800 focus:border-transparent shadow-lg hover:bg-gray-200
                @error('email') border-red-500 @enderror" value="{{old('email')}}">
                @error('email')
                <div class="text-red-500 mt-2 text-sm">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="sr-only">Password</label>
                <input type="password" name="password" id="password" placeholder="password"
                class="bg-gray-100 border-2 w-full p-4 rounded-lg
                focus:outline-none focus:ring-2 focus:ring-yellow-800 focus:border-transparent shadow-lg hover:bg-gray-200
                @error('password') border-red-500 @enderror" value="">
                @error('password')
                <div class="text-red-500 mt-2 text-sm">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="mb-4">
                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="mr-2">
                    <label for="remember">Remember me</label>
                </div>
            </div>

            <div>
                <button type="submit" class="bg-yellow-500 text-white px-2 py-3 rounded
                font-medium w-full hover:bg-yellow-600 transform hover:scale-100 motion-reduce:transform-none">
                    Login
                </button>
            </div>
        </form>

    </div>

</div>

@endsection