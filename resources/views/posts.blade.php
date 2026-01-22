@extends('layout')

@section('content')
    @foreach($posts as $post)
        <section class="overflow-hidden bg-gray-50 sm:grid sm:grid-cols-2 dark:bg-gray-900 mt-20flex flex-col md:flex-row items-center justify-between gap-8">
            <div class="p-8 md:p-12 lg:px-16 lg:py-24">
                <div class="mx-auto max-w-xl text-center ltr:sm:text-left rtl:sm:text-right">
                    <h2 class="text-2xl font-bold text-gray-900 md:text-3xl dark:text-white">
                        {{$post->title}}
                    </h2>

                    <p class="hidden text-gray-500 md:mt-4 md:block dark:text-gray-300">
                        {!!nl2br($post->description)!!}
                    </p>

                    <div class="mt-4 md:mt-8">
                        <a href="{{$post->url}}" class="inline-block rounded-sm bg-emerald-600 px-12 py-3 text-sm font-medium text-white transition hover:bg-emerald-700 focus:ring-2 focus:ring-yellow-400 focus:outline-hidden">
                            Find out more
                        </a>
                    </div>
                </div>
            </div>

            <img alt="Image" src="{{asset($post->image)}}" class="w-200 h-112 object-cover">
        </section>




    @endforeach
@endsection
