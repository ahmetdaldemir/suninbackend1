$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

contract = {
    selected_villa: {
        villa_id: $('input[name="villa_id"]').val(),
    },
    config: {
        is_active: 1,
        currency: 1,
    },
    general: function () {
        $('.date-picker').daterangepicker({
            singleDatePicker: true,
            orientation: "left",
            autoclose: true,
            showDropdowns: true,
            autoUpdateInput: true,
            locale: {
                format: 'DD-MM-YYYY'
            }
        });
    },
    periodTabIndex: function () {
        let tabindex = 1;
        $('.periods-table tr:first td').each(function (col, el) {
            $('.periods-table').find('tr td:nth-child(' + (col + 1) + ') :input').each(function (j, input) {
                $(input).attr('tabindex', tabindex++);
            });
        });
    },
    periodActions: function () {
        let periodsTable = $('.periods-table')
        // Create Period
        periodsTable.on('click', '.create-period', function () {
            let id = $(this).closest('td').index(),message = '',data = {};
            data.villa_id = contract.selected_villa.villa_id;
            $('.periods-table tr').each(function (i, item) {
                let d = $(item).find('td:eq(' + id + ') :input').serializeArray();
                d.forEach(function (item) {
                    data[item.name] = item.value;
                });
            });

            $.ajax({
                type: 'POST',
                url: '/villa/contracts/create',
                data: data,
                success: function (response) {
                    if (response.success) {
                        let new_id = response.id;
                        $('.periods-table .row-new').each(function (i2, template) {
                            let tri = $(this).closest('tr').index();
                            $(template).clone().insertBefore('.periods-table tr:eq(' + tri + ') .row-template').removeClass('row-new').addClass('dynamic period-' + new_id).data('id', new_id);
                        });

                        // buttons change
                        let buttons_top = $('.periods-table tr:first .row-template').html();
                        let buttons_bottom = $('.periods-table tr:last .row-template').html();
                        $('.periods-table tr:first .period-' + new_id).html(buttons_top);
                        $('.periods-table tr:last .period-' + new_id).html(buttons_bottom);

                        $('.periods-table .period-' + new_id + ' select[name=is_active]').val(data.active);
                        $('.periods-table .period-' + new_id + ' select[name=currency]').val(data.currency);

                        // row new reset form
                        $('.periods-table .row-new :input').val('');
                        $('.periods-table .row-new select').prop("selectedIndex", 0);
                        $('.periods-table .row-new .row-days-multiple a[data-multiple=select]').click();

                        // rates
                        $('.periods-table .row-rate-panel .period-' + new_id).empty();
                        $('.periods-table .row-rate-panel').hide();
                        $('.periods-table .row-rate-panel input').val('');

                        //AlertWarning('Kontrat Eklendi')
                        contract.periodTabIndex();
                    }
                    if (response.warning) {
                        $.each( response.message, function( key, value ) {
                            message += key + ": " + value + '<br>';
                        });
                        //AlertWarning('Sorun oluştu!'+'<br>'+message)
                    }
                }
            });
        });
        // Save Period
        periodsTable.on('click', '.save-period', function () {
            //alert("test");
            console.log(this)
            let id = $(this).data('id'),data = 'id=' + id
            let tdi = $(this).closest('td').index();
            $('.periods-table tr').each(function (i, item) {
                let d = $(item).find('td:eq(' + tdi + ') :input').serialize();
                if (d != '') {
                    data += '&' + d;
                }
            });
            let message = ''
            $.ajax({
                type: 'POST',
                url: '/villa/contracts/update',
                data: data,
                success: function (data) {
                    if (data.success) {
                        AlertSuccess('Kayıt tamamlandı!')
                    } else {
                        $.each( data.message, function( key, value ) {
                            message += key + ": " + value + '<br>';
                        });
                        AlertWarning('test'+'<br>'+message);
                    }
                }
            });
        });
        // Delete Period
        periodsTable.on('click', '.delete-period', function () {
            let id = $(this).closest('td').data('id');
            swal({
                title: 'Uyarı',
                text: 'Periyodu silmek istediğinize emin misiniz?',
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: '/villa/contracts/delete',
                        type: 'POST',
                        data: 'id='+id,
                        dataType: 'json',
                        success: function (data) {
                            if (data.success) {
                                swal("Kontrat Silindi!", {
                                    icon: "success",
                                });
                                swal("İşlem Tamamlandı!", "Silme Başarılı!", "success");
                                $('.periods-table td.period-' + id).fadeOut(200, function () {
                                    $(this).remove();
                                    contract.periodTabIndex();
                                })
                            } else {
                                swal("Uyarı!", "İşlem Başarısız!", "warning");
                            }
                        }
                    });
                } else {
                    swal("Your imaginary file is safe!");
                }
            })
        })
        // Copy Period
        periodsTable.on('click', '.copy-period', function () {
            let id = $(this).closest('td').data('id');
            $.ajax({
                type: 'POST',
                url: '/villa/contracts/copy',
                data: {'id':id},
                success: function (data) {
                    if (data.success) {
                        let new_id = data.id;

                        $('.periods-table .period-' + id).each(function (i2, template) {
                            let tri = $(this).closest('tr').index();
                            $(template).clone().insertAfter('.periods-table tr:eq(' + tri + ') .period-' + id).removeClass('period-' + id).addClass('period-' + new_id).data('id', new_id);
                        });

                        let active_val = $('.periods-table tr:eq(' + contract.config.active + ') .period-' + id).find('select').val();
                        let currency_val = $('.periods-table tr:eq(' + contract.config.currency + ') .period-' + id).find('select').val();
                        $('.periods-table tr:eq(' + contract.config.active + ') .period-' + new_id).find('select').val(active_val);
                        $('.periods-table tr:eq(' + contract.config.currency + ') .period-' + new_id).find('select').val(currency_val);

                        $('.date-picker').datepicker({
                            language: 'en',
                            minDate: new Date()
                        })
                        //AlertSuccess(lang['period_copied']);
                        contract.periodTabIndex();
                    } else {
                        //(lang['problem_data_exchange']);
                    }
                }
            })

        })
    },
    periodView: function (id) {// Period View
        $.ajax({
            url: '/villa/contracts/show',
            type: 'POST',
            data: 'id='+id,
            dataType: 'json',
            success: function (data) {
                if (data.success) {
                    contract.selected_villa.id = id;

                    $('.periods-table .dynamic').remove();
                    $(data.data).each(function (i, item) {
                        let tdi = 0,startDate = moment(item.startDate).format('YYYY-MM-DD');
                        $('.periods-table .row-template').each(function (i2, template) {
                            let tri = $(this).closest('tr').index();
                            tdi = $(template).clone().insertBefore('.periods-table tr:eq(' + tri + ') .row-template').removeClass('row-template').addClass('dynamic period-' + item.id).data('id', item.id).index();
                        });
                        $('.periods-table tr').each(function (i3, tr) {
                            $(Object.keys(item)).each(function (i3, prop) {

                                if (prop != 'startDate' && prop != 'finishDate') {
                                    $(tr).find('td:eq(' + tdi + ') [name="' + prop + '"]').val(item[prop]);
                                }else{
                                    $(tr).find('td:eq(' + tdi + ') [name="startDate"]').val(moment(item.startDate).format('DD-MM-YYYY'));
                                    $(tr).find('td:eq(' + tdi + ') [name="finishDate"]').val(moment(item.finishDate).format('DD-MM-YYYY'));
                                }
                                $(tr).find('td:eq(' + tdi + ') .save-period').attr('data-id', item.id);
                                $(tr).find('td:eq(' + tdi + ') .copy-period').attr('data-id', item.id);
                                $(tr).find('td:eq(' + tdi + ') .delete-period').attr('data-id', item.id);
                                $('.date-picker').daterangepicker({
                                    singleDatePicker: true,
                                    orientation: "left",
                                    autoclose: true,
                                    showDropdowns: true,
                                    autoUpdateInput: true,
                                    locale: {
                                        format: 'DD-MM-YYYY'
                                    }
                                });
                            });
                        });
                    });

                    contract.periodActions();
                    contract.periodTabIndex();
                }
            }
        });
    },
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
