<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 ?>

 <!DOCTYPE html>
 <head>
 <!-- Basic Page Needs === ===================== -->
 <title><?=$this->user_model->sitename?> :: User Dashboard</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<?php $this->load->view("user/include_headlinks.php"); ?>

 </head>

 <body>
 <!-- Header Container
 ================================================== -->
 <?php $this->load->view("user/include_header.php"); ?>
 <!-- Header Container / End -->

    <!--  main content starts -->
    <div id="dashboard" class="gradient" style="background:#555 url('<?=base_url()?>img/pbg10.jpg') repeat; background-attachment:fixed;">

    <!-- Content
    ================================================== -->
    <div class="container   margin-top-50">
    	<div class="row">

    		<!-- Sidebar
    		================================================== -->
    		<div class="col-lg-4 col-md-4">
          <div class="box3d2">
              <div class="user-profile-name">
                <h5 class="cblue"> <b><i class="fa fa-user"></i> <?=$this->session->user_data->full_name?></b></h5>
                <div class="star-rating">
                  <h6 class="">
                    <b>Employee Id: </b> <?=$this->session->user_data->emp_id?>
                    <br/>
                    <br/>
                    <b>Ph.No:</b> <?=$this->session->user_data->phno?> </h6>
                </div>
              </div>          
            </div>


          <!-- Contact -->
          <div class="boxed-widget margin-top-20 margin-bottom-30" style="border: 1px solid #e5e5e5;">


            <div class="col_head" style="margin-top:5px;">
              <h4 style="color:#fff;"><b><i class="fa fa-book"></i> Main Menu </b></h4>

              <div class="card" style="color:darkblue; text-align:left; padding:3px 8px; margin-bottom:5px; font-size: 16px; ">

            <div class="col_head" style="margin-top:5px; background-color: purple; text-align: left; color: #fff;">
<a href="<?=base_url()?>user/tasks" class="facebook-profile" style=" color: #fff;"> &nbsp; &nbsp; <i class="fa fa-list"></i> &nbsp; My Tasks </a>
</div>
            <div class="col_head" style="margin-top:5px; background-color: brown; text-align: left; color: #fff;">
<a href="<?=base_url()?>user/daily_reports" class="facebook-profile" style=" color: #fff;"> &nbsp; &nbsp; <i class="fa fa-calendar"></i> &nbsp; My Daily Reports </a>
</div>
            <div class="col_head" style="margin-top:5px; background-color: blue; text-align: left; color: #fff;">
<a href="<?=base_url()?>user/post_day_report" class="facebook-profile" style=" color: #fff;"> &nbsp; &nbsp; <i class="fa fa-plus"></i> &nbsp; Post Day Report </a>
</div>
            <div class="col_head" style="margin-top:5px; background-color: green; text-align: left; color: #fff;">
<a href="<?=base_url()?>user/edit_profile" class="facebook-profile" style=" color: #fff;"> &nbsp; &nbsp; <i class="fa fa-file-o"></i> &nbsp; Edit Profile </a>
</div>

<div class="col_head" style="margin-top:5px; background-color: red; text-align: left; color: #fff;">
 <a href="<?=base_url()?>user/logout" class="gplus-profile"  style=" color: #fff;"> &nbsp; &nbsp; <i class="fa fa-users"></i> &nbsp; Logout</a>
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
        <div class="dashboard-stat color-2">
          <div class="dashboard-stat-content"><h4><?=$ttasks?></h4> <span>Total Daily Report's</span></div>
          <div class="dashboard-stat-icon"><i class="fa fa-calendar"></i></div>
        </div>
        <div class="col_head" style="margin-top:-32px;">
          <div class="card" style="color:#333; text-align:left; padding:0px 8px; margin-bottom:5px; font-size:13px;">
        </div>
        <small><a href="<?=base_url()?>user/daily_reports"  style="color:#fff;"><i class="fa fa-eye"></i> View Report</a></small>
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
        <small><a href="<?=base_url()?>user/tasks"  style="color:#fff;"><i class="fa fa-eye"></i> View Report</a></small>
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
        <small><a href="<?=base_url()?>user/tasks/Pending"  style="color:#fff;"><i class="fa fa-eye"></i> View Report</a></small>
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
        <small><a href="<?=base_url()?>user/tasks/Completed"  style="color:#fff;"><i class="fa fa-eye"></i> View Report</a></small>
        </div>
      </div>
      <p>&nbsp;</p>

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

<script async src="https://static.addtoany.com/menu/page.js"></script>

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
