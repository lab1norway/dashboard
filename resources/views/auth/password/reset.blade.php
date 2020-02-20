@extends('dashboard::layouts.app')

@section('content')
<div class="mt-32 mb-10">
    <a class="text-2xl text-center" href="#">
        <h3 class="font-semibold"><span class="text-gray-700">Company</span><span class="text-gray-500">Logo</span></h3>
    </a>
</div>
<h1 class="text-center text-2xl font-medium text-gray-600 mt-12 mb-4">{{ trans('dashboard::ui.auth.reset_password') }}</h1>
@if ($errors->any())
@foreach ($errors->all() as $error)
<p class="my-2 text-gray-600 text-xs text-center italic">{{ $error }}</p>
@endforeach
@endif
<form method="POST" action="{{ route('password.update') }}">
    @csrf
    <div class="w-1/2 max-w-xs mx-auto">
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="mb-4">
            <input name="email" type="email"  value="{{ old('email') }}" class="outline-none w-full  text-gray-500 border-2 border-gray-400 rounded px-3 py-2 focus:border-gray {{ $errors->any() ? ' border-red' : '' }}"
                placeholder="{{ trans('dashboard::ui.auth.username') }}" required>
        </div>
        <div class="mb-6">
            <input name="password" type="password" class="outline-none w-full text-gray-500 border-2 border-gray-400 rounded px-3 py-2 focus:border-gray {{ $errors->any() ? ' border-red' : '' }}"
                placeholder="{{ trans('dashboard::ui.auth.password') }}" required>
        </div>

        <div class="mb-6">
            <input name="password_confirmation" type="password" class="outline-none w-full text-gray-500 border-2 border-gray-400 rounded px-3 py-2 focus:border-gray {{ $errors->any() ? ' border-red' : '' }}"
                placeholder="{{ trans('dashboard::ui.auth.password') }}" required>
        </div>

        <button type="submit" class=" block bg-gray-600 hover:bg-gray-700 text-sm text-white tracking-wider uppercase font-medium mx-auto my-4 py-2 px-4 rounded">
            {{ trans('dashboard::ui.auth.change_password') }}
        </button>
    </div>
</form>
@endsection
