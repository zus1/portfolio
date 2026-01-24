@extends('layout')

@section('content')
    <div class="mx-auto max-w-7xl dark:bg-gray-900 p-5 mt-20">
        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($posts as $post)
                <article class="overflow-hidden rounded-2xl border border-gray-200 transition-all duration-300 hover:scale-[102%] bg-white">
                    <a href="{{$post->url}}" target="_blank" class="block">
                        <img src="{{asset($post->image)}}" class="h-auto w-full object-cover" alt="Placeholder Image" />
                        <div class="p-5">
                            <h2 class="text-2xl">{{$post->title}}</h2>
                            <p class="mt-5">{!!nl2br($post->description)!!}</p>
                        </div>
                    </a>
                </article>
            @endforeach
        </div>

        <div class="p-6 mt-10">
            <div class="flex flex-col items-center">
                {{$posts->links()}}
            </div>
        </div>
    </div>
@endsection

