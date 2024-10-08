

<form id="source-form">
<table class="table aiz-table mb-0">
    <thead>
        <tr>
            @if (auth()->user()->can('delete_order') || auth()->user()->can('export_order'))
                <th>
                    <div class="form-group">
                        <div class="aiz-checkbox-inline">
                            <label class="aiz-checkbox">
                                <input type="checkbox" class="check-all">
                                <span class="aiz-square-check"></span>
                            </label>
                        </div>
                    </div>
                </th>
            @else
                <th data-breakpoints="lg">#</th>
            @endif

            <th>{{ translate('Order Code') }}</th>
            <th data-breakpoints="md">{{ translate('Num. of Products') }}</th>
            <th data-breakpoints="md">{{ translate('Customer') }}</th>
            <th data-breakpoints="md">{{ translate('Seller') }}</th>
            <th data-breakpoints="md">{{ translate('Amount') }}</th>
            <th data-breakpoints="md">{{ translate('Delivery Status') }}</th>
            <th data-breakpoints="md">{{ translate('Courier Status') }}</th>
            <th data-breakpoints="md">{{ translate('Payment method') }}</th>
            <th data-breakpoints="md">{{ translate('Payment Status') }}</th>
            @if (addon_is_activated('refund_request'))
                <th>{{ translate('Refund') }}</th>
            @endif
            <th class="text-right" width="15%">{{ translate('options') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $key => $order)
            <tr>
                @if (auth()->user()->can('delete_order') || auth()->user()->can('export_order'))
                   

                    <td>
                        <div class="form-group">
                            <div class="aiz-checkbox-inline">
                                <label class="aiz-checkbox">
                                    <input type="checkbox" id="test" class="source-checkbox check-one" name="id[]"
                                        value="{{ $order->id }}">
                                    <span class="aiz-square-check"></span>
                                </label>
                            </div>
                        </div>
                    </td>
                @else
                    <td>{{ $key + 1 + ($orders->currentPage() - 1) * $orders->perPage() }}</td>
                @endif
                <td>
                    {{ $order->code }}
                    @if ($order->viewed == 0)
                        <span class="badge badge-inline badge-info">{{ translate('New') }}</span>
                    @endif
                    @if (addon_is_activated('pos_system') && $order->order_from == 'pos')
                        <span class="badge badge-inline badge-danger">{{ translate('POS') }}</span>
                    @endif
                </td>
                <td>
                    {{ count($order->orderDetails) }}
                </td>
                <td>
                    @if ($order->user != null)
                        {{ $order->user->name }}
                    @else
                        Guest ({{ $order->guest_id }})
                    @endif
                </td>
                <td>
                    @if ($order->shop)
                        {{ $order->shop->name }}
                    @else
                        {{ translate('Inhouse Order') }}
                    @endif
                </td>
                <td>
                    {{ single_price($order->grand_total) }}
                </td>
                <td>
              
                 @if ($order->delivery_status == "confirmed")
                    <span class="badge badge-inline badge-success"> {{ translate(ucfirst(str_replace('_', ' ', $order->delivery_status))) }}</span>
                @elseif ($order->delivery_status == "cancelled")
                <span class="badge badge-inline badge-danger"> {{ translate(ucfirst(str_replace('_', ' ', $order->delivery_status))) }}</span>
                @else
                <span class="badge badge-inline badge-warning "> {{ translate(ucfirst(str_replace('_', ' ', $order->delivery_status )) )?? "N/A" }}</span>
                @endif
                  
                </td>
                <td>
                    {{ translate(ucfirst(str_replace('_', ' ', $order->courier_status))) }}
                </td>
                <td>
                    {{ translate(ucfirst(str_replace('_', ' ', $order->payment_type))) }}
                </td>
                <td>
                    @if ($order->payment_status == 'paid')
                        <span class="badge badge-inline badge-success">{{ translate('Paid') }}</span>
                    @else
                        <span class="badge badge-inline badge-danger">{{ translate('Unpaid') }}</span>
                    @endif
                </td>
                @if (addon_is_activated('refund_request'))
                    <td>
                        @if (count($order->refund_requests) > 0)
                            {{ count($order->refund_requests) }} {{ translate('Refund') }}
                        @else
                            {{ translate('No Refund') }}
                        @endif
                    </td>
                @endif
                <td class="text-right">
                    @if (addon_is_activated('pos_system') && $order->order_from == 'pos')
                        <a class="btn btn-soft-success btn-icon btn-circle btn-sm"
                            href="{{ route('admin.invoice.thermal_printer', $order->id) }}" target="_blank"
                            title="{{ translate('Thermal Printer') }}">
                            <i class="las la-print"></i>
                        </a>
                    @endif
                    @can('view_order_details')
                        @php
                            $order_detail_route = route('orders.show', encrypt($order->id));
                            if (Route::currentRouteName() == 'seller_orders.index') {
                                $order_detail_route = route('seller_orders.show', encrypt($order->id));
                            } elseif (Route::currentRouteName() == 'pick_up_point.index') {
                                $order_detail_route = route('pick_up_point.order_show', encrypt($order->id));
                            }
                            if (Route::currentRouteName() == 'inhouse_orders.index') {
                                $order_detail_route = route('inhouse_orders.show', encrypt($order->id));
                            }
                        @endphp
                        <a class="btn btn-soft-primary btn-icon btn-circle btn-sm"
                            href="{{ $order_detail_route }}" title="{{ translate('View') }}">
                            <i class="las la-eye"></i>
                        </a>
                    @endcan
                    <a class="btn btn-soft-info btn-icon btn-circle btn-sm"
                        href="{{ route('invoice.download', $order->id) }}"
                        title="{{ translate('Download Invoice') }}">
                        <i class="las la-download"></i>
                    </a>
                    @can('delete_order')
                        <a href="#"
                            class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete"
                            data-href="{{ route('orders.destroy', $order->id) }}"
                            title="{{ translate('Delete') }}">
                            <i class="las la-trash"></i>
                        </a>
                    @endcan
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</form>