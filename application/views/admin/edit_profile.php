<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 ?>

 <!DOCTYPE html>
 <head>
 <!-- Basic Page Needs
 ================================================== -->
 <title><?=$this->user_model->sitename?> :  Edit Profile </title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

 <?php $this->load->view("admin/include_headlinks.php"); ?>

 </head>

 <body>
 <!-- Header Container
 ================================================== -->
 <?php $this->load->view("admin/include_header.php"); ?>
 <!-- Header Container / End -->
 <div id="dashboard" style="background:#f1f1f1 url('<?=base_url()?>img/pbg10.jpg') repeat;">

   <div class="container   margin-top-10">
  <!-- Content
  ================================================== -->

    <!-- Titlebar -->
    <div id="titlebar">
      <div class="col-md-10 col-md-offset-1">
          <h3><b> <i class="fa fa-edit"></i> Edit Profile </b></h3>
          <!-- Breadcrumbs -->
          <nav id="breadcrumbs">
            <ul style="float: right;">
              <li><b><a href="<?=base_url()?>admin/dashboard"><i class="sl sl-icon-grid"></i> Dashboard</a></b></li>
            </ul>
          </nav>
      </div>
    </div>


    <!-- body content st -->
      <div class="col-md-6 col-md-offset-3" >
        <div class="row">
          <div id="add-listing">
<br/>
    <?=$this->session->flashdata('messagePr')?>

                    <!-- Section -->
                    <div class="add-listing-section">

                      <!-- Headline -->
                      <div class="add-listing-headline">
                        <h3><i class="list-box-icon im im-icon-User"></i> Account Details</h3>
                      </div>

                      <!-- Row -->
                              <form method="post" action="<?=base_url()?>admin/edit_profile_sub" enctype="multipart/form-data">
                      <div class="row with-forms">
                        <div class="col-md-12">
                              <h5><i class="fa fa-user"></i> <b> Full Name: *</b></h5>
                              <input type="Text" name="full_name" required value="<?=$res->full_name?>" />
                        </div>
                      </div>


                          <div class="row with-forms">
                                  <div class="col-md-12">
                                    <h5><b>Email: *</b></h5>
                                    <input type="text" name="email" required  value="<?=$res->email?>"/>
                                  </div>
                                </div>
                          <div class="row with-forms">                                
                                  <div class="col-md-12">
                                    <h5><b>Mobile No:  *</b></h5>
                                    <input type="number" name="phno" required  value="<?=$res->phno?>"/>
                                  </div>
                            </div>
                                <!-- Row / End -->

                                <div class="row with-forms">
                                        <div class="col-md-12">
                                          <h5><b>Login Username: *</b></h5>
                                          <input type="text" name="aunm" required  value="<?=$res->aunm?>"/>
                                        </div>
                                      </div>
                          <div class="row with-forms">                                      
                                        <div class="col-md-12">
                                          <h5><b>Login Password:  *</b></h5>
                                          <input type="text" name="apwd" required  value="<?=$res->apwd?>"/>
                                        </div>
                                        </div>

                

                                      <div class="clearfix"></div>

    <center>
    <br/>

    <button type="submit" class="button round" onclick="this.innerHTML+=' &nbsp; &nbsp; <i class=\'fa fa-spinner fa-spin\' style=\'color:yellow;\'></i>';"> UPDATE <i class="fa fa-paper-plane"></i> </button>
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
