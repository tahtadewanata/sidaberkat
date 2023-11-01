<?php $this->load->view('users/layout/sidebar');?>
<?php $this->load->view('users/layout/header');?>

<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0 p-3">
        <div class="row">
          <div class="col-6 d-flex align-items-center">
            <h6 class="mb-0">Master OPD</h6>
          </div>
          <div class="col-6 text-end">
            <button class="btn bg-gradient-dark mb-0" type="button" data-bs-toggle="modal" data-bs-target="#addmembers"><i class="fas fa-plus" aria-hidden="true"></i>&nbsp;Tambah Data</button>
          </div>
        </div>
      </div>
      <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama OPD</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
              </tr>
            </thead>
            <tbody>
             <?php
             $count=0; 
             foreach ($get_master_opd as $val) { 
              $count=$count+1;
              ?>
              <tr>
                <td style="text-align:center;"><?= $count; ?></td>
                <td class="align-middle text-center text-sm"><span class="badge badge-sm bg-gradient-info"><?= $val->nama_opd; ?></span></td>
                <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?= '<div class="btn-group"><button class="btn btn-info" title="Edit" onclick="update(' . "'" . $val->id . "'" . ')"><i class="fas fa-edit"></i></button><button class="btn btn-danger" title="Hapus" onclick="hapus(' . "'" . $val->id . "'" . ')"><i class="fas fa-trash-alt"></i></button></div>';?></span></td>
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

<!-- Modal -->
<div class="modal fade" id="addmembers" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah OPD</h1>
        <button type="button" class="btn bg-gradient-dark mb-0 btn-sm" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
      </div>
      <div class="modal-body">
        <form id="form_input">
          <div class="row">
            <div class="col-lg-12">
              <div class="mb-3">
                <label for="teammembersName" class="form-label">Nama OPD</label>
                <input type="hidden" class="form-control" id="indikator" name="indikator">
                <input type="hidden" class="form-control" id="id_edit" name="id_edit">
                <input type="text" class="form-control" id="nama_opd" name="nama_opd">
              </div>
            </div>
            <div class="col-lg-12">
              <div class="hstack gap-2 justify-content-end">
                <button type="button" class="btn btn-success" onclick="save_data()"><i class="las la-save"></i> Simpan</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="las la-times"></i> Batal</button>
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
    var nama_opd = $("#addmembers").find("input[name='nama_opd']").val();

    var url='';

    if(indikator==69){
      url='<?= base_url();?>MasterOPDCon/edit_artikel/'+id;
    }
    else{
      url='<?= base_url();?>MasterOPDCon/save_data';
    }


    if(nama_opd == "")
    {
      toastr.error('Harap Isi Semua Kolom', 'Error Alert', {timeOut: 5000});
    }
    else {
      var form_data = new FormData();
      form_data.append('id', id);
      form_data.append('nama_opd', nama_opd);

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
      url: '<?= base_url();?>MasterOPDCon/getById/'+id,
      success: function ( data) {
        console.log(data);
        $("#addmembers").find("input[name='indikator']").val(69);
        $("#addmembers").find("input[name='id_edit']").val(data.data[0].id);
        $("#addmembers").find("input[name='nama_opd']").val(data.data[0].nama_opd);
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
      url: '<?= base_url();?>MasterOPDCon/getById/'+id,
      success: function ( data) {
        var nama_opd = data.data[0].nama_opd;
        console.log(nama_opd);
        $.confirm({
          title : 'Hapus Data',
          content : '<strong>Anda Yakin Untuk Menghapus Data :</strong> '+nama_opd,
          buttons: {
            hapus: {
              btnClass: 'btn-blue',
              text:'Hapus',
              action: function(){
                $.ajax({
                  dataType: 'json',
                  type:'POST',
                  url: '<?= base_url();?>MasterOPDCon/delete/'+id,
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
</script>