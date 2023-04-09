 
<x-guest-layout>
<style>
    .razorpay-payment-button {
        background-color: #737373;
        padding: 5px 15px;
        color: whitesmoke;
        border-radius: 5px;
        cursor: pointer;
    }
</style>    
<!-- @if(!empty($data)) -->
    

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"  autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"  autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"  autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation"  autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-4 mb-4">
            <p class="mr-5 ext-sm text-gray-800  rounded-md ">Registration Fee 10 INR</p>

            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>

        <!-- <div class="flex items-center justify-center"> -->
       
        <!-- </div> -->
       
        <!-- <script src="https://checkout.razorpay.com/v1/checkout.js"
            data-key = "rzp_test_lo0bztfBJpZatE"
            data-amount = "{{$data['amount']}}"
            data-currency = "INR"
            data-order_id = "{{$data['order_id']}}"
            data-buttontext = "pay"
            data-buttonColor  ="blue"
            data-prefill.name="name"
            data-prefill.email=email
            data-description = "Test transaction"
            data-theme.color = "blue">
        </script> -->
   

        
    </form>
   
    <!-- @endif -->
</x-guest-layout>