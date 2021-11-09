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
                        <h2>İletişim</h2>
                    </div>

                    <div class="become-dashboard-inner">
                        <div class="div-c">
                            <div class="divided-column">
                                <label>First Name</label>
                                <input type="text" placeholder="" value="Emma">
                            </div>

                            <div class="divided-column">
                                <label>Last Name</label>
                                <input type="text" placeholder="" value="Cruz">
                            </div>

                            <div class="divided-column">
                                <label>Vendor Name</label>
                                <input type="text" placeholder="" value="Emma">
                            </div>
                            <div class="button-sq fullwidth-sq">Sign Up</div>
                        </div>
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
            <div class="row become-dashboard-description">
                <div class="ui foyr wide tablet four wide computer column">
                    <div class="ui twelve wide tablet twelve wide computer twelve wide widescreen twelve wide large screen column">
                        <h3 class="complete-sq title-sq">Adres 1</h3>
                    </div>
                    <div class="ui twelve wide tablet eight wide computer eight wide widescreen eight wide large screen column">

                        <p class="description-sq">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur faucibus magna vel ex semper, in pharetra justo pulvinar. </p>

                    </div>
                </div>
                <div class="ui four wide tablet four wide computer column">
                    <div class="ui twelve wide tablet twelve wide computer twelve wide widescreen twelve wide large screen column">
                        <h3 class="complete-sq title-sq">Adres 2</h3>
                    </div>
                    <div class="ui twelve wide tablet eight wide computer eight wide widescreen eight wide large screen column">

                        <p class="description-sq">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur faucibus magna vel ex semper, in pharetra justo pulvinar. </p>

                    </div>
                </div>
                <div class="ui four wide tablet four wide computer column">
                    <div class="ui twelve wide tablet twelve wide computer twelve wide widescreen twelve wide large screen column">
                        <h3 class="complete-sq title-sq">Adres 3</h3>
                    </div>
                    <div class="ui twelve wide tablet eight wide computer eight wide widescreen eight wide large screen column">

                        <p class="description-sq">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur faucibus magna vel ex semper, in pharetra justo pulvinar. </p>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
