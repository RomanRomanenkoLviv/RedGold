@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            {{ config('app.name') }}
        @endcomponent
    @endslot
    <div>
        <h1>Замовлення №{{ $reservation->id }}</h1>
        @if(\Illuminate\Support\Arr::get($reservation, 'structure.name'))
            <p>Ім'я: {{  \Illuminate\Support\Arr::get($reservation, 'structure.name') }}</p>
        @endif
        @if(\Illuminate\Support\Arr::get($reservation, 'structure.phone'))
            <p>Телефон: {{  \Illuminate\Support\Arr::get($reservation, 'structure.phone') }}</p>
        @endif
        @if(\Illuminate\Support\Arr::get($reservation, 'structure.guest_count'))
            <p>Кількість гостей: {{  \Illuminate\Support\Arr::get($reservation, 'structure.guest_count') }}</p>
        @endif
        @if(\Illuminate\Support\Arr::get($reservation, 'structure.guest_count'))
            <p>Дата замовлення: {{  \Illuminate\Support\Arr::get($reservation, 'structure.reservation_date') }}</p>
        @endif
        <p><hr /></p>
        @if($value = \Illuminate\Support\Arr::get($reservation, 'structure.options.cake'))
                <p>Корж: {{  $value }}</p>
        @endif
        @if($value = \Illuminate\Support\Arr::get($reservation, 'structure.options.cream'))
                <p>Крем: {{  $value }}</p>
        @endif
        @if($value = \Illuminate\Support\Arr::get($reservation, 'structure.options.filling'))
            <p>Начинка: {{  $value }}</p>
        @endif
        @if(\Illuminate\Support\Arr::get($reservation, 'structure.weight'))
            <p>Вага: {{  \Illuminate\Support\Arr::get($reservation, 'structure.weight') }}</p>
        @endif
        @if(\Illuminate\Support\Arr::get($reservation, 'structure.comment'))
            <p>Додаткові побажання: {{  \Illuminate\Support\Arr::get($reservation, 'structure.comment') }}</p>
        @endif
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
