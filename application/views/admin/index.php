<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 ?>

 <!DOCTYPE html>

 <head>

 <!-- Basic Page Needs
 ================================================== -->
 <title><?=$this->user_model->sitename?> :: Admin Login</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

 <?php $this->load->view("admin/include_headlinks.php"); ?>

 </head>

 <body style="background:#000">
 <!-- Header Container
 ================================================== -->
 <?php $this->load->view("admin/include_header.php"); ?>
 <!-- Header Container / End -->

    <!--  main content starts -->

    <div class="row"  style="background:#f1f1f1 url('<?=base_url()?>img/div_bg.jpg') repeat; background-attachment:fixed; margin-bottom:-65px;">
      <div class="container">
              <br/><br><br>
<div class="col-md-6 col-md-offset-3">

              <br>
              <br>
              <br>
              <br>
              <br>
              <br>

              <?=$this->session->flashdata('messagePr')?>
</div>
<br/><br/><br/>


     		<div class="col-md-4 col-md-offset-4">
     			<div class="row" id="loform">

            					<!-- Section -->
            					<div class="add-listing-section">

            						<!-- Headline -->
            						<div class="add-listing-headline bgcolorch" style="background-color:#757575;">
            							<h3 class="" style="text-align:center; color:#FFF; "><b><i class="fa fa-lock"></i> Admin LOGIN </b></h3>
            						</div>

                        <!-- Login -->
                          <form method="post" class="login" action="<?=base_url()?>admin/login_auth">
                            <p>&nbsp;</p>

                            <p class="form-row form-row-wide">
                              <label for="username"><b><i class="fa fa-user"></i> &nbsp; Username:
                                </b>
                                <input type="text" class="input-text" name="username"  id="username" required/>
                              </label>
                            </p>

                            <p class="form-row form-row-wide">
                              <label for="password"><b><i class="fa fa-key"></i> &nbsp; Password:
                                </b>
                                <input class="input-text" type="password" name="password" id="password" required/>
                              </label>
                              <small class="lost_password">
                                
                                <span style="float: right; font-weight: bolder;">
                                  <a href="<?=base_url()?>user/" style="font-size:12px; color:blue; margin-top:-12px;" > &raquo; User Login <b></a>
                                  </span>
                              </small>
                            </p>

                            <center>
                              <button type="submit" class="button border margin-top-1" > <i class="sl sl-icon-login"></i> Login </button>
                            </center>

                          </form>

            					</div>
            					<!-- Section / End -->

                      <div class="clearfix"><br/>&nbsp; <br/><br/></div>
                                    <br><br>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>


     			</div>
     		</div>
      </div>
    </div>


    <!--  main content ends -->

<div class="clearfix"></div>
    <!-- Copyrights -->
    <div class="row">
      <div class="copyrights" style=""><small><?=$this->user_model->copyright?></small></div>
    </div>

</div> <!-- end wrapper ------------->


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

 </body>

 </html>
