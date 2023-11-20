<?php $this->load->view('users/layout/sidebar'); ?>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<form method="post" action="<?= base_url().'admin/reset/save';?>" class="form-horizontal" id="form_ganti_password">
					<div class="card ">
						<div class="card-header card-header-danger card-header-text">
							<div class="card-icon">
								<div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
									<i class="fas fa-key fa-lg" style="color: #000000;"></i>
								</div>
							</div>
							<h4 class="card-title">Ganti Password</h4>
							<br><br><span><?= $this->session->flashdata('status_password');?></span>
						</div>

						<div class="card-body ">
							<div class="row">
								<label class="col-sm-2 col-form-label">Password Lama</label>
								<div class="col-sm-10">
									<div class="form-group has-success bmd-form-group">
										<input type="password" class="form-control" id="password_lama" name="password_lama" value="" required>
									</div>
								</div>
								<label class="col-sm-2 col-form-label">Password Baru</label>
								<div class="col-sm-10">
									<div class="form-group has-success bmd-form-group">
										<input type="password" class="form-control" id="password_baru" name="password_baru" value="" required>
									</div>
								</div>
								<label class="col-sm-2 col-form-label">Konfirmasi Password Baru</label>
								<div class="col-sm-10">
									<div class="form-group has-success bmd-form-group">
										<input type="password" class="form-control" id="konf_password_baru" name="konf_password_baru" value="" required>
										<span id="pesan_konf" style="color: red"></span>
									</div>
								</div>
							</div>
						</div>
						<div class="card-footer text-right">
							<div class="form-check mr-auto">
							</div>
							<button type="submit" name="save_password" class="btn btn-rose">Simpan<div class="ripple-container"></div></button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('users/layout/footer'); ?>
<script>
	cek_konf();

	function cek_konf(){
		$("#pesan_konf").empty();
		$("button[name=save_password]").prop('disabled', false);
		$('#konf_password_baru').on('input', function() {
			var pass_baru = $('#password_baru').val();
			var konf_pass = $('#konf_password_baru').val();
			console.log('password baru adalah: '+pass_baru+'; konfirmasinya adalah: '+konf_pass);
			if(pass_baru !== konf_pass){
				console.log('tidak sama');
				$("button[name=save_password]").prop('disabled', true);
				$("#pesan_konf").html('<div class="alert alert-danger" role="alert">Konfirmasi Password Salah</div>');
			} else {
				console.log('sama');
				$("button[name=save_password]").prop('disabled', false);
				$("#pesan_konf").empty();
			}
		});
	}
</script>