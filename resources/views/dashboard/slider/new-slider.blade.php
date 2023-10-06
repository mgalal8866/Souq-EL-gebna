<div>
    <form id="newproductForm" wire:submit.prevent="saveslider">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('tran.dataslider') }}</h4>
            </div>
            <div class="card-body" wire:ignore.self>
                <div class="row gy-1 pt-75">
                    <div class="col-12 col-md-12  ">
                        <x-imageupload wire:model.defer='imagenew' :imagenew="$imagenew" :imageold="$image" required/>
                    </div>
                    <div class="col-12 col-md-12">
                        <label class="form-label" for="name">{{ __('tran.name') }}</label>
                        <input type="text" wire:model.defer='name' id="name" name="name"
                            class="form-control" required />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="name">{{ __('tran.city') }}</label>
                        <select class="form-select" wire:model='selectcity'>
                            <option> جميع المحافظات</option>
                            @foreach ($city as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="name">{{ __('tran.restore') }}</label>
                        <select class="form-select" wire:model='selectstore'>
                            <option> اختار المتجر</option>
                                @foreach ($store as $item)
                                <option value="{{ $item->id }}">{{ $item->store_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-footer">
                <div class="col-12 text-center mt-2 pt-50">
                    <button type="submit" class="btn btn-success me-1">Save</button>
                    <a class="btn btn-outline-secondary" href="{{ route('slider') }}">
                        Cancel
                    </a>
                </div>
            </div>
        </div>

    </form>
</div>

@push('jslive')
    <script>
        window.addEventListener('swal', event => {

            Swal.fire({
                title: event.detail.message,
                icon: 'success',
                customClass: {
                    confirmButton: 'btn btn-success'
                },
                buttonsStyling: false
            });
        })
    </script>
@endpush
