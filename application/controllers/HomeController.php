<?php


class HomeController extends CI_Controller {


   /**
    * Manage __construct
    *
    * @return Response
   */
   public function __construct() { 
      parent::__construct();
      $this->load->database();
   }


   /**
    * Manage index
    *
    * @return Response
   */
   public function index() {
      $states = $this->db->get("cigeneratorv2")->result();
      $this->load->view('admin/prestadores/add', array('departamento' => $states )); 
   } 


   /**
    * Manage uploadImage
    *
    * @return Response
   */
   public function myformAjax($id) { 
       $result = $this->db->where("departamento_id",$id)->get("municipios_colombia")->result();
       echo json_encode($result);
   }


} 


?>