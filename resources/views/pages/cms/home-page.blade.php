{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
    @if(Auth::user()->hasPermissionTo('view cms'))
        <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">{{ $page_title }}</h3>
        </div>
        <!--begin::Form-->
        <form method="POST" action="{{ route('admin.home-page.update', $homePage->id) }}" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-2 col-form-label">Show featured products block?</label>
                    <div class="col-10 col-form-label">
                        <div class="checkbox-inline">
                            <label class="checkbox">
                                <input type="checkbox" name="show_featured_items" {{ old('show_featured_items') == 'on' || $homePage->show_featured_items == true ? 'checked' : '' }}>
                                <span></span>Featured Products</label>
                        </div>
                        <span class="form-text text-muted">If checked, the featured products block will be displayed on your frontend homepage</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-2 col-form-label">Show parallax block?</label>
                    <div class="col-10 col-form-label">
                        <div class="checkbox-inline">
                            <label class="checkbox">
                                <input type="checkbox" name="show_parallax" {{ old('show_parallax') == 'on' || $homePage->show_parallax == true ? 'checked' : '' }}>
                                <span></span>Parallax</label>
                        </div>
                        <span class="form-text text-muted">If checked, the parallax you create for the home page will be displayed on your frontend home page</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-2 col-form-label">Show daily special block?</label>
                    <div class="col-10 col-form-label">
                        <div class="checkbox-inline">
                            <label class="checkbox">
                                <input type="checkbox"  name="show_daily_special" {{ old('show_daily_special') == 'on' || $homePage->show_daily_special == true ? 'checked' : '' }}>
                                <span></span>Daily special</label>
                        </div>
                        <span class="form-text text-muted">If checked, the daily special block will be displayed on your frontend homepage</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-2 col-form-label">Show subscribe to newsletter block?</label>
                    <div class="col-10 col-form-label">
                        <div class="checkbox-inline">
                            <label class="checkbox">
                                <input type="checkbox"  name="show_subscribe_to_newsletter" {{ old('show_subscribe_to_newsletter') == 'on' || $homePage->show_subscribe_to_newsletter == true ? 'checked' : '' }}>
                                <span></span>Subscribe to newsletter</label>
                        </div>
                        <span class="form-text text-muted">If checked, the subscribe to newsletter block will be displayed on your frontend homepage</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-2 col-form-label">Show best sellers block?</label>
                    <div class="col-10 col-form-label">
                        <div class="checkbox-inline">
                            <label class="checkbox">
                                <input type="checkbox"  name="show_best_sellers" {{ old('show_best_sellers') == 'on' || $homePage->show_best_sellers == true ? 'checked' : '' }}>
                                <span></span>Best sellers</label>
                        </div>
                        <span class="form-text text-muted">If checked, the best sellers block will be displayed on your frontend homepage</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-2 col-form-label">Show blog block?</label>
                    <div class="col-10 col-form-label">
                        <div class="checkbox-inline">
                            <label class="checkbox">
                                <input type="checkbox"  name="show_blog" {{ old('show_blog') == 'on' || $homePage->show_blog == true ? 'checked' : '' }}>
                                <span></span>Blog</label>
                        </div>
                        <span class="form-text text-muted">If checked, the blog block will be displayed on your frontend homepage</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-2 col-form-label">Show Instagram block?</label>
                    <div class="col-10 col-form-label">
                        <div class="checkbox-inline">
                            <label class="checkbox">
                                <input type="checkbox"  name="show_instagram" {{ old('show_instagram') == 'on' || $homePage->show_instagram == true ? 'checked' : '' }}>
                                <span></span>Instagram</label>
                        </div>
                        <span class="form-text text-muted">If checked, the Instagram block will be displayed on your frontend homepage</span>
                    </div>
                </div>

            </div>
            @if(Auth::user()->hasPermissionTo('edit cms'))
                <div class="card-footer">
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-success mr-2">Update</button>
                        </div>
                    </div>
                </div>
            @else
                <div class="card-footer">
                    <div class="row">
                        <div class="col-12">
                            <p>You do not have permission to update the home page, please contact a system administrator if you require permission</p>
                        </div>
                    </div>
                </div>
            @endif
        </form>
    </div>
    @else
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">You do not have permission to view the home page please contact a system admin if you require access</h3>
            </div>
        </div>
    @endif

    @if(Auth::user()->hasPermissionTo('view carousel'))
        <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">{{ $page_title }} Carousel images</h3>
        </div>
        <!--begin::Form-->
        <form method="POST" action="{{ route('admin.home-page.update', $homePage->id) }}" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Position</th>
                        <th>Image</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($homePage->carouselImages()->orderBy('position', 'asc')->get() as $image)
                        <tr>
                            <td>{{ $image->position }}</td>
                            <td>
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($image->image) }}" width="100px">
                            </td>
                            <td>{{ $image->status() }}</td>
                            <td>
                                <span style="overflow: visible; position: relative; width: 125px;">
                                    @if(Auth::user()->hasPermissionTo('edit carousel'))
                                    <a href="{{ route('admin.home-page-carousel-image.edit', $image->id) }}" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit Image">
                                        <span class="svg-icon svg-icon-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "></path>
                                                    <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"></rect>
                                                </g>
                                            </svg>
                                        </span>
                                    </a>
                                    @endif
                                    @if(Auth::user()->hasPermissionTo('delete carousel'))
                                    <a href="{{ route('admin.home-page-carousel-image.delete', $image->id) }}" class="btn btn-sm btn-clean btn-icon" title="Delete Image">
                                        <span class="svg-icon svg-icon-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
                                                    <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
                                                </g>
                                            </svg>
                                        </span>
                                    </a>
                                    @endif
                                </span>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </form>
        @if(Auth::user()->hasPermissionTo('edit carousel'))
            <div class="card-footer">
                <div class="row">
                    <div class="col-10">
                        <a href="{{ route('admin.home-page-carousel-image.create') }}" class="btn btn-success mr-2">Add a new Home Page Carousel Image</a>
                    </div>
                </div>
            </div>
        @else
                <div class="card-footer">
                    <div class="row">
                        <div class="col-10">
                            <p>You do not have permission to create carousel images, if you require peremission please contact a system administrator</p>
                        </div>
                    </div>
                </div>
        @endif
    </div>
    @else
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">You do not have permission to view the home page carousel images please contact a system admin if you require access</h3>
            </div>
        </div>
    @endif


@endsection

{{-- Styles Section --}}
@section('styles')
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection


{{-- Scripts Section --}}
@section('scripts')

@endsection
