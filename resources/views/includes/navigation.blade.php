<div id="BottomNav" class="relative flex w-full h-[138px] shrink-0">
    <nav class="fixed bottom-5 w-full max-w-[640px] px-5 z-10">
        <div class="grid grid-cols-4 h-fit rounded-[40px] justify-between py-4 px-5 bg-ngekos-black">
            <a href="{{route('root')}}" class="flex flex-col items-center gap-2 text-center">
                <img src="{{asset('')}}assets/images/icons/global-green.svg" class="flex w-8 h-8 shrink-0" alt="icon">
                <span class="text-sm font-semibold text-white">Discover</span>
            </a>
            <a href="{{route('find.booking')}}" class="flex flex-col items-center gap-2 text-center">
                <img src="{{asset('')}}assets/images/icons/note-favorite.svg" class="flex w-8 h-8 shrink-0" alt="icon">
                <span class="text-sm font-semibold text-white">Orders</span>
            </a>
            <a href="{{route('findkos')}}" class="flex flex-col items-center gap-2 text-center">
                <img src="{{asset('')}}assets/images/icons/search-status.svg" class="flex w-8 h-8 shrink-0" alt="icon">
                <span class="text-sm font-semibold text-white">Find</span>
            </a>
            <a href="#" class="flex flex-col items-center gap-2 text-center">
                <img src="{{asset('')}}assets/images/icons/24-support.svg" class="flex w-8 h-8 shrink-0" alt="icon">
                <span class="text-sm font-semibold text-white">Help</span>
            </a>
        </div>
    </nav>
</div>
