<?php

class User_model extends CI_Model {

  public $sitename;
  public $copyright;

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
        $this->sitename='Task Management System';
        $this->copyright='<p> &copy; '.date('Y').'  |  All Rights Reserved  </p>';
        set_time_limit(0);
    }

  /**
      * This function is used authenticate user at login
      */
  public  function auth_admin() {
        $unm = strip_tags(trim($this->input->post('username')));
        $pwd = strip_tags(trim($this->input->post('password')));
        $query = $this->db->query("SELECT * FROM admin where aunm ='$unm' And apwd = '$pwd' And status = 'Active'");
        $result = $query->result();
          if($query->num_rows()){
          $result = $query->result();
          foreach ($result as $row);
            return @$row;
          }else
          return false;
    }

    /** 
        * This function is used authenticate user at login
        */
    public  function auth_user() {
          $unm = strip_tags(trim($this->input->post('username')));
          $pwd = strip_tags(trim($this->input->post('password')));
          $query = $this->db->query("SELECT * FROM employees where email ='$unm' And password = '$pwd' And acc_status = 'Active';");
          if($query->num_rows()){
          $result = $query->result();
          foreach ($result as $row);
            return @$row;
          }else
          return false;
      }


//==============================
// *****************************      

    public  function get_user($id) {
          $query = $this->db->query("SELECT * FROM oh_users where u_id ='$id' limit 1;");
          $result = $query->result();
          foreach ($result as $row);
            return $row;
      }
// **********************

    public function check_exists($table='', $colom='',$colomValue=''){
        $this->db->where($colom, $colomValue);
        $res = $this->db->get($table)->row();

            return $res;
    }

// ************************

    public function getData($tableName=""){
    $query = $this->db->query("SELECT * FROM $tableName order by 1 desc;");

     return $query->result();

   }

// ************************

    public function getDataByid($tableName='', $colume='', $columnValue='')
    {
        $this->db->select('*');
        $this->db->from($tableName);
         $this->db->where($colume , $columnValue);
        $query =  $this->db->get();
        return $result = $query->row();
    }




    public function run_query($str_query="") {
      $query = $this->db->query($str_query);
    return $query;

    }


        public function run_query_res1($str_query="") {
          $query = $this->db->query($str_query);
      if($query->num_rows()) {
        foreach ($query->result() as $row);
        return $row;
      }
      return NULL;
        }


      function getValue($name, $tablenm, $field='', $value='') {
          $this->db->select($name);
          $this->db->from($tablenm);
          if( $field != '')
          $this->db->where($field, $value);
        $ans= @$this->db->get()->row()->$name;
        return $ans;
        }



        function getValueQry($qry) {
          $query = $this->db->query($qry);
                if($res=$query->result()) {
                foreach($res as $k);
                return $k->val;
              } else return 0;
          }


          /**
            * This function is used to select data form table
            */
          public function getDataRows($tableName='', $colum='', $value='', $resfield='*') {
              if((!empty($value)) && (!empty($colum))) {
                  $this->db->where($colum, $value);
              }

              $this->db->select($resfield);
              $this->db->from($tableName);
              $query = $this->db->get();
              return $query;
          }


    /**
      * This function is used to Update record in table
      */
    public function updateRow($table, $col, $colVal, $data) {
        $this->db->where($col,$colVal);
        $this->db->update($table,$data);

        return true;
    }

    /**
      * This function is used to Insert record in table
      */
    public function insertRow($table, $data){
        $this->db->insert($table, $data);

        return  $this->db->insert_id();
    }


        /**
     * This function is used to delete user
     * @param: $id - id of user table
     */
    public function delete_id($tableName='', $columnName='', $id='') {
        $this->db->where($columnName, $id);
        $this->db->delete($tableName);
    }



    public function send_email_msg($fromemail='', $toemail='', $Subject='', $emailmsg='') {

    $this->load->library('email');
    $config['charset'] = 'iso-8859-1';
    $config['wordwrap'] = TRUE;
    $config['mailtype'] = 'html';
    $this->email->initialize($config);
    $this->email->from($fromemail, 'Task-Management');
    $this->email->to($toemail);
    $this->email->subject($Subject);
    $this->email->message($emailmsg);
    return $this->email->send();

/*
// load email library
$this->load->library('email');

// prepare email
$this->email
    ->from('info@example.com', 'Example Inc.')
    ->to('to@example.com')
    ->subject('Hello from Example Inc.')
    ->message($this->load->view('email_template', $data, true))
    ->set_mailtype('html');

// send email
$this->email->send();

*/
}


// *******************************


  function img_resize($fileName, $tempfile, $dirName) {

$file_name = $tempfile; //_FILES['pic']['tmp_name'];
$target_filename = $file_name;

list($width, $height, $type, $attr) = getimagesize( $file_name );
    $ratio = $width/$height;

$maxDim = 180; // for bigimg

    if( $ratio > 1) {
        $new_width = $maxDim;
        $new_height = $maxDim+10; ///$ratio;
    } else {
        $new_width = $maxDim-10; //*$ratio;
        $new_height = $maxDim;
    }
    
    $src = imagecreatefromstring( file_get_contents( $file_name ) );
    $dst = imagecreatetruecolor( $new_width, $new_height );
    imagealphablending($dst, false);
    imagesavealpha($dst, true);

   if( imagecopyresampled( $dst, $src, 0, 0, 0, 0, $new_width, $new_height, $width, $height )) {
    imagejpeg( $dst, $target_filename ); // adjust format as needed
    imagedestroy( $src );
    imagedestroy( $dst );
  
        if(move_uploaded_file($target_filename, $dirName.$fileName)) {
              return true;
        }else
          return false;

  }
    return false;

}


//###################################



}
