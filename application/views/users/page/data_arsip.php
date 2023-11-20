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
            <h6 class="mb-0">Data Arsip</h6>
          </div>
          <div class="col-6 text-end pb-2">
            <button class="btn bg-gradient-light mb-0 btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#upload-data"><i class="fas fa-upload"></i>&nbsp;Upload Excel</button>
            <button class="btn bg-gradient-dark mb-0 btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#addmembers"><i class="fas fa-plus" aria-hidden="true"></i>&nbsp;Tambah Data</button>
          </div>
        </div>
      </div>
      <div class="card-header pb-3 p-3">
        <form action="<?= base_url();?>admin" method="POST">
          <div class="row">

            <div class="col-4 d-flex align-items-center">
              <input type="number" class="form-control" id="tahun" name="tahun" placeholder="Masukkan Tahun" value="<?= isset($tahun) ? $tahun : ''; ?>">
            </div>
            <div class="col-4 d-flex align-items-center">
              <select name="nama_opd" id="nama_opd" class="form-control">
                <?php
                foreach ($get_opd as $val) {
                  $selected = ($val->nama_opd === $nama_opd) ? 'selected' : '';
                  echo "<option value='" . $val->nama_opd . "' $selected>" . $val->nama_opd . "</option>";
                }
                ?>
              </select>
            </div>
            <div class="col-4 text-end">
              <button class="btn btn-primary mb-0" type="submit"><i class="fas fa-search"></i>&nbsp;Cari</button>
              <button class="btn btn-danger mb-0" type="button" data-bs-toggle="modal" data-bs-target="#export-data"><i class="fas fa-download" aria-hidden="true"></i>&nbsp;Export Data</button>
              <!-- <a class="btn btn-danger mb-0" href="<?= base_url('AdminController/export_excel?tahun=' . $tahun . '&nama_opd=' . $nama_opd); ?>"><i class="fas fa-download"></i>&nbsp;Export Data</a> -->
            </div>

          </div>
        </form>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header pb-0 p-3">

      </div>
      <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
          <table class="table align-items-center table-responsive mb-0" id="tabel_data_arsip">
            <thead>
              <tr>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pokok Masalah</th>
                <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rincian Masalah</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tahun</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Box</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rak</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sap</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aktif</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Inaktif</th>
                <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">OPD</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
              </tr>
            </thead>
            <tbody>
             <?php
             $count=0; 
             foreach ($get_data_arsip as $val) { 
              $count=$count+1;
              ?>
              <tr>
                <td style="text-align:center;"><?= $count; ?></td>
                <td><p class="text-xs font-weight-bold mb-0"><?= $val->pokok_masalah; ?></p></td>
                <td class="align-middle text-left text-sm long-content-cell"><span class="badge badge-sm bg-gradient-secondary expandable-content" onclick="expandContent(this)"><?= $val->rincian_masalah; ?></span></td>
                <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?= $val->tahun; ?></span></td>
                <td class="align-middle text-center"><span class="badge badge-lg bg-gradient-success"><?= $val->box; ?></span></td>
                <td class="align-middle text-center"><span class="badge badge-lg bg-gradient-success"><?= $val->rak; ?></span></td>
                <td class="align-middle text-center"><span class="badge badge-lg bg-gradient-success"><?= $val->sap; ?></span></td>
                <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?= $val->aktif; ?></span></td>
                <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?= $val->inaktif; ?></span></td>
                <td class="align-middle text-left"><span class="badge badge-lg bg-gradient-info"><?= $val->nama_opd; ?></span></td>
                <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?= $val->keterangan; ?></span></td>
                <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?= '<div class="btn-group"><button class="btn btn-info btn-sm" title="Edit" onclick="update(' . "'" . $val->id . "'" . ')"><i class="fas fa-edit"></i></button><button class="btn btn-danger btn-sm" title="Hapus" onclick="hapus(' . "'" . $val->id . "'" . ')"><i class="fas fa-trash-alt"></i></button></div>';?></span></td>
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
    $('#tabel_data_arsip').DataTable({
      info: false,
      responsive: true
    });
  } );
</script>


