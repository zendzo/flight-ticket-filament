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
                <div id="Flight-Info"
                    class="accordion group flex flex-col h-fit rounded-[20px] bg-white overflow-hidden has-[:checked]:!h-[75px] transition-all duration-300">
                    <label class="flex items-center justify-between p-5">
                        <h2 class="font-bold text-xl leading-[30px]">Your Flight</h2>
                        <img src="{{ asset('assets/images/icons/arrow-up-circle-black.svg') }}"
                            class="w-9 h-8 group-has-[:checked]:rotate-180 transition-all duration-300" alt="icon">
                        <input type="checkbox" class="hidden">
                    </label>
                    <div class="accordion-content p-5 pt-0 flex flex-col gap-5">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-sm text-garuda-grey">Departure</p>
                                <p class="font-semibold text-lg">
                                    {{ $flight->segments->first()->airport->name }}
                                    ({{ $flight->segments->first()->airport->iata_code }})
                                </p>
                            </div>
                            <div class="text-end">
                                <p class="text-sm text-garuda-grey">Arrival</p>
                                <p class="font-semibold text-lg">
                                    {{ $flight->segments->last()->airport->name }}
                                    ({{ $flight->segments->last()->airport->iata_code }})
                                </p>
                            </div>
                        </div>
                        <div class="flex justify-between">
                            <div>
                                <p class="text-sm text-garuda-grey">Date</p>
                                <p class="font-semibold text-lg">{{ $flight->segments->first()->time->format('d F Y') }}</p>
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
                                        <img src="{{ asset('storage/' . $flight->airline->logo) }}"
                                            class="h-[100px] flex shrink-0" alt="logo">
                                    </div>
                                    <a href="#"
                                        class="flex items-center rounded-[50px] py-3 px-5 gap-[10px] w-fit bg-garuda-black">
                                        <p class="font-semibold text-white">Details</p>
                                    </a>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="font-semibold">{{ $flight->airline->name }}</p>
                                        <p class="text-sm text-garuda-grey mt-[2px]">
                                            {{ $flight->segments->first()->time->format('H:i') }} -
                                            {{ $flight->segments->last()->time->format('H:i') }}
                                        </p>
                                    </div>
                                    <div class="flex flex-col gap-[2px] items-center justify-center">
                                        <p class="text-sm text-garuda-grey">
                                            {{ number_format($flight->segments->first()->time->diffInHour($flight->segments->last()->time)) }}
                                            hours</p>
                                        <div class="flex items-center gap-[6px]">
                                            <p class="font-semibold">{{ $flight->segments->first()->airport->iata_code }}
                                            </p>
                                            <img src="{{ asset('assets/images/icons/transit-black.svg') }}" alt="icon">
                                            <p class="font-semibold">
                                                {{ $flight->segments->last()->airport->iata_code }}
                                            </p>
                                        </div>
                                        <p class="text-sm text-garuda-grey">
                                            {{ $flight->segments->count() <= 2 ? 'Direct Flight' : 'Transit ' . ($flight->segments->count() - 2) . 'x' }}
                                        </p>
                                    </div>
                                    <p class="font-semibold text-garuda-green text-center">
                                        {{ 'Rp ' . number_format($tier->price, 0, ',', '.') }}
                                    </p>
                                </div>
                            </div>
                            <hr class="border-[#E8EFF7]">
                            <div class="flex items-center rounded-[20px] gap-[14px]">
                                <div class="flex w-[120px] h-[100px] shrink-0 rounded-[20px] overflow-hidden">
                                    @if ($tier->class == 'economy')
                                        <img src="{{ asset('assets/images/thumbnails/economy-seat.png') }}"
                                            class="w-full h-full object-cover" alt="thumbnails-{{ $tier->class }}">
                                    @elseif ($tier->class == 'business')
                                        <img src="{{ asset('assets/images/thumbnails/business-seat.png') }}"
                                            class="w-full h-full object-cover" alt="thumbnails-{{ $tier->class }}">
                                    @endif
                                </div>
                                <div>
                                    <p class="font-bold text-xl leading-[30px]">{{ ucfirst($tier->class) }} Class</p>
                                    <p class="text-garuda-grey mt-1">{{ 'Rp ' . number_format($tier->price, 0, ',', '.') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="Transaction-Info"
                    class="accordion group flex flex-col h-fit rounded-[20px] bg-white overflow-hidden has-[:checked]:!h-[75px] transition-all duration-300">
                    <label class="flex items-center justify-between p-5">
                        <h2 class="font-bold text-xl leading-[30px]">Transaction Details</h2>
                        <img src="{{ asset('assets/images/icons/arrow-up-circle-black.svg') }}"
                            class="w-9 h-8 group-has-[:checked]:rotate-180 transition-all duration-300" alt="icon">
                        <input type="checkbox" class="hidden">
                    </label>
                    <div class="accordion-content p-5 pt-0 flex flex-col gap-5">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-sm text-garuda-grey">Quantity</p>
                                <p class="font-semibold text-lg leading-[27px] mt-[2px]" id="quantity">0 People</p>
                            </div>
                            <div>
                                <p class="text-sm text-garuda-grey">Tiers</p>
                                <p class="font-semibold text-lg leading-[27px] mt-[2px]">{{ \Str::ucfirst($tier->class) }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-garuda-grey">Seats</p>
                                <p class="font-semibold text-lg leading-[27px] mt-[2px]" id="selectedSeats">-</p>
                            </div>
                        </div>
                        <div class="flex justify-between">
                            <div>
                                <p class="text-sm text-garuda-grey">Price</p>
                                <p class="font-semibold text-lg leading-[27px] mt-[2px]" id="price">Rp 0</p>
                            </div>
                            <div>
                                <p class="text-sm text-garuda-grey">Govt. Tax</p>
                                <p class="font-semibold text-lg leading-[27px] mt-[2px]" id="tax">%</p>
                            </div>
                            <div>
                                <p class="text-sm text-garuda-grey">Sub Total</p>
                                <p class="font-semibold text-lg leading-[27px] mt-[2px]" id="subTotal">Rp 0</p>
                            </div>
                        </div>
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm text-garuda-grey">Total Tax</p>
                                <p class="font-semibold text-lg leading-[27px] mt-[2px]" id="totalTax">Rp 0</p>
                            </div>
                            <div>
                                <p class="text-sm text-garuda-grey">Grand Total</p>
                                <p class="font-bold text-2xl leading-9 text-garuda-blue mt-[2px]" id="grandTotal">Rp
                                    0</p>
                            </div>
                        </div>
                    </div>
                </div>
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
