@extends('rent.layouts.light.master')
@section('title', 'Roller - Sunin Turkey')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h2>Roller<span> </span></h2>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Yönetim</li>
    <li class="breadcrumb-item active">Roller</li>
@endsection

@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5>{{!$update ? 'İzin Ekle':'İzin Düzenle'}}</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{url('users/rolesadd')}}">
                            @csrf
                            <input type="hidden" name="user_id" value="{{$user['id']}}">
                            <div class="form-group m-t-15 m-checkbox-inline mb-0">
                                @foreach ($permissions as $permission)
                                    <div class="checkbox checkbox-dark">
                                        <input id="inline-{{$permission->id}}" value="{{$permission->id}}" name="permissions[]" type="checkbox">
                                        <label for="inline-{{$permission->id}}">{{$permission->name}}</label>
                                    </div>
                                @endforeach
                            </div>
                            <button class="btn btn-primary nextBtn pull-right" type="submit">{{!$update ? 'Kaydet':'Güncelle'}}</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection
@section('script')
    <script src="{{asset('rent/js/typeahead/handlebars.js')}}"></script>
    <script src="{{asset('rent/js/typeahead/typeahead.bundle.js')}}"></script>
    <script src="{{asset('rent/js/typeahead/typeahead.custom.js')}}"></script>
    <script src="{{asset('rent/js/typeahead-search/handlebars.js')}}"></script>
    <script src="{{asset('rent/js/typeahead-search/typeahead-custom.js')}}"></script>
    <script src="{{asset('rent/js/counter/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('rent/js/counter/counter-custom.js')}}"></script>
    <script src="{{asset('rent/js/notify/bootstrap-notify.min.js')}}"></script>
    <script src="{{asset('rent/js/editor/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('rent/js/editor/ckeditor/styles.js')}}"></script>
    <script src="{{asset('rent/js/editor/ckeditor/adapters/jquery.js')}}"></script>
    <script src="{{asset('rent/js/editor/ckeditor/ckeditor.custom.js')}}"></script>
    <script src="{{asset('rent/js/blogApp.js')}}"></script>
    <script>
        $(".editor").each(function () {
            let id = $(this).attr('id');
            CKEDITOR.replace(id, {
                toolbar: [{
                    name: 'clipboard',
                    items: ['Undo', 'Redo']
                },
                    {
                        name: 'styles',
                        items: ['Styles', 'Format']
                    },
                    {
                        name: 'basicstyles',
                        items: ['Bold', 'Italic', 'Strike', '-', 'RemoveFormat']
                    },
                    {
                        name: 'paragraph',
                        items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote']
                    },
                    {
                        name: 'links',
                        items: ['Link', 'Unlink']
                    },
                    {
                        name: 'tools',
                        items: ['Maximize']
                    },
                    {
                        name: 'editing',
                        items: ['Scayt']
                    }
                ],
            });
        });
    </script>
@endsection