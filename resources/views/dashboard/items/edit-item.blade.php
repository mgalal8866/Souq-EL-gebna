<div>
    <form id="newproductForm" wire:submit.prevent="saveitem">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">بيانات الصنف</h4>
            </div>
            <div class="card-body" wire:ignore.self>
                <div class="row gy-1 pt-75">
                    <div class="col-12 col-md-12  ">
                        <x-imageupload wire:model='newimg' :imagenew="$newimg" :imageold="$oldimg" />
                        <div wire:loading.block>
                            Saving ...
                        </div>
                    </div>
                    <div class="col-6 col-md-6">
                        <label class="form-label" for="name">{{ __('tran.name') }}</label>
                        <input type="text" wire:model='name' id="name" name="name" class="form-control"
                            required />
                    </div>
                    <div class="col-6 col-md-6">
                        <label class="form-label" for="stock_qty">{{ __('tran.stock_qty') }}</label>
                        <input type="text" wire:model='stock_qty' id="stock_qty" name="stock_qty"
                            class="form-control" required />
                    </div>

                    <div class="col-6 col-md-6">
                        <label class="form-label" for="min_qty">{{ __('tran.min_qty') }}</label>
                        <input type="text" wire:model='min_qty' id="min_qty" name="min_qty" class="form-control"
                            required />
                    </div>
                    <div class="col-6 col-md-6">
                        <label class="form-label" for="max_qty">{{ __('tran.max_qty') }}</label>
                        <input type="text" wire:model='max_qty' id="max_qty" name="max_qty" class="form-control"
                            required />
                    </div>
                    <div class="col-6 col-md-6">
                        <label class="form-label" for="brand_id">العلامة التجارية </label>
                        <select class="form-select" wire:model='brand_id'>
                            <option> اختيار العلامه التجارية</option>
                            @foreach ($brands as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6 col-md-6">
                        <label class="form-label" for="category_id">القسم</label>
                        <select class="form-select" wire:model='category_id'>
                            <option> اختيار القسم</option>
                            @foreach ($categorys as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">بيانات السعر</h4>
            </div>
            <div class="card-body" wire:ignore.self>
                <div class="row gy-1 pt-75">

                    <div class="col-6 col-md-6">
                        <label class="form-label" for="price_salse">{{ __('tran.price_salse') }}</label>
                        <input type="text" wire:model='price_salse' id="price_salse" name="price_salse"
                            class="form-control" required />
                    </div>
                    <div class="col-6 col-md-6">
                        <label class="form-label" for="price_offer">{{ __('tran.price_offer') }}</label>
                        <input type="text" wire:model='price_offer' id="price_offer" name="price_offer"
                            class="form-control" required />
                    </div>
                    <div class="col-6 col-md-6">
                        <label class="form-label" for="exp_date">{{ __('tran.exp_date') }}</label>
                        <input type="text" wire:model='exp_date' id="exp_date" name="exp_date" class="form-control"
                            required />
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
                            <label class="form-check-label mb-50" for="active"> تفعيل للمستخدم </label>
                            <div class="form-check form-switch form-check-success">
                                <input type="checkbox" class="form-check-input" wire:model='active' id="active" />
                                <label class="form-check-label" for="active">
                                    <span class="switch-icon-left"><i data-feather="check"></i></span>
                                    <span class="switch-icon-right"><i data-feather="x"></i></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-6">
                        <div class="d-flex flex-column">
                            <label class="form-check-label mb-50" for="active_admin"> تفعيل للادمن </label>
                            <div class="form-check form-switch form-check-success">
                                <input type="checkbox" class="form-check-input" wire:model='active_admin'
                                    id="active_admin" />
                                <label class="form-check-label" for="active_admin">
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
                            <label class="form-check-label mb-50" for="get_brand_img"> استخدام صورة البراند صوره افتراضي</label>
                            <div class="form-check form-switch form-check-success">
                                <input type="checkbox" class="form-check-input" wire:model='get_brand_img'
                                    id="get_brand_img" />
                                <label class="form-check-label" for="get_brand_img">
                                    <span class="switch-icon-left"><i data-feather="check"></i></span>
                                    <span class="switch-icon-right"><i data-feather="x"></i></span>
                                </label>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-footer">
                <div class="col-12 text-center mt-2 pt-50">

                    <button type="submit"  wire:loading.attr="disabled" class="btn btn-success me-1">Save</button>

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
