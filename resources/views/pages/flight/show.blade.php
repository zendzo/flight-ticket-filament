@extends('layouts.app')

@section('includes')
    <div id="Background"
        class="absolute top-0 w-full h-[810px] bg-[linear-gradient(180deg,#85C8FF_0%,#D4D1FE_47.05%,#F3F6FD_100%)]">
        <img src="{{ asset('assets/images/backgrounds/Jumbo Jet Sky (1) 1.png') }}"
            class="absolute right-0 top-[147px] object-contain max-h-[481px]" alt="background image">
    </div>
@endsection
@section('content')
<main class="relative flex flex-col w-full max-w-[1280px] px-[75px] mx-auto mt-[50px] mb-[62px]">
  <a href="available-flights.html" class="flex items-center rounded-[50px] py-3 px-5 gap-[10px] w-fit bg-garuda-black">
      <img src="{{ asset('assets/images/icons/arrow-left-white.svg') }}" class="w-6 h-6" alt="icon">
      <p class="font-semibold text-white">Back to Choose Flight</p>
  </a>
  <h1 class="font-extrabold text-[50px] leading-[75px] mt-[30px]">Choose Tiers</h1>
  <div class="flex gap-[30px] mt-[30px]">
      <div id="Flight-Info" class="flex flex-col w-[470px] shrink-0 h-fit rounded-[20px] bg-white p-5 gap-5">
          <h2 class="font-bold text-xl leading-[30px]">Your Flight</h2>
          <div class="flex justify-between">
              <div>
                  <p class="text-sm text-garuda-grey">Departure</p>
                  <p class="font-semibold text-lg">Jakarta (CGK)</p>
              </div>
              <div class="text-end">
                  <p class="text-sm text-garuda-grey">Arrival</p>
                  <p class="font-semibold text-lg">Tokyo (HND)</p>
              </div>
          </div>
          <div class="flex justify-between">
              <div>
                  <p class="text-sm text-garuda-grey">Date</p>
                  <p class="font-semibold text-lg">15 Sep 2024</p>
              </div>
              <div class="text-end">
                  <p class="text-sm text-garuda-grey">Quantity</p>
                  <p class="font-semibold text-lg">3 people</p>
              </div>
          </div>
          <div class="flex flex-col rounded-[20px] border border-[#E8EFF7] p-5 gap-5">
              <div class="flex flex-col gap-4">
                  <div class="flex items-center justify-between">
                      <div class="flex items-center gap-[10px]">
                          <img src="assets/images/logos/ana.svg" class="w-[60px] h-[60px] flex shrink-0" alt="logo">
                          <div>
                              <p class="font-semibold">Angga Air</p>
                              <p class="text-sm text-garuda-grey mt-[2px]">08:30 - 12:00</p>
                          </div>
                      </div>
                      <a href="#" class="flex items-center rounded-[50px] py-3 px-5 gap-[10px] w-fit bg-garuda-black">
                          <p class="font-semibold text-white">Details</p>
                      </a>
                  </div>
                  <div class="flex items-center justify-between">
                      <div class="flex flex-col gap-[2px] items-center justify-center">
                          <p class="text-sm text-garuda-grey">12 hours</p>
                          <div class="flex items-center gap-[6px]">
                              <p class="font-semibold">CGK</p>
                              <img src="assets/images/icons/transit-black.svg" alt="icon">
                              <p class="font-semibold">HND</p>
                          </div>
                          <p class="text-sm text-garuda-grey">Transit 1x</p>
                      </div>
                      <p class="font-semibold text-garuda-green text-center">Rp 4.560.341</p>
                  </div>
              </div>
          </div>
      </div>
      <div id="Tiers" class="grid grid-cols-2 gap-x-[30px]">
          <div id="Economy" class="flex flex-col h-fit rounded-[20px] p-5 pb-[30px] gap-5 bg-white">
              <div class="w-[260px] h-[180px] rounded-[30px] bg-[#D9D9D9] overflow-hidden">
                  <img src="assets/images/thumbnails/economy-seat.png" class="w-full h-full object-cover" alt="thumbnails">
              </div>
              <div class="flex flex-col gap-1">
                  <p class="font-semibold text-lg">Economy Class</p>
                  <p class="font-extrabold text-[32px] leading-[48px]">Rp 1.560.490</p>
              </div>
              <hr class="border-[#E8EFF7]">
              <div class="flex items-center gap-[10px]">
                  <img src="assets/images/icons/box-black.svg" class="w-6 h-6 flex shrink-0" alt="icon">
                  <p class="font-semibold">Baggages 10kg</p>
              </div>
              <div class="flex items-center gap-[10px]">
                  <img src="assets/images/icons/electricity-black.svg" class="w-6 h-6 flex shrink-0" alt="icon">
                  <p class="font-semibold">USB C Port</p>
              </div>
              <div class="flex items-center gap-[10px]">
                  <img src="assets/images/icons/security-user-black.svg" class="w-6 h-6 flex shrink-0" alt="icon">
                  <p class="font-semibold">Lifeguard</p>
              </div>
              <a href="choose-seats-economy.html" class="w-full rounded-full py-3 px-5 text-center bg-garuda-blue hover:shadow-[0px_14px_30px_0px_#0068FF66] transition-all duration-300">
                  <span class="font-semibold text-white">Choose</span>
              </a>
          </div>
          <div id="Business" class="flex flex-col h-fit rounded-[20px] p-5 pb-[30px] gap-5 bg-white">
              <div class="w-[260px] h-[180px] rounded-[30px] bg-[#D9D9D9] overflow-hidden">
                  <img src="assets/images/thumbnails/business-seat.png" class="w-full h-full object-cover" alt="thumbnails">
              </div>
              <div class="flex flex-col gap-1">
                  <p class="font-semibold text-lg">Business Class</p>
                  <p class="font-extrabold text-[32px] leading-[48px]">Rp 21.560.490</p>
              </div>
              <hr class="border-[#E8EFF7]">
              <div class="flex items-center gap-[10px]">
                  <img src="assets/images/icons/box-black.svg" class="w-6 h-6 flex shrink-0" alt="icon">
                  <p class="font-semibold">Baggages 10kg</p>
              </div>
              <div class="flex items-center gap-[10px]">
                  <img src="assets/images/icons/coffee-black.svg" class="w-6 h-6 flex shrink-0" alt="icon">
                  <p class="font-semibold">Heavy Meals</p>
              </div>
              <div class="flex items-center gap-[10px]">
                  <img src="assets/images/icons/wifi-black.svg" class="w-6 h-6 flex shrink-0" alt="icon">
                  <p class="font-semibold">Wi-Fi Onboard</p>
              </div>
              <div class="flex items-center gap-[10px]">
                  <img src="assets/images/icons/video-play-black.svg" class="w-6 h-6 flex shrink-0" alt="icon">
                  <p class="font-semibold">Entertainment</p>
              </div>
              <div class="flex items-center gap-[10px]">
                  <img src="assets/images/icons/electricity-black.svg" class="w-6 h-6 flex shrink-0" alt="icon">
                  <p class="font-semibold">USB C Port</p>
              </div>
              <div class="flex items-center gap-[10px]">
                  <img src="assets/images/icons/security-user-black.svg" class="w-6 h-6 flex shrink-0" alt="icon">
                  <p class="font-semibold">Lifeguard</p>
              </div>
              <a href="choose-seats-business.html" class="w-full rounded-full py-3 px-5 text-center bg-garuda-blue hover:shadow-[0px_14px_30px_0px_#0068FF66] transition-all duration-300">
                  <span class="font-semibold text-white">Choose</span>
              </a>
          </div>
      </div>
  </div>
</main>
@endsection