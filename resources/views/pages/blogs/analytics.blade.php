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

            <div class="card-body">
                <div class="form-group row">
                    <p>
                        This Blog Post currently receives {{ $blog->monthlyViews() }} per month. <br>
                        The current value of this Blog Post to your site is {{ $blog->currentScore() }}
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
                </div>

            </div>
    </div>
    @else
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">You do not have permission to view the blog posts analytics please contact a system admin if you require access</h3>
            </div>
        </div>
    @endif


@endsection

{{-- Styles Section --}}
@section('styles')
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection


