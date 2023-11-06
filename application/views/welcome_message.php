<?php $this->load->view('visitors/layout/header'); ?>
<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Content -->
<div class="container-fluid">
	<h4 class="py-3 mb-4"><span class="text-muted fw-light">Maps /</span> Leaflet</h4>

	<div id="map" style="width: 100%; height: 400px;"></div>
	<div class="row">
		<!-- Basic -->
		<div class="col-12">
			<div class="card mb-4">
				<h5 class="card-header">Basic Map</h5>
				<div class="card-body">
					<div class="leaflet-map" id="basicMap"></div>
				</div>
			</div>
		</div>
		<!-- /Basic -->

		<!-- Marker Circle & Polygon -->
		<div class="col-12">
			<div class="card mb-4">
				<h5 class="card-header">Marker Circle & Polygon</h5>
				<div class="card-body">
					<div class="leaflet-map" id="shapeMap"></div>
				</div>
			</div>
		</div>
		<!-- /Marker Circle & Polygon -->

		<!-- Draggable Marker With Popup -->
		<div class="col-12">
			<div class="card mb-4">
				<h5 class="card-header">Draggable Marker With Popup</h5>
				<div class="card-body">
					<div class="leaflet-map" id="dragMap"></div>
				</div>
			</div>
		</div>
		<!-- /Draggable Marker With Popup -->

		<!-- User Location -->
		<div class="col-12">
			<div class="card mb-4">
				<h5 class="card-header">User Location</h5>
				<div class="card-body">
					<div class="leaflet-map" id="userLocation"></div>
				</div>
			</div>
		</div>
		<!-- /User Location -->

		<!-- Custom Icons -->
		<div class="col-12">
			<div class="card mb-4">
				<h5 class="card-header">Custom Icons</h5>
				<div class="card-body">
					<div class="leaflet-map" id="customIcons"></div>
				</div>
			</div>
		</div>
		<!-- /Custom Icons -->

		<!-- GeoJson -->
		<div class="col-12">
			<div class="card mb-4">
				<h5 class="card-header">GeoJson</h5>
				<div class="card-body">
					<div class="leaflet-map" id="geoJson"></div>
				</div>
			</div>
		</div>
		<!-- /GeoJson -->

		<!-- Layer Control -->
		<div class="col-12">
			<div class="card">
				<h5 class="card-header">Layer Control</h5>
				<div class="card-body">
					<div class="leaflet-map" id="layerControl"></div>
				</div>
			</div>
		</div>
		<!-- /Layer Control -->
	</div>
</div>
<!--/ Content -->

<?php $this->load->view('visitors/layout/footer'); ?>