<!-- Modal Insert Data -->
<div class="modal fade" id="addmembers" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah Data Arsip</h1>
        <button type="button" class="btn bg-gradient-dark mb-0 btn-sm" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
      </div>
      
      <div class="modal-body">
        <form id="form_input">
          <div class="row">
            <div class="col-lg-12">
              <div class="mb-3">
                <label for="teammembersName" class="form-label">Pokok Masalah</label>
                <input type="hidden" class="form-control" id="indikator" name="indikator">
                <input type="hidden" class="form-control" id="id_edit" name="id_edit">
                <input type="text" class="form-control" id="pokok_masalah" name="pokok_masalah" placeholder="Pokok Masalah">
              </div>
            </div>
            <div class="col-lg-12">
              <div class="mb-4">
                <label for="teammembersName" class="form-label">Nama OPD</label>
                <input type="text" class="form-control" id="nama_opd" name="nama_opd" placeholder="Nama OPD">
              </div>
            </div>
            <div class="col-lg-12">
              <div class="mb-3">
                <label for="designation" class="form-label">Rincian Masalah</label>
                <textarea name="rincian_masalah" id="rincian_masalah" rows="10" cols="80" class="form-control"></textarea>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="mb-4">
                <label for="teammembersName" class="form-label">Tahun</label>
                <input type="number" class="form-control" id="tahun" name="tahun" placeholder="Tahun">
              </div>
            </div>
            <div class="col-lg-4">
              <div class="mb-4">
                <label for="teammembersName" class="form-label">Box</label>
                <input type="number" class="form-control" id="box" name="box" placeholder="Box">
              </div>
            </div>
            <div class="col-lg-4">
              <div class="mb-4">
                <label for="teammembersName" class="form-label">Rak</label>
                <input type="number" class="form-control" id="rak" name="rak" placeholder="Rak">
              </div>
            </div>
            <div class="col-lg-4">
              <div class="mb-4">
                <label for="teammembersName" class="form-label">Sap</label>
                <input type="number" class="form-control" id="sap" name="sap" placeholder="Sap">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="mb-4">
                <label for="teammembersName" class="form-label">Aktif</label>
                <input type="number" class="form-control" id="aktif" name="aktif" placeholder="Aktif">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="mb-4">
                <label for="teammembersName" class="form-label">Inaktif</label>
                <input type="number" class="form-control" id="inaktif" name="inaktif" placeholder="Inaktif">
              </div>
            </div>
            <div class="col-lg-12">
              <div class="mb-4">
                <label for="teammembersName" class="form-label">Keterangan</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan">
              </div>
            </div>
            <div class="col-lg-12">
              <div class="hstack gap-2 justify-content-end">
                <button type="button" class="btn btn-success" onclick="save_data()"><i class="fas fa-save"></i> Simpan</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
              </div>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>

<!-- Modal Upload Data -->
<div class="modal fade" id="upload-data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah Data Arsip</h1>
        <button type="button" class="btn bg-gradient-dark mb-0 btn-sm" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
      </div>
      <div class="modal-body">
        <form id="form_input">
          <div class="row">
            <div class="col-lg-12">
              <div class="mb-4">
                <label for="teammembersName" class="form-label">Nama OPD</label>
                <input type="text" class="form-control" id="nama_opd" name="nama_opd" placeholder="Nama OPD">
              </div>
            </div>
            <div class="col-lg-12">
              <div class="mb-4">
                <label for="formFile" class="form-label">Upload Excel</label><span><i style="color: #FA8958; font-size: 8pt">*File : .xls/.xlsx</i></span>
                <input type="file" class="form-control" name="file" id="file"><span><i style="color: red; font-size: 8pt">* File : .xls/.xlsx only</i></span>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="hstack gap-2 justify-content-end">
                <button type="button" class="btn btn-success" onclick="upload_data()"><i class="fas fa-save"></i> Simpan</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
              </div>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>

<!-- Modal Export Data -->
<div class="modal fade" id="export-data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Export Data</h1>
        <button type="button" class="btn bg-gradient-dark mb-0 btn-sm" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
      </div>
      <div class="modal-body">
        <form id="form_export" action="<?= base_url();?>admin/export-data" method="POST">
          <div class="row">
            <div class="col-lg-12">
              <div class="mb-4">
                <label for="teammembersName" class="form-label">Judul</label>
                <input type="text" class="form-control" id="judul_export" name="judul_export" placeholder="Judul File Export">
                <input type="hidden" class="form-control" id="tahun" name="tahun" value="<?= $tahun;?>">
                <input type="hidden" class="form-control" id="nama_opd" name="nama_opd" value="<?= $nama_opd;?>">
              </div>
            </div>
            <div class="col-lg-12">
              <div class="mb-4">
                <label for="teammembersName" class="form-label">Nama OPD</label>
                <input type="text" class="form-control" id="opd_export" name="opd_export" placeholder="Nama OPD">
              </div>
            </div>
            <div class="col-lg-12">
              <div class="mb-4">
                <label for="teammembersName" class="form-label">Tahun</label>
                <input type="text" class="form-control" id="tahun_export" name="tahun_export" placeholder="Tahun">
              </div>
            </div>
            <div class="col-lg-12">
              <div class="hstack gap-2 justify-content-end">
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Export</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
              </div>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>

