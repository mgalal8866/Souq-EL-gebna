@push('csslive')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-invoice.min.css') }}">
@endpush
<div>
    <section class="invoice-preview-wrapper">
        <div class="row invoice-preview">
            <!-- Invoice -->
            <div class=col-12">
                <div class="card invoice-preview-card">
                    <div class="card-body invoice-padding pb-0">
                        <!-- Header starts -->
                        <div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
                            <div>
                                <div class="logo-wrapper">
                                    {{-- <img src="{{ getimage('logos',$setting->logo_shop)}}" width="50"  /> --}}

                                </div>
                                {{-- <p class="card-text mb-25">{{$setting->address_shop}}</p> --}}
                                {{-- <p class="card-text mb-0">{{$setting->phone_shop}}</p> --}}
                            </div>
                            <div class="mt-md-0 mt-2">
                                {{-- <h4 class="invoice-title">
                                    {{__('tran.invoicenumber')}}
                                    <span class="invoice-number"># {{$invo->invoicenumber??''}}</span>
                                </h4>
                                <div class="invoice-date-wrapper">
                                <p class="invoice-date-title">{{__('tran.invodate')}}:</p>
                                    <p class="invoice-date">{{$invo->invoicedate??''}}</p>
                                </div>
                                <div class="invoice-date-wrapper">
                                <p class="invoice-date-title">{{__('tran.derivername')}}:</p>
                                    <p class="invoice-date">{{$invo->employee->name??''}}</p>
                                </div>
                                <div class="invoice-date-wrapper">
                                <p class="invoice-date-title">{{__('tran.username')}}:</p>
                                    <p class="invoice-date">{{$invo->useradmin->employee->name??''}}</p>
                                </div> --}}
                            </div>
                        </div>
                        <!-- Header ends -->
                    </div>

                    <hr class="invoice-spacing" />

                    <!-- Address and Contact starts -->
                    <div class="card-body invoice-padding pt-0">
                        <div class="row invoice-spacing">
                            <div class="col-xl-8 p-0">
                                <h6 class="mb-2"> {{ __('tran.customerdata') }} :</h6>
                                <h6 class="mb-25">{{ $order[0]->suborder->main->user->user_name ?? '' }}</h6>
                                <p class="card-text mb-25">
                                    {{ $order[0]->suborder->main->user->region->city->name ?? ('' . ' , ' . $order[0]->suborder->main->user->region->name ?? ('' . ' , ' . $order[0]->suborder->main->user->address ?? '')) }}
                                </p>
                                <p class="card-text mb-25">{{ $order[0]->suborder->main->user->phone ?? '' }}</p>
                            </div>
                            <div class="col-xl-4 p-0 mt-xl-0 mt-2">
                                <h6 class="mb-2">تفاصيل التاجر :</h6>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="pe-1">التاجر : </td>
                                            <td><span
                                                    class="fw-bold">{{ $order[0]->suborder->store->store_name ?? '' }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="pe-1">حاله الطلب : </td>

                                            <td>
                                                
                                                <span class="badge  bg-@switch($order[0]->suborder->sub_statu_delivery)
                                                    @case(1)primary
                                                        @break
                                                    @case(2)warning
                                                        @break
                                                    @case(3)success @break
                                                    @case(4)danger
                                                        @break
                                                    @default
                                                @endswitch">@switch($order[0]->suborder->sub_statu_delivery)
                                                @case(1)
                                                    جديد
                                                    @break
                                                @case(2)
                                                    جارى التوصيل
                                                    @break
                                                @case(3)
                                                    تم التوصيل
                                                    @break
                                                @default
                                                    رفض الاستلام
                                            @endswitch</span>

                                                <span class="fw-bold">{{ $order[0]->suborder->stat ?? '' }}</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="py-1">{{ __('tran.product') }}</th>
                                    <th class="py-1">{{ __('tran.price') }}</th>
                                    <th class="py-1">{{ __('tran.qty') }}</th>
                                    <th class="py-1">{{ __('tran.subtotal') }}</th>
                                    <th class="py-1">{{ __('tran.discount') }}</th>
                                    <th class="py-1">{{ __('tran.total') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order as $invod)
                                    <tr>
                                        <td class="py-1">
                                            <p class="card-text fw-bold mb-25">{{ $invod->item->name ?? '' }}</p>
                                        </td>
                                        <td class="py-1">
                                            <span class="fw-bold">{{ $invod->details_price ?? '' }}</span>
                                        </td>
                                        <td class="py-1">
                                            <span class="fw-bold">{{ $invod->details_qty ?? '' }}</span>
                                        </td>
                                        <td class="py-1">
                                            <span class="fw-bold">{{ $invod->details_subtotal ?? '' }}</span>
                                        </td>
                                        <td class="py-1">
                                            <span class="fw-bold">{{ $invod->details_discount }}</span>
                                        </td>
                                        <td class="py-1">
                                            <span class="fw-bold">{{ $invod->details_total }}</span>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="card-body invoice-padding pb-0">
                        <div class="row invoice-sales-total-wrapper">
                            <div class="col-md-6 order-md-1 order-2 mt-md-0 mt-3">
                                <p class="card-text mb-0">
                                    {{-- <span class="fw-bold">{{__('tran.note')}}:</span> <span class="ms-75">{{$invo->note }}</span> --}}
                                </p>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end order-md-2 order-1">
                                <div class="invoice-total-wrapper">
                                    <div class="invoice-total-item">
                                        <p class="invoice-total-title">{{__('tran.subtotal')}}:</p>
                                        <p class="invoice-total-amount">{{$order[0]->suborder->sub_subtotal}}</p>
                                    </div>
                                    <div class="invoice-total-item">
                                        <p class="invoice-total-title">{{__('tran.totaldiscount')}} : </p>
                                        <p class="invoice-total-amount">{{$order[0]->suborder->sub_discount}}</p>
                                    </div>


                                    <hr class="my-50" />
                                    <div class="invoice-total-item">
                                        <p class="invoice-total-title">{{__('tran.invototal')}}:</p>
                                        <p class="invoice-total-amount">{{$order[0]->suborder->sub_total}}</p>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="invoice-spacing" />

            </div>
        </div>

        {{-- <div class="col-xl-3 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-primary w-100 mb-75" data-bs-toggle="modal"
                            data-bs-target="#send-invoice-sidebar">
                            Send Invoice
                        </button>
                        <button class="btn btn-outline-secondary w-100 btn-download-invoice mb-75">Download</button>
                        <a class="btn btn-outline-secondary w-100 mb-75" href="./app-invoice-print.html"
                            target="_blank"> Print </a>
                        <a class="btn btn-outline-secondary w-100 mb-75" href="./app-invoice-edit.html"> Edit </a>
                        <button class="btn btn-success w-100" data-bs-toggle="modal"
                            data-bs-target="#add-payment-sidebar">
                            Add Payment
                        </button>
                    </div>
                </div>
            </div> --}}
</div>
</section>
</div>

@push('jslive')
    <script>
        window.addEventListener('swal', event => {
            Swal.fire({
                title: event.detail.message,
                icon: 'info',
                customClass: {
                    confirmButton: 'btn btn-danger'
                },
                buttonsStyling: false
            });
        })
    </script>
    <script src="{{ asset('app-assets/js/scripts/pages/app-invoice.min.js') }}"></script>
@endpush
