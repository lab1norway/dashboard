@extends('dashboard::layouts.app')

@section('content')
<div class="mt-32 mb-10">
    <a class="text-2xl text-center" href="#">
        <h3 class="font-semibold"><span class="text-gray-700">Company</span><span class="text-gray-500">Logo</span></h3>
    </a>
</div>
<h1 class="text-center text-2xl font-medium text-gray-600 mt-12 mb-4">{{ trans('dashboard::ui.auth.login') }}</h1>
@if ($errors->any())
@foreach ($errors->all() as $error)
<p class="my-2 text-gray-600 text-xs text-center italic">{{ $error }}</p>
@endforeach
@endif
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="w-1/2 max-w-xs mx-auto my-auto">
        <div class="mb-4">
            <input name="email" type="email" value="{{ old('email') }}"
                class="outline-none w-full  text-gray-600 border-2 border-gray-400 rounded px-3 py-2 focus:border-gray-500 {{ $errors->any() ? ' border-red' : '' }}"
                placeholder="{{ trans('dashboard::ui.auth.username') }}" required>
        </div>
        <div class="mb-6">
            <input name="password" type="password"
                class="outline-none w-full text-gray-600 border-2 border-gray-400 rounded px-3 py-2 focus:border-gray-500 {{ $errors->any() ? ' border-red' : '' }}"
                placeholder="{{ trans('dashboard::ui.auth.password') }}" required>
        </div>

        <div class="mb-6">
            <p class="text-center">
            <a class="no-underline font-semibold text-gray-600 hover:text-gray-700" href="{{ route('password.request') }}">
                {{ trans('dashboard::ui.auth.recover_password') }}
                </a>
            </p>
        </div>

        <button type="submit"
            class=" block bg-gray-700 hover:bg-gray-600 tracking-wider uppercase text-sm text-white font-medium mx-auto my-4 py-2 px-4 rounded">
            {{ trans('dashboard::ui.auth.login') }}
        </button>
</form>
@endsection
