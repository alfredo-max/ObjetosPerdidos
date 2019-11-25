<?php
session_start();
if (isset($_SESSION["tipo"])) {
  if($_SESSION["tipo"]=='usuario_regular') header("Location: HomeUsuarioRegular.php");
}
//session_abort();
//session_start();
// si no se ha iniciado seccion
if(!isset($_SESSION["usuario"])){
   header("Location:../index.html");
}

require_once '../../Controllers/Controladores/GraficasControlador.php';
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Estadisticas</title>

    <script src="../../Chart.js-2.9.3/dist/Chart.min.js"></script>
    <script src="../../Chart.js-2.9.3/samples/utils.js"></script>

    <style>
		/*canvas{
			-moz-user-select: none;
			-webkit-user-select: none;
			-ms-user-select: none;
		}*/
	</style>
</head>
<body>

<div style="width:75%;">
		<canvas id="canvas"></canvas>
	</div>
	<br>
	<br>
	<script>
		var config = {
			type: 'line',
			data: {
				labels: [<?php 
				foreach (DatosGrafica::RangoMeses() as $value) {
					echo $value;
				}
				?>],
				datasets: [{
					label: 'Objetos perdidos',
					backgroundColor: window.chartColors.red,
					borderColor: window.chartColors.red,
					data: [12,5,4,6,7,<?php //echo DatosGrafica::ObjetosPerdidos();?>],
					fill: false,
				}, {
					label: 'Objetos encontrados',
					fill: false,
					backgroundColor: window.chartColors.blue,
					borderColor: window.chartColors.blue,
					data: [10,3,9,2,6,<?php //echo DatosGrafica::ObjetosEntregados();?>
					],
				}]
			},
			options: {
				responsive: true,
				title: {
					display: true,
					text: 'Objetos perdidos y encontrados en un intervalo de 5 meses'
				},
				tooltips: {
					mode: 'index',
					intersect: false,
				},
				hover: {
					mode: 'nearest',
					intersect: true
				},
				scales: {
					xAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Month'
						}
					}],
					yAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Value'
						}
					}]
				}
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('canvas').getContext('2d');
			window.myLine = new Chart(ctx, config);
		};

	/*	document.getElementById('randomizeData').addEventListener('click', function() {
			config.data.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return randomScalingFactor();
				});

			});

			window.myLine.update();
		});

		var colorNames = Object.keys(window.chartColors);
		document.getElementById('addDataset').addEventListener('click', function() {
			var colorName = colorNames[config.data.datasets.length % colorNames.length];
			var newColor = window.chartColors[colorName];
			var newDataset = {
				label: 'Dataset ' + config.data.datasets.length,
				backgroundColor: newColor,
				borderColor: newColor,
				data: [],
				fill: false
			};

			for (var index = 0; index < config.data.labels.length; ++index) {
				newDataset.data.push(randomScalingFactor());
			}

			config.data.datasets.push(newDataset);
			window.myLine.update();
		});

		document.getElementById('addData').addEventListener('click', function() {
			if (config.data.datasets.length > 0) {
				var month = MONTHS[config.data.labels.length % MONTHS.length];
				config.data.labels.push(month);

				config.data.datasets.forEach(function(dataset) {
					dataset.data.push(randomScalingFactor());
				});

				window.myLine.update();
			}
		});

		document.getElementById('removeDataset').addEventListener('click', function() {
			config.data.datasets.splice(0, 1);
			window.myLine.update();
		});

		document.getElementById('removeData').addEventListener('click', function() {
			config.data.labels.splice(-1, 1); // remove the label first

			config.data.datasets.forEach(function(dataset) {
				dataset.data.pop();
			});

			window.myLine.update();
		}); */
	</script>
</body>
</html>