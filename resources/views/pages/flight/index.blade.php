@extends('layouts.app')

@section('content')
    <main class="relative flex flex-col w-full max-w-[1280px] px-[75px] mx-auto mt-[50px] mb-[62px]">
        <h1 class="font-extrabold text-[50px] leading-[75px]">Flight Search</h1>
        @if (request()->has('departure') || request()->has('arrival'))
            <div class="flex w-fit rounded-[20px] p-5 gap-[30px] bg-white mt-5">
                @if ($departureAirport)
                    <div class="flex flex-col gap-[2px]">
                        <p class="text-sm text-garuda-grey">Departure</p>
                        <p class="font-semibold text-lg">{{ $departureAirport->name }} ({{ $departureAirport->iata_code }})
                        </p>
                    </div>
                @endif
                @if ($arrivalAirport)
                    <div class="flex flex-col gap-[2px]">
                        <p class="text-sm text-garuda-grey">Arrival</p>
                        <p class="font-semibold text-lg">{{ $arrivalAirport->name }} ({{ $arrivalAirport->iata_code }})</p>
                    </div>
                @endif
                <div class="flex flex-col gap-[2px]">
                    <p class="text-sm text-garuda-grey">Date</p>
                    <p class="font-semibold text-lg">{{ request()->date }}</p>
                </div>
                <div class="flex flex-col gap-[2px]">
                    <p class="text-sm text-garuda-grey">Quantity</p>
                    <p class="font-semibold text-lg">{{ request()->quantity }} People</p>
                </div>
            </div>
        @endif
        <div class="flex gap-[26px] mt-[30px]">
            <form id="Filter" action="#"
                class="flex flex-col w-[320px] shrink-0 h-fit rounded-3xl border border-[#E8EFF7] p-5 gap-5 bg-white">
                <h2 class="font-bold text-xl leading-[30px]">Filters Ticket</h2>
                <div id="Flights" class="flex flex-col gap-4">
                    <p class="font-semibold">Flights</p>
                    <label class="flex items-center gap-[10px]">
                        <input type="checkbox" name="flights" id=""
                            class="flex w-6 h-6 shrink-0 appearance-none outline-none rounded-lg ring-1 ring-garuda-black border border-white checked:bg-black checked:border-[5px]">
                        <span class="font-semibold">Direct Flight</span>
                    </label>
                    <label class="flex items-center gap-[10px]">
                        <input type="checkbox" name="flights" id=""
                            class="flex w-6 h-6 shrink-0 appearance-none outline-none rounded-lg ring-1 ring-garuda-black border border-white checked:bg-black checked:border-[5px]">
                        <span class="font-semibold">Transit 1x</span>
                    </label>
                    <label class="flex items-center gap-[10px]">
                        <input type="checkbox" name="flights" id=""
                            class="flex w-6 h-6 shrink-0 appearance-none outline-none rounded-lg ring-1 ring-garuda-black border border-white checked:bg-black checked:border-[5px]">
                        <span class="font-semibold">Transit 2x</span>
                    </label>
                </div>
                <hr class="border-[#E8EFF7]">
                <div id="Airlines" class="flex flex-col gap-4">
                    <p class="font-semibold">Airlines</p>
                    @foreach ($airlines as $airline)
                        <label class="flex items-center gap-[10px]">
                            <input type="checkbox" name="airlines" id="{{ 'airline-' . $airline->id }}"
                                value="{{ $airline->id }}"
                                class="flex w-6 h-6 shrink-0 appearance-none outline-none rounded-lg ring-1 ring-garuda-black border border-white checked:bg-black checked:border-[5px]">
                            <img src="{{ asset('storage/' . $airline->logo) }}" alt="{{ 'logo-' . $airline->name }}"
                                class="w-[60px] h-[60px] flex shrink-0">
                            <div class="flex flex-col gap-[2px]">
                                <span class="font-semibold">{{ $airline->name }}</span>
                                <span class="text-sm text-garuda-grey">Available</span>
                            </div>
                        </label>
                    @endforeach
                </div>
                <hr class="border-[#E8EFF7]">
                <div id="Facilities" class="flex flex-col gap-4">
                    <p class="font-semibold">Facilities</p>
                    <label class="flex items-center gap-[10px]">
                        <input type="checkbox" name="facilities" id=""
                            class="flex w-6 h-6 shrink-0 appearance-none outline-none rounded-lg ring-1 ring-garuda-black border border-white checked:bg-black checked:border-[5px]">
                        <img src="assets/images/icons/box-black.svg" alt="icon">
                        <span class="font-semibold">Baggage</span>
                    </label>
                    <label class="flex items-center gap-[10px]">
                        <input type="checkbox" name="facilities" id=""
                            class="flex w-6 h-6 shrink-0 appearance-none outline-none rounded-lg ring-1 ring-garuda-black border border-white checked:bg-black checked:border-[5px]">
                        <img src="assets/images/icons/video-play-black.svg" alt="icon">
                        <span class="font-semibold">Entertainment</span>
                    </label>
                    <label class="flex items-center gap-[10px]">
                        <input type="checkbox" name="facilities" id=""
                            class="flex w-6 h-6 shrink-0 appearance-none outline-none rounded-lg ring-1 ring-garuda-black border border-white checked:bg-black checked:border-[5px]">
                        <img src="assets/images/icons/electricity-black.svg" alt="icon">
                        <span class="font-semibold">USB C and Port</span>
                    </label>
                    <label class="flex items-center gap-[10px]">
                        <input type="checkbox" name="facilities" id=""
                            class="flex w-6 h-6 shrink-0 appearance-none outline-none rounded-lg ring-1 ring-garuda-black border border-white checked:bg-black checked:border-[5px]">
                        <img src="assets/images/icons/wifi-black.svg" alt="icon">
                        <span class="font-semibold">Wi-Fi Onboard</span>
                    </label>
                    <label class="flex items-center gap-[10px]">
                        <input type="checkbox" name="facilities" id=""
                            class="flex w-6 h-6 shrink-0 appearance-none outline-none rounded-lg ring-1 ring-garuda-black border border-white checked:bg-black checked:border-[5px]">
                        <img src="assets/images/icons/coffee-black.svg" alt="icon">
                        <span class="font-semibold">Heavy Meals</span>
                    </label>
                </div>
            </form>
            <div id="Result" class="flex flex-col w-full h-fit rounded-3xl p-5 gap-5 bg-white">
                <h2 class="font-bold text-xl leading-[30px]">Available Flights</h2>
                @foreach ($flights as $flight)
                    <div
                        class="transit-card accordion flex flex-col w-full rounded-[20px] border border-garuda-blue py-5 px-6 gap-5 overflow-hidden has-[:checked]:!h-[110px] has-[:checked]:border-[#E8EFF7] hover:!border-garuda-blue transition-all duration-300">
                        <label class="accordion-trigger flex items-center justify-between">
                            <input type="checkbox" name="accordion-input" class="hidden" checked>
                            <div class="flex items-center gap-[10px]">
                                <img src="{{ asset('storage/' . $flight->airline->logo) }}"
                                    class="w-[60px] h-[60px] flex shrink-0" alt="{{ 'Logo ' . $flight->airline->name }}">
                                <div>
                                    <p class="font-semibold">{{ $flight->airline->name }}</p>
                                    <p class="text-sm text-garuda-grey mt-[2px]">
                                        {{ $flight->segments->first()->time->format('H:i') }} -
                                        {{ $flight->segments->last()->time->format('H:i') }}
                                    </p>
                                </div>
                            </div>
                            <div class="flex flex-col gap-[2px] items-center justify-center">
                                <p class="text-sm text-garuda-grey">
                                    {{ number_format($flight->segments->first()->time->diffInHour($flight->segments->last()->time)) }}
                                    Hours
                                </p>
                                <div class="flex items-center gap-[6px]">
                                    <p class="font-semibold">{{ $flight->segments->first()->airport->iata_code }}</p>
                                    <img src="assets/images/icons/{{ $flight->segments->count() <= 2 ? 'direct' : 'transit' }}-black.svg"
                                        alt="icon">
                                    <p class="font-semibold">{{ $flight->segments->last()->airport->iata_code }}</p>
                                </div>
                                <p class="text-sm text-garuda-grey">
                                    {{ $flight->segments->count() <= 2 ? 'Direct Flight' : 'Transit ' . ($flight->segments->count() - 2) . 'x' }}
                                </p>
                            </div>
                            <p class="min-w-[120px] font-semibold text-garuda-green text-center">
                                {{ 'Rp ' . number_format($flight->classes->first()->price, 0, ',', '.') }}
                            </p>
                            <a href="choose-tiers.html"
                                class="rounded-full py-3 px-5 text-center bg-garuda-blue hover:shadow-[0px_14px_30px_0px_#0068FF66] transition-all duration-300">
                                <span class="font-semibold text-white">Choose</span>
                            </a>
                        </label>
                        <hr class="border-[#E8EFF7]">
                        <div class="accordion-content flex justify-between">
                            <div class="left-content flex flex-col gap-[10px]">
                                @foreach ($flight->segments as $segment)
                                    <div
                                        class="{{ $loop->first ? 'dpearture' : ($loop->last ? 'arrival' : 'transit') }} flex items-center gap-5">
                                        <div class="text-center w-[83px]">
                                            <p class="font-semibold">{{ $segment->time->format('H:i') }}</p>
                                            <p class="text-sm text-garuda-grey mt-[2px]">
                                                {{ $segment->time->format('d M y') }}</p>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <img src="assets/images/icons/{{ $loop->first ? 'departure' : ($loop->last ? 'arrival' : 'transit-round-black') }}.svg"
                                                class="w-[50px] h-[50px] flex shrink-0" alt="icon">
                                            <div>
                                                <p class="text-sm text-garuda-grey mt-[2px]">
                                                    {{ $loop->first ? 'Departure' : ($loop->last ? 'Arrival' : 'Transit') }}
                                                </p>
                                                <p class="font-semibold">{{ $segment->airport->city }}
                                                    ({{ $segment->airport->iata_code }})</p>
                                            </div>
                                        </div>
                                    </div>
                                    @if (!$loop->last)
                                        <div class="time flex flex-col items-center w-[83px]">
                                            <div class="h-8 border border-garuda-black border-dashed"></div>
                                            <p class="text-xs leading-[18px] text-garuda-grey">
                                                {{ number_format($segment->time->diffInHour($flight->segments[$loop->index + 1]->time)) }}
                                                hours</p>
                                            <div class="h-8 border border-garuda-black border-dashed"></div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <div
                                class="grid grid-cols-2 w-[320px] shrink-0 h-fit p-5 gap-y-6 justify-between rounded-[30px] bg-garuda-bg-grey">
                                @foreach ($flight->classes as $class)
                                    @foreach ($class->facilities as $facility)
                                        <div class="flex items-center gap-3 even:w-[139px] shrink-0">
                                            <img src="{{ asset('storage/' . $facility->image) }}"
                                                class="w-6 h-6 flex shrink-0" alt="icon">
                                            <div>
                                                <p class="font-semibold text-sm">{{ $facility->name }}</p>
                                                <p class="text-xs leading-[18px] text-garuda-grey">Included</p>
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
