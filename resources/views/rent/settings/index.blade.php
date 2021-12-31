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
        <div class="col-xl-12 xl-100 col-lg-12 box-col-12">
            <div class="card">
                <form action="{{route('settings/update')}}" method="POST" enctype="multipart/form-data">
                <div class="card-header">
                    <h5 class="pull-left">Ayarlar</h5>
                </div>
                <div class="card-body">
                    <div class="tabbed-card">
                        <ul class="pull-right nav nav-tabs nav-material" id="top-tab" role="tablist">
                            <li class="nav-item"><a class="nav-link active" id="top-home-tab" data-toggle="tab" href="#top-home" role="tab" aria-controls="top-home" aria-selected="false">Genel</a>
                                <div class="material-border"></div>
                            </li>
                            <li class="nav-item"><a class="nav-link" id="profile-top-tab" data-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="true">Firma</a>
                                <div class="material-border"></div>
                            </li>
                            <li class="nav-item"><a class="nav-link" id="contact-top-tab" data-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false">Contact</a>
                                <div class="material-border"></div>
                            </li>
                            <li class="nav-item"><a class="nav-link" id="emails-top-tab" data-toggle="tab" href="#top-emails" role="tab" aria-controls="top-emails" aria-selected="false">E-posta</a>
                                <div class="material-border"></div>
                            </li>
                            <li class="nav-item"><a class="nav-link" id="sms-top-tab" data-toggle="tab" href="#top-sms" role="tab" aria-controls="top-sms" aria-selected="false">SMS</a>
                                <div class="material-border"></div>
                            </li>
                            <li class="nav-item"><a class="nav-link" id="payment-top-tab" data-toggle="tab" href="#top-payment" role="tab" aria-controls="top-payment" aria-selected="false">Ödeme</a>
                                <div class="material-border"></div>
                            </li>
                            <li class="nav-item"><a class="nav-link" id="site-top-tab" data-toggle="tab" href="#top-site" role="tab" aria-controls="top-site" aria-selected="false">Site</a>
                                <div class="material-border"></div>
                            </li>
                        </ul>
                        <div class="tab-content" id="top-tabContent">
                            <div class="tab-pane fade active show" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Logo</label>
                                            <input class="form-control" type="file" name="logo_file">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="col-md-12"><img class="img-thumbnail" src="{{!empty($settings['logo']) ? Storage::url($settings['logo']):Storage::url('noimage-small.jpg')}}" width="120"/></div>
                                            <input name="logo_image" type="hidden" value="{{!empty($settings['logo']) ? $settings['logo']:'noimage-small.jpg'}}" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Favicon</label>
                                            <input class="form-control" type="file" name="favicon_file">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="col-md-12"><img class="img-thumbnail" src="{{!empty($settings['favicon']) ? Storage::url($settings['favicon']):Storage::url('noimage-small.jpg')}}" width="120"/></div>
                                            <input name="favicon_image" type="hidden" value="{{!empty($settings['favicon']) ? $settings['logo']:'noimage-small.jpg'}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Telefon</label>
                                            <input class="form-control" type="text" name="phone" value="{{@$settings['phone']}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">whatsapp</label>
                                            <input class="form-control" type="text" name="whatsapp" value="{{@$settings['whatsapp']}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">facebook</label>
                                            <input class="form-control" type="text" name="facebook" value="{{@$settings['facebook']}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">twitter</label>
                                            <input class="form-control" type="text" name="twitter" value="{{@$settings['twitter']}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">instagram</label>
                                            <input class="form-control" type="text" name="instagram" value="{{@$settings['instagram']}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">email</label>
                                            <input class="form-control" type="text" name="email" value="{{@$settings['email']}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">chatscript</label>
                                            <input class="form-control" type="text" name="chatscript" value="{{@$settings['chatscript']}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Google Etiket Yönetimi</label>
                                            <input class="form-control" type="text" name="google_tag_manager" value="{{@$settings['google_tag_manager']}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Google Analytics</label>
                                            <input class="form-control" type="text" name="google_analytics" value="{{@$settings['google_analytics']}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label">Aktif Diller</label>
                                        <div class="form-group m-checkbox-inline mb-0">
                                            <?php $select = json_decode($settings['languages']);?>
                                            @foreach($languages as $key => $lang)
                                                <div class="checkbox checkbox-dark">
                                                    <input name="language[]" value="{{$lang['id']}}" id="inline-{{$key}}" type="checkbox"{{@$select[$key]==$lang['id'] ? ' checked':null}}>
                                                    <label for="inline-{{$key}}">{{$lang['code']}}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @csrf
                                    <input type="hidden" name="id" value="{{$settings->id}}">
                                </div>
                            </div>
                            <div class="tab-pane fade" id="top-profile" role="tabpanel" aria-labelledby="profile-top-tab">
                                <p>firma bilgileri</p>
                            </div>
                            <div class="tab-pane fade" id="top-contact" role="tabpanel" aria-labelledby="contact-top-tab">
                                <p>iletişim</p>
                            </div>
                            <div class="tab-pane fade" id="top-emails" role="tabpanel" aria-labelledby="emails-top-tab">
                                <p>eposta ayarları</p>
                            </div>
                            <div class="tab-pane fade" id="top-sms" role="tabpanel" aria-labelledby="sms-top-tab">
                                <p>Sms Ayarları</p>
                            </div>
                            <div class="tab-pane fade" id="top-payment" role="tabpanel" aria-labelledby="payment-top-tab">
                                <p>Ödeme ayarları</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary nextBtn pull-right" type="submit">Güncelle</button>
                </div>
                </form>
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
