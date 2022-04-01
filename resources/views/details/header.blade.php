<header class="header">
    <nav class="container flex items-center justify-between">
        <div class="header-logo">
            <a href="{{ route('home') }}" class="logo-link">
                {{ config('app.name') }}
            </a>
        </div>

        <div class="header-links">
            <div class="space-x-4">
                <a
                    href="{{ route('home') }}"
                    class="nav-link
                    @if(request()->url() == route('home'))
                        active
                    @endif
                    "
                >
                    Главная страница
                </a>

                <a
                    href="{{ route('articles') }}"
                    class="nav-link
                    @if(request()->is('article*')))
                        active
                    @endif
                    "
                >
                    Каталог статей
                </a>
            </div>
        </div>
    </nav>
</header>
