<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Portfolio') }}</title>

        <!-- Fonts -->
        @vite('resources/css/app.css')
    </head>
    <body class="dark:bg-gray-900">
        @include('includes._navigation')
        @yield('content')
    </body>
    <footer class="bg-gray-800 text-white py-4 px-3 mt-16">
        <div class="container mx-auto flex flex-wrap items-center justify-between mr-10">
            <div class="w-full md:w-1/3 md:text-center md:mb-0 mb-8">
                <div class="flex space-x-5 pt-2">
                    <!-- GitHub Icon -->
                    <a href="{{$tenant->socials['github']}}" target="_blank" class="text-gray-500 hover:text-blue-600 dark:text-gray-400 dark:hover:text-teal-400 transition-transform transform hover:scale-110">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="currentColor" className={className}>
                            <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.087-.731.084-.716.084-.716 1.205.082 1.838 1.215 1.838 1.215 1.07 1.835 2.809 1.305 3.492.998.108-.776.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.046.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                        </svg>
                    </a>
                    <!-- LinkedIn Icon -->
                    <a href="{{$tenant->socials['linkedin']}}" target="_blank" class="text-gray-500 hover:text-blue-600 dark:text-gray-400 dark:hover:text-teal-400 transition-transform transform hover:scale-110">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="currentColor" className={className}>
                            <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                        </svg>
                    </a>
                    <a href="{{url()->route('tenants.cv')}}" class="text-gray-500 hover:text-blue-600 dark:text-gray-400 dark:hover:text-teal-400 transition-transform transform hover:scale-110">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 640 640" fill="currentColor" className={className}>
                            <path d="M304 112L192 112C183.2 112 176 119.2 176 128L176 512C176 520.8 183.2 528 192 528L448 528C456.8 528 464 520.8 464 512L464 272L376 272C336.2 272 304 239.8 304 200L304 112zM444.1 224L352 131.9L352 200C352 213.3 362.7 224 376 224L444.1 224zM128 128C128 92.7 156.7 64 192 64L325.5 64C342.5 64 358.8 70.7 370.8 82.7L493.3 205.3C505.3 217.3 512 233.6 512 250.6L512 512C512 547.3 483.3 576 448 576L192 576C156.7 576 128 547.3 128 512L128 128z"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="w-full md:w-1/3 md:text-center md:mb-0 mb-8">

                <div>
                    <ul class="mt-4 space-y-2 text-gray-700">
                        <li class="flex items-center gap-2">
                            <a href="mailto:hello@yourservice.io" class="inline-link flex gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                     class="tabler-icon tabler-icon-mail">
                                    <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z"></path>
                                    <path d="M3 7l9 6l9 -6"></path>
                                </svg>{{$tenant->email}}
                            </a>
                        </li>
                        <li class="flex w-auto items-center justify-start gap-2">
                            <a href="https://twitter.com/yourserviceio" class="inline-link flex gap-2" target="_blank"
                               rel="noreferrer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                     class="tabler-icon tabler-icon-mail">
                                    <path d="M12.5 21h-4.5a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v7" />
                                    <path d="M19 22v-6" />
                                    <path d="M22 19l-3 -3l-3 3" />
                                    <path d="M11 4h2" />
                                    <path d="M12 17v.01" />
                                </svg>{{$tenant->phone}}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </footer>
</html>
