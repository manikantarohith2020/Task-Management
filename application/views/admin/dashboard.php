<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 ?>

 <!DOCTYPE html>
 <head>
 <!-- Basic Page Needs === ===================== -->
 <title><?=$this->user_model->sitename?> :: Admin Dashboard</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<?php $this->load->view("admin/include_headlinks.php"); ?>

 </head>

 <body>
 <!-- Header Container
 ================================================== -->
 <?php $this->load->view("admin/include_header.php"); ?>
 <!-- Header Container / End -->

    <!--  main content starts -->
    <div id="dashboard" class="gradient" style="background:#555 url('<?=base_url()?>img/pbg10.jpg') repeat; background-attachment:fixed;">

    <!-- Content
    ================================================== -->
    <div class="container   margin-top-40">
    	<div class="row">

    		<!-- Sidebar
    		================================================== -->
    		<div class="col-lg-4 col-md-4">
          <div class="box3d2">
              <div class="user-profile-name">
                <h5 class="cblue"> WELCOME <b><i class="fa fa-user"></i> <?=$this->session->admin_data->full_name?></b></h5>
                <div class="star-rating">
                  <h6 class="">
                    <b>No.Of Times Visits:</b> <?=$this->session->admin_data->visits + 1?> 
                    <br/>
                    <br/><b>Last-Login: </b> <?php if($this->session->admin_data->last_login <> '0000-00-00 00:00:00') echo date('d-M-Y h:i A', strtotime($this->session->admin_data->last_login))?></h6>
                </div>
              </div>          
            </div>


    			<!-- Contact -->
    			<div class="boxed-widget margin-top-20 margin-bottom-30" style="border: 1px solid #e5e5e5;">


            <div class="col_head" style="margin-top:5px;">
              <h4 style="color:#fff;"><b><i class="fa fa-book"></i> Main Menu </b></h4>

              <div class="card" style="color:darkblue; text-align:left; padding:3px 8px; margin-bottom:5px; font-size: 16px; ">
            <div class="col_head" style="margin-top:5px; background-color: purple; text-align: left; color: #fff;">
<a href="<?=base_url()?>admin/employees" class="facebook-profile" style=" color: #fff;"> &nbsp; &nbsp; <i class="fa fa-users"></i> &nbsp; Manage Employees </a>
</div>
            <div class="col_head" style="margin-top:5px; background-color: orange; text-align: left; color: #fff;">
<a href="<?=base_url()?>admin/new_employee" class="facebook-profile" style=" color: #fff;"> &nbsp; &nbsp; <i class="fa fa-plus"></i> &nbsp; Add New Employee </a>
</div>
            <div class="col_head" style="margin-top:5px; background-color: red; text-align: left; color: #fff;">
<a href="<?=base_url()?>admin/tasks" class="facebook-profile" style=" color: #fff;"> &nbsp; &nbsp; <i class="fa fa-list"></i> &nbsp; Manage Tasks </a>
</div>
            <div class="col_head" style="margin-top:5px; background-color: blue; text-align: left; color: #fff;">
<a href="<?=base_url()?>admin/new_tasks" class="facebook-profile" style=" color: #fff;"> &nbsp; &nbsp; <i class="fa fa-plus"></i> &nbsp; Add New Task </a>
</div>
            <div class="col_head" style="margin-top:5px; background-color: brown; text-align: left; color: #fff;">
<a href="<?=base_url()?>admin/daily_reports" class="facebook-profile" style=" color: #fff;"> &nbsp; &nbsp; <i class="fa fa-calendar"></i> &nbsp; Employee Day Reports </a>
</div>
            <div class="col_head" style="margin-top:5px; background-color: green; text-align: left; color: #fff;">
<a href="<?=base_url()?>admin/edit_profile" class="facebook-profile" style=" color: #fff;"> &nbsp; &nbsp; <i class="fa fa-file-o"></i> &nbsp; Edit Profile </a>
</div>

<div class="col_head" style="margin-top:5px; background-color: grey; text-align: left; color: #fff;">
 <a href="<?=base_url()?>admin/logout" class="gplus-profile"  style=" color: #fff;"> &nbsp; &nbsp; <i class="fa fa-users"></i> &nbsp; Logout</a>
</div>

              </div>
            </div>

    			</div>
    			<!-- Contact / End-->

    		</div>
    		<!-- Sidebar / End -->


    		<!-- Content
    		================================================== -->
    		<div class="col-lg-8 col-md-8 padding-left-30">

