<div>
    <form id="newproductForm" wire:submit.prevent="savecategory">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('tran.datacategory') }}</h4>
            </div>
            <div class="card-body" wire:ignore.self>
                <div class="row gy-1 pt-75">
                    <div class="col-12 col-md-12  ">
                        <x-imageupload wire:model='imagenew' :imagenew="$imagenew" :imageold="$image" />
                    </div>
                    <div class="col-12 col-md-12">
                        <label class="form-label" for="name">{{ __('tran.name') }}</label>
                        <input type="text" wire:model='name' id="name" name="name"
                            class="form-control" required />
                    </div>

                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-footer">
                <div class="col-12 text-center mt-2 pt-50">
                    <button type="submit" class="btn btn-success me-1">Save</button>
                    <a class="btn btn-outline-secondary" href="{{ route('category') }}">
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
