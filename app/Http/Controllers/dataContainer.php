<?php

namespace Maternidad\Http\Controllers;
use Maternidad\Servicio;
use Maternidad\Grupo;

/**
* 
*/
class dataContainer
{


    private $page_name="change name of this page, visit dataContainer";//nombre de la pagina
    private $siderbar_type = "";//Tipo de siderbar que se requere desplegar
    private $method = "method not defined, visit dataContainer";//Metodo que se esta ejecutando
    private $url_post = "url_post not define, visit dataContainer";//url post al que apunta el formulario de rangos de fecha
    private $report_name = "report_name not define, visit dataContainer";
    private $chart = false;
    private $chart_model = "execute.time.1";
    private $chart_model2= "execute.time.2";
    private $chart_title = "Disponibilidad";
    private $data_chart = null;
    private $data_table = array(); //datos de una tabla

    //Filter
    //
    private $patrimonial_code = false;
    private $serial_number = false;
    private $model = false;
    private $group = false;
    private $groups = null;
    private $service = false;
    private $services = null;
    private $date = true;
    private $departament = false;

    private $table = true;

    //Chart Name
    private $chart_name = "Gráfico de reporte";

	public function __get($property) {
	    if (property_exists($this, $property)) {
	  		return $this->$property;
	    }
	}

	public function __set($property, $value) {
		if (property_exists($this, $property)) {
			$this->$property = $value;
		}

		return $this;
	}

    public function __construct(){
        $this->groups = Grupo::all();
        $this->services = Servicio::all();
    }
}
	
?>