@extends('templates.indicatorsTemplate')
@section('content')

<<<<<<< HEAD
<div class="row">		
    <div class="col-lg-12">
        <h3 class="page-header">{!!$dataContainer->page_name!!}</h3>            
    </div>    
</div>
@include('layouts.date_range')

	<div class="panel panel-default">

		<div class="panel-heading">
			<h3 class="panel-title">Detalle</h3>
		</div>

		<div class="panel-body">								                                
			<div class="col-lg-12">                                     
				<table id="list_table" class="table display">
				  <thead>
				    <tr>
				      <th>Servicios clínicos</th>
				      <th>Preventivos</th>
				      <th>Correctivos</th>
				      <th>Metrológicos</th>
				      <th>Inspecciones</th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
				      <th scope="row">Anatomía Patológica</th>
				      <td>5</td>
				      <td>7</td>
				      <td>9</td>
				      <td>6</td>            
				    </tr>
				    <tr>
				      <th scope="row">Atención Inmediata</th>
				      <td>5</td>
				      <td>7</td>
				      <td>9</td>
				      <td>6</td>            
				    </tr>
				    <tr>
				      <th scope="row">Banco de Leche</th>
				      <td>5</td>
				      <td>7</td>
				      <td>9</td>
				      <td>6</td>            
				    </tr>
				    <tr>
				      <th scope="row">Banco de Sangre</th>
				      <td>5</td>
				      <td>7</td>
				      <td>9</td>
				      <td>6</td>            
				    </tr>
				                  
				  </tbody>
				</table> 
=======
<div class="row">	
	<!-- DATOS PARA EL CHART -->
	@if($data['chart']=='true')
		<?php $data_chart = $data['data_chart'] ?>		
		{!! Form::hidden('num_months', $data_chart['num_months'], ['id'=>'num_months']) !!}	
		{!! Form::hidden('year_beg', $data_chart['year_beg'], ['id'=>'year_beg']) !!}
		{!! Form::hidden('year_end', $data_chart['year_end'], ['id'=>'year_end']) !!}
		{!! Form::hidden('month_beg', $data_chart['month_beg'], ['id'=>'month_beg']) !!}
		{!! Form::hidden('month_end', $data_chart['month_end'], ['id'=>'month_end']) !!}

		@for($i=0;$i<$data_chart['num_months'];$i++)
		@endfor
	@endif
	<!-- FIN DE DATOS PARA EL CHART -->
    <div class="col-lg-12">
        <h3 class="page-header">{!!$data['report_name'] or "Ningún nombre detectado"!!}</h3>            
    </div>    
</div>
@include('layouts.date_range_only')

@if($data['chart']=='true')	

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Detalle</h3>
		</div>
		<div class="panel-body">
			<?php   $nombresServicios = $data_chart['nombresServicios'];?>									
                                
			<div class="col-lg-12">
				<div class="col-lg-2">
				</div>
				<div class="col-lg-10">
					<font size="4" color="#337ab7">
						
					</font>
				</div>
				<div class="col-lg-2">
				</div>
				<div class="col-lg-8">
                                                                        
				<!-- TABLA DEL INDICADOR -->
				<table class="table">
					<tr class="info">
                                            <th>Servicios</th>
                                            <th>Preventivo</th>
                                            <th>Correctivo</th>
                                            <th>Metrológico</th>
                                            <th>Inspecciones</th>
					</tr>		
                                        <?php foreach($nombresServicios as $s) {  ?>
					<tr>
                                            <td><?php echo $s; ?></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
					</tr>	
                                        <?php } ?>
				</table>
>>>>>>> b8c0726793d64e53b3670b96e7dc5c49abf79e67
				<!-- FIN TABLA DEL INDICADOR -->
				</div>
				<div class="col-lg-2">
				</div>
			</div>						
		</div>
	</div>
<<<<<<< HEAD
=======
@endif
>>>>>>> b8c0726793d64e53b3670b96e7dc5c49abf79e67

@endsection