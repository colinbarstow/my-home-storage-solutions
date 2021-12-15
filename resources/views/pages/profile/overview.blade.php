{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Mobile Toggle-->
                    <button class="burger-icon burger-icon-left mr-4 d-inline-block d-lg-none" id="kt_subheader_mobile_toggle">
                        <span></span>
                    </button>
                    <!--end::Mobile Toggle-->
                    <!--begin::Page Heading-->
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <!--begin::Page Title-->
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Your profile</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="" class="text-muted">Your Profile</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="" class="text-muted">Overview</a>
                            </li>
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->
                <!--begin::Toolbar-->
                <div class="d-flex align-items-center">
                    <!--begin::Actions-->
                    <a href="#" class="btn btn-light-primary font-weight-bolder btn-sm">Actions</a>
                    <!--end::Actions-->
                    <!--begin::Dropdown-->
                    <div class="dropdown dropdown-inline" data-toggle="tooltip" title="Quick actions" data-placement="left">
                        <a href="#" class="btn btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<span class="svg-icon svg-icon-success svg-icon-2x">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Files/File-plus.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<polygon points="0 0 24 0 24 24 0 24" />
														<path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
														<path d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z" fill="#000000" />
													</g>
												</svg>
                                                <!--end::Svg Icon-->
											</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right p-0 m-0">
                            <!--begin::Navigation-->
                            <ul class="navi navi-hover">
                                <li class="navi-header font-weight-bold py-4">
                                    <span class="font-size-lg">Choose Label:</span>
                                    <i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="Click to learn more..."></i>
                                </li>
                                <li class="navi-separator mb-3 opacity-70"></li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link">
														<span class="navi-text">
															<span class="label label-xl label-inline label-light-success">Customer</span>
														</span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link">
														<span class="navi-text">
															<span class="label label-xl label-inline label-light-danger">Partner</span>
														</span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link">
														<span class="navi-text">
															<span class="label label-xl label-inline label-light-warning">Suplier</span>
														</span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link">
														<span class="navi-text">
															<span class="label label-xl label-inline label-light-primary">Member</span>
														</span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link">
														<span class="navi-text">
															<span class="label label-xl label-inline label-light-dark">Staff</span>
														</span>
                                    </a>
                                </li>
                                <li class="navi-separator mt-3 opacity-70"></li>
                                <li class="navi-footer py-4">
                                    <a class="btn btn-clean font-weight-bold btn-sm" href="#">
                                        <i class="ki ki-plus icon-sm"></i>Add new</a>
                                </li>
                            </ul>
                            <!--end::Navigation-->
                        </div>
                    </div>
                    <!--end::Dropdown-->
                </div>
                <!--end::Toolbar-->
            </div>
        </div>
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Profile Overview-->
                <div class="d-flex flex-row">
                    <!--begin::Aside-->
                    <div class="flex-row-auto offcanvas-mobile w-300px w-xl-350px" id="kt_profile_aside">
                        <!--begin::Profile Card-->
                        <div class="card card-custom card-stretch">
                            <!--begin::Body-->
                            <div class="card-body pt-4">
                                @include('pages.profile.partials.toolbar')
                                @include('pages.profile.partials.user')
                                @include('pages.profile.partials.contact')
                                @include('pages.profile.partials.nav')
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Profile Card-->
                    </div>
                    <!--end::Aside-->
                    <!--begin::Content-->
                    <div class="flex-row-fluid ml-lg-8">
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-lg-6">
                                <!--begin::List Widget 14-->
                                <div class="card card-custom card-stretch gutter-b">
                                    <!--begin::Header-->
                                    <div class="card-header border-0">
                                        <h3 class="card-title font-weight-bolder text-dark">Market Leaders</h3>
                                        <div class="card-toolbar">
                                            <div class="dropdown dropdown-inline">
                                                <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ki ki-bold-more-ver"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                                    <!--begin::Navigation-->
                                                    <ul class="navi navi-hover">
                                                        <li class="navi-header font-weight-bold py-4">
                                                            <span class="font-size-lg">Choose Label:</span>
                                                            <i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="Click to learn more..."></i>
                                                        </li>
                                                        <li class="navi-separator mb-3 opacity-70"></li>
                                                        <li class="navi-item">
                                                            <a href="#" class="navi-link">
																				<span class="navi-text">
																					<span class="label label-xl label-inline label-light-success">Customer</span>
																				</span>
                                                            </a>
                                                        </li>
                                                        <li class="navi-item">
                                                            <a href="#" class="navi-link">
																				<span class="navi-text">
																					<span class="label label-xl label-inline label-light-danger">Partner</span>
																				</span>
                                                            </a>
                                                        </li>
                                                        <li class="navi-item">
                                                            <a href="#" class="navi-link">
																				<span class="navi-text">
																					<span class="label label-xl label-inline label-light-warning">Suplier</span>
																				</span>
                                                            </a>
                                                        </li>
                                                        <li class="navi-item">
                                                            <a href="#" class="navi-link">
																				<span class="navi-text">
																					<span class="label label-xl label-inline label-light-primary">Member</span>
																				</span>
                                                            </a>
                                                        </li>
                                                        <li class="navi-item">
                                                            <a href="#" class="navi-link">
																				<span class="navi-text">
																					<span class="label label-xl label-inline label-light-dark">Staff</span>
																				</span>
                                                            </a>
                                                        </li>
                                                        <li class="navi-separator mt-3 opacity-70"></li>
                                                        <li class="navi-footer py-4">
                                                            <a class="btn btn-clean font-weight-bold btn-sm" href="#">
                                                                <i class="ki ki-plus icon-sm"></i>Add new</a>
                                                        </li>
                                                    </ul>
                                                    <!--end::Navigation-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body pt-2">
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-60 symbol-2by3 flex-shrink-0 mr-4">
                                                <div class="symbol-label" style="background-image: url('assets/media/stock-600x400/img-17.jpg')"></div>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">Cup &amp; Green</a>
                                                <span class="text-muted font-weight-bold font-size-sm my-1">Local, clean &amp; environmental</span>
                                                <span class="text-muted font-weight-bold font-size-sm">Created by:
																<span class="text-primary font-weight-bold">CoreAd</span></span>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Info-->
                                            <div class="d-flex align-items-center py-lg-0 py-2">
                                                <div class="d-flex flex-column text-right">
                                                    <span class="text-dark-75 font-weight-bolder font-size-h4">24,900</span>
                                                    <span class="text-muted font-size-sm font-weight-bolder">votes</span>
                                                </div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin: Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-60 symbol-2by3 flex-shrink-0 mr-4">
                                                <div class="symbol-label" style="background-image: url('assets/media/stock-600x400/img-10.jpg')"></div>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">Yellow Background</a>
                                                <span class="text-muted font-weight-bold font-size-sm my-1">Strong abstract concept</span>
                                                <span class="text-muted font-weight-bold font-size-sm">Created by:
																<span class="text-primary font-weight-bold">KeenThemes</span></span>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Info-->
                                            <div class="d-flex align-items-center py-lg-0 py-2">
                                                <div class="d-flex flex-column text-right">
                                                    <span class="text-dark-75 font-weight-bolder font-size-h4">70,380</span>
                                                    <span class="text-muted font-weight-bolder font-size-sm">votes</span>
                                                </div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end: Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-60 symbol-2by3 flex-shrink-0 mr-4">
                                                <div class="symbol-label" style="background-image: url('assets/media/stock-600x400/img-1.jpg')"></div>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 pr-3">
                                                <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">Nike &amp; Blue</a>
                                                <span class="text-muted font-weight-bold font-size-sm my-1">Footwear overalls</span>
                                                <span class="text-muted font-weight-bold font-size-sm">Created by:
																<span class="text-primary font-weight-bold">Invision Inc.</span></span>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Info-->
                                            <div class="d-flex align-items-center py-lg-0 py-2">
                                                <div class="d-flex flex-column text-right">
                                                    <span class="text-dark-75 font-size-h4 font-weight-bolder">7,200</span>
                                                    <span class="text-muted font-size-sm font-weight-bolder">votes</span>
                                                </div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-60 symbol-2by3 flex-shrink-0 mr-4">
                                                <div class="symbol-label" style="background-image: url('assets/media/stock-600x400/img-9.jpg')"></div>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">Desserts platter</a>
                                                <span class="text-muted font-size-sm font-weight-bold my-1">Food trends &amp; reviews</span>
                                                <span class="text-muted font-size-sm font-weight-bold">Created by:
																<span class="text-primary font-weight-bold">Figma Studio</span></span>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Info-->
                                            <div class="d-flex align-items-center py-lg-0 py-2">
                                                <div class="d-flex flex-column text-right">
                                                    <span class="text-dark-75 font-size-h4 font-weight-bolder">36,450</span>
                                                    <span class="text-muted font-size-sm font-weight-bolder">votes</span>
                                                </div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-60 symbol-2by3 flex-shrink-0 mr-4">
                                                <div class="symbol-label" style="background-image: url('assets/media/stock-600x400/img-12.jpg')"></div>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">Cup &amp; Green</a>
                                                <span class="text-muted font-weight-bold font-size-sm my-1">Local, clean &amp; environmental</span>
                                                <span class="text-muted font-weight-bold font-size-sm">Created by:
																<span class="text-primary font-weight-bold">CoreAd</span></span>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Info-->
                                            <div class="d-flex align-items-center py-lg-0 py-2">
                                                <div class="d-flex flex-column text-right">
                                                    <span class="text-dark-75 font-weight-bolder font-size-h4">23,900</span>
                                                    <span class="text-muted font-size-sm font-weight-bolder">votes</span>
                                                </div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::List Widget 14-->
                            </div>
                            <div class="col-lg-6">
                                <!--begin::List Widget 10-->
                                <div class="card card-custom card-stretch gutter-b">
                                    <!--begin::Header-->
                                    <div class="card-header border-0">
                                        <h3 class="card-title font-weight-bolder text-dark">Notifications</h3>
                                        <div class="card-toolbar">
                                            <div class="dropdown dropdown-inline">
                                                <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ki ki-bold-more-ver"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                                    <!--begin::Naviigation-->
                                                    <ul class="navi">
                                                        <li class="navi-header font-weight-bold py-5">
                                                            <span class="font-size-lg">Add New:</span>
                                                            <i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="Click to learn more..."></i>
                                                        </li>
                                                        <li class="navi-separator mb-3 opacity-70"></li>
                                                        <li class="navi-item">
                                                            <a href="#" class="navi-link">
																				<span class="navi-icon">
																					<i class="flaticon2-shopping-cart-1"></i>
																				</span>
                                                                <span class="navi-text">Order</span>
                                                            </a>
                                                        </li>
                                                        <li class="navi-item">
                                                            <a href="#" class="navi-link">
																				<span class="navi-icon">
																					<i class="navi-icon flaticon2-calendar-8"></i>
																				</span>
                                                                <span class="navi-text">Members</span>
                                                                <span class="navi-label">
																					<span class="label label-light-danger label-rounded font-weight-bold">3</span>
																				</span>
                                                            </a>
                                                        </li>
                                                        <li class="navi-item">
                                                            <a href="#" class="navi-link">
																				<span class="navi-icon">
																					<i class="navi-icon flaticon2-telegram-logo"></i>
																				</span>
                                                                <span class="navi-text">Project</span>
                                                            </a>
                                                        </li>
                                                        <li class="navi-item">
                                                            <a href="#" class="navi-link">
																				<span class="navi-icon">
																					<i class="navi-icon flaticon2-new-email"></i>
																				</span>
                                                                <span class="navi-text">Record</span>
                                                                <span class="navi-label">
																					<span class="label label-light-success label-rounded font-weight-bold">5</span>
																				</span>
                                                            </a>
                                                        </li>
                                                        <li class="navi-separator mt-3 opacity-70"></li>
                                                        <li class="navi-footer pt-5 pb-4">
                                                            <a class="btn btn-light-primary font-weight-bolder btn-sm" href="#">More options</a>
                                                            <a class="btn btn-clean font-weight-bold btn-sm d-none" href="#" data-toggle="tooltip" data-placement="right" title="Click to learn more...">Learn more</a>
                                                        </li>
                                                    </ul>
                                                    <!--end::Naviigation-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body pt-0">
                                        <!--begin::Item-->
                                        <div class="mb-6">
                                            <!--begin::Content-->
                                            <div class="d-flex align-items-center flex-grow-1">
                                                <!--begin::Checkbox-->
                                                <label class="checkbox checkbox-lg checkbox-lg flex-shrink-0 mr-4">
                                                    <input type="checkbox" value="1" />
                                                    <span></span>
                                                </label>
                                                <!--end::Checkbox-->
                                                <!--begin::Section-->
                                                <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                                                    <!--begin::Info-->
                                                    <div class="d-flex flex-column align-items-cente py-2 w-75">
                                                        <!--begin::Title-->
                                                        <a href="#" class="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1">Daily Standup Meeting</a>
                                                        <!--end::Title-->
                                                        <!--begin::Data-->
                                                        <span class="text-muted font-weight-bold">Due in 2 Days</span>
                                                        <!--end::Data-->
                                                    </div>
                                                    <!--end::Info-->
                                                    <!--begin::Label-->
                                                    <span class="label label-lg label-light-primary label-inline font-weight-bold py-4">Approved</span>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Section-->
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="mb-6">
                                            <!--begin::Content-->
                                            <div class="d-flex align-items-center flex-grow-1">
                                                <!--begin::Checkbox-->
                                                <label class="checkbox checkbox-lg checkbox-lg flex-shrink-0 mr-4">
                                                    <input type="checkbox" value="1" />
                                                    <span></span>
                                                </label>
                                                <!--end::Checkbox-->
                                                <!--begin::Section-->
                                                <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                                                    <!--begin::Info-->
                                                    <div class="d-flex flex-column align-items-cente py-2 w-75">
                                                        <!--begin::Title-->
                                                        <a href="#" class="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1">Group Town Hall Meet-up with showcase</a>
                                                        <!--end::Title-->
                                                        <!--begin::Data-->
                                                        <span class="text-muted font-weight-bold">Due in 2 Days</span>
                                                        <!--end::Data-->
                                                    </div>
                                                    <!--end::Info-->
                                                    <!--begin::Label-->
                                                    <span class="label label-lg label-light-warning label-inline font-weight-bold py-4">In Progress</span>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Section-->
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="mb-6">
                                            <!--begin::Content-->
                                            <div class="d-flex align-items-center flex-grow-1">
                                                <!--begin::Checkbox-->
                                                <label class="checkbox checkbox-lg checkbox-lg flex-shrink-0 mr-4">
                                                    <input type="checkbox" value="1" />
                                                    <span></span>
                                                </label>
                                                <!--end::Checkbox-->
                                                <!--begin::Section-->
                                                <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                                                    <!--begin::Info-->
                                                    <div class="d-flex flex-column align-items-cente py-2 w-75">
                                                        <!--begin::Title-->
                                                        <a href="#" class="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1">Next sprint planning and estimations</a>
                                                        <!--end::Title-->
                                                        <!--begin::Data-->
                                                        <span class="text-muted font-weight-bold">Due in 2 Days</span>
                                                        <!--end::Data-->
                                                    </div>
                                                    <!--end::Info-->
                                                    <!--begin::Label-->
                                                    <span class="label label-lg label-light-success label-inline font-weight-bold py-4">Success</span>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Section-->
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="mb-6">
                                            <!--begin::Content-->
                                            <div class="d-flex align-items-center flex-grow-1">
                                                <!--begin::Checkbox-->
                                                <label class="checkbox checkbox-lg checkbox-lg flex-shrink-0 mr-4">
                                                    <input type="checkbox" value="1" />
                                                    <span></span>
                                                </label>
                                                <!--end::Checkbox-->
                                                <!--begin::Section-->
                                                <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                                                    <!--begin::Info-->
                                                    <div class="d-flex flex-column align-items-cente py-2 w-75">
                                                        <!--begin::Title-->
                                                        <a href="#" class="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1">Sprint delivery and project deployment</a>
                                                        <!--end::Title-->
                                                        <!--begin::Data-->
                                                        <span class="text-muted font-weight-bold">Due in 2 Days</span>
                                                        <!--end::Data-->
                                                    </div>
                                                    <!--end::Info-->
                                                    <!--begin::Label-->
                                                    <span class="label label-lg label-light-danger label-inline font-weight-bold py-4">Rejected</span>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Section-->
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                        <!--end: Item-->
                                        <!--begin: Item-->
                                        <div class="">
                                            <!--begin::Content-->
                                            <div class="d-flex align-items-center flex-grow-1">
                                                <!--begin::Checkbox-->
                                                <label class="checkbox checkbox-lg checkbox-lg flex-shrink-0 mr-4">
                                                    <input type="checkbox" value="1" />
                                                    <span></span>
                                                </label>
                                                <!--end::Checkbox-->
                                                <!--begin::Section-->
                                                <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                                                    <!--begin::Info-->
                                                    <div class="d-flex flex-column align-items-cente py-2 w-75">
                                                        <!--begin::Title-->
                                                        <a href="#" class="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1">Data analytics research showcase</a>
                                                        <!--end::Title-->
                                                        <!--begin::Data-->
                                                        <span class="text-muted font-weight-bold">Due in 2 Days</span>
                                                        <!--end::Data-->
                                                    </div>
                                                    <!--end::Info-->
                                                    <!--begin::Label-->
                                                    <span class="label label-lg label-light-warning label-inline font-weight-bold py-4">In Progress</span>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Section-->
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                        <!--end: Item-->
                                    </div>
                                    <!--end: Card Body-->
                                </div>
                                <!--end: Card-->
                                <!--end: List Widget 10-->
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Advance Table: Widget 7-->
                        <div class="card card-custom gutter-b">
                            <!--begin::Header-->
                            <div class="card-header border-0 pt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label font-weight-bolder text-dark">New Arrivals</span>
                                    <span class="text-muted mt-3 font-weight-bold font-size-sm">More than 400+ new members</span>
                                </h3>
                                <div class="card-toolbar">
                                    <ul class="nav nav-pills nav-pills-sm nav-dark-75">
                                        <li class="nav-item">
                                            <a class="nav-link py-2 px-4" data-toggle="tab" href="#kt_tab_pane_12_1">Month</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link py-2 px-4" data-toggle="tab" href="#kt_tab_pane_12_2">Week</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link py-2 px-4 active" data-toggle="tab" href="#kt_tab_pane_12_3">Day</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body pt-2 pb-0 mt-n3">
                                <div class="tab-content mt-5" id="myTabTables12">
                                    <!--begin::Tap pane-->
                                    <div class="tab-pane fade" id="kt_tab_pane_12_1" role="tabpanel" aria-labelledby="kt_tab_pane_12_1">
                                        <!--begin::Table-->
                                        <div class="table-responsive">
                                            <table class="table table-borderless table-vertical-center">
                                                <thead>
                                                <tr>
                                                    <th class="p-0 w-50px"></th>
                                                    <th class="p-0 min-w-200px"></th>
                                                    <th class="p-0 min-w-120px"></th>
                                                    <th class="p-0 min-w-120px"></th>
                                                    <th class="p-0 min-w-120px"></th>
                                                    <th class="p-0 min-w-160px"></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td class="p-0 py-4">
                                                        <div class="symbol symbol-50 symbol-light mr-5">
																				<span class="symbol-label">
																					<img src="assets/media/svg/misc/005-bebo.svg" class="h-50 align-self-center" alt="" />
																				</span>
                                                        </div>
                                                    </td>
                                                    <td class="pl-0">
                                                        <a href="#" class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">Beats Studio</a>
                                                        <span class="text-muted font-weight-bold d-block">FTP: bprow@bnc.cc</span>
                                                    </td>
                                                    <td class="text-right pr-0">
                                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$57,000</span>
                                                        <span class="text-muted font-weight-bold">Paid</span>
                                                    </td>
                                                    <td class="text-right">
                                                        <span class="text-muted font-weight-bold">AngularJS, C#</span>
                                                    </td>
                                                    <td class="text-right">
                                                        <span class="label label-lg label-light-danger label-inline">Rejected</span>
                                                    </td>
                                                    <td class="pr-0 text-right">
                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-primary">
																					<!--begin::Svg Icon | path:assets/media/svg/icons/General/Settings-1.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<rect x="0" y="0" width="24" height="24" />
																							<path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
																							<path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                                        </a>
                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
																				<span class="svg-icon svg-icon-md svg-icon-primary">
																					<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<rect x="0" y="0" width="24" height="24" />
																							<path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
																							<path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                                        </a>
                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-primary">
																					<!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<rect x="0" y="0" width="24" height="24" />
																							<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
																							<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="p-0 py-4">
                                                        <div class="symbol symbol-50 symbol-light mr-5">
																				<span class="symbol-label">
																					<img src="assets/media/svg/misc/014-kickstarter.svg" class="h-50 align-self-center" alt="" />
																				</span>
                                                        </div>
                                                    </td>
                                                    <td class="pl-0">
                                                        <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">KTR Application</a>
                                                        <span class="text-muted font-weight-bold d-block">
																			<span class="font-weight-bolder text-dark-75">FTP:</span>bprow@bnc.cc</span>
                                                    </td>
                                                    <td class="text-right">
                                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$45,200,000</span>
                                                        <span class="text-muted font-weight-bold">Paid</span>
                                                    </td>
                                                    <td class="text-right">
                                                        <span class="text-muted font-weight-bold">ReactJS, Ruby</span>
                                                    </td>
                                                    <td class="text-right">
                                                        <span class="label label-lg label-light-warning label-inline">In Progress</span>
                                                    </td>
                                                    <td class="p-0 text-right">
                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-primary">
																					<!--begin::Svg Icon | path:assets/media/svg/icons/General/Settings-1.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<rect x="0" y="0" width="24" height="24" />
																							<path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
																							<path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                                        </a>
                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
																				<span class="svg-icon svg-icon-md svg-icon-primary">
																					<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<rect x="0" y="0" width="24" height="24" />
																							<path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
																							<path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                                        </a>
                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-primary">
																					<!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<rect x="0" y="0" width="24" height="24" />
																							<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
																							<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="p-0 py-4">
                                                        <div class="symbol symbol-50 symbol-light">
																				<span class="symbol-label">
																					<img src="assets/media/svg/misc/006-plurk.svg" class="h-50 align-self-center" alt="" />
																				</span>
                                                        </div>
                                                    </td>
                                                    <td class="pl-0">
                                                        <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Sant Outstanding</a>
                                                        <div>
                                                            <span class="font-weight-bolder">Email:</span>
                                                            <a class="text-muted font-weight-bold text-hover-primary" href="#">bprow@bnc.cc</a>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$2,000,000</span>
                                                        <span class="text-muted font-weight-bold">Paid</span>
                                                    </td>
                                                    <td class="text-right">
                                                        <span class="text-muted font-weight-bold">ReactJs, HTML</span>
                                                    </td>
                                                    <td class="text-right">
                                                        <span class="label label-lg label-light-primary label-inline">Approved</span>
                                                    </td>
                                                    <td class="pr-0 text-right">
                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-primary">
																					<!--begin::Svg Icon | path:assets/media/svg/icons/General/Settings-1.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<rect x="0" y="0" width="24" height="24" />
																							<path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
																							<path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                                        </a>
                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
																				<span class="svg-icon svg-icon-md svg-icon-primary">
																					<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<rect x="0" y="0" width="24" height="24" />
																							<path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
																							<path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                                        </a>
                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-primary">
																					<!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<rect x="0" y="0" width="24" height="24" />
																							<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
																							<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="p-0 py-4">
                                                        <div class="symbol symbol-50 symbol-light mr-5">
																				<span class="symbol-label">
																					<img src="assets/media/svg/misc/015-telegram.svg" class="h-50 align-self-center" alt="" />
																				</span>
                                                        </div>
                                                    </td>
                                                    <td class="pl-0">
                                                        <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Telegram Mobile</a>
                                                        <span class="text-muted font-weight-bold d-block">
																			<span class="font-weight-bolder text-dark-75">FTP:</span>bprow@bnc.cc</span>
                                                    </td>
                                                    <td class="text-right">
                                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$4,600,000</span>
                                                        <span class="text-muted font-weight-bold">Paid</span>
                                                    </td>
                                                    <td class="text-right">
                                                        <span class="text-muted font-weight-bold">Python, MySQL</span>
                                                    </td>
                                                    <td class="text-right">
                                                        <span class="label label-lg label-light-warning label-inline">In Progress</span>
                                                    </td>
                                                    <td class="p-0 text-right">
                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-primary">
																					<!--begin::Svg Icon | path:assets/media/svg/icons/General/Settings-1.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<rect x="0" y="0" width="24" height="24" />
																							<path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
																							<path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                                        </a>
                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
																				<span class="svg-icon svg-icon-md svg-icon-primary">
																					<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<rect x="0" y="0" width="24" height="24" />
																							<path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
																							<path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                                        </a>
                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-primary">
																					<!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<rect x="0" y="0" width="24" height="24" />
																							<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
																							<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="p-0 py-4">
                                                        <div class="symbol symbol-50 symbol-light mr-5">
																				<span class="symbol-label">
																					<img src="assets/media/svg/misc/003-puzzle.svg" class="h-50 align-self-center" alt="" />
																				</span>
                                                        </div>
                                                    </td>
                                                    <td class="pl-0">
                                                        <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Cisco Management</a>
                                                        <span class="text-muted font-weight-bold d-block">
																			<span class="font-weight-bolder text-dark-75">FTP:</span>bprow@bnc.cc</span>
                                                    </td>
                                                    <td class="text-right">
                                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$560,000</span>
                                                        <span class="text-muted font-weight-bold">Paid</span>
                                                    </td>
                                                    <td class="text-right">
                                                        <span class="text-muted font-weight-bold">Laravel, Metronic</span>
                                                    </td>
                                                    <td class="text-right">
                                                        <span class="label label-lg label-light-success label-inline">Success</span>
                                                    </td>
                                                    <td class="p-0 text-right">
                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-primary">
																					<!--begin::Svg Icon | path:assets/media/svg/icons/General/Settings-1.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<rect x="0" y="0" width="24" height="24" />
																							<path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
																							<path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                                        </a>
                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
																				<span class="svg-icon svg-icon-md svg-icon-primary">
																					<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<rect x="0" y="0" width="24" height="24" />
																							<path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
																							<path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                                        </a>
                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-primary">
																					<!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<rect x="0" y="0" width="24" height="24" />
																							<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
																							<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Tap pane-->
                                    <!--begin::Tap pane-->
                                    <div class="tab-pane fade" id="kt_tab_pane_12_2" role="tabpanel" aria-labelledby="kt_tab_pane_12_2">
                                        <!--begin::Table-->
                                        <div class="table-responsive">
                                            <table class="table table-borderless table-vertical-center">
                                                <thead>
                                                <tr>
                                                    <th class="p-0 w-50px"></th>
                                                    <th class="p-0 min-w-200px"></th>
                                                    <th class="p-0 min-w-120px"></th>
                                                    <th class="p-0 min-w-120px"></th>
                                                    <th class="p-0 min-w-120px"></th>
                                                    <th class="p-0 min-w-160px"></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td class="p-0 py-4">
                                                        <div class="symbol symbol-50 symbol-light mr-5">
																				<span class="symbol-label">
																					<img src="assets/media/svg/misc/015-telegram.svg" class="h-50 align-self-center" alt="" />
																				</span>
                                                        </div>
                                                    </td>
                                                    <td class="pl-0">
                                                        <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Telegram Mobile</a>
                                                        <span class="text-muted font-weight-bold d-block">
																			<span class="font-weight-bolder text-dark-75">FTP:</span>bprow@bnc.cc</span>
                                                    </td>
                                                    <td class="text-right">
                                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$4,600,000</span>
                                                        <span class="text-muted font-weight-bold">Paid</span>
                                                    </td>
                                                    <td class="text-right">
                                                        <span class="text-muted font-weight-bold">Python, MySQL</span>
                                                    </td>
                                                    <td class="text-right">
                                                        <span class="label label-lg label-light-warning label-inline">In Progress</span>
                                                    </td>
                                                    <td class="p-0 text-right">
                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-primary">
																					<!--begin::Svg Icon | path:assets/media/svg/icons/General/Settings-1.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<rect x="0" y="0" width="24" height="24" />
																							<path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
																							<path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                                        </a>
                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
																				<span class="svg-icon svg-icon-md svg-icon-primary">
																					<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<rect x="0" y="0" width="24" height="24" />
																							<path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
																							<path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                                        </a>
                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-primary">
																					<!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<rect x="0" y="0" width="24" height="24" />
																							<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
																							<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="p-0 py-4">
                                                        <div class="symbol symbol-50 symbol-light mr-5">
																				<span class="symbol-label">
																					<img src="assets/media/svg/misc/003-puzzle.svg" class="h-50 align-self-center" alt="" />
																				</span>
                                                        </div>
                                                    </td>
                                                    <td class="pl-0">
                                                        <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Cisco Management</a>
                                                        <span class="text-muted font-weight-bold d-block">
																			<span class="font-weight-bolder text-dark-75">FTP:</span>bprow@bnc.cc</span>
                                                    </td>
                                                    <td class="text-right">
                                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$560,000</span>
                                                        <span class="text-muted font-weight-bold">Paid</span>
                                                    </td>
                                                    <td class="text-right">
                                                        <span class="text-muted font-weight-bold">Laravel, Metronic</span>
                                                    </td>
                                                    <td class="text-right">
                                                        <span class="label label-lg label-light-success label-inline">Success</span>
                                                    </td>
                                                    <td class="p-0 text-right">
                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-primary">
																					<!--begin::Svg Icon | path:assets/media/svg/icons/General/Settings-1.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<rect x="0" y="0" width="24" height="24" />
																							<path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
																							<path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                                        </a>
                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
																				<span class="svg-icon svg-icon-md svg-icon-primary">
																					<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<rect x="0" y="0" width="24" height="24" />
																							<path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
																							<path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                                        </a>
                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-primary">
																					<!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<rect x="0" y="0" width="24" height="24" />
																							<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
																							<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="p-0 py-4">
                                                        <div class="symbol symbol-50 symbol-light mr-5">
																				<span class="symbol-label">
																					<img src="assets/media/svg/misc/005-bebo.svg" class="h-50 align-self-center" alt="" />
																				</span>
                                                        </div>
                                                    </td>
                                                    <td class="pl-0">
                                                        <a href="#" class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">Beats Studio</a>
                                                        <span class="text-muted font-weight-bold d-block">FTP: bprow@bnc.cc</span>
                                                    </td>
                                                    <td class="text-right pr-0">
                                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$57,000</span>
                                                        <span class="text-muted font-weight-bold">Paid</span>
                                                    </td>
                                                    <td class="text-right">
                                                        <span class="text-muted font-weight-bold">AngularJS, C#</span>
                                                    </td>
                                                    <td class="text-right">
                                                        <span class="label label-lg label-light-danger label-inline">Rejected</span>
                                                    </td>
                                                    <td class="pr-0 text-right">
                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-primary">
																					<!--begin::Svg Icon | path:assets/media/svg/icons/General/Settings-1.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<rect x="0" y="0" width="24" height="24" />
																							<path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
																							<path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                                        </a>
                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
																				<span class="svg-icon svg-icon-md svg-icon-primary">
																					<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<rect x="0" y="0" width="24" height="24" />
																							<path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
																							<path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                                        </a>
                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-primary">
																					<!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<rect x="0" y="0" width="24" height="24" />
																							<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
																							<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="p-0 py-4">
                                                        <div class="symbol symbol-50 symbol-light">
																				<span class="symbol-label">
																					<img src="assets/media/svg/misc/006-plurk.svg" class="h-50 align-self-center" alt="" />
																				</span>
                                                        </div>
                                                    </td>
                                                    <td class="pl-0">
                                                        <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Sant Outstanding</a>
                                                        <div>
                                                            <span class="font-weight-bolder">Email:</span>
                                                            <a class="text-muted font-weight-bold text-hover-primary" href="#">bprow@bnc.cc</a>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$2,000,000</span>
                                                        <span class="text-muted font-weight-bold">Paid</span>
                                                    </td>
                                                    <td class="text-right">
                                                        <span class="text-muted font-weight-bold">ReactJs, HTML</span>
                                                    </td>
                                                    <td class="text-right">
                                                        <span class="label label-lg label-light-primary label-inline">Approved</span>
                                                    </td>
                                                    <td class="pr-0 text-right">
                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-primary">
																					<!--begin::Svg Icon | path:assets/media/svg/icons/General/Settings-1.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<rect x="0" y="0" width="24" height="24" />
																							<path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
																							<path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                                        </a>
                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
																				<span class="svg-icon svg-icon-md svg-icon-primary">
																					<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<rect x="0" y="0" width="24" height="24" />
																							<path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
																							<path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                                        </a>
                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-primary">
																					<!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<rect x="0" y="0" width="24" height="24" />
																							<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
																							<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="p-0 py-4">
                                                        <div class="symbol symbol-50 symbol-light mr-5">
																				<span class="symbol-label">
																					<img src="assets/media/svg/misc/014-kickstarter.svg" class="h-50 align-self-center" alt="" />
																				</span>
                                                        </div>
                                                    </td>
                                                    <td class="pl-0">
                                                        <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">KTR Application</a>
                                                        <span class="text-muted font-weight-bold d-block">
																			<span class="font-weight-bolder text-dark-75">FTP:</span>bprow@bnc.cc</span>
                                                    </td>
                                                    <td class="text-right">
                                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$45,200,000</span>
                                                        <span class="text-muted font-weight-bold">Paid</span>
                                                    </td>
                                                    <td class="text-right">
                                                        <span class="text-muted font-weight-bold">ReactJS, Ruby</span>
                                                    </td>
                                                    <td class="text-right">
                                                        <span class="label label-lg label-light-warning label-inline">In Progress</span>
                                                    </td>
                                                    <td class="p-0 text-right">
                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-primary">
																					<!--begin::Svg Icon | path:assets/media/svg/icons/General/Settings-1.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<rect x="0" y="0" width="24" height="24" />
																							<path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
																							<path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                                        </a>
                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
																				<span class="svg-icon svg-icon-md svg-icon-primary">
																					<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<rect x="0" y="0" width="24" height="24" />
																							<path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
																							<path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                                        </a>
                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-primary">
																					<!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<rect x="0" y="0" width="24" height="24" />
																							<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
																							<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Tap pane-->
                                    <!--begin::Tap pane-->
                                    <div class="tab-pane fade show active" id="kt_tab_pane_12_3" role="tabpanel" aria-labelledby="kt_tab_pane_12_3">
                                        <!--begin::Table-->
                                        <div class="table-responsive">
                                            <table class="table table-borderless table-vertical-center">
                                                <thead>
                                                <tr>
                                                    <th class="p-0 w-50px"></th>
                                                    <th class="p-0 min-w-200px"></th>
                                                    <th class="p-0 min-w-120px"></th>
                                                    <th class="p-0 min-w-120px"></th>
                                                    <th class="p-0 min-w-120px"></th>
                                                    <th class="p-0 min-w-160px"></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td class="p-0 py-4">
                                                        <div class="symbol symbol-50 symbol-light">
																				<span class="symbol-label">
																					<img src="assets/media/svg/misc/006-plurk.svg" class="h-50 align-self-center" alt="" />
																				</span>
                                                        </div>
                                                    </td>
                                                    <td class="pl-0">
                                                        <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Sant Outstanding</a>
                                                        <div>
                                                            <span class="font-weight-bolder">Email:</span>
                                                            <a class="text-muted font-weight-bold text-hover-primary" href="#">bprow@bnc.cc</a>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$2,000,000</span>
                                                        <span class="text-muted font-weight-bold">Paid</span>
                                                    </td>
                                                    <td class="text-right">
                                                        <span class="text-muted font-weight-bold">ReactJs, HTML</span>
                                                    </td>
                                                    <td class="text-right">
                                                        <span class="label label-lg label-light-primary label-inline">Approved</span>
                                                    </td>
                                                    <td class="pr-0 text-right">
                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-primary">
																					<!--begin::Svg Icon | path:assets/media/svg/icons/General/Settings-1.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<rect x="0" y="0" width="24" height="24" />
																							<path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
																							<path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                                        </a>
                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
																				<span class="svg-icon svg-icon-md svg-icon-primary">
																					<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<rect x="0" y="0" width="24" height="24" />
																							<path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
																							<path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                                        </a>
                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-primary">
																					<!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<rect x="0" y="0" width="24" height="24" />
																							<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
																							<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="p-0 py-4">
                                                        <div class="symbol symbol-50 symbol-light mr-5">
																				<span class="symbol-label">
																					<img src="assets/media/svg/misc/015-telegram.svg" class="h-50 align-self-center" alt="" />
																				</span>
                                                        </div>
                                                    </td>
                                                    <td class="pl-0">
                                                        <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Telegram Mobile</a>
                                                        <span class="text-muted font-weight-bold d-block">
																			<span class="font-weight-bolder text-dark-75">FTP:</span>bprow@bnc.cc</span>
                                                    </td>
                                                    <td class="text-right">
                                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$4,600,000</span>
                                                        <span class="text-muted font-weight-bold">Paid</span>
                                                    </td>
                                                    <td class="text-right">
                                                        <span class="text-muted font-weight-bold">Python, MySQL</span>
                                                    </td>
                                                    <td class="text-right">
                                                        <span class="label label-lg label-light-warning label-inline">In Progress</span>
                                                    </td>
                                                    <td class="p-0 text-right">
                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-primary">
																					<!--begin::Svg Icon | path:assets/media/svg/icons/General/Settings-1.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<rect x="0" y="0" width="24" height="24" />
																							<path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
																							<path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                                        </a>
                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
																				<span class="svg-icon svg-icon-md svg-icon-primary">
																					<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<rect x="0" y="0" width="24" height="24" />
																							<path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
																							<path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                                        </a>
                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-primary">
																					<!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<rect x="0" y="0" width="24" height="24" />
																							<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
																							<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="p-0 py-4">
                                                        <div class="symbol symbol-50 symbol-light mr-5">
																				<span class="symbol-label">
																					<img src="assets/media/svg/misc/003-puzzle.svg" class="h-50 align-self-center" alt="" />
																				</span>
                                                        </div>
                                                    </td>
                                                    <td class="pl-0">
                                                        <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Cisco Management</a>
                                                        <span class="text-muted font-weight-bold d-block">
																			<span class="font-weight-bolder text-dark-75">FTP:</span>bprow@bnc.cc</span>
                                                    </td>
                                                    <td class="text-right">
                                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$560,000</span>
                                                        <span class="text-muted font-weight-bold">Paid</span>
                                                    </td>
                                                    <td class="text-right">
                                                        <span class="text-muted font-weight-bold">Laravel, Metronic</span>
                                                    </td>
                                                    <td class="text-right">
                                                        <span class="label label-lg label-light-success label-inline">Success</span>
                                                    </td>
                                                    <td class="p-0 text-right">
                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-primary">
																					<!--begin::Svg Icon | path:assets/media/svg/icons/General/Settings-1.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<rect x="0" y="0" width="24" height="24" />
																							<path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
																							<path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                                        </a>
                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
																				<span class="svg-icon svg-icon-md svg-icon-primary">
																					<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<rect x="0" y="0" width="24" height="24" />
																							<path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
																							<path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                                        </a>
                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-primary">
																					<!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<rect x="0" y="0" width="24" height="24" />
																							<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
																							<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="p-0 py-4">
                                                        <div class="symbol symbol-50 symbol-light mr-5">
																				<span class="symbol-label">
																					<img src="assets/media/svg/misc/005-bebo.svg" class="h-50 align-self-center" alt="" />
																				</span>
                                                        </div>
                                                    </td>
                                                    <td class="pl-0">
                                                        <a href="#" class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">Beats Studio</a>
                                                        <span class="text-muted font-weight-bold d-block">FTP: bprow@bnc.cc</span>
                                                    </td>
                                                    <td class="text-right pr-0">
                                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$57,000</span>
                                                        <span class="text-muted font-weight-bold">Paid</span>
                                                    </td>
                                                    <td class="text-right">
                                                        <span class="text-muted font-weight-bold">AngularJS, C#</span>
                                                    </td>
                                                    <td class="text-right">
                                                        <span class="label label-lg label-light-danger label-inline">Rejected</span>
                                                    </td>
                                                    <td class="pr-0 text-right">
                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-primary">
																					<!--begin::Svg Icon | path:assets/media/svg/icons/General/Settings-1.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<rect x="0" y="0" width="24" height="24" />
																							<path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
																							<path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                                        </a>
                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
																				<span class="svg-icon svg-icon-md svg-icon-primary">
																					<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<rect x="0" y="0" width="24" height="24" />
																							<path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
																							<path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                                        </a>
                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-primary">
																					<!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<rect x="0" y="0" width="24" height="24" />
																							<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
																							<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="p-0 py-4">
                                                        <div class="symbol symbol-50 symbol-light mr-5">
																				<span class="symbol-label">
																					<img src="assets/media/svg/misc/014-kickstarter.svg" class="h-50 align-self-center" alt="" />
																				</span>
                                                        </div>
                                                    </td>
                                                    <td class="pl-0">
                                                        <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">KTR Application</a>
                                                        <span class="text-muted font-weight-bold d-block">
																			<span class="font-weight-bolder text-dark-75">FTP:</span>bprow@bnc.cc</span>
                                                    </td>
                                                    <td class="text-right">
                                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$45,200,000</span>
                                                        <span class="text-muted font-weight-bold">Paid</span>
                                                    </td>
                                                    <td class="text-right">
                                                        <span class="text-muted font-weight-bold">ReactJS, Ruby</span>
                                                    </td>
                                                    <td class="text-right">
                                                        <span class="label label-lg label-light-warning label-inline">In Progress</span>
                                                    </td>
                                                    <td class="p-0 text-right">
                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-primary">
																					<!--begin::Svg Icon | path:assets/media/svg/icons/General/Settings-1.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<rect x="0" y="0" width="24" height="24" />
																							<path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
																							<path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                                        </a>
                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
																				<span class="svg-icon svg-icon-md svg-icon-primary">
																					<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<rect x="0" y="0" width="24" height="24" />
																							<path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
																							<path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                                        </a>
                                                        <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																				<span class="svg-icon svg-icon-md svg-icon-primary">
																					<!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<rect x="0" y="0" width="24" height="24" />
																							<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
																							<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
																						</g>
																					</svg>
                                                                                    <!--end::Svg Icon-->
																				</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Tap pane-->
                                </div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Advance Table Widget 7-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Profile Overview-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>

@endsection


{{-- Scripts Section --}}
@section('scripts')

    <script src="{{ asset('js/pages/custom/profile/profile.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
@endsection
