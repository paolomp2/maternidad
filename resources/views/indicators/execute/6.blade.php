@extends('templates.indicatorsTemplate')
@section('content')

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
				<!-- FIN TABLA DEL INDICADOR -->
				</div>
				<div class="col-lg-2">
				</div>
			</div>						
		</div>
	</div>

@endsection