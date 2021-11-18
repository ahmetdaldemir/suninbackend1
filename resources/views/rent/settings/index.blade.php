@extends('rent.layouts.light.master')
@section('title', 'Ayarlar - Sunin Turkey')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h2>Ayarlar<span>Listesi </span></h2>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Yönetim</li>
<li class="breadcrumb-item active">Ayarlar</li>
@endsection
  
@section('content')
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>Ayarlar</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('settings/store')}}" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Logo</label>
                                    <input class="form-control" type="file" name="photos">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Favicon</label>
                                    <input class="form-control" type="file" name="favicon">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Telefon</label>
                                    <input class="form-control" type="text" name="phone">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">whatsapp</label>
                                    <input class="form-control" type="text" name="whatsapp">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">email</label>
                                    <input class="form-control" type="text" name="email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">chatscript</label>
                                    <input class="form-control" type="text" name="chatscript">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Google Etiket Yönetimi</label>
                                    <input class="form-control" type="text" name="google_tag_manager">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Google Analytics</label>
                                    <input class="form-control" type="text" name="google_analytics">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Diller (Default)</label>
                                    <select class="form-control" name="languages">
                                        @foreach($languages as $lang)
                                        <option value="{{$lang['id']}}">{{$lang['code']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary nextBtn pull-right" type="submit">Güncelle</button>
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