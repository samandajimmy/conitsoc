jQuery(document).ready(function()
	{
		$('#uploadBtn').change(function()
			{
				var val = $('#uploadFile').val();
				$('#file_text').val(val);
			});

		$("#info_user").hover(function()
			{
				$("#dropdown_info").css("display", "block");
			}, function()
			{
				$("#dropdown_info").css("display", "none");
			});

		$("#cart").hover(function()
			{
				$("#cart_info").css("display", "block");
			}, function()
			{
				$("#cart_info").css("display", "none");
			});

		$("#posting_project").validate(
			{
				invalidHandler: function(e, validator)
				{
					var errors = validator.numberOfInvalids();
					if (errors)
					{
						var message =  'Data yang Anda Masukan Tidak Sesuai';
						$("div.error-top span").html(message);
						$("div.error-top").show();
					} else
					{
						$("div.error-top").hide();
					}
				},
				rules:
				{
					nama:
					{
						required: true
					},
					keterangan:
					{
						required: true
					},
					kategori:
					{
						required: true
					},
					visibilitas:
					{
						required: true
					},
					negara:
					{
						required: true,
						min: 1
					},
					provinsi:
					{
						required: true,
						min: 1
					},
					kota:
					{
						required: true,
						min: 1
					},
					perkiraan_anggaran:
					{
						required: true
					},
					jenis_industri:
					{
						required: true,
						min: 1
					}
				},
				messages:
				{
					nama:
					{
						required: 'Isilah nama proyek Anda'
					},
					keterangan:
					{
						required: 'Isilah keterangan proyek Anda'
					},
					kategori:
					{
						required: 'Isilah kategori proyek Anda'
					},
					visibilitas:
					{
						required: 'Isilah visibilitas proyek Anda'
					},
					negara:
					{
						required: 'Isilah negara Anda berada',
						min: 'Isilah negara Anda berada'
					},
					provinsi:
					{
						required: 'Isilah provinsi Anda berada',
						min: 'Isilah provinsi Anda berada'
					},
					kota:
					{
						required: 'Isilah kota Anda berada',
						min: 'Isilah kota Anda berada'
					},
					perkiraan_anggaran:
					{
						required: 'Isilah perkiraan anggaran proyek Anda'
					},
					jenis_industri:
					{
						required: 'Isilah jenis industri proyek Anda',
						min: 'Isilah jenis industri proyek Anda'
					}
				},
				wrapper: 'error_box',
				onfocusout: false,
				onkeyup: false
			});

		$("#form_user").validate(
			{
				rules:
				{
					nama_jelas:
					{
						required: true,
						minlength: 5
					},
					no_telepon:
					{
						required: true,
						number: true,
						rangelength: [10, 20]
					},
					alamat:
					{
						required: true,
						minlength: 40
					},
					provinsi:
					{
						required: true,
						min: 1
					},
					kota:
					{
						required: true,
						min: 1
					},
					kode_pos:
					{
						required: true,
						number: true,
						rangelength: [3, 5]
					},
					jenis_kelamin:
					{
						required: true
					}
				},
				messages:
				{
					nama_jelas:
					{
						required: 'Isilah nama jelas Anda',
						minlegth: 'Isilah minimal 5 huruf nama jelas anda'
					},
					no_telepon:
					{
						required: 'Isilah nomor telepon atau handphone Anda',
						number: 'Isilah nomor telepon Anda sesuai dengan format',
					},
					alamat:
					{
						required: 'Isilah alamat Anda secara lengkap',
						minlength: 'Isilah minimal 40 karakter alamat Anda'
					},
					kode_pos:
					{
						required: 'Isilah kode pos Anda',
						number: 'Isilah kode pos Anda sesuai dengan format',
						rangelength: 'Isilah maksimal 3-5 digit angka kode pos Anda'
					},
					jenis_kelamin:
					{
						required: 'Pilih jenis kelamin Anda'
					},
					provinsi:
					{
						required: 'Pilih domisili provinsi Anda',
						min: 'Pilih domisili provinsi Anda'
					},
					kota:
					{
						required: 'Pilih domisili kota Anda',
						min: 'Pilih domisili kota Anda'
					}
				}
			});
		$("#form_pass").validate(
			{
				rules:
				{
					password:
					{
						required: true
					},
					new :
					{
						required: true
					},
					confirm:
					{
						required: true,
						equalTo: '#new'
					}
				},
				messages:
				{
					password:
					{
						required: 'Isilah password lama Anda'
					},
					new :
					{
						required: 'Isilah password baru yang Anda inginkan'
					},
					confirm:
					{
						required: 'Isilah konfirmasi password Anda sesuai dengan password baru yang anda masukkan',
						equalTo: 'Isilah konfirmasi password Anda sesuai dengan password baru yang anda masukkan'
					}
				}
			});

		$('#user_tab a').click(function(e)
			{
				e.preventDefault();
				$(this).tab('show');
			});
		$('#checkout-btn').click(function()
			{
				confirm('Are You Sure ??');
				var id = $(this).attr('data-val');
				var url = siteURL + "/page/shipping_data/" + id;
				if (id)
				{
					$('form#cart-form').get(0).setAttribute('action', siteURL + '/page/checkout'); //this works
					$('input.qty').attr('disabled', true);
					$('#checkout-conf').css('display', 'none');
					$('#edit-btn').css('display', 'none');
					$('.cart-remove').css('display', 'none');
					$('#finish-btn').css('display', 'block');
					$.ajax(
						{
							type: 'POST',
							url: url,
							cache: false,
							async: false,
							success: function(data)
							{
								var idCustomer = '';
								var idUser = id;
								var nama_jelas = '';
								var no_telepon = '';
								var alamat = '';
								var provinsi = 0;
								var kota = 0;
								var kode_pos = '';
								var jenis_kelamin = '';
								var pria = '';
								var wanita = '';
								var info = 'Anda belum mengisi data pribadi anda silahkan isi terlebih dahulu';
								if (data !== false)
								{
									idCustomer = data['detail'][0]['id'];
									idUser = data['detail'][0]['idUser'];
									nama_jelas = data['detail'][0]['nama_jelas'];
									no_telepon = data['detail'][0]['no_telepon'];
									alamat = data['detail'][0]['alamat'];
									provinsi = data['detail'][0]['provinsi'];
									kota = data['detail'][0]['kota'];
									kode_pos = data['detail'][0]['kode_pos'];
									jenis_kelamin = data['detail'][0]['jenis_kelamin'];
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
								$.each(data['provinsi'], function(id_drop, provinsi_drop)
									{
										if (id_drop == provinsi)
										{
											add += '<option value="' + id_drop + '" selected="selected">' + provinsi_drop + '</option>\n';
										}
										add += '<option value="' + id_drop + '">' + provinsi_drop + '</option>\n';
									});
								add += '</select>                    <\/div> ';
								add += "<\/div><!--end control-group--> ";
								add += "<div class=\"control-group\"> ";
								add += "<label for=\"kota\" class=\"control-label\">Kota <\/label>                    <div class=\"controls\"> ";
								//add += "<input type=\"text\" name=\"kota1\" value=\"" + kota + "\" id=\"kota\"\ required/>                    <\/div> ";
								add += '<select name="kota1" id="kota1" required="">\n';
								$.each(data['kota'], function(id_drop, kota_drop)
									{
										if (id_drop == kota)
										{
											add += '<option value="' + id_drop + '" selected="selected">' + kota_drop + '</option>\n';
										}
										add += '<option value="' + id_drop + '">' + kota_drop + '</option>\n';
									});
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
								$.each(data['provinsi'], function(id_drop, provinsi_drop)
									{
										add += '<option value="' + id_drop + '">' + provinsi_drop + '</option>\n';
									});
								add += '</select>                    <\/div> ';
								add += "<\/div><!--end control-group--> ";
								add += "<div class=\"control-group\"> ";
								add += "<label for=\"kota\" class=\"control-label\">Kota <\/label>                    <div class=\"controls\"> ";
								//add += "<input type=\"text\" name=\"kota\" value=\"\" id=\"kota\"\/>                    <\/div> ";
								add += '<select name="kota" id="kota" required="">\n';
								add += '<option value="0">- Pilih Satu -</option>\n';
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
								$("#kota").prop("disabled", true);
								if ($('#provinsi1').val() === '0')
								{
									$("#kota1").prop("disabled", true);
								} else
								{
									$("#kota1").prop("disabled", false);
								}
								$('#your-addresstab, #other-addresstab').click(function()
									{
										if ($('#type_address').length)
										{
											$("#type_address").val("");
											if (!$('#other-address').is(':visible'))
											{
												$("#type_address").val("1");
											} else
											{
												$("#type_address").val("0");
											}
										}
									});

								$('#provinsi1').change(function()
									{
										$("#kota1 > option").remove();
										var id_provinsi = $('#provinsi1').val();
										$.ajax(
											{
												type: "POST",
												url: siteURL + "/page/get_kota_drop/" + id_provinsi, //here we are calling our user controller and get_cities method with the country_id

												success: function(data)
												{
													if (data)
													{
														var isFirst = true;
														$.each(data, function(id, merk)
															{
																var opt = $('<option />');
																opt.val(id);
																opt.text(merk);
																if (isFirst)
																{
																	opt.attr('selected', true);
																	isFirst = false;
																}
																$('#kota1').append(opt);
															});
														$('#kota1').prop('disabled', false);
														if ($('#provinsi1').val() === '0')
														{
															$("#kota1").prop("disabled", true);
														} else
														{
															$("#kota1").prop("disabled", false);
														}
													} else
													{
														var opt = $('<option />');
														opt.val('0');
														opt.text('- Kota tidak tersedia -');
														$('#kota1').append(opt);
														$('#kota1').prop('disabled', true);
													}
												}
											});
									});

								$('#provinsi').change(function()
									{
										$("#kota > option").remove();
										var id_provinsi = $('#provinsi').val();
										$.ajax(
											{
												type: "POST",
												url: siteURL + "/page/get_kota_drop/" + id_provinsi, //here we are calling our user controller and get_cities method with the country_id

												success: function(data)
												{
													if (data)
													{
														var isFirst = true;
														$.each(data, function(id, merk)
															{
																var opt = $('<option />');
																opt.val(id);
																opt.text(merk);
																if (isFirst)
																{
																	opt.attr('selected', true);
																	isFirst = false;
																}
																$('#kota').append(opt);
															});
														$('#kota').prop('disabled', false);
														if ($('#provinsi').val() === '0')
														{
															$("#kota").prop("disabled", true);
														} else
														{
															$("#kota").prop("disabled", false);
														}
													} else
													{
														var opt = $('<option />');
														opt.val('0');
														opt.text('- Kota tidak tersedia -');
														$('#kota').append(opt);
														$('#kota').prop('disabled', true);
													}
												}
											});
									});
							}
							,
							error: function()
							{
								window.location = siteURL + '/page/page_login';
							}
						});
				} else
				{
					window.location = siteURL + '/page/page_login';
				}
			});

		$('.qty').blur(function()
			{
				$('form#cart-form').submit();
			});

		$('#ymbottom').click(
			function()
			{
				if( $(".ym-drop").is(":hidden") )
				$('.ym-drop').css('display', 'block');
				else
				{

					$('.ym-drop').css('display', 'none');
				}
			}
		);

		$('.iklan').bxSlider(
			{
				slideWidth: 287,
				minSlides: 2,
				maxSlides: 3,
				moveSlides: 1,
				controls: false,
				pager: false,
				slideMargin: 39.5
			});

		$('.hot-produk').bxSlider(
			{
				slideWidth: 135,
				minSlides: 2,
				maxSlides: 6,
				moveSlides: 1,
				slideMargin: 1
			});
		$('.produk-detail').bxSlider(
			{

				slideWidth: 370,
				pagerCustom: '#bx-pager',
				controls: false,
				slideMargin: 20
			});

		$('html').click(function()
			{
				$('#box').slideUp(500);
				//Hide the menus if visible
			});

		$('#user_login, #box').click(function(event)
			{
				event.stopPropagation();
				$('#box').slideDown(500);
			});



		$(".navbar li").each(function(i, e)
			{
				$(e).addClass("menu" + i)
			});



	});
