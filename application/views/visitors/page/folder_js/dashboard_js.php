<script>
    $(document).ready(function() {
        // ++++++++++++++++++++++++++++ DIAGRAM JENIS PROGRAM +++++++++++++++++++++++++++++++++++++
        // ++++++++++++++++++++++++++++ DIAGRAM JENIS PROGRAM +++++++++++++++++++++++++++++++++++++

        var dataProgram = <?php echo json_encode($data_program); ?>;
        var totalProgram = <?php echo json_encode($total_program); ?>;
        console.log(totalProgram);
        var labels = dataProgram.map(function(item) {
            return item.nama_program;
        });

        var data = dataProgram.map(function(item) {
            return ((item.jumlah_program / totalProgram) * 100).toFixed(1);
        });

        var backgroundColors = generateRandomColors(dataProgram.length);

        var ctx = document.getElementById('diagram-jenis').getContext('2d');
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    data: data,
                    backgroundColor: backgroundColors,
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                var label = context.label || '';
                                var value = context.formattedValue || '';
                                return label + ': ' + value + '%';
                            }
                        }
                    }
                }
            },
        });

        // ++++++++++++++++++++++++++++++++++ DIAGRAM ANGGARAN +++++++++++++++++++++++++++++++++

        var dataAnggaran = <?php echo json_encode($data_anggaran); ?>;
        var totalAnggaran = <?php echo json_encode($total_anggaran[0]->total_anggaran); ?>;

        var labels = dataAnggaran.map(function(item) {
            return item.nama_program;
        });

        var data = dataAnggaran.map(function(item) {
            return ((item.jumlah_anggaran / totalAnggaran) * 100).toFixed(1);
        });

        var backgroundColors = generateRandomColors(dataAnggaran.length);

        var ctx = document.getElementById('diagram-anggaran').getContext('2d');
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    data: data,
                    backgroundColor: backgroundColors,
                }],
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                var label = context.label || '';
                                var formattedValue = context.formattedValue || '';
                                return label + ': ' + formattedValue + ' %';
                            },
                            afterLabel: function(context) {
                                var label = context.label || '';
                                var totalAnggaranItem = dataAnggaran.find(item => item.nama_program === label).jumlah_anggaran;
                                var formattedAnggaran = formatCurrency(totalAnggaranItem);
                                return '(' + formattedAnggaran + ')';
                            }
                        }
                    }
                },
                responsive: true,
                maintainAspectRatio: false,
            },
        });

        // +++++++++++++++++++++++++++ BAR REALISASI ANGGARAN +++++++++++++++++++++++++++++

        var dataBar = <?php echo json_encode($data_anggaran); ?>;
        var labels = dataBar.map(function(item) {
            return item.nama_program;
        });

        var jumlahAnggaran = dataBar.map(function(item) {
            return item.jumlah_anggaran;
        });

        var realisasiAnggaran = dataBar.map(function(item) {
            return item.realisasi_anggaran;
        });

        var backgroundColors = ['#36A2EB', '#FF6384'];

        var ctx = document.getElementById('bar-realisasi-anggaran').getContext('2d');
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                        label: 'Jumlah Anggaran',
                        data: jumlahAnggaran,
                        backgroundColor: backgroundColors[0],
                        barThickness: 20
                    },
                    {
                        label: 'Realisasi Anggaran',
                        data: realisasiAnggaran,
                        backgroundColor: backgroundColors[1],
                        barThickness: 20
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        stacked: false
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // ++++++++++++++++++++++++++++++ BAR REALISASI TARGET +++++++++++++++++++++++++++++++

        var dataRealisasiTarget = <?php echo json_encode($data_realisasi_target); ?>;

        var labels = dataRealisasiTarget.map(function(item) {
            return item.nama_program;
        });

        var dataMencapaiTarget = dataRealisasiTarget.map(function(item) {
            return item.mencapai_target;
        });

        var dataTidakMencapaiTarget = dataRealisasiTarget.map(function(item) {
            return item.tidak_mencapai_target;
        });

        var dataMelampauiTarget = dataRealisasiTarget.map(function(item) {
            return item.melampaui_target;
        });

        var ctx = document.getElementById('bar-realisasi-target').getContext('2d');
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                        label: 'Mencapai Target',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                        data: dataMencapaiTarget,
                        barThickness: 20
                    },
                    {
                        label: 'Tidak Mencapai Target',
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1,
                        data: dataTidakMencapaiTarget,
                        barThickness: 20
                    },
                    {
                        label: 'Melampaui Target',
                        backgroundColor: 'rgba(255, 205, 86, 0.2)',
                        borderColor: 'rgba(255, 205, 86, 1)',
                        borderWidth: 1,
                        data: dataMelampauiTarget,
                        barThickness: 20
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        stacked: false
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            },
        });

        $(document).ready(function() {
            $('#table-program-pmd').DataTable({
                "ajax": {
                    url: "DashboardController/get_items",
                    type: 'GET'
                },
            });
        });

    });

    function generateRandomColors(num) {
        var colors = [];
        for (var i = 0; i < num; i++) {
            colors.push('#' + Math.floor(Math.random() * 16777215).toString(16));
        }
        return colors;
    }
</script>