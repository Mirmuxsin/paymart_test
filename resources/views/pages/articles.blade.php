@extends('app')

@section('content')
    <div class="blogs-catalog">
        <div class="popular-tags">
            @foreach($tags as $tag)
                <a href="{{ route('tag', $tag->slug) }}" class="tag-block">{{ $tag->name }}</a>
            @endforeach
        </div>

        <div class="blogs-list">
            @foreach($articles as $article)
                <div class="blog-card">
                <div class="card-head-big">
                    <img
                        class="card-img"
                        alt="Blog Name"
                        src="{{$article->img}}"
                    />
                </div>

                <div class="card-body">
                    <a href="{{ route('article', $article->slug) }}">
                        <h2>{{ $article->title    }}</h2>
                    </a>
                    <p>
                        {{ Str::limit($article->text, 200) }}
                    </p>

                    <div class="card-footer">
                        <div class="card-views">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                            </svg>
                            <p>{{ $article->views }}</p>
                        </div>

                        <div class="card-like">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            {{ $articles->links() }}
        </div>
    </div>
@endsection
