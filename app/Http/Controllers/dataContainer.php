<?php

namespace Maternidad\Http\Controllers;

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
    private $chart_title = "Disponibilidad";
    private $data_chart = null;

    //Filter
    //
    private $patrimonial_code = false;
    private $serial_number = false;
    private $model = false;
    private $group = false;
    private $service = false;
    private $date = true;
    private $departament = true;

    private $table = true;

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
}
	
?>