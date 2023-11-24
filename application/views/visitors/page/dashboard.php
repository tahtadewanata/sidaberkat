<?php $this->load->view('visitors/layout/header'); ?>
<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="pt-5"><span class="text-muted fw-light">Beranda /</span> Sida-Berkat</h4>
    <h6 class="mb-4"><span class="text-muted fw-light">Sistem Informasi Data Pemberdayaan Masyarakat</h6>

    <!-- Card Border Shadow -->
    <div class="row">
        <div class="col-sm-6 col-lg-3 mb-4">
            <div class="card card-border-shadow-primary">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                            <span class="avatar-initial rounded bg-label-primary"><i class="ti ti-world ti-md"></i></span>
                        </div>
                        <h4 class="ms-1 mb-0"><?= $jml_kegiatan; ?></h4>
                    </div>
                    <p class="mb-1">Jumlah Kegiatan</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 mb-4">
            <div class="card card-border-shadow-warning">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                            <span class="avatar-initial rounded bg-label-warning"><i class="ti ti-alert-triangle ti-md"></i></span>
                        </div>
                        <h4 class="ms-1 mb-0"><?= $total[0]->total_anggaran; ?></h4>
                    </div>
                    <p class="mb-1">Total Anggaran</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 mb-4">
            <div class="card card-border-shadow-danger">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                            <span class="avatar-initial rounded bg-label-danger"><i class="ti ti-git-fork ti-md"></i></span>
                        </div>
                        <h4 class="ms-1 mb-0"><?= $total[0]->total_realisasi; ?></h4>
                    </div>
                    <p class="mb-1">Total Realisasi</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 mb-4">
            <div class="card card-border-shadow-info">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                            <span class="avatar-initial rounded bg-label-info"><i class="ti ti-clock ti-md"></i></span>
                        </div>
                        <h4 class="ms-1 mb-0"><?php if ($total[0]->total_anggaran > 0) {
                                                    $capaian = ($total[0]->total_realisasi / $total[0]->total_anggaran) * 100;
                                                    echo number_format($capaian, 1) . ' %';
                                                }; ?></h4>
                    </div>
                    <p class="mb-1">Persentase</p>
                </div>
            </div>
        </div>
    </div>
    <!--/ Card Border Shadow -->
    <div class="row">
        <!-- Data Realisasi Anggaran -->
        <div class="col-xxl-12 mb-4 order-5 order-xxl-0">
            <div class="card">
                <div class="card-header">
                    <div class="card-title mb-0">
                        <h5 class="m-0">Data Realisasi Anggaran</h5>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="bar-realisasi-anggaran" class="chart-canvas" height="300"></canvas>
                </div>
            </div>
        </div>
        <!--/ Data Realisasi Anggaran -->

        <!-- Data Anggaran Program Pemberdayaan -->
        <div class="col-md-12 col-xxl-6 mb-4 order-1 order-xxl-3">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Data Anggaran Program Pemberdayaan</h5>
                    </div>
                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="deliveryExceptions" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ti ti-dots-vertical"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="deliveryExceptions">
                            <a class="dropdown-item" href="javascript:void(0);">Download</a>
                            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                            <a class="dropdown-item" href="javascript:void(0);">Share</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="nav-align-top">
                        <canvas id="diagram-jenis" class="chart-canvas" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Data Anggaran Program Pemberdayaan -->
        <!-- Data Jenis Program Pemberdayaan -->
        <div class="col-md-12 col-xxl-6 mb-4 order-0 order-xxl-4">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between pb-2">
                    <div class="card-title mb-1">
                        <h5 class="m-0 me-2">Data Jenis Program Pemberdayaan</h5>
                    </div>
                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="salesByCountryTabs" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="salesByCountryTabs">
                            <a class="dropdown-item" href="javascript:void(0);">Download</a>
                            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                            <a class="dropdown-item" href="javascript:void(0);">Share</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="nav-align-top">
                        <canvas id="diagram-anggaran" class="chart-canvas" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Data Jenis Program Pemberdayaan -->

        <!-- Data Realisasi Target -->

        <div class="col-12 order-5">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Data Realisasi Target</h5>
                    </div>
                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="routeVehicles" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ti ti-dots-vertical"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="routeVehicles">
                            <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                            <a class="dropdown-item" href="javascript:void(0);">Share</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="bar-realisasi-target" class="chart-canvas" height="300"></canvas>
                </div>
            </div>
        </div>

        <!--/ Data Realisasi Target -->

        <!-- Tabel Program Pemberdayaan Masyarakat -->

        <div class="col-12 order-5 pt-3">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Data Program Pemberdayaan Masyarakat Tahun <?= $currentYear = date('Y'); ?></h5>
                    </div>
                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="routeVehicles" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ti ti-dots-vertical"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="routeVehicles">
                            <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                            <a class="dropdown-item" href="javascript:void(0);">Share</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-datatable table-responsive pt-0">
                        <table class="datatables-basic table" id="table-program-pmd">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kegiatan</th>
                                    <th>Jumlah Anggaran (Rp)</th>
                                    <th>Sumber Dana</th>
                                    <th>Lokasi</th>
                                    <th>Keluaran</th>
                                    <th>Satuan Keluaran</th>
                                    <th>Target Keluaran</th>
                                    <th>Waktu</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!--/ Tabel Program Pemberdayaan Masyarakat -->
    </div>
</div>
<!--/ Content -->

<?php $this->load->view('visitors/layout/footer'); ?>
<?php $this->load->view('visitors/page/folder_js/dashboard_js'); ?>