<div>
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card outline-success">
                <div class="card-header">
                    <h4 class="card-title">{{ __('tran.item') }}</h4>
                    {{-- <a href='{{ route('additem') }}' class="btn  btn-success">New</a> --}}
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ __('tran.image') }}</th>
                                <th>{{ __('tran.item') }}</th>
                                <th>{{ __('tran.username') }}</th>
                                <th>{{ __('tran.storename') }}</th>
                                <th>{{ __('tran.brand') }}</th>
                                <th>{{ __('tran.category') }}</th>
                                <th>{{ __('tran.qtystock') }}</th>
                                <th>{{ __('tran.price1') }}</th>
                                <th>{{ __('tran.price2') }}</th>
                                <th>{{ __('tran.active') }}</th>
                                <th>{{ __('tran.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items  as $item)
                                <tr>
                                    <td> <img src=" {{ $item->img == null ?  $item->brand->urlimg : $item->urlimg ?? 'N/A' }}" class="me-75" height="50"
                                            width="50" />
                                    </td>
                                    <td>
                                        <span class="fw-bold">{{ $item->name }}</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold">{{ $item->user->user_name }}</span>
                                    </td>

                                    <td>
                                        <span class="fw-bold">{{ $item->user->store_name }}</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold">{{ $item->brand->name }}</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold">{{ $item->category->name }}</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold">{{ $item->stock_qty }}</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold">{{ $item->price_salse }}</span>
                                    </td>
                                    <td>
                                        @if ($item->price_offer> 0)
                                            <span class="badge  rounded-pill  bg-warning ">{{ $item->price_offer }}</span>
                                        @else
                                        <span class="fw-bold">{{ $item->price_offer }}</span>
                                        @endif

                                    </td>
                                    <td>
                                        @if ($item->active ?? null)
                                            <span class="badge  rounded-pill  bg-success">user :  مفعل</span>
                                        @else
                                            <span class="badge  rounded-pill  bg-danger">user : غير مفعل</span>
                                        @endif

                                        @if ($item->active_admin ?? null)

                                            <span class="badge  rounded-pill  bg-success">admin: مفعل </span>
                                        @else
                                            <span class="badge  rounded-pill  bg-danger">admin: غير مفعل</span>
                                        @endif
                                    </td>

                                    <td>
                                      <a class="btn btn-flat-warning btn-sm waves-effect"
                                        href="{{route('edititem',['id'=>$item->id])}}">{{ __('tran.edit') }}</a>
                                        {{-- <button class="btn btn-flat-danger btn-sm waves-effect"
                                            wire:click="delete({{ $item->id }})">{{ __('tran.delete') }}</button>   --}}
                                    </td>
                                </tr>
                            @empty
                                <tr>


                                    <td colspan="7" class="alert alert-danger text-center"> No Data Here</td>

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
