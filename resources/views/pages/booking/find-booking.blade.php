@extends('layouts.app')
@section('title', 'Home')
@section('content')
<div class="relative flex flex-col gap-[30px] my-[60px] px-5">
    <h1 class="font-bold text-[30px] leading-[45px] text-center">Check Your<br>Booking Details</h1>
    <form action="{{ route('check.booking.show')}}" class="flex flex-col rounded-[30px] border border-[#F1F2F6] p-5 gap-6 bg-white" method="POST">
        @csrf
        <div class="flex flex-col gap-[6px]">
            <h1 class="text-lg font-semibold">Your Informations</h1>
            <p class="text-sm text-ngekos-grey">Fill the fields below with your valid data</p>
        </div>
        <div id="InputContainer" class="flex flex-col gap-[18px]">
            <div class="flex flex-col w-full gap-2">
                <p class="font-semibold">Booking ID</p>
                <label
                class="flex items-center w-full rounded-full p-[14px_20px] gap-3 bg-white ring-1 ring-[#F1F2F6] focus-within:ring-[#91BF77] transition-all duration-300">
                <img src="{{asset('')}}assets/images/icons/note-favorite-grey.svg" class="flex w-5 h-5 shrink-0"
                alt="icon">
                <input type="text" name="code" id="" @error('code') border-red-500 @enderror
                class="w-full font-semibold outline-none appearance-none placeholder:text-ngekos-grey placeholder:font-normal"
                placeholder="Write your booking id" value="{{old('code')}}">
            </label>
            @error('code')
            <p class="text-sm text-red-500">{{$message}}</p>
            @enderror
        </div>
        <div class="flex flex-col w-full gap-2">
            <p class="font-semibold">Email Address</p>
            <label
            class="flex items-center w-full rounded-full p-[14px_20px] gap-3 bg-white ring-1 ring-[#F1F2F6] focus-within:ring-[#91BF77] transition-all duration-300">
            <img src="{{asset('')}}assets/images/icons/sms.svg" class="flex w-5 h-5 shrink-0" alt="icon">
            <input type="email" name="email" id="" @error('email') border-red-500 @enderror
            class="w-full font-semibold outline-none appearance-none placeholder:text-ngekos-grey placeholder:font-normal"
            placeholder="Write your email" value="{{old('email')}}">
        </label>
        @error('email')
        <p class="text-sm text-red-500">{{$message}}</p>
        @enderror
    </div>
    <div class="flex flex-col w-full gap-2">
        <p class="font-semibold">Phone No</p>
        <label
        class="flex items-center w-full rounded-full p-[14px_20px] gap-3 bg-white ring-1 ring-[#F1F2F6] focus-within:ring-[#91BF77] transition-all duration-300">
        <img src="{{asset('')}}assets/images/icons/call.svg" class="flex w-5 h-5 shrink-0" alt="icon">
        <input type="tel" name="phone" id="" @error('phone') border-red-500 @enderror
        class="w-full font-semibold outline-none appearance-none placeholder:text-ngekos-grey placeholder:font-normal"
        placeholder="Write your phone" value="{{old('phone')}}">
    </label>
    @error('phone')
    <p class="text-sm text-red-500">{{$message}}</p>
    @enderror
</div>
<button type="submit" class="flex w-full justify-center rounded-full p-[14px_20px] bg-ngekos-orange font-bold text-white">View My Booking</button>
</div>
</form>
</div>
@include('includes.navigation')

@endsection
