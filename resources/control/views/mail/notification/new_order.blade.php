@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            {{ config('app.name') }}
        @endcomponent
    @endslot
    <div style="width: 700px">
        <h1>Замовлення №{{ $order->id }}</h1>
        <p>Ім'я: {{ $order->name }}</p>
        <p>Телефон: {{ $order->phone }}</p>
        <p>Створено: {{ $order->created_at->format('d.m.Y h:i:s') }}</p>
        <p>Адреса доставки: {{ \Illuminate\Support\Arr::get($order, 'address.address') }}, {{  \Illuminate\Support\Arr::get($order, 'address.city') }}</p>
        @if($delivery = $order->getDeliveryInfo())
            <p>{{  $delivery->product_title }}: <b>{{  $delivery->product_price }}&nbsp;UAH</b></p>
        @else
            <p>Доставка: <b>безкоштовно</b></p>
        @endif
        @if($order->isOnlinePay)
            <p>{{ $order->payType }}: <span>{{  \Illuminate\Support\Arr::get($order, 'payment_status.title') }}</span></p>
        @else
            <p>{{ $order->payType }}</p>
        @endif
        <p>Ціна: <b>{{ $order->total_price }} грн.</b></p>
        <p>Коментар: {{ $order->comment }}</p>
        <table style="width: 700px">
            <thead>
                <tr style="border-bottom: 1px solid black;">
                    <td>Назва</td>
                    <td style="text-align: center;">Кількість</td>
                    <td style="text-align: center;">Ціна</td>
                    <td style="text-align: center;">Вартість</td>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $orderItem)
                    @if($orderItem->type === 'product' && empty($orderItem->parent_id))
                        @php
                            $product = $orderItem->product
                        @endphp
                        <tr>
                            <td style="padding: 3px; border-right: 1px solid grey">
                                @if($prefix = $product->prefix)
                                    {{ $prefix }}
                                @endif
                                <b>{{ $product->title }}</b> {{ $product->weight }}
                            </td>
                            <td style="padding: 3px; text-align: center; border-right: 1px solid grey">{{ $orderItem->amount }}</td>
                            <td style="padding: 3px; text-align: center; border-right: 1px solid grey">
                                @if($price = $orderItem->product_price)
                                    {{ ($price - floor($price) > 0) ? $price : number_format($price, 0, '.', '') }} грн.
                                @endif
                            </td>
                            <td style="padding: 3px; text-align: center;">
                                @if($price = $orderItem->base_price)
                                    {{ ($price - floor($price) > 0) ? $price : number_format($price, 0, '.', '') }} грн.
                                @endif
                            </td>
                        </tr>
                        @if(optional($orderItem->childrenProducts)->count())
                            {{--<tr>
                                <td colspan="3" style="padding-left: 20px; border-right: 1px solid grey">З упаковкою</td>
                                <td style="padding-left: 20px; text-align: center;">{{ $orderItem->total_price }} грн.</td>
                            </tr>--}}
                            <tr>
                                <td style="padding: 3px; background: #f5f5f0;" colspan="4">Додатки:</td>
                            </tr>
                            @foreach($orderItem->childrenProducts as $children)
                                <tr>
                                    @php
                                        $productChildren = $children->product
                                    @endphp
                                    <td style="padding-left: 20px; border-right: 1px solid grey"><b>{{ $productChildren->title }}</b> {{ $productChildren->weight }}</td>
                                    <td style="padding: 3px; text-align: center; border-right: 1px solid grey">{{ $children->amount }}</td>
                                    <td style="padding: 3px; text-align: center; border-right: 1px solid grey">
                                        @if($price = $children->product_price)
                                            {{ ($price - floor($price) > 0) ? $price : number_format($price, 0, '.', '') }} грн.
                                        @endif
                                    </td>
                                    <td style="padding: 3px; text-align: center;">
                                        @if($price = $children->total_price)
                                            {{ ($price - floor($price) > 0) ? $price : number_format($price, 0, '.', '') }} грн.
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        <tr>
                            <td colspan="4"><hr></td>
                        </tr>
                    @endif
                @endforeach
                <tr>
                    <td style="padding: 3px; background: #f5f5f0;" colspan="4"><b>Упакування:</b></td>
                </tr>
                @foreach($order->getUniqueBoxings() as $orderItem)
                    @php
                        $product =  \Illuminate\Support\Arr::get($orderItem, 'product')
                    @endphp
                    <tr>
                        <td style="padding-left: 20px; border-right: 1px solid grey"><b>{{ $product->title }}</b> {{ $product->weight }}</td>
                        <td style="padding-left: 20px; text-align: center; border-right: 1px solid grey">{{ \Illuminate\Support\Arr::get($orderItem, 'amount') }}</td>
                        <td style="padding-left: 20px; text-align: center; border-right: 1px solid grey">
                            @if($price = \Illuminate\Support\Arr::get($orderItem, 'price'))
                                {{ ($price - floor($price) > 0) ? $price : number_format($price, 0, '.', '') }} грн.
                            @endif
                        </td>
                        <td style="padding-left: 20px; text-align: center;">
                            @if($price = \Illuminate\Support\Arr::get($orderItem, 'total_price'))
                                {{ ($price - floor($price) > 0) ? $price : number_format($price, 0, '.', '') }} грн.
                            @endif
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="4"><hr></td>
                </tr>
            </tbody>

        </table>
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
