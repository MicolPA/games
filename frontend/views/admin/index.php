<?php
$this->params['breadcrumbs'][] = ['label' => 'Panel de Administración', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
	.admin-card{
		padding:4rem 0rem;
	}
	.admin-card:hover{
		background: black !important;
	}
</style>
<div class="container">
	<div class="row ">
		<div class="col-md-12">
			<h1 class="font-weight-bold display-3 title">Panel de Administración</h1>
		</div>
	</div>


	<div class="row" style="margin-top: 4rem">
		<div class="col-md-3">
			<a href="/admin/create-game" class="no-link">
				<div class="admin-card text-center display-2 bg-danger text-white">
				<i class="fas fa-gamepad mb-3"></i>
				<p class="h3 font-weight-bold">CREAR JUEGOS</p>
			</div>
			</a>
		</div>
		<div class="col-md-3">
			<a href="/admin/create-collection" class="no-link">
				<div class="admin-card text-center display-2 bg-primary text-white">
					<i class="fas fa-layer-group mb-3"></i>
					<p class="h3 font-weight-bold">CREAR SAGAS</p>
				</div>	
			</a>
		</div>
		<div class="col-md-3">
			<a href="/admin/add-colletion-game" class="no-link">
				<div class="admin-card text-center display-2 bg-warning text-white">
					<i class="fas fa-layer-group mb-3"></i>
					<p class="h3 font-weight-bold">AGRUPAR JUEGOS</p>
				</div>	
			</a>
		</div>
		
		<div class="col-md-3">
			<a href="/admin/ver-solicitudes" class="no-link">
				<div class="admin-card text-center display-2 bg-dark text-white">
					<i class="fas fa-users mb-3"></i>
					<p class="h3 font-weight-bold">VER SOLICITUDES</p>
				</div>
			</a>
		</div>
	</div>

	<div class="row" style="padding-top: 4rem">
		<div class="col-md-12">
			<p class="h1 font-weight-bold">JUEGOS PUBLICADOS</p>
		</div>
		<canvas id="myChart" width="400" height="150"></canvas>
	</div>
</div>

<script>
	setTimeout(function(){
		var ctx = document.getElementById('myChart');
		var myChart = new Chart(ctx, {
		    type: 'bar',
		    data: {
		        labels: ['PC', 'PS2', 'PS3', 'Wii'],
		        datasets: [{
		            label: 'Juegos Publicados',
		            data: [<?= $juegos['pc'] ?>,<?= $juegos['ps2'] ?>,<?= $juegos['ps3'] ?>,<?= $juegos['wii'] ?>],
		            backgroundColor: [
		               "<?= $juegos['colores'][0] ?>", " <?= $juegos['colores'][1] ?>"," <?= $juegos['colores'][2] ?>"," <?= $juegos['colores'][3] ?>"
		            ],
		            borderColor: [
		                'rgba(255, 99, 132, 1)',
		                'rgba(54, 162, 235, 1)',
		                'rgba(255, 206, 86, 1)',
		                'rgba(75, 192, 192, 1)',
		                'rgba(153, 102, 255, 1)',
		                'rgba(255, 159, 64, 1)'
		            ],
		            borderWidth: 1
		        }]
		    },
		    options: {
		        scales: {
		            yAxes: [{
		                ticks: {
		                    beginAtZero: true
		                }
		            }]
		        }
		    }
		});
	},500)
</script>