@extends('layouts.app')

@section('content')

<style>
*
{
  text-transform: capitalize;
}
</style>
<div class="flex justify-center">
    
    <div class="w-full">
        <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 pt-3">
        <div class="text-center">
            <h1 class="font-bold text-3xl md:text-4xl lg:text-5xl font-heading text-slate-400">
                Welcome to Sucksess
            </h1>
            <h2 class="text-base font-bold text-slate-400">
                Share your most valuable Sucksesses        
            </h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @if ($ads->count())
            
            @foreach ($ads as $ad)
           
         <div class="w-full bg-green-200 bg-opacity-20 rounded-lg sahdow-lg p-12 flex flex-col justify-center items-center transform transition duration-500 hover:scale-110 hover:bg-opacity-50 mb-5">
         
                <div class="mb-8 text-center text-xl">
                    @auth
                        <a href="{{route('users.ads', $ad->user)}}" class="font-bold">{{$ad->user->name}}</a>
                        <div>
                            <span class="text-gray-600 text-sm">Posted {{$ad->created_at->diffForHumans()}}</span>
                        </div>
                    @endauth
                        <div class="text-center mt-6 ">
                            <p class="text-xl font-bold mb-2">{{ $ad->productname}}</p>
                        </div>
                        <a href="{{route('viewads.show', $ad)}}">
                    <img class="object-center object-cover h-200 w-200 rounded-md" src="{{ $ad->file_path }}" alt="photo"> <span class="text-gray-600 text-sm">  Click for more information</span>
                        </a>
                </div>
        
                <div class="flex items-center">
                    @auth
                        @if(!$ad->likedBy(auth()->user()))
                        <form action="{{route('ads.likes', $ad->id)}}" method="post" class="mr-3">
                            @csrf
                            <button type="submit" class="text-blue-500">Up Vote</button>
                        </form>
                        @else
                       
                        <form action="{{route('ads.likes', $ad->id)}}" method="post" class="ml-3">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-blue-500">Vote</button>
                        </form>
                        @endif
                    @endauth
                </div>
                <div class="mt-3">
                    <span class="text-gray-600 text-sm">{{ $ad->likes->count()}} {{Str::plural('Interested in this product', $ad->likes->count())}}</span> 
                </div>
            </div>
                    @endforeach

        </div>
    </section>
    <div>      
</div>
       
        
        
        @else 

            <p>No Sucksesses available</p>
        @endif
    </div>

</div>

@endsection
