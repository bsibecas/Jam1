@extends('layouts.app')

@section('content')

<div class="flex justify-center">
    <div class="w-8/12 ">
           
            <div class="text-center pb-8 pt-6">
            <h1 class="font-bold text-3xl md:text-4xl lg:text-3xl font-heading text-black">
                YOUR VOTED SUCKSESSES         
            </h1>
        </div>
 <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-12">
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6">
               @if ($ads->count())
            @foreach ($ads as $ad)
         <div class="w-full bg-yellow-300 bg-opacity-25 rounded-lg sahdow-lg p-12 flex flex-col justify-center items-center transform transition duration-500 hover:scale-110 hover:bg-opacity-50">
                    <div class="mb-8 text-start font-bold">
                        <div class="text-start mt-6 ">
                            <span class="text-lg mb-5 font-bold ">{{ $ad->productname}}</span>
                        </div>
                        <a href="{{route('viewads.show', $ad)}}">
                    <img class="object-center object-cover h-200 w-200 rounded-md" src="{{"/". $ad->file_path }}" alt="photo"> <span class="text-gray-600 text-sm">  Click for more information</span>
                        </a>
                    </div>
                   
                <div class="mt-3">
                    <span>{{ $ad->likes->count()}} {{Str::plural('Up Votes', $ad->likes->count())}}</span> 
                </div>

                </div>
            
             @endforeach

        </div>
    </section>
    <div>      
</div>
               
            {{$ads->links()}}

        @else 

            <p>No Sucksesses available</p>
        @endif
    </div>

</div>

@endsection