<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
  
    public function __construct() {
        parent::__construct();
    }

//=========================================

     public function index() {

       $this->load->view('user/index');
    }

//======******************************=====
  
    public function dashboard() {
     $uid = $this->is_login();

    $data['ttasks'] = $this->user_model->getValueQry("SELECT count(*) as val FROM `tasks` WHERE emp_id = '$uid';");
    $data['tpend'] = $this->user_model->getValueQry("SELECT count(*) as val FROM `tasks` WHERE emp_id = '$uid' and status = 'Pending';");
    $data['tcomp'] = $this->user_model->getValueQry("SELECT count(*) as val FROM `tasks` WHERE emp_id = '$uid' and status = 'Completed';");
    $data['tdworks'] = $this->user_model->getValueQry("SELECT count(*) as val FROM `daily_reports` WHERE emp_id = '$uid';");

   $this->load->view('user/dashboard', $data);
  }

//***********************************************

        public function daily_reports() {
         $id = $this->is_login();
            $sql="SELECT *from daily_reports where emp_id = '$id' order by report_date desc;";
         $response=$this->user_model->run_query($sql);
         $data['res']=$response;
         $this->load->view('user/daily_reports', $data);
    }

// --------------------------------------

        public function post_daily_report() {
         $id = $this->is_login();

         $this->load->view('user/post_daily_report');
    }

// --------------------------------------

        public function post_daily_report_sub() {
         $id = $this->is_login();

         if(!empty($_POST)) {
          $data['emp_id'] = $id;
         $data['report_date']=strip_tags(trim($this->input->post('report_date')));
         $data['description']=strip_tags(trim($this->input->post('description')));

           $this->user_model->insertRow('daily_reports', $data);

           $this->session->set_flashdata('messagePr', '<div class="notification success closeable"><p><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> Success!</span> Daily Report Created Successfully..!</p><a class="close" href="#"></a></div>' );
         redirect('user/daily_reports','refresh'); exit;

         } else {
           $this->session->set_flashdata('messagePr', '<div class="notification error closeable"><p><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Failed!</span> Please Try Again..!</p><a class="close" href="#"></a></div>' );

         redirect('user/post_daily_report','refresh');
        }
    }

// ----------------------------------------------

        public function del_daily_report($id='') {
         $this->is_login();

         $this->user_model->delete_id('daily_reports', 'md5(id)', $id);

           $this->session->set_flashdata('messagePr', '<div class="notification success closeable"><p><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> Success!</span>  Report Delated Successfully..!</p><a class="close" href="#"></a></div>' );
         redirect('user/daily_reports','refresh'); exit;
    }

//***********************************************

        public function tasks($sts='') {
         $id=$this->is_login();
         $subq=''; 
         $data['tstatus']= $sts;
         if($sts!='')
            $subq.=" and status = '$sts' ";
            $sql="SELECT *from tasks where emp_id = '$id' $subq ;";
         $response=$this->user_model->run_query($sql);
         $data['res']=$response;
         $this->load->view('user/tasks', $data);
    }

// ----------------------------------------------

        public function task_updates($id='') {
         $this->is_login();

         $data['res'] = $this->user_model->getDataByid('tasks', 'md5(id)', $id);

         $this->load->view('user/task_updates',$data);
    }

    // ------------------------------------------

        public function edit_task_sub($id='') {
          $this->is_login();
         if(!empty($_POST)) {

         $data['emp_remarks']=strip_tags(trim($this->input->post('emp_remarks')));
         $data['status']=strip_tags(trim($this->input->post('status')));

           $this->user_model->updateRow('tasks', 'md5(id)', $id, $data);

           $this->session->set_flashdata('messagePr', '<div class="notification success closeable"><p><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> Success!</span>  Task Details Updated Successfully..!</p><a class="close" href="#"></a></div>' );
         redirect('user/tasks','refresh'); exit;

         } else {
           $this->session->set_flashdata('messagePr', '<div class="notification error closeable"><p><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Failed!</span> Please Try Again..!</p><a class="close" href="#"></a></div>' );

         redirect('user/tasks','refresh');
        }
    }

//***********************************************

        public function edit_profile() {
         $id= $this->is_login();
         $sql="SELECT * FROM `employees` WHERE emp_id = '$id';";
         $response=$this->user_model->run_query($sql);
         foreach ($response->result() as $data['res']);

         $this->load->view('user/edit_profile',$data);
    }

    // ---------------------------------------------

        public function edit_profile_sub() {
        $id = $this->is_login();
         if(!empty($_POST)) {

         $data['full_name']=strip_tags(strtoupper(trim($this->input->post('full_name'))));
         $data['designation']=strip_tags(trim($this->input->post('designation')));
         $data['email']=strip_tags(trim($this->input->post('email')));
         $data['phno']=strip_tags(trim($this->input->post('phno')));
         $data['doj']=strip_tags(trim($this->input->post('doj')));
         $data['password']=strip_tags(trim($this->input->post('password')));


           $this->user_model->updateRow('employees', 'emp_id', $id, $data);

           $this->session->set_flashdata('messagePr', '<div class="notification success closeable"><p><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> Success!</span> Your Profile Updated Successfully..!</p><a class="close" href="#"></a></div>' );
         redirect('user/dashboard','refresh'); exit;

         } else {
           $this->session->set_flashdata('messagePr', '<div class="notification error closeable"><p><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Failed!</span> Please Try Again..!</p><a class="close" href="#"></a></div>' );

         redirect('user/edit_profile','refresh');
       }
    }


// ******************************************

public function login() {

    $this->session->unset_userdata('user_data');
    $data='';
  $this->load->view('user/',$data);
}

// ******************************************

   public function login_auth(){
       $return = $this->user_model->auth_user();

       if(!empty($return)) {

             $this->session->set_userdata('user_data',$return);

               $sts = $return->acc_status;
               if($sts === 'Active') {
               redirect(base_url().'user/dashboard', 'refresh');
             } else {
               $this->session->set_flashdata("messagePr", '<div class="notification error closeable"><p><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Your Account Is '.$sts.' !<br/>Pleace contact administration</p><a class="close" href="#"></a></div>');
               redirect( base_url().'user/', 'refresh' );
             }
           } else {
           $this->session->set_flashdata("messagePr", '<div class="notification error closeable"><p><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Invalid Login Credentials..!</p><a class="close" href="#"></a></div>');

         redirect( base_url().'user/', 'refresh' );
          }
   }

// *******************************************

     public function is_login(){
            if(!empty($this->session->user_data->emp_id)){

          $uid = $this->session->user_data->emp_id;
          return $uid;
              
            } else {
               redirect( base_url().'user', 'refresh');
            }
  }

  // ===========================================================

    /**
     * This function is used to logout user
     */
   public function logout(){

       $this->session->unset_userdata('user_data');
      redirect( base_url().'user', 'refresh');
   }



//##################################################
//################ END class ###############################    

}

?>