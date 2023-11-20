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
						<h6 class="mb-0">Data P3KE Individu</h6>
					</div>
					<div class="col-6 text-end pb-2">
						<button class="btn bg-gradient-light mb-0 btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#upload-data"><i class="fas fa-upload"></i>&nbsp;Upload Excel</button>
						<button class="btn bg-gradient-dark mb-0 btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#addmembers"><i class="fas fa-plus" aria-hidden="true"></i>&nbsp;Tambah Data</button>
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
					<table class="table align-items-center table-responsive mb-0" id="tabel_data_p3ke_individu">
						<thead>
							<tr>
								<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
								<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">IDKeluargaP3KE</th>
								<th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Provinsi</th>
								<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kabupaten/Kota</th>
								<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kecamatan</th>
								<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Desa/Kelurahan</th>
								<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kode Kemdagri</th>
								<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Desil Kesejahteraan</th>
								<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alamat</th>
								<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">IDIndividu</th>
								<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
								<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NIK</th>
								<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Padan Dukcapil</th>
								<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis Kelamin</th>
								<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Hubungan Dengan Kepala Keluarga</th>
								<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Lahir</th>
								<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status Kawin</th>
								<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pekerjaan</th>
								<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pendidikan</th>
								<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Usia Dibawah 7 Tahun</th>
								<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Usia 7-12</th>
								<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Usia 13-15</th>
								<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Usia 16-18</th>
								<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Usia 19-21</th>
								<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Usia 22-59</th>
								<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Usia 60 Tahun Keatas</th>
								<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Penerima BPNT</th>
								<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Penerima BPUM</th>
								<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Penerima BST</th>
								<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Penerima PKH</th>
								<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Penerima SEMBAKO</th>
								<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Resiko Stunting</th>
								<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tahun</th>
								<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pengisi</th>
								<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$count = 0;
							foreach ($get_p3ke_individu as $val) {
								$count = $count + 1;
								?>
								<tr>
									<td style="text-align:center;"><?= $count; ?></td>
									<td><?= $val->IDKeluargaP3KE; ?></td>
									<td class="align-middle text-left"><span class="badge badge-sm bg-gradient-secondary expandable-content" onclick="expandContent(this)"><?= $val->Provinsi; ?></span></td>
									<td class="align-middle text-center"><?= $val->KabupatenKota; ?></td>
									<td class="align-middle text-center"><?= $val->Kecamatan; ?></td>
									<td class="align-middle text-center"><?= $val->DesaKelurahan; ?></td>
									<td class="align-middle text-center"><?= $val->KodeKemdagri; ?></td>
									<td class="align-middle text-center"><?= $val->DesilKesejahteraan; ?></td>
									<td class="align-middle text-center"><?= $val->Alamat; ?></td>
									<td class="align-middle text-center"><?= $val->IDIndividu; ?></td>
									<td class="align-middle text-center"><?= $val->Nama; ?></td>
									<td class="align-middle text-center"><?= $val->NIK; ?></td>
									<td class="align-middle text-center"><?= $val->PadanDukcapil; ?></td>
									<td class="align-middle text-center"><?= $val->JenisKelamin; ?></td>
									<td class="align-middle text-center"><?= $val->HubunganDenganKepalaKeluarga; ?></td>
									<td class="align-middle text-center"><?= $val->TanggalLahir; ?></td>
									<td class="align-middle text-center"><?= $val->StatusKawin; ?></td>
									<td class="align-middle text-center"><?= $val->Pekerjaan; ?></td>
									<td class="align-middle text-center"><?= $val->Pendidikan; ?></td>
									<td class="align-middle text-center"><?= $val->UsiaDibawah7Tahun; ?></td>
									<td class="align-middle text-center"><?= $val->Usia7_12; ?></td>
									<td class="align-middle text-center"><?= $val->Usia13_15; ?></td>
									<td class="align-middle text-center"><?= $val->Usia16_18; ?></td>
									<td class="align-middle text-center"><?= $val->Usia19_21; ?></td>
									<td class="align-middle text-center"><?= $val->Usia22_59; ?></td>
									<td class="align-middle text-center"><?= $val->Usia60TahunKeatas; ?></td>
									<td class="align-middle text-center"><?= $val->PenerimaBPNT; ?></td>
									<td class="align-middle text-center"><?= $val->PenerimaBPUM; ?></td>
									<td class="align-middle text-center"><?= $val->PenerimaBST; ?></td>
									<td class="align-middle text-center"><?= $val->PenerimaPKH; ?></td>
									<td class="align-middle text-center"><?= $val->PenerimaSEMBAKO; ?></td>
									<td class="align-middle text-center"><?= $val->ResikoStunting; ?></td>
									<td class="align-middle text-center"><?= $val->tahun; ?></td>
									<td class="align-middle text-center"><?= get_nama_user($val->created_by); ?></td>
									<td class="align-middle text-center"><?= '<div class="btn-group"><button class="btn btn-info btn-sm" title="Edit" onclick="update(' . "'" . $val->id . "'" . ')"><i class="fas fa-edit"></i></button><button class="btn btn-danger btn-sm" title="Hapus" onclick="hapus(' . "'" . $val->id . "'" . ')"><i class="fas fa-trash-alt"></i></button></div>';?></td>
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
		$('#tabel_data_p3ke_individu').DataTable({
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
				<h1 class="modal-title fs-5" id="exampleModalLabel">Form P3ke Individu</h1>
				<button type="button" class="btn bg-gradient-dark mb-0 btn-sm" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
			</div>
			<div class="modal-body">
				<form id="form_input">
					<div class="row">
						<div class="col-lg-12">
							<div class="mb-3">
								<label for="IDKeluargaP3KE" class="form-label">ID Keluarga P3KE</label>
								<input type="hidden" class="form-control" id="indikator" name="indikator">
								<input type="hidden" class="form-control" id="id_edit" name="id_edit">
								<input type="text" class="form-control" id="IDKeluargaP3KE" name="IDKeluargaP3KE" placeholder="ID Keluarga P3KE">
							</div>
						</div>
						<div class="col-lg-12">
							<div class="mb-4">
								<label for="Provinsi" class="form-label">Provinsi</label>
								<input type="text" class="form-control" id="Provinsi" name="Provinsi" placeholder="Provinsi">
							</div>
						</div>
						<div class="col-lg-12">
							<div class="mb-3">
								<label for="KabupatenKota" class="form-label">Kabupaten/Kota</label>
								<input type="text" class="form-control" id="KabupatenKota" name="KabupatenKota" placeholder="Kabupaten/Kota">
							</div>
						</div>
						<div class="col-lg-12">
							<div class="mb-3">
								<label for="Kecamatan" class="form-label">Kecamatan</label>
								<input type="text" class="form-control" id="Kecamatan" name="Kecamatan" placeholder="Kecamatan">
							</div>
						</div>
						<div class="col-lg-12">
							<div class="mb-3">
								<label for="DesaKelurahan" class="form-label">Desa/Kelurahan</label>
								<input type="text" class="form-control" id="DesaKelurahan" name="DesaKelurahan" placeholder="Desa/Kelurahan">
							</div>
						</div>
						<div class="col-lg-12">
							<div class="mb-3">
								<label for="KodeKemdagri" class="form-label">Kode Kemdagri</label>
								<input type="text" class="form-control" id="KodeKemdagri" name="KodeKemdagri" placeholder="Kode Kemdagri">
							</div>
						</div>
						<div class="col-lg-12">
							<div class="mb-4">
								<label for="DesilKesejahteraan" class="form-label">Desil Kesejahteraan</label>
								<input type="text" class="form-control" id="DesilKesejahteraan" name="DesilKesejahteraan" placeholder="Desil Kesejahteraan">
							</div>
						</div>
						<div class="col-lg-12">
							<div class="mb-4">
								<label for="Alamat" class="form-label">Alamat</label>
								<input type="text" class="form-control" id="Alamat" name="Alamat" placeholder="Alamat">
							</div>
						</div>
						<div class="col-lg-12">
							<div class="mb-3">
								<label for="IDIndividu" class="form-label">ID Individu</label>
								<input type="text" class="form-control" id="IDIndividu" name="IDIndividu" placeholder="ID Individu">
							</div>
						</div>
						<div class="col-lg-12">
							<div class="mb-3">
								<label for="Nama" class="form-label">Nama</label>
								<input type="text" class="form-control" id="Nama" name="Nama" placeholder="Nama">
							</div>
						</div>
						<div class="col-lg-12">
							<div class="mb-3">
								<label for="NIK" class="form-label">NIK</label>
								<input type="text" class="form-control" id="NIK" name="NIK" placeholder="NIK">
							</div>
						</div>
						<div class="col-lg-12">
							<div class="mb-3">
								<label for="PadanDukcapil" class="form-label">Padan Dukcapil</label>
								<input type="text" class="form-control" id="PadanDukcapil" name="PadanDukcapil" placeholder="Padan Dukcapil">
							</div>
						</div>
						<div class="col-lg-12">
							<div class="mb-3">
								<label for="JenisKelamin" class="form-label">Jenis Kelamin</label>
								<input type="text" class="form-control" id="JenisKelamin" name="JenisKelamin" placeholder="Jenis Kelamin">
							</div>
						</div>
						<div class="col-lg-12">
							<div class="mb-4">
								<label for="TanggalLahir" class="form-label">Tanggal Lahir</label>
								<input type="date" class="form-control" id="TanggalLahir" name="TanggalLahir">
							</div>
						</div>
						<div class="col-lg-12">
							<div class="mb-4">
								<label for="StatusKawin" class="form-label">Status Kawin</label>
								<input type="text" class="form-control" id="StatusKawin" name="StatusKawin" placeholder="Status Kawin">
							</div>
						</div>
						<div class="col-lg-12">
							<div class="mb-4">
								<label for="Pekerjaan" class="form-label">Pekerjaan</label>
								<input type="text" class="form-control" id="Pekerjaan" name="Pekerjaan" placeholder="Pekerjaan">
							</div>
						</div>
						<div class="col-lg-12">
							<div class="mb-4">
								<label for="Pendidikan" class="form-label">Pendidikan</label>
								<input type="text" class="form-control" id="Pendidikan" name="Pendidikan" placeholder="Pendidikan">
							</div>
						</div>
						<div class="col-lg-12">
							<div class="mb-4">
								<label for="UsiaDibawah7Tahun" class="form-label">Usia Dibawah 7 Tahun</label>
								<input type="text" class="form-control" id="UsiaDibawah7Tahun" name="UsiaDibawah7Tahun" placeholder="Usia Dibawah 7 Tahun">
							</div>
						</div>
						<div class="col-lg-12">
							<div class="mb-4">
								<label for="Usia7_12" class="form-label">Usia 7-12 Tahun</label>
								<input type="text" class="form-control" id="Usia7_12" name="Usia7_12" placeholder="Usia 7-12 Tahun">
							</div>
						</div>
						<div class="col-lg-12">
							<div class="mb-4">
								<label for="Usia13_15" class="form-label">Usia 13-15 Tahun</label>
								<input type="text" class="form-control" id="Usia13_15" name="Usia13_15" placeholder="Usia 13-15 Tahun">
							</div>
						</div>
						<div class="col-lg-12">
							<div class="mb-4">
								<label for="Usia16_18" class="form-label">Usia 16-18 Tahun</label>
								<input type="text" class="form-control" id="Usia16_18" name="Usia16_18" placeholder="Usia 16-18 Tahun">
							</div>
						</div>
						<div class="col-lg-12">
							<div class="mb-4">
								<label for="Usia19_21" class="form-label">Usia 19-21 Tahun</label>
								<input type="text" class="form-control" id="Usia19_21" name="Usia19_21" placeholder="Usia 19-21 Tahun">
							</div>
						</div>
						<div class="col-lg-12">
							<div class="mb-4">
								<label for="Usia22_59" class="form-label">Usia 22-59 Tahun</label>
								<input type="text" class="form-control" id="Usia22_59" name="Usia22_59" placeholder="Usia 22-59 Tahun">
							</div>
						</div>
						<div class="col-lg-12">
							<div class="mb-4">
								<label for="Usia60TahunKeatas" class="form-label">Usia 60 Tahun Keatas</label>
								<input type="text" class="form-control" id="Usia60TahunKeatas" name="Usia60TahunKeatas" placeholder="Usia 60 Tahun Keatas">
							</div>
						</div>
						<div class="col-lg-12">
							<div class="mb-4">
								<label for="PenerimaBPNT" class="form-label">Penerima BPNT</label>
								<input type="text" class="form-control" id="PenerimaBPNT" name="PenerimaBPNT" placeholder="Penerima BPNT">
							</div>
						</div>
						<div class="col-lg-12">
							<div class="mb-4">
								<label for="PenerimaBPUM" class="form-label">Penerima BPUM</label>
								<input type="text" class="form-control" id="PenerimaBPUM" name="PenerimaBPUM" placeholder="Penerima BPUM">
							</div>
						</div>
						<div class="col-lg-12">
							<div class="mb-4">
								<label for="PenerimaBST" class="form-label">Penerima BST</label>
								<input type="text" class="form-control" id="PenerimaBST" name="PenerimaBST" placeholder="Penerima BST">
							</div>
						</div>
						<div class="col-lg-12">
							<div class="mb-4">
								<label for="PenerimaPKH" class="form-label">Penerima PKH</label>
								<input type="text" class="form-control" id="PenerimaPKH" name="PenerimaPKH" placeholder="Penerima PKH">
							</div>
						</div>
						<div class="col-lg-12">
							<div class="mb-4">
								<label for="PenerimaSEMBAKO" class="form-label">Penerima SEMBAKO</label>
								<input type="text" class="form-control" id="PenerimaSEMBAKO" name="PenerimaSEMBAKO" placeholder="Penerima SEMBAKO">
							</div>
						</div>
						<div class="col-lg-12">
							<div class="mb-4">
								<label for="ResikoStunting" class="form-label">Resiko Stunting</label>
								<input type="text" class="form-control" id="ResikoStunting" name="ResikoStunting" placeholder="Resiko Stunting">
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
				<h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah Data P3KE</h1>
				<button type="button" class="btn bg-gradient-dark mb-0 btn-sm" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
			</div>
			<div class="modal-body">
				<form id="form_input">
					<div class="row">
						<div class="col-lg-12">
							<div class="mb-4">
								<label class="form-label">Pilih Jenis Data</label>
								<div class="row">
									<div class="col-md-6">
										<div class="form-check">
											<input class="form-check-input" type="checkbox" name="data_type[]" id="p3ke_keluarga" value="p3ke_keluarga">
											<label class="form-check-label" for="p3ke_keluarga">
												P3KE Keluarga
											</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-check">
											<input class="form-check-input" type="checkbox" name="data_type[]" id="p3ke_individu" value="p3ke_individu">
											<label class="form-check-label" for="p3ke_individu">
												P3KE Individu
											</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="mb-4">
								<label for="formFile" class="form-label">Upload Excel</label>
								<span><i style="color: #FA8958; font-size: 8pt">*File: .xls/.xlsx</i></span>
								<input type="file" class="form-control" name="file" id="file">
								<span><i style="color: red; font-size: 8pt">* File: .xls/.xlsx only</i></span>
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
				<h1 class="modal-title fs-5" id="exampleModalLabel">Export P3KE Individu</h1>
				<button type="button" class="btn bg-gradient-dark mb-0 btn-sm" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
			</div>
			<div class="modal-body">
				<form id="form_export" action="<?= base_url();?>admin/p3ke-individu/export-data" method="POST">
					<div class="row">
						<div class="col-lg-12">
							<div class="mb-4">
								<label for="teammembersName" class="form-label">Judul</label>
								<input type="text" class="form-control" id="judul_export" name="judul_export" placeholder="Judul File Export" value="Data P3KE Individu <?= mdate('%Y-%m-%d', now());?>">
								<input type="hidden" class="form-control" id="tahun" name="tahun" value="<?= $tahun;?>">
							</div>
						</div>
						<div class="col-lg-12">
							<div class="mb-4">
								<label for="teammembersName" class="form-label">Tahun</label>
								<input type="number" class="form-control" id="tahun_export" name="tahun_export" placeholder="Tahun" min="1990" max="2500" value="<?= date('Y'); ?>">
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
	function save_data() {
		var indikator = $("#indikator").val();
		var id = $("#id_edit").val();
		var IDKeluargaP3KE = $("#IDKeluargaP3KE").val();
		var Provinsi = $("#Provinsi").val();
		var KabupatenKota = $("#KabupatenKota").val();
		var Kecamatan = $("#Kecamatan").val();
		var DesaKelurahan = $("#DesaKelurahan").val();
		var KodeKemdagri = $("#KodeKemdagri").val();
		var DesilKesejahteraan = $("#DesilKesejahteraan").val();
		var Alamat = $("#Alamat").val();
		var IDIndividu = $("#IDIndividu").val();
		var Nama = $("#Nama").val();
		var NIK = $("#NIK").val();
		var PadanDukcapil = $("#PadanDukcapil").val();
		var JenisKelamin = $("#JenisKelamin").val();
		var TanggalLahir = $("#TanggalLahir").val();
		var StatusKawin = $("#StatusKawin").val();
		var Pekerjaan = $("#Pekerjaan").val();
		var Pendidikan = $("#Pendidikan").val();
		var UsiaDibawah7Tahun = $("#UsiaDibawah7Tahun").val();
		var Usia7_12 = $("#Usia7_12").val();
		var Usia13_15 = $("#Usia13_15").val();
		var Usia16_18 = $("#Usia16_18").val();
		var Usia19_21 = $("#Usia19_21").val();
		var Usia22_59 = $("#Usia22_59").val();
		var Usia60TahunKeatas = $("#Usia60TahunKeatas").val();
		var PenerimaBPNT = $("#PenerimaBPNT").val();
		var PenerimaBPUM = $("#PenerimaBPUM").val();
		var PenerimaBST = $("#PenerimaBST").val();
		var PenerimaPKH = $("#PenerimaPKH").val();
		var PenerimaSEMBAKO = $("#PenerimaSEMBAKO").val();
		var ResikoStunting = $("#ResikoStunting").val();

		var url = '';

		if (indikator == 69) {
			url = '<?= base_url(); ?>P3keInd/updateData/' + id;
		} else {
			url = '<?= base_url(); ?>P3keInd/insertData';
		}

		var form_data = new FormData();
		form_data.append('id', id);
		form_data.append('IDKeluargaP3KE', IDKeluargaP3KE);
		form_data.append('Provinsi', Provinsi);
		form_data.append('KabupatenKota', KabupatenKota);
		form_data.append('Kecamatan', Kecamatan);
		form_data.append('DesaKelurahan', DesaKelurahan);
		form_data.append('KodeKemdagri', KodeKemdagri);
		form_data.append('DesilKesejahteraan', DesilKesejahteraan);
		form_data.append('Alamat', Alamat);
		form_data.append('IDIndividu', IDIndividu);
		form_data.append('Nama', Nama);
		form_data.append('NIK', NIK);
		form_data.append('PadanDukcapil', PadanDukcapil);
		form_data.append('JenisKelamin', JenisKelamin);
		form_data.append('TanggalLahir', TanggalLahir);
		form_data.append('StatusKawin', StatusKawin);
		form_data.append('Pekerjaan', Pekerjaan);
		form_data.append('Pendidikan', Pendidikan);
		form_data.append('UsiaDibawah7Tahun', UsiaDibawah7Tahun);
		form_data.append('Usia7_12', Usia7_12);
		form_data.append('Usia13_15', Usia13_15);
		form_data.append('Usia16_18', Usia16_18);
		form_data.append('Usia19_21', Usia19_21);
		form_data.append('Usia22_59', Usia22_59);
		form_data.append('Usia60TahunKeatas', Usia60TahunKeatas);
		form_data.append('PenerimaBPNT', PenerimaBPNT);
		form_data.append('PenerimaBPUM', PenerimaBPUM);
		form_data.append('PenerimaBST', PenerimaBST);
		form_data.append('PenerimaPKH', PenerimaPKH);
		form_data.append('PenerimaSEMBAKO', PenerimaSEMBAKO);
		form_data.append('ResikoStunting', ResikoStunting);

		$.ajax({
			dataType: 'json',
			type: 'POST',
			url: url,
			cache: false,
			contentType: false,
			processData: false,
			data: form_data,
			success: function(data, status) {
				if (data.status != 'error') {
					$(".modal").modal('hide');
					toastr.success(data.msg, 'Success Alert', {
						timeOut: 1000
					});
					toastr.success('Data Berhasil Disimpan', 'Success Alert', {
						timeOut: 1000
					});
					setTimeout(function() {
						location.reload();
					}, 1000);
				} else {
					toastr.error(data.msg, 'Error Alert', {
						timeOut: 5000
					});
				}
			},
		});
	}

	function fillFormWithData(data) {
		$("#id_edit").val(data.id);
		$("#IDKeluargaP3KE").val(data.IDKeluargaP3KE);
		$("#Provinsi").val(data.Provinsi);
		$("#KabupatenKota").val(data.KabupatenKota);
		$("#Kecamatan").val(data.Kecamatan);
		$("#DesaKelurahan").val(data.DesaKelurahan);
		$("#KodeKemdagri").val(data.KodeKemdagri);
		$("#DesilKesejahteraan").val(data.DesilKesejahteraan);
		$("#Alamat").val(data.Alamat);
		$("#IDIndividu").val(data.IDIndividu);
		$("#Nama").val(data.Nama);
		$("#NIK").val(data.NIK);
		$("#PadanDukcapil").val(data.PadanDukcapil);
		$("#JenisKelamin").val(data.JenisKelamin);
		$("#TanggalLahir").val(data.TanggalLahir);
		$("#StatusKawin").val(data.StatusKawin);
		$("#Pekerjaan").val(data.Pekerjaan);
		$("#Pendidikan").val(data.Pendidikan);
		$("#UsiaDibawah7Tahun").val(data.UsiaDibawah7Tahun);
		$("#Usia7_12").val(data.Usia7_12);
		$("#Usia13_15").val(data.Usia13_15);
		$("#Usia16_18").val(data.Usia16_18);
		$("#Usia19_21").val(data.Usia19_21);
		$("#Usia22_59").val(data.Usia22_59);
		$("#Usia60TahunKeatas").val(data.Usia60TahunKeatas);
		$("#PenerimaBPNT").val(data.PenerimaBPNT);
		$("#PenerimaBPUM").val(data.PenerimaBPUM);
		$("#PenerimaBST").val(data.PenerimaBST);
		$("#PenerimaPKH").val(data.PenerimaPKH);
		$("#PenerimaSEMBAKO").val(data.PenerimaSEMBAKO);
		$("#ResikoStunting").val(data.ResikoStunting);
	}

	function update(id){
		console.log(id);
		$.ajax({
			dataType: 'json',
			url: '<?= base_url();?>P3keInd/getById/'+id,
			success: function ( data) {
				console.log(data);
				$("#addmembers").find("input[name='indikator']").val(69);
				fillFormWithData(data.data[0]);
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
			url: '<?= base_url();?>P3keInd/getById/'+id,
			success: function ( data) {
				var Nama = data.data[0].Nama;
				console.log(Nama);
				$.confirm({
					title : 'Hapus Data',
					content : '<strong>Anda Yakin Untuk Menghapus Data :</strong> '+Nama,
					buttons: {
						hapus: {
							btnClass: 'btn-blue',
							text:'Hapus',
							action: function(){
								$.ajax({
									dataType: 'json',
									type:'POST',
									url: '<?= base_url();?>P3keInd/delete/'+id,
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

	function upload_data() {
		var excel_file = $('#file')[0].files[0];
		var selectedTypes = [];

		$('input[name="data_type[]"]:checked').each(function() {
			selectedTypes.push($(this).val());
		});

		if (selectedTypes.length === 0) {
			toastr.error('Mohon Pilih Jenis Data Yang Diupload.', 'Error Alert', { timeOut: 5000 });
			return;
		}

		var form_data = new FormData();
		form_data.append('excel_file', excel_file);
		form_data.append('selected_types', selectedTypes);

		$.ajax({
			dataType: 'json',
			type: 'POST',
			url: '<?= base_url(); ?>P3keCon/import/',
			cache: false,
			contentType: false,
			processData: false,
			data: form_data,
			success: function(data, status) {
				if (data.status != 'error') {
					$(".modal").modal('hide');
					location.reload();
					toastr.success(data.msg, 'Success Alert', { timeOut: 5000 });
					toastr.success('Item Created Successfully.', 'Success Alert', { timeOut: 5000 });
				} else {
					toastr.error(data.msg, 'Error Alert', { timeOut: 5000 });
				}
			}
		});
	}

</script>