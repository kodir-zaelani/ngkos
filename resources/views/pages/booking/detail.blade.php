@extends('layouts.app')
@section('title', 'Home')
@section('content')
<div id="TopNav" class="relative flex items-center justify-between px-5 mt-[60px]">
    <a href="check-booking.html" class="flex items-center justify-center w-12 h-12 overflow-hidden bg-white rounded-full shrink-0">
        <img src="{{asset('')}}assets/images/icons/arrow-left.svg" class="w-[28px] h-[28px]" alt="icon">
    </a>
    <p class="font-semibold">My Booking Details</p>
    <div class="w-12 dummy-btn"></div>
</div>
<div id="Header" class="relative flex items-center justify-between gap-2 px-5 mt-[18px]">
    <div class="flex flex-col w-full rounded-[30px] border border-[#F1F2F6] p-4 gap-4 bg-white">
        <div class="flex gap-4">
            <div class="flex w-[120px] h-[132px] shrink-0 rounded-[30px] bg-[#D9D9D9] overflow-hidden">
                <img src="{{asset('')}}assets/images/thumbnails/details-1.png" class="object-cover w-full h-full" alt="icon">
            </div>
            <div class="flex flex-col w-full gap-3">
                <p class="font-semibold text-lg leading-[27px] line-clamp-2 min-h-[54px]">Tumbuh Tentram Berada Rumah Nenek</p>
                <hr class="border-[#F1F2F6]">
                <div class="flex items-center gap-[6px]">
                    <img src="{{asset('')}}assets/images/icons/location.svg" class="flex w-5 h-5 shrink-0" alt="icon">
                    <p class="text-sm text-ngekos-grey">Singapore City</p>
                </div>
                <div class="flex items-center gap-[6px]">
                    <img src="{{asset('')}}assets/images/icons/profile-2user.svg" class="flex w-5 h-5 shrink-0" alt="icon">
                    <p class="text-sm text-ngekos-grey">In Housee</p>
                </div>
            </div>
        </div>
        <hr class="border-[#F1F2F6]">
        <div class="flex gap-4">
            <div class="flex w-[120px] h-[138px] shrink-0 rounded-[30px] bg-[#D9D9D9] overflow-hidden">
                <img src="{{asset('')}}assets/images/thumbnails/kos-2.png" class="object-cover w-full h-full" alt="icon">
            </div>
            <div class="flex flex-col w-full gap-3">
                <p class="font-semibold text-lg leading-[27px]">Executive Room</p>
                <hr class="border-[#F1F2F6]">
                <div class="flex items-center gap-[6px]">
                    <img src="{{asset('')}}assets/images/icons/profile-2user.svg" class="flex w-5 h-5 shrink-0" alt="icon">
                    <p class="text-sm text-ngekos-grey">2 People</p>
                </div>
                <div class="flex items-center gap-[6px]">
                    <img src="{{asset('')}}assets/images/icons/3dcube.svg" class="flex w-5 h-5 shrink-0" alt="icon">
                    <p class="text-sm text-ngekos-grey">184 sqft flat</p>
                </div>
                <div class="flex items-center gap-[6px]">
                    <img src="{{asset('')}}assets/images/icons/shopping-bag.svg" class="flex w-5 h-5 shrink-0" alt="icon">
                    <p class="text-sm text-ngekos-grey">Bonus Included</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="accordion group flex flex-col rounded-[30px] p-5 bg-[#F5F6F8] mx-5 mt-5 overflow-hidden has-[:checked]:!h-[68px] transition-all duration-300">
    <label class="relative flex items-center justify-between">
        <p class="text-lg font-semibold">Customer</p>
        <img src="{{asset('')}}assets/images/icons/arrow-up.svg" class="w-[28px] h-[28px] flex shrink-0 group-has-[:checked]:rotate-180 transition-all duration-300" alt="icon">
        <input type="checkbox" class="absolute hidden">
    </label>
    <div class="flex flex-col gap-4 pt-[22px]">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <img src="{{asset('')}}assets/images/icons/profile-2user.svg" class="flex w-6 h-6 shrink-0" alt="icon">
                <p class="text-ngekos-grey">Name</p>
            </div>
            <p class="font-semibold">Sabrina Erisma</p>
        </div>
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <img src="{{asset('')}}assets/images/icons/sms.svg" class="flex w-6 h-6 shrink-0" alt="icon">
                <p class="text-ngekos-grey">Email</p>
            </div>
            <p class="font-semibold">sabrina@ggwp.com.au</p>
        </div>
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <img src="{{asset('')}}assets/images/icons/call.svg" class="flex w-6 h-6 shrink-0" alt="icon">
                <p class="text-ngekos-grey">Phone</p>
            </div>
            <p class="font-semibold">628123982138</p>
        </div>
    </div>
