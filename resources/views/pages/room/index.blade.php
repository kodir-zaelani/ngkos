@extends('layouts.app')
@section('title', 'Room Available')
@section('content')
<div id="TopNav" class="relative flex items-center justify-between px-5 mt-[60px]">
    <a href="details.html"
    class="flex items-center justify-center w-12 h-12 overflow-hidden bg-white rounded-full shrink-0">
    <img src="{{asset('')}}assets/images/icons/arrow-left.svg" class="w-[28px] h-[28px]" alt="icon">
</a>
<p class="font-semibold">Choose Available Room sss</p>
<div class="w-12 dummy-btn"></div>
</div>
<div id="Header" class="relative flex items-center justify-between gap-2 px-5 mt-[18px]">
    <div class="flex w-full rounded-[30px] border border-[#F1F2F6] p-4 gap-4 bg-white">
        <div class="flex w-[120px] h-[132px] shrink-0 rounded-[30px] bg-[#D9D9D9] overflow-hidden">
            <img src="{{asset('')}}assets/images/thumbnails/details-1.png" class="object-cover w-full h-full" alt="icon">
        </div>
        <div class="flex flex-col w-full gap-3">
            <h1 class="font-semibold text-lg leading-[27px] line-clamp-2 min-h-[54px]">
                {{$boardinghouse->name}}
            </h1>
                <hr class="border-[#F1F2F6]">
                <div class="flex items-center gap-[6px]">
                    <img src="{{asset('')}}assets/images/icons/location.svg" class="flex w-5 h-5 shrink-0" alt="icon">
                    <p class="text-sm text-ngekos-grey">{{$boardinghouse->city->name}}</p>
                </div>
                <div class="flex items-center gap-[6px]">
                    <img src="{{asset('')}}assets/images/icons/profile-2user.svg" class="flex w-5 h-5 shrink-0" alt="icon">
                    <p class="text-sm text-ngekos-grey">In {{$boardinghouse->category->name}}</p>
                </div>
            </div>
        </div>
    </div>
    <form action="{{route('booking', $boardinghouse->slug)}}" class="relative flex flex-col gap-4 mt-5">
        <input type="hidden" name="boardinghouse_id" value="{{$boardinghouse->id}}">
        <h2 class="px-5 font-bold">Available Rooms</h2>
        <div id="RoomsContainer" class="flex flex-col gap-4 px-5">
            @foreach ($boardinghouse->rooms as $item)
            <label class="relative group">
                <input type="radio" name="room_id" class="absolute opacity-0 top-1/2 left-1/2 -z-10" value="{{$item->id}}" required>
                <div
                class="flex rounded-[30px] border border-[#F1F2F6] p-4 gap-4 bg-white hover:border-[#91BF77] group-has-[:checked]:ring-2 group-has-[:checked]:ring-[#91BF77] transition-all duration-300">
                <div class="flex w-[120px] h-[156px] shrink-0 rounded-[30px] bg-[#D9D9D9] overflow-hidden">
                    <img src="{{asset('')}}uploads/{{$item->images->first()->image}}" class="object-cover w-full h-full"
                    alt="icon">
                </div>
                <div class="flex flex-col w-full gap-3">
                    <h3 class="font-semibold text-lg leading-[27px]">{{$item->name}}</h3>
                    <hr class="border-[#F1F2F6]">
                    <div class="flex items-center gap-[6px]">
                        <img src="{{asset('')}}assets/images/icons/profile-2user.svg" class="flex w-5 h-5 shrink-0"
                        alt="icon">
                        <p class="text-sm text-ngekos-grey">{{$item->capacity}} People</p>
                    </div>
                    <div class="flex items-center gap-[6px]">
                        <img src="{{asset('')}}assets/images/icons/3dcube.svg" class="flex w-5 h-5 shrink-0" alt="icon">
                        <p class="text-sm text-ngekos-grey">{{$item->square_feet}} sqft flat</p>
                    </div>
                    <hr class="border-[#F1F2F6]">
                    <p class="text-lg font-semibold text-ngekos-orange">Rp {{number_format($item->price_per_month, 0, ',','.')}}<span
                        class="text-sm font-normal text-ngekos-grey">/bulan</span></p>
                    </div>
                </div>
            </label>
            @endforeach
        </div>
        <div id="BottomButton" class="relative flex w-full h-[98px] shrink-0">
            <div class="fixed bottom-[30px] w-full max-w-[640px] px-5 z-10">
                <button
                class="w-full rounded-full p-[14px_20px] bg-ngekos-orange font-bold text-white text-center">Continue
                Booking</button>
            </div>
        </div>
    </form>
    @endsection
    @push('scripts')
    <script src="{{asset('')}}assets/js/details.js"></script>
    @endpush

