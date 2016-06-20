@extends('templates.indicatorsTemplate')
@section('content')

<div class="row">		
    <div class="col-lg-12">
        <h3 class="page-header">{!!$dataContainer->page_name!!}</h3>            
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
                        <th>Número de reporte</th>

                        <th>Tipo</th>
                        <th>Número de Sesiones</th>
                        <th>Duración</th>
                        <th>Número de Participantes</th>
                        <th>Categoría</th>
                        <th>Equipos</th>
                        



                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data_table as $data) { ?>
                        <tr>
                            <th scope="row"><?php echo $data[1]; ?></th>
                            <td><?php echo $data[2]; ?></td>
                            <td><?php echo $data[3]; ?></td>
                            <td><?php echo $data[4]; ?></td>
                            <td><?php echo $data[5]; ?></td>
                            <td><?php echo $data[6]; ?></td>
                            <td><?php echo $data[7]; ?></td>
                            
                            

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