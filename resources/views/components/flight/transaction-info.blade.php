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
                <p class="font-semibold text-lg leading-[27px] mt-[2px]">{{ \Str::ucfirst($className) }}</p>
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
