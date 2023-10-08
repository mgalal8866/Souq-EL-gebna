<div>
    <form id="newproductForm" wire:submit.prevent="saveuser">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">بيانات المستخدم</h4>
            </div>
            <div class="card-body" wire:ignore.self>
                <div class="row gy-1 pt-75">
                    <div class="col-12 col-md-12  ">
                        {{-- <x-imageupload wire:model.defer='imagenew' :imagenew="$imagenew" :imageold="$image" /> --}}
                    </div>
                    <div class="col-6 col-md-6">
                        <label class="form-label" for="name">{{ __('tran.name') }}</label>
                        <input type="text" wire:model.defer='name' id="name" name="name"
                            class="form-control" required />
                    </div>
                    <div class="col-6 col-md-6">
                        <label class="form-label" for="storename">{{ __('tran.storename') }}</label>
                        <input type="text" wire:model.defer='storename' id="storename" name="storename"
                            class="form-control" required />
                    </div>

                    <div class="col-6 col-md-6">
                        <label class="form-label" for="phone">{{ __('tran.phone') }}</label>
                        <input type="text" wire:model.defer='phone' id="phone" name="phone"
                            class="form-control" required />
                    </div>
                    <div class="col-6 col-md-6">
                        <label class="form-label" for="phone1">{{ __('tran.phone1') }}</label>
                        <input type="text" wire:model.defer='phone1' id="phone1" name="phone1"
                            class="form-control" required />
                    </div>

                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">بيانات المكان</h4>
            </div>
            <div class="card-body" wire:ignore.self>
                <div class="row gy-1 pt-75">
                    <div class="col-6 col-md-6">
                        <label class="form-label" for="city_id">{{ __('tran.city') }}</label>
                        <select class="form-select" wire:model='city_id'>
                            <option> اختار المحافظه</option>
                            @foreach ($citys as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6 col-md-6">
                        <label class="form-label" for="region">المنطقة</label>
                        <select class="form-select" wire:model='region_id'>
                            <option> اختيار المنطقة</option>
                            @foreach ($regions as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6 col-md-6">
                        <label class="form-label" for="lat">{{ __('tran.lat') }}</label>
                        <input type="text" wire:model.defer='lat' id="lat" name="lat"
                            class="form-control" required />
                    </div>
                    <div class="col-6 col-md-6">
                        <label class="form-label" for="long">{{ __('tran.long') }}</label>
                        <input type="text" wire:model.defer='long' id="long" name="long"
                            class="form-control" required />
                    </div>
                    <div class="col-6 col-md-6">
                        <label class="form-label" for="address">{{ __('tran.address') }}</label>
                        <input type="text" wire:model.defer='address' id="address" name="address"
                            class="form-control" required />
                    </div>

                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">اختيارات</h4>
            </div>
            <div class="card-body" wire:ignore.self>
                <div class="row gy-1 pt-75">
                    <div class="col-6 col-md-6">
                        <div class="d-flex flex-column">
                            <label class="form-check-label mb-50" for="featured"> مميز </label>
                            <div class="form-check form-switch form-check-success">
                                <input type="checkbox" class="form-check-input" wire:model='featured' id="featured" />
                                <label class="form-check-label" for="featured">
                                    <span class="switch-icon-left"><i data-feather="check"></i></span>
                                    <span class="switch-icon-right"><i data-feather="x"></i></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-6">
                        <div class="d-flex flex-column">
                            <label class="form-check-label mb-50" for="sales_active"> تفعيل المبيعات </label>
                            <div class="form-check form-switch form-check-success">
                                <input type="checkbox" class="form-check-input" wire:model='sales_active'
                                    id="sales_active" />
                                <label class="form-check-label" for="sales_active">
                                    <span class="switch-icon-left"><i data-feather="check"></i></span>
                                    <span class="switch-icon-right"><i data-feather="x"></i></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-6">
                        <div class="d-flex flex-column">
                            <label class="form-check-label mb-50" for="rating_view"> عرض التقيمات </label>
                            <div class="form-check form-switch form-check-success">
                                <input type="checkbox" class="form-check-input" wire:model='rating_view'
                                    id="rating_view" />
                                <label class="form-check-label" for="rating_view">
                                    <span class="switch-icon-left"><i data-feather="check"></i></span>
                                    <span class="switch-icon-right"><i data-feather="x"></i></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-md-6">
                        <div class="d-flex flex-column">
                            <label class="form-check-label mb-50" for="active"> حظر المستخدم </label>
                            <div class="form-check form-switch form-check-success">
                                <input type="checkbox" class="form-check-input" wire:model.defer='active'
                                    id="active" />
                                <label class="form-check-label" for="active">
                                    <span class="switch-icon-left"><i data-feather="check"></i></span>
                                    <span class="switch-icon-right"><i data-feather="x"></i></span>
                                </label>
                            </div>
                        </div>
                    </div>
   <div class="col-6 col-md-6">
                        <label class="form-label" for="activity_id">نوع النشاط</label>
                        <select class="form-select" wire:model='activity_id'>
                            <option> اختيار المنطقة</option>
                            @foreach ($activitys as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">الامان</h4>
            </div>
            <div class="card-body" wire:ignore.self>
                <div class="row gy-1 pt-75">
                    <div class="col-6 col-md-6">
                        <label class="form-label" for="question1">السؤال الاول</label>
                        <select class="form-select" wire:model='question1'>
                            <option> اختيار سؤال</option>
                            @foreach ($questions as $item)
                                <option value="{{ $item->id }}">{{ $item->question }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6 col-md-6">
                        <label class="form-label" for="answer1">اجابة السؤال الاول</label>
                        <input type="text" wire:model.defer='answer1' id="answer1" name="answer1"
                            class="form-control" required />
                    </div>
                    <div class="col-6 col-md-6">
                        <label class="form-label" for="question2">السؤال الثانى</label>
                        <select class="form-select" wire:model='question2'>
                            <option> اختيار سؤال</option>
                            @foreach ($questions as $item)
                                <option value="{{ $item->id }}">{{ $item->question }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6 col-md-6">
                        <label class="form-label" for="answer2">اجابة السؤال الثانى</label>
                        <input type="text" wire:model.defer='answer2' id="answer2" name="answer2"
                            class="form-control" required />
                    </div>

                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-footer">
                <div class="col-12 text-center mt-2 pt-50">
                    <button type="submit" class="btn btn-success me-1">Save</button>

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
