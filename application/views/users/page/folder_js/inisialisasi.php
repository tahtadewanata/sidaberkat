<script>
 $(document).ready(function () {

  $('#list_program').select2({
    theme: 'classic',
    placeholder: "Pilih Program",
    allowClear: true
  });

  $('#list_sumberdana').select2({
    theme: 'classic',
    placeholder: "Pilih Sumberdana",
    allowClear: true
  });

  $('#list_satuan').select2({
    theme: 'classic',
    placeholder: "Pilih Satuan",
    allowClear: true
  });

// ++++++++++++++++++++++++++++ SASARAN LOKASI +++++++++++++++++++++++++++++++++
// ++++++++++++++++++++++++++++ SASARAN LOKASI +++++++++++++++++++++++++++++++++

  var table = $('#tabel_lokasi').DataTable({
    language: {
      paginate: {
        previous: '<<',
        next: '>>'
      }
    },
    dom: 'Bfrtip',
    buttons: [
    {
      extend: 'selectAll',
      text: '<i class="fas fa-map-marked-alt fa-lg "></i> Pilih Semua',
      className: 'btn btn-info btn-sm',
      action: function () {
        var rows = table.rows({ search: 'applied' }).nodes();
        var selected = table.rows({ selected: true }).count() !== rows.length;
        table.rows({ search: 'applied' }).select(selected);

      }
    }
    ],
    select: {
      style: 'multi'
    },
    responsive: true
  });

  function updatePreview(selectedRows) {
    var previewDiv = $('#preview_lokasi');
    var tableHtml = '<table class="table align-items-center table-responsive mb-0">';
    tableHtml += '<thead><tr><th>No.</th><th>Nama Kecamatan</th><th>Nama Desa</th></tr></thead>';
    tableHtml += '<tbody>';

    selectedRows.forEach(function (data, index) {
      tableHtml += '<tr>';
      tableHtml += '<td>' + (index + 1) + '</td>';
      tableHtml += '<td>' + data[1] + '</td>';
      tableHtml += '<td>' + data[2] + '</td>';
      tableHtml += '</tr>';
    });

    tableHtml += '</tbody></table>';
    previewDiv.html(tableHtml);
  }

  table.on('select', function (e, dt, type, indexes) {
    if (type === 'row') {
      var selectedRowsData = table.rows({ selected: true }).data().toArray();
      updatePreview(selectedRowsData);
    }
  });

  table.on('deselect', function (e, dt, type, indexes) {
    if (type === 'row') {
      var selectedRowsData = table.rows({ selected: true }).data().toArray();
      updatePreview(selectedRowsData);
    }
  });


  // ++++++++++++++++++++++++++++++ SASARAN ORANG +++++++++++++++++++++++++++++++
  // ++++++++++++++++++++++++++++++ SASARAN ORANG +++++++++++++++++++++++++++++++

  var table_orang = $('#tabel_orang').DataTable({
    language: {
      paginate: {
        previous: '<<',
        next: '>>'
      }
    },
    dom: 'Bfrtip',
    buttons: [
    {
      extend: 'selectAll',
      text: '<i class="fas fa-walking fa-lg"></i> Pilih Semua',
      className: 'btn btn-danger btn-sm',
      action: function () {
        var rows = table_orang.rows({ search: 'applied' }).nodes();
        var selected = table_orang.rows({ selected: true }).count() !== rows.length;
        table_orang.rows({ search: 'applied' }).select(selected);

      }
    }
    ],
    select: {
      style: 'multi'
    },
    responsive: true
  });

  function updatePreviewOrang(selectedRows) {
    var previewDiv = $('#preview_orang');
    var tableHtml = '<table class="table align-items-center table-responsive mb-0">';
    tableHtml += '<thead><tr><th>No.</th><th>NIK</th><th>Nama</th><th>Kecamatan</th><th>Desa</th></tr></thead>';
    tableHtml += '<tbody>';

    selectedRows.forEach(function (data, index) {
      tableHtml += '<tr>';
      tableHtml += '<td>' + (index + 1) + '</td>';
      tableHtml += '<td>' + data[1] + '</span></td>'; 
      tableHtml += '<td>' + data[2] + '</span></td>'; 
      tableHtml += '<td>' + data[3] + '</span></td>'; 
      tableHtml += '<td>' + data[4] + '</span></td>';
      tableHtml += '</tr>';
    });

    tableHtml += '</tbody></table>';
    previewDiv.html(tableHtml);
  }

  table_orang.on('select', function (e, dt, type, indexes) {
    if (type === 'row') {
      var selectedRowsData = table_orang.rows({ selected: true }).data().toArray();
      updatePreviewOrang(selectedRowsData);
    }
  });

  table_orang.on('deselect', function (e, dt, type, indexes) {
    if (type === 'row') {
      var selectedRowsData = table_orang.rows({ selected: true }).data().toArray();
      updatePreviewOrang(selectedRowsData);
    }
  });
});
</script>
