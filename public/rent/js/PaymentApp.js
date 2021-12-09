$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

payment = {
    general: function () {
    },

    paymentProcess: function () {
        $('#villa').on('click', '.check', function () {
            let id = $(this).attr('data-id');
            //alert(id)
            $.ajax({
                url: '/reservation/store',
                type: 'POST',
                data: $("#InformationForm_"+id).serialize(),
                success: function (data) {
                    //alert('satış başarılı')
                    window.location.replace('/reservation/payment/'+data.id);
                }
            });
        });
    },
    selected: function () {
        $('#villa').on('click', '.selected', function(){
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
function AlertSuccess(content) {
    swal("Bilgi!", "İşlem Tamamlandı!", "success")
}

$(document).ready(function () {
    payment.general();
    payment.paymentProcess();
    payment.selected();
});
