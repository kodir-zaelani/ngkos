@extends('layouts.app')
@section('title', 'Home')
@section('content')
<div id="Background" class="absolute top-0 w-full h-[570px] rounded-b-[75px] bg-[linear-gradient(180deg,#F2F9E6_0%,#D2EDE4_100%)]"></div>
<div id="TopNav" class="relative flex items-center justify-between px-5 mt-[60px]">
    <a href="{{route('findkos')}}" class="flex items-center justify-center w-12 h-12 overflow-hidden bg-white rounded-full shrink-0">
        <img src="{{asset('')}}assets/images/icons/arrow-left.svg" class="w-[28px] h-[28px]" alt="icon">
    </a>
    <p class="font-semibold">Search Results</p>
    <div class="w-12 dummy-btn"></div>
</div>
<div id="Header" class="relative flex items-center justify-between gap-2 px-5 mt-[18px]">
    <div class="flex flex-col gap-[6px]">
        <h2 class="font-bold text-[32px] leading-[48px]">Search Result</h2>
        @if ($boardinghouse->count() == 0)
        <h5 class="font-bold text-[32px] leading-[48px] text-red-700">data tidak ditemukan</h5>
        @endif
        <p>
            @if ($search)
            Pencarian nama Kos : {{$search}}
            @else
            Tidak ada kunci pencarian
            @endif
        </p>
        <p>
            @if ($city)
            Berdasarakan Kota : {{$city}}
            @else
            Tidak ada pilihan kota
            @endif
        </p>
        <p class="text-red-700">
            @if ($category)
            Berdasarakan Kategori : {{$category}}
            @else
            Tidak ada pilihan Kategori
            @endif
        </p>
        <p class="text-ngekos-grey">Tersedia {{$boardinghouse->count()}} Kos</p>
    </div>
</div>
<section id="Result" class="relative flex flex-col gap-4 px-5 mt-5 mb-9">
    @forelse ($boardinghouse as $item)
    <a href="{{route('kos.detail', $item->slug)}}" class="card">
        <div class="flex rounded-[30px] border border-[#F1F2F6] p-4 gap-4 bg-white hover:border-[#91BF77] transition-all duration-300">
            <div class="flex w-[120px] h-[183px] shrink-0 rounded-[30px] bg-[#D9D9D9] overflow-hidden">
                <img src="{{asset('')}}/uploads/{{$item->thumbnail}}" class="object-cover w-full h-full" alt="icon">
            </div>
            <div class="flex flex-col w-full gap-3">
                <h3 class="font-semibold text-lg leading-[27px] line-clamp-2 min-h-[54px]">{{$item->name}}</h3>
                <hr class="border-[#F1F2F6]">
                <div class="flex items-center gap-[6px]">
                    <img src="{{asset('')}}assets/images/icons/location.svg" class="flex w-5 h-5 shrink-0" alt="icon">
                    <p class="text-sm text-ngekos-grey">{{$item->city->name}}</p>
                </div>
                <div class="flex items-center gap-[6px]">
                    <img src="{{asset('')}}assets/images/icons/3dcube.svg" class="flex w-5 h-5 shrink-0" alt="icon">
                    <p class="text-sm text-ngekos-grey">In {{$item->category->name}}</p>
                </div>
                <div class="flex items-center gap-[6px]">
                    <img src="{{asset('')}}assets/images/icons/profile-2user.svg" class="flex w-5 h-5 shrink-0" alt="icon">
                    <p class="text-sm text-ngekos-grey">4 People</p>
                </div>
                <hr class="border-[#F1F2F6]">
                <p class="text-lg font-semibold text-ngekos-orange">Rp {{number_format($item->price, 0, ',','.')}}<span class="text-sm font-normal text-ngekos-grey">/bulan</span></p>
            </div>
        </div>
    </a>
    @empty
    @endforelse

</section>
@include('includes.navigation')

@endsection
