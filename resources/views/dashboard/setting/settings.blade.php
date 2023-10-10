<div>
    <form id="newproductForm" wire:submit.prevent="saveslider">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('tran.setting') }}</h4>
            </div>
            <div class="card-body" wire:ignore.self>
                <div class="row gy-1 pt-75">
                    <div class="col-12 col-md-12  ">
                        <x-imageupload class="form-control" wire:model.defer='logonew' :imagenew="$logonew"
                            :imageold="$logo"  />
                    </div>
                    <div class="col-12 col-md-12 mt-5 mb-2">

                        <x-imageupload class="form-control" wire:model.defer='splashnew' :imagenew="$splashnew"
                            :imageold="$splash"  />
                    </div>
                    <div class="col-6 col-md-6">
                        <label class="form-label" for="name">{{ __('tran.name') }}</label>
                        <input type="text" wire:model.defer='name' id="name" name="name"
                            class="form-control" required />
                    </div>
                    <div class="col-6 col-md-6">
                        <label class="form-label" for="phone1">{{ __('tran.phone') }}</label>
                        <input type="text" wire:model.defer='phone1' id="phone1" name="phone1"
                            class="form-control"  />
                    </div>
                    <div class="col-6 col-md-6">
                        <label class="form-label" for="phone">{{ __('tran.phone') }}</label>
                        <input type="text" wire:model.defer='phone' id="phone" name="phone"
                            class="form-control"  />
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-footer">
                <div class="col-12 text-center mt-2 pt-50">
                    <button type="submit" class="btn btn-success me-1">Update</button>
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
