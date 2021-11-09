<?= $this->extend('layout/master') ?>
<?= $this->section('content') ?>
  <style>
    .btn-primary.disabled, .btn-primary:disabled {
        color: #fff;
        background-color: rgb(0 0 0 / 50%);
        border-color: rgb(0 0 0 / 50%);
    }
  </style>
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
      <div class="carousel-inner" role="listbox">
        <?php $noslide=1; foreach($slider as $slider) {  ?>
        <!-- Slide 1 -->
        <div class="carousel-item<?php if($noslide==1) { echo ' active'; } ?>" style="background-image: url(<?php echo base_url('assets/upload/image/'.$slider['gambar']) ?>)">
            <div class="container" style="text-align: left; padding-left: 2%; padding-right: 2%;">
                <!-- <h2><?php echo $slider['judul_galeri'] ?></h2> -->
            </div>
        </div>
        <?php $noslide++;} ?>
      </div>
      <!-- <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>
      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a> -->
    </div>
  </section><!-- End Hero -->
    <main id="main" style="background: #FFFFFF;">
      <div style="padding: 17px;">
        <?php
            $errors = session()->getFlashdata('errors');
            if(!empty($errors)){ ?>
            <div class="alert alert-danger" role="alert">
                Ups! Ada kesalahan saat input data, yaitu:
                <ul>
                <?php foreach ($errors as $error) : ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach ?>
                </ul>
            </div>
            <?php
            }
        ?>
        <?php 
          echo form_open(base_url('cust-register'), ['enctype' => 'multipart/form-data']); 
          echo csrf_field(); 
        ?>
        <label class="mb-4 title" style="font-size: 1.3rem;">Silahkan Isi Data Anda</label>
        <div class="form-group row">
          <div class="col-12 col-md-6 mb-2">
            <label for="handphone" class="required" style="font-weight: bold; font-size: 15px; ">No. Handphone</label>
            <input type="text" class="form-control numbersOnly" name="handphone" id="handphone" placeholder="08xxxx" autocomplete="off" value="<?php echo set_value('handphone') ? set_value('handphone') : $detail['phone_number'] ?>" required>
            <label style="font-size: 12px; display: none;" id="not-found">No. Handphone belum terdaftar</label>
            <label style="font-size: 12px; display: none;" id="not-valid">Format No. Handphone tidak valid</label>
          </div>
          <div class="col-12 col-md-6 mb-2">
            <label for="email" class="required" style="font-weight: bold; font-size: 15px; ">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="example@domain.com" autocomplete="off" value="<?php echo set_value('email') ?>" disabled required>
            <label style="font-size: 12px;">Pastikan email Anda benar karena reward akan dikirimkan melalui email</label>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-12 col-md-6 mb-1">
            <label for="title" class="required" style="font-weight: bold; font-size: 15px; ">Title</label>
            <select class="form-control" name="title" id="title" disabled required>
              <option><?php echo set_value('title') ?></option>
              <option value="220">Bapak</option>
              <option value="221">Ibu</option>
            </select>
            <input type="hidden" id="title_name" name="title_name">
          </div>
          <div class="col-12 col-md-6 mb-2">
            <label for="nama" class="required" style="font-weight: bold; font-size: 15px; ">Nama</label>
            <input type="text" class="form-control" name="nama" id="nama" autocomplete="off" value="<?php echo set_value('nama') ?>" disabled required>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-12 col-md-6 mb-2">
            <label for="telepon" style="font-weight: bold; font-size: 15px; ">No. Telepon</label>
            <input type="text" class="form-control numbersOnly" name="telepon" id="telepon" placeholder="021xxxx" autocomplete="off" value="<?php echo set_value('telepon') ?>" disabled>
          </div>
          <div class="col-12 col-md-6 mb-2">
            <label for="alamat" class="required" style="font-weight: bold; font-size: 15px; ">Alamat</label>
            <textarea class="form-control" name="alamat" id="alamat" rows="2" autocomplete="off" disabled required>
              <?php echo set_value('alamat') ?>
            </textarea>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-12 col-md-6 mb-2">
            <label for="province" class="required" style="font-weight: bold; font-size: 15px; ">Propinsi</label>
            <select name="province" id="province" class="form-control" disabled required>
            </select>
            <input type="hidden" id="h_province" name="h_province" value="<?php echo set_value('province') ?>">
            <input type="hidden" id="province_name" name="province_name" value="<?php echo set_value('province_name') ?>">
          </div>
          <div class="col-12 col-md-6 mb-2">
            <label for="district" class="required" style="font-weight: bold; font-size: 15px; ">Kota</label>
            <select name="district" id="district" class="form-control" disabled required>
            </select>
            <input type="hidden" id="h_district" name="h_district" value="<?php echo set_value('district') ?>">
            <input type="hidden" id="district_name" name="district_name" value="<?php echo set_value('district_name') ?>">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-12 col-md-6 mt-2">
            <label for="subdistrict" class="required" style="font-weight: bold; font-size: 15px; ">Kecamatan</label>
            <select name="subdistrict" id="subdistrict" class="form-control" disabled required>
            </select>
            <input type="hidden" id="h_subdistrict" name="h_subdistrict" value="<?php echo set_value('subdistrict') ?>">
            <input type="hidden" id="subdistrict_name" name="subdistrict_name" value="<?php echo set_value('subdistrict_name') ?>">
          </div>
          <div class="col-12 col-md-6 mt-2">
            <label for="village" class="required" style="font-weight: bold; font-size: 15px; ">Kelurahan</label>
            <select name="village" id="village" class="form-control" disabled required>
            </select>
            <input type="hidden" id="h_village" name="h_village" value="<?php echo set_value('village') ?>">
            <input type="hidden" id="village_name" name="village_name" value="<?php echo set_value('village_name') ?>">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-12 col-md-6 mt-2" style="font-weight: bold; font-size: 15px; ">
            <label for="postalcode" class="required">Kode Pos</label>
            <select name="postalcode" id="postalcode" class="form-control" disabled required>
            </select>
            <input type="hidden" id="h_postalcode" name="h_postalcode" value="<?php echo set_value('postalcode') ?>">
            <input type="hidden" id="postalcode_name" name="postalcode_name" value="<?php echo set_value('postalcode_name') ?>">
          </div>
        </div>
        <input type="hidden" value="<?= $code ?>" name='code'>
        <hr class="solid mt-2 mb-3 d-none">
        <label class="mb-3 d-none" style="font-size: 13px;"><b>Produk yang ingin gratis servis ?</b></label>
        <div class="form-group row d-none">
            <div class="col-4 col-md-3 mt-2" style="font-weight: bold; font-size: 15px; ">
              <label for="product">Produk</label>
            </div>
            <div class="col-8 col-md-9 mb-2">
              <div class="col-12 mb-2">
                <select id="produk"
                        name="produk"
                        class="form-control"
                        title="Pilih produk Anda" disabled>
                    <option value="">Pilih produk Anda</option>
                </select>
              </div>
            </div>
        </div>
        <hr class="solid mt-2 mb-3">
        <div class="form-group row">
          <div class="col-12 col-md-12 mt-2" >
            <label for="kritiksaran" style="font-weight: bold; font-size: 15px; ">Kritik & Saran</label>
            <textarea class="form-control" name="kritiksaran" id="kritiksaran" rows="2" disabled></textarea>
          </div>
        </div>
        <!-- <div class="form-group row">
          <div class="col-12 col-md-12 mt-2" >
            <label for="uploadinvoice" style="font-weight: bold; font-size: 15px;display:block;margin-bottom: 8px;">Upload Foto Invoice</label>

            <input type="file" name="file" id="file" class="d-none"/> 
            <label for="uploadinvoice" class="btn-upload">Select file</label>
            <img src="https://iplbi.or.id/wp-content/plugins/pl-platform/engine/ui/images/image-preview.png" id="imagePreview" alt="Preview Image" width="140px"/>
          </div>
        </div> -->
        <hr class="solid mt-2 mb-3">
        <div class="form-group">
          <label for="syarat" style="font-weight: bold;" class="mb-2 mt-2">Syarat & Ketentuan</label>
          <?php echo $konfigurasi['syaratketentuan'] ?>
        </div>
        <hr class="solid mt-2 mb-3">
        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" id="setuju" name="setuju" require>
            <label class="form-check-label" for="exampleCheck1">Saya setuju dengan <b>Syarat & Ketentuan</b> yang berlaku.</label>
          </input>
        </div>
        <hr class="solid mt-3 mb-2">
        <div class="form-group" style="text-align: center;">
          <input type="hidden" id="csrf" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>"/>
          <input type="hidden" id="customer_id" name="customer_id" value=""/>
          <button type="submit" id="kirim" class="btn btn-md btn-custom mt-3">Kirim</button>
        </div>
      <?php echo form_close(); ?>
    </div>
    </main><!-- End #main -->

    <script>
        var dataSource;
        
        $(document).ready(function(){

          jQuery('.numbersOnly').keyup(function () { 
              this.value = this.value.replace(/[^0-9\.]/g,'');
          });

          $('#uploadinvoice').change(function(){			
            readImgUrlAndPreview(this);
            function readImgUrlAndPreview(input){
              if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e) {			            	
                            $('#imagePreview').attr('src', e.target.result);
                    }
                      };
                      reader.readAsDataURL(input.files[0]);
                }	
          });

          $('#kirim').prop('disabled', true);

          $('#setuju').on('change', function(){
            if(this.checked) {
              $('#kirim').prop('disabled', false);
            }else{
              $('#kirim').prop('disabled', true);
            }
          });

          if($('#handphone').val() != '')
            setField($('#handphone').val());

          if($('#h_province').val() != ''){
            var prov = $('#h_province').val();
            var customer_id = $('#customer_id').val();
            getProvice(function(d) {
                if(d == 'success'){
                  getDataSource(function(d) {
                      if(d == 'success'){}
                  }, 'produk', customer_id);
                  var dist = $('#h_district').val();
                  getDistricts(function(d) {
                      if(d == 'success'){
                        var subd = $('#h_subdistrict').val();
                        getSubDistricts(function(d) {
                            if(d == 'success'){
                              var vill = $('#h_village').val();
                              getVillages(function(d) {
                                  if(d == 'success'){
                                    var post = $('#h_postalcode').val();
                                    getPostalcodes(function(d) {
                                        if(d == 'success'){}
                                    }, 'postalcode', vill, post);
                                  }
                              }, 'village', subd, vill);
                            }
                        }, 'subdistrict', dist, subd);
                      }
                  }, 'district', prov, dist);
                }
            }, 'province', prov);
          }else{
            var customer_id = $('#customer_id').val();
            getProvice(function(d) {
                if(d == 'success'){
                  getDataSource(function(d) {
                      if(d == 'success'){}
                  }, 'produk', customer_id);
                }
            }, 'province', null);
          }

            $('#handphone').on('blur', function(){
              var hp = $(this).val();
              setField(hp);
            });

            $('#title').on('change', function () {
              $('#title_name').val($("#title option:selected").text());
            });

            $('#province').on('change', function () {
              loadName($(this));
              var id = $(this).val();
              if(id != '')
                getDistricts(function(d) {
                    if(d == 'success'){}
                }, 'district', id, null);
            });

            $('#district').on('change', function () {
              loadName($(this));
              var id = $(this).val();
              if(id != '')
                getSubDistricts(function(d) {
                    if(d == 'success'){}
                }, 'subdistrict', id, null);
            });

            $('#subdistrict').on('change', function () {
              loadName($(this));
              var id = $(this).val();
              if(id != '')
                getVillages(function(d) {
                    if(d == 'success'){}
                }, 'village', id, null);
            });

            $('#village').on('change', function () {
              loadName($(this));
              var id = $(this).val();
              if(id != '')
                getPostalcodes(function(d) {
                    if(d == 'success'){}
                }, 'postalcode', id, null);
            });

            $('#postalcode').on('change', function () {
              loadName($(this));
            });

        });

        function setField(hp){
          if(hp.length >= 10)
            getProfile(function(d) {
                if(d == 'success'){}
            }, hp);
          else {
            $("#title").val('');
            $('#nama').val('');
            $('#email').val('');
            $('#alamat').val('');
            $('#customer_id').val('');
            $('#province_name').val('');
            $('#district_name').val('');
            $('#subdistrict_name').val('');
            $('#village_name').val('');
            $('#postalcode_name').val('');
            $('#province').val('');
            $('#district').val('');
            $('#subdistrict').val('');
            $('#village').val('');
            $('#postalcode').val('');
            $("#kritiksaran").val('');
            $('#produk').val('');
            $('#produk').html('');
            $('#title_name').val('');
            $('#produk').append('<option value="">Pilih produk Anda</option>');
            $("#title").prop('disabled', true);
            $("#telepon").prop('disabled', true);
            $('#nama').prop('disabled', true);
            $('#email').prop('disabled', true);
            $('#alamat').prop('disabled', true);
            $('#customer').prop('disabled', true);
            $('#province').prop('disabled', true);
            $('#district').prop('disabled', true);
            $('#subdistrict').prop('disabled', true);
            $('#village').prop('disabled', true);
            $('#postalcode').prop('disabled', true);
            $('#produk').prop('disabled', true);
            $("#kritiksaran").prop('disabled', true);
            $('#not-found').hide();
            $('#not-valid').show();
          }
        }

        function getProfile(callback, hp){
          var csrfHash = $('#csrf').val();
          $.ajax({
                type: "POST",
                url: "AjaxController/fetchCustomerProfile",
                data: {par : hp, csrf_test_name: csrfHash},
                success: function (msg) {
                  var data = $.parseJSON(msg);
                  if(data.item.status == 200){
                    $("#title option[value='"+data.item.customer_title_code+"']").prop('selected', true);
                    $('#nama').val(data.item.customer_name);
                    $('#email').val(data.item.customer_email);
                    $('#alamat').val(data.item.address);
                    $('#customer_id').val(data.item.customer_id);
                    $('#province_name').val(data.item.province);
                    $('#district_name').val(data.item.city);
                    $('#subdistrict_name').val(data.item.district);
                    $('#village_name').val(data.item.village);
                    $('#postalcode_name').val(data.item.postal_code);
                    $('#produk').html('');
                    $('#title_name').val(data.item.customer_title);
                    $('#produk').append('<option value="">Pilih produk Anda</option>');
                    $("#title").prop('disabled', false);
                    $("#telepon").prop('disabled', false);
                    $('#nama').prop('disabled', false);
                    $('#email').prop('disabled', false);
                    $('#alamat').prop('disabled', false);
                    $('#customer').prop('disabled', false);
                    $('#province').prop('disabled', false);
                    $('#district').prop('disabled', false);
                    $('#subdistrict').prop('disabled', false);
                    $('#village').prop('disabled', false);
                    $('#postalcode').prop('disabled', false);
                    $("#kritiksaran").prop('disabled', false);
                    $('#not-found').hide();
                    $('#not-valid').hide();

                    getProvice(function(d) {
                        if(d == 'success'){
                          getDistricts(function(d) {
                              if(d == 'success'){
                                getSubDistricts(function(d) {
                                    if(d == 'success'){
                                      getVillages(function(d) {
                                          if(d == 'success'){
                                            getPostalcodes(function(d) {
                                                if(d == 'success'){}
                                            }, 'postalcode', data.item.village_id, data.item.postal_code_id);
                                          }
                                      }, 'village', data.item.district_id, data.item.village_id);
                                    }
                                }, 'subdistrict', data.item.city_id, data.item.district_id);
                              }
                          }, 'district', data.item.province_id, data.item.city_id);
                        }
                    }, 'province', data.item.province_id); 
                  }else{
                    $("#title").val('');
                    $('#nama').val('');
                    $('#email').val('');
                    $('#alamat').val('');
                    $('#customer_id').val('');
                    $('#province_name').val('');
                    $('#district_name').val('');
                    $('#subdistrict_name').val('');
                    $('#village_name').val('');
                    $('#postalcode_name').val('');
                    $('#province').val('');
                    $('#district').val('');
                    $('#subdistrict').val('');
                    $('#village').val('');
                    $('#postalcode').val('');
                    $("#kritiksaran").val('');
                    $('#produk').val('');
                    $('#produk').html('');
                    $('#title_name').val('');
                    $('#produk').append('<option value="">Pilih produk Anda</option>');
                    $("#title").prop('disabled', true);
                    $("#telepon").prop('disabled', true);
                    $('#nama').prop('disabled', true);
                    $('#email').prop('disabled', true);
                    $('#alamat').prop('disabled', true);
                    $('#customer').prop('disabled', true);
                    $('#province').prop('disabled', true);
                    $('#district').prop('disabled', true);
                    $('#subdistrict').prop('disabled', true);
                    $('#village').prop('disabled', true);
                    $('#postalcode').prop('disabled', true);
                    $('#produk').prop('disabled', true);
                    $("#kritiksaran").prop('disabled', true);
                    $('#not-found').show();
                    $('#not-valid').hide();
                  }

                  getDataSource(function(d) {
                      if(d == 'success'){}
                  }, 'produk', data.item.customer_id);

                  //$('#'+par).html(data.html);
                  $('#csrf').val(data.token);
                  callback('success');
                }
            });  
        }

        function loadName(element) {
            $('#' + element.attr('id') + '_name').val($('#' + element.attr('id') + ' option:selected').text());
        }

        function getDataSource(callback, id, key){
            var csrfHash = $('#csrf').val();
            $.ajax({
                type: "POST",
                url: "AjaxController/fetchProduct",
                data: {par : id, key : key, csrf_test_name: csrfHash},
                success: function (msg) {
                  var data = $.parseJSON(msg);
                    if(data.html){
                      $('#'+id).prop('disabled', false);
                      $('#'+id).append(data.html);
                      $('#csrf').val(data.token);
                      callback('success');
                    }
                }
            });
        }

        function getProvice(callback, par, key){
            var csrfHash = $('#csrf').val();
            $.ajax({
                type: "POST",
                url: "AjaxController/fetchProvince",
                data: {key : key, csrf_test_name: csrfHash},
                success: function (msg) {
                  var data = $.parseJSON(msg);
                    $('#'+par).html(data.html);
                    $('#csrf').val(data.token);
                    $('#province_name').val( $('#'+par+' option:selected').text());
                    callback('success');
                }
            });
        }

        function getDistricts(callback, par, id, key){
            var csrfHash = $('#csrf').val();
            $.ajax({
                type: "POST",
                url: "AjaxController/fetchDistrict",
                data: {par : id, key : key, csrf_test_name: csrfHash},
                success: function (msg) {
                  var data = $.parseJSON(msg);
                    $('#'+par).html(data.html);
                    $('#csrf').val(data.token);
                    $('#district_name').val( $('#'+par+' option:selected').text());
                    callback('success');
                }
            });
        }

        function getSubDistricts(callback, par, id, key){
            var csrfHash = $('#csrf').val();
            $.ajax({
                type: "POST",
                url: "AjaxController/fetchSubDistrict",
                data: {par : id, key : key, csrf_test_name: csrfHash},
                success: function (msg) {
                  var data = $.parseJSON(msg);
                    $('#'+par).html(data.html);
                    $('#csrf').val(data.token);
                    $('#subdistrict_name').val( $('#'+par+' option:selected').text());
                    callback('success');
                }
            });
        }

        function getVillages(callback, par, id, key){
            var csrfHash = $('#csrf').val();
            $.ajax({
                type: "POST",
                url: "AjaxController/fetchVillage",
                data: {par : id, key : key, csrf_test_name: csrfHash},
                success: function (msg) {
                  var data = $.parseJSON(msg);
                    $('#'+par).html(data.html);
                    $('#csrf').val(data.token);
                    $('#village_name').val( $('#'+par+' option:selected').text());
                    callback('success');
                }
            });
        }

        function getPostalcodes(callback, par, id, key){
            var csrfHash = $('#csrf').val();
            $.ajax({
                type: "POST",
                url: "AjaxController/fetchPostalcode",
                data: {par : id, key : key, csrf_test_name: csrfHash},
                success: function (msg) {
                  var data = $.parseJSON(msg);
                    $('#'+par).html(data.html);
                    $('#csrf').val(data.token);
                    $('#postalcode_name').val( $('#'+par+' option:selected').text());
                    callback('success');
                }
            });
        }
    </script>
<?= $this->endSection() ?>