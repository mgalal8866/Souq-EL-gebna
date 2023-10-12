<div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">اعدادات الاشعارات التلقائية</h4>
        </div>
        {{-- <form id="smsform" wire:submit.prevent="setconfig">
            <div class="card-body">
                <div class="row">

                    <div class="col-12">
                        <div class="d-flex flex-column">
                            <label class="form-check-label mb-50" for="notif_change_text1">تفعيل اشعار تغير حاله
                                الطلب</label>
                            <div class="form-check form-switch form-check-success">
                                <input type="checkbox" class="form-check-input" wire:model='notif_change_statu'
                                    id="notif_change_text1" />
                                <label class="form-check-label" for="notif_change_text1">
                                    <span class="switch-icon-left"><i data-feather="check"></i></span>
                                    <span class="switch-icon-right"><i data-feather="x"></i></span>
                                </label>
                            </div>
                        </div>
                        <x-label class="mt-1" for="notif_change_text " label="نص الاشعار"
                            info="(  الحالة = {statu}  )" />
                        <input type="text" {{ $notif_change_statu == 0 ? 'disabled' : '' }}
                            wire:model='notif_change_text' id="notif_change_text" class="form-control" />
                    </div>

                    <div class="col-12 mt-3">
                        <div class="d-flex flex-column">
                            <label class="form-check-label mb-50" for="notif_sent_cart1">تفعيل اشعار العربة</label>
                            <div class="form-check form-switch form-check-success">
                                <input type="checkbox" class="form-check-input" wire:model='notif_sent_cart'
                                    id="notif_sent_cart1" />
                                <label class="form-check-label" for="notif_sent_cart1">
                                    <span class="switch-icon-left"><i data-feather="check"></i></span>
                                    <span class="switch-icon-right"><i data-feather="x"></i></span>
                                </label>
                            </div>
                        </div>
                        <x-label class="mt-1" for="notif_cart_text1" label="نص الاشعار " />
                        <input type="text" {{ $notif_sent_cart == 0 ? 'disabled' : '' }}
                            wire:model='notif_cart_text' id="notif_cart_text1" class="form-control" />
                    </div>

                    <div class="col-12 mt-3">
                        <div class="d-flex flex-column">
                            <label class="form-check-label mb-50" for="notif_neworder1">تفعيل اشعار طلب جديد'</label>
                            <div class="form-check form-switch form-check-success">
                                <input type="checkbox" class="form-check-input" wire:model='notif_neworder'
                                    id="notif_neworder1" />
                                <label class="form-check-label" for="notif_neworder1">
                                    <span class="switch-icon-left"><i data-feather="check"></i></span>
                                    <span class="switch-icon-right"><i data-feather="x"></i></span>
                                </label>
                            </div>
                        </div>
                        <x-label class="mt-1" for="notif_neworder_text1" label="نص الاشعار " />
                        <input type="text" {{ $notif_neworder == 0 ? 'disabled' : '' }}
                            wire:model='notif_neworder_text' id="notif_neworder_text1" class="form-control" />
                    </div>

                    <div class="col-12 mt-3">
                        <div class="d-flex flex-column">
                            <label class="form-check-label mb-50" for="notif_newoffer1">تفعيل اشعار عرض جديد</label>
                            <div class="form-check form-switch form-check-success">
                                <input type="checkbox" class="form-check-input" wire:model='notif_newoffer'
                                    id="notif_newoffer1" />
                                <label class="form-check-label" for="notif_newoffer1">
                                    <span class="switch-icon-left"><i data-feather="check"></i></span>
                                    <span class="switch-icon-right"><i data-feather="x"></i></span>
                                </label>
                            </div>
                        </div>
                        <x-label class="mt-1" for="notif_newoffer_text1" label="نص الاشعار "
                            info="(  المنتج = {product_name}  - السعر قبل= {oldprice} - السعر بعد={newprice} - الانتهاء= {exp_date}  )" />
                        <input type="text" {{ $notif_newoffer == 0 ? 'disabled' : '' }}
                            wire:model='notif_newoffer_text' id="notif_newoffer_text1" class="form-control" />
                    </div>

                    <div class="col-12 mt-3">
                        <div class="d-flex flex-column">
                            <label class="form-check-label mb-50" for="notif_welcome1">تفعيل اشعار الترحيب </label>
                            <div class="form-check form-switch form-check-success">
                                <input type="checkbox" class="form-check-input" wire:model='notif_welcome'
                                    id="notif_welcome1" />
                                <label class="form-check-label" for="notif_welcome1">
                                    <span class="switch-icon-left"><i data-feather="check"></i></span>
                                    <span class="switch-icon-right"><i data-feather="x"></i></span>
                                </label>
                            </div>
                        </div>
                        <x-label class="mt-1" for="notif_welcome_text1" label="نص الاشعار "
                            info="( اسم المستخدم= {name}  )" />
                        <input type="text" {{ $notif_welcome == 0 ? 'disabled' : '' }}
                            wire:model='notif_welcome_text' id="notif_welcome_text1" class="form-control" />
                    </div>
                    <div class="col-12 mt-3">
                        <div class="d-flex flex-column">
                            <label class="form-check-label mb-50" for="notif_chat1">تفعيل اشعار رساله جديدة </label>
                            <div class="form-check form-switch form-check-success">
                                <input type="checkbox" class="form-check-input" wire:model='notif_chat'
                                    id="notif_chat1" />
                                <label class="form-check-label" for="notif_chat1">
                                    <span class="switch-icon-left"><i data-feather="check"></i></span>
                                    <span class="switch-icon-right"><i data-feather="x"></i></span>
                                </label>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-success">{{ __('tran.save') }}</button>
                </div>
            </div>
        </form> --}}
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
                            <input type="checkbox" class="form-check-input" wire:model.live='selectactive' id="scales"
                                {{ $selectactive == 0 ? 'checked' : '' }} />
                            <label class="form-check-label" for="scales">
                                <span class="switch-icon-left"><i data-feather="check"></i></span>
                                <span class="switch-icon-right"><i data-feather="x"></i></span>
                            </label>
                        </div>
                    </div>
                    <div wire:ignore.self >
                    @if ($selectactive == false)
                        <div class="col-md-6 mb-1">
                            <label class="form-label" for="select2-multiple">Multiple</label>
                            <select class="select2 form-select" id="select2-multiple" wire:model='selectmultiuser' multiple>
                                @foreach ($users as $item)
                                    <option value="{{$item->id??''}}">{{ $item->user_name??'' }}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif
                    </div>
                    <div wire:ignore class="col-12 col-md-6">
                        <x-label for="title" label="{{ __('tran.title') }}" />
                        <input type="text" wire:model='title' id="title" class="form-control" />
                    </div>
                    <div wire:ignore  class="col-12 col-md-6">
                        <x-label for="body" label="{{ __('tran.body') }}" />
                        <input type="text" wire:model='body' id="body" class="form-control" />
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="d-flex  mt-2">
                            <x-imageupload wire:model="image" :width="100" :height="100"
                                :imagenew="$image" :imageold="$image" />
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <button class="btn btn-success">{{ __('tran.send') }}</button>
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
                icon: 'info',
                customClass: {
                    confirmButton: 'btn btn-danger'
                },
                buttonsStyling: false
            });
        })

    </script>
    <script src={{ asset('asset/vendors/js/forms/select/select2.full.min.js') }}></script>

@endpush
