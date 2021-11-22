$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

villa = {
    general: function () {
    },

    villaProcess: function () {
        $('#villa').on('click', '.delete', function () {
            let id = $(this).attr('data-id');
            alert(id)

            /*AlertWarning(lang['fields_should_be_filled_in']);
            $.ajax({
                url: '/card/makeReservation',
                type: 'POST',
                data: 'id='+id,
                success: function (data) {
                    if(data.status==1) {
                        window.location.replace('/sales/payment/'+data.sales_id)
                    }else{
                        $(this).removeAttr('disabled');
                        $.each( data.message, function( key, value ) {
                            message += key + ": " + value + '<br>';
                        });
                        AlertWarning(lang['problem_data_exchange']+'<br><br>'+message)
                    }
                }
            });*/
        });
    },
    avabilitys: function () {
        $('#villa').on('click', '.avability', function(){
            let id = $(this).attr('data-id')
            $('.detail.'+id).toggleClass('show')
        });
    }
};
function AlertWarning(content) {
    swal({
            title: "Hata!",
            text: content,type: 'warning',
            confirmButtonText: "Tamam",
            closeOnConfirm: false
        },
        function () { window.swal.close(this); return true; });
}

$(document).ready(function () {
    villa.general();
    villa.villaProcess();
    villa.avabilitys();
});
