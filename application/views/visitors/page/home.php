<?php $this->load->view('visitors/layout/header'); ?>
<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Content -->
<style>
	.info {
		padding: 6px 8px;
		font: 14px/16px Arial, Helvetica, sans-serif;
		background: white;
		background: rgba(255, 255, 255, 0.8);
		box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
		border-radius: 5px;
	}

	.info h5 {
		margin: 0 0 5px;
		color: #777;
	}

	.legend {
		text-align: left;
		line-height: 18px;
		color: #555;
	}

	.legend i {
		width: 18px;
		height: 18px;
		float: left;
		margin-right: 8px;
		opacity: 0.7;
	}
</style>
<div class="container-fluid">
	<h4 class="py-3 mb-4"><span class="text-muted fw-light">Maps /</span> Leaflet</h4>



	<div class="row">
		<!-- Basic -->
		<div class="col-12">
			<div class="card mb-4">
				<h5 class="card-header">Data Stunting</h5>
				<div class="card-body">
					<div id="maps" style="width: 100%; height: 400px;"></div>
				</div>
			</div>
		</div>
		<!-- /Basic -->
	</div>
</div>
<!--/ Content -->

<?php $this->load->view('visitors/layout/footer'); ?>

<script>
	var peta1 = L.tileLayer(
		"https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFyZGFsaXVzIiwiYSI6ImNsZnVtbDdtZzAyYjMzdXRhdDN6djY5cWoifQ.Xqtyqa7hvGhQla2oAwpG_Q", {
			attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
				'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
				'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
			id: "mapbox/streets-v11",
		}
	);

	var peta2 = L.tileLayer(
		"https://mt1.google.com/vt/lyrs=m&x={x}&y={y}&z={z}", {
			attribution: "© Google Maps",
			maxZoom: 20,
		}
	);

	var peta3 = L.tileLayer(
		"https://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}", {
			maxZoom: 20,
			subdomains: ["mt0", "mt1", "mt2", "mt3"],
		}
	);

	var peta4 = L.tileLayer(
		"https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}", {
			maxZoom: 18,
			id: "mapbox/outdoors-v11",
			tileSize: 512,
			zoomOffset: -1,
			accessToken: "pk.eyJ1IjoibWFyZGFsaXVzIiwiYSI6ImNsZnVtbDdtZzAyYjMzdXRhdDN6djY5cWoifQ.Xqtyqa7hvGhQla2oAwpG_Q",
		}
	);
	const map = L.map("maps", {
		center: [-7.559918802162932, 111.96384670506485],
		zoom: 10,
		layers: [peta1],
	});
	const baseLayers = {
		"Peta 1": peta1,
		"Peta 2": peta2,
	};
	const layerControl = L.control.layers(baseLayers).addTo(map);

	// get color depending on population density value


	//LEGEND
	const legend = L.control({
		position: 'bottomright'
	});

	legend.onAdd = function(map) {

		const div = L.DomUtil.create('div', 'info legend');
		const grades = [0, 10, 20, 50, 100, 200, 500, 1000];
		const labels = [];
		let from, to;

		for (let i = 0; i < grades.length; i++) {
			from = grades[i];
			to = grades[i + 1];

			labels.push(`<i style="background:${getColor(from + 1)}"></i> ${from}${to ? `&ndash;${to}` : '+'}`);
		}

		div.innerHTML = labels.join('<br>');
		return div;
	};

	legend.addTo(map);

	function style(feature) {
		return {
			weight: 2,
			opacity: 1,
			color: 'white',
			dashArray: '3',
			fillOpacity: 0.5,
			fillColor: getColor(feature.properties.Kecamatan)
		};
	}



	//GeoJson
	var kecamatanLayerGroup = L.layerGroup().addTo(map);
	var geoLayer;

	<?php foreach ($get_total_stunting as $key => $value) { ?>
		$.getJSON("<?php echo base_url('assets/maps/kecamatan/' . $value->geojson) ?>", function(data) {
			geoLayer = L.geoJson(data, {
				style: function(feature) {
					var totalResikoStunting = <?php echo $value->TotalResikoStunting; ?>;
					return {
						fillColor: getColor(totalResikoStunting),
						color: "white",
						weight: 2,
						opacity: 1,
						fillOpacity: 0.7
					};
				},
				onEachFeature: function(feature, layer) {
					layer.on({
						mouseover: highlightFeature,
						mouseout: resetHighlight,
						click: zoomToFeature
					});
					layer.bindPopup('Kecamatan : <b><?= $value->Kecamatan ?></b><br>' +
						"<img src='<?= base_url('assets/img/news/news_2.png') ?>' width='200px'>"
					);
				}
			}).addTo(kecamatanLayerGroup);
		});
	<?php 	} ?>

	var overlayMaps = {
		"Kecamatan": kecamatanLayerGroup
	};

	L.control.layers(null, overlayMaps, {
		collapsed: false
	}).addTo(map);



	// Function to get color based on TotalResikoStunting
	function getColor(totalResikoStunting) {
		// Define your classification ranges and colors
		var ranges = [0, 10, 20, 50, 100, 200, 500, 1000]; // Adjust these ranges accordingly
		var colors = ["#ffffcc", "#c2e699", "#78c679", "#31a354", "#006837", "#FC4E2A", "#E31A1C"];

		// Loop through ranges and return corresponding color
		for (var i = 0; i < ranges.length - 1; i++) {
			if (totalResikoStunting >= ranges[i] && totalResikoStunting < ranges[i + 1]) {
				return colors[i];
			}
		}

		// Return a default color if totalResikoStunting is outside of defined ranges
		return "#808080";
	}

	// control that shows state info on hover
	const info = L.control();

	function highlightFeature(e) {
		const layer = e.target;

		layer.setStyle({
			weight: 5,
			color: '#666',
			dashArray: '',

		});

		layer.bringToFront();

		info.update(layer.feature.properties);
	}

	function resetHighlight(e) {
		const layer = e.target;

		layer.setStyle({
			weight: 3,
			opacity: 1,
			color: 'white',
			dashArray: '',
		});
		info.update();
	}

	function zoomToFeature(e) {
		map.fitBounds(e.target.getBounds());
	}

	info.onAdd = function(map) {
		this._div = L.DomUtil.create('div', 'info');
		this.update();
		return this._div;
	};

	info.update = function(props) {
		// console.log(props);
		const kecamatan = props && props.kecamatan ? props.kecamatan : '...';
		// Panggil fungsi get_stunting dan gunakan then() untuk menangani hasilnya
		get_stunting(kecamatan).then(jml_stunting => {
			const contents = `<b>Kecamatan ${kecamatan}</b><br />${jml_stunting} orang`;
			this._div.innerHTML = `<h5>Dekatkan mouse untuk melihat</h5>${contents}`;
		}).catch(error => {
			console.error(error);
		});
	};

	info.addTo(map);
	info.setPosition('bottomleft');


	function get_stunting(kec) {
		return new Promise((resolve, reject) => {
			var form_data = new FormData();
			form_data.append('nama_kec', kec);

			$.ajax({
				dataType: 'json',
				type: 'POST',
				url: 'jml_stunting',
				cache: false,
				contentType: false,
				processData: false,
				data: form_data,
				success: function(data) {
					resolve(data.jml_stunting);
				},
				error: function(error) {
					reject(error);
				},
			});
		});
	}
</script>