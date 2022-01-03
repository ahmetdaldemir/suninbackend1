@extends('view_layout')
@section('title', 'Sunin Turkey')

@section('css')
@endsection

@section('style')
@endsection

@section('content')
    <div class="ui layout">
        <div class="ui centered grid container">
            <div class="row become-dashboard-description">
                <div class="ui twelve wide tablet twelve wide computer six wide widescreen six wide large screen column">
                    <div class="typo-header-sq">
                        <h2>{{$page['name']}}</h2>
                    </div>
                    <div class="become-dashboard-inner">
                        <h5></h5>
                        <p>{!! $page['description'] !!}</p>
                    </div>
                </div>
                <div class="ui twelve wide tablet twelve wide computer six wide widescreen six wide large screen column">
                    <div class="image-full-height">
                        <div class="image-wrapper">
                            <div class="image-inner">
                                <img src="{{asset('view/images/host/host_01.jpg')}}" alt="" class="image-sq">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection