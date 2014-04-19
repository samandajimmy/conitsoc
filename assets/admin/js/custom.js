jQuery(document).ready(function() {

    var _URL = window.URL || window.webkitURL;

    $(".gambar_artikel, .gambar_certification").change(function(e) {

        var image, file = this.files[0];
        var MB = 1024 * 1024;
        var size = (file.size / MB).toFixed(2);
        var test = this;
        var fileValue = $(test).parent().prev().children('.fileupload-preview');
        var fileIcon = $(test).parent().prev().children('.fileupload-exists');
        var fileBtnNew = $(test).parent().children('.fileupload-new');
        var fileBtnChange = $(test).parent().children('.fileupload-exists');

        if (file) {
            $(fileBtnNew).css('display', 'none');
            $(fileBtnChange).css('display', 'initial');
            $(fileIcon).css('display', 'initial');

            image = new Image();

            image.onload = function() {
                var width = this.width;
                var height = this.height;
                var widthRule = 300;
                var heightRule = 283;
                if ((width <= widthRule && height <= heightRule)) {
                    alert('the image width must >= ' + widthRule + 'px and height must >= ' + heightRule + 'px');
                    $(test).val('');
                    $(fileValue).html('');
                    $(fileIcon).css('display', 'none');
                    $(fileBtnNew).css('display', 'initial');
                    $(fileBtnChange).css('display', 'none');
                } else if (size >= 3) {
                    alert('the image size must <= 3MB');
                    $(test).val('');
                    $(fileValue).html('');
                    $(fileIcon).css('display', 'none');
                    $(fileBtnNew).css('display', 'initial');
                    $(fileBtnChange).css('display', 'none');
                }
            };
            image.src = _URL.createObjectURL(file);
        }

    });

    $(".gambar_iklan").change(function(e) {

        var image, file = this.files[0];
        var MB = 1024 * 1024;
        var size = (file.size / MB).toFixed(2);
        var test = this;
        var fileValue = $(test).parent().prev().children('.fileupload-preview');
        var fileIcon = $(test).parent().prev().children('.fileupload-exists');
        var fileBtnNew = $(test).parent().children('.fileupload-new');
        var fileBtnChange = $(test).parent().children('.fileupload-exists');
        var tipe = $('.tipe_iklan').val();
        var widthRule;
        var heightRule;

        if (tipe !== '') {
            switch (tipe) {
                case "body":
                    widthRule = '286';
                    heightRule = '181';
                    break;
                case "footer":
                    widthRule = '882';
                    heightRule = '115';
                    break;
            }
            if (file) {
                $(fileBtnNew).css('display', 'none');
                $(fileBtnChange).css('display', 'initial');
                $(fileIcon).css('display', 'initial');

                image = new Image();

                image.onload = function() {
                    var width = this.width;
                    var height = this.height;
                    if ((width <= widthRule && height <= heightRule)) {
                        alert('the image width must >= ' + widthRule + 'px and height must >= ' + heightRule + 'px');
                        $(test).val('');
                        $(fileValue).html('');
                        $(fileIcon).css('display', 'none');
                        $(fileBtnNew).css('display', 'initial');
                        $(fileBtnChange).css('display', 'none');
                    } else if (size >= 3) {
                        alert('the image size must <= 3MB');
                        $(test).val('');
                        $(fileValue).html('');
                        $(fileIcon).css('display', 'none');
                        $(fileBtnNew).css('display', 'initial');
                        $(fileBtnChange).css('display', 'none');
                    }
                };
                image.src = _URL.createObjectURL(file);
            }
        } else {
            alert('please choose tipe iklan first');
            $(test).val('');
            $(fileValue).html('');
            $(fileIcon).css('display', 'none');
            $(fileBtnNew).css('display', 'initial');
            $(fileBtnChange).css('display', 'none');
        }

    });

    $(".gambar_banner").change(function(e) {

        var image, file = this.files[0];
        var MB = 1024 * 1024;
        var size = (file.size / MB).toFixed(2);
        var test = this;
        var fileValue = $(test).parent().prev().children('.fileupload-preview');
        var fileIcon = $(test).parent().prev().children('.fileupload-exists');
        var fileBtnNew = $(test).parent().children('.fileupload-new');
        var fileBtnChange = $(test).parent().children('.fileupload-exists');

        if (file) {
            $(fileBtnNew).css('display', 'none');
            $(fileBtnChange).css('display', 'initial');
            $(fileIcon).css('display', 'initial');

            image = new Image();

            image.onload = function() {
                var width = this.width;
                var height = this.height;
                if ((width <= 940 && height <= 472)) {
                    alert('the image width must >= 940px and height must >= 472px');
                    $(test).val('');
                    $(fileValue).html('');
                    $(fileIcon).css('display', 'none');
                    $(fileBtnNew).css('display', 'initial');
                    $(fileBtnChange).css('display', 'none');
                } else if (size >= 3) {
                    alert('the image size must <= 3MB');
                    $(test).val('');
                    $(fileValue).html('');
                    $(fileIcon).css('display', 'none');
                    $(fileBtnNew).css('display', 'initial');
                    $(fileBtnChange).css('display', 'none');
                }
            };
            image.src = _URL.createObjectURL(file);
        }

    });

    $(".gambar_produk").change(function(e) {

        var image, file = this.files[0];
        var MB = 1024 * 1024;
        var size = (file.size / MB).toFixed(2);
        var test = this;
        var fileValue = $(test).parent().prev().children('.fileupload-preview');
        var fileIcon = $(test).parent().prev().children('.fileupload-exists');
        var fileBtnNew = $(test).parent().children('.fileupload-new');
        var fileBtnChange = $(test).parent().children('.fileupload-exists');

        if (file) {
            $(fileBtnNew).css('display', 'none');
            $(fileBtnChange).css('display', 'initial');
            $(fileIcon).css('display', 'initial');

            image = new Image();

            image.onload = function() {
                var width = this.width;
                var height = this.height;
                if ((width <= 353 && height <= 284)) {
                    alert('the image width must >= 353px and height must >= 284px');
                    $(test).val('');
                    $(fileValue).html('');
                    $(fileIcon).css('display', 'none');
                    $(fileBtnNew).css('display', 'initial');
                    $(fileBtnChange).css('display', 'none');
                } else if (size >= 3) {
                    alert('the image size must <= 3MB');
                    $(test).val('');
                    $(fileValue).html('');
                    $(fileIcon).css('display', 'none');
                    $(fileBtnNew).css('display', 'initial');
                    $(fileBtnChange).css('display', 'none');
                }
            };
            image.src = _URL.createObjectURL(file);
        }

    });

    $('#cancelorder').click(function() {
        var conf = confirm('Are you sure?');
        var id = $(this).attr('data-val');
        var prev = $(this).prev();
        if (conf) {
            $.post(siteURL + "/pemesanan/change_status/", {
                id: id,
                id_status: 3
            })
                    .done(function(data) {
                if (data === 'success') {
                    alert('Cancel order success');
                    prev.html('Canceled');
                } else {
                    alert('Cancel order error');
                }
            });
            $(this).css('display', 'none');
        }
    });

    $('#btnSaveOrderStatus').click(function() {
        var conf = confirm('Are you sure?');
        var id = $(this).attr('data-val');
        var id_status = $('#id_status').val();
        var statusName = $('#id_status option[value="' + id_status + '"]').text();
        var parents = $(this).parents('.adminData');
        if (conf) {
            if (id_status !== '') {
                $.post(siteURL + "/pemesanan/change_status/", {
                    id: id,
                    id_status: id_status
                })
                        .done(function(data) {
                    alert(data);
                    if (data === 'success') {
                        alert('change order status success');
                        parents.children('strong').html(statusName);
                        $('#btnChangeOrderStatus').css('display', 'inline-block');
                        $('#pnlChangeOrderStatus').css('display', 'none');
                    } else {
                        alert('change order status error');
                    }
                })
                        .fail(function(data) {
                    alert(JSON.stringify(data));
                });
            } else {
                alert('choose the option properly');
            }
        }
    });

    $('#markorderaspaid').click(function() {
        var conf = confirm('Are you sure?');
        var id = $(this).attr('data-val');
        var prev = $(this).prev();
        if (conf) {
            $.post(siteURL + "/pemesanan/confirmed/", {
                id: id,
                is_confirm: 1
            })
                    .done(function(data) {
                if (data === 'success') {
                    alert('change order status success');
                    prev.html('Telah Dikonfirmasi');
                } else {
                    alert('change order status error');
                }
            });
            $(this).css('display', 'none');
        }
    });

    $('#id_provinsi').change(function() {
        $("#id_kota > option").remove();
        var id_provinsi = $('#id_provinsi').val();
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
                        $('#id_kota').append(opt);
                    });
                    $('#id_kota').prop('disabled', false);
                } else {
                    var opt = $('<option />');
                    opt.val('0');
                    opt.text('- Kota tidak tersedia -');
                    $('#id_kota').append(opt);
                    $('#id_kota').prop('disabled', true);
                }
            }
        });
    });

    $('.detail_gambar').change(function() {
        var id = this.id;
        var file = $(this).children('input[type=file]').val();
        if (id) {
            if (file) {
                $('<input>').attr({
                    type: 'hidden',
                    name: 'id_gbr_dtl[]',
                    value: id,
                    id: id
                }).appendTo('form');
            } else {
                $('input[id=' + id + ']').remove();
            }
        }
    });

    jQuery('#addSpek').click(function() {
        var number = $('.spek').length;
        var counter = number + 1;
        var add = '';
        add += '<div class="control-group" id="removeSpek-' + counter + '">\n';
        add += '<label class="control-label">Spesifikasi #' + counter + '</label>\n';
        add += '<div class="controls">\n';
        add += '<input type="text" name="namaSpesifikasi[]" placeholder="Nama Spesifikasi" class="spek span6" required />\n';
        add += '<i class="icon-remove" title="Hapus Spesifikasi #' + counter + '" data-val="' + counter + '"></i>\n';
        add += '</div>\n';
        add += '</div>\n';

        $(add).appendTo('.addSpekField');

        jQuery('.icon-remove').click(function() {
            var id = $(this).attr('data-val');
            document.getElementById('removeSpek-' + id).remove();
        });
    });
    jQuery('.icon-remove').click(function() {
        var id = $(this).attr('data-val');
        var idSpek = $(this).attr('id');
        var name = $(this).attr('name');
        var conf = confirm('Are you sure ?');
        if (conf)
            jQuery('#deleteSpek-' + id).fadeOut(function() {
                $.post(siteURL + "/" + name + "/" + name + "Delete", {
                    idSpek: idSpek
                })
                        .done(function(data) {
                    alert(data);
                    if (data === 'success') {
                        jQuery.jGrowl("Data berhasil dihapus", {
                            life: 5000
                        });
                        jQuery(this).remove();
                    } else {
                        jQuery.jGrowl("Data gagal dihapus", {
                            life: 5000
                        });
                    }
                });
                // do some other stuff here
            });
        return false;
    });

    $('.checkAll').click(function() {
        var chk = $(this).prop('checked');

        $('input', oTable.fnGetNodes()).prop('checked', chk);

        var del = '<input \n\
type="submit" value="Delete Selected" style="width: 100%"/>';
        if (jQuery(this).is(':checked')) {

            jQuery(this).attr('checked', true);
            jQuery(this).parent().addClass('checked');	//used for the custom checkbox style

            $('#form2 > input[type="submit"]').remove();
            $(del).prependTo('#form2');
            alert('cacing');

        } else {

            jQuery(this).attr('checked', false);
            jQuery(this).parent().removeClass('checked');
            alert('kremi');
            $('#form2 > input[type="submit"]').remove();
        }
    });

    $('#kategori').change(function() {
        $("#merk > option").remove();
        var idKategori = $('#kategori').val();
        $.ajax({
            type: "POST",
            url: siteURL + "/produk/produkMerkDrop/" + idKategori, //here we are calling our user controller and get_cities method with the country_id

            success: function(data) {
                if (data[0]) {
                    var isFirst = true;
                    $.each(data[0], function(id, merk) {
                        var opt = $('<option />');
                        opt.val(id);
                        opt.text(merk);
                        if (isFirst) {
                            opt.attr('selected', true);
                            isFirst = false;
                        }
                        $('#merk').append(opt);
                    });
                    $('#merk').prop('disabled', false);
                } else {
                    var opt = $('<option />');
                    opt.val('0');
                    opt.text('- Merk tidak tersedia -');
                    $('#merk').append(opt);
                    $('#merk').prop('disabled', true);
                }
                if (data[1]) {
                    $('#spek').html('<legend>Spesifikasi Produk</legend>\n');
                    $.each(data[1], function(idSpek, spek) {

                        var add = '';
                        add += '<div class="control-group">\n';
                        add += '<label class="control-label">' + spek + '</label>\n';
                        add += '<div class="controls">\n';
                        add += '<input type="hidden" name="idSpesifikasi[]" value="' + idSpek + '" />\n';
                        add += '<input type="text" name="isiSpesifikasi[]" placeholder="Detail Spesifikasi" class="spek span11" />\n';
                        add += '</div>\n';
                        add += '</div>\n';

                        $('#spek').append(add);
                    });
                } else {
                    $('#spek').html('');
                }
            }
        });
    });

    $('#checkDiscount').change(function() {
        if (jQuery(this).is(':checked')) {
            if ($('#hargaProduk').val()) {

                jQuery(this).attr('checked', true);
                jQuery(this).parent().addClass('checked');	//used for the custom checkbox style

                $('#fieldDiscount').html('');

                var add = '';
                add += '<div class="control-group">\n';
                add += '<label class="control-label">Jumlah Discount</label>\n';
                add += '<div class="controls">\n';
                add += '<input type="number" min="1" name="discountProduk" placeholder="Jumlah Discount" class="span11" id="jumlahDiscount" required />\n';
                add += '<span class="add-on">%</span>\n';
                add += '<span class="help-block" id="hitungDiscount">Hitung harga discount.</span>\n';
                add += '</div>\n';
                add += '</div>\n';
                add += '<div class="control-group">\n';
                add += '<label class="control-label">Harga Setelah Discount</label>\n';
                add += '<div class="controls">\n';
                add += '<input type="number" min="1" class="span11" name="stlhDiscount" placeholder="Harga Setelah Discount" id="hargaAfter" required />\n';
                add += '</div>\n';
                add += '</div>\n';

                $('#fieldDiscount').append(add);

                $('#hitungDiscount').click(function() {
                    var harga = $('#hargaProduk').val();
                    var disc = $('#jumlahDiscount').val();
                    if (disc) {
                        var result = harga * (disc / 100);
                        var afterDisc = harga - result;
                        $('#hargaAfter').val(afterDisc);
                    } else {
                        alert('silahkan isi jumlah discount terlebih dahulu');
                    }
                });
            } else {
                jQuery(this).attr('checked', false);
                jQuery(this).parent().removeClass('checked');
                alert('Silahkan isi harga produk terlebih dahulu');
            }

        } else {

            jQuery(this).attr('checked', false);
            jQuery(this).parent().removeClass('checked');
            $('#fieldDiscount').html('');
        }
    });

    $('#uploadFile').change(function() {
        $('#appendedInputButton').val($(this).val());
    });

    $('#hitungDiscount').click(function() {
        var harga = $('#hargaProduk').val();
        var disc = $('#jumlahDiscount').val();
        if (disc) {
            var result = harga * (disc / 100);
            var afterDisc = harga - result;
            $('#hargaAfter').val(afterDisc);
        } else {
            alert('silahkan isi jumlah discount terlebih dahulu');
        }
    });

    $('#search').keypress(function(e) {


        if (e.which === 13)
        {
            e.preventDefault();
        }
        var searched = $('#search').val();
        var fullurl = siteURL + "/produk/produkSearchAuto/" + searched;
        $.ajax({
            type: "POST",
            url: fullurl, //here we are calling our user controller and get_cities method with the country_id

            success: function(data) {
                var elements = [];
                $.each(data, function(i, val) {
                    elements.push(val);
                });
                $('#search').autocomplete({
                    source: elements
                });
            }
        });

    });

});
