@extends('layouts.app')

@section('content')

<div class="flex justify-center">
    <div class="w-6/12 p-6 rounded-lg">

    <!-- The whole future lies in uncertainty: live immediately. - Seneca -->
    <div class="mb-4">
        <section class="w-10/12 mx-auto px-4 sm:px-6 lg:px-4 py-12">
            <div class="grid grid-cols-1 flex justify-center">
                <div class="w-full bg-green-200 bg-opacity-25 rounded-lg sahdow-lg p-12 flex flex-col justify-center items-center transform transition duration-500 hover:scale-110 hover:bg-opacity-50">
                    <div class="mb-8 text-start text-xl">
                        @auth
                        <a href="{{route('users.ads', $ad->user)}}" class="font-bold text-4xl text-white">{{$ad->user->name}}</a>
                        @endauth
                        <div>
                            <span class="text-gray-600 text-sm">Posted {{$ad->created_at->diffForHumans()}}</span>
                        </div>
                        <div class="text-start mt-6 ">
                            <span class="text-3xl mb-5 font-bold ">{{ $ad->productname}}</span><span class="text-3xl mb-2  ml-5 font-bold text-gray-700"> ${{ $ad->price}}</span>
                            <p class="text-xl mb-2 mt-4 text-gray-700">Condition: {{ $ad->condition}}</p>
                            <p class="text-xl mb-2 text-gray-700">Location: {{ $ad->location}}</p><p class="text-sm text-gray-700 mb-3">{{rand(1, 100)}} Km away from you.</p>
                        </div>
                        <a href="{{route('viewads.show', $ad)}}">
                    <img class="object-center object-cover h-200 w-200 rounded-md rounded-md" src="{{"/". $ad->file_path }}" alt="photo"> <span class="text-gray-600 text-sm">  Click for more information</span>
                        </a>
                    </div>
                    <div>
                    <p class="text-xl mb-2 italic">"{{ $ad->description}}"</p>
                    </div>
                <div class="mt-3">
                    <span>{{ $ad->likes->count()}} {{Str::plural('Interested in this product', $ad->likes->count())}}</span> 
                </div>

                </div>
            </div>
        </section>
    </div>
    </div>
</div>

@endsection