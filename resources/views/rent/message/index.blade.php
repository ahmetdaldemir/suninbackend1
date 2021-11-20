@extends('rent.layouts.light.master')
@section('title', 'Mesajlar - Sunin Turkey')

@section('css')
@endsection

@section('style')
<style>
.call-chat-sidebar .card .card-body, .chat-body .card .card-body {padding: 15px;max-height: 730px;overflow: auto;}
.status-circle {left: 0;}
.chat-box .people-list ul li {cursor:pointer;}
.chat-box .people-list ul li:hover,.chat-box .people-list ul li.read {
    background-color: #EEE;
}
</style>
@endsection

@section('breadcrumb-title')
<h2>Mesajlar<span> </span></h2>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Yönetim</li>
<li class="breadcrumb-item active">Mesajlar</li>
@endsection
  
@section('content')
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <div class="col call-chat-sidebar col-sm-12">
            <div class="card">
                <div class="card-body chat-body custom-scrollbar">
                    <div class="chat-box">
                        <!-- Chat left side Start-->
                        <div class="chat-left-aside">
                            <div class="people-list" id="people-list">
                                <ul class="list">
                                    @foreach($messages as $message)
                                    <li class="open clearfix{{$message->is_read ? '':' read'}}" data-id="{{$message->id}}" data-email="{{$message->id}}" data-phone="{{$message->id}}" data-comment="{{$message->id}}">
                                        <div class="status-circle away"></div>
                                        <div class="about">
                                            <div class="name">{{$message->fullName}}</div>
                                            <div class="status">{{$message->subject}}</div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- Chat left side Ends-->
                    </div>
                </div>
            </div>
        </div>
        <div class="col call-chat-body">
            <div class="card">
                <div class="card-body p-0">
                    <div class="row chat-box">
                        <!-- Chat right side start-->
                        <div class="col pr-0 chat-right-aside">
                            <!-- chat start-->
                            <div class="chat">
                                <!-- chat-header start-->
                                <div class="chat-header clearfix">
                                    <div class="about">
                                        <div class="name"></div><span class="font-primary f-12">Typing...</span>
                                        <div class="status digits">Last Seen 3:55 PM</div>
                                    </div>
                                    <ul class="list-inline float-left float-sm-right chat-menu-icons">
                                        <li class="list-inline-item"><a href="#"><i class="icon-trash"></i></a></li>
                                    </ul>
                                </div>
                                <!-- chat-header end-->
                                <div class="chat-history chat-msg-box custom-scrollbar">
                                    <ul>
                                        <li class="clearfix">
                                            <div class="message other-message pull-right">
                                                <div class="message-data"><span class="message-data-time">10:14 am</span></div>
                                                Well I am not sure. The rest of the team is not here yet. Maybe in an hour or so?
                                            </div>
                                        </li>
                                        <li>
                                            <div class="message my-message">
                                                <div class="message-data text-right"><span class="message-data-time">10:12 am</span></div>
                                                Are we meeting today? Project has been already finished and I have results to show you.
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- end chat-history-->
                                <div class="chat-message clearfix">
                                    <div class="row">
                                        <div class="col-xl-12 d-flex">
                                            <div class="smiley-box bg-primary">
                                                <div class="picker"></div>
                                            </div>
                                            <div class="input-group text-box">
                                                <input class="form-control input-txt-bx" id="message-to-send" type="text" name="message-to-send" placeholder="Type a message......">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" type="button">SEND</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end chat-message-->
                                <!-- chat end-->
                                <!-- Chat right side ends-->
                            </div>
                        </div>
                    </div>
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
<script src="{{asset('rent/js/MessageApp.js')}}"></script>
@endsection