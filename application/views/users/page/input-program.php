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
            <h6 class="mb-0">Data Program</h6>
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
                <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Realisasi Anggaran</th>
                <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sumber Dana</th>
                <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sasaran Lokasi</th>
                <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sasaran Orang</th>
                <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keluaran</th>
                <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Satuan</th>
                <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Target Keluaran</th>
                <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Realisasi Keluaran</th>
                <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Capaian Keluaran</th>
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
                  <td class="align-middle text-left text-sm"><span class="badge badge-sm bg-gradient-secondary"><?= format_rupiah($val->jumlah_anggaran); ?></span></td>
                  <td class="align-middle text-left text-sm"><span class="badge badge-sm bg-gradient-success"><?= format_rupiah($val->realisasi_anggaran); ?></span></td>
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
                      <span class="badge badge-sm bg-gradient-info"><?= $or->nik; ?></span>
                      <span class="badge badge-sm bg-gradient-info"><?= $or->nama; ?></span>
                      <br>
                    <?php }?>
                  </td>
                  <td class="align-middle text-left text-sm"><span class="badge badge-sm bg-gradient-secondary"><?= $val->keluaran; ?></span></td>
                  <td class="align-middle text-left text-sm"><span class="badge badge-sm bg-gradient-secondary"><?= get_namasatuan($val->satuan); ?></span></td>
                  <td class="align-middle text-left text-sm"><span class="badge badge-sm bg-gradient-secondary"><?= $val->target; ?></span></td>
                  <td class="align-middle text-left text-sm"><span class="badge badge-sm bg-gradient-info"><?= $val->realisasi_keluaran; ?></span></td>
                  <td class="align-middle text-left text-sm"><span class="badge badge-sm bg-gradient-success">
                    <?php 
                    if ($val->realisasi_keluaran>0){
                      $capaian = ($val->realisasi_keluaran/$val->target)*100;
                      echo number_format($capaian, 1) . ' %';
                    } else {
                      echo 'Belum Ada Capaian';
                    }
                    ?>
                  </span></td>
                  <td class="align-middle text-left text-sm">
                    <?php foreach($waktu as $wk){?>
                      <span class="badge badge-sm bg-gradient-secondary"><?= $wk; ?></span>
                      <br>
                    <?php }?>
                  </td>
                  <td class="align-middle text-left text-sm"><span class="badge badge-sm bg-gradient-secondary"><?= $val->keterangan; ?></span></td>
                  <td class="align-middle text-left text-sm"><span class="badge badge-sm bg-gradient-secondary"><?= get_nama_user($val->created_by); ?></span></td>
                  <td class="align-middle text-left"><span class="text-secondary text-xs font-weight-bold"><?= '<div class="btn-group"><a class="btn btn-info" title="Edit" href="'.base_url().'admin/form-input-program?id_data='.$val->id.'"><i class="fas fa-edit"></i></a><button class="btn btn-warning" title="Realisasi" onclick="update_realisasi(' . "'" . $val->id . "'" . ')"><i class="fas fa-dollar-sign"></i></button><button class="btn btn-danger" title="Hapus" onclick="hapus(' . "'" . $val->id . "'" . ')"><i class="fas fa-trash-alt"></i></button></div>'; ?></span></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_realisasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Realisasi Program</h1>
        <button type="button" class="btn bg-gradient-dark mb-0 btn-sm" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
      </div>
      <div class="modal-body">
        <form id="form_input">
          <div class="row">
            <div class="col-lg-6">
              <div class="mb-3">
                <label for="teammembersName" class="form-label">Jumlah Anggaran</label>
                <input type="hidden" class="form-control" id="indikator" name="indikator">
                <input type="hidden" class="form-control" id="id_edit" name="id_edit">
                <input type="text" class="form-control" id="jumlah_anggaran" name="jumlah_anggaran" pattern="^Rp\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" placeholder="Rp. " disabled>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="mb-3">
                <label for="teammembersName" class="form-label">Realisasi Anggaran</label>
                <input type="text" class="form-control" id="realisasi_anggaran" name="realisasi_anggaran" pattern="^Rp\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" placeholder="Rp. ">
              </div>
            </div>
            <!-- +++++++++++++++++++++++++++++++++++++++++++++++++ UNTUK KELUARAN +++++++++++++++++++++++++++++++++++++++++++++ -->
            <!-- +++++++++++++++++++++++++++++++++++++++++++++++++ UNTUK KELUARAN +++++++++++++++++++++++++++++++++++++++++++++ -->
            <div class="col-lg-4">
              <div class="mb-3">
                <label for="teammembersName" class="form-label">Target Keluaran</label>
                <input type="text" class="form-control" id="realisasi_anggaran" name="target_keluaran" placeholder="Target Keluaran" disabled>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="mb-3">
                <label for="teammembersName" class="form-label">Realisasi Keluaran</label>
                <input type="text" class="form-control" id="realisasi_anggaran" name="realisasi_keluaran" placeholder="Realisasi Keluaran">
              </div>
            </div>
            <div class="col-lg-4">
              <div class="mb-3">
                <label for="teammembersName" class="form-label">Capaian Keluaran</label>
                <input type="text" class="form-control" id="realisasi_anggaran" name="capaian_keluaran" placeholder="Capaian Keluaran" disabled>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="hstack gap-2 justify-content-end">
                <button type="button" class="btn btn-success" onclick="save_realisasi()"><i class="las la-save"></i> Simpan</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="las la-times"></i> Batal</button>
              </div>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>

