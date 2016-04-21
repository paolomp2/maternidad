@extends('templates/loginTemplate')

@section('content')

@if (count($errors) > 0)
	<div class="alert alert-danger alert-dissmisable">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif


<div id="header">
	<div class="row row-header">
		<img id="logo1" src="{{asset('img')}}/logo_uib.png">
		<p id="title1" >PROGRAMA DE GESTIÓN EN TECNOLOGÍAS DE SALUD E INGENIERÍA CLÍNICA</p>
	</div>
</div>
<div class="top-content">        	
   <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3 form-box">
            	<div class="form-top" style="border-radius:8px 8px 8px 8px;">
            		<div class="form-top-left">
            			<h3><strong>BIENVENIDO AL SISTEMA GTS</strong></h3>
                		<p>Ingrese a su cuenta</p>
            		</div>
            		<div class="form-top-right">
            			<i class="fa fa-lock"></i>
            		</div>
                </div>
                {!! Form::open(array('url'=>'/auth/login', 'role'=>'form')) !!}
                <div class="form-bottom">
                    <form role="form" action="" method="post" class="login-form">			                    	
                    	<div class="form-group">
                    		<label class="sr-only" for="form-username">Usuario</label>
                        	<div class="input-group">
		                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
		                        {!! Form::text('email',Input::old('usuario'),array('class'=>'form-control','placeholder'=>'Usuario')) !!}
	                    	</div>
                        </div>
                        <div class="form-group">
                        	<label class="sr-only" for="form-password">Contraseña</label>
                        	<div class="input-group">
		                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
		                       	{!! Form::password('password',array('class'=>'form-control','placeholder'=>'Contraseña')) !!}
	                    	</div>
                        </div>
                        {!! Form::submit('Ingresar',array('id'=>'submit-login', 'class'=>'btn btn-lg btn-primary btn-block')) !!}
                        
                    </form>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
				
@endsection
