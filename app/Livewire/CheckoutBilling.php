<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CheckoutBilling extends Component
{
    public $showModal = false;
    public $name, $address, $phone;

    public function render()
    {
        return view('livewire.checkout-billing');
    }

    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function proceedToPayment()
    {
        // Here you can add checkout logic (e.g., saving order details)
        $this->closeModal();
    }
}
