<?php
use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    public function login(): void
    {
        $this->validate();
        $this->form->authenticate();
        Session::regenerate();
        $this->redirectIntended(default: route('home', absolute: false), navigate: true);
    }
}; 
?>


<div class="flex items-center justify-center bg-gradient-to-br from-[#8B5E3C] to-[#6B4423]">
    <div class="mx-auto max-w-screen-xl">
        <div class="flex w-full flex-col overflow-hidden rounded-2xl bg-white shadow-2xl lg:flex-row">
            
            <!-- Left Side - Logo & Welcome Text -->
            <div class="w-full bg-gradient-to-br from-[#8B5E3C] to-[#6B4423] p-12 text-white md:w-4/5">
                <div class="flex h-full flex-col items-center justify-center">
                    <img src="{{ asset('img/logo.png') }}" alt="Pet Paradise Logo" class="mb-8 h-32 w-auto transform transition-transform duration-300 hover:scale-105">
                    <h1 class="mb-4 text-4xl font-bold">Welcome Back!</h1>
                    <p class="text-center text-lg text-yellow-200">Your pets' happiness starts here.</p>
                    
                    <!-- Additional decorative elements -->
                    {{-- <div class="mt-12 space-y-4 text-center">
                        <p class="text-sm text-yellow-100/80">🐾 Premium Pet Products</p>
                        <p class="text-sm text-yellow-100/80">🚚 Fast & Free Delivery</p>
                        <p class="text-sm text-yellow-100/80">💝 Best Quality Guaranteed</p>
                    </div> --}}
                </div>
            </div>

            <!-- Right Side - Login Form -->
            <div class="w-full p-8 md:w-3/5">
                <div class="mx-auto max-w-lg">
                    <h2 class="mb-8 text-3xl font-bold text-gray-800">Sign In</h2>
                    
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form wire:submit="login" class="space-y-6">
                        <!-- Email Field -->
                        <div>
                            <label for="email" class="mb-2 block text-sm font-medium text-gray-700">
                                {{ __('Email Address') }}
                            </label>
                            <div class="relative">
                                <input
                                    wire:model="form.email"
                                    id="email"
                                    type="email"
                                    name="email"
                                    required
                                    autocomplete="username"
                                    class="w-full rounded-lg border border-gray-300 px-4 py-3 transition duration-200 focus:border-[#8B5E3C] focus:ring-[#8B5E3C]"
                                    placeholder="Enter your email"
                                >
                            </div>
                            <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
                        </div>

                        <!-- Password Field -->
                        <div>
                            <label for="password" class="mb-2 block text-sm font-medium text-gray-700">
                                {{ __('Password') }}
                            </label>
                            <div class="relative">
                                <input
                                    wire:model="form.password"
                                    id="password"
                                    type="password"
                                    name="password"
                                    required
                                    autocomplete="current-password"
                                    class="w-full rounded-lg border border-gray-300 px-4 py-3 transition duration-200 focus:border-[#8B5E3C] focus:ring-[#8B5E3C]"
                                    placeholder="Enter your password"
                                >
                            </div>
                            <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input
                                    wire:model="form.remember"
                                    id="remember"
                                    type="checkbox"
                                    class="h-4 w-4 rounded border-gray-300 text-[#8B5E3C] focus:ring-[#8B5E3C]"
                                >
                                <label for="remember" class="ml-2 text-sm text-gray-600">
                                    {{ __('Remember me') }}
                                </label>
                            </div>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" wire:navigate 
                                   class="text-sm text-[#8B5E3C] transition duration-200 hover:text-[#6B4423]">
                                    {{ __('Forgot password?') }}
                                </a>
                            @endif
                        </div>

                        <!-- Login Button -->
                        <button
                            type="submit"
                            class="w-full transform rounded-lg bg-gradient-to-r from-[#8B5E3C] to-[#6B4423] px-4 py-3 font-semibold text-white shadow-lg transition-all duration-200 hover:scale-[1.02] hover:opacity-90"
                        >
                            {{ __('Sign in') }}
                        </button>

                        <!-- Register Link -->
                        <p class="mt-6 text-center text-sm text-gray-600">
                            Don't have an account?
                            <a href="{{ route('register') }}" wire:navigate 
                               class="font-semibold text-[#8B5E3C] transition duration-200 hover:text-[#6B4423]">
                                Create account
                            </a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>