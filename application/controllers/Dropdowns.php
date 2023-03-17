<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Controlador utilizado en los dropdown


class Dropdowns extends CI_Controller {
    
    function __construct() {
        parent::__construct();

        $this->load->library('pagination');

        $this->load->helper('url');

        $this->load->library('ion_auth');

        $this->load->library('form_validation');
        
        $this->load->model('dropdown');
    }
    
    /*public function index(){
        $data['countries'] = $this->dropdown->getCountryRows();
        $this->load->view('admin/documentos/add', $data);
    }*/
    
    public function getStates(){
        $states = array();
        $tipo_de_prestador = $this->input->post('tipo_de_prestador');
        if($tipo_de_prestador){
            $con['conditions'] = array('tipo_de_prestador'=>$tipo_de_prestador);
            $states = $this->dropdown->getStateRows($con);
        }
        echo json_encode($states);
    }
    
    public function getCities(){
        $cities = array();
        $id_tipo_de_prestador = $this->input->post('id_tipo_de_prestador');
        if($id_tipo_de_prestador){
            $con['conditions'] = array('id_tipo_de_prestador'=>$id_tipo_de_prestador);
            $cities = $this->dropdown->getCityRows($con);
        }
        echo json_encode($cities);
    }
    
    public function getCiudad(){
        $cities2 = array();
        $departamento_id = $this->input->post('departamento_id');
        if($departamento_id){
            $con['conditions'] = array('departamento_id'=>$departamento_id);
            $cities2 = $this->dropdown->getCiudadRows($con);
        }
        echo json_encode($cities2);
    }


}