<?php $this->load->view('users/layout/footer');?>
<?php $this->load->view('users/page/folder_js/format_rupiah');?>
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
<script type="text/javascript">
  function update_realisasi(id){
    $.ajax({
      dataType: 'json',
      url: '<?= base_url();?>InputProgram/getById/'+id,
      success: function ( data) {
        var capaian_keluaran = ((data.data[0].realisasi_keluaran / data.data[0].target) * 100).toFixed(1);
        $("#modal_realisasi").find("input[name='indikator']").val(69);
        $("#modal_realisasi").find("input[name='id_edit']").val(data.data[0].id);
        $("#modal_realisasi").find("input[name='jumlah_anggaran']").val(data.data[0].jumlah_anggaran).blur();
        $("#modal_realisasi").find("input[name='realisasi_anggaran']").val(data.data[0].realisasi_anggaran);
        $("#modal_realisasi").find("input[name='target_keluaran']").val(data.data[0].target);
        $("#modal_realisasi").find("input[name='realisasi_keluaran']").val(data.data[0].realisasi_keluaran);
        $("#modal_realisasi").find("input[name='capaian_keluaran']").val(capaian_keluaran+' %');
        $('#modal_realisasi').modal('show');

        $("#modal_realisasi").find("input[name='realisasi_keluaran']").on('keyup', function() {
          var realisasi_keluaran = parseFloat($(this).val());
          var capaian_keluaran = ((realisasi_keluaran / data.data[0].target) * 100).toFixed(1);
          $("#modal_realisasi").find("input[name='capaian_keluaran']").val(capaian_keluaran + ' %');
        });
      },
      error: function ( data ) {
        console.log('error');
      }
    });
  }

  function save_realisasi(){
    var indikator = $("#modal_realisasi").find("input[name='indikator']").val();
    var id = $("#modal_realisasi").find("input[name='id_edit']").val();
    var realisasi_anggaran = $("#modal_realisasi").find("input[name='realisasi_anggaran']").val();
    var realisasi_keluaran = $("#modal_realisasi").find("input[name='realisasi_keluaran']").val();

    url='<?= base_url();?>InputProgram/edit_realisasi/'+id;

    if(!realisasi_anggaran || !realisasi_keluaran)
    {
      toastr.error('Harap Isi Semua Kolom', 'Error Alert', {timeOut: 5000});
    }
    else {
      var form_data = new FormData();
      form_data.append('id', id);
      form_data.append('realisasi_anggaran', realisasi_anggaran);
      form_data.append('realisasi_keluaran', realisasi_keluaran);

      $.ajax({
        dataType: 'json',
        type:'POST',
        url: url,
        cache: false,
        contentType: false,
        processData: false,
        data:form_data,
        success : function (data, status)
        {
          if(data.status != 'error')
          {
            $(".modal").modal('hide');
            toastr.success(data.msg, 'Success Alert', {timeOut: 1000});
            toastr.success('Data Berhasil Disimpan', 'Success Alert', {timeOut: 1000});
            setTimeout(function() {
              location.reload();
            }, 1000);
          }
          else{
            toastr.error(data.msg, 'Error Alert', {timeOut: 5000});
          }
        },
      })
    }
  }
</script>
