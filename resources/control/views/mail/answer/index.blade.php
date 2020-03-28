@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url') . '/' . $project->slug ])
            {{ $project->title }}
        @endcomponent
    @endslot
    <div>
        <h1>Доброго дня!</h1>
        <p>Дякуємо за ваше зверення у {{ $project->title }}!<br></p>
        Наші менеджери детально вивчили ваше запитання та надали наступну відповідь:</p>
        <p>"{{ $message }}"</p>
        <p></p>
        <p><small>Ваше запитання:<br>
        {{ $feedback->message }}</small></p>
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
