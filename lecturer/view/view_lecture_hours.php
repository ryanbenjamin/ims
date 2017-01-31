<?php 
session_start() ;
if(!empty($_SESSION['cur_user'])&&($_SESSION['user_role']=='7'))
{
    require_once '../model/teacher.php';
    $lecturer = $_SESSION['user_id'];
    $obj_user = new Teachers();
    $result = $obj_user->getTeacherByUser($lecturer);
    $teacher = $result['teacher_id'];
    $teacher_rate = $result['rate'];
    ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<meta charset="utf-8">
	<title>Teacher list | KEY - Institute Management System</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="0">

	<!-- The styles -->
	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
    
    
    <!-- external javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->

	<!-- jQuery -->
        <style type="text/css" title="style">
         @import "css/pepper-grinder/jquery-ui-1.10.3.custom.css";
        </style>
	<script src="js/jquery-1.7.2.min.js"></script>
	<!-- jQuery UI -->
        <script src="js/jquery-ui-1.8.21.custom.min.js"></script>
        <script type="text/javascript" src="js/jquery-te-1.3.6.min.js"></script>
	<!-- transition / effect library -->
	<script src="js/bootstrap-transition.js"></script>
	<!-- alert enhancer library -->
	<script src="js/bootstrap-alert.js"></script>
	<!-- modal / dialog library -->
	<script src="js/bootstrap-modal.js"></script>
	<!-- custom dropdown library -->
	<script src="js/bootstrap-dropdown.js"></script>
	<!-- scrolspy library -->
	<script src="js/bootstrap-scrollspy.js"></script>
	<!-- library for creating tabs -->
	<script src="js/bootstrap-tab.js"></script>
	<!-- library for advanced tooltip -->
	<script src="js/bootstrap-tooltip.js"></script>
	<!-- popover effect library -->
	<script src="js/bootstrap-popover.js"></script>
	<!-- button enhancer library -->
	<script src="js/bootstrap-button.js"></script>
	<!-- accordion library (optional, not used in demo) -->
	<script src="js/bootstrap-collapse.js"></script>
	<!-- carousel slideshow library (optional, not used in demo) -->
	<script src="js/bootstrap-carousel.js"></script>
	<!-- autocomplete library -->
	<script src="js/bootstrap-typeahead.js"></script>
	<!-- tour library -->
	<script src="js/bootstrap-tour.js"></script>
	<!-- library for cookie management -->
	<script src="js/jquery.cookie.js"></script>
	<!-- calander plugin -->
	<script src="js/fullcalendar.min.js"></script>
	<!-- data table plugin -->
	<script src="js/jquery.datatables.min.js"></script>

	<!-- chart libraries start -->
	<script src="js/excanvas.js"></script>
	<script src="js/jquery.flot.min.js"></script>
	<script src="js/jquery.flot.pie.min.js"></script>
	<script src="js/jquery.flot.stack.js"></script>
	<script src="js/jquery.flot.resize.min.js"></script>
	<!-- chart libraries end -->

	<!-- select or dropdown enhancer -->
	<script src="js/jquery.chosen.min.js"></script>
	<!-- checkbox, radio, and file input styler -->
	<script src="js/jquery.uniform.min.js"></script>
	<!-- plugin for gallery image view -->
	<script src="js/jquery.colorbox.min.js"></script>
	<!-- rich text editor library -->
	<script src="js/jquery.cleditor.min.js"></script>
	<!-- notification plugin -->
	<script src="js/jquery.noty.js"></script>
	<!-- file manager library -->
	<script src="js/jquery.elfinder.min.js"></script>
	<!-- star rating plugin -->
	<script src="js/jquery.raty.min.js"></script>
	<!-- for iOS style toggle switch -->
	<script src="js/jquery.iphone.toggle.js"></script>
	<!-- autogrowing textarea plugin -->
	<script src="js/jquery.autogrow-textarea.js"></script>
	<!-- multiple file upload plugin -->
	<script src="js/jquery.uploadify-3.1.min.js"></script>
	<!-- history.js for cross-browser state change on ajax -->
	<script src="js/jquery.history.js"></script>
	<!-- application script for Charisma demo -->
        <script src="js/charisma.js"></script>
        <link rel="shortcut icon" href="images/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="css/teachers.css" media="all" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap-spacelab.css" media="all">
<script type="text/javascript">
             $(function() {
    $( "#start_date" ).datepicker({
        showOn: "both",
      defaultDate: "null",
      changeMonth: true,
      numberOfMonths: 1,
      buttonImage: "images/calendar.png",
      buttonImageOnly: true,
      dateFormat: "yy-mm-dd",
      onClose: function( selectedDate ) {
        $( "#end_date" ).datepicker( "option", "minDate", selectedDate );
      }
    });
     $( "#end_date" ).datepicker({
         showOn: "both",
      defaultDate: "null",
      buttonImage: "images/calendar.png",
      buttonImageOnly: true,
      changeMonth: true,
      numberOfMonths: 1,
      dateFormat: "yy-mm-dd",
      onClose: function( selectedDate ) {
        $( "#from" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
    });
                    </script>
<script type="text/javascript">
            //Datepicker
     $(function() {
    $( "#from" ).datepicker({
        showOn: "both",
      defaultDate: "null",
      changeMonth: true,
      numberOfMonths: 1,
      buttonImage: "images/calendar.png",
      buttonImageOnly: true,
      dateFormat: "yy-mm-dd",
      onClose: function( selectedDate ) {
        $( "#to" ).datepicker( "option", "minDate", selectedDate );
      }
    });
     $( "#to" ).datepicker({
         showOn: "both",
      defaultDate: "null",
      buttonImage: "images/calendar.png",
      buttonImageOnly: true,
      changeMonth: true,
      numberOfMonths: 1,
      dateFormat: "yy-mm-dd",
      onClose: function( selectedDate ) {
        $( "#from" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
    });
    
</script>

    
</head>
<body>
		<!-- topbar starts -->
	<div class="navbar">
		<div class="navbar-inner">
	<?php include 'common/lecturer_header.php';?>
		</div>
	</div>
	<!-- topbar ends -->		<div class="container-fluid">
			<div class="row-fluid">
				
				<!-- left menu starts -->
            <div class="span2 main-menu-span">
                <?php   include 'common/lecturer_side_nav.php';?><!--/.well -->
            </div> <!--/span-->
			<!-- left menu ends -->                
                
                <div id="content" class="span10">
                <!-- content starts -->
                
                
<!---------------MANAGE TEACHER LISTS------------>
<div class="row-fluid">
	<div class="box span12">
		<div class="box-header well">
            <div class="box-icon">
                <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
            </div>
		</div>
        
		<div class="box-content">
        	<!-----CUSTOM MESSAGE------>
        	
                        <!-----CUSTOM MESSAGE------>
            
        	<!----TAB UI FOR TEACHERS-->
            <ul class="nav nav-tabs" id="myTab">
            	                
            	                
                <li class="active"><a href="#manage">View Lecture Hours</a></li>
                
                <li><a href="#create">View Payment Details</a></li>
            </ul>
            
            
            <div id="myTabContent" class="tab-content">
            
            	
                
            	<!------MANAGE TEACHERS------->
                <div class="tab-pane active" id="manage">
                    <form action="#" class="form-horizontal" method="post">
        <fieldset style="width: 400px">
            <legend><i class="icon32 icon-gear"></i>Lecture Hours Details</legend>
            <div class="control-group">
            <label class="control-label" for="typeahead">Start Date</label>
            <div class="controls">
            <input type="text"  value="<?php if(isset($_POST['start_date'])){echo $_POST['start_date'];} ?>" name="start_date" id="start_date"  />
                <br/>
            </div>
        </div>
            <div class="control-group">
            <label class="control-label" for="typeahead">End Date</label>
            <div class="controls">
            <input type="text" value="<?php if(isset($_POST['end_date'])){echo $_POST['end_date'];} ?>" name="end_date" id="end_date"  />
                <br/>
            </div>
        </div>
            <div style="float:right">
                <input type="hidden" name="action" value="get_lecture_hours"/>
                <button type="submit" class="btn btn-info" ><i class="icon-zoom-in icon-white"></i> Browse</button>
            </div>
            
        </fieldset>
</form>
<?php if(isset($_POST['action']) && $_POST['action']=="get_lecture_hours"){
    $start = $_POST['start_date'];
    $end = $_POST['end_date'];
    $total =0;
    $obj_lecture_hours = new Teachers();
    $hours_result = $obj_lecture_hours->getLectureHoursDetails($start, $end, $teacher);
    ?>                  
                    
<div class="dataTables_wrapper" role="grid">
    
   
<table aria-describedby="DataTables_Table_0_info" id="DataTables_Table_0" class="table table-striped table-bordered bootstrap-datatable datatable dataTable">
  <thead>
      
      <tr role="row">          
          <th width="80" style="width: 150px;">Date</th>
          <th width="80" style="width: 150px;">Course</th>
          <th width="80" style="width: 150px;">Start Time</th>
          <th width="80" style="width: 150px;">End Time</th>
  </thead>
<tbody id="lecture_hours_tbl" aria-relevant="all" aria-live="polite" role="alert">
   <?php while($row = mysql_fetch_array($hours_result)){
        $total = $total + $row['total_hours'];
    ?>
    <tr>
    <td><?php echo $row['date'];?></td>
    <td><?php echo $row['course_name'];?></td>
    <td><?php echo $row['act_start'];?></td>
    <td><?php echo $row['act_end'];?></td>
    </tr>
    <?php }?>
</tbody>
</table>
     <table>
        <tr>
            <th colspan="4">Total No of Lecture Hours: &nbsp;&nbsp;&nbsp; <?php echo $total." hours";?></th>
          
          
      </tr>
    </table>
</div>
                    <?php } ?>
                   
    <br/><br/><br/>
    </div>
                
                <!------CREATE NEW LESSON------->
                <div class="tab-pane" id="create">
                    <form action="" method="post" class="form-horizontal">
                            <fieldset style="width: 400px">
            <legend><i class="icon32 icon-gear"></i>Payment Details</legend> 
            <div class="control-group">
            <label class="control-label" for="typeahead">Start Date</label>
            <div class="controls">
            <input type="text" value="<?php if(isset($_POST['payment_start_date'])){echo $_POST['payment_start_date'];} ?>" name="payment_start_date" id="from"  />
                <br/>
            </div>
        </div>
            <div class="control-group">
            <label class="control-label" for="typeahead">End Date</label>
            <div class="controls">
                <input type="text" value="<?php if(isset($_POST['payment_end_date'])){echo $_POST['payment_end_date'];} ?>" name="payment_end_date" id="to"  />
            </div>
        </div>
                <div style="float:right">
                <input type="hidden" name="action" value="get_payment_details"/>
                <button type="submit" class="btn btn-info" ><i class="icon-zoom-in icon-white"></i> Browse</button>
            </div>
            <div class="center">
            
            </div>
        </fieldset>
</form>
                    <br/>
                        
                    <br/>
        <?php 
        if(isset($_POST['action'])&&$_POST['action']=="get_payment_details"){
            $load_payment = "true";
        $pay_start = $_POST['payment_start_date'];
        $pay_end = $_POST['payment_end_date'];

?>
<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid"><table aria-describedby="DataTables_Table_0_info" id="DataTables_Table_0" class="table table-striped table-bordered bootstrap-datatable datatable dataTable">
  <thead>
      <tr role="row">
          <th aria-label="ID: activate to sort column descending" aria-sort="ascending" style="width: 12px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting_asc">Course</th>
          <th aria-label="Photo: activate to sort column ascending" style="width: 100px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting" width="80">Category</th>
          <th aria-label="Name: activate to sort column ascending" style="width: 120px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting">Total NO of Hours</th>
          <th aria-label="Email: activate to sort column ascending" style="width: 30px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting">Payable Amount</th>
          
          
      </tr>
  </thead>  
  
<tbody aria-relevant="all" aria-live="polite" role="alert">
<?php 
$result = $obj_user->getLecturerPayments($pay_start, $pay_end, $teacher); 

while($row = mysql_fetch_array($result)){
    
    ?>
      <tr class="odd">
        <td class=><?php echo $row['course_name'];?></td>
        <td class=" ">
                       <?php echo $row['course_category_name'];?>
        </td>
        <td class=" "><?php echo $row['total'];?></td>
        <?php $payable_amount= $row['total']* $teacher_rate;?>
        <td class=" "><?php echo $payable_amount.".00";?></td>
        
    </tr>
    <?php 
    
    } }
   
    ?>
</tbody></table>
</div>
                       </div>
            </div>
        
			
		</div>
	</div>
</div>
    <!-- content ends -->
				</div><!--/#content.span10-->
			</div><!--/fluid-row-->
<?php
    if(isset($load_payment) && $load_payment == 'true')
    {
        ?>
         <script type="text/javascript">
                setTimeout(function() {
      // Do something after 5 seconds
                $('ul#myTab li:first').removeClass('active');
                $('ul#myTab li:first-child').next().addClass('active');
                $('#manage').removeClass('active');
                $('#create').addClass('active');
            }, 100);                
            </script>               
<?php        
    }
?>
<footer>
<hr>
<!---------facebook like page---------->

        <!---------facebook like page--------->
<p class="pull-right">Powered by: <a href="#" target="_top">Key Institute</a></p>
</footer>		
		</div><!--/.fluid-container-->

                
		


<div style="display: none;" id="cboxOverlay"></div><div style="display: none; padding-bottom: 57px; padding-right: 28px;" class="" id="colorbox"><div id="cboxWrapper"><div><div style="float: left;" id="cboxTopLeft"></div><div style="float: left;" id="cboxTopCenter"></div><div style="float: left;" id="cboxTopRight"></div></div><div style="clear: left;"><div style="float: left;" id="cboxMiddleLeft"></div><div style="float: left;" id="cboxContent"><div style="width: 0px; height: 0px; overflow: hidden; float: left;" id="cboxLoadedContent"></div><div style="float: left;" id="cboxLoadingOverlay"></div><div style="float: left;" id="cboxLoadingGraphic"></div><div style="float: left;" id="cboxTitle"></div><div style="float: left;" id="cboxCurrent"></div><div style="float: left;" id="cboxNext"></div><div style="float: left;" id="cboxPrevious"></div><div style="float: left;" id="cboxSlideshow"></div><div style="float: left;" id="cboxClose"></div></div><div style="float: left;" id="cboxMiddleRight"></div></div><div style="clear: left;"><div style="float: left;" id="cboxBottomLeft"></div><div style="float: left;" id="cboxBottomCenter"></div><div style="float: left;" id="cboxBottomRight"></div></div></div><div style="position: absolute; width: 9999px; visibility: hidden; display: none;"></div></div><div style="position: absolute; top: -10000px; left: -10000px; width: 48.9362px; font-size: 13px; font-family: &quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif; font-weight: 400; line-height: 18px; resize: none;"></div></body>

</html>
<?php }
else
{
//    $_SESSION['cur_user']=NULL;
    unset($_SESSION['cur_user']);
    session_destroy();
    header("location: ../../index/view/index.php");
}
?>