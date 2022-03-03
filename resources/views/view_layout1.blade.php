<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
          content="Poco admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
          content="admin template, Poco admin template, dashboard template, flat admin template, responsive admin template, web app (Laravel 8)">
    <meta name="author" content="pixelstrap">
    <link rel="shortcut icon" href="{{asset('public/assets/images/favicon.png')}}" type="image/x-icon">

    <link rel="stylesheet" type="text/css" href="{{asset('view/less/base.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('view/less/header.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('view/less/theme.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('view/less/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('view/icon/style.css')}}">
    <link rel="stylesheet" type="text/css"
          href="https://code.jquery.com/ui/1.13.0-rc.3/themes/smoothness/jquery-ui.css">
    <link rel="icon" href="{{asset('view/images/ico/favicon.ico')}}">
    @yield('style')

    <script src="{{asset('view/library/modernizr-custom.js')}}"></script>
    <title>@yield('title')</title>

</head>
<body class="no-transition">
<div id="page-wrapper">
    @include('layout.header',$categories)
    @yield('content')
    @include('layout.footer')
    @include('layout.script')
    @yield('javascript')
    <script>
        /**/
        $(document).ready(function () {
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            $(".twelve").on('click', '.add-wishlist', function () {
                alert("teset");
                let w = $(this).attr('data-id');
                $.ajax({
                    type: "POST",
                    url: "account/wishlist",
                    data: 'w=' + w,
                    success: function (data) {
                        if (data.confirm == 1) {
                            $(this).html('<i class="icon icon-check-22"></i>');
                        } else {
                            $(this).html('<i class="icon icon-add-wishlist"></i>');
                        }
                    }
                });
            });
        });
    </script>
    <script src="{{asset("view/custom/moment.min.js")}}"></script>
    <script src="{{asset("view/custom/jquery.daterangepicker.min.js")}}"></script>
    <script>
        $("#guest").change(function () {
            let data = $('#villaReservation').serialize()
            $.ajax({
                url: '/villaCalculate',
                type: 'POST',
                data: data,
                success: function (data) {
                    console.log(data);
                }
            });
        });

        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}})
        $(document).ready(function () {
            $('#checkoutdate').change(function () {
                let c = $('input[name=checkoutdate]').val()
                alert(c)
            });
            $('#villaReservation').on('click', '.villacheck', function () {
                let data = $('#villaReservation').serialize()
                $.ajax({
                    url: '/villaCheck',
                    type: 'POST',
                    data: data,
                    success: function (data) {
                        if (data.url) {
                            window.location.replace(data.url);
                        } else {
                            alert('Belitilen günlerde müsaitlik bulunmuyor');
                        }
                    }
                });
            });
        });
        var highlightdates = [moment('22.12.2017', 'DD.MM.YYYY'), moment('24.01.2018', 'DD.MM.YYYY')]

        $(document).ready(function () {

            $('#date-range12').dateRangePicker(
                {
                    inline: true,
                    container: '#date-range12-container',
                    alwaysOpen: true,
                    format: 'DD.MM.YYYY',
                    autoApply : true,
                    separator: ' to ',
                    language: 'tr',
                    showTopbar: false,
                    showWeekNumbers: false,
                    extraClass: 'date-range-picker19',
                    monthSelect: true,
                    yearSelect: true,
                    customArrowPrevSymbol: '<a href="#" class="fa-blok fa fa-arrow-circle-left"></a>',
                    customArrowNextSymbol: '<a href="#" class="fa-blok fa fa-arrow-circle-right"></a>',
                    //maxDays: 7,
                    minDays: 3,
                    startDate: moment(),
                    startOfWeek: 'monday',
                    customTopBar: 'Tarih Aralığı Seçiniz',
                    showDateFilter: function (time, date) {
                        var doHighlight = highlightdates.some(function (item) {
                            //alert(item.isSame(moment(time), 'day'))
                            return (item.isSame(moment(time), 'day') && item.isSame(moment(time), 'month') && item.isSame(moment(time), 'year'))
                        })
                        return '<div ' + (doHighlight ? 'class="highlight"' : '') + ' style="padding:0 5px;">' +
                            '<span style="font-weight:bold">' + date + '</span>' +
                            '<div style="opacity:0.3;">$' + Math.round(Math.random() * 999) + '</div>' +
                            '</div>';
                    }, function(start, end, label) {
                        alert(start);
                    }
                });
            $(".month-wrapper").on('click', '.last-date-selected', function () {
                $(".last-date-selected").click(function () {
                    alert($(".first-date-selected").html());
                });
            });
        });
    </script>
</div>
</body>
</html>
