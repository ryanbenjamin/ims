<?php 
session_start() ;
if(!empty($_SESSION['cur_user'])&&($_SESSION['user_role']=='5'))
{
   require_once '../model/course.php';
   ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<meta charset="utf-8">
	<title>Students | KEY - Institute Management System</title>
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
 <style type="text/css" title="style">
        
         @import "css/pepper-grinder/jquery-ui-1.10.3.custom.css";
        </style>
        <script type="text/javascript" src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.3.custom.js"></script>
<script>
        $(function() {
            //Datepicker
            $( "#payment_date" ).datepicker({
                showOn: "both",
                buttonImage: "images/calendar.png",
                buttonImageOnly: true,
                changeMonth: true,
                changeYear: true,
                yearRange: "2012:2013",
                maxDate: '0',
                dateFormat: "yy-mm-dd"
            });
        });
        
       
      
        </script>
	<!-- jQuery -->
	<script src="js/jquery-1.7.2.min.js"></script>
	<!-- jQuery UI -->
        <script src="js/jquery-ui-1.8.21.custom.min.js"></script>
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
        <script>
            function get_course_name(cat_id)
            {   
                $.ajax({
                        url: "../controller/ajaxfunctions.php",
                        type: "POST",
                        cache: false,
                        async:false,
                        data: {course_cats:true,cat_id:cat_id},
                        success: function(theResponse){
                            var course_subs = $.parseJSON(theResponse);
                            $('#course_subs').html('');
                            $.each(course_subs, function(i, val) {
                                $('#course_subs').append("<input type='checkbox' id='"+val.course_id+"' name='"+val.course_name+"' /> "+val.course_name+" <br/>");
                            });
                        }
                    });
            }
//            $(document).ready(function() {
//            function get_students(){
//                var courses = $("#courses").val();
//                if(courses != ''){
//                    $.ajax({
//                url: "../controller/ajaxfunctions.php",
//                type: "POST",
//                cache: false,
//                async: false,
//                data:{get_students:true,course_id:courses},
//                success:function(theResponse){
//               
//               if(theResponse!='available')
//               
//                        {
//                            alert(theResponse)
////                            $('#student_table').css('display','block');  
//                
//
//                           return false;
//                        }
//
//
//        }
//                    
//                })
//            }
//            }});
        </script>
        
        
        
        
        <link rel="shortcut icon" href="images/favicon.ico">
		

            <link rel="stylesheet" type="text/css" href="css/student.css" media="all">
                <link rel="stylesheet" type="text/css" href="css/bootstrap-spacelab.css" media="all">
               
                
</head>
<body>
		<!-- topbar starts -->
	<div class="navbar">
		<div class="navbar-inner">
		<?php include 'common/coordinator_header.php';?>
		</div>
	</div>
	<!-- topbar ends -->		<div class="container-fluid">
			<div class="row-fluid">
				
				<!-- left menu starts -->
            <div class="span2 main-menu-span">
                <?php include 'common/coordinator_side_nav.php';?><!--/.well -->
            </div> <!--/span-->
			<!-- left menu ends -->                
                
                <div id="content" class="span10">
                <!-- content starts -->
                
                
<!---------------MANAGE STUDENT LISTS------------>
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
            
        	<!----TAB UI FOR STUDENTS-->
            <ul class="nav nav-tabs" id="myTab">
            
            	            
            	                
            	                
               
                
                <li class=""><a href="#create">Payment Schemes</a></li>
            </ul>
            
            
            <div id="myTabContent" class="tab-content">
            
            	
            	
    <!--<div class="alert alert-info" style="margin: 50px;">Select a class to browse it's students</div>-->
                </div>
                
                <!------CREATE NEW STUDENT------->
                <div class="tab-pane" id="create">
                	<form class="form-horizontal" method="post" action="../controller/course.php" >
   
                           
                            
                            <fieldset>
        <legend><i class="icon32 icon-square-plus"></i>Payment Schemes </legend>
         
                           
        
       
        <div class="control-group">
            <label class="control-label" for="typeahead">Course</label>
            <div class="controls">
               <select id="courses" name="course" class="span6 typeahead">
                        <?php
                        $obj = new Course();
                        $result = $obj->getCourses();
                        while ($row = mysql_fetch_array($result)) {
                            ?>                 
                            <option value="<?php echo $row['course_id']; ?>"><?php echo $row['course_category_name'] . " - " . $row['course_name']; ?></option>
                        <?php } ?>                                                
                    </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="typeahead" >Payment method </label>
            <div class="controls">
                <select id="" name="method" class="span6 typeahead">
                    <option value="">select</option>
                    <option value="month">Per Month</option>
                    <option value="qutar_year">Per Qutar Year</option>
                    <option value="year">Per Year</option>
                    <option value="day">Per Day</option>
                    
                </select>
            </div>
        </div>
                <div class="control-group">
            <label class="control-label" for="date01">Payment Date</label>
            <div class="controls">
                <input value="" class="span6 " name="payment_date" type="date" id="payment_date">
            </div>
        </div>
           <div class="control-group">
            <label class="control-label" >Description</label>
            <div class="controls">
                <textarea name="description" class="span6 " ></textarea>          </div>
        </div>

        
        <div class="form-actions">
            <input name="action" value="payment_scheme" type="hidden">
            <input class="btn btn-primary" value="Create Payment Scheme" type="submit">
            <input class="btn" value="Reset form" type="reset">
        </div>
    </fieldset>
</form>                </div>
            </div>
        
			
		</div>
	</div>
</div>

<!-----MODAL WINDOW FOR CAPTURING PHOTO FROM A PC WEBCAM-------->

<!-----MODAL WINDOW FOR CAPTURING PHOTO FROM A PC WEBCAM-------->                <!-- content ends -->
				</div><!--/#content.span10-->
			</div><!--/fluid-row-->

		<footer>
	<hr>
			<!---------facebook like page--------->
	<p class="pull-right">Powered by: <a href="#" target="_top">Key Institute</a></p>
</footer>		
		</div><!--/.fluid-container-->

	
	
		


<div style="display: none;" id="cboxOverlay"></div>
<div style="display: none; padding-bottom: 57px; padding-right: 28px;" class="" id="colorbox">
    <div id="cboxWrapper">
        <div>
            <div style="float: left;" id="cboxTopLeft"></div>
            <div style="float: left;" id="cboxTopCenter"></div>
            <div style="float: left;" id="cboxTopRight"></div>
            
        </div>
        <div style="clear: left;">
            <div style="float: left;" id="cboxMiddleLeft"></div>
            <div style="float: left;" id="cboxContent">
                <div style="width: 0px; height: 0px; overflow: hidden; float: left;" id="cboxLoadedContent"></div>
                <div style="float: left;" id="cboxLoadingOverlay"></div>
                <div style="float: left;" id="cboxLoadingGraphic"></div>
                <div style="float: left;" id="cboxTitle"></div>
                <div style="float: left;" id="cboxCurrent"></div>
                <div style="float: left;" id="cboxNext"></div>
                <div style="float: left;" id="cboxPrevious"></div>
                <div style="float: left;" id="cboxSlideshow"></div>
                <div style="float: left;" id="cboxClose"></div>
                
            </div>
            <div style="float: left;" id="cboxMiddleRight"></div>
            
        </div><div style="clear: left;"><div style="float: left;" id="cboxBottomLeft"></div><div style="float: left;" id="cboxBottomCenter"></div><div style="float: left;" id="cboxBottomRight"></div></div></div><div style="position: absolute; width: 9999px; visibility: hidden; display: none;"></div></div><div style="position: absolute; top: -10000px; left: -10000px; width: 48.9362px; font-size: 13px; font-family: &quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif; font-weight: 400; line-height: 18px; resize: none;"></div></body>
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