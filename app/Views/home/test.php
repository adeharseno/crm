<?= $this->extend('layout/master') ?>
<?= $this->section('content') ?>
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
      <div class="carousel-inner" role="listbox">
        <?php $noslide=1; foreach($slider as $slider) {  ?>
        <!-- Slide 1 -->
        <div class="carousel-item<?php if($noslide==1) { echo ' active'; } ?>" style="background-image: url(<?php echo base_url('assets/upload/image/'.$slider['gambar']) ?>)">
            <div class="container" style="max-width: 70%; text-align: left; padding-left: 2%; padding-right: 2%;">
                <h2><?php echo $slider['judul_galeri'] ?></h2>
            </div>
        </div>
        <?php $noslide++;} ?>
      </div>
      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>
      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>
    </div>
  </section><!-- End Hero -->
    <main id="main" style="background: #FFFFFF;">
      <div style="padding: 17px;">
        <?php 
          echo form_open(base_url('admin/kategori')); 
          echo csrf_field(); 
        ?>
        <h3>Silahkan Isi Data Customer</h3>
        <div class="form-group">
          <label for="title">Title</label>
          <select class="form-control" name="title" id="title" required>
            <option></option>
            <option>Bapak</option>
            <option>Ibu</option>
          </select>
        </div>
        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama Konsumen" autocomplete="off" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" id="email" placeholder="Example@domain.com" autocomplete="off" required>
        </div>
        <div class="form-group">
          <label for="handphone">No. Handphone</label>
          <input type="text" class="form-control" name="handphone" id="handphone" placeholder="0812xxx" autocomplete="off" required>
        </div>
        <div class="form-group">
          <label for="telepon">No. Telepon</label>
          <input type="text" class="form-control" name="telepon" id="telepon" placeholder="021xxxx" autocomplete="off" required>
        </div>
        <div class="form-group">
          <label for="produk">Nama Produk</label>
          <input type="text" class="form-control magicsearch" name="produk" id="produk" placeholder="Silahkan Pilih" autocomplete="off" required>
        </div>
        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Ingin tambahan disount 5%</label>
        </div>
        <div class="form-group">
          <label for="alamat">Alamat</label>
          <input type="text" class="form-control" name="alamat" id="alamat" placeholder="E.g Nama Alamat, Nama Jalan, Blok, RT/RW"  autocomplete="off" required>
        </div>
        <div class="form-group">
          <label for="province">Provinsi</label>
          <select name="province" id="province" class="form-control" required>
          </select>
        </div>
        <div class="form-group">
          <label for="district">Kota</label>
          <select name="district" id="district" class="form-control" required>
          </select>
        </div>
        <div class="form-group">
          <label for="subdistrict">Kecamatan</label>
          <select name="subdistrict" id="subdistrict" class="form-control" required>
          </select>
        </div>
        <div class="form-group">
          <label for="village">Kelurahan</label>
          <select name="village" id="village" class="form-control" required>
          </select>
        </div>
        <div class="form-group">
          <label for="postalcode">Kode Pos</label>
          <select name="postalcode" id="postalcode" class="form-control" required>
          </select>
        </div>
        <div class="form-group" style="text-align: center;">
          <input type="hidden" id="csrf" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>"/>
          <button type="submit" class="btn btn-primary">Kirim</button>
        </div>
      <?php echo form_close(); ?>
    </div>
    </main><!-- End #main -->

    <script>
        var dataSource;/* = [
            {id: 1, firstName: 'Tim', lastName: 'Cook'},
            {id: 2, firstName: 'Eric', lastName: 'Baker'},
            {id: 3, firstName: 'Victor', lastName: 'Brown'},
            {id: 4, firstName: 'Lisa', lastName: 'White'},
            {id: 5, firstName: 'Oliver', lastName: 'Bull'},
            {id: 6, firstName: 'Zade', lastName: 'Stock'},
            {id: 7, firstName: 'David', lastName: 'Reed'},
            {id: 8, firstName: 'George', lastName: 'Hand'},
            {id: 9, firstName: 'Tony', lastName: 'Well'},
            {id: 10, firstName: 'Bruce', lastName: 'Wayne'},
        ];*/
        
        $(document).ready(function(){
            console.log(dataSource)
            getProvice(function(d) {
                if(d == 'success'){getDataSource()}
            }, 'province');

            $('#province').on('change', function () {
              var id = $(this).val();
              if(id != '')
                getDistricts(function(d) {
                    if(d == 'success'){}
                }, 'district', id);
            });

            $('#district').on('change', function () {
              var id = $(this).val();
              if(id != '')
                getSubDistricts(function(d) {
                    if(d == 'success'){}
                }, 'subdistrict', id);
            });

            $('#subdistrict').on('change', function () {
              var id = $(this).val();
              if(id != '')
                getVillages(function(d) {
                    if(d == 'success'){}
                }, 'village', id);
            });

            $('#village').on('change', function () {
              var id = $(this).val();
              if(id != '')
                getPostalcodes(function(d) {
                    if(d == 'success'){}
                }, 'postalcode', id);
            });

            
        });


        function getDataSource(){
            var csrfHash = $('#csrf').val();
            $.ajax({
                type: "POST",
                url: "AjaxController/fetchProduct",
                data: {par : 1, csrf_test_name: csrfHash},
                success: function (msg) {
                  var data = $.parseJSON(msg);
                    $('#produk').magicsearch({
                        dataSource: data.html,
                        fields: ['sku', 'title', 'second_title'],
                        id: 'id',
                        format: '%title% · %second_title%',
                        multiple: true,
                        multiField: 'sku',
                        multiStyle: {
                            space: 5,
                            width: 130
                        }
                    });
                    $('#csrf').val(data.token);
                }
            });
        }

        function getProvice(callback, par){
            var csrfHash = $('#csrf').val();
            $.ajax({
                type: "POST",
                url: "AjaxController/fetchProvince",
                data: {par : 1, csrf_test_name: csrfHash},
                success: function (msg) {
                  var data = $.parseJSON(msg);
                    $('#'+par).html(data.html);
                    $('#csrf').val(data.token);
                    callback('success');
                }
            });
        }

        function getDistricts(callback, par, id){
            var csrfHash = $('#csrf').val();
            $.ajax({
                type: "POST",
                url: "AjaxController/fetchDistrict",
                data: {par : id, csrf_test_name: csrfHash},
                success: function (msg) {
                  var data = $.parseJSON(msg);
                    $('#'+par).html(data.html);
                    $('#csrf').val(data.token);
                    callback('success');
                }
            });
        }

        function getSubDistricts(callback, par, id){
            var csrfHash = $('#csrf').val();
            $.ajax({
                type: "POST",
                url: "AjaxController/fetchSubDistrict",
                data: {par : id, csrf_test_name: csrfHash},
                success: function (msg) {
                  var data = $.parseJSON(msg);
                    $('#'+par).html(data.html);
                    $('#csrf').val(data.token);
                    callback('success');
                }
            });
        }

        function getVillages(callback, par, id){
            var csrfHash = $('#csrf').val();
            $.ajax({
                type: "POST",
                url: "AjaxController/fetchVillage",
                data: {par : id, csrf_test_name: csrfHash},
                success: function (msg) {
                  var data = $.parseJSON(msg);
                    $('#'+par).html(data.html);
                    $('#csrf').val(data.token);
                    callback('success');
                }
            });
        }

        function getPostalcodes(callback, par, id){
            var csrfHash = $('#csrf').val();
            $.ajax({
                type: "POST",
                url: "AjaxController/fetchPostalcode",
                data: {par : id, csrf_test_name: csrfHash},
                success: function (msg) {
                  var data = $.parseJSON(msg);
                    $('#'+par).html(data.html);
                    $('#csrf').val(data.token);
                    callback('success');
                }
            });
        }
    </script>
<?= $this->endSection() ?>