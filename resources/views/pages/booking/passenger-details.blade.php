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
        <a href="{{ route('booking.choose-seat', $flight->flight_number) }}"
            class="flex items-center rounded-[50px] py-3 px-5 gap-[10px] w-fit bg-garuda-black">
            <img src="{{ asset('assets/images/icons/arrow-left-white.svg') }}" class="w-6 h-6" alt="icon">
            <p class="font-semibold text-white">Back to Choose Seats</p>
        </a>
        <h1 class="font-extrabold text-[50px] leading-[75px] mt-[30px]">Passenger Details</h1>
        <form action="checkout.html" class="flex gap-[30px] mt-[30px]">
            <div id="Left-Content" class="flex flex-col gap-[30px] w-[470px] shrink-0">
                <x-flight.info :flight="$flight" :totalPassengers="$transaction['selected_seats']" />
                <x-flight.transaction-info :className="$tier->class" />
                <button type="submit"
                    class="w-full rounded-full py-3 px-5 text-center bg-garuda-blue hover:shadow-[0px_14px_30px_0px_#0068FF66] transition-all duration-300">
                    <span class="font-semibold text-white">Continue Booking</span>
                </button>
            </div>
            <div id="Right-Content" class="flex flex-col gap-[30px] w-[490px] shrink-0">
                <div id="Customer-Info"
                    class="accordion group flex flex-col h-fit rounded-[20px] bg-white overflow-hidden has-[:checked]:!h-[75px] transition-all duration-300">
                    <label class="flex items-center justify-between p-5">
                        <h2 class="font-bold text-xl leading-[30px]">Customer Information</h2>
                        <img src="{{ asset('assets/images/icons/arrow-up-circle-black.svg') }}"
                            class="w-9 h-8 group-has-[:checked]:rotate-180 transition-all duration-300" alt="icon">
                        <input type="checkbox" class="hidden">
                    </label>
                    <div class="accordion-content p-5 pt-0 flex flex-col gap-5">
                        <label class="flex flex-col gap-[10px]">
                            <p class="font-semibold">Complete Name</p>
                            <div
                                class="flex items-center rounded-full border border-garuda-black py-3 px-5 gap-[10px] focus-within:border-[#0068FF] transition-all duration-300">
                                <img src="{{ asset('assets/images/icons/profile-black.svg') }}" class="w-5 flex shrink-0" alt="icon">
                                <input type="text" name="" id=""
                                    class="appearance-none outline-none w-full font-semibold placeholder:font-normal"
                                    placeholder="Write your complete name">
                            </div>
                        </label>
                        <label class="flex flex-col gap-[10px]">
                            <p class="font-semibold">Email Address</p>
                            <div
                                class="flex items-center rounded-full border border-garuda-black py-3 px-5 gap-[10px] focus-within:border-[#0068FF] transition-all duration-300">
                                <img src="{{ asset('assets/images/icons/sms-black.png') }}" class="w-5 flex shrink-0" alt="icon">
                                <input type="email" name="" id=""
                                    class="appearance-none outline-none w-full font-semibold placeholder:font-normal"
                                    placeholder="Write your valid email">
                            </div>
                        </label>
                        <label class="flex flex-col gap-[10px]">
                            <p class="font-semibold">Phone No.</p>
                            <div
                                class="flex items-center rounded-full border border-garuda-black py-3 px-5 gap-[10px] focus-within:border-[#0068FF] transition-all duration-300">
                                <img src="{{ asset('assets/images/icons/call-black.svg') }}" class="w-5 flex shrink-0" alt="icon">
                                <input type="tel" name="" id=""
                                    class="appearance-none outline-none w-full font-semibold placeholder:font-normal"
                                    placeholder="Write your active number">
                            </div>
                        </label>
                    </div>
                </div>
                <!-- for accordions with select input inside, the script was different from the normal accordion -->
                @foreach ($transaction['selected_seats'] as $seat)
                    <div id="Passenger-{{ $loop->index + 1 }}"
                        class="accordion-with-select group flex flex-col h-fit rounded-[20px] bg-white overflow-hidden transition-all duration-300">
                        <button type="button" class="accordion-btn flex items-center justify-between p-5">
                            <h2 class="font-bold text-xl leading-[30px]">Passenger {{ $loop->index + 1}}</h2>
                            <img src="{{ asset('assets/images/icons/arrow-up-circle-black.svg') }}"
                                class="arrow w-9 h-8 transition-all duration-300" alt="icon">
                        </button>
                        <div class="accordion-content p-5 pt-0 flex flex-col gap-5">
                            <label class="flex flex-col gap-[10px]">
                                <p class="font-semibold">Complete Name</p>
                                <div
                                    class="flex items-center rounded-full border border-garuda-black py-3 px-5 gap-[10px] focus-within:border-[#0068FF] transition-all duration-300">
                                    <img src="{{ asset('assets/images/icons/profile-black.svg') }}" class="w-5 flex shrink-0"
                                        alt="icon">
                                    <input type="text" name="passengers[{{ $loop->index }}][name]" id="passengers[{{ $loop->index }}][name]"
                                        class="appearance-none outline-none w-full font-semibold placeholder:font-normal"
                                        placeholder="Write your complete name">
                                </div>
                            </label>
                            <div class="flex flex-col gap-[10px]">
                                <p class="font-semibold">Date of Birth</p>
                                <input type="hidden" name="passengers[{{ $loop->index }}][date_of_birth]" id="dateOfBirth-[{{ $loop->index }}]" data-index="{{ $loop->index }}">
                                <div class="flex items-center gap-[10px]">
                                    <label
                                        class="relative flex items-center w-full rounded-full overflow-hidden border border-garuda-black gap-[10px] focus-within:border-[#0068FF] transition-all duration-300">
                                        <img src="{{ asset('assets/images/icons/note-add-black.svg') }}"
                                            class="absolute transform -translate-y-1/2 top-1/2 left-5 w-5 shrink-0"
                                            alt="icon">
                                        <select id="day-select-{{ $loop->index }}" name=""
                                            data-index="{{ $loop->index }}"
                                            onchange="updateDateOfBirth({{ $loop->index }})"
                                            class="date-select day-select appearance-none w-full outline-none pl-[50px] py-3 px-5 font-semibold indeterminate:!font-normal">
                                            <option hidden>DD</option>
                                        </select>
                                    </label>
                                    <label
                                        class="relative flex items-center w-full rounded-full overflow-hidden border border-garuda-black gap-[10px] focus-within:border-[#0068FF] transition-all duration-300">
                                        <img src="{{ asset('assets/images/icons/note-add-black.svg') }}"
                                            class="absolute transform -translate-y-1/2 top-1/2 left-5 w-5 shrink-0"
                                            alt="icon">
                                        <select id="month-select-{{ $loop->index }}" name=""
                                            data-index="{{ $loop->index }}"
                                            onchange="updateDateOfBirth({{ $loop->index }})"
                                            class="date-select month-select appearance-none w-full outline-none pl-[50px] py-3 px-5 font-semibold indeterminate:!font-normal">
                                            <option hidden>MM</option>
                                        </select>
                                    </label>
                                    <label
                                        class="relative flex items-center w-full rounded-full overflow-hidden border border-garuda-black gap-[10px] focus-within:border-[#0068FF] transition-all duration-300">
                                        <img src="{{ asset('assets/images/icons/note-add-black.svg') }}"
                                            class="absolute transform -translate-y-1/2 top-1/2 left-5 w-5 shrink-0"
                                            alt="icon">
                                        <select id="year-select-{{ $loop->index }}" name=""
                                            data-index="{{ $loop->index }}"
                                            onchange="updateDateOfBirth({{ $loop->index }})"
                                            class="date-select year-select appearance-none w-full outline-none pl-[50px] py-3 px-5 font-semibold indeterminate:!font-normal">
                                            <option hidden>YYYY</option>
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <label class="flex flex-col gap-[10px]">
                                <p class="font-semibold">Nationality</p>
                                <div
                                    class="relative flex items-center w-full rounded-full overflow-hidden border border-garuda-black gap-[10px] focus-within:border-[#0068FF] transition-all duration-300">
                                    <img src="{{ asset('assets/images/icons/global-black.svg') }}"
                                        class="absolute transform -translate-y-1/2 top-1/2 left-5 w-5 shrink-0"
                                        alt="icon">
                                    <select name="" id=""
                                        class="appearance-none w-full outline-none pl-[50px] py-3 px-5 font-semibold indeterminate:!font-normal">
                                        <option hidden>Select country region</option>
                                        <option>Singapore</option>
                                        <option>Japan</option>
                                        <option>Indonesia</option>
                                    </select>
                                </div>
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>
        </form>
    </main>
@endsection

@section('scripts')
    <script>
        const basePrice = {{ $tier->price }};
    </script>
    <script src="{{ asset('assets/js/chose-seat.js') }}"></script>
    <script src="{{ asset('assets/js/date-of-birth.js') }}"></script>
@endsection
