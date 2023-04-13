<?= $this->session->flashdata('pesan'); ?>
<div class="card">
              <div class="card-header">
                <a href="<?= base_url('alat/tambah')?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Alat</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-striped">
                  <thead>
                  <tr class="text-center">
                    <th>No</th>
                    <th>Nama Alat</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <?php $no = 1;
                  foreach($alat as $Alt) : ?> 
                  <tbody>
                  <tr class="text-center">
                    <td><?= $no++ ?></td>
                    <td><?= $Alt->nama_alat ?></td>
                    <td>
                        <button data-toggle="modal" data-target="#edit<?= $Alt->id_alat ?>" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i></button>
                        <a href="<?= base_url('alat/delete_proses/' . $Alt->id_alat) ?>" class="btn btn-danger btn-sm"
                          onclick="return confirm('Apakah Anda Yakin Menghapus Data ini?')"><i class="fas fa-trash"></i>
                        </a>
                    </td>
                  </tr>
            </tbody>
                <?php endforeach?>
        </table>
    </div>
</div>

<!-- Modal Edit -->
<?php foreach($alat as $Alt) : ?>
<div class="modal fade" id="edit<?= $Alt->id_alat ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Alat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              <form action="<?=base_url('alat/edit_proses/' . $Alt->id_alat)?>"method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Alat</label>
                    <input type="text" class="form-control" name="nama_alat" value="<?= $Alt->nama_alat ?>">
                    <?= form_error('nama_alat', '<div class="text-small text-danger">', '</div>');?>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                </div>
              </form>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>
