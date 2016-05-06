	@if (count($errors) > 0)
	    <div class="form-group">
        <ul class="nav">
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
{!! Form::open(['url'=>$data['url_post'],'role'=>'form', 'id'=>'search-form','class' => 'form-group']) !!}
	{!!Form::token()!!}
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Rango de fechas para el reporte</h3>
		</div>
		<div class="panel-body">
		<div class="search_bar">
			<div class ="row">
				<div class="form-group col-md-4">
					{!! Form::label('search_codigo_patrimonial','Código Patrimonial') !!}
					{!! Form::text('search_codigo_patrimonial',null,['class'=>'form-control']) !!}
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-4">
					{!! Form::label('search_numero_serie','Número de serie') !!}
					{!! Form::text('search_numero_serie',null,['class'=>'form-control']) !!}
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-4">
					{!! Form::label('search_modelo','Modelo') !!}
					{!! Form::text('search_modelo',null,['class'=>'form-control']) !!}
				</div>
			</div>

			<div class="row">
				<div class="form-group col-md-4">
					{!! Form::label('search_grupo','Grupo') !!}
					{!! Form::select('search_grupo', array(
					'0'=>'',
					'1' => 'GRUPO 1: EQUIPOS BIOMEDICOS DE CIRUGIA', 
					'2' => 'GRUPO 2: EQUIPOS BIOMEDICOS DE NEONATOLOGIA', 
					'3' => 'GRUPO 3: EQUIPOS BIOMEDICOS DE APOYO AL DIAGNOSTICO E IMAGENOLOGIA',
					'4' => 'GRUPO 4: EQUIPOS BIOMEDICOS DE LABORATORIO')) !!}
				</div>
			</div>

			<div class="row">
				<div class="form-group col-md-4">
					{!! Form::label('search_servicio','Servicio') !!}
					{!! Form::select('search_servicio', array(
					'0'=>'',
					'1' => 'ANATOMIA PATOLOGICA', 
					'2' => 'ATENCION INMEDIATA Y EMERGENCIA', 
					'3' => 'BANCO DE LECHE',
					'4' => 'BANCO DE SANGRE',
					'5' => 'CENTRO OBSTETRICO',
					'6' => 'CENTRO QUIRURGICO',
					'7' => 'CLINICA',
					'8' => 'CONSULTA EXTERNA DE GINECO OBSTETRICIA',
					'9' => 'CONSULTORIO EXTERNO',
					'10' => 'CUIDADOS INTENSIVOS NEONATAL',
					'11' => 'DIAGNOSTICO POR IMÁGENES',
					'12' => 'EMERGENCIA',
					'13' => 'ESPECIALIDADES MEDICAS',
					'14' => 'FARMACIA',
					'15' => 'GENETICA',
					'16' => 'GINECOLOGIA ONCOLOGICA',
					'17' => 'GINECOLOGIA PATOLOGICA',
					'18' => 'INTERMEDIOS A',
					'19' => 'INTERMEDIOS B',
					'20' => 'MADRES DELICADAS',
					'21' => 'MANTENIMIENTO',
					'22' => 'OBSTETRICIA A',
					'23' => 'OBSTETRICIA B',
					'24' => 'OBSTETRICIA C',
					'25' => 'OBSTETRICIA D',
					'26' => 'OBSTETRICIA E',
					'27' => 'ODONTOESTOMATOLOGIA',
					'28' => 'PATOLOGIA CLINICA',
					'29' => 'RECUPERACION POST ANESTESICA',
					'30' => 'UCI MATERNO',
					'31' => 'UNIDAD MEDICINA FETAL',
					'32' => 'PSICOLOGIA',
					'33' => 'CENTRAL DE ESTERILIZACION',
					'34' => 'PUERICULTURA NEONATAL',
					'35' => 'MEDICINA REPRODUCTIVA',
					'36' => 'NUTRICION',
					'37' => 'GINECOLOGIA ESPECIALIZADA',
					'38' => 'REHABILITACION',
					'39' => 'CIRUGIA NEONATAL'
					)) !!}
				</div>
			</div>

			<div class="row">						
				<div class="form-group col-md-4">
					{!! Form::label('search_fecha_ini','Fecha inicio *') !!}
					<div id="datetimepicker_search_anho1" class="form-group input-group date">
						{!! Form::text('search_fecha_ini',null,['class'=>'form-control','readonly'=>'']) !!}
						<span class="input-group-addon">
		                    <span class="glyphicon glyphicon-calendar"></span>
		                </span>
					</div>
				</div>
				<div class="form-group col-md-4">
					{!! Form::label('search_fecha_fin','Fecha fin *') !!}
					<div id="datetimepicker_search_anho2" class="input-group date">
						{!! Form::text('search_fecha_fin',null,['class'=>'form-control','readonly'=>'']) !!}
						<span class="input-group-addon">
	                        <span class="glyphicon glyphicon-calendar"></span>
	                    </span>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group col-md-2 col-md-offset-8">
					
				</div>
				<div class="form-group col-md-2">
					{!! Form::button('<span class="glyphicon glyphicon-search"></span> Buscar', array('id'=>'submit-search-form','type' => 'submit', 'class' => 'btn btn-primary btn-block')) !!}							
				</div>
			</div>
		</div>	
		</div>
	</div>
{!! Form::close() !!}</br>