<div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">اعدادات الاشعارات التلقائية</h4>
        </div>

    </div>

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{ __('tran.notifiction') }}</h4>
        </div>
        <form id="notifi" wire:submit.prevent="sendnotifiction">
            <div class="card-body">
                <div class="row">
                    <div class="d-flex flex-column">
                        <label class="form-check-label mb-50" for="scales">مخصص / {{ __('tran.sendall') }} </label>
                        <div class="form-check form-switch form-check-success">
                            <input type="checkbox" class="form-check-input" wire:model.live='selectactive'
                                id="scales" {{ $selectactive == 0 ? 'checked' : '' }} />
                            <label class="form-check-label" for="scales">
                                <span class="switch-icon-left"><i data-feather="check"></i></span>
                                <span class="switch-icon-right"><i data-feather="x"></i></span>
                            </label>
                        </div>
                    </div>
                    <div wire:ignore.self>
                        @if ($selectactive == false)
                            <div class="col-md-6 mb-1">
                                <label class="form-label" for="select2-multiple">Multiple</label>
                                <select class="select2 form-select" id="select2-multiple" wire:model='selectmultiuser'
                                    multiple>
                                    @foreach ($users as $item)
                                        <option value="{{ $item->id ?? '' }}">{{ $item->user_name ?? '' }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                    </div>

                    <div wire:ignore class="col-12 col-md-6">
                        <x-label for="title" label="{{ __('tran.title') }}" />
                        <input type="text" wire:model='title' id="title" class="form-control"  required/>
                    </div>
                    <div wire:ignore class="col-12 col-md-6">
                        <x-label for="body" label="{{ __('tran.body') }}" />
                        <input type="text" wire:model='body' id="body" class="form-control" required/>
                    </div>


                    <div class="col-md-6 mb-1">
                        <label class="form-label" for="select2-multiple">تحويل الى متجر محدد</label>
                        <select class="form-select" wire:model='selectstore'>
                            <option value="0">غير موجة</option>
                            @foreach ($users as $item)
                                <option value="{{ $item->id ?? '' }}">{{ $item->store_name ?? '' }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-1">
                        <label class="form-label" for="select2-multiple">حسب المحافظه</label>
                        <select class="form-select" wire:model='selectcity'>
                            <option value="0">جميع المحافظات</option>
                            @foreach ($citys as $city)
                                <option value="{{ $city->id ?? '' }}">{{ $city->name ?? '' }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-1">
                        <label class="form-label" for="select2-multiple">حسب النشاط</label>
                        <select class="form-select" wire:model='selectactivety'>
                            <option value="0">جميع النشاطات</option>
                            @foreach ($activity as $item)
                                <option value="{{ $item->id ?? '' }}">{{ $item->name ?? '' }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="d-flex  mt-2">
                            <x-imageupload wire:model="image" :width="100" :height="100" :imagenew="$image"
                                :imageold="$image" />
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button wire:loading.attr="disabled" class="btn btn-success">{{ __('tran.send') }}</button>
                </div>

            </div>
        </form>
    </div>
</div>
@push('jslive')
    <script>
        window.addEventListener('swal', event => {

            Swal.fire({
                title: event.detail.message,
                icon: event.detail.ev,
                customClass: {
                    confirmButton: 'btn btn-danger'
                },
                buttonsStyling: false
            });
        })
    </script>
    <script src={{ asset('asset/vendors/js/forms/select/select2.full.min.js') }}></script>
@endpush
