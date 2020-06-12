<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
  
    public function __construct() {
        parent::__construct();
    }

//=========================================

     public function index() {

       $this->load->view('admin/index');
    }

//======******************************=====
  
    public function dashboard() {
     $uid = $this->is_login();

    $data['temps'] = $this->user_model->getValueQry("SELECT count(*) as val FROM `employees`;");
    $data['ttasks'] = $this->user_model->getValueQry("SELECT count(*) as val FROM `tasks`;");
    $data['tdworks'] = $this->user_model->getValueQry("SELECT count(*) as val FROM `daily_reports`;");

    $data['tpend']=@$this->user_model->getValue('count(*)', 'tasks', 'status', 'Pending');
    $data['tcomp']=@$this->user_model->getValue('count(*)', 'tasks', 'status', 'Completed');

   $this->load->view('admin/dashboard', $data);
  }


//***********************************************

        public function employees() {
         $id = $this->is_login();

         $response=$this->user_model->getData('employees');
         $data['res']=$response;
         $this->load->view('admin/employees', $data);
    }

    // ---------------------------------------------

        public function new_employee() {
         $id = $this->is_login();

         $this->load->view('admin/new_employee');
    }

    // ------------------------------------------

        public function new_employee_sub() {
         $id = $this->is_login();
         if(!empty($_POST)) {

         $data['full_name']=strip_tags(strtoupper(trim($this->input->post('full_name'))));
         $data['designation']=strip_tags(trim($this->input->post('designation')));
         $data['email']=strip_tags(trim($this->input->post('email')));
         $data['phno']=strip_tags(trim($this->input->post('phno')));
         $data['password']=strip_tags(ucwords(trim($this->input->post('password'))));
         $data['doj']=strip_tags(ucwords(trim($this->input->post('doj'))));

           $this->user_model->insertRow('employees', $data);

           $this->session->set_flashdata('messagePr', '<div class="notification success closeable"><p><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> Success!</span> New Employee Created Successfully..!</p><a class="close" href="#"></a></div>' );
         redirect('admin/employees','refresh'); exit;

         } else {
           $this->session->set_flashdata('messagePr', '<div class="notification error closeable"><p><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Failed!</span> Please Try Again..!</p><a class="close" href="#"></a></div>' );

         redirect('admin/new_employee','refresh');
        }
    }

// ----------------------------------------------

        public function edit_employee($id='') {
         $this->is_login();

         $data['res'] = $this->user_model->getDataByid('employees', 'md5(emp_id)', $id);

         $this->load->view('admin/edit_employee',$data);
    }

    // ------------------------------------------

        public function edit_employee_sub($id='') {
          $this->is_login();
         if(!empty($_POST)) {

         $data['full_name']=strip_tags(strtoupper(trim($this->input->post('full_name'))));
         $data['designation']=strip_tags(trim($this->input->post('designation')));
         $data['email']=strip_tags(trim($this->input->post('email')));
         $data['phno']=strip_tags(trim($this->input->post('phno')));
         $data['password']=strip_tags(ucwords(trim($this->input->post('password'))));
         $data['doj']=strip_tags(ucwords(trim($this->input->post('doj'))));

           $this->user_model->updateRow('employees', 'md5(emp_id)', $id, $data);

           $this->session->set_flashdata('messagePr', '<div class="notification success closeable"><p><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> Success!</span> New Employee Updated Successfully..!</p><a class="close" href="#"></a></div>' );
         redirect('admin/employees','refresh'); exit;

         } else {
           $this->session->set_flashdata('messagePr', '<div class="notification error closeable"><p><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Failed!</span> Please Try Again..!</p><a class="close" href="#"></a></div>' );

         redirect('admin/new_employee','refresh');
        }
    }

// ----------------------------------------------

        public function del_employee($id='') {
         $this->is_login();

         $this->user_model->delete_id('employees', 'md5(emp_id)', $id);
         $this->user_model->delete_id('tasks', 'md5(emp_id)', $id);
         $this->user_model->delete_id('daily_reports', 'md5(emp_id)', $id);

           $this->session->set_flashdata('messagePr', '<div class="notification success closeable"><p><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> Success!</span>  Employee Delated Successfully..!</p><a class="close" href="#"></a></div>' );
         redirect('admin/employees','refresh'); exit;
    }

//***********************************************

        public function daily_reports() {
         $this->is_login();
            $sql="SELECT *from daily_reports order by report_date desc;";
         $response=$this->user_model->run_query($sql);
         $data['res']=$response;
         $this->load->view('admin/daily_reports', $data);
    }

// ----------------------------------------------

        public function del_daily_report($id='') {
         $this->is_login();

         $this->user_model->delete_id('daily_reports', 'md5(id)', $id);

           $this->session->set_flashdata('messagePr', '<div class="notification success closeable"><p><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> Success!</span>  Report Delated Successfully..!</p><a class="close" href="#"></a></div>' );
         redirect('admin/daily_reports','refresh'); exit;
    }

