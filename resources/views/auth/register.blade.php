@extends('dashboard::layouts.app')
@section('content')
<div class="mt-32 mb-10">
    <a class="text-2xl text-center" href="#">
        <h3 class="font-semibold"><span class="text-gray-700">Company</span><span class="text-gray-500">Logo</span></h3>
    </a>
</div>
<h1 class="text-center text-2xl font-medium text-gray-600 mt-12 mb-4">
    {{ trans('dashboard::ui.auth.create_account') }}
</h1>
<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="w-1/2 max-w-xs mx-auto">
        <div class="mb-4">
            <input name="name" type="text" class="outline-none w-full  text-gray-600 border-2 border-gray-400 rounded px-3 py-2 focus:border-gray-500 {{ $errors->has('name') ? 'border-gray-600' : '' }}"
                placeholder="{{ trans('dashboard::ui.auth.account_name') }}" value="{{ old('name') }}" >
            @if ($errors->has('name'))
            <p class="my-2 text-gray-600 text-xs italic">{{ $errors->first('name') }}</p>
            @endif
        </div>
        <div class="mb-4">
            <input name="email" type="email" class="outline-none w-full  text-gray-600 border-2 border-gray-400 rounded px-3 py-2 focus:border-gray-500  {{ $errors->has('email') ? 'border-gray-600' : '' }}"
                placeholder="{{ trans('dashboard::ui.auth.account_email') }}" value="{{ old('email') }}" >
            @if ($errors->has('email'))
            <p class="my-2 text-gray-600 text-xs italic">{{ $errors->first('email') }}</p>
            @endif
        </div>
        <div class="mb-4">
            <input name="email_confirmation" type="email" class="outline-none w-full  text-gray-600 border-2 border-gray-400 rounded px-3 py-2 focus:border-gray-500  {{ $errors->has('email_confirmation') ? 'border-gray-600' : '' }}"
                placeholder="{{ trans('dashboard::ui.auth.account_email_confirmation') }}" value="{{ old('email_confirmation') }}" >
        </div>
        {{-- <div class="mb-4">
            <input name="phone" type="tel" class="outline-none w-full  text-gray border-2 border-gray-400 rounded px-3 py-2 focus:border-gray  {{ $errors->has('phone') ? 'border-gray-600' : '' }}"
                placeholder="Tel&eacute;fono celular" value="{{ old('phone') }}" required>
            @if ($errors->has('phone'))
            <p class="my-2 text-gray text-xs italic">{{ $errors->first('phone') }}</p>
            @endif
        </div> --}}
        <div class="mb-6">
            <input name="password" type="password" class="outline-none w-full  text-gray-600 border-2 border-gray-400 rounded px-3 py-2 focus:border-gray {{ $errors->has('password') ? 'border-gray-600' : '' }}"
                placeholder="{{ trans('dashboard::ui.auth.password') }}" >
            @if ($errors->has('password'))
            <p class="my-2 text-gray-600 text-xs italic">{{ $errors->first('password') }}</p>
            @endif
        </div>
        <button type="submit" class="block bg-gray-600 hover:bg-gray-700 tracking-wider text-sm text-white uppercase font-medium mx-auto my-4 py-2 px-4 rounded">
            {{ trans('dashboard::ui.auth.create_account') }}
        </button>
        <p class="text-center ">
            <a class="no-underline font-bold text-gray-600 hover:text-gray-700" href="{{ route('login') }}">
                {{ trans('dashboard::ui.auth.login') }}
            </a>
        </p>
    </div>
</form>
@endsection
