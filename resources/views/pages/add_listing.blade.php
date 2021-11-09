@extends('view_layout')
@section('title', 'Sunin Turkey')

@section('css')
@endsection

@section('style')
@endsection

@section('content')


    <div class="add-listing-content">
        <div class="ui grid container">
            <div class="row">
                <div class="ui six wide computer twelve wide tablet column">
                    <h3 class="complete-sq title-sq">The Space</h3>

                    <p class="description-sq">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur
                        faucibus magna vel ex semper, in pharetra justo pulvinar. </p>

                    <div class="div-c">
                        <div class="divided-column">
                            <label>Property</label>
                            <select class="dropdown">
                                <option value="0">Apartment</option>
                                <option value="1">House</option>
                                <option value="2">Vacation House</option>
                                <option value="2">Bed &amp; Breakfast</option>
                            </select>
                        </div>
                    </div>

                    <div class="div-c inline-2">
                        <div class="divided-column">
                            <label>Room Type</label>
                            <select class="dropdown">
                                <option value="0">Entire Room</option>
                                <option value="1">Shared Room</option>
                                <option value="2">Private Room</option>
                            </select>
                        </div>

                        <div class="divided-column">
                            <label>Max number of guests</label>
                            <select class="dropdown">
                                <option value="0">1</option>
                                <option value="1">2</option>
                                <option value="2">3</option>
                                <option value="3">4</option>
                                <option value="4">5</option>
                                <option value="5">6</option>
                                <option value="6">7</option>
                                <option value="7">8</option>
                                <option value="8">9</option>
                                <option value="9">10</option>
                            </select>
                        </div>
                    </div>

                    <hr>

                    <div class="div-c inline-3">
                        <div class="divided-column">
                            <label>Bedrooms</label>
                            <select class="dropdown">
                                <option value="0">1</option>
                                <option value="1">2</option>
                                <option value="2">3</option>
                                <option value="3">4</option>
                                <option value="4">5</option>
                                <option value="5">6</option>
                                <option value="6">7</option>
                                <option value="7">8</option>
                                <option value="8">9</option>
                                <option value="9">10</option>
                            </select>
                        </div>

                        <div class="divided-column">
                            <label>Number of beds</label>
                            <select class="dropdown">
                                <option value="0">1</option>
                                <option value="1">2</option>
                                <option value="2">3</option>
                                <option value="3">4</option>
                                <option value="4">5</option>
                                <option value="5">6</option>
                                <option value="6">7</option>
                                <option value="7">8</option>
                                <option value="8">9</option>
                                <option value="9">10</option>
                            </select>
                        </div>

                        <div class="divided-column">
                            <label>Bathrooms</label>
                            <select class="dropdown">
                                <option value="0">1</option>
                                <option value="1">2</option>
                                <option value="2">3</option>
                                <option value="3">4</option>
                                <option value="4">5</option>
                                <option value="5">6</option>
                                <option value="6">7</option>
                                <option value="7">8</option>
                                <option value="8">9</option>
                                <option value="9">10</option>
                            </select>
                        </div>
                    </div>


                </div>

                <div class="ui six wide computer twelve wide tablet column">
                    <div class="image-full-height">
                        <div class="image-wrapper">
                            <div class="image-inner">
                                <img src="{{asset('view/images/host/host_05.jpg')}}" alt="" class="image-sq">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="add-listing-footer">
        <div class="ui grid container">
            <div class="row">
                <div class="ui column">
                    <a class="button-sq link-sq" href="#">
                        <i class="icon icon-slim-arrow-left"></i><span>back</span>
                    </a>

                    <div class="basic-progressbar dashboard-progressbar-sq">
                        <div class="inner" data-percentage="17%" style="width:17%"></div>
                    </div>

                    <a class="button-sq next-sq" href="#"><i
                                class="icon icon-slim-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection
