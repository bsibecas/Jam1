@extends('layouts.app')

@section('content')

<div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-lg shadow-lg">
        <form action="{{route('edit')}}" method="post" enctype="multipart/form-data">
            @csrf
            @if (session('success'))
                <div class="bg-green-500 p-4 rounded-lg mb-6 text-white text-center" role="alert">
                    {{session('success')}}
                </div>
            @endif
            <div>
                <p class="text-center text-3xl font-roboto">Update your profile</p></br></br></br>
            <div>
            <div class="mb-6">
                <label for="name" class="sr-only">Name</label>
                <input type="text" name="name" id="name" value="{{auth()->user()->name}}" placeholder="new name"
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
                <input type="text" name="username" id="username" value="{{auth()->user()->username}}" placeholder="new name"
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
                <input type="email" name="email" id="email" value="{{auth()->user()->email}}" placeholder="new email"
                class="bg-gray-100 border-2 w-full p-4 rounded-lg
                focus:outline-none focus:ring-2 focus:ring-yellow-800 focus:border-transparent shadow-lg hover:bg-gray-200
                @error('email') border-red-500 @enderror" value="{{old('email')}}">
                @error('email')
                <div class="text-red-500 mt-2 text-sm">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div>
                <p class="text-center text-3xl font-roboto">Update your password</p></br></br></br>
            <div>
            <div class="mb-6">
                <label for="oldpassword" class="sr-only">Old Password</label>
                <input type="password" name="oldPassword" id="oldPassword" placeholder="Old Password"
                class="bg-gray-100 border-2 w-full p-4 rounded-lg
                focus:outline-none focus:ring-2 focus:ring-yellow-800 focus:border-transparent shadow-lg hover:bg-gray-200
                @error('oldpassword') border-red-500 @enderror" value="{{old('oldpassword')}}">
                @error('oldpassword')
                <div class="text-red-500 mt-2 text-sm">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-6">
                <label for="password" class="sr-only">New Password</label>
                <input type="password" name="password" id="password" placeholder="New Password"
                class="bg-gray-100 border-2 w-full p-4 rounded-lg
                focus:outline-none focus:ring-2 focus:ring-yellow-800 focus:border-transparent shadow-lg hover:bg-gray-200
                @error('password') border-red-500 @enderror" value="{{old('password')}}">
                @error('password')
                <div class="text-red-500 mt-2 text-sm">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-6">
                <label for="confirmPassword" class="sr-only">Confirm Password</label>
                <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm password"
                class="bg-gray-100 border-2 w-full p-4 rounded-lg
                focus:outline-none focus:ring-2 focus:ring-yellow-800 focus:border-transparent shadow-lg hover:bg-gray-200
                @error('confirmPassword') border-red-500 @enderror" value="{{old('confirmPassword')}}">
                @error('confirmPassword')
                <div class="text-red-500 mt-2 text-sm">
                    {{$message}}
                </div>
                @enderror
            </div>
        <div class="mb-6">
            <button type="submit" class="bg-yellow-500 text-white px-2 py-3 rounded
            font-medium w-full hover:bg-yellow-600 transform hover:scale-100 motion-reduce:transform-none">
                Save Changes
            </button>
        </div>
    </div>

</div>

@endsection