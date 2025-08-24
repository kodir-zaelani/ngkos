@extends('layouts.app')
@section('title', 'Home')
@section('content')
<div id="TopNav" class="relative flex items-center justify-between px-5 mt-[60px]">
    <a href="{{route('root')}}"
    class="flex items-center justify-center w-12 h-12 overflow-hidden bg-white rounded-full shrink-0">
    <img src="{{asset('')}}assets/images/icons/arrow-left.svg" class="w-[28px] h-[28px]" alt="icon">
</a>
<p class="font-semibold">Browse Koskos</p>
<div class="w-12 dummy-btn"></div>
</div>
<div id="Header" class="relative flex items-center justify-between gap-2 px-5 mt-[18px]">
    <div class="flex flex-col gap-[6px]">
        <h1 class="font-bold text-[32px] leading-[48px]">Kos in Villa</h1>
        <p class="text-ngekos-grey">Tersedia {{$boardinghouse->count()}} Kos</p>
    </div>
    <button class="flex flex-col items-center text-center shrink-0 rounded-[22px] p-[10px_20px] gap-2 bg-white">
        <img src="{{asset('')}}assets/images/icons/star.svg" class="w-6 h-6" alt="icon">
        <p class="text-sm font-bold">4/5</p>
    </button>
</div>
<section id="Result" class="relative flex flex-col gap-4 px-5 mt-5 mb-9">
    @foreach ($boardinghouse as $item)
    <a href="{{route('kos.detail', $item->slug)}}" class="card">
        <div
        class="flex rounded-[30px] border border-[#F1F2F6] p-4 gap-4 bg-white hover:border-[#91BF77] transition-all duration-300">
        <div class="flex w-[120px] h-[183px] shrink-0 rounded-[30px] bg-[#D9D9D9] overflow-hidden">
            <img src="{{asset('')}}/uploads/{{$item->thumbnail}}" class="object-cover w-full h-full" alt="icon">
        </div>
        <div class="flex flex-col w-full gap-3">
            <h3 class="font-semibold text-lg leading-[27px] line-clamp-2 min-h-[54px]">
                {{$item->name}}
            </h3>
            <hr class="border-[#F1F2F6]">
            <div class="flex items-center gap-[6px]">
                <img src="{{asset('')}}assets/images/icons/location.svg" class="flex w-5 h-5 shrink-0" alt="icon">
                <p class="text-sm text-ngekos-grey">{{$item->city->name}}</p>
            </div>
            <div class="flex items-center gap-[6px]">
                <img src="{{asset('')}}assets/images/icons/profile-2user.svg" class="flex w-5 h-5 shrink-0" alt="icon">
                <p class="text-sm text-ngekos-grey">4 People</p>
            </div>
            <hr class="border-[#F1F2F6]">
            <p class="text-lg font-semibold text-ngekos-orange">Rp {{number_format($item->price, 0, ',','.')}}<span
                class="text-sm font-normal text-ngekos-grey">/bulan</span></p>
            </div>
        </div>
    </a>
    @endforeach
</section>
@include('includes.navigation')

@endsection
