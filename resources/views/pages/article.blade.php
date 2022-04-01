@extends('app')

@section('scripts')
    <script src="{{ asset('js/article-increment.js') }}"></script>
    <meta name="view-increment" content="{{ route('api.article.viewIncrement', ['id' => $article->id]) }}" />
@endsection

@section('content')
    <div class="blog-single">
        <div class="blog-container">
            <h2 class="text-4xl font-bold">{{ $article->title }}</h2>

            <div class="card-head-big pt-3">
                <img
                    class="card-img rounded"
                    alt="Blog Name"
                    src="https://get.wallhere.com/photo/monochrome-abstract-symmetry-circle-spider-Arachnid-material-line-darkness-wing-1680x1050-px-computer-wallpaper-black-and-white-monochrome-photography-fractal-art-invertebrate-spider-web-570038.jpg"
                />
            </div>

            <div class="blog-details">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>

                <div class="blog-views">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                    </svg>
                    <p>{{ $article->views }}</p>
                </div>
            </div>

            <div class="blog-tags">
                @foreach($tags as $tag)
                    <a href="{{ route('tag', $tag->tag->slug ?? 0) }}" class="tag-block">{{ $tag->tag->name }}</a>
                @endforeach
            </div>

            <p class="blog-content">
                {{ $article->text }}
            </p>

            <hr class="blog-split" />

            <div class="comments-list">
                <h5 class="text-2xl font-semibold">Комментарии</h5>
                <ul id="comments" class="space-y-4 divide-y divide-dark-600">
                    @if(count($article->comments))
                            @foreach($article->comments as $comment)
                                <li id="comment-{{ $comment->id }}" class="comment-block">
                                    <h5>{{ $comment->title }}</h5>
                                    <p>{{ $comment->comment }}</p>
                                </li>
                            @endforeach
                    @else
                        <div class="not-comments">
                            Этой публикации пока нет комментарии
                        </div>
                    @endif
                </ul>
            </div>

            <div class="comment-section">
                <h4 class="text-2xl font-semibold mb-4">Оставить комментарий</h4>

                <form
                    action="{{ route('api.comment.post', ['id' => $article->id]) }}"
                    method="POST" class="space-y-4" ajax-form
                >
                    <input class="input" name="title" placeholder="Тема сообщение" />
                    <small class="title_error"></small>

                    <textarea class="input" rows="3" name="comment" placeholder="Сообщение"></textarea>
                    <small class="comment_error"></small>

                    <button class="btn btn-comment">Отправить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
