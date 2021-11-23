@extends('rent.layouts.light.master')
@section('title', 'Villalar - Sunin Turkey')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('rent/css/prism.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('rent/css/chartist.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('rent/css/date-picker.css')}}">
@endsection

@section('style')
<style>
.detail {display: none;}
.show {display: table-row;}
.table.date td {border-top: 1px solid #f2f4ff;padding: 3px;width: 5px;}
.detail b {padding-top: 12px;}
#villa img {width: 70px;}
</style>
@endsection

@section('breadcrumb-title')
<h2>Vİllalar<span>Listesi </span></h2>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Yönetim</li>
<li class="breadcrumb-item active">Villa Listesi</li>
@endsection
  
@section('content')
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Villa Listesi</h5><span>Tüm <code>Villalar</code> </span>
                </div>
                <div class="table-responsive product-table">
                    <table id="villa" class="table table-border-horizontal">
                        <thead>
                            <tr>
                                <th></th>
                                <th scope="col">Resim</th>
                                <th scope="col">Başlık(seo)</th>
                                <th scope="col">Ücret</th>
                                <th scope="col">Oda</th>
                                <th scope="col">Deposit</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($villa as $result)
                            <tr>
                                <td class="avability" data-id="villa_{{$result['id']}}"> + </td>
                                <td><img src="{{Storage::url($result['image'])}}"></td>
                                <td>
                                    <h6> {{$result['lang'][0]['title']}} ({{$result['lang'][0]['seo']}})</h6><span><b>Tipi: </b>{{$result['type']}}</span>
                                </td>
                                <td>{{$result['clean_price']}}</td>
                                <td class="font-success">{{$result['rooms']}}</td>
                                <td>{{$result['deposit']}}</td>
                                <td>
                                    <a href="{{'/villa/contracts/'.$result['id']}}" class="btn btn-shadow-danger">Kontratlar</a>
                                    <a href="{{'/villa/images/'.$result['id']}}" class="btn btn-shadow-danger">Resimler</a>
                                    <a href="{{'/villa/edit'.'/'.$result['id']}}" class="btn btn-shadow-primary">Düzenle</a>
                                    <a class="btn btn-shadow-warning delete" data-id="{{$result['id']}}">Sil</a>
                                    <!--<button class="btn btn-success btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="">Edit</button>-->
                                </td>
                            </tr>
                            <tr class="detail villa_{{$result['id']}}">
                                <td colspan="7">
                                    <?php
                                    $thisay=date("n");
                                    $avability = array(
                                        '01.12.2021' => 'asdfasfdsf',
                                        '02.12.2021' => 'asdfasfdsf',
                                        '08.01.2022' => 'asdfasfdsf',
                                        '09.01.2022' => 'asdfasfdsf',
                                        '10.01.2022' => 'asdfasfdsf',
                                        '11.01.2022' => 'asdfasfdsf',
                                        '09.12.2022' => 'asdfasfdsf',
                                        '10.12.2022' => 'asdfasfdsf',
                                        '11.12.2022' => 'asdfasfdsf',
                                        '14.02.2022' => 'asdfasfdsf',
                                        '10.02.2022' => 'asdfasfdsf',
                                        '11.02.2022' => 'asdfasfdsf',
                                    );

                                    $ay=date("n");
                                    $gun=date("j");
                                    $today=date("j");
                                    $l=date("l");
                                    $t=date("t");


                                    $time = strtotime(date("Y-m-d"));
/*
                                    $ay=date("n", strtotime("+1 month", $time));
                                    $gun=date("j", strtotime("+1 month", $time));
                                    $today=date("j", strtotime("+1 month", $time));
                                    $l=date("l", strtotime("+1 month", $time));
                                    $t=date("t", strtotime("+1 month", $time));*/
                                    $aylar=array("","Ocak","Şubat","Mart","Nisan","Mayıs","Haziran","Temmuz","Ağustos","Eylül","Ekim","Kasım","Aralık");
                                    $gunler=array("P","S","Ç","P","C","Ct","P");
                                    ?>
                                    <?php for($x=0;$x<12;$x++){ $ay = date("n", strtotime("+".$x." month", $time))?>
                                    <div class="row"><br>
                                        <b><?php echo $aylar[$ay]." ".date("Y")?></b>
                                        <?php
                                        $bir=($gun-1)*24*60*60;
                                        //ayın kaç çektiği bulunuyor
                                        $son=date("t", strtotime("+".$x." month", $time));
                                        //işlem sonu
                                        $basla=1;
                                        $check = $gun;
                                        $doldur=0;//ayın ilk gününe kadar olan sütunlara yazı yazmamak için tanımlanmış değişken
                                        ?>
                                        <table class="table date">
                                            <tr>
                                                <?php for($j=1;$j<=31;$j++){?>
                                                <?php if($basla<=$son){
                                                $date = sprintf("%02s", $basla ).'.'.date("m", strtotime("+".$x." month", $time)).'.'.date("Y", strtotime("+".$x." month", $time));
                                                // echo $date;//@$avability[$date];
                                                ?>
                                                <?php $asd = @$avability[$date];?>
                                                <?php if(@isset($asd)){?>
                                                <?php if($gun!=$basla AND $check!=$basla){?>
                                                <td width='10' style="background:red;" align='center' title="<?=$date?>"><b><div class='style2'><?=$basla?></div></b></td>
                                                <?php }elseif ($today=$basla AND $check!=$basla){?>
                                                <td width='10' style="background:red;" align='center'><b><div class='style3'><?=$basla?></div></b></td>
                                                <?php }elseif ($check=$basla AND $thisay==$ay){?>
                                                <td width='10' style="background:red;" align='center'><b><div class='style3'><a href='index.php?gun=<?=$basla?>&month=<?=$ay?>'><?=$basla?></a></div></b></td>
                                                <?php }else{?>
                                                <td width='10' style="background:red;" align='center'><b><div class='style2'><?=$basla?></div></b></td>
                                                <?php }?>
                                                <?php $basla+=1;$doldur=1;?>
                                                <?php }else{?>
                                                <?php if($gun!=$basla AND $check!=$basla){?>
                                                <td width='10' align='center' title="<?=$date?>"><b><div class='style2'><?=$basla?></div></b></td>
                                                <?php }elseif ($today=$basla AND $check!=$basla){?>
                                                <td width='10' align='center'><b><div class='style3'><?=$basla?></div></b></td>
                                                <?php }elseif ($check=$basla AND $thisay==$ay){?>
                                                <td width='10' align='center'><b><div class='style3'><a href='index.php?gun=<?=$basla?>&month=<?=$ay?>'><?=$basla?></a></div></b></td>
                                                <?php }else{?>
                                                <td width='10' align='center'><b><div class='style2'><?=$basla?></div></b></td>
                                                <?php }?>
                                                <?php $basla+=1;$doldur=1;?>
                                                <?php }?>
                                                <?php }}?>
                                            </tr>
                                        </table>
                                    </div>
                                    <?php }?>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
<script src="{{asset('rent/js/villaApp.js')}}"></script>
@endsection