<script>
 function save_data(){
  var indikator = $("#addmembers").find("input[name='indikator']").val();
  var id = $("#addmembers").find("input[name='id_edit']").val();
  var pokok_masalah = $("#addmembers").find("input[name='pokok_masalah']").val();
  var nama_opd = $("#addmembers").find("input[name='nama_opd']").val();
  var rincian_masalah = $("#addmembers").find("textarea[name='rincian_masalah']").val();
  var tahun = $("#addmembers").find("input[name='tahun']").val();
  var box = $("#addmembers").find("input[name='box']").val();
  var rak = $("#addmembers").find("input[name='rak']").val();
  var sap = $("#addmembers").find("input[name='sap']").val();
  var aktif = $("#addmembers").find("input[name='aktif']").val();
  var inaktif = $("#addmembers").find("input[name='inaktif']").val();
  var keterangan = $("#addmembers").find("input[name='keterangan']").val();

  var url='';

  if(indikator==69){
    url='<?= base_url();?>AdminController/edit_artikel/'+id;
  }
  else{
    url='<?= base_url();?>AdminController/save_data';
  }


  if(rincian_masalah == "")
  {
    toastr.error('Harap Isi Semua Kolom', 'Error Alert', {timeOut: 5000});
  }
  else {
    var form_data = new FormData();
    form_data.append('id', id);
    form_data.append('pokok_masalah', pokok_masalah);
    form_data.append('nama_opd', nama_opd);
    form_data.append('rincian_masalah', rincian_masalah);
    form_data.append('tahun', tahun);
    form_data.append('box', box);
    form_data.append('rak', rak);
    form_data.append('sap', sap);
    form_data.append('aktif', aktif);
    form_data.append('inaktif', inaktif);
    form_data.append('keterangan', keterangan);        

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

function update(id){
  console.log(id);
  $.ajax({
    dataType: 'json',
    url: '<?= base_url();?>AdminController/getById/'+id,
    success: function ( data) {
      console.log(data);
      $("#addmembers").find("input[name='indikator']").val(69);
      $("#addmembers").find("input[name='id_edit']").val(data.data[0].id);
      $("#addmembers").find("input[name='pokok_masalah']").val(data.data[0].pokok_masalah);
      $("#addmembers").find("input[name='nama_opd']").val(data.data[0].nama_opd);
      $("#addmembers").find("textarea[name='rincian_masalah']").val(data.data[0].rincian_masalah);
      $("#addmembers").find("input[name='tahun']").val(data.data[0].tahun);
      $("#addmembers").find("input[name='box']").val(data.data[0].box);
      $("#addmembers").find("input[name='rak']").val(data.data[0].rak);
      $("#addmembers").find("input[name='sap']").val(data.data[0].sap);
      $("#addmembers").find("input[name='aktif']").val(data.data[0].aktif);
      $("#addmembers").find("input[name='inaktif']").val(data.data[0].inaktif);
      $("#addmembers").find("input[name='keterangan']").val(data.data[0].keterangan);
      $('#addmembers').modal('show');
    },
    error: function ( data ) {
      console.log('error');
    }
  });
}

function hapus(id){
  $.ajax({
    dataType: 'json',
    url: '<?= base_url();?>AdminController/getById/'+id,
    success: function ( data) {
      var rincian_masalah = data.data[0].rincian_masalah;
      console.log(rincian_masalah);
      $.confirm({
        title : 'Hapus Data',
        content : '<strong>Anda Yakin Untuk Menghapus Data :</strong> '+rincian_masalah,
        buttons: {
          hapus: {
            btnClass: 'btn-blue',
            text:'Hapus',
            action: function(){
              $.ajax({
                dataType: 'json',
                type:'POST',
                url: '<?= base_url();?>AdminController/delete/'+id,
                data:{
                  id:id
                }
              }).done(function(data){
                $(".modal").modal('hide');
                location.reload();
                toastr.success('Item Deleted Successfully.', 'Success Alert', {timeOut: 5000});
              });
            }
          },
          batal: {
            btnClass: 'btn-red any-other-class',
            text:'Batal'
          },
        }
      });   
    },
    error: function ( data ) {
      console.log('error');
    }
  });    
}

function upload_data(){

  var nama_opd = $("#upload-data").find("input[name='nama_opd']").val();
  var excel_file = $('#file')[0].files[0];

  if(nama_opd == "")
  {
    toastr.error('Harap Isi Semua Kolom', 'Error Alert', {timeOut: 5000});
  } else
  {
    var form_data = new FormData();
    form_data.append('nama_opd', nama_opd);
    form_data.append('excel_file', excel_file);
    $.ajax({
      dataType: 'json',
      type:'POST',
      url: '<?= base_url();?>ImportExcelCon/import/',
      cache: false,
      contentType: false,
      processData: false,
      data:form_data,
      success : function (data, status)
      {
        if(data.status != 'error')
        {
          $(".modal").modal('hide');
          location.reload();
          toastr.success(data.msg, 'Success Alert', {timeOut: 5000});
          toastr.success('Item Created Successfully.', 'Success Alert', {timeOut: 5000});
        }
        else{
          toastr.error(data.msg, 'Error Alert', {timeOut: 5000});
        }
      }
    })
  }  
}
</script>