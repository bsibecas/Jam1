@extends('layouts.app')

@section('content')

<div class=" bg-white bg-opacity-25 m-10">
    <div class="grid m:grid-cols-2 md:grid-cols-2 lg:grid-cols-3    gap-4 border-black m-6 p-9">
        <div class=" h-72 w-90 m-6 transform transition duration-500 hover:scale-125 bg-white bg-opacity-10">
            <div class="m-5">
                <img class="h-16" src="nav.png" alt="">
                <h1 class=" font-bold">Navigation Bar</h1>
                <p>Here you will be able to move around the website. You are able to either, createn an advertisement to sell your products or view and/or buy other people products through the search bar or view ads tab</p>
            </div>
        </div>
        <div class=" h-72 w-90 m-6 transform transition duration-500 hover:scale-125 bg-white bg-opacity-10">
        <div class="m-5">
            <img class="h-40 w-80" src="createad.png" alt="">
            <h1 class=" font-bold">Create an ad</h1>
            <p>Include all the required information and post your add so other users can see it and buy it</p>
        
        </div>    
    </div>
        <div class=" h-72 w-90 m-6 transform transition duration-500 hover:scale-125 bg-white bg-opacity-10 flex justify-evenly">
            <div class="m-5">
                <img class="h-52 w-60" src="viewad.png" alt="">
            </div>
            <div class="h-40 w-48 m-5">
                <h1 class=" font-bold">View your add</h1>
                <p>Check that all the information is correct. If not you will always be able to edit or delete your add.</p>
            </div>
        </div>
        <div class=" h-72 w-90 m-6 transform transition duration-500 hover:scale-125 bg-white bg-opacity-10 center-items">
            <div class="m-5">
                <img class="h-40 w-60" src="othersad.png" alt="">
                <h1 class="mt-4 font-bold">View Ads</h1>
                <p>View other peopples adds and decide if you are interested in them or not</p>
            </div>
        </div>
        
        <div class=" h-72 w-90 m-6 transform transition duration-500 hover:scale-125 bg-white bg-opacity-10 center-items">
            <div class="m-5">
                <img class="h-40 w-60" src="ownprofile.png" alt="">
                <div class="mt-3 mb-5">
                    <h1 class="font-bold">Profile</h1>
                    <p>On your own profile you can check all the adds you are interested in and edit or delete your profile information</p>
                </div>
                 </div>
        </div>
        
        
    </div>
</div>

@endsection
