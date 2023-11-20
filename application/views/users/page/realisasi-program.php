<?php $this->load->view('users/layout/sidebar');?>
<?php $this->load->view('users/layout/header');?>
<style>
  .long-content-cell {
    max-width: 450px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }
</style>
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0 p-3">
        <div class="row">
          <div class="col-6 d-flex align-items-center">
            <h6 class="mb-0">Realisasi Program</h6>
          </div>
          <div class="col-6 text-end pb-2">
            <a class="btn bg-gradient-dark mb-0 btn-sm" href="<?= base_url();?>admin/form-input-program" target="_blank"><i class="fas fa-plus" aria-hidden="true"></i>&nbsp;Tambah Data</a>
          </div>
        </div>
      </div>
      <div class="card-header pb-3 p-3">
        <form action="<?= base_url();?>admin/p3ke-individu" method="POST">
          <div class="row">

            <div class="col-6 d-flex align-items-center">
              <input type="number" class="form-control" id="tahun" name="tahun" placeholder="Masukkan Tahun" value="<?= isset($tahun) ? $tahun : ''; ?>">
            </div>
            <div class="col-6 text-end">
              <button class="btn btn-primary mb-0" type="submit"><i class="fas fa-search"></i>&nbsp;Cari</button>
              <button class="btn btn-danger mb-0" type="button" data-bs-toggle="modal" data-bs-target="#export-data"><i class="fas fa-download" aria-hidden="true"></i>&nbsp;Export Data</button>
            </div>

          </div>
        </form>
      </div>
      <div class="card-footer pb-3 p-3"></div>
    </div>

    <div class="card mb-4">
      <div class="card-header pb-0 p-3">

      </div>
      <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">

          <table class="table align-items-center mb-0" id="tabel_input_program">
            <thead>
              <tr>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Kegiatan</th>
                <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah Anggaran</th>
                <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sumber Dana</th>
                <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sasaran Lokasi</th>
                <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sasaran Orang</th>
                <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keluaran</th>
                <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Satuan</th>
                <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Target Keluaran</th>
                <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Waktu</th>
                <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan</th>
                <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pengisi</th>
                <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $count = 0;
              foreach ($get_input_program as $val) {
                $count = $count + 1;
                $lokasi = json_decode($val->sasaran_lokasi, FALSE);
                $orang = json_decode($val->sasaran_orang, FALSE);
                $waktu = json_decode($val->waktu);
                ?>
                <tr>
                  <td class="align-middle text-center text-sm"><span class="badge badge-sm bg-gradient-info"><?= $count; ?></span></td>
                  <td class="align-middle text-left text-sm"><span class="badge badge-sm bg-gradient-primary"><?= $val->nama_kegiatan; ?></span></td>
                  <td class="align-middle text-left text-sm"><span class="badge badge-sm bg-gradient-success"><?= format_rupiah($val->jumlah_anggaran); ?></span></td>
                  <td class="align-middle text-left text-sm"><span class="badge badge-sm bg-gradient-secondary"><?= get_sumberdana($val->sumber_dana); ?></span></td>
                  <td class="align-middle text-left text-sm">
                    <?php foreach($lokasi as $lok){?>
                      <span class="badge badge-sm bg-gradient-info"><?= 'KECAMATAN '.$lok->nama_kecamatan; ?></span>
                      <span class="badge badge-sm bg-gradient-info"><?= 'DESA '.$lok->nama_desa; ?></span>
                      <br>
                    <?php }?>
                  </td>
                  <td class="align-middle text-left text-sm">
                    <?php foreach($orang as $or){?>
                      <span class="badge badge-sm bg-gradient-success"><?= $or->nik; ?></span>
                      <span class="badge badge-sm bg-gradient-success"><?= $or->nama; ?></span>
                      <br>
                    <?php }?>
                  </td>
                  <td class="align-middle text-left text-sm"><span class="badge badge-sm bg-gradient-secondary"><?= $val->keluaran; ?></span></td>
                  <td class="align-middle text-left text-sm"><span class="badge badge-sm bg-gradient-secondary"><?= $val->satuan; ?></span></td>
                  <td class="align-middle text-left text-sm"><span class="badge badge-sm bg-gradient-danger"><?= $val->target; ?></span></td>
                  <td class="align-middle text-left text-sm">
                    <?php foreach($waktu as $wk){?>
                      <span class="badge badge-sm bg-gradient-secondary"><?= $wk; ?></span>
                      <br>
                    <?php }?>
                  </td>
                  <td class="align-middle text-left text-sm"><span class="badge badge-sm bg-gradient-secondary"><?= $val->keterangan; ?></span></td>
                  <td class="align-middle text-left text-sm"><span class="badge badge-sm bg-gradient-secondary"><?= get_nama_user($val->created_by); ?></span></td>
                  <td class="align-middle text-left"><span class="text-secondary text-xs font-weight-bold"><?= '<div class="btn-group"><button class="btn btn-info" title="Edit" onclick="update(' . "'" . $val->id . "'" . ')"><i class="fas fa-edit"></i></button><button class="btn btn-danger" title="Hapus" onclick="hapus(' . "'" . $val->id . "'" . ')"><i class="fas fa-trash-alt"></i></button></div>'; ?></span></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('users/layout/footer');?>
<script type="text/javascript">
  function expandContent(element) {
    const content = element.innerHTML;
    const expandedContent = document.createElement("div");
    expandedContent.className = "expanded-content";
    expandedContent.innerHTML = content;

    Swal.fire({
      title: "Rincian Masalah",
      html: expandedContent.outerHTML,
      confirmButtonText: "Tutup",
      width: "50%"
    });
  }
</script>
<script>
  $(document).ready( function () {
    $('#tabel_input_program').DataTable({
      language: {
        paginate: {
          previous: '<<',
          next: '>>'
        }
      },
      info: false,
      responsive: true
    });
  } );
</script>