<script>
	function save_data(){

  var indikator = $("#indikator").val();
  var id = $("#id_edit").val();
  var id_program = $("#list_program").val();
  var nama_kegiatan = $("#nama_kegiatan").val();
  var jumlah_anggaran = $("#jumlah_anggaran").val();
  var sumber_dana = $("#list_sumberdana").val();
  var keluaran = $("#keluaran").val();
  var satuan = $("#list_satuan").val();
  var target = $("#target").val();
  
  
  
  var bulan = [];
  $("input[name='bulan[]']:checked").each(function () {
    bulan.push($(this).val());
  });

  var keterangan = $("#keterangan").val();

  var form_data = new FormData();

  form_data.append('indikator', indikator);
  form_data.append('id', id);
  form_data.append('id_program', id_program);
  form_data.append('nama_kegiatan', nama_kegiatan);
  form_data.append('jumlah_anggaran', jumlah_anggaran);
  form_data.append('sumber_dana', sumber_dana);
  form_data.append('keluaran', keluaran);
  form_data.append('satuan', satuan);
  form_data.append('target', target);
  form_data.append('waktu', JSON.stringify(bulan));
  form_data.append('keterangan', keterangan);

  var lokasi_data = [];
  var preview_lokasi_table = $("#preview_lokasi table tbody tr");
  preview_lokasi_table.each(function(index) {
    var row = $(this).find("td");
    var lokasi_item = {
      'nama_kecamatan': row.eq(1).text(),
      'nama_desa': row.eq(2).text()
    };
    lokasi_data.push(lokasi_item);
  });

  var orang_data = [];
  var preview_orang_table = $("#preview_orang table tbody tr");
  preview_orang_table.each(function(index) {
    var row = $(this).find("td");
    var orang_item = {
      'nik': row.eq(1).text(),
      'nama': row.eq(2).text(),
      'kecamatan': row.eq(3).text(),
      'desa': row.eq(4).text()
    };
    orang_data.push(orang_item);
  });

  var lokasi_json = JSON.stringify(lokasi_data);
  var orang_json = JSON.stringify(orang_data);

  form_data.append('sasaran_lokasi', lokasi_json);
  form_data.append('sasaran_orang', orang_json);

  var url='';

  if(indikator==69){
    url='<?= base_url();?>InputProgram/edit_data/'+id;
  }
  else{
    url='<?= base_url();?>InputProgram/save_data';
  }

  if (!id_program || !nama_kegiatan || !jumlah_anggaran || !sumber_dana || bulan.length === 0 || !keterangan)
  {
    toastr.error('Harap Isi Semua Kolom', 'Error Alert', {timeOut: 5000});
  }
  else {

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