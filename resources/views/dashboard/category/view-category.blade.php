<div>
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card outline-success">
                <div class="card-header">
                    <h4 class="card-title">{{ __('tran.category') }}</h4>
                    <a href='{{ route('addcategory') }}' class="btn  btn-success">New</a>
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
                            @forelse ($categorys  as $category)
                                <tr>
                                    <td>
                                        <span class="fw-bold">{{ $category->name }}</span>
                                    </td>
                                    <td> <img src=" {{ $category->urlimg ?? 'N/A' }}" class="me-75" height="50"
                                            width="100" />
                                    </td>

                                    <td>
                                        <a class="btn btn-flat-warning btn-sm waves-effect"
                                        href="{{route('editcategory',['id'=>$category->id])}}">{{ __('tran.edit') }}</a>
                                        <button class="btn btn-flat-danger btn-sm waves-effect"
                                            wire:click="delete({{ $category->id }})">{{ __('tran.delete') }}</button>
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
