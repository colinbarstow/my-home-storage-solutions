{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
    @if(Auth::user()->hasPermissionTo('view facebook blog posts'))
        <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">{{ $page_title }}
                    <div class="text-muted pt-2 font-size-sm">{{ $page_description }}</div>
                </h3>
            </div>
        </div>

        <div class="card-body">

            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Blog Title</th>
                    <th>Image</th>
                    <th>Likes</th>
                    <th>Comments</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($blogs as $blog)
                        <tr>
                            <td>{{ $blog->blog->title }}</td>
                            <td><img src="{{ \Illuminate\Support\Facades\Storage::url($blog->blog->image) }}" width="50px"></td>
                            <td>{{ $blog->currentLikes() }}</td>
                            <td>{{ $blog->currentComments() }}</td>
                            <td>
                                <span style="overflow: visible; position: relative; width: 125px;">
                                    <div class="dropdown dropdown-inline">
                                        <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2" data-toggle="dropdown">
                                            <span class="svg-icon svg-icon-md">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"></path>
                                                    </g>
                                                </svg>
                                            </span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                            <ul class="navi flex-column navi-hover py-2">
                                                <li class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2">
                                                    Choose an action:
                                                </li>
                                                @if($blog->facebookPost)
                                                    @if($blog->facebookPost->isActive)
                                                        <li class="navi-item">
                                                            <a href="{{ $blog->facebookPost->url }}" target="_blank" class="navi-link">
                                                                <span class="navi-icon"><i class="la la-eye"></i></span>
                                                                <span class="navi-text">View on Facebook</span>
                                                            </a>
                                                        </li>
                                                    @endif
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    @if(Auth::user()->hasPermissionTo('delete facebook blog posts'))
                                    <form method="POST" action="{{ route('admin.facebook-posts.destroy', $blog->id) }}" class="btn btn-sm btn-clean btn-icon" title="Delete blog post">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="button" class="btn btn-sm btn-clean btn-icon" title="Delete blog post">
                                            <span class="svg-icon svg-icon-md">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
                                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
                                                    </g>
                                                </svg>
                                            </span>
                                        </button>
                                    </form>
                                    @endif
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>
    @else
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">You do not have permission to view Facebook blog posts please contact a system admin if you require access</h3>
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
    {{-- vendors --}}
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>

    {{-- page scripts --}}
    <script src="{{ asset('js/pages/crud/datatables/basic/basic.js') }}" type="text/javascript"></script>
@endsection
