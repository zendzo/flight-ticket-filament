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
        <div class="flex">
            <div id="Left-Content" class="flex flex-col gap-[30px] w-[470px] shrink-0">
                <a href="{{ route('flight.show', $flight->flight_number) }}"
                    class="flex items-center rounded-[50px] py-3 px-5 gap-[10px] w-fit bg-garuda-black">
                    <img src="{{ asset('assets/images/icons/arrow-left-white.svg') }}" class="w-6 h-6" alt="icon">
                    <p class="font-semibold text-white">Back to Choose Flight</p>
                </a>
                <h1 class="font-extrabold text-[50px] leading-[75px]">Choose Seats</h1>
                <x-flight.info :flight="$flight" :totalPassengers="$transaction['selected_seats'] ?? []"/>
                <x-flight.transaction-info :className="$tier->class"/>
            </div>
            <div id="Plane" class="relative flex w-[558px] shrink-0 mt-[30px] mx-auto">
                <img id="Plane-Body" src="{{ asset('assets/images/backgrounds/plane-body.svg') }}"
                    class="absolute w-full h-full object-contain" alt="background">
                <div class="relative flex flex-col justify-end">
                    <img id="Plane-Windshield" src="{{ asset('assets/images/backgrounds/plane-windshield.svg') }}"
                        class="absolute top-16 w-full object-contain px-[56px]" alt="image">
                    <form method="POST" action="{{ route('booking.confirm-seat', $flight->flight_number) }}"
                        class="relative px-[56px] pb-[60px]" id="form-seat">
                        @csrf
                        <input type="hidden" name="flight_id" value="{{ $flight->id }}">
                        <p class="text-center font-bold text-xl leading-[30px]">{{ \Str::ucfirst($tier->class) }} Class
                        </p>
                        <div id="Legend" class="flex items-center justify-center mb-[30px] gap-5 mt-5">
                            <div class="flex items-center gap-[6px]">
                                <span class="w-4 h-4 flex shrink-0 rounded-[6px] bg-white border border-[#FFA44B]"></span>
                                <span class="font-semibold">Available</span>
                            </div>
                            <div class="flex items-center gap-[6px]">
                                <span class="w-4 h-4 flex shrink-0 rounded-[6px] bg-[#C2C9DA]"></span>
                                <span class="font-semibold">Booked</span>
                            </div>
                            <div class="flex items-center gap-[6px]">
                                <span class="w-4 h-4 flex shrink-0 rounded-[6px] bg-garuda-blue"></span>
                                <span class="font-semibold">Selected</span>
                            </div>
                        </div>
                        <div id="Seats-Options"
                            class="flex flex-wrap w-full gap-y-8 {{ $tier->class == 'business' ? 'gap-x-10 px-[33px]' : 'gap-x-[14px]' }} ">
                            @foreach ($flight->seats->where('class_type', $tier->class) as $seat)
                                <label
                                    class="group relative flex w-[55px] h-[52.25px] shrink-0 {{ $tier->class == 'business' ? '[&:nth-child(4n+2)]:mr-10' : '[&:nth-child(6n+3)]:mr-[46px]' }}"
                                    data-seat="{{ $seat->name }}" data-seat-id="{{ $seat->id }}">
                                    <input type="checkbox" name="seat"
                                        class="seat-checkbox absolute top-1/2 left-1/2 opacity-0"
                                        {{ !$seat->is_available ? 'disabled' : '' }} />
                                    <img src="{{ asset('assets/images/icons/seat.svg') }}"
                                        class="absolute w-full h-full object-contain opacity-100 group-has-[:checked]:opacity-0 group-has-[:disabled]:opacity-0 transition-all duration-300"
                                        alt="seat">
                                    <img src="{{ asset('assets/images/icons/seat-choosed.svg') }}"
                                        class="absolute w-full h-full object-contain opacity-0 group-has-[:checked]:opacity-100 group-has-[:disabled]:opacity-0 transition-all duration-300"
                                        alt="seat">
                                    <img src="{{ asset('assets/images/icons/seat-disabled.svg') }}"
                                        class="absolute w-full h-full object-contain opacity-0 group-has-[:disabled]:opacity-100 transition-all duration-300"
                                        alt="seat">
                                    <p
                                        class="relative flex items-center justify-center h-full w-full pb-[8.25px] font-semibold text-[16.5px] leading-[24.75px] text-premiere-black group-has-[:checked]:text-white">
                                        {{ $seat->name }}</p>
                                </label>
                            @endforeach
                        </div>
                        <button type="submit"
                            class="w-full rounded-full py-3 px-5 text-center bg-garuda-blue hover:shadow-[0px_14px_30px_0px_#0068FF66] transition-all duration-300 mt-[30px]">
                            <span class="font-semibold text-white">Continue Booking</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    <script>
        const basePrice = {{ $tier->price }};
    </script>
    <script src="{{ asset('assets/js/chose-seat.js') }}"></script>
@endsection
