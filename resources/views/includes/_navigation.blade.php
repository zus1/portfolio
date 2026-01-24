<header class="bg-white dark:bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex-1 md:flex md:items-center md:gap-12">
                <a class="block text-teal-600 dark:text-teal-300" href="{{route('about.get')}}">
                    <span class="sr-only">Home</span>
                    <img src="{{asset($tenant->logo)}}" width="80" height="80" alt="Logo">
                </a>
            </div>

            <div class="md:flex md:items-center md:gap-12">
                <nav aria-label="Global" class="hidden md:block">
                    <ul class="flex items-center gap-6 text-sm">
                        <li>
                            <a class="text-gray-500 transition hover:text-gray-500/75 dark:text-white dark:hover:text-white/75" href="{{route('about.get')}}">
                                About
                            </a>
                        </li>

                        <li>
                            <a class="text-gray-500 transition hover:text-gray-500/75 dark:text-white dark:hover:text-white/75" href="{{route('post.list', ['category' => \App\Enums\Categories::EXPERIENCES->value])}}">
                                Projects
                            </a>
                        </li>

                        <li>
                            <a class="text-gray-500 transition hover:text-gray-500/75 dark:text-white dark:hover:text-white/75" href="{{route('post.list', ['category' => \App\Enums\Categories::SKILLS->value])}}">
                                Skills
                            </a>
                        </li>

                        <li>
                            <a class="text-gray-500 transition hover:text-gray-500/75 dark:text-white dark:hover:text-white/75" href="{{route('contact.get')}}">
                                Get in Touch
                            </a>
                        </li>
                    </ul>
                </nav>

                <div class="flex items-center gap-4">
                    <div class="sm:flex sm:gap-4">
                    <div class="block md:hidden">
                        <button class="rounded-sm bg-gray-100 p-2 text-gray-600 transition hover:text-gray-600/75 dark:bg-gray-800 dark:text-white dark:hover:text-white/75">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</header>
