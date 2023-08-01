<span>
    <a href="{{ LaravelLocalization::getLocalizedURL('en') }}"
       @if (LaravelLocalization::getCurrentLocale() === 'en') class="font-semibold" @endif
    >
        EN
    </a>
    <a href="{{ LaravelLocalization::getLocalizedURL('uk') }}"
       @if (LaravelLocalization::getCurrentLocale() === 'uk') class="font-semibold" @endif
    >
        UA
    </a>
</span>
