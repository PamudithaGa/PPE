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


    <div class="w-full max-w-md space-y-6 rounded-lg bg-white p-8 shadow-lg dark:bg-gray-800">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <h2 class="text-center text-2xl font-bold text-gray-900 dark:text-white">
            {{ __('Sign in to your account') }}
        </h2>

        <form wire:submit="login" class="space-y-4">
            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input wire:model="form.email" id="email" class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-700 dark:text-white" type="email" name="email" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input wire:model="form.password" id="password" class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-700 dark:text-white" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="flex items-center justify-between">
                <label for="remember" class="inline-flex items-center">
                    <input wire:model="form.remember" id="remember" type="checkbox" class="rounded border-gray-300 text-indigo-600 dark:border-gray-700 dark:bg-gray-800 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800">
                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:underline dark:text-indigo-400">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <!-- Login Button -->
            <div>
                <x-primary-button class="flex w-full justify-center rounded-md bg-indigo-600 px-4 py-2 font-bold text-white transition duration-300 hover:bg-indigo-700">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>

            <!-- Register -->
            <div class="text-center">
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    {{ __("Don't have an account?") }}
                    <a href="{{ route('register') }}" class="text-indigo-600 hover:underline dark:text-indigo-400">
                        {{ __('Create a new account') }}
                    </a>
                </p>
            </div>
        </form>
    </div>
