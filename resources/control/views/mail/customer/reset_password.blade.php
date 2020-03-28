@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            {{ config('app.name') }}
        @endcomponent
    @endslot
    <div>
        <h1>Доброго дня!</h1>
        <p>Ви отримали це повідомлення, оскільки ми отримали запит на зміну пароля для Вашого облікового запису.</p>
        <p><a href="{{ $url }}">Змінити пароль</a></p>
        <p>Посилання на зміну пароля буде недійсним через {{ $count }} хвилин.</p>
        <p>Якщо Ви не надсилали запит на зміну паролю, ніяких подальших дій не потрібно.</p>
        <p>З повагою, {{ config('app.name') }}</p>
    </div>
    {{-- Subcopy --}}
    @isset($subcopy)
        @slot('subcopy')
            @component('mail::subcopy')
                {{ $subcopy }}
            @endcomponent
        @endslot
    @endisset

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} emotion group
        @endcomponent
    @endslot
@endcomponent
