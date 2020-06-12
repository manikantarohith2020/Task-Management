<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 ?>

 <!DOCTYPE html>
 <head>
 <!-- Basic Page Needs
 ================================================== -->
 <title><?=$this->user_model->sitename?> :  Employees  </title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

 <?php $this->load->view("admin/include_headlinks.php"); ?>
  <style type="text/css" title="currentStyle">
    @import "<?=base_url()?>media/css/demo_table.css";
    @import "<?=base_url()?>media/css/demo_table_jui.css";
    @import "<?=base_url()?>media/css/themes/base/jquery-ui.css";
    @import "<?=base_url()?>media/css/themes/smoothness/jquery-ui-1.7.2.custom.css";

    .dataTables_length select, .dataTables_filter input { width:auto; display: inline; height: auto; padding: 4px; line-height: 25px;}
    input.text_filter {height: auto; padding: 9px; line-height: 0px; font-size:13px;}
    tr.odd {background-color: #eeeffb;  }
  </style>
  <script type="text/javascript" src="<?=base_url()?>media/js/complete.js"></script>
    <script type="text/javascript" src="<?=base_url()?>scripts/jquery-2.2.0.min.js"></script>
  <script src="<?=base_url()?>media/js/jquery.dataTables.min.js" type="text/javascript"></script>
  <script src="<?=base_url()?>media/js/jquery.dataTables.columnFilter.js" type="text/javascript"></script>
      <script type="text/javascript">
  $(document).ready(function(){
    $('#example').dataTable({"iDisplayLength": 50}).columnFilter();

 /*      $('#example').dataTable()
        .columnFilter({
        aoColumns: [ { type: "select", values: [ 'Gecko', 'Trident', 'KHTML']  },
               { type: "text" },
               null,
               { type: "number" },
               { type: "select", values: [ 'A', 'C', 'U', 'X']  }
          ]
      }); */
  });
      </script>

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
          <h2><b> <i class="fa fa-users"></i> Employees </b></h2>
          <!-- Breadcrumbs -->
          <nav id="breadcrumbs">
            <ul style="float: right;">
              <li><b><a href="<?=base_url()?>admin/dashboard"><i class="sl sl-icon-grid"></i> Dashboard</a></b></li>
            </ul>
          </nav>
      </div>
    </div>


    <!-- body content st -->
      <div class="col-md-12 col-md-offset-0" >
        <div class="row">
<br/>
    <?=$this->session->flashdata('messagePr')?>


          <div id="add-listing">

                <!-- Section -->
                  <div class="add-listing-section">

                      <!-- Headline -->
                      <div class="add-listing-headline">
                        <h3><i class="list-box-icon im im-icon-User"></i> List of Employees
                          <a href="<?=base_url()?>admin/new_employee" style="float: right;"><button class="button rounded"><small><i class="fa fa-plus"></i>Add New Emp</small></button></a>
                        </h3>
                      </div>

<p>&nbsp;</p>

<table  class="display table" id="example" style="font-size:12px;">
              <thead style="background-color:#f4fbde;">
              <tr>
                <th>S.no</th>
                <th nowrap>Full Name</th>
                <th nowrap>Designation</th>
                <th nowrap>Email</th>
                <th nowrap>Ph.No</th>
                <th nowrap>DOJ</th>
                <th nowrap>Status</th>
                <th nowrap>Create Date</th>
                <th nowrap >Actions</th>
              </tr>
            </thead>
              <tfoot >
              <tr>
                <th>S.no</th>
                <th nowrap>Full Name</th>
                <th nowrap>Designation</th>
                <th nowrap>Email</th>
                <th nowrap>Ph.No</th>
                <th nowrap>DOJ</th>
                <th nowrap>Status</th>
                <th nowrap>Create Date</th>
                <th nowrap >Actions</th>
              </tr>                
              </tfoot >

            <tbody>
<?php
$i=0;
  foreach($res as $row) {
    $i++;
?>
              <tr style="font-size:13px;">
                <td nowrap><?=$i?></td>
                <td nowrap><b><?=$row->full_name?></b></td>                
                <td nowrap><?=$row->designation?></td>
                <td nowrap><?=$row->email?></td>
                <td nowrap><?=$row->phno?></td>
                <td nowrap><?=date('d-M-Y',strtotime($row->doj))?></td>
                <td nowrap><span class="<?=$row->acc_status?>"><?=$row->acc_status?></span></td>
                <td><?=date('d-M-Y',strtotime($row->create_date))?></td>
                <td nowrap>
                  <a href="<?=base_url().'admin/edit_employee/'.md5($row->emp_id)?>" class="Pending small" style="font-size:12px; padding:2px 10px;"><i class="fa fa-edit"></i> Edit </a>
                 <a href="<?=base_url()?>admin/del_employee/<?=md5($row->emp_id)?>" class="small Reject" style="font-size:12px; padding:2px 10px;" onclick="if(confirm('Are You Sure To Delete?')) { return true;} else { return false;}"> <i class="fa fa-trash-o" ></i>  </a> 
                </td>
              </tr>
<?php
  }
?>
</tbody>
</table>
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
