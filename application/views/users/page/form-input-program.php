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
            <h6 class="mb-0">Form Input Data Program</h6>
          </div>
        </div>
      </div>
      <div class="card-header pb-3 p-3"></div>
      <div class="card-footer pb-3 p-3"></div>
    </div>

    <div class="card mb-4">
      <div class="card-header pb-0 p-3">

      </div>
      <div class="card-body px-5 pt-2 pb-2">
        <form id="form_input">
          <div class="row">
            <div class="col-lg-12">
              <div class="mb-3">
                <label for="nama_kegiatan" class="form-label">Nama Program</label>
                <input type="hidden" class="form-control" id="indikator" name="indikator" value="69">
                <input type="hidden" class="form-control" id="id_edit" name="id_edit" value="<?= isset($get_data_input[0]->id) ? $get_data_input[0]->id : ''; ?>">
                <select class="form-select" id="list_program" name="list_program">
                 <?php foreach($get_program as $val) : ?>
                  <option value="<?= $val->id ?>" <?= isset($get_data_input[0]->id_program) && $get_data_input[0]->id_program == $val->id ? 'selected' : '' ?>>
                    <?= $val->nama_program ;?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="mb-3">
              <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
              <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" placeholder="Nama Kegiatan" value="<?= isset($get_data_input[0]->nama_kegiatan) ? $get_data_input[0]->nama_kegiatan : ''; ?>">
            </div>
          </div>
          <div class="col-lg-12">
            <div class="mb-4">
              <label for="jumlah_anggaran" class="form-label">Jumlah Anggaran</label>
              <input type="text" class="form-control" id="jumlah_anggaran" name="jumlah_anggaran" pattern="^Rp\d{1,3}(,\d{3})*(\.\d+)?$" value="<?= isset($get_data_input[0]->jumlah_anggaran) ? format_rupiah($get_data_input[0]->jumlah_anggaran) : ''; ?>" data-type="currency" placeholder="Rp. ">
            </div>
          </div>
          <div class="col-lg-12">
            <div class="mb-4">
              <label for="sumber_dana" class="form-label">Sumber Dana</label>
              <select class="form-select" id="list_sumberdana" name="list_sumberdana">
                <?php foreach($get_sumberdana as $sumberdana) : ?>
                  <option value="<?= $sumberdana->id ?>" <?= isset($get_data_input[0]->sumber_dana) && $get_data_input[0]->sumber_dana == $sumberdana->id ? 'selected' : '' ?>>
                    <?= $sumberdana->nama_sumberdana ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="mb-4">
              <label for="sasaran_lokasi" class="form-label">Sasaran Lokasi</label>
              <div class="d-flex">
                <button class="btn bg-gradient-info btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#sasaran_lokasi"><i class="fas fa-map-marker-alt fa-lg"></i>&nbsp;Klik Sasaran Lokasi</button>
              </div>
              <div id="preview_lokasi">
                <?php
                if (isset($get_data_input[0]->sasaran_lokasi)) {
                  $lokasiList = json_decode($get_data_input[0]->sasaran_lokasi);
                  echo '<table class="table align-items-center table-responsive mb-0">';
                  echo '<thead><tr><th>No.</th><th>Nama Kecamatan</th><th>Nama Desa</th></tr></thead>';
                  echo '<tbody>';
                  $count = 0;
                  foreach ($lokasiList as $lokasi) {
                    $count = $count + 1;
                    echo '<tr>';
                    echo '<td style="text-align:center;">' . $count . '</td>';
                    echo '<td class="align-middle text-left"><span class="text-xs font-weight-bold">' . $lokasi->nama_kecamatan . '</td>';
                    echo '<td class="align-middle text-left"><span class="text-xs font-weight-bold">' . $lokasi->nama_desa . '</td';
                    echo '</tr>';
                  }
                  echo '</tbody></table>';
                }
                ?>
              </div>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="mb-4">
              <label for="sasaran_orang" class="form-label">Sasaran Orang</label>
              <div class="d-flex">
                <button class="btn bg-gradient-danger btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#sasaran_orang"><i class="fas fa-walking fa-lg"></i>&nbsp;Klik Sasaran Orang</button>
              </div>
              <div id="preview_orang">
                <?php
                if (isset($get_data_input[0]->sasaran_orang)) {
                  $orangList = json_decode($get_data_input[0]->sasaran_orang);
                  echo '<table class="table align-items-center table-responsive mb-0">';
                  echo '<thead><tr><th>No.</th><th>NIK</th><th>Nama</th><th>Kecamatan</th><th>Desa</th></tr></thead>';
                  echo '<tbody>';
                  $count = 0;
                  foreach ($orangList as $orang) {
                    $count = $count + 1;
                    echo '<tr>';
                    echo '<td style="text-align:center;">' . $count . '</td>';
                    echo '<td class="align-middle text-left"><span class="text-xs font-weight-bold">' . $orang->nik . '</td>';
                    echo '<td class="align-middle text-left"><span class="text-xs font-weight-bold">' . $orang->nama . '</td>';
                    echo '<td class="align-middle text-left"><span class="text-xs font-weight-bold">' . $orang->kecamatan . '</td>';
                    echo '<td class="align-middle text-left"><span class="text-xs font-weight-bold">' . $orang->desa . '</td>';
                    echo '</tr>';
                  }
                  echo '</tbody></table>';
                }
                ?>
              </div>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="mb-4">
              <label for="keluaran" class="form-label">Keluaran</label>
              <textarea class="form-control" id="keluaran" name="keluaran" placeholder="Keluaran"><?= isset($get_data_input[0]->keluaran) ? $get_data_input[0]->keluaran : ''; ?></textarea>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="mb-4">
              <label for="satuan" class="form-label">Satuan Keluaran</label>
              <select class="form-select" id="list_satuan" name="list_satuan">
                <?php foreach($get_satuan as $val) : ?>
                  <option value="<?= $val->id ?>" <?= isset($get_data_input[0]->satuan) && $get_data_input[0]->satuan == $val->id ? 'selected' : '' ?>>
                    <?= $val->nama_satuan ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="mb-4">
              <label for="target" class="form-label">Target Keluaran</label>
              <input class="form-control" id="target" name="target" placeholder="Target" type="number" value="<?= isset($get_data_input[0]->target) ? $get_data_input[0]->target : ''; ?>"></input>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="mb-4">
              <label class="form-label">Waktu : </label>
              <?php
              $waktuList = [];
              if (isset($get_data_input[0]->waktu)) {
                $waktuList = json_decode($get_data_input[0]->waktu);
              }

              $bulanList = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
              foreach ($bulanList as $bulan) {
                echo '<div class="form-check form-check-inline">';
                echo '<input class="form-check-input" type="checkbox" id="bulan_' . strtolower($bulan) . '" name="bulan[]" value="' . $bulan . '"';
                if (in_array($bulan, $waktuList)) {
                  echo ' checked';
                }
                echo '>';
                echo '<label class="form-check-label" for="bulan_' . strtolower($bulan) . '">' . $bulan . '</label>';
                echo '</div>';
              }
              ?>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="mb-4">
              <label for="keterangan" class="form-label">Keterangan</label>
              <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan"><?= isset($get_data_input[0]->keterangan) ? $get_data_input[0]->keterangan : ''; ?></textarea>
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

