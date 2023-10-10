<div>
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card outline-success">
                <div class="card-header">
                    <h4 class="card-title">{{ __('tran.orders') }}</h4>
                    {{-- <a href='{{ route('additem') }}' class="btn  btn-success">New</a> --}}
                </div>
                <div class="card-body ">
                    <div class="">
                        <div class="row ">
                            <div class="col-md-4">
                                <x-label for="fromdate" label="من" />
                                <x-daterange id="fromdate" wire:model.lazy='fromdate' :date='$fromdate' />
                            </div>
                            <div class="col-md-4">
                                <x-label for="todate" label="الى" />
                                <x-daterange id="todate" wire:model.lazy='todate' :date='$todate' />
                            </div>

                        </div>
                    </div>
                    <div class="row">

                        {{-- <div class="col-md-2">
                            <label for="pages">عرض</label>
                            <select class="form-select" wire:model="pg" name="pages" id="pages">
                                <option value="30">30</option>
                                <option value="40">40</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                            </select>
                        </div> --}}
                        <span class=" text-center mt-2">
                              <div wire:loading>
                                <span class="spinner-border text-warning"></span>
                            </div>
                        </span>

                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('tran.username') }}</th>
                                    <th>{{ __('tran.storename') }}</th>
                                    <th>{{ __('tran.countorders') }}</th>
                                    <th>{{ __('tran.saleorders') }}</th>
                                    <th>{{ __('tran.neworders') }}</th>
                                    <th>{{ __('tran.processorders') }}</th>
                                    <th>{{ __('tran.deliverdorders') }}</th>
                                    <th>{{ __('tran.rejectorders') }}</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders  as $item)
                                    <tr>

                                        <td>
                                            <span class="fw-bold">{{ $item->user_name }}</span>
                                        </td>
                                        <td>
                                            <span class="fw-bold">{{ $item->store_name }}</span>
                                        </td>
                                        <td>
                                            <span class="fw-bold">{{ $item->suborder->count() }}</span>
                                        </td>
                                        <td>
                                            <span class="fw-bold">{{ $item->suborder->sum('sub_total') }}</span>
                                        </td>
                                        <td>
                                            <span
                                                class="fw-bold badge  rounded-pill  bg-info">{{ $item->suborder->where('sub_statu_delivery', 1)->count() }}</span>
                                        </td>
                                        <td>
                                            <span
                                                class="fw-bold badge  rounded-pill  bg-warning">{{ $item->suborder->where('sub_statu_delivery', 2)->count() }}</span>
                                        </td>
                                        <td>
                                            <span
                                                class="fw-bold badge  rounded-pill  bg-success">{{ $item->suborder->where('sub_statu_delivery', 3)->count() }}</span>
                                        </td>
                                        <td>
                                            <span
                                                class="fw-bold badge  rounded-pill  bg-danger">{{ $item->suborder->where('sub_statu_delivery', 4)->count() }}</span>
                                        </td>

                                    {{-- <td>
                                        <a class="btn btn-flat-warning btn-sm waves-effect"
                                            href="{{ route('edititem', ['id' => $item->id]) }}">{{ __('tran.edit') }}</a>
                                        <button class="btn btn-flat-danger btn-sm waves-effect"
                                            wire:click="delete({{ $item->id }})">{{ __('tran.delete') }}</button>
                                    </td> --}}
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
