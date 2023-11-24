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
<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="py-5 mb-4"><span class="text-muted fw-light">Beranda /</span> Data Stunting</h4>

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

<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

	<div class="row">
		<!-- Bar Charts -->
		<div class="col-xl-6 col-12 mb-4">
			<div class="card">
				<div class="card-header header-elements">
					<h5 class="card-title mb-0">Latest Statistics</h5>
					<div class="card-action-element ms-auto py-0">
						<div class="dropdown">
							<button type="button" class="btn dropdown-toggle px-0" data-bs-toggle="dropdown" aria-expanded="false">
								<i class="ti ti-calendar"></i>
							</button>
							<ul class="dropdown-menu dropdown-menu-end">
								<li>
									<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Today</a>
								</li>
								<li>
									<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Yesterday</a>
								</li>
								<li>
									<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last 7 Days</a>
								</li>
								<li>
									<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last 30 Days</a>
								</li>
								<li>
									<hr class="dropdown-divider" />
								</li>
								<li>
									<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Current Month</a>
								</li>
								<li>
									<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last Month</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="card-body">
					<canvas id="pieChartAnggaranPMD" class="chartjs mb-4" data-height="350" height="400" style="display: block; box-sizing: border-box; height: 400px; width: 400px;" width="400">
					</canvas>
				</div>
			</div>
		</div>
		<!-- /Bar Charts -->

		<!-- Horizontal Bar Charts -->
		<div class="col-xl-6 col-12 mb-4">
			<div class="card">
				<div class="card-header header-elements">
					<div class="d-flex flex-column">
						<p class="card-subtitle text-muted mb-1">Balance</p>
						<?php
						$total_realisasi_anggaran = 0;
						foreach ($chart_data as $data) {
							$total_realisasi_anggaran += $data['realisasi_anggaran'];
						}
						$total_realisasi_anggaran_formatted = number_format($total_realisasi_anggaran);

						?>
						<h5 class="card-title mb-0"><?= $total_realisasi_anggaran_formatted; ?></h5>
					</div>
					<div class="card-action-element ms-auto py-0">
						<div class="dropdown">
							<button type="button" class="btn dropdown-toggle px-0" data-bs-toggle="dropdown" aria-expanded="false">
								<i class="ti ti-calendar"></i>
							</button>
							<ul class="dropdown-menu dropdown-menu-end" id="yearDropdown">
								<?php
								// Generate options for the select based on available years in your data
								$available_years = $this->db->query("SELECT DISTINCT tahun FROM input_program")->result_array();
								foreach ($available_years as $year) {
									echo "<li><a href=\"javascript:void(0);\" class=\"dropdown-item d-flex align-items-center\" onclick=\"updateChart('{$year['tahun']}')\">{$year['tahun']}</a></li>";
								}
								?>
								<li>
									<hr class="dropdown-divider" />
								</li>
								<li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" onclick="updateChart('Last Year')">Last Year</a></li>
							</ul>
						</div>
					</div>
				</div>
				<canvas id="pieChartJenisProgram" class="chartjs mb-4" data-height="350" height="400" style="display: block; box-sizing: border-box; height: 400px; width: 400px;" width="400">
				</canvas>
				<script>
					function updateChart(year) {
						// Reload the page with the selected year as a parameter
						window.location.href = '<?= base_url("chartcontroller/index") ?>' + (year ? '?year=' + year : '');
					}

					// Assuming you have already fetched chartData from your controller
					var chartData = <?php echo json_encode($chart_data); ?>;
					// Rest of your Chart.js code...
				</script>
			</div>
		</div>
		<!-- /Horizontal Bar Charts -->

		<!-- Line Charts -->
		<div class="col-12 mb-4">
			<div class="card">
				<div class="card-header header-elements">
					<div>
						<h5 class="card-title mb-0">Statistics</h5>
						<small class="text-muted">Commercial networks and enterprises</small>
					</div>
					<div class="card-header-elements ms-auto py-0">
						<h5 class="mb-0 me-3">$ 78,000</h5>
						<span class="badge bg-label-secondary">
							<i class="ti ti-arrow-up ti-xs text-success"></i>
							<span class="align-middle">37%</span>
						</span>
					</div>
				</div>
				<div class="card-body pt-2">
					<canvas id="lineChart" class="chartjs" data-height="500"></canvas>
				</div>
			</div>
		</div>
		<!-- /Line Charts -->

		<!-- Radar Chart -->
		<div class="col-lg-6 col-12 mb-4">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title mb-0">Radar Chart</h5>
				</div>
				<div class="card-body pt-2">
					<canvas class="chartjs" id="radarChart" data-height="355"></canvas>
				</div>
			</div>
		</div>
		<!-- /Radar Chart -->

		<!-- Polar Area Chart -->
		<div class="col-lg-6 col-12 mb-4">
			<div class="card">
				<div class="card-header header-elements">
					<h5 class="card-title mb-0">Average Skills</h5>
					<div class="card-header-elements ms-auto py-0 dropdown">
						<button type="button" class="btn dropdown-toggle hide-arrow p-0" id="heat-chart-dd" data-bs-toggle="dropdown" aria-expanded="false">
							<i class="ti ti-dots-vertical"></i>
						</button>
						<div class="dropdown-menu dropdown-menu-end" aria-labelledby="heat-chart-dd">
							<a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
							<a class="dropdown-item" href="javascript:void(0);">Last Month</a>
							<a class="dropdown-item" href="javascript:void(0);">Last Year</a>
						</div>
					</div>
				</div>
				<div class="card-body">
					<canvas id="polarChart" class="chartjs" data-height="337"></canvas>
				</div>
			</div>
		</div>
		<!-- /Polar Area Chart -->

		<!-- Bubble Chart -->
		<div class="col-12 mb-4">
			<div class="card">
				<div class="card-header header-elements">
					<h5 class="card-title mb-0">Bubble Chart</h5>
					<div class="card-header-elements ms-auto py-0">
						<h5 class="mb-0 me-3">$ 100,000</h5>
						<span class="badge bg-label-secondary">
							<i class="ti ti-arrow-big-down ti-xs text-danger"></i>
							<span class="align-middle">20%</span>
						</span>
					</div>
				</div>
				<div class="card-body">
					<canvas id="bubbleChart" class="chartjs" data-height="500"></canvas>
				</div>
			</div>
		</div>
		<!-- /Bubble Chart -->

		<!-- Line Area Charts -->
		<div class="col-12 mb-4">
			<div class="card">
				<div class="card-header header-elements">
					<h5 class="card-title mb-0">Data Science</h5>
					<div class="card-header-elements py-0 ms-auto">
						<div class="dropdown">
							<button type="button" class="btn dropdown-toggle p-0" data-bs-toggle="dropdown" aria-expanded="false">
								<i class="ti ti-calendar"></i>
							</button>
							<ul class="dropdown-menu dropdown-menu-end">
								<li>
									<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Today</a>
								</li>
								<li>
									<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Yesterday</a>
								</li>
								<li>
									<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last 7 Days</a>
								</li>
								<li>
									<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last 30 Days</a>
								</li>
								<li>
									<hr class="dropdown-divider" />
								</li>
								<li>
									<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Current Month</a>
								</li>
								<li>
									<a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last Month</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="card-body pt-2">
					<canvas id="lineAreaChart" class="chartjs" data-height="450"></canvas>
				</div>
			</div>
		</div>
		<!-- /Line Area Charts -->

		<!-- Doughnut Chart -->
		<div class="col-lg-4 col-12 mb-4">
			<div class="card">
				<h5 class="card-header">User by Devices</h5>
				<div class="card-body">
					<canvas id="doughnutChart" class="chartjs mb-4" data-height="350"></canvas>
					<ul class="doughnut-legend d-flex justify-content-around ps-0 mb-2 pt-1">
						<li class="ct-series-0 d-flex flex-column">
							<h5 class="mb-0">Desktop</h5>
							<span class="badge badge-dot my-2 cursor-pointer rounded-pill" style="background-color: rgb(102, 110, 232); width: 35px; height: 6px"></span>
							<div class="text-muted">80 %</div>
						</li>
						<li class="ct-series-1 d-flex flex-column">
							<h5 class="mb-0">Tablet</h5>
							<span class="badge badge-dot my-2 cursor-pointer rounded-pill" style="background-color: rgb(40, 208, 148); width: 35px; height: 6px"></span>
							<div class="text-muted">10 %</div>
						</li>
						<li class="ct-series-2 d-flex flex-column">
							<h5 class="mb-0">Mobile</h5>
							<span class="badge badge-dot my-2 cursor-pointer rounded-pill" style="background-color: rgb(253, 172, 52); width: 35px; height: 6px"></span>
							<div class="text-muted">10 %</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Doughnut Chart -->

		<!-- Scatter Chart -->
		<div class="col-lg-8 col-12 mb-4">
			<div class="card">
				<div class="card-header flex-nowrap header-elements">
					<h5 class="card-title mb-0">New Product Data</h5>
					<div class="card-header-elements ms-auto py-0 d-none d-sm-block">
						<div class="btn-group" role="group" aria-label="radio toggle button group">
							<input type="radio" class="btn-check" name="btnradio" id="dailyRadio" checked />
							<label class="btn btn-outline-secondary" for="dailyRadio">Daily</label>

							<input type="radio" class="btn-check" name="btnradio" id="monthlyRadio" />
							<label class="btn btn-outline-secondary" for="monthlyRadio">Monthly</label>

							<input type="radio" class="btn-check" name="btnradio" id="yearlyRadio" />
							<label class="btn btn-outline-secondary" for="yearlyRadio">Yearly</label>
						</div>
					</div>
				</div>
				<div class="card-body pt-2">
					<canvas id="scatterChart" class="chartjs" data-height="435"></canvas>
				</div>
			</div>
		</div>
		<!-- /Scatter Chart -->
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

	'use strict';

	(function() {
		// Color Variables
		const purpleColor = '#836AF9',
			yellowColor = '#ffe800',
			cyanColor = '#28dac6',
			orangeColor = '#FF8132',
			orangeLightColor = '#FDAC34',
			oceanBlueColor = '#299AFF',
			greyColor = '#4F5D70',
			greyLightColor = '#EDF1F4',
			blueColor = '#2B9AFF',
			blueLightColor = '#84D0FF';

		let cardColor, headingColor, labelColor, borderColor, legendColor;

		if (isDarkStyle) {
			cardColor = config.colors_dark.cardColor;
			headingColor = config.colors_dark.headingColor;
			labelColor = config.colors_dark.textMuted;
			legendColor = config.colors_dark.bodyColor;
			borderColor = config.colors_dark.borderColor;
		} else {
			cardColor = config.colors.cardColor;
			headingColor = config.colors.headingColor;
			labelColor = config.colors.textMuted;
			legendColor = config.colors.bodyColor;
			borderColor = config.colors.borderColor;
		}

		// Bar Chart
		// --------------------------------------------------------------------
		const barChart = document.getElementById('barChart');
		if (barChart) {
			const barChartVar = new Chart(barChart, {
				type: 'bar',
				data: {
					labels: [
						'7/12',
						'8/12',
						'9/12',
						'10/12',
						'11/12',
						'12/12',
						'13/12',
						'14/12',
						'15/12',
						'16/12',
						'17/12',
						'18/12',
						'19/12'
					],
					datasets: [{
						data: [275, 90, 190, 205, 125, 85, 55, 87, 127, 150, 230, 280, 190],
						backgroundColor: cyanColor,
						borderColor: 'transparent',
						maxBarThickness: 15,
						borderRadius: {
							topRight: 15,
							topLeft: 15
						}
					}]
				},
				options: {
					responsive: true,
					maintainAspectRatio: false,
					animation: {
						duration: 500
					},
					plugins: {
						tooltip: {
							rtl: isRtl,
							backgroundColor: cardColor,
							titleColor: headingColor,
							bodyColor: legendColor,
							borderWidth: 1,
							borderColor: borderColor
						},
						legend: {
							display: false
						}
					},
					scales: {
						x: {
							grid: {
								color: borderColor,
								drawBorder: false,
								borderColor: borderColor
							},
							ticks: {
								color: labelColor
							}
						},
						y: {
							min: 0,
							max: 400,
							grid: {
								color: borderColor,
								drawBorder: false,
								borderColor: borderColor
							},
							ticks: {
								stepSize: 100,
								color: labelColor
							}
						}
					}
				}
			});
		}
		//pieChartJenisProgram
		// Assuming you have already fetched chartData from your controller
		var chartData = <?php echo json_encode($chart_data); ?>;

		// Extracting data for the doughnut chart
		var labels = chartData.map(function(item) {
			return item.nama_program;
		});

		var data = chartData.map(function(item) {
			return item.persentase;
		});

		// Creating Doughnut Chart
		var myDoughnutChart = new Chart('pieChartJenisProgram', {
			type: 'doughnut',
			data: {
				labels: labels,
				datasets: [{
					data: data,
					backgroundColor: [
						'rgba(255, 99, 132, 0.7)',
						'rgba(54, 162, 235, 0.7)',
						'rgba(255, 206, 86, 0.7)',
						'rgba(75, 192, 192, 0.7)',
						'rgba(153, 102, 255, 0.7)'
						// Add more colors as needed
					],
					borderWidth: 0,
					pointStyle: 'rectRounded'
				}]
			},
			options: {
				responsive: true,
				animation: {
					duration: 500
				},
				cutout: '68%',
				plugins: {
					legend: {
						display: true
					},
					tooltip: {
						callbacks: {
							label: function(context) {
								const label = context.labels || '',
									value = context.parsed;
								const output = ' ' + label + ' : ' + value + ' %';
								return output;
							}
						},
						// Updated default tooltip UI
						backgroundColor: 'rgba(0, 0, 0, 0.7)',
						titleColor: '#ffffff',
						bodyColor: '#ffffff',
						borderWidth: 1,
						borderColor: '#ffffff'
					}
				}
			}
		});

		// Extracting data for the doughnut chart
		var labels = chartData.map(function(item) {
			return item.nama_kegiatan;
		});

		var data = chartData.map(function(item) {
			return item.persentase;
		});

		// Adding a new array for jumlah_anggaran
		var jumlahAnggaranData = chartData.map(function(item) {
			return item.jumlah_anggaran;
		});

		// Creating Doughnut Chart
		var myDoughnutChart = new Chart('pieChartAnggaranPMD', {
			type: 'doughnut',
			data: {
				labels: labels,
				datasets: [{
					data: data,
					backgroundColor: [
						'rgba(255, 99, 132, 0.7)',
						'rgba(54, 162, 235, 0.7)',
						'rgba(255, 206, 86, 0.7)',
						'rgba(75, 192, 192, 0.7)',
						'rgba(153, 102, 255, 0.7)'
						// Add more colors as needed
					],
					borderWidth: 0,
					pointStyle: 'rectRounded'
				}]
			},
			options: {
				responsive: true,
				animation: {
					duration: 500
				},
				cutout: '68%',
				plugins: {
					legend: {
						display: true
					},
					tooltip: {
						callbacks: {
							label: function(context) {
								const label = context.labels || '';
								const value = context.parsed;
								const index = context.dataIndex;
								const jumlahAnggaran = jumlahAnggaranData[index];
								const output = ' ' + label + ' : ' + value + ' % (Rp ' + jumlahAnggaran + ')';
								return output;
							}
						},
						// Updated default tooltip UI
						backgroundColor: 'rgba(0, 0, 0, 0.7)',
						titleColor: '#ffffff',
						bodyColor: '#ffffff',
						borderWidth: 1,
						borderColor: '#ffffff'
					}
				}
			}
		});


		// Doughnut Chart
		// --------------------------------------------------------------------
		const doughnutChart = document.getElementById('doughnutChart');
		if (doughnutChart) {
			const doughnutChartVar = new Chart(doughnutChart, {
				type: 'doughnut',
				data: {
					labels: ['Tablet', 'Mobile', 'Desktop'],
					datasets: [{
						data: [10, 10, 80],
						backgroundColor: [cyanColor, orangeLightColor, config.colors.primary],
						borderWidth: 0,
						pointStyle: 'rectRounded'
					}]
				},
				options: {
					responsive: true,
					animation: {
						duration: 500
					},
					cutout: '68%',
					plugins: {
						legend: {
							display: false
						},
						tooltip: {
							callbacks: {
								label: function(context) {
									const label = context.labels || '',
										value = context.parsed;
									const output = ' ' + label + ' : ' + value + ' %';
									return output;
								}
							},
							// Updated default tooltip UI
							rtl: isRtl,
							backgroundColor: cardColor,
							titleColor: headingColor,
							bodyColor: legendColor,
							borderWidth: 1,
							borderColor: borderColor
						}
					}
				}
			});
		}

	})();
</script>