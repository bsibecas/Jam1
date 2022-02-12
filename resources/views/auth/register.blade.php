@extends('layouts.app')

@section('content')

<div class="flex items-center justify-center h-screen bg-white">
    <div class="w-1/3 bg-white p-10 rounded-lg border shadow-lg">
        <form action="{{ route('register') }}" method="post">
            @csrf
            <div>
                <p class="text-center text-3xl font-roboto">WELCOME TO SUCKSESS</p></br></br></br>
            <div>
            <div class="mb-6">
                <label for="name" class="sr-only">Name</label>
                <input type="text" name="name" id="name" placeholder="John Smith"
                class="bg-gray-100 border-2 w-full p-4 rounded-lg
                focus:outline-none focus:ring-2 focus:ring-yellow-800 focus:border-transparent shadow-lg hover:bg-gray-200
                @error('name') border-red-500 @enderror" value="{{old('name')}}">
                @error('name')
                <div class="text-red-500 mt-2 text-sm">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="mb-6">
                <label for="username" class="sr-only">Username</label>
                <input type="text" name="username" id="username" placeholder="johnsmith"
                class="bg-gray-100 border-2 w-full p-4 rounded-lg
                focus:outline-none focus:ring-2 focus:ring-yellow-800 focus:border-transparent shadow-lg hover:bg-gray-200
                @error('username') border-red-500 @enderror" value="{{old('username')}}">
                @error('username')
                <div class="text-red-500 mt-2 text-sm">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-6">
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
            <div class="mb-6">
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
            <div class="mb-6">
                <label for="password_confirmation" class="sr-only">Password confirmation</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="confirm password"
                class="bg-gray-100 border-2 w-full p-4 rounded-lg
                focus:outline-none focus:ring-2 focus:ring-yellow-800 focus:border-transparent shadow-lg hover:bg-gray-200
                @error('password_confirmation') border-red-500 @enderror" value="">
                @error('password_confirmation')
                <div class="text-red-500 mt-2 text-sm">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-6">
                <button type="submit" class="bg-yellow-500 text-white px-2 py-3 rounded
                font-medium w-full hover:bg-yellow-600 transform hover:scale-100 motion-reduce:transform-none">
                    Register
                </button>
            </div>
        </form>

    </div>

</div>

@endsection