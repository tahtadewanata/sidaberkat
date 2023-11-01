var table;

$(document).ready(function(){
  manageData();
  function manageData() {
    table = $('#example2').DataTable({
      "responsive": true,
      "processing": true,
      'serverSide': true,
      "paging": true,
      "lengthChange": false,
      "ordering": true,
      'ajax': {
        'type': 'POST',
        'url': url,
        dataSrc: function(data)
        {
          var return_data = new Array();
          for(var i=0;i< data.data.length; i++){
            return_data.push({
              'no'             : data.data[i].no,
              'nik'            : data.data[i].nik,
              'nama'           : data.data[i].nama,
              'agama'          : data.data[i].agama,
              'alamat'         : data.data[i].alamat,
              'kecamatan'      : data.data[i].kecamatan,
              'desa'           : data.data[i].desa,
              'jenis_kelamin'  : data.data[i].jenis_kelamin,
              'nomor_telepon'  : data.data[i].nomor_telepon,
              'permasalahan'   : data.data[i].permasalahan,
              'keterangan_penduduk'   : data.data[i].keterangan_penduduk,
              'action'         : data.data[i].action
            })
          }
          return return_data;
        }
      },
      "columnDefs": [
      { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
          },
          ],
          "columns": [
          {'data': 'no'},
          {'data': 'nik'},
          {'data': 'nama'},
          {'data': 'agama'},
          {'data': 'alamat'},
          {'data': 'kecamatan'},
          {'data': 'desa'},
          {'data': 'jenis_kelamin'},
          {'data': 'nomor_telepon'},
          {'data': 'permasalahan'},
          {'data': 'keterangan_penduduk'},
          {'data': 'action'}
          ]
        });
  }
});

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
  }

  function insert()
  {
    var nik                  = $("#insert-modal").find("input[name='nik']").val();
    var nama                 = $("#insert-modal").find("input[name='nama']").val();
    var agama                = $("#insert-modal").find('select[name=agama] option').filter(':selected').val();
    var alamat               = $("#insert-modal").find("input[name='alamat']").val();
    var kecamatan            = $("#insert-modal").find('select[name=kecamatan] option').filter(':selected').val();
    var desa                 = $("#insert-modal").find('select[name=desa] option').filter(':selected').val();
    var jenis_kelamin        = $("#insert-modal").find('select[name=jenis_kelamin] option').filter(':selected').val();
    var nomor_telepon        = $("#insert-modal").find("input[name='nomor_telepon']").val();
    var permasalahan         = $("#insert-modal").find('select[name=permasalahan] option').filter(':selected').val();
    var keterangan_penduduk  = $("#insert-modal").find('input[name=keterangan_penduduk]:checked').val();
    var action               = $("#insert-modal").find("input[name='action']").val();
    console.log(agama);

    if(nik == "" || nama == "" || agama==0 || kecamatan==0 || jenis_kelamin==0 || permasalahan==0)
    {
      toastr.error('Harap isi semua kolom.', 'Error Alert', {timeOut: 5000});
    }
    else {
      var form_data = new FormData();
      form_data.append('nik', nik);
      form_data.append('nama', nama);
      form_data.append('agama', agama);
      form_data.append('alamat', alamat);
      form_data.append('kecamatan', kecamatan);
      form_data.append('desa', desa);
      form_data.append('jenis_kelamin', jenis_kelamin);
      form_data.append('nomor_telepon', nomor_telepon);
      form_data.append('permasalahan', permasalahan);
      form_data.append('keterangan_penduduk', keterangan_penduduk);
      form_data.append('action', action);
      $.ajax({
        dataType: 'json',
        type:'POST',
        url: 'kabarnganjuk/insert-data',
        cache: false,
        contentType: false,
        processData: false,
        data:form_data,
        success : function (data, status)
        {
          if(data.status != 'error')
          {
            $("#insert-modal").find("input[name='nik']").val('');
            $("#insert-modal").find("input[name='nama']").val('');
            $("#insert-modal").find('select[name=agama]').val(0);
            $("#insert-modal").find("input[name='alamat']").val(''); 
            $("#insert-modal").find('select[name=kecamatan]').val(0);
            $("#insert-modal").find('select[name=desa]').val(0);
            $("#insert-modal").find('select[name=jenis_kelamin]').val(0);
            $("#insert-modal").find("input[name='nomor_telepon']").val(''); 
            $("#insert-modal").find('select[name=permasalahan]').val(0);
            $("#insert-modal").find('input[name=keterangan_penduduk]').val(0);
            $("#insert-modal").find("input[name='action']").val(''); 
            $(".modal").modal('hide');
            reload_table();
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


  function update(id){
 
  $.ajax({
    dataType: 'json',
    url: 'kabarnganjuk/ambil-data-by-id/'+id,
    // url: 'kabarnganjuk/ambil-data-by-id/'+id,
    success: function (data) {
      console.log(data.data);
      // $('#tanggal2').datepicker({format : 'yyyy-mm-dd'}).datepicker("setDate",'"'+data.data[0].tanggal+'"');
      $("#update-modal").find("input[name='id']").val(data.data[0].id);
      $("#update-modal").find("input[name='nik2']").val(data.data[0].nik);
      $("#update-modal").find("input[name='nama2']").val(data.data[0].nama);
      $("#update-modal").find("select[name='agama2']").val(data.data[0].agama);
      $("#update-modal").find("input[name='alamat2']").val(data.data[0].alamat);
      // $("#update-modal").find("select[name='kecamatan2']").val(data.data[0].kecamatan);
      // $("#update-modal").find("select[name='desa2']").val(data.data[0].desa);
      $("#update-modal").find("select[name='jenis_kelamin2']").val(data.data[0].jenis_kelamin);
      $("#update-modal").find("input[name='nomor_telepon2']").val(data.data[0].nomor_telepon);
      $("#update-modal").find("select[name='permasalahan2']").val(data.data[0].permasalahan);
      $("input[name='keterangan_penduduk2'][value='"+data.data[0].keterangan_penduduk+"']").prop("checked", true);
      // $("#update-modal").find("input[name='id2']").val(data.data[0].id2);
      // CKEDITOR.instances.editor2.setData(data.data[0].isi);
      $('#kecamatan2').val(data.data[0].kecamatan);
      // Set Kategori
      console.log(data);
      $('#desa2').empty();

      $.each(data.desa, function( index, value ) {
        $('#desa2').append('<option value="'+value.id+'">'+value.desa+'</option>');
      });

      $('#desa2').val(data.data[0].desa);

      $('#update-modal').modal('show');
    },
    error: function (data) {
      console.log('error');
    }
  });
}

function update_data()
{
  var id                   = $("#update-modal").find("input[name='id']").val();
  var nik                  = $("#update-modal").find("input[name='nik2']").val();
  var nama                 = $("#update-modal").find("input[name='nama2']").val();
  var agama                = $("#update-modal").find("select[name='agama2']").val();
  var alamat               = $("#update-modal").find("input[name='alamat2']").val();
  var kecamatan            = $("#update-modal").find("select[name='kecamatan2']").val();
  var desa                 = $("#update-modal").find("select[name='desa2']").val();
  var jenis_kelamin        = $("#update-modal").find("select[name='jenis_kelamin2']").val();
  var nomor_telepon        = $("#update-modal").find("input[name='nomor_telepon2']").val();
  var permasalahan         = $("#update-modal").find("select[name='permasalahan2']").val();
  var keterangan_penduduk  = $("#update-modal").find('input[name=keterangan_penduduk2]:checked').val();

  var form_data = new FormData();
  form_data.append('id', id);
  form_data.append('nik', nik);
  form_data.append('nama', nama);
  form_data.append('agama', agama);
  form_data.append('alamat', alamat);
  form_data.append('kecamatan', kecamatan);
  form_data.append('desa', desa);
  form_data.append('jenis_kelamin', jenis_kelamin);
  form_data.append('nomor_telepon', nomor_telepon);
  form_data.append('permasalahan', permasalahan);
  form_data.append('keterangan_penduduk', keterangan_penduduk);
  // form_data.append('id', id);
  $.ajax({
    dataType: 'json',
    type:'POST',
    url: 'kabarnganjuk/edit-data/'+id,
    cache: false,
    contentType: false,
    processData: false,
    data:form_data,
    success : function (data, status)
    {
      if(data.status != 'error')
      {
        $(".modal").modal('hide');
        reload_table();
        $("#update-modal").find("input[name='file2']").val('');
        toastr.success(data.msg, 'Success Alert', {timeOut: 5000});
      }
      else{
        toastr.error(data.msg, 'Error Alert', {timeOut: 5000});
      }
    }
  })
}

function hapus(id){
  $.ajax({
    dataType: 'json',
    url: 'kabarnganjuk/ambil-data-by-id/'+id,
    success: function ( data) {
      var nama            = data.data[0].nama;

      console.log(nama);
      $.confirm({
        title : 'Hapus Data',
        content : 'Apakah Anda Yakin Untuk Menghapus Data : '+nama,
        buttons: {
          hapus: {
            btnClass: 'btn-blue',
            text:'Hapus',
            action: function(){
              $.ajax({
                dataType: 'json',
                type:'POST',
                url: 'kabarnganjuk/remove/'+id,
                data:{
                  id:id
                }
              }).done(function(data){
                $(".modal").modal('hide');
                reload_table();
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

function activate(id){
  $.ajax({
    dataType: 'json',
    url: 'kabarnganjuk/ambil-data-by-id/'+id,
    success: function ( data) {
      //console.log(data.data); //view the returned json in the console
      var judul = data.data[0].judul;
      var isactive = data.data[0].isActive;
      $.confirm({
        title : 'Aktifkan Data',
        content : 'Apakah Anda Yakin Untuk Mengaktifkan Kembali Data : '+judul,
        buttons: {
          hapus: {
            btnClass: 'btn-blue',
            text:'Aktifkan',
            action: function(){
              $.ajax({
                dataType: 'json',
                type:'POST',
                url: 'kabarnganjuk/activate/'+id,
                data:{
                  id:id,
                  isActive:0
                }
              }).done(function(data){
                $(".modal").modal('hide');
                reload_table();
                toastr.success('Item Activated Successfully.', 'Success Alert', {timeOut: 5000});
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

$('#kecamatan2').change(function(){

  $.get('kabarnganjuk/getdesa?id='+$("#kecamatan2").val(), function(data, status){

    $('#desa2').empty();
    $.each(JSON.parse(data), function( index, value ) {
      $('#desa2').append('<option value="'+value.id+'">'+value.desa+'</option>');
    });
  });
});

$('#kecamatan').change(function(){
  console.log('JANCOK');
  $.get('kabarnganjuk/getdesa?id='+$("#kecamatan").val(), function(data, status){
    $('#desa').empty();
    $.each(JSON.parse(data), function( index, value ) {
      $('#desa').append('<option value="'+value.id+'">'+value.desa+'</option>');
      console.log(value.desa);
    });
  });
});

