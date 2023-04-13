 <form action="<?=base_url('alat/tambah_proses')?>"method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Alat</label>
                    <input type="text" class="form-control" name="nama_alat" placeholder="Masukan Nama Alat">
                    <?= form_error('nama_alat', '<div class="text-small text-danger">', '</div>');?>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-body">
                  <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                </div>
              </form>