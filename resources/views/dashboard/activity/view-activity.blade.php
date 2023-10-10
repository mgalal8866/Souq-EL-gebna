<div>
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card outline-success">
                <div class="card-header">
                    <h4 class="card-title">{{ __('tran.activity') }}</h4>
                    {{-- <a href='{{ route('addactivity') }}' class="btn  btn-success">New</a> --}}
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ __('tran.name') }}</th>
                                <th>{{ __('tran.image') }}</th>
                                <th>{{ __('tran.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($activitys  as $activity)
                                <tr>
                                    <td>
                                        <span class="fw-bold">{{ $activity->name }}</span>
                                    </td>
                                    <td> <img src=" {{ $activity->urlimg ?? 'N/A' }}" class="me-75" height="50"
                                            width="100" />
                                    </td>

                                    <td>
                                        {{-- <a class="btn btn-flat-warning btn-sm waves-effect"
                                        href="{{route('editactivity',['id'=>$activity->id])}}">{{ __('tran.edit') }}</a> --}}
                                        {{-- <button class="btn btn-danger btn-sm waves-effect"
                                            wire:click="delete({{ $activity->id }})">{{ __('tran.delete') }}</button> --}}
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