<?php $this->load->view('users/layout/footer');?>
<?php $this->load->view('users/page/folder_js/format_rupiah');?>
<?php $this->load->view('users/page/folder_js/crud');?>
<?php $this->load->view('users/page/folder_js/inisialisasi');?>

<!-- Modal Sasaran Lokasi -->
<div class="modal fade" id="sasaran_lokasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Sasaran Lokasi</h1>
        <button type="button" class="btn bg-gradient-dark mb-0 btn-sm" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
      </div>

      <div class="modal-body">
        <table class="table align-items-center table-responsive mb-0" id="tabel_lokasi" style="width:90%">
          <thead>
            <tr>
              <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
              <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Kecamatan</th>
              <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Desa</th>

            </tr>
          </thead>
          <tbody>
           <?php
           $count=0; 
           foreach ($get_lokasi as $val) {
            $count=$count+1;
            ?>
            <tr>
              <td style="text-align:center;"><?= $count; ?></td>
              <td class="align-middle text-left"><span class="text-xs font-weight-bold"><?= $val->nama_kecamatan; ?></span></td>
              <td class="align-middle text-left"><span class="text-xs font-weight-bold"><?= $val->nama_desa; ?></span></td>
              
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

    <div class="modal-footer">
      <div class="col-lg-12">
        <div class="hstack gap-2 justify-content-end">
          <button type="button" class="btn btn-success" data-bs-dismiss="modal"><i class="fas fa-save"></i> Preview</button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
        </div>
      </div>
    </div>

  </div>
</div>
</div>
<!-- End Modal Sasaran Lokasi  -->

<!-- Modal Sasaran Orang -->
<div class="modal fade" id="sasaran_orang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Sasaran Orang</h1>
        <button type="button" class="btn bg-gradient-dark mb-0 btn-sm" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
      </div>

      <div class="modal-body">
        <table class="table align-items-center table-responsive mb-0" id="tabel_orang" style="width:90%">
          <thead>
            <tr>
              <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
              <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NIK</th>
              <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
              <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kecamatan</th>
              <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Desa</th>
            </tr>
          </thead>
          <tbody>
           <?php
           $count=0; 
           foreach ($get_orang as $val) {
            $count=$count+1;
            ?>
            <tr>
              <td style="text-align:center;"><?= $count; ?></td>
              <td class="align-middle text-left"><span class="text-xs font-weight-bold"><?= $val->NIK; ?></span></td>
              <td class="align-middle text-left"><span class="text-xs font-weight-bold"><?= $val->Nama; ?></span></td>
              <td class="align-middle text-left"><span class="text-xs font-weight-bold"><?= $val->Kecamatan; ?></span></td>
              <td class="align-middle text-left"><span class="text-xs font-weight-bold"><?= $val->DesaKelurahan; ?></span></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

    <div class="modal-footer">
      <div class="col-lg-12">
        <div class="hstack gap-2 justify-content-end">
          <button type="button" class="btn btn-success" data-bs-dismiss="modal"><i class="fas fa-save"></i> Preview</button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
        </div>
      </div>
    </div>

  </div>
</div>
</div>
<!-- End Modal Sasaran Orang  -->
