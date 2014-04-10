var Script = function() {

    $('#sample_1 .view_certification').click(function() {
        var id = this.id;
        var url = siteURL + '/certification/get_detail_ajax/' + id;
        var tr = $(this).closest('tr');
        var nextTr = $(this).parent().parent('tr').next();
        $.ajax({
            type: 'POST',
            url: url,
            cache: false,
            async: false,
            success: function(data) {
                if ($(nextTr).attr('id')) {
                    $(nextTr).remove();
                } else {
                    var add = '';
                    add += '<div style="width: 80%; margin: 0 auto 30px;">\n';
                    add += '<h3 class="page-title">' + data['judul'] + '</h3>\n';
                    add += '<table class="table table-striped table-bordered" id="sample_1"><tbody>\n';
                    add += '<tr><td>Isi</td>\n';
                    add += '<td>' + data['isi'] + '</td></tr>\n';
                    add += '</tbody></table>\n';
                    add += '</div>\n';
                    add += '\n';
                    $(tr).after('<tr id="1"><td colspan="10">' + add + '</td></tr>');
                }
            }
        });
    });

    $('#sample_1 .view_artikel').click(function() {
        var id = this.id;
        var url = siteURL + '/artikel/get_detail_ajax/' + id;
        var tr = $(this).closest('tr');
        var nextTr = $(this).parent().parent('tr').next();
        $.ajax({
            type: 'POST',
            url: url,
            cache: false,
            async: false,
            success: function(data) {
                if ($(nextTr).attr('id')) {
                    $(nextTr).remove();
                } else {
                    var add = '';
                    add += '<div style="width: 80%; margin: 0 auto 30px;">\n';
                    add += '<h3 class="page-title">' + data['judul'] + '</h3>\n';
                    add += '<table class="table table-striped table-bordered" id="sample_1"><tbody>\n';
                    add += '<tr><td>Isi</td>\n';
                    add += '<td>' + data['isi'] + '</td></tr>\n';
                    add += '</tbody></table>\n';
                    add += '</div>\n';
                    add += '\n';
                    $(tr).after('<tr id="1"><td colspan="10">' + add + '</td></tr>');
                }
            }
        });
    });

    $('#sample_1 .view_project').click(function() {
        var id = this.id;
        var url = siteURL + '/project/get_project_ajax/' + id;
        var tr = $(this).closest('tr');
        var nextTr = $(this).parent().parent('tr').next();
        $.ajax({
            type: 'POST',
            url: url,
            cache: false,
            async: false,
            success: function(data) {
                if ($(nextTr).attr('id')) {
                    $(nextTr).remove();
                } else {
                    var add = '';
                    add += '<div style="width: 80%; margin: 0 auto 30px;">\n';
                    add += '<h3 class="page-title">' + data['nama'] + '  Projects</h3>\n';
                    add += '<table class="table table-striped table-bordered" id="sample_1"><tbody>\n';
                    add += '<tr><td>Kategori</td>\n';
                    add += '<td>' + data['kategori'] + '</td></tr>\n';
                    add += '<tr><td>Visibilitas</td>\n';
                    add += '<td>' + data['visibilitas'] + '</td></tr>\n';
                    add += '<tr><td>Negara</td>\n';
                    add += '<td>' + data['negara'] + '</td></tr>\n';
                    add += '<tr><td>Provinsi</td>\n';
                    add += '<td>' + data['provinsi'] + '</td></tr>\n';
                    add += '<tr><td>Kota</td>\n';
                    add += '<td>' + data['kota'] + '</td></tr>\n';
                    add += '<tr><td>Jenis Industri</td>\n';
                    add += '<td>' + data['jenis_industri'] + '</td></tr>\n';
                    add += '</tbody></table>\n';
                    add += '</div>\n';
                    add += '\n';
                    $(tr).after('<tr id="1"><td colspan="10">' + add + '</td></tr>');
                }
            }
        });
    });

    $('.urutan').change(function() {
        var idx = $(this).val();
        var id_kategori = $(this).attr('id');
//        alert(siteURL + "/produk/add_qty/" + id_produk + '/' + qty);
        var conf = confirm('Are you sure??');
        if (conf)
            $.post(siteURL + "/kategori/update_idx", {
                id_kategori: id_kategori,
                idx: idx
            })
                    .done(function(data) {
                if (data === 'success') {
                    alert("Your input is already updated");
                } else {
                    alert("Your input is already exist");
                }
            })
                    .fail(function(data) {
                alert(JSON.stringify(data));
            });
        // do some other stuff here
        return false;
    });

    $('.status_produk').change(function() {
        var status = $(this).val();
        var id = $(this).attr('data-val');
        var conf = confirm('Are you sure??');
        if (status) {
            if (conf)
                $.post(siteURL + "/produk/update_status", {
                    status: status,
                    id: id
                })
                        .done(function(data) {
                    if (data === 'success') {
                        alert("Your input is already updated");
                    } else {
                        alert("Your input is error");
                    }
                })
                        .fail(function(data) {
                    alert(JSON.stringify(data));
                });
            // do some other stuff here
            return false;
        } else{
            alert('please choose the status properly');
        }

    });

    $('#sample_1 .detail_user').click(function() {
        var id = this.id;
        var url = siteURL + '/user/get_user_ajax/' + id;
        var tr = $(this).closest('tr');
        var nextTr = $(this).parent('tr').next();
        $.ajax({
            type: 'POST',
            url: url,
            cache: false,
            async: false,
            success: function(data) {
                if ($(nextTr).attr('id')) {
                    $(nextTr).remove();
                } else {
                    var add = '';
                    add += '<div class="row-fluid">\n';
                    add += '<div class="span6">\n';
                    add += '<table class="detail">\n';
                    add += '<tr>\n';
                    add += '<th width="50%">Last Logged In</th>\n';
                    add += '<td width="5">:</td>\n';
                    add += '<td width="50%">' + data['created_date'] + '</td>\n';
                    add += '</tr>\n';
                    add += '<tr>\n';
                    add += '<th width="50%">Confirmed Email</th>\n';
                    add += '<td width="5">:</td>\n';
                    add += '<td width="50%">' + data['email'] + '</td>\n';
                    add += '</tr>\n';
                    add += '<tr>\n';
                    add += '<th width="50%">Account Created On</th>\n';
                    add += '<td width="5">:</td>\n';
                    add += '<td width="50%">' + data['created_date'] + '</td>\n';
                    add += '</tr>\n';
                    add += '</table>\n';
                    add += '</div>\n';
                    add += '<div class="span6">\n';
                    add += '<h4>Default Address</h4>\n';
                    add += '<p>' + data['alamat'] + '<br>' + data['city_name'] + '<br>' + data['state_name'] + '</p>\n';
                    add += '</div>\n';
                    add += '</div>\n';
                    $(tr).after('<tr id="detail-' + id + '"><td colspan="10">' + add + '</td></tr>');
                }
            }
        });
    });

    $('#sample_1 .check_best_seller').change(function() {
        var id = $(this).attr('data-val');
        var name = $(this).attr('name');
        var isBest_seller;
        if (jQuery(this).is(':checked')) {

            jQuery(this).attr('checked', true);
            jQuery(this).parent().addClass('checked');	//used for the custom checkbox style
            jQuery(this).parents('tr').addClass('selected'); // to highlight row as selected;
            isBest_seller = 1;

        } else {

            jQuery(this).attr('checked', false);
            jQuery(this).parent().removeClass('checked');	//used for the custom checkbox style
            jQuery(this).parents('tr').removeClass('selected');
            isBest_seller = 0;

        }
        $.post(siteURL + "/" + name + "/" + name + "_best_seller", {
            id: id,
            isBest_seller: isBest_seller
        })
                .done(function(data) {
            if (data === 'activated') {
                alert('Best Seller Active');
            } else if (data === 'unactivated') {
                alert('Best Seller Unactivated');
            } else {
                alert('Best Seller Active Error');
            }
        });
    });

    $('#sample_1 .check_stock').change(function() {
        var id = $(this).attr('data-val');
        var is_stock;
        if (jQuery(this).is(':checked')) {

            jQuery(this).attr('checked', true);
            jQuery(this).parent().addClass('checked');	//used for the custom checkbox style
            jQuery(this).parents('tr').addClass('selected'); // to highlight row as selected;
            is_stock = 1;

        } else {

            jQuery(this).attr('checked', false);
            jQuery(this).parent().removeClass('checked');	//used for the custom checkbox style
            jQuery(this).parents('tr').removeClass('selected');
            is_stock = 0;

        }
        $.post(siteURL + "/produk/check_stock", {
            id: id,
            isBest_seller: is_stock
        })
                .done(function(data) {
            if (data === 'activated') {
                alert('Product Stocked');
            } else if (data === 'unactivated') {
                alert('Product Out of Stock');
            } else {
                alert('Product Error');
            }
        });
    });


    $('.checkboxes').change(function() {
        var del = '<input \n\
type="submit" value="Delete Selected" style="width: 100%"/>';
        if (jQuery(this).is(':checked')) {

            jQuery(this).attr('checked', true);
            jQuery(this).parent().addClass('checked');	//used for the custom checkbox style

            $('#form2 > input[type="submit"]').remove();
            $(del).prependTo('#form2');

        } else {

            jQuery(this).attr('checked', false);
            jQuery(this).parent().removeClass('checked');

            $('#form2 > input[type="submit"]').remove();
        }
    });

    jQuery('.icon-trash').click(function() {
        var id = $(this).attr('data-val');
        var name = $(this).attr('name');
        var conf = confirm('Continue delete?');
        if (conf)
            jQuery(this).parents('tr').fadeOut(function() {
                $.post(siteURL + "/" + name + "/" + name + "Delete", {
                    id: id
                })
                        .done(function(data) {
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

    jQuery('.hapus_iklan').click(function() {
        var id = $(this).attr('data-val');
        var name = $(this).attr('name');
        var conf = confirm('Continue delete?');
        if (conf)
            jQuery(this).parents('tr').fadeOut(function() {
                $.post(siteURL + "/banner/iklanDelete", {
                    id: id
                })
                        .done(function(data) {
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

    jQuery('.hapus_produk').click(function() {
        var id = $(this).attr('id');
        var conf = confirm('Are you sure?? \nthis function will be delete produk permanently');
        if (conf)
            jQuery(this).parents('tr').fadeOut(function() {
                $.post(siteURL + "/produk/delete_permanently", {
                    id: id
                })
                        .done(function(data) {
                    if (data === 'success') {
                        alert('Data berhasil dihapus');
                        jQuery(this).remove();
                    } else {
                        alert('Data gagal dihapus');
                    }
                });
                // do some other stuff here
            });
        return false;
    });

    jQuery('.hapus_pemesanan').click(function() {
        var id = $(this).attr('id');
        var conf = confirm('Are you sure?? \nthis function will be delete oreder permanently');
        if (conf)
            jQuery(this).parents('tr').fadeOut(function() {
                $.post(siteURL + "/pemesanan/delete_permanently", {
                    id: id
                })
                        .done(function(data) {
                    if (data === 'success') {
                        alert('Data berhasil dihapus');
                        jQuery(this).remove();
                    } else {
                        alert('Data gagal dihapus');
                    }
                });
                // do some other stuff here
            });
        return false;
    });

    $('.qty_produk').on('blur', function() {
        var qty = $(this).val();
        var id_produk = $(this).attr('id');
        var conf = confirm('Are you sure??');
        if (conf)
            $.post(siteURL + "/produk/add_qty", {
                id_produk: id_produk,
                qty: qty
            })
                    .done(function(data) {
                if (data === 'success') {
                    alert("Jumlah produk berhasil di-update");
                } else {
                    alert("Jumlah produk gagal di-update");
                }
            })
                    .fail(function(data) {
                alert(JSON.stringify(data));
            });
        // do some other stuff here
        return false;
    });

    $('.check_banner').change(function() {
        var id = $(this).attr('data-val');
        var name = $(this).attr('name');
        var is_active;
        if (jQuery(this).is(':checked')) {

            jQuery(this).attr('checked', true);
            jQuery(this).parent().addClass('checked');	//used for the custom checkbox style
            jQuery(this).parents('tr').addClass('selected'); // to highlight row as selected;
            is_active = 1;

        } else {

            jQuery(this).attr('checked', false);
            jQuery(this).parent().removeClass('checked');	//used for the custom checkbox style
            jQuery(this).parents('tr').removeClass('selected');
            is_active = 0;

        }
        $.post(siteURL + "/" + name + "/" + name + "_is_active", {
            id: id,
            is_active: is_active
        })
                .done(function(data) {
            if (data === 'activated') {
                alert('Banner Active');
            } else if (data === 'unactivated') {
                alert('Banner Unactivated');
            } else {
                alert('Banner Activation Error');
            }
        });
    });

    $('.check_iklan').change(function() {
        var id = $(this).attr('id');
        var type = $(this).attr('data-val');
        var name = $(this).attr('name');
        var is_active;
        var len = $('input[class="check_iklan ' + type + '"]:checked').length;
        var lenRule;
        switch (type) {
            case 'body':
                lenRule = 3;
                break;
            case 'footer':
                lenRule = 1;
                break;
        }
        if (len <= lenRule) {
            if (jQuery(this).is(':checked')) {

                jQuery(this).attr('checked', true);
                jQuery(this).parent().addClass('checked');	//used for the custom checkbox style
                jQuery(this).parents('tr').addClass('selected'); // to highlight row as selected;
                is_active = 1;

            } else {

                jQuery(this).attr('checked', false);
                jQuery(this).parent().removeClass('checked');	//used for the custom checkbox style
                jQuery(this).parents('tr').removeClass('selected');
                is_active = 0;

            }
            $.post(siteURL + "/iklan/" + name + "_is_active", {
                id: id,
                is_active: is_active
            })
                    .done(function(data) {
                if (data === 'activated') {
                    alert('Iklan Active');
                } else if (data === 'unactivated') {
                    alert('Iklan Unactivated');
                } else {
                    alert('Iklan Activation Error');
                }
            });
        } else {
            alert('mohon maaf, maximum iklan ' + type + ' hanya ' + lenRule + ' item');
            jQuery(this).attr('checked', false);
            jQuery(this).parent().removeClass('checked');	//used for the custom checkbox style
            jQuery(this).parents('tr').removeClass('selected');
        }
    });

    // begin first table
    $('#sample_1').dataTable({
        "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
        "sPaginationType": "bootstrap",
        "oLanguage": {
            "sLengthMenu": "_MENU_ records per page",
            "oPaginate": {
                "sPrevious": "Prev",
                "sNext": "Next"
            }
        },
        "aoColumnDefs": [{
                'bSortable': false,
                'aTargets': [0]
            }]


    });



    jQuery('#sample_1 .group-checkable').change(function() {
        var del = '<input \n\
type="submit" value="Delete Selected" style="width: 100%"/>';
        var set = jQuery(this).attr("data-set");
        var checked = jQuery(this).is(":checked");
        jQuery(set).each(function() {
            if (checked) {
                $(this).attr("checked", true);
                $('#form2 > input[type="submit"]').remove();
                $(del).prependTo('#form2');
            } else {
                $(this).attr("checked", false);
                $('#form2 > input[type="submit"]').remove();
            }
        });
        jQuery.uniform.update(set);
    });

    jQuery('#sample_1_wrapper .dataTables_filter input').addClass("input-medium"); // modify table search input
    jQuery('#sample_1_wrapper .dataTables_length select').addClass("input-mini"); // modify table per page dropdown

    // begin second table
    $('#sample_2').dataTable({
        "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
        "sPaginationType": "bootstrap",
        "oLanguage": {
            "sLengthMenu": "_MENU_ per page",
            "oPaginate": {
                "sPrevious": "Prev",
                "sNext": "Next"
            }
        },
        "aoColumnDefs": [{
                'bSortable': false,
                'aTargets': [0]
            }]
    });

    jQuery('#sample_2 .group-checkable').change(function() {
        var set = jQuery(this).attr("data-set");
        var checked = jQuery(this).is(":checked");
        jQuery(set).each(function() {
            if (checked) {
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
        });
        jQuery.uniform.update(set);
    });

    jQuery('#sample_2_wrapper .dataTables_filter input').addClass("input-small"); // modify table search input
    jQuery('#sample_2_wrapper .dataTables_length select').addClass("input-mini"); // modify table per page dropdown

    // begin: third table
    $('#sample_3').dataTable({
        "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
        "sPaginationType": "bootstrap",
        "oLanguage": {
            "sLengthMenu": "_MENU_ per page",
            "oPaginate": {
                "sPrevious": "Prev",
                "sNext": "Next"
            }
        },
        "aoColumnDefs": [{
                'bSortable': false,
                'aTargets': [0]
            }]
    });

    jQuery('#sample_3 .group-checkable').change(function() {
        var set = jQuery(this).attr("data-set");
        var checked = jQuery(this).is(":checked");
        jQuery(set).each(function() {
            if (checked) {
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
        });
        jQuery.uniform.update(set);
    });

    jQuery('#sample_3_wrapper .dataTables_filter input').addClass("input-small"); // modify table search input
    jQuery('#sample_3_wrapper .dataTables_length select').addClass("input-mini"); // modify table per page dropdown



}();