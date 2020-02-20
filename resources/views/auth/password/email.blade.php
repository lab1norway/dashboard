@extends('dashboard::layouts.app')
@section('content')
<div class="mt-32 mb-10">
    <a class="text-2xl text-center" href="#">
        <h3 class="font-semibold"><span class="text-gray-700">Company</span><span class="text-gray-500">Logo</span></h3>
    </a>
</div>
<h1 class="text-center text-2xl font-medium text-gray-600 mt-12 mb-2">
    {{ trans('dashboard::ui.auth.forgot_password') }}
</h1>
<p class="text-center text-gray-600 mb-4">
    {{ trans('dashboard::ui.auth.forgot_password_message') }}
</p>
@if ($errors->any())
@foreach ($errors->all() as $error)
<p class="my-2 text-gray-600 text-xs text-center font-semibold italic">{{ $error }}</p>
@endforeach
@endif

@if (session('status'))
<p class="my-2 text-gray-600 text-xs text-center font-semibold italic mb-2">
    {{ session('status') }}
</p>
@endif
<form method="POST" action="{{ route('password.email') }}">
    @csrf
    <div class="flex w-3/6 mx-auto mb-6">
        <div class="w-3/5">
            <label for=""></label>
            <input name="email" type="email" class="outline-none w-full  text-gray border-2 border-gray-400 rounded-l px-3 py-2 focus:border-gray-500 {{ $errors->any() ? ' border-red' : '' }}"
                placeholder="{{ trans('dashboard::ui.auth.username') }}" value="{{ old('email') }}" required>
        </div>
        <div class="w-2/5 ">
            <button class="w-full bg-gray-600 hover:bg-gray-700 border-2 border-gray-600 tracking-wider text-white uppercase font-medium mx-auto py-2 px-3 rounded-br rounded-tr">
                {{ trans('dashboard::ui.auth.reset_link') }}
            </button>
        </div>
    </div>
</form>
@endsection
