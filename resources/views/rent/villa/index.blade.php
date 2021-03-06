@extends('rent.layouts.light.master')
@section('title', 'Villalar - Sunin Turkey')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('rent/css/prism.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('rent/css/chartist.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('rent/css/date-picker.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('rent/css/datatables.css')}}">
@endsection

@section('style')
<style>
.detail {display: none;}
.show {display: table-row;}
.table.date td {border-top: 1px solid #f2f4ff;padding: 3px;}
#villa img {width: 70px;}
.style2,.style3,.full{float: left;padding: 3px 7px;width: 35px;border: 1px solid #CCC;text-align: center;font-size: 12px;}
.style2:hover, .style3:hover {background: gray;cursor: pointer;}
.full {border-right: none;border-left: none;color: #ff9292;}
.full + .full{border-right:none;border-left:none;}
td.month {line-height: 30px;width: 115px;text-align: right;}
td.month b {display: block;text-align: right;}
td.space {width: 70px;}
.table.date tr:hover {background: #f9f9f9;}
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
                    <table id="villa" class="table table-border-horizontal ">
                        <thead>
                            <tr>
                                <th colspan="6"></th>
                                <th colspan="2"><input type="text" id="search" class="form-control" placeholder="Aranacak Kelime"></th>
                            </tr>
                        </thead>
                        <thead>
                            <tr>
                                <th></th>
                                <th scope="col">Resim</th>
                                <th scope="col">Başlık(slug)</th>
                                <th scope="col">Ücret</th>
                                <th scope="col">Oda</th>
                                <th scope="col">Deposit</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($villa as $result)
                            <tr>
                                <td class="avability" data-id="villa_{{$result['id']}}"> + </td>
                                <td><img src="{{Storage::url($result['image'])}}"></td>
                                <td>
                                    <h6> {{@$result['lang'][0]['title']}} ({{@$result['lang'][0]['slug']}})</h6><span><b>Tipi: </b>{{$result['type']}}</span>
                                </td>
                                <td>{{$result['clean_price']}}</td>
                                <td class="font-success">{{$result['rooms']}}</td>
                                <td>{{$result['deposit']}}</td>
                                <td>
                                    <!--<a title="Anasayfa Modülü"><i class="fa fa-circle-o"></i></a>
                                    <a title="Ürünler Modülü"><i class="fa fa-check-circle-o"></i></a>
                                    <a title="Favori Villalar Mofülü"><i class="fa fa-circle-o"></i></a>-->
                                </td>
                                <td>
                                    <a href="{{'/villa/contracts/'.$result['id']}}" class="btn btn-shadow-danger">Kontratlar</a>
                                    <a href="{{'/villa/images/'.$result['id']}}" class="btn btn-shadow-danger">Resimler</a>
                                    <a href="{{'/villa/edit'.'/'.$result['id']}}" class="btn btn-shadow-primary">Düzenle</a>
                                    <a class="btn btn-shadow-warning delete" data-id="{{$result['id']}}">Sil</a>
                                    <!--<button class="btn btn-success btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="">Edit</button>-->
                                </td>
                            </tr>
                            <tr class="detail villa_{{$result['id']}}">
                                <td colspan="8">
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
                                    $aylar=array("","Ocak","Şubat","Mart","Nisan","Mayıs","Haziran","Temmuz","Ağustos","Eylül","Ekim","Kasım","Aralık");
                                    $gunler=array("P","S","Ç","P","C","Ct","P");
                                    ?>
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table class="table date">
                                            <?php for($x=0;$x<12;$x++){ $ay = date("n", strtotime("+".$x." month", $time));$yil = date("Y", strtotime("+".$x." month", $time));?>
                                                <?php
                                                $bir=($gun-1)*24*60*60;
                                                //ayın kaç çektiği bulunuyor
                                                $son=date("t", strtotime("+".$x." month", $time));
                                                //işlem sonu
                                                $basla=1;
                                                $check = $gun;
                                                $doldur=0;//ayın ilk gününe kadar olan sütunlara yazı yazmamak için tanımlanmış değişken
                                                ?>
                                                    <tr>
                                                        <td class="space"></td>
                                                        <td class="month"><b><?php echo $aylar[$ay]." ".$yil?></b></td>
                                                        <td>
                                                        <?php for($j=1;$j<=31;$j++){?>
                                                        <?php if($basla<=$son){
                                                        $date = sprintf("%02s", $basla ).'.'.date("m", strtotime("+".$x." month", $time)).'.'.date("Y", strtotime("+".$x." month", $time));
                                                        ?>
                                                        <?php $asd = @$avability[$date];?>
                                                        <?php if(@isset($asd)){?>
                                                        <?php if($gun!=$basla AND $check!=$basla){?>
                                                        <div class='full' style="background:red;"><?=$basla?></div>
                                                        <?php }elseif ($today=$basla AND $check!=$basla){?>
                                                        <div class='style3' style="background:red;"><?=$basla?></div>
                                                        <?php }elseif ($check=$basla AND $thisay==$ay){?>
                                                        <div class='style3' style="background:red;"><a href='index.php?gun=<?=$basla?>&month=<?=$ay?>'><?=$basla?></a></div>
                                                        <?php }else{?>
                                                        <div class='full' style="background:red;"><?=$basla?></div>
                                                        <?php }?>
                                                        <?php $basla+=1;$doldur=1;?>
                                                        <?php }else{?>
                                                        <?php if($gun!=$basla AND $check!=$basla){?>
                                                        <div class='style2' title="<?=$date?>"><?=$basla?></div>
                                                        <?php }elseif ($today=$basla AND $check!=$basla){?>
                                                        <div class='style3'><?=$basla?></div>
                                                        <?php }elseif ($check=$basla AND $thisay==$ay){?>
                                                        <div class='style3'><a href='index.php?gun=<?=$basla?>&month=<?=$ay?>'><?=$basla?></a></div>
                                                        <?php }else{?>
                                                        <div class='style2'><?=$basla?></div>
                                                        <?php }?>
                                                        <?php $basla+=1;$doldur=1;?>
                                                        <?php }?>
                                                        <?php }}?>
                                                        </td>
                                                    </tr>
                                            <?php }?>
                                            </table>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div id="sayfalama"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->
@endsection
@section('script')
    <!-- Plugins JS start-->
    <script src="{{asset('rent/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <!-- Plugins JS Ends-->
<script src="{{asset('rent/js/typeahead/handlebars.js')}}"></script>
<script src="{{asset('rent/js/typeahead/typeahead.bundle.js')}}"></script>
<script src="{{asset('rent/js/typeahead/typeahead.custom.js')}}"></script>
<script src="{{asset('rent/js/typeahead-search/handlebars.js')}}"></script>
<script src="{{asset('rent/js/typeahead-search/typeahead-custom.js')}}"></script>
<script src="{{asset('rent/js/counter/jquery.counterup.min.js')}}"></script>
<script src="{{asset('rent/js/counter/counter-custom.js')}}"></script>
<script src="{{asset('rent/js/notify/bootstrap-notify.min.js')}}"></script>
<script src="{{asset('rent/js/villaApp.js')}}"></script>
<script>
var $rows = $('#villa tbody tr');
$('#search').keyup(debounce(function() {
    var val = '^(?=.*\\b' + $.trim($(this).val()).split(/\s+/).join('\\b)(?=.*\\b') + ').*$',
        reg = RegExp(val, 'i'),
        text;

    $rows.show().filter(function() {
        text = $(this).text().replace(/\s+/g, ' ');
        return !reg.test(text);
    }).hide();
}, 300));

function debounce(func, wait, immediate) {
    var timeout;
    return function() {
        var context = this,
            args = arguments;
        var later = function() {
            timeout = null;
            if (!immediate) func.apply(context, args);
        };
        var callNow = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
        if (callNow) func.apply(context, args);
    };
};
/*
// toplam li sayısı
var rows = 24;//$("#villa tr:odd").size();

// sayfa veri sayısı
var items = 7;

// Sayfalamayı uygula
$("#villa tbody tr:gt(" + (items - 1) + ")").hide();

// sayfa sayısı bulalım
var sayfaSayisi = Math.round(rows / items);

// sayıyı yuvarlayalım
// Sayfa linklerini ekleyelim
for (var i = 1; i <= sayfaSayisi; i++)
{
   $("#sayfalama").append('<a href="javascript:void(0)">' + i + '< /a>');
}

// İlk sayfaya aktif classı ekle
$("#sayfalama a:first").addClass("aktif");

// Sayfalama içindeki a'lardan birine tıklandığında
$(document.body).on("click", "#sayfalama a", function(){
   // indis değerini al (1 fazlası şeklinde)
   var indis = $(this).index() + 1;
   // toplam gözüken veri sayısını bul
   var gt = items * indis;
   // aktif class işlemleri
   $("#sayfalama a").removeClass("aktif");
   $(this).addClass("aktif");
   // listedeki tüm lileri gizle
   $("#villa tbody tr").hide();
   // for ile toplam gözüken veri sayısı - veriSayisi işlemi yap ve veriSayisi kadarını göster
   for (i = gt - items; i < gt; i++)
   {
       $("#villa tbody tr:eq(" + i + ")").show();
   }
});

$(document).ready(function() {
$('#villa').DataTable({
columnDefs: [ {
targets: [ 0 ],
orderData: [ 0, 1 ]
}, {
targets: [ 1 ],
orderData: [ 1, 0 ]
}, {
targets: [ 4 ],
orderData: [ 4, 0 ]
} ]
});
});*/
</script>
@endsection