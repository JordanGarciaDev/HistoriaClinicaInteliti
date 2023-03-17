<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



// ESTE ES EL MODELO QUE UTILIZO PARA LOS DROPDOWN EL OTRO ESTA MALO 


class Dropdown extends CI_Model{
    function __construct() {
        $this->countryTbl = 'tipos_de_prestador';
        $this->stateTbl = 'prestadores';
        //$this->docTbl = 'tipo_de_documento';
        $this->cityTbl = '    relacion_tipodeprestador_tipodedocumento';
        $this->municipios = 'municipios_colombia';
    }
    
    /*
     * Get country rows from the countries table
     */
    function getCountryRows($params = array()){
        $this->db->select('c.id, c.nombre_tipo_prestador');
        $this->db->from($this->countryTbl.' as c');
        
        //fetch data by conditions
        if(array_key_exists("conditions",$params)){
            foreach ($params['conditions'] as $key => $value) {
                if(strpos($key,'.') !== false){
                    $this->db->where($key,$value);
                }else{
                    $this->db->where('c.'.$key,$value);
                }
            }
        }
        //$this->db->where('c.status','1');
        
        $query = $this->db->get();
        $result = ($query->num_rows() > 0)?$query->result_array():FALSE;

        //return fetched data
        return $result;
    }
    
    /*
     * Get state rows from the countries table
     */
    function getStateRows($params = array()){
        $this->db->select('s.id, s.nombre_prestador, s.documento_iberosam');
        $this->db->from($this->stateTbl.' as s');
        
        //fetch data by conditions
        if(array_key_exists("conditions",$params)){
            foreach ($params['conditions'] as $key => $value) {
                if(strpos($key,'.') !== false){
                    $this->db->where($key,$value);
                }else{
                    $this->db->where('s.'.$key,$value);
                }
            }
        }
        
        $query = $this->db->get();
        $result = ($query->num_rows() > 0)?$query->result_array():FALSE;

        //return fetched data
        return $result;
    }
    
    /*
     * Get city rows from the countries table
     */
    function getCityRows($params = array()){
        $this->db->select('c.id_tipo_de_prestador, c.id_tipo_de_documento, c.nombre_tipo_de_documento');
        //$this->db->select('d.nombre_tipos_de_documento');
        $this->db->from($this->cityTbl.' as c');
        //$this->db->from($this->docTbl.' as d');
        
        //fetch data by conditions
        if(array_key_exists("conditions",$params)){
            foreach ($params['conditions'] as $key => $value) {
                if(strpos($key,'.') !== false){
                    $this->db->where($key,$value);
                }else{
                    $this->db->where('c.'.$key,$value);
                }
            }
        }
        
        $query = $this->db->get();
        $result = ($query->num_rows() > 0)?$query->result_array():FALSE;

        //return fetched data
        return $result;
    }

    /*
     * Get city rows from the countries table
     */
    function getCiudadRows($params = array()){
        $this->db->select('c.id, c.nombre');
        //$this->db->select('d.nombre_tipos_de_documento');
        $this->db->from($this->municipios.' as c');
        //$this->db->from($this->docTbl.' as d');
        
        //fetch data by conditions
        if(array_key_exists("conditions",$params)){
            foreach ($params['conditions'] as $key => $value) {
                if(strpos($key,'.') !== false){
                    $this->db->where($key,$value);
                }else{
                    $this->db->where('c.'.$key,$value);
                }
            }
        }
        
        $query = $this->db->get();
        $result = ($query->num_rows() > 0)?$query->result_array():FALSE;

        //return fetched data
        return $result;
    }
}