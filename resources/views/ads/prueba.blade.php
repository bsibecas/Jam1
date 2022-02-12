@extends('layouts.app')

@section('content')


<div class="flex justify-center">
    
    <div class="w-full bg-gray-200">
        <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-12">
        <div class="text-center pb-12">
            <h2 class="text-base font-bold text-indigo-600">
                We have the best products in the market
            </h2>
            <h1 class="font-bold text-3xl md:text-4xl lg:text-5xl font-heading text-white">
                Check our most recent ads           
            </h1>
        </div>
        <div>
            <form type="get" action="{{route('catSearch')}}">
                <div class=" bg-gray-100 py-5 my-5 flex items-center bg-white">
                    <div class="container mx-autorounded-lg ">
                        <div class="flex justify-center items-center">
                        <div class="md:space-x-20 space-y-10 md:space-y-0">
                            <button type="submit" name="cat" value="computing" class=""><i class="fas fa-desktop fa-2x"></i></button>
                            <button type="submit" name="cat" value="furniture" class=""><i class="fas fa-couch fa-2x"></i></button>
                            <button type="submit" name="cat" value="fashion" class=""><i class="fas fa-tshirt fa-2x"></i></button>
                            <button type="submit" name="cat" value="sport" class=""><i class="fas fa-dumbbell fa-2x"></i></button>
                            <button type="submit" name="cat" value="technology" class=""><i class="fas fa-sim-card fa-2x"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>



        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6">
               
         <div class="w-full bg-green-200 rounded-lg sahdow-lg p-12 flex flex-col justify-center items-center">
        @if ($ads->count())
            @foreach ($ads as $ad)
                <div class="mb-8">
                        <a href="{{route('users.ads', $ad->user)}}" class="font-bold">{{$ad->user->name}}</a> <span class="text-gray-600 text-sm">{{$ad->created_at->diffForHumans()}}</span>
                    <img class="object-center object-cover h-36 w-36" src="{{ $ad->file_path }}" alt="photo">
                </div>
                <div class="text-center">
                    <p class="text-xl text-white font-bold mb-2">{{ $ad->productname}}</p>
                    <a href="{{route('viewads.show', $ad)}}">Click for full add information</a>
                </div>
                <div class="flex items-center">
                    @auth
                        @if(!$ad->likedBy(auth()->user()))
                        <form action="{{route('ads.likes', $ad->id)}}" method="post" class="mr-3">
                            @csrf
                            <button type="submit" class="text-blue-500">Interested</button>
                        </form>
                        @else
                        <form action="{{route('ads.likes', $ad->id)}}" method="post" class="ml-3">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-blue-500">Not Interested</button>
                        </form>
                        @endif
                    @endauth
                </div>
                <div class="mt-3">
                    <span>{{ $ad->likes->count()}} {{Str::plural('Interested in this product', $ad->likes->count())}}</span> 
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <div>      
</div>
               
            
            {{$ads->links()}}

        @else 

            <p>No ads available</p>
        @endif
    </div>

</div>

@endsection