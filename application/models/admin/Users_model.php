<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class Users_model extends CI_Model

{

    public $v_fields=array('password', 'email', 'first_name', 'last_name', 'company', 'phone');



	function __construct()

	{

		parent::__construct();

	}



	function getList($table, $pagination=array()) {



        //  PAGINATION START

        if((isset($pagination['cur_page'])) and !empty($pagination['per_page']))

        {

          $this->db->limit($pagination['per_page'],$pagination['cur_page']);

        }

        //  PAGINATION END



        // sort

          $order_by = isset($_GET['sortBy']) && in_array($_GET['sortBy'], $this->v_fields)?$_GET['sortBy']:'';

          $order = isset($_GET['order']) && $_GET['order']=='asc'?'asc':'desc';

          if($order_by!=''){

            $this->db->order_by($order_by, $order);

          }



        // end sort



        // SEARCH START

        if (!empty($_GET['searchValue']) && $_GET['searchValue']!="" && !empty($_GET['searchBy']) && $_GET['searchBy']!="" && in_array($_GET['searchBy'],$this->v_fields) ) {

            $this->db->like($_GET['searchBy'],$_GET['searchValue']);

        }

        // SEARCH END



        $this->db->select("$table.* ");

        $this->db->from($table);

            

        $this->db->order_by("id","desc");

        $query = $this->db->get();

        return $result = $query->result();

    }


    function getListTable($table) {

        $this->db->select("*");

        $this->db->from($table);

        $query = $this->db->get();

        return $result = $query->result();

    }


    function getRow($table, $id) {

        $this->db->select('*');

        $query = $this->db->get_where($table, array('id' => $id));

        $data = $query->result();

        return $data[0];

    }


    function getSelectedData($table, $field, $idArr) {

        $this->db->select('*');

        $this->db->from($table);

        $this->db->where_in('id', $idArr);

        $query = $this->db->get();

        $data = $query->result();

        foreach ($data as $key => $value) {

            $arr[] = $value->$field;

        }

        return $arr;

    }


    function getCount($table, $key='', $value='') {

            $this->db->select("$table.*");

            if(isset($key) && isset($value) && !empty($key) && !empty($value))

            {

                $this->db->where($key,$value);

            }

            $this->db->from($table);

            

            $query = $this->db->get();

            return $query->num_rows();

    }


    function insert($table, $data){

        $this->db->insert($table, $data);

        return $this->db->insert_id();

    }


    function multiSelectInsert($r_table, $field1, $value1, $field2, $value2=array())

    {

      $this->db->query("delete from $r_table where $field1='$value1'");

      if ($r_table!="" && $field1!="" && $value1!="" && $field2!="" && count($value2)>0) {

        for ($i=0; $i < count($value2); $i++) {

          $data[] = array(

            $field1 => $value1,

            $field2 => $value2[$i],

          );

        }

        $this->db->insert_batch($r_table, $data);        

      }

    }


    function getSelectedIds($table, $id, $select_field, $where_field)

    {

        $arr=array();

        $this->db->select("$select_field");

        $this->db->from($table);

        $this->db->where("$where_field",$id);

        $query = $this->db->get();

        $data = $query->result();

        foreach ($data as $key => $value) {

            $arr[] = $value->$select_field;

        }

        return $arr;

    }


    function updateData($table, $data, $id)

    {

        $this->db->where("id",$id);

        $this->db->update($table,$data);

    }


    function delete($table, $key='', $value='')

    {

        if(isset($key) && isset($value) && !empty($key) && !empty($value))

        {

            $this->db->where($key,$value);

        }

        $this->db->delete($table);

    }

    public function hash_password($password, $salt=false, $use_sha1_override=FALSE)
    {
        if (empty($password))
        {
            return FALSE;
        }

        // bcrypt
        if ($use_sha1_override === FALSE && $this->hash_method == 'bcrypt')
        {
            return $this->bcrypt->hash($password);
        }


        if ($this->store_salt && $salt)
        {
            return  sha1($password . $salt);
        }
        else
        {
            $salt = $this->salt();
            return  $salt . substr(sha1($salt . $password), 0, -$this->salt_length);
        }
    }

    /**
     * This function takes a password and validates it
     * against an entry in the users table.
     *
     * @return void
     * @author Mathew
     **/
    public function hash_password_db($id, $password, $use_sha1_override=FALSE)
    {
        if (empty($id) || empty($password))
        {
            return FALSE;
        }

        $this->trigger_events('extra_where');

        $query = $this->db->select('password, salt')
            ->where('id', $id)
            ->limit(1)
            ->order_by('id', 'desc')
            ->get($this->tables['users']);

        $hash_password_db = $query->row();

        if ($query->num_rows() !== 1)
        {
            return FALSE;
        }

        // bcrypt
        if ($use_sha1_override === FALSE && $this->hash_method == 'bcrypt')
        {
            if ($this->bcrypt->verify($password,$hash_password_db->password))
            {
                return TRUE;
            }

            return FALSE;
        }

        // sha1
        if ($this->store_salt)
        {
            $db_password = sha1($password . $hash_password_db->salt);
        }
        else
        {
            $salt = substr($hash_password_db->password, 0, $this->salt_length);

            $db_password =  $salt . substr(sha1($salt . $password), 0, -$this->salt_length);
        }

        if($db_password == $hash_password_db->password)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    /**
     * Generates a random salt value for forgotten passwords or any other keys. Uses SHA1.
     *
     * @return void
     * @author Mathew
     **/
    public function hash_code($password)
    {
        return $this->hash_password($password, FALSE, TRUE);
    }

    /**
     * Generates a random salt value.
     *
     * Salt generation code taken from https://github.com/ircmaxell/password_compat/blob/master/lib/password.php
     *
     * @return void
     * @author Anthony Ferrera
     **/
    public function salt()
    {

        $raw_salt_len = 16;

        $buffer = '';
        $buffer_valid = false;

        if (function_exists('random_bytes')) {
            $buffer = random_bytes($raw_salt_len);
            if ($buffer) {
                $buffer_valid = true;
            }
        }

        if (!$buffer_valid && function_exists('mcrypt_create_iv') && !defined('PHALANGER')) {
            $buffer = mcrypt_create_iv($raw_salt_len, MCRYPT_DEV_URANDOM);
            if ($buffer) {
                $buffer_valid = true;
            }
        }

        if (!$buffer_valid && function_exists('openssl_random_pseudo_bytes')) {
            $buffer = openssl_random_pseudo_bytes($raw_salt_len);
            if ($buffer) {
                $buffer_valid = true;
            }
        }

        if (!$buffer_valid && @is_readable('/dev/urandom')) {
            $f = fopen('/dev/urandom', 'r');
            $read = strlen($buffer);
            while ($read < $raw_salt_len) {
                $buffer .= fread($f, $raw_salt_len - $read);
                $read = strlen($buffer);
            }
            fclose($f);
            if ($read >= $raw_salt_len) {
                $buffer_valid = true;
            }
        }

        if (!$buffer_valid || strlen($buffer) < $raw_salt_len) {
            $bl = strlen($buffer);
            for ($i = 0; $i < $raw_salt_len; $i++) {
                if ($i < $bl) {
                    $buffer[$i] = $buffer[$i] ^ chr(mt_rand(0, 255));
                } else {
                    $buffer .= chr(mt_rand(0, 255));
                }
            }
        }

        $salt = $buffer;

        // encode string with the Base64 variant used by crypt
        $base64_digits   = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/';
        $bcrypt64_digits = './ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $base64_string   = base64_encode($salt);
        $salt = strtr(rtrim($base64_string, '='), $base64_digits, $bcrypt64_digits);

        $salt = substr($salt, 0, $this->salt_length);


        return $salt;

    }

    /**
     * Activation functions
     *
     * Activate : Validates and removes activation code.
     * Deactivate : Updates a users row with an activation code.
     *
     * @author Mathew
     */



public function uploadData(&$data, $file_name, $file_path, $postfix='', $allowedTypes)

{

   $config = NULL;

   $config['upload_path'] = $this->config->item($file_path);  

   $config['allowed_types'] = $allowedTypes;

   if (isset($_FILES[$file_name]['name']) && !empty($_FILES[$file_name]['name']))

   {

    $this->load->library('upload', $config);

    $this->upload->initialize($config);

    $exts = explode(".",$_FILES[$file_name]['name']);

    $_FILES[$file_name]['name'] = $exts[0].$postfix.".".end($exts);

    if ( ! $this->upload->do_upload($file_name))

    {

     $data[$file_name.'_err'] = array('error' => $this->upload->display_errors());

    }

    else

    {

     $uploadImg = $this->upload->data();

     if($uploadImg['file_name'] != '')

    {

     if (isset($_POST['old_'.$file_name]) && !empty($_POST['old_'.$file_name]))

     {

      @unlink($this->config->item($file_path).$_POST['old_'.$file_name]);

     }

     $data[$file_name] = $uploadImg['file_name'];

    }

   } 

  }

  elseif (isset($_POST['old_'.$file_name]) && !empty($_POST['old_'.$file_name]))

  {

   $data[$file_name] = $_POST['old_'.$file_name];

  }   

}



}



