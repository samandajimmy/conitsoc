jQuery(document).ready(function() {

    $('#uploadBtn').change(function() {
        var val = $('#uploadFile').val();
        $('#file_text').val(val);
    });

    $("#info_user").hover(function() {
        $("#dropdown_info").css("display", "block");
    }, function() {
        $("#dropdown_info").css("display", "none");
    });

    $("#cart").hover(function() {
        $("#cart_info").css("display", "block");
    }, function() {
        $("#cart_info").css("display", "none");
    });

    $("#posting_project").validate({
        invalidHandler: function(e, validator) {
            var errors = validator.numberOfInvalids();
            if (errors) {
                var message = 'Data yang Anda Masukan Tidak Sesuai';
                $("div.error-top span").html(message);
                $("div.error-top").show();
            } else {
                $("div.error-top").hide();
            }
        },
        rules: {
            nama: {
                required: true
            },
            keterangan: {
                required: true
            },
            kategori: {
                required: true
            },
            visibilitas: {
                required: true
            },
            negara: {
                required: true
            },
            provinsi: {
                required: true
            },
            kota: {
                required: true
            },
            perkiraan_anggaran: {
                required: true
            },
            jenis_industri: {
                required: true
            }
        },
        messages: {
            nama: {
                required: 'Isilah nama proyek Anda'
            },
            keterangan: {
                required: 'Isilah keterangan proyek Anda'
            },
            kategori: {
                required: 'Isilah kategori proyek Anda'
            },
            visibilitas: {
                required: 'Isilah visibilitas proyek Anda'
            },
            negara: {
                required: 'Isilah negara Anda berada'
            },
            provinsi: {
                required: 'Isilah provinsi Anda berada'
            },
            kota: {
                required: 'Isilah kota Anda berada'
            },
            perkiraan_anggaran: {
                required: 'Isilah perkiraan anggaran proyek Anda'
            },
            jenis_industri: {
                required: 'Isilah jenis industri proyek Anda'
            }
        },
        wrapper: 'error_box',
        onfocusout: false,
        onkeyup: false
    });



    $("#register").validate({
        invalidHandler: function(e, validator) {
            var errors = validator.numberOfInvalids();
            if (errors) {
                var message = 'Data yang Anda Masukan Tidak Sesuai';
                $("div.error-top span").html(message);
                $("div.error-top").show();
            } else {
                $("div.error-top").hide();
            }
        },
        rules: {
            email: {
                required: true
            },
            password: {
                required: true
            },
            conf_pass: {
                required: true
            },
            nama_jelas: {
                required: true
            },
            no_telepon: {
                required: true
            },
            jenis_kelamin: {
                required: true
            },
            term: {
                required: true
            }
        },
        messages: {
        },
        wrapper: 'error_box',
        onfocusout: false,
        onkeyup: false
    });



    $("#cart-form").validate({
        messages: {
            provinsi1: {
                min: 'choose at least one'
            },
            kota1: {
                min: 'choose at least one'
            },
            provinsi: {
                min: 'choose at least one'
            },
            kota: {
                min: 'choose at least one'
            }
        }
    });

    $("#form_user").validate({
        rules: {
            nama_jelas: {
                required: true,
                minlength: 5
            },
            no_telepon: {
                required: true,
                number: true,
                rangelength: [10, 20]
            },
            alamat: {
                required: true,
                minlength: 40
            },
            provinsi: {
                required: true,
                min: 1
            },
            kota: {
                required: true,
                min: 1
            },
            kode_pos: {
                required: true,
                number: true,
                rangelength: [3, 5]
            },
            jenis_kelamin: {
                required: true
            }
        },
        messages: {
            nama_jelas: {
                required: 'Isilah nama jelas Anda',
                minlegth: 'Isilah minimal 5 huruf nama jelas anda'
            },
            no_telepon: {
                required: 'Isilah nomor telepon atau handphone Anda',
                number: 'Isilah nomor telepon Anda sesuai dengan format',
            },
            alamat: {
                required: 'Isilah alamat Anda secara lengkap',
                minlength: 'Isilah minimal 40 karakter alamat Anda'
            },
            kode_pos: {
                required: 'Isilah kode pos Anda',
                number: 'Isilah kode pos Anda sesuai dengan format',
                rangelength: 'Isilah maksimal 3-5 digit angka kode pos Anda'
            },
            jenis_kelamin: {
                required: 'Pilih jenis kelamin Anda'
            },
            provinsi: {
                required: 'Pilih domisili provinsi Anda',
                min: 'Pilih domisili provinsi Anda'
            },
            kota: {
                required: 'Pilih domisili kota Anda',
                min: 'Pilih domisili kota Anda'
            }
        }
    });
    $("#form_pass").validate({
        rules: {
            password: {
                required: true
            },
            new : {
                required: true
            },
            confirm: {
                required: true,
                equalTo: '#new'
            }
        },
        messages: {
            password: {
                required: 'Isilah password lama Anda'
            },
            new : {
                required: 'Isilah password baru yang Anda inginkan'
            },
            confirm: {
                required: 'Isilah konfirmasi password Anda sesuai dengan password baru yang anda masukkan',
                equalTo: 'Isilah konfirmasi password Anda sesuai dengan password baru yang anda masukkan'
            }
        }
    });

    $('#user_tab a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
    });
    $("#kota").prop("disabled", true);
    if ($('#provinsi1').val() === '0') {
        $("#kota1").prop("disabled", true);
    } else {
        $("#kota1").prop("disabled", false);
    }
    $('#your-addresstab, #other-addresstab').click(function() {
        if ($('#type_address').length) {
            $("#type_address").val("");
            if (!$('#other-address').is(':visible')) {
                $("#type_address").val("1");
                $('.ot_add').attr('required', true);
                $('.cur_add').attr('required', false);
                $('.ot').attr('min', 1);
                $('.cur').attr('min', 0);
            } else {
                $("#type_address").val("0");
                $('.ot_add').attr('required', false);
                $('.cur_add').attr('required', true);
                $('.ot').attr('min', 0);
                $('.cur').attr('min', 1);
            }
        }
    });

    $('#provinsi1').change(function() {
        $("#kota1 > option").remove();
        var id_provinsi = $('#provinsi1').val();
        $.ajax({
            type: "POST",
            url: siteURL + "/page/get_kota_drop/" + id_provinsi, //here we are calling our user controller and get_cities method with the country_id

            success: function(data) {
                if (data) {
                    var isFirst = true;
                    $.each(data, function(id, merk) {
                        var opt = $('<option />');
                        opt.val(id);
                        opt.text(merk);
                        if (isFirst) {
                            opt.attr('selected', true);
                            isFirst = false;
                        }
                        $('#kota1').append(opt);
                    });
                    $('#kota1').prop('disabled', false);
                    if ($('#provinsi1').val() === '0') {
                        $("#kota1").prop("disabled", true);
                    } else {
                        $("#kota1").prop("disabled", false);
                    }
                } else {
                    var opt = $('<option />');
                    opt.val('0');
                    opt.text('- Kota tidak tersedia -');
                    $('#kota1').append(opt);
                    $('#kota1').prop('disabled', true);
                }
            }
        });
    });

    $('#provinsi').change(function() {
        $("#kota > option").remove();
        var id_provinsi = $('#provinsi').val();
        $.ajax({
            type: "POST",
            url: siteURL + "/page/get_kota_drop/" + id_provinsi, //here we are calling our user controller and get_cities method with the country_id

            success: function(data) {
                if (data) {
                    var isFirst = true;
                    $.each(data, function(id, merk) {
                        var opt = $('<option />');
                        opt.val(id);
                        opt.text(merk);
                        if (isFirst) {
                            opt.attr('selected', true);
                            isFirst = false;
                        }
                        $('#kota').append(opt);
                    });
                    $('#kota').prop('disabled', false);
                    if ($('#provinsi').val() === '0') {
                        $("#kota").prop("disabled", true);
                    } else {
                        $("#kota").prop("disabled", false);
                    }
                } else {
                    var opt = $('<option />');
                    opt.val('0');
                    opt.text('- Kota tidak tersedia -');
                    $('#kota').append(opt);
                    $('#kota').prop('disabled', true);
                }
            }
        });
    });

    $('#kota1').change(function() {
        var id_kota = $('#kota1').val();
        $.ajax({
            type: "POST",
            url: siteURL + "/page/get_shipping_tarif/" + id_kota, //here we are calling our user controller and get_cities method with the country_id

            success: function(data) {
                if (data) {
                    if (data['id_shipping'] > 0) {
                        var number = data['tarif'].toString(),
                                dollars = number.split('.')[0],
                                cents = (number.split('.')[1] || '') + '00';
                        dollars = dollars.split('').reverse().join('')
                                .replace(/(\d{3}(?!$))/g, '$1.')
                                .split('').reverse().join('');
                        var tarif = 'Rp. ' + dollars;
                        var tarif_shipping = tarif + ' x ' + data['total_berat'];
                        var total_tarif = data['tarif'] * data['total_berat'];
                        var number = total_tarif.toString(),
                                dollars = number.split('.')[0],
                                cents = (number.split('.')[1] || '') + '00';
                        dollars = dollars.split('').reverse().join('')
                                .replace(/(\d{3}(?!$))/g, '$1.')
                                .split('').reverse().join('');
                        var total_tarifs = 'Rp. ' + dollars;
                        var total_tarifss = parseInt(total_tarif, 10);
                        var shipping_total = data['total_cart'] + total_tarifss;
                        var shipping_totals = shipping_total + parseInt(data['kode_unik'], 10);
                        var number = shipping_totals.toString(),
                                dollars = number.split('.')[0],
                                cents = (number.split('.')[1] || '') + '00';
                        dollars = dollars.split('').reverse().join('')
                                .replace(/(\d{3}(?!$))/g, '$1.')
                                .split('').reverse().join('');
                        var shipping_totalss = 'Rp. ' + dollars;
                        $('#tarif_shipping').html(tarif_shipping);
                        $('#total_tarif').html(total_tarifs);
                        $('#shipping_total').html(shipping_totalss);
                        $('#other_cost').html(total_tarifs);
                        $('#total_biaya').html('<b>' + shipping_totalss + '</b>');
                    } else {
                        alert('kota tujuan belum tersedia dalam sistem');
                    }
                } else {
                    alert(JSON.stringify(data));
                }
            },
            error: function(data) {
                alert(JSON.stringify(data));
            }
        });
    });
    $('#kota').change(function() {
        var id_kota = $('#kota').val();
        $.ajax({
            type: "POST",
            url: siteURL + "/page/get_shipping_tarif/" + id_kota, //here we are calling our user controller and get_cities method with the country_id

            success: function(data) {
                if (data) {
                    if (data['id_shipping'] > 0) {
                        var number = data['tarif'].toString(),
                                dollars = number.split('.')[0],
                                cents = (number.split('.')[1] || '') + '00';
                        dollars = dollars.split('').reverse().join('')
                                .replace(/(\d{3}(?!$))/g, '$1.')
                                .split('').reverse().join('');
                        var tarif = 'Rp. ' + dollars;
                        var tarif_shipping = tarif + ' x ' + data['total_berat'];
                        var total_tarif = data['tarif'] * data['total_berat'];
                        var number = total_tarif.toString(),
                                dollars = number.split('.')[0],
                                cents = (number.split('.')[1] || '') + '00';
                        dollars = dollars.split('').reverse().join('')
                                .replace(/(\d{3}(?!$))/g, '$1.')
                                .split('').reverse().join('');
                        var total_tarifs = 'Rp. ' + dollars;
                        var total_tarifss = parseInt(total_tarif, 10);
                        var shipping_total = data['total_cart'] + total_tarifss;
                        var shipping_totals = shipping_total + parseInt(data['kode_unik'], 10);
                        var number = shipping_totals.toString(),
                                dollars = number.split('.')[0],
                                cents = (number.split('.')[1] || '') + '00';
                        dollars = dollars.split('').reverse().join('')
                                .replace(/(\d{3}(?!$))/g, '$1.')
                                .split('').reverse().join('');
                        var shipping_totalss = 'Rp. ' + dollars;
                        $('#tarif_shipping').html(tarif_shipping);
                        $('#total_tarif').html(total_tarifs);
                        $('#shipping_total').html(shipping_totalss);
                        $('#other_cost').html(total_tarifs);
                        $('#total_biaya').html('<b>' + shipping_totalss + '</b>');
                    } else {
                        alert('kota tujuan belum tersedia dalam sistem');
                    }
                } else {
                    alert(JSON.stringify(data));
                }
            },
            error: function(data) {
                alert(JSON.stringify(data));
            }
        });
    });

    $('.qty').on('blur', function() {
        var jumlah = $(this).val();
        var rowid = $(this).attr('id');
        var id = $(this).attr('data-val');
        var $this = $(this);
        var cartTotal = $(this).parent().next('.cart-total');
        $.post(siteURL + "/page/add_qty", {
            rowid: rowid,
            id: id,
            jumlah: jumlah
        })
                .done(function(data) {
                    if (data['result'] === 'failed') {
                        alert(data['msg']);
                        $this.val(data[rowid]['qty']);
                    } else {
                        var money = "Rp. " + (data[rowid]['subtotal'] + "").replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."); // 43,434
                        var total = "Rp. " + (data['total'] + "").replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."); // 43,434
                        cartTotal.html(money);
                        $('#total_item').html(data['totalitem'] + ' Items');
                        $('#total_berat').html('<b>Weight : ' + data['totalberat'] + ' Kg</b>');
                        $('#total_biaya').html('<b>' + total + '</b>');
                    }
                })
                .fail(function(data) {
                    alert(JSON.stringify(data));
                });
        // do some other stuff here
    });
    $('#ymbottom').click(
            function() {
                if ($(".ym-drop").is(":hidden"))
                    $('.ym-drop').css('display', 'block');
                else {
                    $('.ym-drop').css('display', 'none');
                }
            }
    );

    $('.hot-produk').bxSlider({
        slideWidth: 135,
        minSlides: 2,
        maxSlides: 6,
        moveSlides: 1,
        slideMargin: 1
    });
    $('.produk-detail').bxSlider({
        slideWidth: 370,
        pagerCustom: '#bx-pager',
        controls: false,
        slideMargin: 20
    });

    $('html').click(function() {
        $('#box').slideUp(500);
        //Hide the menus if visible
    });

    $('#user_login, #box').click(function(event) {
        event.stopPropagation();
        $('#box').slideDown(500);
    });



    $('.forgotpass').click(function() {
        $('#forgot_pass_modal').modal('show');
    });
    $(".navbar li").each(function(i, e) {
        $(e).addClass("menu" + i)
    });


    $(window).scroll(function() {

        if ($('#keranjang').length > 0) {
            var length = $('#keranjang').height() - $('.cart-receipt').height() + $('#keranjang').offset().top;
            var scroll = $(this).scrollTop();
            var height = $('.cart-receipt').height() + 'px';
            var width = $('.cart-receipt').width() + 'px';
            if (length > 200) {
                if (scroll < $('#keranjang').offset().top) {

                    $('.cart-receipt').css({
                        'position': 'absolute',
                        'top': '0px',
                        'bottom': 'auto',
                        'width': width
                    });

                } else if (scroll > length - 30) {

                    $('.cart-receipt').css({
                        'position': 'absolute',
                        'bottom': '0',
                        'top': 'auto',
                        'width': width
                    });

                } else {

                    $('.cart-receipt').css({
                        'position': 'fixed',
                        'top': '50px',
                        'height': height,
                        'width': width
                    });

                }
            }
        }
    });


    $('#checkout-btn').click(function() {
        var conf = confirm('Are You Sure ??');
        var id = $(this).attr('data-val');
        if (conf) {
            if (id) {
                window.location = siteURL + '/page/keranjang_beli/' + id + '/checkout';
            } else {
                window.location = siteURL + '/page/login_register/checkout';
            }
        }
    });


});