jQuery(document).ready(function() {

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
                $('input[id='+id+']').remove();
            }
        }
    });

    $('.urutan').click(function() {
        if ($('.form-urut').length > 0) {
            $('.form-urut').html('');
            $('.no-urut').css('display', 'block');
        }
        var action = siteURL + '/kategori/update_idx';
        var add = '';
        add += '<form method="POST" class="form-urut" action="' + action + '">\n';
        add += '<input type="hidden" name="id_kategori" value="' + this.id + '" />\n';
        add += '<select name="idx" >\n';
        add += '<option value="0">- Pilih Satu -</option>\n';
        add += '<option value="1">1</option>\n';
        add += '<option value="2">2</option>\n';
        add += '<option value="3">3</option>\n';
        add += '<option value="4">4</option>\n';
        add += '<option value="5">5</option>\n';
        add += '<option value="6">6</option>\n';
        add += '<option value="7">7</option>\n';
        add += '</select>\n';
        add += '<input type="submit" />\n';
        add += '</form>\n';

        $(add).appendTo('#form-urut-field-' + this.id);
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
        var conf = confirm(siteURL + "/" + name + "/" + name + "Delete");
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
                        add += '<input type="text" name="isiSpesifikasi[]" placeholder="Detail Spesifikasi" class="spek span11" required />\n';
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
