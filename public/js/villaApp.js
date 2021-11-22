$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

Order = {
    general: function () {
    },

    handleChoose: function () {


        $('.mailCheck').change(function (e) {
            email_address = $(this);
            email_regex = /(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/i;
            if (!email_regex.test(email_address.val())) {
                $('.mailCheck').addClass('has-cerror');
            } else {
                $('.mailCheck').removeClass('has-cerror');
            }
        });


        $('body').on('change', '.adresUlke', function () {
            var ulkeID = $(this).val();
            //$('.adresUlke').val($(this).val());
            var element = $(this);
            var formData = {};
            formData['id'] = ulkeID;
            formData['action'] = 'getIl';
            $.ajax({
                url: appURL + 'includes/ajax/hotels.php',
                type: 'POST',
                data: formData,
                success: function (data) {
                    if (data != "nothing") {
                        element.closest('.portlet').find('.adresIl').html(data);
                    } else {
                        element.closest('.portlet').find('.adresIl').html('<option value="">' + lang['choose'] + '</option>');
                        element.closest('.portlet').find('.adresIlce').html('<option value="">' + lang['choose'] + '</option>');
                    }
                }
            });
        });

        $('body').on('change', '.adresIl', function () {
            var ilID = $(this).val();
            //$('.adresIl').val($(this).val());
            var element = $(this);
            var formData = {};
            formData['id'] = ilID;
            formData['action'] = 'getIlce';
            $.ajax({
                url: appURL + 'includes/ajax/hotels.php',
                type: 'POST',
                data: formData,
                success: function (data) {
                    if (data != "nothing") {
                        element.closest('.portlet').find('.adresIlce').html(data);
                    } else {
                        element.closest('.portlet').find('.adresIlce').html('<option value="">' + lang['choose'] + '</option>');
                    }
                }
            });
        });

        $('body').on('change', '.faturaType', function () {
            if ($(this).val() == 'kurumsal') {
                $('body').find('#kurumsal').removeClass("hide");
                $('body').find('#bireysel').addClass("hide");
            } else {
                $('body').find('#bireysel').removeClass("hide");
                $('body').find('#kurumsal').addClass("hide");
            }
        });

        $('body').on('click', '.copyCustomer', function () {
            $('.infoFields').find('input[name="fatura_unvan"]').val($('.infoFields').find('input[name="fullname"]').val());
            $('.infoFields').find('textarea[name="fatura_address"]').val($('.infoFields').find('textarea[name="address"]').val());
            $('.infoFields').find('input[name="fatura_tc"]').val($('.infoFields').find('input[name="tc"]').val());

            /*setTimeout(function () {
                il.val(x2).trigger('change');
                setTimeout(function () {
                    ilce.val(x3);
                }, 1000);
            }, 1000);*/

        });

        $('body').on('change', '.checkMeForSingleMale', function () {
            var infoString = $(this).closest('.portlet').find('.infoString').val();
            var room = $(this).closest('.roomEntity');
            var difGender = isNotOnlyMale(room);

            if (!difGender) {

                var formData = {};
                formData['data'] = infoString;
                formData['action'] = 'findSingleMaleStatus';
                $.ajax({
                    url: appURL + 'includes/ajax/misc.php',
                    type: 'POST',
                    data: formData,
                    success: function (data) {
                        if (data == '0') {
                            room.attr('room-status', 'invalid');
                            toastr.error(lang['not_single_male']);
                            $('.makeReservation').addClass('hide');
                        } else {
                            room.attr('room-status', 'valid');
                            $('.makeReservation').removeClass('hide');
                        }
                    }
                });


            }

            if (difGender) {
                room.attr('room-status', 'valid');
                $('.makeReservation').removeClass('hide');
            }

            $('.roomEntity').each(function () {
                var status = $(this).attr('room-status');

                if (status == 'invalid') {
                    toastr.error(lang['not_single_male']);
                    $('.makeReservation').addClass('hide');
                    return false;
                }

            });

        });

    },

    handleFaturaComplete: function () {

        $('body').on('click', '.makeNewFatura', function () {
            $(this).closest('.portlet').find('input, textarea').val("");
            $(this).closest('.portlet').find('select').each(function () {
                $(this).val($(this).find("option:first").val());
                if ($(this).val() != 'kurumsal') {
                    $('.kurumsalInputs').addClass("hide");
                    $('.kurumsalInputs input').attr("readonly", "true");
                    $('.kurumsalTCNO').removeClass("hide");

                }
            });

            $(this).closest('.portlet').find('input, textarea,select').removeAttr("readonly");
        });

        $('body').on('click', '.makeNewCustomer', function () {
            closeOpenInputs('open');
            $('input[name="cust[fname]"]').change();
        });

    },

    handleCustomerSearch: function () {

        $('body').on('click', '.searchCustomer', function () {
            $('#searchCustomerModal').modal("show");
        });

        $('body').on('click', '.sendSearchCustomer', function () {
            var fieldsData = $(this).closest('.searchFields').find('input').serializeObject();
            var formData = {};
            formData['data'] = fieldsData;
            formData['action'] = 'searchCustomer';
            $.ajax({
                url: appURL + 'includes/ajax/order.php',
                type: 'POST',
                data: formData,
                success: function (data) {
                    //alert(data);
                    $('.customerSearchResults').html(data);
                    var person_count = $('#searchCustomerModal .customerSearchResults tbody tr').length;
                    if (person_count == 1) {
                        $('#searchCustomerModal .customerSearchResults tbody tr:eq(0) .chooseCustomer').click();
                    }
                }
            });

        });

        $('body').on('click', '.chooseCustomer', function () {
            var thisJSON = $(this).find('.custJSON').text();
            $('.customerSearchJSON').html(thisJSON);
            $('#searchCustomerModal').modal("hide");
            readCustomerJSON();
            $('input[name="cust[fname]"]').change();

            var name = $('input[name="cust[fname]"]').val();
            var surname = $('input[name="cust[lname]"]').val();
            var phone = $('input[name="cust[telefon]"]').val();
            var email = $('input[name="cust[email]"]').val();
            $('input[name="tran[gidis][persons][1][adsoyad]"]').val(name + ' ' + surname);
            $('input[name="tran[donus][persons][1][adsoyad]"]').val(name + ' ' + surname);
            $('input[name="passenger[0][0][name]"]').val(name);
            $('input[name="passenger[0][0][surname]"]').val(surname);
            $('input[name="passenger[0][0][phone]"]').val(phone);
            $('input[name="passenger[0][0][email]"]').val(email);

        });

        $('body').on('keypress', '#searchCustomerModal .searchFields input', function (e) {
            if (e.which == 13) {
                $('#searchCustomerModal .sendSearchCustomer').trigger('click');
            }
        });


    },

    readCustomerJSON: function () {
        var custData = $.parseJSON($('.customerSearchJSON').text());

        $.each(custData, function (idx, obj) {
            var newid = idx.replace("0", "[") + "]";
            $("input[name='" + newid + "']").val(obj);
            $("textarea[name='" + newid + "']").val(obj);
            $("select[name='" + newid + "']").val(obj);
            if (newid == 'cust[il]' || newid == 'fatura[il]') {
                $("select[name='" + newid + "']").trigger("change");
            }
            if (newid == 'cust[ilce]' || newid == 'fatura[ilce]') {
                setTimeout(function () {
                    $("select[name='" + newid + "']").val(obj);
                }, 300);

            }
            if (newid == 'fatura[type]' && obj == 'kurumsal') {
                $('.kurumsalInputs').removeClass("hide");
                $('.kurumsalTCNO').addClass("hide");
            }
            if (newid == 'fatura[type]' && obj != 'kurumsal') {
                $('.kurumsalInputs').addClass("hide");
                $('.kurumsalTCNO').removeClass("hide");
            }
            $('.tcVal').addClass('fa-check');
            //console.log(newid+' '+obj);
        });

        closeOpenInputs('close');

    },

    closeOpenInputs: function (e) {
        if (e == 'open') {
            $('.customerFaturaDiv').find('input, select, textarea').attr("readonly", false);
            $('.customerFaturaDiv').find('input, textarea').val("");
            $(this).closest('.portlet').find('select').each(function () {
                $(this).val($(this).find("option:first").val());
                if ($(this).val() != 'kurumsal') {
                    $('.kurumsalInputs').addClass("hide");
                    $('.kurumsalTCNO').removeClass("hide");

                }
            });

        }
        if (e == 'close') {
            $('.customerFaturaDiv').find('input, select, textarea').attr("readonly", true);
        }
    },
    whichAPI: function () {
        return $('input[name=api]').val();
    },
    handleReservation: function () {
        let message = ''
        $('body').on('click', '.makeReservation', function () {
            $(this).attr('disabled', 'disabled');
            $('.applyxProdDiscount').each(function () {
                $(this).removeAttr('disabled');
            });
            var inputData = $('.infoFields').find('input,textarea,select').serialize();
            $('.applyxProdDiscount').each(function () {
                $(this).attr('disabled', 'disabled');
            });

            if (Order.handleValidate()) {
                $("html, body").animate({scrollTop: 0}, "slow");
                AlertWarning(lang['fields_should_be_filled_in']);
            } else {
                $.ajax({
                    url: '/card/makeReservation',
                    type: 'POST',
                    data: inputData,
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
                });
            }
        });
    },

    handleValidate: function () {
        var isThereError = false;

        $('.orderFields').find('input[type!="hidden"], textarea, select').each(function () {
            var attr = $(this).attr('readonly');
            if ($(this).val() == '') {
                if ((typeof attr !== typeof undefined && attr !== false) || $(this).hasClass('notReq')) {
                    $(this).removeClass("has-cerror");
                    isThereError = false;
                    if (!$('.tcVal').hasClass('fa-check')) {
                        isThereError = true;
                    }
                } else {
                    $(this).addClass("has-cerror");
                    isThereError = true;
                }

            } else {
                $(this).removeClass("has-cerror");
            }
            //console.log($(this).attr("name")+' : '+isThereError);
            if (isThereError == true) return false;
        });
        return isThereError;
    },

    handleTCNO: function () {

        $('body').on('keyup', '.tcno', function () {
            var ele = $(this);
            var tcno = $(this).val();
            var ktype = $('.kType').val();
            if (tcno.length == 11 && ktype != '2' && !$(this).hasClass('stopValidating')) {
                formData = {};
                formData['fname'] = $('.fname').val();
                formData['bdate'] = $('.bdate').val();
                formData['tcno'] = tcno;
                formData['action'] = 'validateTCNO';
                $.ajax({
                    url: 'includes/ajax/tcno.validation.php',
                    type: 'POST',
                    data: formData,
                    success: function (data) {
                        if (data == 'valid') {
                            $('.tcVal').removeClass("hide fa-warning font-red");
                            $('.tcVal').addClass("fa-check font-green-jungle");
                        }
                        if (data == 'invalid') {
                            $('.tcVal').removeClass("hide fa-check font-green-jungle");
                            $('.tcVal').addClass("fa-warning font-red");
                        }
                    }
                });
            }
        });

        $('body').on('change', '.kType', function () {
            var ktype = $('.kType').val();
            if (ktype == '2') {
                $('.tcVal').removeClass('fa-warning');
                $('.tcVal').addClass('fa-check font-green-jungle');
            }
        });

    },

    initSelect2: function () {

        $('.select2').each(function () {
            var ph = $(this).find("option:first-child").text();
            $(this).select2({
                allowClear: true,
                placeholder: ph,
                width: null
            });
        });

    },

    cloneNames: function () {

        $('body').on('click', '.moveNames', function () {
            var ele = $(this);
            var portlet = ele.closest('.portlet');
            var persons = [];
            portlet.find("input[name*='persons'],select[name*='persons']").each(function () {
                var thisVal = $(this).val();
                var name = $(this).attr('name');
                var namex = name.replace('room', '').replace;
                portlet.nextAll().find('.note').each(function () {
                    console.log($(this));
                    $(this).find("input[name*='" + namex + "'],select[name*='" + namex + "']").val(thisVal);
                });
            });

        });

    },

    isNotOnlyMale: function (room) {

        var genderDif = false;

        room.find('.checkMeForSingleMale').each(function () {

            if ($(this).val() != 'bay') {
                genderDif = true;
            }

        });

        return genderDif;
    },

    xProdDiscount: function () {

        $('body').on('change', '.applyxProdDiscount', function () {
            var fields = $(this).closest('.portlet').find('input, select, textarea').serialize();

            formData = {};
            formData['data'] = fields;
            formData['action'] = 'applyxProdDiscount';
            $.ajax({
                url: appURL + 'includes/ajax/misc.php',
                type: 'POST',
                data: formData,
                success: function (data) {
                    $('.xprodRender').html(data);
                }
            });


        });

    }

};

$(document).ready(function () {
    langLoad.done(function () {
        Order.general();
        Order.cloneNames();
        Order.xProdDiscount();
    });
});
