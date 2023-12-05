<div>
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card outline-success">
                <div class="card-header">
                    <h4 class="card-title">{{ __('tran.invoiceopen') }}</h4>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ __('tran.namecustom') }}</th>
                                <th>{{ __('tran.storename') }}</th>
                                <th>{{ __('tran.invototal') }}</th>
                                <th>{{ __('tran.invodesc') }}</th>
                                <th>{{ __('tran.invototal') }}</th>
                                <th>{{ __('tran.statu') }}</th>
                                <th>{{ __('tran.invodate') }}</th>
                                <th>{{ __('tran.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sorder  as $item)
                                <tr>
                                    <td>
                                        <span class="fw-bold">{{ $item->main->user->user_name ?? 'N/A' }}</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold">{{ $item->store->store_name ?? 'N/A' }}</span>
                                    </td>

                                    <td>
                                        <span class="fw-bold">{{ $item->sub_total ?? 'N/A' }}</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold">{{ $item->sub_discount ?? 'N/A' }}</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold">{{ $item->sub_subtotal ?? 'N/A' }}</span>
                                    </td>
                                    <td>

                                        <span class="badge  bg-@switch($item->sub_statu_delivery)
                                            @case(1)primary
                                                @break
                                            @case(2)warning
                                                @break
                                            @case(3)success @break
                                            @case(4)danger
                                                @break
                                            @default
                                        @endswitch">@switch($item->sub_statu_delivery)
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
                                    </td>
                                    <td>
                                        <span class="fw-bold">{{ $item->created_at ?? 'N/A' }}</span>
                                    </td>

                                    <td><a class="btn btn-flat-warning waves-effect"
                                            href="{{ route('invodetails', [$item->id]) }}">{{ __('tran.invodetails') }}</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="alert alert-danger text-center"> No Data Here</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


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
@endpush
