{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
    @if(Auth::user()->hasPermissionTo('delete blog posts'))
        <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">{{ $page_title }}</h3>
        </div>
        <!--begin::Form-->
        <form method="POST" action="{{ route('admin.blogs.destroy', $blog->id) }}">
            @csrf
            {{ method_field('DELETE') }}
            <div class="card-body">
                <div class="form-group row">
                    <p>You are about to delete the following Blog Post {{ $blog->title }} <br>
                        This Blog Post currently receives {{ $blog->monthlyViews() }} per month. <br>
                        The current value of this Blog Post to your site is {{ $blog->currentScore() }} <br>
                        Deleting this Blog Post will {{ $blog->deletionImpact() }} affect your sites SEO performance.
                    </p>
                    @if($blog->facebookPost)
                    <hr>
                    <p>
                        This blog post was posted to your Facebook page on {{ \Carbon\Carbon::parse($blog->facebookPost->scheduled_time)->format('d-m-Y H:i:s') }} <br>
                        It currently has {{ $blog->facebookPost->currentLikes() }} likes <br>
                        It currently has {{ $blog->facebookPost->currentComments() }} comments <br>

                    </p>
                    @endif
                    <hr>
                    <p>
                        If you continue with the deletion this post will be permanently removed from both your website and Facebook page, this action is not reversable.
                    </p>
                </div>

            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-10">
                        <button type="submit" class="btn btn-success mr-2">Delete</button>
                        <button type="reset" class="btn btn-secondary">Cancel</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @else
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">You do not have permission to delete blog posts please contact a system admin if you require access</h3>
            </div>
        </div>
    @endif


@endsection

{{-- Styles Section --}}
@section('styles')
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection


