<?php 
session_start() ;
if(!empty($_SESSION['cur_user'])&&($_SESSION['user_role']=='7'))
{
    require_once '../model/schedule.php';?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<meta charset="utf-8">
	<title>Manage Lessons | KEY - Institute Management System</title>
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
         @import "css/jquery-te-1.3.6.css";
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
        <script src="js/charisma_mod.js"></script> 
        
        <link rel="shortcut icon" href="images/favicon.ico">
         

            <link rel="stylesheet" type="text/css" href="css/teachers.css" media="all">
                <link rel="stylesheet" type="text/css" href="css/bootstrap-spacelab.css" media="all">
<script type="text/javascript">
                     $(function() {
            //Datepicker
            $( "#date" ).datepicker({
                showOn: "both",
                buttonImage: "images/calendar.png",
                buttonImageOnly: true,
                changeMonth: true,
                changeYear: true,
                yearRange: "1980:2013",
                maxDate: '0',
                dateFormat: "yy-mm-dd"
            });
        });
                    </script>
<script type="text/javascript">
    function get_schedule_dates(course)     
    {
//        var course = $("#courses").val();    
        if(course!= ''){
        $.ajax({
            url: "../controller/ajax_function.php",
            type: "POST",
            cache: false,
            async:false,
            data: {class_dates:true,course:course},
            success: function(theResponse){
               
                if(theResponse != 'no records')
                {
                    var sched_dates = $.parseJSON(theResponse);
                    $('#class_dates').html('');
                    $.each(sched_dates, function(i, val) {
                        $('#class_dates').append("<option value='"+val.date+"'>"+val.date+"<option>");
                    });
                    //added this line to remove any empty option value;
                    $('#class_dates option:empty').remove();
                }
                else
                {
                    $('#class_dates').html('');
                }

            }
        });  }                                   
    }  
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
            	                
            	                
                <li class="active"><a href="#manage">View Lessons</a></li>
                
                <li><a href="#create">Add Lesson</a></li>
            </ul>
            
            
            <div id="myTabContent" class="tab-content">
            
            	
                
            	<!------MANAGE TEACHERS------->
                <div class="tab-pane active" id="manage">
                	<form action="#" class="form-horizontal">
        <fieldset>
            <!--<legend><i class="icon32 icon-gear"></i>Teacher list</legend>-->
            
            <div class="control-group">
            <label class="control-label" for="typeahead">Course </label>
            <div class="controls">
            <select name="course" onchange="getlessons(this.value,10)" id="course">
                <option></option>
              <?php 
              $lecturer = $_SESSION['user_id'];
              $Object_teacher_id= new Schedules();
              $res = $Object_teacher_id->getTeacherByUser($lecturer);
              $lecturer = $res['teacher_id'];
             
              
              $objct_course = new Schedules();
              $result = $objct_course->getCourseByLecturer($lecturer);
             while($row = mysql_fetch_array($result)) {
              
              ?>  
                
                    <option value="<?php echo $row['course_id'];?>"><?php echo $row['course_category_name']."-".$row['course_name']; ?></option>
                <?php } ?>  
                </select>
                <br/>
            </div>
        </div>
            
        </fieldset>
</form>
                  
<div class="dataTables_wrapper" role="grid">
    <select id="limit_table" class="span1 typeahead" onchange="changeTable(this.value);">
        <option value="10">10</option>
        <option value="25">25</option>
        <option value="50">50</option>
        <option value="ALL">ALL</option>
    </select>
<table aria-describedby="DataTables_Table_0_info" id="DataTables_Table_0" class="table table-striped table-bordered bootstrap-datatable datatable dataTable">
  <thead>
      <tr role="row">          
          <th width="80" style="width: 150px;">Date</th>
          <th>Lesson</th>
             <!--<th aria-label="Options: activate to sort column ascending" style="width: 350px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_0" tabindex="0" role="columnheader" class="sorting" width="350">Options</th></tr>-->
  </thead>
<tbody id="lessons_tbl" aria-relevant="all" aria-live="polite" role="alert">

</tbody>
</table>
</div>
    </div>
                
                <!------CREATE NEW LESSON------->
                <div class="tab-pane" id="create">
                    <form class="form-horizontal" method="post" action="../controller/teacher.php" enctype="multipart/form-data">
    <fieldset>
        <legend><i class="icon32 icon-square-plus"></i>Add New Lesson</legend>
        
        <div class="control-group">
            <label class="control-label" for="typeahead">Course </label>
            <div class="controls">
                <select name="courses" onchange="get_schedule_dates(this.value);" id="courses">
              <?php 
              $lecturer = $_SESSION['user_id'];
              $Object_teacher_id= new Schedules();
              $res = $Object_teacher_id->getTeacherByUser($lecturer);
              $lecturer = $res['teacher_id'];
             
              
              $objct_course = new Schedules();
              $result = $objct_course->getCourseByLecturer($lecturer);
             while($row = mysql_fetch_array($result)) {
              
              ?>  
                
                    <option value="<?php echo $row['course_id'];?>"><?php echo $row['course_category_name']."-".$row['course_name']; ?></option>
                <?php } ?>  
                </select>
            </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="typeahead">Date: </label>  
          <div class="controls">
              <select id="class_dates" name="class_dates">
                  
              </select>
             
          </div>
          
        </div>
            <div class="control-group">
          <label class="control-label" for="typeahead">Content: </label>  
          <div class="controls">
          
              <!--<textarea style="height: 18px;" class="span6 autogrow" name="address" id="content"></textarea>-->   
              <textarea name="content" class="jqte-test"><b><u><span style="color:rgb(0, 148, 133);"></span></u></b></textarea>
          </div>
          
        </div>
       <div class="form-actions">
        <input name="action" value="add_lesson" type="hidden">
            <input class="btn btn-primary" value="Add Lesson" type="submit">
            <input class="btn" value="reset form" type="reset">
        </div>
    </fieldset>
</form>
                       </div>
            </div>
        
			
		</div>
	</div>
</div>

    <!-- content ends -->
				</div><!--/#content.span10-->
			</div><!--/fluid-row-->

<footer>
<hr>
<!---------facebook like page---------->

        <!---------facebook like page--------->
<p class="pull-right">Powered by: <a href="#" target="_top">Key Institute</a></p>
</footer>		
		</div><!--/.fluid-container-->

                <script type="text/javascript">                    
                        function getlessons(course,limit_val){  
                            if(course != ""){
                                $.ajax({
                                    url: "../controller/ajax_function.php",
                                    type: "POST",
                                    cache: false,
                                    async:false,
                                    data: {lessons:true,course_id:course,limit:limit_val},
                                    success: function(theResponse){ 
//                                        alert(theResponse);
                                        if(theResponse != 'no records')
                                        {
                                            var lesson = $.parseJSON(theResponse);
                                            $('#lessons_tbl').html('');
                                            $.each(lesson, function(i, val) {
                                                $('#lessons_tbl').append("<tr><td class='  sorting_1'>"+val.date+"</td><td><a href=view_lessons.php?lesson_id="+val.tbl_lesson_id+" rel='facebox'>View</a></td></tr>");
                                            });                    
                                        }
                                        else
                                        {
                                            $('#lessons_tbl').html('');
                                            $('#lessons_tbl').html('<tr class="odd"><td class="dataTables_empty" valign="top" colspan="2">No data available in table</td></tr>');
                                            
                                        }
                                    }                                    
                                });    
                                }
                                if(limit_val==10)
                                    {
                                        $('#limit_table').val('10');
                                    }                                
                                $('a[rel*=facebox]').facebox();
                            }
                            function changeTable(limit_val)
                            {
                                var course = $("#course").val();
                                if(limit_val=='ALL')
                                    {
                                       limit_val = 95,18446744073709551615;
                                    }
                                getlessons(course,limit_val)
                            }
                    </script>	
	
		


<div style="display: none;" id="cboxOverlay"></div><div style="display: none; padding-bottom: 57px; padding-right: 28px;" class="" id="colorbox"><div id="cboxWrapper"><div><div style="float: left;" id="cboxTopLeft"></div><div style="float: left;" id="cboxTopCenter"></div><div style="float: left;" id="cboxTopRight"></div></div><div style="clear: left;"><div style="float: left;" id="cboxMiddleLeft"></div><div style="float: left;" id="cboxContent"><div style="width: 0px; height: 0px; overflow: hidden; float: left;" id="cboxLoadedContent"></div><div style="float: left;" id="cboxLoadingOverlay"></div><div style="float: left;" id="cboxLoadingGraphic"></div><div style="float: left;" id="cboxTitle"></div><div style="float: left;" id="cboxCurrent"></div><div style="float: left;" id="cboxNext"></div><div style="float: left;" id="cboxPrevious"></div><div style="float: left;" id="cboxSlideshow"></div><div style="float: left;" id="cboxClose"></div></div><div style="float: left;" id="cboxMiddleRight"></div></div><div style="clear: left;"><div style="float: left;" id="cboxBottomLeft"></div><div style="float: left;" id="cboxBottomCenter"></div><div style="float: left;" id="cboxBottomRight"></div></div></div><div style="position: absolute; width: 9999px; visibility: hidden; display: none;"></div></div><div style="position: absolute; top: -10000px; left: -10000px; width: 48.9362px; font-size: 13px; font-family: &quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif; font-weight: 400; line-height: 18px; resize: none;"></div></body>
<script>
    // put a comment here
	$('.jqte-test').jqte();
</script>
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