@extends('layouts.app')

@section('content')

<div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-lg">
    <form action="{{route('ads')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
                <label for="productname" class="sr-only">Product Title</label>
                <input type="text" name="productname" id="productname" placeholder="Your product name" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('productname') border-red-500 @enderror" value="">
                @error('productname')
                <div class="text-red-500 mt-2 text-sm">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="price" class="sr-only">Price</label>
                <input type="text" name="price" id="price" placeholder="Product Price" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('price') border-red-500 @enderror" value="">
                @error('price')
                <div class="text-red-500 mt-2 text-sm">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="Category" class="sr-only">Category</label>
                <select name="category" id="category" class="text-gray-400 form-select bg-gray-100 border-2 w-full p-4 rounded-lg @error('category') border-red-500 @enderror" value=""">
                    <option class="" value="">Select A Category...</option>
                    <option value="Computing">Computing</option>
                    <option value="Furniture">Furniture</option>
                    <option value="Fashion">Fashion</option>
                    <option value="Technology">Technology</option>
                    <option value="Sport">Sport</option>
                </select>
                    @error('category')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                    @enderror
            </div>
                
            
            <div class="mb-4">
                <label for="location" class="sr-only">Location</label>
                <input type="location" name="location" id="location" placeholder="Choose a location" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('location') border-red-500 @enderror" value="">
                @error('location')
                <div class="text-red-500 mt-2 text-sm">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-4">
                 <label for="condition" class="sr-only">Condition</label>
                <select name="condition" id="condition" class="text-gray-400 form-select bg-gray-100 border-2 w-full p-4 rounded-lg @error('condition') border-red-500 @enderror" value=""">
                    <option class="" value="">Select Condition..</option>
                    <option value="Good">Good</option>
                    <option value="Very Good">Very Good</option>
                    <option value="Near Mint">Near Mint</option>
                    <option value="Mint">Mint</option>
                </select> 
                @error('condition')
                <div class="text-red-500 mt-2 text-sm">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div>
                <label for="description" class="sr-only"></label>
                <textarea name="description" id="description" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('description') border-red-500 @enderror" placeholder="Add a description" value=""></textarea>
                 @error('description')
                <div class="text-red-500 mt-2 text-sm">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div>
                <label for="file" class="sr-only"></label>
                <input type="file" name="file" id="file" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="">
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">
                    Add Sucksess
                </button>
            </div>
    </form>

    </div>

</div>

@endsection