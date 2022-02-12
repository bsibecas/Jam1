@props(['ad' => $ad])

<div>
    <!-- The whole future lies in uncertainty: live immediately. - Seneca -->
    <div class="mb-4">
                <a href="{{route('users.ads', $ad->user)}}" class="font-bold">{{$ad->user->name}}</a> <span class="text-gray-600 text-sm">{{$ad->created_at->diffForHumans()}}</span>

                    <p class="mb-2">{{ $ad->productname}}</p>
                    <p class="mb-2">{{ $ad->price}}</p>
                    <p class="mb-2">{{ $ad->location}}</p>
                    <p class="mb-2">{{ $ad->condition}}</p>
                    <p class="mb-2">{{ $ad->description}}</p>
                    <div>
                        <img src="{{ $ad->file_path }}" alt="">

                    </div>
                </div>

                <div>
                    @can('delete', $ad)
                    <form action="{{route('ads.destroy', $ad)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-blue-500">Delete</button>
                    </form>
                    @endcan
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
                <span>{{ $ad->likes->count()}} {{Str::plural('like', $ad->likes->count())}} </span>
                </div>
</div>