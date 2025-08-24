@extends('layouts.app')
@section('title', 'Home')
@section('content')
<div class="relative flex flex-col gap-[30px] my-[60px] px-5">
            <h1 class="font-bold text-[30px] leading-[45px] text-center">Explore Our<br>Beautiful Koskos</h1>
            <form action="{{route('findkos.result')}}"
                class="flex flex-col rounded-[30px] border border-[#F1F2F6] p-5 gap-6 bg-white">
                <div id="InputContainer" class="flex flex-col gap-[18px]">
                    <div class="flex flex-col w-full gap-2">
                        <p class="font-semibold">Name</p>
                        <label
                            class="flex items-center w-full rounded-full p-[14px_20px] gap-3 bg-white ring-1 ring-[#F1F2F6] focus-within:ring-[#91BF77] transition-all duration-300">
                            <img src="{{asset('')}}assets/images/icons/note-favorite-grey.svg" class="flex w-5 h-5 shrink-0"
                                alt="icon">
                            <input type="text" name="search" id=""
                                class="w-full font-semibold outline-none appearance-none placeholder:text-ngekos-grey placeholder:font-normal"
                                placeholder="Type the koskos name">
                        </label>
                    </div>
                    <div class="flex flex-col w-full gap-2">
                        <p class="font-semibold">Choose City</p>
                        <label
                            class="relative flex items-center w-full rounded-full p-[14px_20px] gap-2 bg-white ring-1 ring-[#F1F2F6] focus-within:ring-[#91BF77] transition-all duration-300">
                            <img src="{{asset('')}}assets/images/icons/location.svg"
                                class="absolute flex w-5 h-5 transform -translate-y-1/2 shrink-0 top-1/2 left-5"
                                alt="icon">
                            <select name="city" id="" class="w-full pl-8 bg-white outline-none appearance-none">
                                <option value="" hidden>Select city</option>
                                @foreach ($cities as $item)
                                <option value={{$item->slug}}>{{$item->name}}</option>
                                @endforeach
                            </select>
                            <img src="{{asset('')}}assets/images/icons/arrow-down.svg" class="w-5 h-5" alt="icon">
                        </label>
                    </div>
                    <div class="flex flex-col w-full gap-2">
                        <p class="font-semibold">Choose Category</p>
                        <label
                            class="relative flex items-center w-full rounded-full p-[14px_20px] gap-2 bg-white ring-1 ring-[#F1F2F6] focus-within:ring-[#91BF77] transition-all duration-300">
                            <img src="{{asset('')}}assets/images/icons/location.svg"
                                class="absolute flex w-5 h-5 transform -translate-y-1/2 shrink-0 top-1/2 left-5"
                                alt="icon">
                            <select name="category" id="" class="w-full pl-8 bg-white outline-none appearance-none">
                                <option value="" hidden>Select category</option>
                                @foreach ($categories as $item)
                                <option value={{$item->slug}}>{{$item->name}}</option>
                                @endforeach
                            </select>
                            <img src="{{asset('')}}assets/images/icons/arrow-down.svg" class="w-5 h-5" alt="icon">
                        </label>
                    </div>
                    <button type="submit" class="flex w-full justify-center rounded-full p-[14px_20px] bg-ngekos-orange font-bold text-white">
                        Explore Now
                    </button>
                </div>
            </form>
        </div>
@include('includes.navigation')

@endsection
