<!DOCTYPE html>
<html>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{  translate('INVOICE') }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta charset="UTF-8">
<head>
  <style media="all">
    .page-break {
    page-break-after: always;
    }
    @page {
        margin: 0;
        padding:0;
    }
    body{
        font-size: 0.875rem;
        font-family: '<?php echo  $font_family ?>';
        font-weight: normal;
        direction: <?php echo  $direction ?>;
        text-align: <?php echo  $text_align ?>;
        padding:0;
        margin:0; 
    }
    .gry-color *,
    .gry-color{
        color:#000;
    }
    table{
        width: 100%;
    }
    table th{
        font-weight: normal;
    }
    table.padding th{
        padding: .25rem .7rem;
    }
    table.padding td{
        padding: .25rem .7rem;
    }
    table.sm-padding td{
        padding: .1rem .7rem;
    }
    .border-bottom td,
    .border-bottom th{
        border-bottom:1px solid #eceff4;
    }
    .text-left{
        text-align:<?php echo  $text_align ?>;
    }
    .text-right{
        text-align:<?php echo  $not_text_align ?>;
    }
</style>
</head>
<body>
  @php $count = 0;@endphp
  @foreach ($orders as $order)
  @php $count++ @endphp
        <div class="{{ ($count < count($orders)) ? 'page-break' : '' }}">

            @php
                $logo = get_setting('header_logo');
            @endphp
    
            <div style="background: #eceff4;padding: 2rem;">
                <table>
                    <tr>
                        <td>
                            @if($logo != null)
                                <img src="{{ uploaded_asset($logo) }}" height="30" style="display:inline-block;">
                            @else
                                <img src="{{ static_asset('assets/img/logo.png') }}" height="30" style="display:inline-block;">
                            @endif
                        </td>
                        <td style="font-size: 1.5rem; font-weight: bold" class="text-right strong">{{  translate('INVOICE') }}</td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td style="font-size: 18px; font-weight: 400" class="strong">{{ get_setting('site_name') }}</td>
                        {{-- <td class="text-right"></td> --}}
                        <td class="text-right small" style="font-weight: 800; font-size: 16px;"><span class="gry-color small">{{  translate('Order ID') }}:</span> <span class="strong">{{ $order->code }}</span></td>
                    </tr>
                    <tr>
                        <td class="gry-color small" style="font-weight: 800">{{ get_setting('contact_address',null,App::getLocale()) }}</td>
                        {{-- <td class="text-right"></td> --}}
                        <td class="text-right small" style="font-weight: 800; font-size: 16px;"><span class="gry-color small">{{  translate('Order Date') }}:</span> <span class=" strong">{{ date('d-m-Y', $order->date) }}</span></td>
                    </tr>
                    <tr>
                        <td class="gry-color small" style="font-weight: 800">{{  translate('Email') }}: {{ get_setting('contact_email') ?? null}}</td>
                        <td class="text-right small">
                            <span class="gry-color small" style="font-size: 16px;">
                                {{  translate('Payment method') }}:
                            </span> 
                            <span class="strong" style="font-size: 16px;">
                                {{ translate(ucfirst(str_replace('_', ' ', $order->payment_type))) }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="gry-color small" style="font-weight: 800">{{  translate('Phone') }}: {{ get_setting('contact_phone') }}</td>
                        <td class="text-right small" style="font-size: 14px;"><span class="gry-color small">{{  translate('Order Reference') }}:</span> <span class=" strong">{{ translate($order->reference) ?? null }}</span></td>
                    </tr>
                    @if(isset(json_decode($order->shipping_address)->note))
                    <tr>
                        <td class="gry-color small"></td>
                        <td class="text-right small" style="font-size: 14px;"><span class="gry-color small">{{  translate('Order Note') }}:</span> <span class=" strong">{{ json_decode($order->shipping_address)->note ?? null }}</span></td>
                    </tr>
                    @endif
                </table>
    
            </div>
    
            <div style="padding: 2rem;padding-bottom: 0">
                <table>
                    @php
                        $shipping_address = json_decode($order->shipping_address);
                    @endphp
                    <tr><td class="strong small gry-color" style="font-size: 16px; font-weight:600;">{{ translate('Bill to') }}:</td></tr>
                    <tr><td class="strong" style="font-size: 16px; font-weight:600;">{{ $shipping_address->name }}</td></tr>
                    <tr><td class="gry-color small" style="font-size: 16px; font-weight:600;">{{ $shipping_address->address }}, {{ $shipping_address->city ?? null}},  @if(isset(json_decode($order->shipping_address)->state)) {{ json_decode($order->shipping_address)->state }} - @endif {{ $shipping_address->country }}</td></tr>
                    {{-- <tr><td class="gry-color small">{{ translate('Email') }}: {{ $shipping_address->email ?? null}}</td></tr> --}}
                    <tr><td class="gry-color small" style="font-size: 18px; font-weight:600;">{{ translate('Phone') }}: {{ $shipping_address->phone }}</td></tr>
                </table>
            </div>
    
            <div style="padding: 2rem;">
                <table class="padding text-left small border-bottom">
                    <thead>
                        <tr class="gry-color" style="background: #eceff4;">
                            <th width="35%" class="text-left">{{ translate('Product Name') }}</th>
                            <th width="15%" class="text-left">{{ translate('Delivery Type') }}</th>
                            <th width="10%" class="text-left">{{ translate('Qty') }}</th>
                            <th width="15%" class="text-left">{{ translate('Unit Price') }}</th>
                            <th width="10%" class="text-left">{{ translate('Tax') }}</th>
                            <th width="15%" class="text-right">{{ translate('Total') }}</th>
                        </tr>
                    </thead>
                    <tbody class="strong">
                        @foreach ($order->orderDetails as $key => $orderDetail)
                            @if ($orderDetail->product != null)
                                <tr class="">
                                    <td>
                                        {{ $orderDetail->product->name }} 
                                        @if($orderDetail->variation != null) ({{ $orderDetail->variation }}) @endif
                                        <br>
                                        <small>
                                            @php
                                                $product_stock = json_decode($orderDetail->product->stocks->first(), true);
                                            @endphp
                                            {{translate('SKU')}}: {{ $product_stock['sku'] ?? null }}
                                        </small>
                                    </td>
                                    <td>
                                        @if ($order->shipping_type != null && $order->shipping_type == 'home_delivery')
                                            {{ translate('Home Delivery') }}
                                        @elseif ($order->shipping_type == 'pickup_point')
                                            @if ($order->pickup_point != null)
                                                {{ $order->pickup_point->getTranslation('name') }} ({{ translate('Pickip Point') }})
                                            @else
                                                {{ translate('Pickup Point') }}
                                            @endif
                                        @elseif ($order->shipping_type == 'carrier')
                                            @if ($order->carrier != null)
                                                {{ $order->carrier->name }} ({{ translate('Carrier') }})
                                                <br>
                                                {{ translate('Transit Time').' - '.$order->carrier->transit_time }}
                                            @else
                                                {{ translate('Carrier') }}
                                            @endif
                                        @endif
                                    </td>
                                    <td class="">{{ $orderDetail->quantity }}</td>
                                    <td class="currency">{{ single_price($orderDetail->price/$orderDetail->quantity) }}</td>
                                    <td class="currency">{{ single_price($orderDetail->tax/$orderDetail->quantity) }}</td>
                                    <td class="text-right currency">{{ single_price($orderDetail->price+$orderDetail->tax) }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
    
            <div style="padding:0 2.5rem;">
                <table class="text-right sm-padding small strong">
                    <thead>
                        <tr>
                            <th width="60%"></th>
                            <th width="40%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-left">
                                @php
                                    $removedXML = '<?xml version="1.0" encoding="UTF-8"?>';
                                @endphp
                                {{-- {!! str_replace($removedXML,"", QrCode::size(100)->generate($order->code)) !!} --}}
                                {!! str_replace($removedXML,"", QrCode::size(100)->generate($order->code)) !!}
                            </td>
                            <td>
                                <table class="text-right sm-padding small strong">
                                    <tbody>
                                        <tr>
                                            <th class="gry-color text-left">{{ translate('Sub Total') }}</th>
                                            <td class="currency">{{ single_price($order->orderDetails->sum('price')) }}</td>
                                        </tr>
                                        <tr>
                                            <th class="gry-color text-left">{{ translate('Shipping Cost') }}</th>
                                            <td class="currency">{{ single_price($order->orderDetails->sum('shipping_cost')) }}</td>
                                        </tr>
                                        <tr class="border-bottom">
                                            <th class="gry-color text-left">{{ translate('Total Tax') }}</th>
                                            <td class="currency">{{ single_price($order->orderDetails->sum('tax')) }}</td>
                                        </tr>
                                        <tr class="border-bottom">
                                            <th class="gry-color text-left">{{ translate('Coupon Discount') }}</th>
                                            <td class="currency">{{ single_price($order->coupon_discount) }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-left strong">{{ translate('Grand Total') }}</th>
                                            <td class="currency">{{ single_price($order->grand_total) }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
    
        </div>
  @endforeach
</body>

</html>