@extends('layouts.app')

@section('content')

<div class="flex justify-center">
    <div class="w-full ">
        <div class="flex justify-center">
            <div class="p-6 w-3/12">
                <h1 class="text-2xl font-medium mb-1 text-center">{{$user->name}}</h1>
            <p class="text-gray-600 text-center">Posted {{$ads->count()}} {{Str::plural('ad', $ads->count())}}</p>    
        </div>
        </div>
        
         @if(auth()->user()->id === $user->id)
        <div class="flex justify-evenly m-8">
             <a href="{{route('adsliked', $user->id)}}">
                <div class=" border-2 border-yellow-600 rounded-lg px-3 py-2 text-white cursor-pointer hover:bg-yellow-600 hover:text-white">
                Voted Sucksesses
                </div>
            </a>

            <!--add angel code -->
            <a href="{{route('editUser')}}">
                <div class="border-2 border-yellow-600 rounded-lg px-3 py-2 text-white cursor-pointer hover:bg-yellow-600 hover:text-white">
                Edit profile
                </div>
            </a>
        </div>
        @endif
           
   
 <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-12">
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6">
               @if ($ads->count())
            @foreach ($ads as $ad)
         <div class="w-full bg-green-200 bg-opacity-25 rounded-lg sahdow-lg p-12 flex flex-col justify-center items-center transform transition duration-500 hover:scale-110 hover:bg-opacity-50">
        
                <div class="mb-8 text-center text-xl">
                        <a href="{{route('users.ads', $ad->user)}}" class="font-bold">{{$ad->user->name}}</a>
                        <div>
                            <span class="text-gray-600 text-sm">Posted {{$ad->created_at->diffForHumans()}} ago</span>
                        </div>
                        <div class="text-center mt-6 ">
                            <p class="text-xl font-bold mb-2">{{ $ad->productname}}</p>
                        </div>
                        <a href="{{route('viewads.show', $ad)}}">
                    <img class="object-center object-cover h-200 w-200 rounded-md" src="{{"/". $ad->file_path }}" alt="photo"> <span class="text-gray-600 text-sm">  Click for more information</span>
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
                <div class="flex justify-evenly ">
                    <div class="p-4">
                    @can('delete', $ad)
                    <form action="{{route('ads.destroy', $ad)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-blue-500">Delete</button>
                    </form>
                    @endcan
                </div>
                <div class="p-4">
                    @if(auth()->user()->id === $ad->user_id)
                    <a href="/editad/{{$ad->id}}"><button class="text-blue-500">Edit</button></a>
                    @endif
                </div>
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
