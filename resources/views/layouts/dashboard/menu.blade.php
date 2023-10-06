 <div  wire:ignore class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
     <div class="navbar-header" wire:ignore>
         <ul class="nav navbar-nav flex-row">
             <li class="nav-item me-auto"><a class="navbar-brand" href="/"><span class="brand-logo">
                         <img src="https://{{ request()->getHttpHost() }}/asset/images/logo.png" width="50" />
                     </span>
                     {{-- <h2 class="brand-text" style="color: {{ $setting->site_color_primary }}">{{ $setting->name_shop }} --}}
                     </h2>
                 </a></li>
             <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i
                         class="d-block d-xl-none text-primary toggle-icon font-medium-4"> <svg
                             xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round"
                             class="feather feather-x d-block d-xl-none text-primary toggle-icon font-medium-4">
                             <line x1="18" y1="6" x2="6" y2="18"></line>
                             <line x1="6" y1="6" x2="18" y2="18"></line>
                         </svg></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary"
                         data-ticon="disc">
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round"
                             class="feather feather-disc d-none d-xl-block collapse-toggle-icon primary font-medium-4">
                             <circle cx="12" cy="12" r="10"></circle>
                             <circle cx="12" cy="12" r="3"></circle>
                         </svg></i></a></li>
         </ul>
     </div>
     <div class="shadow-bottom"></div>
     <div class="main-menu-content"  wire:ignore>
         <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
             <li class=" nav-item "><a class="d-flex align-items-center" href="{{route('dashboard')}}"><i
                         data-feather="home"></i><span
                         class="menu-title text-truncate">{{ __('tran.dashboard') }}</span></a>
             </li>

             <li class="nav-item "><a class="d-flex align-items-center" href="{{route('users')}}"><i
                         data-feather="home"></i><span
                         class="menu-title text-truncate">{{ __('tran.users') }}</span></a>
             </li>
             <li class="nav-item "><a class="d-flex align-items-center" href="{{route('slider')}}"><i
                         data-feather="home"></i><span
                         class="menu-title text-truncate">{{ __('tran.slider') }}</span></a>
             </li>
             <li class="nav-item "><a class="d-flex align-items-center" href="{{route('brand')}}"><i
                         data-feather="home"></i><span
                         class="menu-title text-truncate">{{ __('tran.brands') }}</span></a>
             </li>
             <li class="nav-item "><a class="d-flex align-items-center" href="{{route('category')}}"><i
                         data-feather="home"></i><span
                         class="menu-title text-truncate">{{ __('tran.categorys') }}</span></a>
             </li>
             <li class="nav-item "><a class="d-flex align-items-center" href="{{route('settings')}}"><i
                         data-feather="home"></i><span
                         class="menu-title text-truncate">{{ __('tran.settings') }}</span></a>
             </li>
             {{--  <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('categorys') }}"><i
                         data-feather="home"></i><span
                         class="menu-title text-truncate">{{ __('tran.categorys') }}</span></a>
             </li>
            {{-- <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('units') }}"><i
                         data-feather="home"></i><span
                         class="menu-title text-truncate">{{ __('tran.unit') }}</span></a>
             </li>
             <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('sliders') }}"><i
                         data-feather="home"></i><span
                         class="menu-title text-truncate">{{ __('tran.slider') }}</span></a>
             </li>
             <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('notifiction') }}"><i
                         data-feather="home"></i><span
                         class="menu-title text-truncate">{{ __('tran.notifiction') }}</span></a>
             </li>
             <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('gallerydashboard') }}"><i
                         data-feather="home"></i><span
                         class="menu-title text-truncate">{{ __('tran.gallery') }}</span></a>
             </li>
             <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('chat') }}"><i
                         data-feather="home"></i><span class="menu-title text-truncate">المحادثة</span></a>
             </li>
             <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i
                         data-feather="layout"></i><span
                         class="menu-title text-truncate">{{ __('tran.customers') }}</span>

                 </a>
                 <ul class="menu-content">
                     <li><a class="d-flex align-items-center" href="{{ route('viewusers') }}"><i
                                 data-feather="circle"></i><span class="menu-item text-truncate">العملاء</span>
                             <div class="badge bg-danger rounded-pill ms-auto">{{ \App\Models\user::count() }}</div>
                         </a>
                     </li>

                 </ul>
             </li>
             <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="menu"></i><span
                         class="menu-title text-truncate">{{ __('tran.reports') }}</span></a>
                 <ul class="menu-content">
                     <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span
                                 class="menu-item text-truncate">تقارير العملاء</span></a>
                         <ul class="menu-content">
                             <li><a class="d-flex align-items-center" href="{{ route('report.client') }}"><span
                                         class="menu-item text-truncate">{{ __('tran.report_users') }}</span></a>
                             </li>
                             <li><a class="d-flex align-items-center" href="{{ route('report.balance_client') }}"><span
                                         class="menu-item text-truncate">{{ __('tran.report_balance_users') }}</span></a>
                             </li>
                             <li><a class="d-flex align-items-center"
                                     href="{{ route('report.client_statement') }}"><span
                                         class="menu-item text-truncate">{{ __('tran.report_account_statement_users') }}</span></a>
                             </li>
                             <li><a class="d-flex align-items-center"
                                     href="{{ route('report.client_moreandless') }}"><span
                                         class="menu-item text-truncate">{{ __('tran.report_client_moreandless') }}</span></a>
                             </li>
                         </ul>
                     </li>
                 </ul>
                 <ul class="menu-content">
                     <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span
                                 class="menu-item text-truncate">تقارير الموردين</span></a>
                         <ul class="menu-content">
                             <li><a class="d-flex align-items-center" href="{{ route('report.supplier') }}"><span
                                         class="menu-item text-truncate">{{ __('tran.report_suppliers') }}</span></a>
                             </li>
                             <li><a class="d-flex align-items-center"
                                     href="{{ route('report.balance_supplier') }}"><span
                                         class="menu-item text-truncate">{{ __('tran.report_balance_supplier') }}</span></a>
                             </li>
                             <li><a class="d-flex align-items-center"
                                     href="{{ route('report.supplier_statement') }}"><span
                                         class="menu-item text-truncate">{{ __('tran.report_account_statement_supplier') }}</span></a>
                             </li>
                             <li><a class="d-flex align-items-center"
                                     href="{{ route('report.supplier_moreandless') }}"><span
                                         class="menu-item text-truncate">{{ __('tran.report_supplier_moreandless') }}</span></a>
                             </li>

                         </ul>
                     </li>
                 </ul>
                 <ul class="menu-content">
                     <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span
                                 class="menu-item text-truncate">تقارير الاصناف</span></a>
                         <ul class="menu-content">
                             <li><a class="d-flex align-items-center"
                                     href="{{ route('report.product_moreandless') }}"><span
                                         class="menu-item text-truncate">{{ __('tran.report_product_moreandless') }}</span></a>
                             </li>

                         </ul>
                         <ul class="menu-content">
                             <li><a class="d-flex align-items-center"
                                     href="{{ route('report.limit_product') }}"><span
                                         class="menu-item text-truncate">{{ __('tran.report_limit_product') }}</span></a>
                             </li>

                         </ul>
                     </li>
                 </ul>
                 <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span
                                class="menu-item text-truncate">تقارير الموظفين</span></a>
                        <ul class="menu-content">
                            <li><a class="d-flex align-items-center" href="{{ route('report.employee_salery') }}"><span
                                        class="menu-item text-truncate">{{ __('tran.report_salery') }}</span></a>
                            </li>
                        </ul>
                        <ul class="menu-content">
                            <li><a class="d-flex align-items-center" href="{{ route('report.employee') }}"><span
                                        class="menu-item text-truncate">{{ __('tran.report_emp') }}</span></a>
                            </li>
                        </ul>
                        <ul class="menu-content">
                            <li><a class="d-flex align-items-center" href="{{ route('report.employee_advance') }}"><span
                                        class="menu-item text-truncate">{{ __('tran.employee_advance') }}</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
                 <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span
                                class="menu-item text-truncate">تقارير المشتريات</span></a>
                        <ul class="menu-content">
                            <li><a class="d-flex align-items-center" href="{{ route('report.purchases') }}"><span
                                        class="menu-item text-truncate">{{ __('tran.report_purchases') }}</span></a>
                            </li>
                        </ul>
                        <ul class="menu-content">
                            <li><a class="d-flex align-items-center" href="{{ route('report.purchases_returned') }}"><span
                                        class="menu-item text-truncate">{{ __('tran.report_purchases_returned') }}</span></a>
                            </li>
                        </ul>
                        <ul class="menu-content">
                            <li><a class="d-flex align-items-center" href="{{ route('report.purchases_comparison') }}"><span
                                        class="menu-item text-truncate">{{ __('tran.report_purchases_comparison') }}</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
                 <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span
                                class="menu-item text-truncate">تقارير نقاط البيع</span></a>
                        <ul class="menu-content">
                            <li><a class="d-flex align-items-center" href="{{ route('report.pos_shift') }}"><span
                                        class="menu-item text-truncate">{{ __('tran.pos_shift') }}</span></a>
                            </li>
                        </ul>
                        <ul class="menu-content">
                            <li><a class="d-flex align-items-center" href="{{ route('report.user_sales') }}"><span
                                        class="menu-item text-truncate">{{ __('tran.report_user_sales') }}</span></a>
                            </li>
                        </ul>

                    </li>
                </ul>
             </li>

             <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i
                         data-feather="layout"></i><span
                         class="menu-title text-truncate">{{ __('tran.invoice') }}</span>
                 </a>
                 <ul class="menu-content">
                     <li><a class="d-flex align-items-center" href="{{ route('invoices_open') }}"><i
                                 data-feather="circle"></i><span
                                 class="menu-item text-truncate">{{ __('tran.invoiceopen') }}</span>
                             <div class="badge bg-danger rounded-pill ms-auto">
                                 {{ \App\Models\DeliveryHeader::count() }}
                             </div>
                         </a>
                     </li>
                     <li><a class="d-flex align-items-center" href="{{ route('invoices_close') }}"><i
                                 data-feather="circle"></i><span
                                 class="menu-item text-truncate">{{ __('tran.invoiceclose') }}</span>
                             <div class="badge bg-success rounded-pill ms-auto">{{ \App\Models\SalesHeader::count() }}
                             </div>
                         </a>
                     </li>

                 </ul>
             </li>
--}}
         </ul>
     </div>
 </div>
