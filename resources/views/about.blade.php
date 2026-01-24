@extends('layout')

@section('content')
    <section class="min-h-screen bg-primary text-white py-16 px-6 flex flex-col md:flex-row items-center justify-between gap-8">
        <!-- Left Side: Image -->
        <div class="w-full md:w-5/12 flex justify-center h-full md:justify-end">
            <img src="{{asset($admin->avatar)}}" alt="Avatar" class="w-72 h-96 md:w-80 lg:w-96 object-cover rounded-lg shadow-lg" />
        </div>

        <!-- Right Side: Text Content -->
        <div class="w-full md:w-7/12 text-center md:text-left relative">
            <!-- Main Heading -->
            <h2 class="text-3xl md:text-5xl font-bold leading-tight mb-4">
                {{$admin->name}}
            </h2>

            <!-- Description -->
            <p class="text-gray-300 mb-6 text-sm md:text-base leading-relaxed max-w-2xl mx-auto md:mx-0">
                {!!nl2br($admin->about)!!}
            </p>

            <!-- Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                <a href="{{route('post.list', ['category' => \App\Enums\Categories::EXPERIENCES->value])}}" class="bg-blue-950 text-white font-semibold py-2 px-4 rounded-lg hover:bg-tertiary/80 text-center">
                    See Projects
                </a>
                <a href="{{route('post.list', ['category' => \App\Enums\Categories::SKILLS->value])}}" class="bg-blue-950 text-white font-semibold py-2 px-4 rounded-lg hover:bg-tertiary/80 text-center">
                    See Skills
                </a>
                <a href="{{route('tenants.cv')}}" class="bg-blue-950 text-white font-semibold py-2 px-4 rounded-lg hover:bg-tertiary/80 text-center">
                    Download CV
                </a>
            </div>
        </div>
    </section>



@endsection
