<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Page Title' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>


    <nav class="container mx-auto bg-white border-gray-200 dark:bg-gray-900">
        <div class="flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto">
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">EDonation</span>
            </a>
            <div class="flex space-x-3 md:order-2 md:space-x-0 rtl:space-x-reverse">
                @if (request()->is('/'))
                    <a href="/donasi">
                        <button type="button"
                            class="px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Donation</button>
                    </a>
                @elseif (request()->is('donasi'))
                    {{-- <a href="/donasi">
                    <button type="button"
                        class="px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Donation</button>
                </a>                                --}}
                @endif
            </div>
        </div>
    </nav>
    <div class="p-12 bg-slate-300 h-60">
        <h1 class="mb-3 text-4xl font-semibold">EDonation</h1>
        <p>Platform donasi untuk saudara kita yang membutuhkan</p>
    </div>
    <div class="container mx-auto">
        {{ $slot }}
    </div>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('CLIENT_KEY_MIDTRANS') }}"></script>
</body>

</html>
