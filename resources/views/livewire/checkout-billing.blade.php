<div>
    <!-- Checkout Button -->
    <button wire:click="openModal" class="mt-4 w-full rounded bg-black py-3 text-sm font-bold uppercase text-white">
        Checkout
    </button>

    <!-- Modal Overlay -->
    @if($showModal)
    <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
        <div class="w-full max-w-md rounded-lg bg-white p-6 shadow-lg">
            <h2 class="mb-4 text-lg font-semibold">Billing Details</h2>
            <form wire:submit.prevent="proceedToPayment">
                @csrf
                <label class="block text-sm font-medium text-gray-700">Full Name</label>
                <input type="text" wire:model="name" class="w-full rounded border px-4 py-2 text-sm" required>

                <label class="mt-4 block text-sm font-medium text-gray-700">Address</label>
                <input type="text" wire:model="address" class="w-full rounded border px-4 py-2 text-sm" required>

                <label class="mt-4 block text-sm font-medium text-gray-700">Phone Number</label>
                <input type="text" wire:model="phone" class="w-full rounded border px-4 py-2 text-sm" required>

                <div class="mt-4 flex justify-between">
                    <button type="button" wire:click="closeModal" class="px-4 py-2 text-sm text-gray-600">Cancel</button>
                    <button type="submit" class="rounded bg-black px-4 py-2 text-sm font-bold uppercase text-white">
                        Proceed to Payment
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endif
</div>