</div>
<div class="accordion group flex flex-col rounded-[30px] p-5 bg-[#F5F6F8] mx-5 mt-5 overflow-hidden has-[:checked]:!h-[68px] transition-all duration-300">
    <label class="relative flex items-center justify-between">
        <p class="text-lg font-semibold">Booking</p>
        <img src="{{asset('')}}assets/images/icons/arrow-up.svg" class="w-[28px] h-[28px] flex shrink-0 group-has-[:checked]:rotate-180 transition-all duration-300" alt="icon">
        <input type="checkbox" class="absolute hidden">
    </label>
    <div class="flex flex-col gap-4 pt-[22px]">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <img src="{{asset('')}}assets/images/icons/calendar.svg" class="flex w-6 h-6 shrink-0" alt="icon">
                <p class="text-ngekos-grey">Booking ID</p>
            </div>
            <p class="font-semibold">NGKBWA1996</p>
        </div>
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <img src="{{asset('')}}assets/images/icons/clock.svg" class="flex w-6 h-6 shrink-0" alt="icon">
                <p class="text-ngekos-grey">Duration</p>
            </div>
            <p class="font-semibold">3 Months</p>
        </div>
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <img src="{{asset('')}}assets/images/icons/calendar.svg" class="flex w-6 h-6 shrink-0" alt="icon">
                <p class="text-ngekos-grey">Started At</p>
            </div>
            <p class="font-semibold">10 Desember 2024</p>
        </div>
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <img src="{{asset('')}}assets/images/icons/calendar.svg" class="flex w-6 h-6 shrink-0" alt="icon">
                <p class="text-ngekos-grey">Ended At</p>
            </div>
            <p class="font-semibold">10 Maret 2024</p>
        </div>
    </div>
</div>
<div class="accordion group flex flex-col rounded-[30px] p-5 bg-[#F5F6F8] mx-5 mt-5 overflow-hidden has-[:checked]:!h-[68px] transition-all duration-300">
    <label class="relative flex items-center justify-between">
        <p class="text-lg font-semibold">Payment</p>
        <img src="{{asset('')}}assets/images/icons/arrow-up.svg" class="w-[28px] h-[28px] flex shrink-0 group-has-[:checked]:rotate-180 transition-all duration-300" alt="icon">
        <input type="checkbox" class="absolute hidden">
    </label>
    <div class="flex flex-col gap-4 pt-[22px]">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <img src="{{asset('')}}assets/images/icons/card-tick.svg" class="flex w-6 h-6 shrink-0" alt="icon">
                <p class="text-ngekos-grey">Payment</p>
            </div>
            <p class="font-semibold">Full Payment 100%</p>
        </div>
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <img src="{{asset('')}}assets/images/icons/receipt-2.svg" class="flex w-6 h-6 shrink-0" alt="icon">
                <p class="text-ngekos-grey">Kos Price</p>
            </div>
            <p class="font-semibold">Rp 8.493.442</p>
        </div>
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <img src="{{asset('')}}assets/images/icons/receipt-2.svg" class="flex w-6 h-6 shrink-0" alt="icon">
                <p class="text-ngekos-grey">Sub Total</p>
            </div>
            <p class="font-semibold">Rp 69.390.493</p>
        </div>
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <img src="{{asset('')}}assets/images/icons/receipt-disscount.svg" class="flex w-6 h-6 shrink-0" alt="icon">
                <p class="text-ngekos-grey">PPN 11%</p>
            </div>
            <p class="font-semibold">Rp 24.495.392</p>
        </div>
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <img src="{{asset('')}}assets/images/icons/security-user.svg" class="flex w-6 h-6 shrink-0" alt="icon">
                <p class="text-ngekos-grey">Insurance</p>
            </div>
            <p class="font-semibold">Rp 890.000</p>
        </div>
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <img src="{{asset('')}}assets/images/icons/receipt-text.svg" class="flex w-6 h-6 shrink-0" alt="icon">
                <p class="text-ngekos-grey">Grand total</p>
            </div>
            <p class="font-semibold">Rp 248.495.499</p>
        </div>
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <img src="{{asset('')}}assets/images/icons/security-card.svg" class="flex w-6 h-6 shrink-0" alt="icon">
                <p class="text-ngekos-grey">Status</p>
            </div>
            <p class="rounded-full p-[6px_12px] bg-ngekos-orange font-bold text-xs leading-[18px]">PENDING</p>
        </div>
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <img src="{{asset('')}}assets/images/icons/security-card.svg" class="flex w-6 h-6 shrink-0" alt="icon">
                <p class="text-ngekos-grey">Status</p>
            </div>
            <p class="rounded-full p-[6px_12px] bg-[#91BF77] font-bold text-xs leading-[18px]">SUCCESSFUL</p>
        </div>
    </div>
</div>
<div id="BottomButton" class="relative flex w-full h-[98px] shrink-0">
    <div class="fixed bottom-[30px] w-full max-w-[640px] px-5 z-10">
        <a href="#" class="flex w-full justify-center rounded-full p-[14px_20px] bg-ngekos-orange font-bold text-white">Contact Customer Service</a>
    </div>
</div>

@endsection
