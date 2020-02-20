<div class="flex justify-end w-full h-16 border-b-2 border-gray-200">
    <div class="flex px-8 border-r-2 border-l-2 border-gray-200">
        <a class="flex items-center" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6">
                <circle cx="12" cy="19" r="3" class="fill-current text-gray-600" />
                <path class="fill-current text-gray-400"
                    d="M10.02 4.28L10 4a2 2 0 1 1 3.98.28A7 7 0 0 1 19 11v5a1 1 0 0 0 1 1 1 1 0 0 1 0 2H4a1 1 0 0 1 0-2 1 1 0 0 0 1-1v-5a7 7 0 0 1 5.02-6.72z" />
            </svg>
        </a>
    </div>
    <div class="flex items-center px-8">
        <a class="flex text-gray-600 text-base" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 mr-4 icon-user-circle">
                <circle cx="12" cy="12" r="10" class="fill-current text-gray-400" />
                <path class="fill-current text-gray-600"
                    d="M3.66 17.52A5 5 0 0 1 8 15h8a5 5 0 0 1 4.34 2.52 10 10 0 0 1-16.68 0zM12 13a4 4 0 1 1 0-8 4 4 0 0 1 0 8z" />
            </svg>
            <span class="mr-4">{{ auth()->user()->name }}</span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 icon-cheveron-down">
                <path class="fill-current text-gray-500" fill-rule="evenodd"
                    d="M15.3 10.3a1 1 0 0 1 1.4 1.4l-4 4a1 1 0 0 1-1.4 0l-4-4a1 1 0 0 1 1.4-1.4l3.3 3.29 3.3-3.3z" />
            </svg>
        </a>
    </div>
    <div class="flex  px-8 border-r-2 border-l-2 border-gray-200">
        <a class="flex items-center" href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 icon-door-exit">
                <path class="fill-current text-gray-500"
                    d="M11 4h3a1 1 0 0 1 1 1v3a1 1 0 0 1-2 0V6h-2v12h2v-2a1 1 0 0 1 2 0v3a1 1 0 0 1-1 1h-3v1a1 1 0 0 1-1.27.96l-6.98-2A1 1 0 0 1 2 19V5a1 1 0 0 1 .75-.97l6.98-2A1 1 0 0 1 11 3v1z" />
                <path class="fill-current text-gray-600"
                    d="M18.59 11l-1.3-1.3c-.94-.94.47-2.35 1.42-1.4l3 3a1 1 0 0 1 0 1.4l-3 3c-.95.95-2.36-.46-1.42-1.4l1.3-1.3H14a1 1 0 0 1 0-2h4.59z" />
                </svg>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>

</div>
