jQuery(document).ready(function() {
    $('#checkout-btn').click(function() {
        confirm('Are You Sure ??');
        var id = $(this).attr('data-val');
        var url = siteURL + "/page/shipping_data/" + id;
        if (id) {
            $('form#cart-form').get(0).setAttribute('action', siteURL + '/page/checkout'); //this works
            $('input.qty').attr('disabled', true);
            $('#checkout-conf').css('display', 'none');
            $('#edit-btn').css('display', 'none');
            $('.cart-remove').css('display', 'none');
            $('#finish-btn').css('display', 'block');
            $.ajax({
                type: 'POST',
                url: url,
                cache: false,
                async: false,
                success: function(data) {
                    var idCustomer = '';
                    var idUser = id;
                    var nama_jelas = '';
                    var no_telepon = '';
                    var alamat = '';
                    var provinsi = '';
                    var kota = '';
                    var kode_pos = '';
                    var jenis_kelamin = '';
                    var pria = '';
                    var wanita = '';
                    var info = 'Anda belum mengisi data pribadi anda silahkan isi terlebih dahulu';
                    if (data !== false) {
                        idCustomer = data[0]['id'];
                        idUser = data[0]['idUser'];
                        nama_jelas = data[0]['nama_jelas'];
                        no_telepon = data[0]['no_telepon'];
                        alamat = data[0]['alamat'];
                        provinsi = data[0]['provinsi'];
                        kota = data[0]['kota'];
                        kode_pos = data[0]['kode_pos'];
                        jenis_kelamin = data[0]['jenis_kelamin'];
                        pria = jenis_kelamin === 'Pria' ? 'checked' : '';
                        wanita = jenis_kelamin === 'Wanita' ? 'checked' : '';
                        info = '';
                    }

                    $('#checkout-box').html('');
                    var add = "";
                    add += "<p>" + info + "</p>";
                    add += "<div class=\"blog-tab\"> ";
                    add += "<h2 class=\"cart-title\">Shipping Address<\/h2> ";
                    add += "<ul class=\"nav nav-tabs\"> ";
                    add += "<li class=\"active\"> ";
                    add += "<a data-placment=\"top\" href=\"#your-address\" data-toggle=\"tab\" id=\"your-addresstab\">Your Address<\/a> ";
                    add += "<\/li> ";
                    add += "<li> ";
                    add += "<a data-placment=\"top\" href=\"#other-address\" data-toggle=\"tab\" id=\"other-addresstab\">Another Address<\/a> ";
                    add += "<\/li> ";
                    add += "<\/ul> ";
                    add += "<div class=\"tab-content\"> ";
                    add += "<div class=\"tab-pane active\" id=\"your-address\"> ";
                    add += "<div class=\"row\"> ";
                    add += "<div class=\"span4\"> ";
                    add += "<input type=\"hidden\" value=\"" + idCustomer + "\" name=\"idCustomer\"\ required/> ";
                    add += "<input type=\"hidden\" value=\"" + idUser + "\" name=\"idUser\"\/> ";
                    add += "<input type=\"hidden\" value=\"0\" name=\"type_address\" id=\"type_address\"\ required/> ";
                    add += "<div class=\"control-group\"> ";
                    add += "<label for=\"alamat\" class=\"control-label\">Alamat <\/label>                    <div class=\"controls\"> ";
                    add += "<input type=\"text\" name=\"alamat1\" value=\"" + alamat + "\" id=\"alamat\"\ required/>                    <\/div> ";
                    add += "<\/div><!--end control-group-->  ";
                    add += "<div class=\"control-group\"> ";
                    add += "<label for=\"provinsi\" class=\"control-label\">Provinsi <\/label>                    <div class=\"controls\"> ";
                    //add += "<input type=\"text\" name=\"provinsi1\" value=\"" + provinsi + "\" id=\"provinsi\"\ required/>                    <\/div> ";
                    add += '<select name="provinsi1" id="provinsi1" required="">\n';
					add += '<option value="0" selected="selected">- Pilih Satu -</option>\n';
					add += '<option value="Jawa Barat">Jawa Barat</option>\n';
					add += '<option value="DKI Jakarta">DKI Jakarta</option>\n';
					add += '</select>                    <\/div> ';
                    add += "<\/div><!--end control-group--> ";
                    add += "<div class=\"control-group\"> ";
                    add += "<label for=\"kota\" class=\"control-label\">Kota <\/label>                    <div class=\"controls\"> ";
                    //add += "<input type=\"text\" name=\"kota1\" value=\"" + kota + "\" id=\"kota\"\ required/>                    <\/div> ";
					add += '<select name="kota1" id="kota1" required="">\n';
					add += '<option value="0" selected="selected">- Pilih Satu -</option>\n';
					add += '<option value="Jakarta">Jakarta</option>\n';
					add += '<option value="Bandung">Bandung</option>\n';
					add += '<option value="Depok">Depok</option>\n';
					add += '</select>                    <\/div> ';
                    add += "<\/div><!--end control-group--> ";
                    add += "<div class=\"control-group\"> ";
                    add += "<label for=\"kode_pos\" class=\"control-label\">Kode Pos <\/label>                    <div class=\"controls\"> ";
                    add += "<input type=\"text\" name=\"kode_pos1\" value=\"" + kode_pos + "\" id=\"kode_pos\"\ required/>                    <\/div> ";
                    add += "<\/div><!--end control-group--> ";
                    add += "<\/div> ";
                    add += "<div class=\"span4\"> ";
                    add += "<div class=\"control-group\"> ";
                    add += "<label for=\"nama_jelas\" class=\"control-label\">Nama Jelas <\/label>                    <div class=\"controls\"> ";
                    add += "<input type=\"text\" name=\"nama_jelas1\" value=\"" + nama_jelas + "\" id=\"nama_jelas\"\ required/>                    <\/div> ";
                    add += "<\/div><!--end control-group-->  ";
                    add += "<div class=\"control-group\"> ";
                    add += "<label for=\"no_telepon\" class=\"control-label\">Nomor Telepon <\/label>                    <div class=\"controls\"> ";
                    add += "<input type=\"text\" name=\"no_telepon1\" value=\"" + no_telepon + "\" id=\"no_telepon\"\ required/>                    <\/div> ";
                    add += "<\/div><!--end control-group-->  ";
                    add += "<div class=\"control-group\"> ";
                    add += "<label for=\"jenis_kelamin\" class=\"control-label\">Jenis Kelamin <\/label>                    <div class=\"controls\"> ";
                    add += "<label class=\"radio inline\"><input type=\"radio\" name=\"jenis_kelamin\" value=\"Pria\" " + pria + "\/> Laki-laki<\/label> ";
                    add += "<label class=\"radio inline\"><input type=\"radio\" name=\"jenis_kelamin\" value=\"Wanita\" " + wanita + "\/> Perempuan<\/label> ";
                    add += "<\/div> ";
                    add += "<\/div><!--end control-group-->  ";
                    add += "<\/div> ";
                    add += "<\/div>";
                    add += "<\/div>";
                    add += "<div class=\"clearfix\"><\/div> ";
                    add += "<div class=\"tab-pane\" id=\"other-address\"> ";
                    add += "<div class=\"row\"> ";
                    add += "<div class=\"span4\"> ";
                    add += "<div class=\"control-group\"> ";
                    add += "<label for=\"alamat\" class=\"control-label\">Alamat <\/label>                    <div class=\"controls\"> ";
                    add += "<input type=\"text\" name=\"alamat\" value=\"\" id=\"alamat\"\/>                    <\/div> ";
                    add += "<\/div><!--end control-group-->  ";
                    add += "<div class=\"control-group\"> ";
                    add += "<label for=\"provinsi\" class=\"control-label\">Provinsi <\/label>                    <div class=\"controls\"> ";
                    //add += "<input type=\"text\" name=\"provinsi\" value=\"\" id=\"provinsi\"\/>                    <\/div> ";
					add += '<select name="provinsi" id="provinsi" required="">\n';
					add += '<option value="0" selected="selected">- Pilih Satu -</option>\n';
					add += '<option value="17">Komputer</option>\n';
					add += '<option value="23">Smartphone</option>\n';
					add += '</select>                    <\/div> ';
                    add += "<\/div><!--end control-group--> ";
                    add += "<div class=\"control-group\"> ";
                    add += "<label for=\"kota\" class=\"control-label\">Kota <\/label>                    <div class=\"controls\"> ";
                    //add += "<input type=\"text\" name=\"kota\" value=\"\" id=\"kota\"\/>                    <\/div> ";
					add += '<select name="kota" id="kota" required="">\n';
					add += '<option value="0" selected="selected">- Pilih Satu -</option>\n';
					add += '<option value="17">Komputer</option>\n';
					add += '<option value="23">Smartphone</option>\n';
					add += '</select>                    <\/div> ';
                    add += "<\/div><!--end control-group--> ";
                    add += "<div class=\"control-group\"> ";
                    add += "<label for=\"kode_pos\" class=\"control-label\">Kode Pos <\/label>                    <div class=\"controls\"> ";
                    add += "<input type=\"text\" name=\"kode_pos\" value=\"\" id=\"kode_pos\"\/>                    <\/div> ";
                    add += "<\/div><!--end control-group--> ";
                    add += "<\/div> ";
                    add += "<div class=\"span4\"> ";
                    add += "<div class=\"control-group\"> ";
                    add += "<label for=\"nama_jelas\" class=\"control-label\">Nama Jelas <\/label>                    <div class=\"controls\"> ";
                    add += "<input type=\"text\" name=\"nama_jelas\" value=\"\" id=\"nama_jelas\"\/>                    <\/div> ";
                    add += "<\/div><!--end control-group-->  ";
                    add += "<div class=\"control-group\"> ";
                    add += "<label for=\"no_telepon\" class=\"control-label\">Nomor Telepon <\/label>                    <div class=\"controls\"> ";
                    add += "<input type=\"text\" name=\"no_telepon\" value=\"\" id=\"no_telepon\"\/>                    <\/div> ";
                    add += "<\/div><!--end control-group-->  ";
                    add += "<div class=\"control-group\"> ";
                    add += "<label for=\"jenis_kelamin\" class=\"control-label\">Jenis Kelamin <\/label>                    <div class=\"controls\"> ";
                    add += "<label class=\"radio inline\"><input type=\"radio\" name=\"jenis_kelamin\" value=\"Pria\"\/> Laki-laki<\/label> ";
                    add += "<label class=\"radio inline\"><input type=\"radio\" name=\"jenis_kelamin\" value=\"Wanita\"\/> Perempuan<\/label> ";
                    add += "<\/div> ";
                    add += "<\/div><!--end control-group-->  ";
                    add += "<\/div> ";
                    add += "<div class=\"clearfix\"><\/div> ";
                    add += "<\/div> ";
                    add += "<\/div>";
                    add += "<\/div><!--end blog-tab--> ";
                    add += "<div class=\"shipping-box\"> ";
                    add += "<div class=\"shipping-method\"> ";
                    add += "<h2 class=\"cart-title\">Shipping Method<\/h2> ";
                    add += "<div class=\"shipping-info\">Pengiriman dengan JNE dikenakan biaya asuransi sebesar 0,1% darti total harga barang<\/div> ";
                    add += "<div class=\"shipping-detail\"> ";
                    add += "<div class=\"detail-line\"> ";
                    add += "<div class=\"\">JNE Reg<\/div> ";
                    add += "<div class=\"\">Rp. 10.000 x 1 kg<\/div> ";
                    add += "<div class=\"\">Rp. 10.000<\/div> ";
                    add += "<\/div> ";
                    add += "<\/div> ";
                    add += "<\/div> ";
                    add += "<\/div> ";
                    add += "<div class=\"row\"> ";
                    add += "<div class=\"payment-box span6\"> ";
                    add += "<div class=\"payment-method\"> ";
                    add += "<h2 class=\"cart-title\">Payment Method<\/h2> ";
                    add += "<div class=\"payment-detail\"> ";
                    add += "<div class=\"payment-logo\"><img src='" + baseURL + "assets\/user\/img\/mandiri_logo.jpg'\/> <\/div> ";
                    add += "<div class=\"detail-line\"> ";
                    add += "<div class=\"\"><strong>No Rekening : 123456789<\/strong><\/div> ";
                    add += "<div class=\"\"><strong>Atas Nama : Johny Depp<\/strong><\/div> ";
                    add += "<\/div> ";
                    add += "<\/div> ";
                    add += "<div class=\"payment-detail\"> ";
                    add += "<div class=\"payment-logo\"><img src='" + baseURL + "assets\/user\/img\/bca_logo.jpg'\/> <\/div> ";
                    add += "<div class=\"detail-line\"> ";
                    add += "<div class=\"\"><strong>No Rekening : 123456789<\/strong><\/div> ";
                    add += "<div class=\"\"><strong>Atas Nama : Johny Depp<\/strong><\/div> ";
                    add += "<\/div> ";
                    add += "<\/div> ";
                    add += "<div class=\"payment-detail\"> ";
                    add += "<div class=\"payment-logo\"><img src='" + baseURL + "assets\/user\/img\/bni_logo.jpg'/> <\/div>";
                    add += "<div class=\"detail-line\">";
                    add += "<div class=\"\"><strong>No Rekening : 123456789<\/strong><\/div>";
                    add += "<div class=\"\"><strong>Atas Nama : Johny Depp<\/strong><\/div>";
                    add += "<\/div>";
                    add += "<\/div>";
                    add += "<\/div>";
                    add += "<\/div>";
                    add += "<\/div>";
                    add += "<\/div>";
                    $('#checkout-box').append(add);

                    $('#your-addresstab, #other-addresstab').click(function() {
                        if ($('#type_address').length) {
                            $("#type_address").val("");
                            if (!$('#other-address').is(':visible')) {
                                $("#type_address").val("1");
                            } else {
                                $("#type_address").val("0");
                            }
                        }
                    });
                },
                error: function() {
                    window.location = siteURL + '/page/page_login';
                }
            });
        } else {
            window.location = siteURL + '/page/page_login';
        }
    });

    $('.qty').blur(function() {
        $('form#cart-form').submit();
    });

    $('#ym').hover(
            function() {
                // hide the css default behavir
                $('img.hotline-button').css('display', 'none');
                //show its submenu
                $('img.ym-button, div.ym-drop').css('display', 'block');
            },
            function() {
                //hide its submenu
                $('img.ym-button, div.ym-drop').css('display', 'none');
                $('img.hotline-button').css('display', 'inline-block');
            }
    );

    $('.iklan').bxSlider({
        slideWidth: 287,
        minSlides: 2,
        maxSlides: 3,
        moveSlides: 1,
        controls: false,
        pager: false,
        slideMargin: 39.5
    });

    $('.hot-produk').bxSlider({
        slideWidth: 135,
        minSlides: 2,
        maxSlides: 6,
        moveSlides: 1,
        slideMargin: 1
    });
    $('.produk-detail').bxSlider({
        pagerCustom: '#bx-pager',
        controls: false,
        slideMargin: 2
    });

    $('html').click(function() {
        $('.login_box').slideUp(500);
//Hide the menus if visible
    });

    $('#user_login, .login_box').click(function(event) {
        event.stopPropagation();
        $('.login_box').slideDown(500);
    });

});
