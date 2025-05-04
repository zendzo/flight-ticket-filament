<div id="Flight-Info" class="flex flex-col w-[470px] shrink-0 h-fit rounded-[20px] bg-white p-5 gap-5">
  <h2 class="font-bold text-xl leading-[30px]">Your Flight</h2>
  <div class="flex justify-between">
      <div>
          <p class="text-sm text-garuda-grey">Departure</p>
          <p class="font-semibold text-lg">{{ $flight->segments->first()->airport->name }}
              ({{ $flight->segments->first()->airport->iata_code }})</p>
      </div>
      <div class="text-end">
          <p class="text-sm text-garuda-grey">Arrival</p>
          <p class="font-semibold text-lg">{{ $flight->segments->last()->airport->name }}
              ({{ $flight->segments->last()->airport->iata_code }})</p>
      </div>
  </div>
  <div class="flex justify-between">
      <div>
          <p class="text-sm text-garuda-grey">Date</p>
          <p class="font-semibold text-lg">{{ $flight->segments->first()->time->format('d F Y') }}</p>
      </div>
      <div class="text-end">
          <p class="text-sm text-garuda-grey">Quantity</p>
          <p class="font-semibold text-lg" id="quantity">{{ count($totalPassengers) }} people</p>
      </div>
  </div>
  <div class="flex flex-col rounded-[20px] border border-[#E8EFF7] p-5 gap-5">
      <div class="flex flex-col gap-4">
          <div class="flex items-center justify-between">
              <div class="flex items-center gap-[10px]">
                  <img src="{{ asset('storage/' . $flight->airline->logo) }}"
                      class="w-[60px] h-[60px] flex shrink-0" alt="logo">
                  <div>
                      <p class="font-semibold">{{ $flight->airline->name }}</p>
                      <p class="text-sm text-garuda-grey mt-[2px]">
                          {{ $flight->segments->first()->time->format('H:i') }} -
                          {{ $flight->segments->last()->time->format('H:i') }}</p>
                  </div>
              </div>
              <a href="#"
                  class="flex items-center rounded-[50px] py-3 px-5 gap-[10px] w-fit bg-garuda-black">
                  <p class="font-semibold text-white">Details</p>
              </a>
          </div>
          <div class="flex items-center justify-between">
              <div class="flex flex-col gap-[2px] items-center justify-center">
                  <p class="text-sm text-garuda-grey">
                      {{ number_format($flight->segments->first()->time->diffInHour($flight->segments->last()->time)) }}
                      hours</p>
                  <div class="flex items-center gap-[6px]">
                      <p class="font-semibold">{{ $flight->segments->first()->airport->iata_code }}</p>
                      @if ($flight->segments->count() <= 2)
                          <img src="{{ asset('assets/images/icons/direct-black.svg') }}" alt="icon">
                      @else
                          <img src="{{ asset('assets/images/icons/transit-black.svg') }}" alt="icon">
                      @endif
                      <p class="font-semibold">{{ $flight->segments->last()->airport->iata_code }}</p>
                  </div>
                  <p class="text-sm text-garuda-grey">
                      {{ $flight->segments->count() <= 2 ? 'Direct Flight' : 'Transit ' . ($flight->segments->count() - 2) . 'x' }}
                  </p>
              </div>
              <p class="font-semibold text-garuda-green text-center">
                  {{ 'Rp ' . number_format($flight->classes->first()->price, 0, ',', '.') }}
                </p>
          </div>
      </div>
  </div>
</div>