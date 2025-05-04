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
        <a href="{{ route('flight.index') }}" class="flex items-center rounded-[50px] py-3 px-5 gap-[10px] w-fit bg-garuda-black">
            <img src="{{ asset('assets/images/icons/arrow-left-white.svg') }}" class="w-6 h-6" alt="icon">
            <p class="font-semibold text-white">Back to Choose Flight</p>
        </a>
        <h1 class="font-extrabold text-[50px] leading-[75px] mt-[30px]">Choose Tiers</h1>
        <div class="flex gap-[30px] mt-[30px]">
            <x-flight.info :flight="$flight" />
            <form action="{{ route('booking.booking', $flight->flight_number) }}" id="Tiers" class="grid grid-cols-2 gap-x-[30px]">
                <input type="hidden" name="flight_class_id" id="flight_class_id" value="">
                @foreach ($flight->classes as $class)
                    <div id="{{ ucfirst($class->class) }}"
                        class="flex flex-col h-fit rounded-[20px] p-5 pb-[30px] gap-5 bg-white">
                        <div class="w-[260px] h-[180px] rounded-[30px] bg-[#D9D9D9] overflow-hidden">
                            @if ($class->class == 'economy')
                                <img src="{{ asset('assets/images/thumbnails/economy-seat.png') }}"
                                    class="w-full h-full object-cover" alt="thumbnails">
                            @elseif ($class->class == 'business')
                                <img src="{{ asset('assets/images/thumbnails/business-seat.png') }}"
                                    class="w-full h-full object-cover" alt="thumbnails">>
                            @endif
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="font-semibold text-lg">{{ ucfirst($class->class) }} Class</p>
                            <p class="font-extrabold text-[32px] leading-[48px]">
                                {{ 'Rp ' . number_format($class->price, 0, ',', '.') }}</p>
                        </div>
                        <hr class="border-[#E8EFF7]">
                        @foreach ($class->facilities as $facility)
                            <div class="flex items-center gap-[10px]">
                                <img src="{{ '/storage/' . $facility->image }}" class="w-6 h-6 flex shrink-0"
                                    alt="icon">
                                <p class="font-semibold">{{ $facility->name }}</p>
                            </div>
                        @endforeach
                        <button
                            onclick="document.getElementById('flight_class_id').value = '{{ $class->id }}';"
                            class="w-full rounded-full py-3 px-5 text-center bg-garuda-blue hover:shadow-[0px_14px_30px_0px_#0068FF66] transition-all duration-300">
                            <span class="font-semibold text-white">Choose</span>
                        </button>
                    </div>
                @endforeach
            </form>
        </div>
    </main>
@endsection
