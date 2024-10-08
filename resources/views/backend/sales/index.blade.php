@extends('backend.layouts.app')

@section('content')
    <div class="card">
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="" action="" id="sort_orders" method="GET">
            <div class="card-header row gutters-5">
                <div class="col">
                    <h5 class="mb-md-0 h6">{{ translate('All Orders') }}</h5>
                </div>

                @canany(['delete_order', 'export_order'])
                    <div class="dropdown mb-2 mb-md-0 pr-2">
                        <button class="btn border dropdown-toggle" type="button" data-toggle="dropdown">
                            {{ translate('Bulk Action') }}
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            @can('delete_order')
                                <a class="dropdown-item" id="bulk_delete" href="javascript:void(0)"
                                    data-target="#bulk-delete-modal">{{ translate('Delete selection') }}</a>
                            @endcan
                            @can('export_order')
                                <a class="dropdown-item" href="javascript:void(0)"
                                    onclick="order_bulk_export()">{{ translate('Export') }}</a>
                            @endcan
                        </div>
                    </div>
                @endcan

                <div class="dropdown mb-2 mb-md-0" style="
                padding-right: 9px !important;
            ">
                    <button class="btn border dropdown-toggle" type="button" data-toggle="dropdown">
                        {{ translate('Print') }}
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a id="print_label_btn" class="dropdown-item "href="javascript:void(0)"
                            data-target="#bulk-delete-modal"><i class="fa-solid fa-print"></i> Label</a></a>
                        <a id="print_btn" class="dropdown-item "href="javascript:void(0)"
                            data-target="#bulk-delete-modal"><i class="fa-solid fa-print"></i> invoice</a></a>
                        <a id="print_all_btn" class="dropdown-item "href="javascript:void(0)"
                            data-target="#bulk-delete-modal"><i class="fa-solid fa-print"></i> Pickup List</a></a>




                    </div>
                </div>

                <div class="col-lg-2 ml-auto">
                    <select class="form-control aiz-selectpicker" name="delivery_status" id="delivery_status">
                        <option value="">{{ translate('Filter by Delivery Status') }}</option>
                        <option value="pending" @if ($delivery_status == 'pending') selected @endif>{{ translate('Pending') }}
                        </option>
                        <option value="confirmed" @if ($delivery_status == 'confirmed') selected @endif>
                            {{ translate('Confirmed') }}</option>
                        <option value="picked_up" @if ($delivery_status == 'picked_up') selected @endif>
                            {{ translate('Picked Up') }}</option>
                        <option value="on_the_way" @if ($delivery_status == 'on_the_way') selected @endif>
                            {{ translate('On The Way') }}</option>
                        <option value="delivered" @if ($delivery_status == 'delivered') selected @endif>
                            {{ translate('Delivered') }}</option>
                        <option value="cancelled" @if ($delivery_status == 'cancelled') selected @endif>
                            {{ translate('Cancel') }}</option>
                    </select>
                </div>
                <div class="col-lg-1 ml-auto">
                    <select class="form-control aiz-selectpicker" name="payment_status" id="payment_status">
                        <option value="">{{ translate('Filter by Payment Status') }}</option>
                     
                        <option value="paid"
                            @isset($payment_status) @if ($payment_status == 'paid') selected @endif @endisset>
                            {{ translate('Paid') }}</option>
                        <option value="unpaid"
                            @isset($payment_status) @if ($payment_status == 'unpaid') selected @endif @endisset>
                            {{ translate('Unpaid') }}</option>
                    </select>
                </div>
                <div class="col-lg-1 ml-auto">
                    <select class="form-control aiz-selectpicker" name="courier_status" id="courier_status">
                        <option value="">{{ translate('Courier') }}</option>
                        <option value="stadefast"
                            @isset($courier_status) @if ($courier_status == 'stadefast') selected @endif @endisset >Stadefast</option> 
                        <option value="pathao" 
                            @isset($courier_status) @if ($courier_status == 'pathao') selected @endif @endisset>Pathao</option> 
                        <option value="redx" 
                            @isset($courier_status) @if ($courier_status == 'redx') selected @endif @endisset>Redx</option> 
                    </select>
                </div>
                <div class="col-lg-2">
                    <div class="form-group mb-0">
                        <input type="text" class="aiz-date-range form-control" value="{{ $date }}"
                            name="date" placeholder="{{ translate('Filter by date') }}" data-format="DD-MM-Y"
                            data-separator=" to " data-advanced-range="true" autocomplete="off">
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group mb-0">
                        <input type="text" class="form-control" id="search"
                            name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset
                            placeholder="{{ translate('Type Order code & hit Enter') }}">
                    </div>
                </div>
                <div class="col-auto">
                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-primary">{{ translate('Filter') }}</button>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row  ">
                    <div class="col-sm-12">
                        <div class="action2-btn mb-3 mb-lg-0 text-white">
                            <a id="status_btn" data-bs-toggle="modal" data-bs-target="#pathao"
                                class="btn rounded-pill btn-primary white mb-2" data-toggle="modal"
                                data-target="#exampleModal1" data-whatever="@mdo"><i class="fa-solid fa-plus"></i> change
                                status</a>
                            {{-- <a class="btn rounded-pill btn-danger order_delete_btn  mb-2 " id="order_delete_btn "><i
                                    class="fa-solid fa-trash"></i>
                                     Delete All</a> --}}
                            {{-- <a id="print_label_btn"
                                class="btn rounded-pill btn-primary multi_order_print text-white mb-2"><i
                                    class="fa-solid fa-print"></i> Label</a>
                            <a id="print_btn" class="btn rounded-pill btn-primary multi_order_print text-white mb-2"><i
                                    class="fa-solid fa-print"></i> invoice</a>
                            <a id="print_all_btn" class="btn rounded-pill btn-primary multi_order_print text-white mb-2"><i
                                    class="fa-solid fa-print"></i> Pickup List</a> --}}

                            <a id="pathao_btn" data-bs-toggle="modal" data-bs-target="#pathao"
                                class="btn rounded-pill btn-danger white mb-2" data-toggle="modal"
                                data-target="#exampleModal" data-whatever="@mdo"><i class="fa-solid fa-bicycle"></i>
                                pathao</a>
                            <a id="stadefast_btn" data-bs-toggle="modal" data-bs-target="#pathao"
                                class="btn rounded-pill btn-success white mb-2"><i class="fa-solid fa-paper-plane"></i>
                                Stade fast </a>
                            <a id="redx_btn" data-bs-toggle="modal" data-bs-target="#pathao"
                                class="btn rounded-pill btn-info white mb-2"><i class="fas fa-shipping-fast"></i> Redx</a>
                        </div>
                    </div>
                </div>


                <!-- button From -->
                @include('backend.sales.procted.button_setting')
                <!-- End button From -->

                <!-- Table -->
                @include('backend.sales.procted.table')
                <!-- End Table -->

                <div class="aiz-pagination">
                    {{ $orders->appends(request()->input())->links() }}
                </div>

            </div>
        </form>

    </div>
@endsection

@section('modal')
    <!-- Delete modal -->
    @include('modals.delete_modal')
    <!-- Bulk Delete modal -->
    @include('modals.bulk_delete_modal')

    <!-- pathao  modal -->
    @include('backend.sales.procted.pathao_model')
@endsection

@section('script')
    @include('backend.sales.procted.js')
@endsection
