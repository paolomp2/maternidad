@extends('templates.indicatorsTemplate')

@section('content')

<div class="row">
	
	<!-- DATOS PARA EL CHART -->
	@if($dataContainer->chart==true)
	<?php $data_chart = $dataContainer->data_chart ?>
	{!! Form::hidden('labels', $data_chart['labels'], ['id'=>'labels']) !!}
	{!! Form::hidden('num_months', $data_chart['num_months'], ['id'=>'num_months']) !!}	
	{!! Form::hidden('year_beg', $data_chart['year_beg'], ['id'=>'year_beg']) !!}
	{!! Form::hidden('year_end', $data_chart['year_end'], ['id'=>'year_end']) !!}
	{!! Form::hidden('month_beg', $data_chart['month_beg']-1, ['id'=>'month_beg']) !!}
	{!! Form::hidden('month_end', $data_chart['month_end']-1, ['id'=>'month_end']) !!}

	@for($i=0;$i<$data_chart['num_months'];$i++)

	@endfor
	@endif
	<!-- FIN DE DATOS PARA EL CHART -->
    <div class="col-lg-12">
        <h3 class="page-header">{!!$dataContainer->report_name!!}</h3>            
    </div>    
</div>
@include('layouts.date_range')

@if($dataContainer->chart==true)
	@include('layouts.chart')


	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Detalle</h3>
		</div>
		<div class="panel-body">
			<?php 	$labels = json_decode($data_chart['labels']);
					$data_package = json_decode($data_chart['data']);
					$i=0;
					$aux = array();
					foreach ($data_package->percentage as $percentage) {						
						$aux[$i] = $percentage;
						$i++;
					}
					$data_package->percentage=array();
					$data_package->percentage=$aux;
					$i=0;
					$aux = array();
					foreach ($data_package->cant as $cant) {						
						$aux[$i] = $cant;
						$i++;
					}
					$data_package->cant=array();
					$data_package->cant=$aux;
					$i=0;
					$months = ["Grupo 1","Grupo 2","Grupo 3","Grupo 4"];
					$encode_data = json_encode($data_package);

			?>
			{!! Form::hidden('values', $encode_data, ['id'=>'data']) !!}
			@foreach($labels as $label)
			<?php $ind_month = $data_chart['month_beg']-1; $year=$data_chart['year_beg']?>
			<div class="col-lg-12">
				<div class="col-lg-2">
				</div>
				<div class="col-lg-10">
					<font size="4" color="#337ab7">
						{!!$label!!}
					</font>
				</div>
				<div class="col-lg-2">
				</div>
				<div class="col-lg-8">
				<!-- TABLA DEL INDICADOR -->
				<table class="table">
					<tr class="info">
						<th>Grupo</th>
						<th>Cantidad</th>
						<th>Porcentaje</th>
					</tr>
					@for ($j = 0; $j < $data_chart['num_months']; $j++)
					<tr>
						<td>{!!$months[$ind_month]!!}</td>
						<td>{!!$data_package->cant[$j][$i]!!}</td>
						<td>{!!$data_package->percentage[$j][$i]!!}{!!"%"!!}</td>
					</tr>
					<?php $ind_month++;
						if ($ind_month==12) {
							$ind_month=0;
							$year++;
						}
					?>
					@endfor
				</table>
				<!-- FIN TABLA DEL INDICADOR -->
				</div>
				<div class="col-lg-2">
				</div>
			</div>
			<?php $i++; ?>
			@endforeach
		</div>
	</div>

@endif

@endsection