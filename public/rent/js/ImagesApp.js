$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

images = {
    general: function () {
        $(document).on('click', '.sort-save', function () {
            $.ajax({
                url: '/villa/images/sortSave',
                type: 'POST',
                data: $("form").serialize(),
                success: function (data) {
                    AlertSuccess("İşlem Tamamlandı!")
                }
            })
        })

        $(document).on('click', '.main-image-select', function () {
            let id = $(this).attr('data-id'),image = $(this).attr('data-image')
            $.ajax({
                url: '/villa/images/mainImage',
                type: 'POST',
                data: 'id='+id+'&image='+image,
                success: function (data) {
                    AlertSuccess("İşlem Tamamlandı!")
                }
            })
        })

        $(document).on('click', '.image-remove', function () {
            let id = $(this).attr('data-id'),image = $(this).attr('data-image')
            $.ajax({
                url: '/villa/images/delete',
                type: 'POST',
                data: 'id='+id+'&image='+image,
                success: function (data) {
                    if(data.success){
                        $(".gallery.img_"+id).hide()
                        AlertSuccess(data.success)
                    }
                    AlertWarning(data.error)
                }
            })
        })
    }
};
function AlertWarning(content) {
    swal("Hata!", content, "warning")
}

$(document).ready(function () {
    images.general();
});
function AlertSuccess(content) {
    swal("Bilgi!", content, "success")
}