<?=$this->session->flashdata('messagePr')?>


      <div class="row">
      <!-- Item -->
      <div class="col-md-6">
        <div class="dashboard-stat color-1">
          <div class="dashboard-stat-content"><h4><?=$temps?></h4> <span>Total Employee's</span></div>
          <div class="dashboard-stat-icon"><i class="fa fa-users"></i></div>
        </div>
        <div class="col_head" style="margin-top:-32px;">
          <div class="card" style="color:#333; text-align:left; padding:0px 8px; margin-bottom:5px; font-size:13px;">
        </div>
        <small><a href="<?=base_url()?>admin/employees"  style="color:#fff;"><i class="fa fa-eye"></i> View Report</a></small>
        </div>
      </div>
      <!-- Item -->
      <div class="col-md-6">
        <div class="dashboard-stat color-3">
          <div class="dashboard-stat-content"><h4><?=$ttasks?></h4> <span>Total Task's</span></div>
          <div class="dashboard-stat-icon"><i class="fa fa-cubes"></i></div>
        </div>
        <div class="col_head" style="margin-top:-32px;">
          <div class="card" style="color:#333; text-align:left; padding:0px 8px; margin-bottom:5px; font-size:13px;">
        </div>
        <small><a href="<?=base_url()?>admin/tasks"  style="color:#fff;"><i class="fa fa-eye"></i> View Report</a></small>
        </div>
      </div>
<p>&nbsp;</p>
    </div>
      <div class="row">

      <!-- Item -->
      <div class="col-md-6">
        <div class="dashboard-stat color-4">
          <div class="dashboard-stat-content"><h4><?=$tpend?></h4> <span>Pending Task's</span></div>
          <div class="dashboard-stat-icon"><i class="fa fa-hourglass-1"></i></div>
        </div>
        <div class="col_head" style="margin-top:-32px;">
          <div class="card" style="color:#333; text-align:left; padding:0px 8px; margin-bottom:5px; font-size:13px;">
        </div>
        <small><a href="<?=base_url()?>admin/tasks/Pending"  style="color:#fff;"><i class="fa fa-eye"></i> View Report</a></small>
        </div>
      </div>
      <!-- Item -->
      <div class="col-md-6">
        <div class="dashboard-stat color-1">
          <div class="dashboard-stat-content"><h4><?=$tcomp?></h4> <span>Completed Task's</span></div>
          <div class="dashboard-stat-icon"><i class="fa fa-check-square-o"></i></div>
        </div>
        <div class="col_head" style="margin-top:-32px;">
          <div class="card" style="color:#333; text-align:left; padding:0px 8px; margin-bottom:5px; font-size:13px;">
        </div>
        <small><a href="<?=base_url()?>admin/tasks/Completed"  style="color:#fff;"><i class="fa fa-eye"></i> View Report</a></small>
        </div>
      </div>
      <p>&nbsp;</p>

      <!-- Item -->
      <div class="col-md-6">
        <div class="dashboard-stat color-2">
          <div class="dashboard-stat-content"><h4><?=$ttasks?></h4> <span>Total Daily Report's</span></div>
          <div class="dashboard-stat-icon"><i class="fa fa-calendar"></i></div>
        </div>
        <div class="col_head" style="margin-top:-32px;">
          <div class="card" style="color:#333; text-align:left; padding:0px 8px; margin-bottom:5px; font-size:13px;">
        </div>
        <small><a href="<?=base_url()?>admin/employees"  style="color:#fff;"><i class="fa fa-eye"></i> View Report</a></small>
        </div>
      </div> 

    </div>

         <div class="clearfix">&nbsp;</div>

          <!-- row Listings Container ends -->

</div>

</div>


</div>
<!--  main content ends -->

</div>


    <!-- Copyrights -->
      <div class="row">
      <div class="copyrights" style="color:#fff;"><em><?=$this->user_model->copyright?></em></div>
      </div>

</div>


    <!-- Scripts
    ==================================================
    <script type="text/javascript" src="<?=base_url()?>scripts/jquery-2.2.0.min.js"></script>-->
    <script type="text/javascript" src="<?=base_url()?>scripts/mmenu.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>scripts/chosen.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>scripts/slick.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>scripts/rangeslider.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>scripts/magnific-popup.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>scripts/waypoints.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>scripts/counterup.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>scripts/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>scripts/tooltips.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>scripts/custom.js"></script>



 </body>

 </html>
