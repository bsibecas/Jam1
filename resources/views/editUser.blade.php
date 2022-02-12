@extends('layouts.app')

@section('content')

<div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-lg shadow-lg">
        <form action="{{route('editUser')}}" method="post" enctype="multipart/form-data">
            @csrf
            @if (session('success'))
                <div class="bg-green-500 p-4 rounded-lg mb-6 text-white text-center" role="alert">
                    {{session('success')}}
                </div>
            @endif
            @if (session('error'))
                <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center" role="alert">
                    {{session('error')}}
                </div>
            @endif
            <div>
                <p class="text-center text-3xl font-roboto">Update your information</p></br></br></br>
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
                <div class="mb-6">
                    <label for="current_password" class="sr-only">current password</label>
                    <input type="password" name="current_password" id="current_password" placeholder="current password"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg
                    focus:outline-none focus:ring-2 focus:ring-yellow-800 focus:border-transparent shadow-lg hover:bg-gray-200
                    @error('current_password') border-red-500 @enderror" value="{{old('current_password')}}">
                    @error('current_password')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="password" class="sr-only">new password</label>
                    <input type="password" name="password" id="password" placeholder="new password"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg
                    focus:outline-none focus:ring-2 focus:ring-yellow-800 focus:border-transparent shadow-lg hover:bg-gray-200
                    @error('password') border-red-500 @enderror">
                    @error('password')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="confirm_password" class="sr-only">confirm password</label>
                    <input type="password" name="confirm_password" id="confirm_password" placeholder="confirm password"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg
                    focus:outline-none focus:ring-2 focus:ring-yellow-800 focus:border-transparent shadow-lg hover:bg-gray-200
                    @error('confirm_password') border-red-500 @enderror">
                    @error('confirm_password')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </form>
        <div class="mb-6">
            <button type="submit" class="bg-yellow-500 text-white px-2 py-3 rounded
            font-medium w-full hover:bg-yellow-600 transform hover:scale-100 motion-reduce:transform-none">
                Save Changes
            </button>
        </div>
    </div>

</div>

@endsection