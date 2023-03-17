<?php

class Dropdowns extends CI_Controller {

   public function __construct() { 
      parent::__construct();
      $this->load->database();
   }

   public function index() {
      $countries = $this->db->get("countries")->result();
      $this->load->view('admin/documentos/add', array('countries' => $countries )); 
   } 

   public function getStateList($id) { 
       $states = $this->db->where("country_id",$id)->get("states")->result();
       echo json_encode($states);
   }


} 


?>