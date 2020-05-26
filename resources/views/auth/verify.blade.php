@extends('layouts.navigation')
@section('title', 'Verifica correo')
@section('content')
<div class="flex justify-center items-center h-full">
    <div class="">

        <div class="flex flex-col max-w-4xl md:h-56 bg-white rounded-lg shadow-lg overflow-hidden md:flex-row my-10">
            <div class="md:flex items-center justify-center md:w-1/2 md:bg-purple-700">
                <div class="py-6 px-8 md:py-0">
                    <h2 class="text-gray-700 text-2xl font-bold md:text-gray-100">{{ __('Verify Your Email Address') }}
                    </h2>
                    <p class="mt-2 text-gray-600 md:text-gray-400">
                        {{ __('Before proceeding, please check your email for a verification link.') }}</p>
                </div>
            </div>
            <div class="flex items-center justify-center pb-6 md:py-0 md:w-1/2 md:border-b-8 border-purple-700">
                @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
                @endif
                <form method="POST" action="{{ action('Auth\VerificationController@resent') }}">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <div class="flex flex-col rounded-lg overflow-hidden sm:flex-row">
                        <p
                            class="py-3 px-4 bg-gray-200 text-gray-800 border-purple-300 border-2 outline-none placeholder-gray-500 focus:bg-gray-100">
                            {{ __('If you did not receive the email, click here to request another') }}</p>
                        <button
                            class="py-3 px-4 bg-purple-700 text-gray-100 font-semibold uppercase hover:bg-pink-700">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection