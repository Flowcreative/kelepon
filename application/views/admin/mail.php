  <main>
      <header class="page-header page-header-dark bg-primary pb-10">
          <div class="container-xl px-4">
              <div class="page-header-content pt-4">
                  <div class="row align-items-center justify-content-between">
                      <div class="col-auto mt-4">
                          <h1 class="page-header-title">
                              <div class="page-header-icon"><i data-feather="file"></i></div>
                              Blast Email
                          </h1>
                      </div>
                      <!-- <div class="col-12 col-xl-auto mt-4">Optional page header content</div> -->
                  </div>
              </div>
          </div>
      </header>
      <!-- Main page content-->
      <div class="container-xl px-4 mt-n10">
        <div class="row">
            <div class="col-xxl-8 col-xl-8 mb-4">
                <div class="card card-header-actions h-100">
                    <div class="card-header">
                      List Template Email
                    </div>
                    <div class="card-body">
                      <?= $this->session->flashdata('message'); ?>
                      <div class="table-responsive">
                      <table id="datatablesSimple">
                          <thead>
                              <tr>
                                  <th class="text-center">No</th>
                                  <th class="text-center">Subjek</th>
                                  <th class="text-center">Pesan</th>
                                  <th class="text-center">Status</th>
                                  <th class="text-center">Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                                  <?php 
                                    $no = 1;
                                    foreach ($maillist as $m) {
                                     ?>
                                  <tr>
                                    
                                      <td><?= $no++; ?></td>
                                      <td><?= $m->subjek; ?></td>
                                      <td><?= html_escape($m->pesan); ?></td>
                                      <td><? if ($m->status == 'I') {
                                        echo "PROSES KIRIM";
                                      }elseif($m->status == 'S'){
                                        echo "SUKSES TERKIRIM";
                                      } ?></td>
                                      <td class="text-center" >
                                         <a href="#" id="edit" data-bs-toggle="modal" data-bs-target="#edit" data-id="<?= $m->id_temp; ?>">anjay</a>
                                      </td>
                                  </tr>
                                  <?php } ?>
                          </tbody>
                      </table>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-xl-4 mb-4">
                <div class="card card-header-actions h-100">
                    <div class="card-header">
                      Tombol Aksi
                    </div>
                    <div class="card-body">

                      <a href="#" class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#tambah">
                         <i class="fas fa-plus"></i>Tambah Blast
                      </a>
                      <a href="#" class="btn btn-danger" type="button">
                         <i class="fas fa-stop-circle"></i>Batalkan Semua
                      </a>
                      <div class="data-body mt-4">
                        
                      </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <!--=========================== Data Pangkalan ======================================-->

      <!-- modal untuk tambah email yah -->
      <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="addmail" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="uploadfotoTitle">Tambah Blast Email</h5>
                  <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form method="post" action="<?= base_url('core/addmail');  ?>">
                <div class="form-group">
                  <label>Subjek</label>
                  <input type="text" class="form-control form-control-solid" name="subjek" required>
                </div>
                <div class="form-group">
                  <label>Pesan</label>
                  <textarea id="pesan" class="form-control form-control-solid" name="pesan" rows="3"></textarea>
                
                </div>
              <div class=" modal-footer">
                  <button class="btn btn-red btn-sm" type="button" data-bs-dismiss="modal">Close</button>
                  <button class="btn btn-primary btn-sm" type="submit">Tambah</button>
              </div>
              </form>
              </div>
          </div>
      </div>
      <!-- batas akhir modal tambah email -->

      <!-- modal untuk edit -->
      <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="editmail" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="uploadfotoTitle">Tambah Blast Email</h5>
                  <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form method="post" action="<?= base_url('core/addmail');  ?>">
                <div class="form-group">
                  <label>Subjek</label>
                  <input type="text" class="form-control form-control-solid" name="subjek" required>
                </div>
                <div class="form-group">
                  <label>Pesan</label>
                  <textarea id="pesan" class="form-control form-control-solid" name="pesan" rows="3"></textarea>
                
                </div>
              <div class=" modal-footer">
                  <button class="btn btn-red btn-sm" type="button" data-bs-dismiss="modal">Close</button>
                  <button class="btn btn-primary btn-sm" type="submit">Tambah</button>
              </div>
              </form>
              </div>
          </div>
      </div>

      <!-- akhir nodal untuk edit -->
      <script type="text/javascript">
       $(document).ready(function(){
        $('#edit').on('show.bs.modal', function (e) {
            var userDat = $(e.relatedTarget).data('id');
            /* fungsi AJAX untuk melakukan fetch data */
            $.ajax({
                type : 'post',
                url : '<?= base_url("core/praedit") ?>',
                /* detail per identifier ditampung pada berkas detail.php yang berada di folder application/view */
                data :  'iddata='+ userDat,
                /* memanggil fungsi getDetail dan mengirimkannya */
                success : function(data){
                $('.modal-data').html(data);
                /* menampilkan data dalam bentuk dokumen HTML */
                }
            });
         });
      });
    </script>
    <script>
      CKEDITOR.replace( 'pesan' );
    </script>

