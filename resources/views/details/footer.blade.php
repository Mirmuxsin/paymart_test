<footer class="footer">
    <div class="w-1/3">
        <h4 class="text-5xl font-semibold mb-2">{{ config('app.name') }}</h4>
        <p class="text-sm">
            &copy; 2020 - 2022. All right reserved.
        </p>
    </div>

    <div class="w-1/3">
        <ul class="space-y-4">
            <li>
                <a href="{{ route('home') }}">
                    Главная страница
                </a>
            </li>

            <li>
                <a href="{{ route('articles') }}">
                    Каталог статей
                </a>
            </li>
        </ul>
    </div>
</footer>