//***********************************************

        public function tasks($sts='') {
         $this->is_login();
         $subq=''; 
         $data['tstatus']= $sts;
         if($sts!='')
            $subq.=" where status = '$sts' ";
            $sql="SELECT *from tasks $subq ;";
         $response=$this->user_model->run_query($sql);
         $data['res']=$response;
         $this->load->view('admin/tasks', $data);
    }

    // ---------------------------------------------

        public function new_task() {
         $id = $this->is_login();

         $response=$this->user_model->getData('employees');
         $data['emp']=$response;

         $this->load->view('admin/new_task', $data);
    }

    // ------------------------------------------

        public function new_task_sub() {
         $id = $this->is_login();
         if(!empty($_POST)) {

         $data['emp_id']=strip_tags(trim($this->input->post('emp_id')));
         $data['title']=strip_tags(trim($this->input->post('title')));
         $data['description']=strip_tags(trim($this->input->post('description')));

           $this->user_model->insertRow('tasks', $data);

           $this->session->set_flashdata('messagePr', '<div class="notification success closeable"><p><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> Success!</span> New Task Created Successfully..!</p><a class="close" href="#"></a></div>' );
         redirect('admin/tasks','refresh'); exit;

         } else {
           $this->session->set_flashdata('messagePr', '<div class="notification error closeable"><p><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Failed!</span> Please Try Again..!</p><a class="close" href="#"></a></div>' );

         redirect('admin/new_task','refresh');
        }
    }

// ----------------------------------------------

        public function edit_task($id='') {
         $this->is_login();

         $response=$this->user_model->getData('employees');
         $data['emp']=$response;

         $data['res'] = $this->user_model->getDataByid('tasks', 'md5(id)', $id);

         $this->load->view('admin/edit_task',$data);
    }

    // ------------------------------------------

        public function edit_task_sub($id='') {
          $this->is_login();
         if(!empty($_POST)) {

         $data['emp_id']=strip_tags(trim($this->input->post('emp_id')));
         $data['title']=strip_tags(trim($this->input->post('title')));
         $data['description']=strip_tags(trim($this->input->post('description')));
         $data['admin_remarks']=strip_tags(trim($this->input->post('admin_remarks')));
         $data['emp_remarks']=strip_tags(trim($this->input->post('emp_remarks')));
         $data['status']=strip_tags(trim($this->input->post('status')));

           $this->user_model->updateRow('tasks', 'md5(id)', $id, $data);

           $this->session->set_flashdata('messagePr', '<div class="notification success closeable"><p><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> Success!</span>  Task Details Updated Successfully..!</p><a class="close" href="#"></a></div>' );
         redirect('admin/tasks','refresh'); exit;

         } else {
           $this->session->set_flashdata('messagePr', '<div class="notification error closeable"><p><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Failed!</span> Please Try Again..!</p><a class="close" href="#"></a></div>' );

         redirect('admin/tasks','refresh');
        }
    }

// ----------------------------------------------

        public function del_task($id='') {
         $this->is_login();

         $this->user_model->delete_id('tasks', 'md5(id)', $id);

           $this->session->set_flashdata('messagePr', '<div class="notification success closeable"><p><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> Success!</span>  Task Delated Successfully..!</p><a class="close" href="#"></a></div>' );
         redirect('admin/tasks','refresh'); exit;
    }

//***********************************************

        public function edit_profile() {
         $id = $this->is_login();

         $sql="SELECT * FROM `admin` WHERE a_id = '$id';";
         $response=$this->user_model->run_query($sql);
         foreach ($response->result() as $data['res']);

         $this->load->view('admin/edit_profile',$data);
    }

    // ---------------------------------------------

        public function edit_profile_sub() {
         $id = $this->is_login();
         if(!empty($_POST)) {

         $data['full_name']=strip_tags(strtoupper(trim($this->input->post('full_name'))));
         $data['aunm']=strip_tags(trim($this->input->post('aunm')));
         $data['email']=strip_tags(trim($this->input->post('email')));
         $data['phno']=strip_tags(trim($this->input->post('phno')));
         $data['apwd']=strip_tags(ucwords(trim($this->input->post('apwd'))));


           $this->user_model->updateRow('admin', 'a_id', $id, $data);

           $this->session->set_flashdata('messagePr', '<div class="notification success closeable"><p><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> Success!</span> Your Profile Updated Successfully..!</p><a class="close" href="#"></a></div>' );
         redirect('admin/dashboard','refresh'); exit;

         } else {
           $this->session->set_flashdata('messagePr', '<div class="notification error closeable"><p><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Failed!</span> Please Try Again..!</p><a class="close" href="#"></a></div>' );

         redirect('admin/edit_profile','refresh');
        }
    }


// ******************************************

public function login() {

    $this->session->unset_userdata('admin_data');
    $data='';
  $this->load->view('admin/',$data);
}

// ******************************************

   public function login_auth(){
       $return = $this->user_model->auth_admin();

       if(!empty($return)) {

             $this->session->set_userdata('admin_data',$return);
               $uid = $return->a_id;
               $dt = date('Y-m-d H:i:s');
               $qry="update admin set visits = (visits+1), last_login = '$dt' WHERE a_id = '$uid';";
               $this->user_model->run_query($qry);
               redirect(base_url().'admin/dashboard', 'refresh');
             } else {
           $this->session->set_flashdata("messagePr", '<div class="notification error closeable"><p><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Invalid Login Credentials..!</p><a class="close" href="#"></a></div>');

         redirect( base_url().'admin/', 'refresh' );
        }
   }

// *******************************************

     public function is_login(){
            if(!empty($this->session->admin_data->a_id)){

          $uid = $this->session->admin_data->a_id;
          return $uid;
              
            } else {
               redirect( base_url().'admin', 'refresh');
            }
  }

  // ===========================================================

    /**
     * This function is used to logout user
     */
   public function logout(){

       $this->session->unset_userdata('admin_data');
      redirect( base_url().'admin', 'refresh');
   }



//##################################################
//################ END class ###############################    

}

?>