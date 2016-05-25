@extends('templates.indicatorsTemplate')

@section('content')
<div class="row">
	<div class="col-lg-12">
        <h3 class="page-header">{!!$dataContainer->report_name!!}</h3>            
    </div>   
</div>
@include('layouts.date_range')
<?php 
    $data_table =$dataContainer->data_table;                                    
?>
<div class="panel panel-default">

    <div class="panel-heading">
        <h3 class="panel-title">Detalle</h3>
    </div>

    <div class="panel-body">								                                
        <div class="col-lg-12">                                     
            <table id="list_table" class="table display">
                <thead>
                    <tr>
                        <th>Servicios Clínicos</th>
                        <th>Bajas Pendientes</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data_table as $data) { ?>
                        <tr>
                            <th scope="row"><?php echo $data[0]; ?></th>
                            <td><center><?php echo $data[1]; ?></center></td>
                        </tr>
                    <?php } ?>				    				                  
                </tbody>
            </table> 
            <!-- FIN TABLA DEL INDICADOR -->
        </div>
        <div class="col-lg-2">
        </div>
    </div>						
</div>

@endsection
