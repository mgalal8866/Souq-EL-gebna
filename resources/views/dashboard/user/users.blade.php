<div>
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card outline-success">
                <div class="card-header">
                    <h4 class="card-title">{{ __('tran.users') }}</h4>
                    <div class="col-6 col-md-6">
                        <label class="form-label" for="name">بحث (بالاسم او رقم التليفون )</label>
                        <input type="text" wire:model.live='search' id="search" name="search" class="form-control"
                            required />
                    </div>
                    {{-- <a href='{{ route('adduser') }}' class="btn  btn-success">New</a> --}}
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ __('tran.username') }}</th>
                                <th>{{ __('tran.storename') }}</th>
                                <th>{{ __('tran.phone') }}</th>
                                <th>{{ __('tran.address') }}</th>
                                <th>{{ __('tran.datepayment') }}</th>
                                <th>{{ __('tran.rating') }}</th>
                                <th>{{ __('tran.featured') }}</th>
                                <th>{{ __('tran.activity') }}</th>
                                <th>{{ __('tran.statu') }}</th>
                                <th>{{ __('tran.action') }}</th>
                                <th>{{ __('tran.sales_active') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users  as $user)
                                <tr>
                                    <td>
                                        <span class="fw-bold">{{ $user->user_name }}</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold">{{ $user->store_name }}</span>
                                    </td>
                                    <td>
                                        <span class="fw-bold">{{ $user->phone }}</span>
                                    </td>
                                    <td>
                                        <span
                                            class="fw-bold">{{ $user->city->name . ' , ' . $user->region->name }}</span>
                                    </td>
                                    <td>
                                        <span
                                            class="fw-bold">{{ $user->date_payment ? \Carbon\Carbon::parse($user->date_payment)->format('Y-m-d') : 'N/A' }}</span>
                                    </td>
                                    <td>
                                        <div class="small-ratings">
                                            @switch(culcrating($user->comments->count(),
                                                $user->comments->sum('rating')))
                                                @case(1)
                                                    <i class="fa fa-star rating-color"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                @case(2)
                                                    <i class="fa fa-star rating-color"></i>
                                                    <i class="fa fa-star rating-color"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                @case(3)
                                                    <i class="fa fa-star rating-color"></i>
                                                    <i class="fa fa-star rating-color"></i>
                                                    <i class="fa fa-star rating-color"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                @case(4)
                                                    <i class="fa fa-star rating-color"></i>
                                                    <i class="fa fa-star rating-color"></i>
                                                    <i class="fa fa-star rating-color"></i>
                                                    <i class="fa fa-star rating-color"></i>
                                                    <i class="fa fa-star"></i>
                                                @case(5)
                                                    <i class="fa fa-star rating-color"></i>
                                                    <i class="fa fa-star rating-color"></i>
                                                    <i class="fa fa-star rating-color"></i>
                                                    <i class="fa fa-star rating-color"></i>
                                                    <i class="fa fa-star rating-color"></i>
                                                @break

                                                @default
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                            @endswitch
                                        </div>
                                    </td>
                                    <td>
                                        <div class="small-ratings">
                                            @if ($user->featured == 1)
                                                <i class="fa fa-star rating-color"></i>
                                            @else
                                                <i class="fa fa-star"></i>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge  rounded-pill bg-success">{{ $user->activity->name }}</span>
                                    </td>
                                    <td>
                                        <span
                                            class="badge  rounded-pill bg-{{ $user->active == 1 ? 'success' : 'danger ' }} ">{{ $user->active == 1 ? 'مفعل' : 'غير مفعل' }}</span>
                                    </td>
                                    <td>
                                        <span
                                            class="badge  rounded-pill bg-{{ $user->sales_active == 1 ? 'success' : 'danger ' }} ">{{ $user->sales_active == 1 ? 'مفعل' : 'غير مفعل' }}</span>
                                    </td>
                                    <td>
                                        <a class="btn btn-warning btn-sm waves-effect"
                                            href="{{ route('editusers', ['id' => $user->id]) }}">{{ __('tran.edit') }}</a>
                                        {{-- <button class="btn btn-warning btn-sm waves-effect" wire:click="delete({{ $user->id }})">{{ __('tran.edit') }}</button> --}}
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="17" class="alert alert-danger text-center"> No Data Here</td>
                                    </tr>
                                @endforelse


                            </tbody>
                        </table>

                    </div>
                    <div class="card-footer  d-flex justify-content-center">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>


    </div>

    @push('csslive')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>
            .ratings {
                margin-right: 10px;
            }

            .ratings i {

                color: #cecece;
                font-size: 32px;
            }

            .rating-color {
                color: #fbc634 !important;
            }

            .review-count {
                font-weight: 400;
                margin-bottom: 2px;
                font-size: 24px !important;
            }

            .small-ratings i {
                color: #cecece;
            }

            .review-stat {
                font-weight: 300;
                font-size: 18px;
                margin-bottom: 2px;
            }
        </style>
    @endpush
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
