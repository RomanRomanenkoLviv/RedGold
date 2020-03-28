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
            <p>Дата замовлення: {{  \Illuminate\Support\Arr::get($reservation, 'structure.reservation_date') }} {{  \Illuminate\Support\Arr::get($reservation, 'structure.reservation_time') }}</p>
        @endif
        @if(\Illuminate\Support\Arr::get($reservation, 'structure.weight'))
            <p>Вага: {{  \Illuminate\Support\Arr::get($reservation, 'structure.weight') }}</p>
        @endif
        @if(\Illuminate\Support\Arr::get($reservation, 'structure.comment'))
            <p>Додаткові побажання: {{  \Illuminate\Support\Arr::get($reservation, 'structure.comment') }}</p>
        @endif
        <p><hr /></p>
        @if($delivery_type = \Illuminate\Support\Arr::get($reservation, 'delivery_type'))
            @if($delivery_type == 'self')
                <p>Доставка: <b>самовивіз</b></p>
            @else
                <p>Доставка: <b>адресна доставка</b></p>
            @endif
        @endif
        @if(\Illuminate\Support\Arr::get($reservation, 'city'))
            <p>Населений пункт: {{  \Illuminate\Support\Arr::get($reservation, 'city') }}</p>
        @endif
        @if(\Illuminate\Support\Arr::get($reservation, 'structure.address'))
            <p>Адреса: {{  \Illuminate\Support\Arr::get($reservation, 'structure.address') }}</p>
        @endif
        @if(\Illuminate\Support\Arr::get($reservation, 'structure.porch'))
            <p>Під'їзд: {{  \Illuminate\Support\Arr::get($reservation, 'structure.porch') }}</p>
        @endif
        @if(\Illuminate\Support\Arr::get($reservation, 'structure.code'))
            <p>Домофон (код): {{  \Illuminate\Support\Arr::get($reservation, 'structure.code') }}</p>
        @endif
        @if(\Illuminate\Support\Arr::get($reservation, 'structure.flat'))
            <p>Квартира: {{  \Illuminate\Support\Arr::get($reservation, 'structure.flat') }}</p>
        @endif
        @if(\Illuminate\Support\Arr::get($reservation, 'structure.floor'))
            <p>Поверх: {{  \Illuminate\Support\Arr::get($reservation, 'structure.floor') }}</p>
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
