<!DOCTYPE html>
<html>
    <head>
        <title>
            Task List App
        </title>
        <script src="https://cdn.tailwindcss.com"></script>

        {{-- blade-formatter-disable --}}
        <style type="text/tailwindcss">
        .btn {
            @apply rounded-md px-2 py-1 text-center text-slate-700 font-medium shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50
        }

        .link {
            @apply font-medium text-gray-700 underline decoration-pink-500;
        }

        label {
            @apply block uppercase text-slate-700 mb-2;
        }

        input, textarea {
            @apply shadow-sm appearance-none border w-full py-2 px-2 text-slate-700 leading-tight focus:outline-none;
        }

        .error {
            @apply text-red-500 text-sm;
        }
        </style>
         {{-- blade-formatter-disable --}}
        @yield('styles')
    </head>

    <body class="container mx-auto mt-10 mb-10 max-w-lg">
        <h1 class="mb-4 text-2xl">
            @yield('title')
        </h1>
        <div>
        <div class="mb-10 text-lg text-green-700 rounded border border-green-400 bg-green-100 px-4 py-3">
            <span class="font-bold">
                Success!
            </span>   Flash Message!
            </div>
            <!-- @if (session()->has('success')) -->
            <!-- <div>
                {{session('success')}}
            </div> -->
            <!-- @endif -->
            @yield('content')
        </div>

    </body>
</html>