<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 ?>

 <!DOCTYPE html>
 <head>
 <!-- Basic Page Needs
 ================================================== -->
 <title><?=$this->user_model->sitename?> : Task Updates </title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

 <?php $this->load->view("user/include_headlinks.php"); ?>

 </head>

 <body>
 <!-- Header Container
 ================================================== -->
 <?php $this->load->view("user/include_header.php"); ?>
 <!-- Header Container / End -->
 <div id="dashboard" style="background:#f1f1f1 url('<?=base_url()?>img/pbg10.jpg') repeat;">

   <div class="container   margin-top-10">
  <!-- Content
  ================================================== -->

    <!-- Titlebar -->
    <div id="titlebar">
      <div class="col-md-10 col-md-offset-1">
          <h2><b> <i class="fa fa-edit"></i> Task Updates</b></h2>
          <!-- Breadcrumbs -->
          <nav id="breadcrumbs">
            <ul style="float: right;">
              <li><b><a href="<?=base_url()?>user/dashboard"><i class="sl sl-icon-grid"></i> Dashboard</a></b></li>
            </ul>
          </nav>
      </div>
    </div>


    <!-- body content st -->
      <div class="col-md-8 col-md-offset-2" >
        <div class="row">
          <div id="add-listing">
<br/>
    <?=$this->session->flashdata('messagePr')?>

                    <!-- Section -->
                    <div class="add-listing-section">

                      <!-- Headline -->
                      <div class="add-listing-headline">
                        <h3><i class="list-box-icon im im-icon-User"></i>Update Task Details</h3>
                      </div>

                      <!-- Row -->
                              <form method="post" action="<?=base_url()?>user/edit_task_sub/<?=md5($res->id)?>" enctype="multipart/form-data">

                      <div class="row with-forms">
                        <div class="col-md-12">
                              <h5><i class="fa fa-tag"></i> <b> Task Title: </b> <?=$res->title?></h5>
                             
                        </div>
                     </div>
                      <div class="row with-forms">
                        <div class="col-md-12">
                              <h5><i class="fa fa-list"></i> <b> Description: </b><?=$res->description?></h5>
                              
                        </div>
                      </div>
                      <div class="row with-forms">
                        <div class="col-md-12">
                              <h5><i class="fa fa-list"></i> <b> Admin Remarks: </b><?=$res->admin_remarks?></h5>
                              
                        </div>
                      </div>

                      <div class="row with-forms">
                        <div class="col-md-12">
                              <h5><i class="fa fa-user"></i> <b> Emp Remarks: *</b></h5>
                              <textarea name="emp_remarks" required rows="4"><?=$res->emp_remarks?></textarea>
                        </div>
                      </div>

                      <div class="row with-forms">
                        <div class="col-md-6">
                              <h5><i class="fa fa-tag"></i> <b> Status: *</b></h5>
                        </div>
                        <div class="col-md-6">
                              <select name="status" required >
                                  <option value="Pending" <?php if('Pending' == $res->status) echo 'selected'; ?> >Pending</option>;
                                  <option value="Completed" <?php if('Completed' == $res->status) echo 'selected'; ?> >Completed</option>;
                              </select>
                        </div>
                      </div>
                                      <div class="clearfix"></div>

    <center>
    <br/>

    <button type="submit" class="button round" onclick="this.innerHTML+=' &nbsp; &nbsp; <i class=\'fa fa-spinner fa-spin\' style=\'color:yellow;\'></i>';"> Update <i class="fa fa-paper-plane"></i> </button>
    <br/><br/>
    </center>
    </form>

                        </div>
                    </div>

 
                      <!-- Row -->
                  
                    </div>
                    <!-- Section / End -->

          </div>
                  </div>


      </div>
          <!-- body content ends -->


  </div>
  <!-- dashboard Content / End -->

 </div>
 <!-- Dashboard / End -->
 </div>
 <!-- Wrapper / End -->

 <!-- Copyrights -->
 <div class="row">
   <div class="copyrights" style="text-align:right; border-top:1px solid #bcbcbc; padding-top:5px;"><small><?=$this->user_model->copyright?></small></div>
 </div>

 <!-- Scripts
 ================================================== -->
 <script type="text/javascript" src="<?=base_url()?>scripts/jquery-2.2.0.min.js"></script>
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

<!-- DropZone | Documentation: http://dropzonejs.com -->
<script type="text/javascript" src="<?=base_url()?>scripts/dropzone.js"></script>
    <script src="<?php echo base_url();?>scripts/sweetalert.js"></script>
  <script src="<?php echo base_url();?>scripts/sweetalert.min.js"></script>


 </body>

 </html>
