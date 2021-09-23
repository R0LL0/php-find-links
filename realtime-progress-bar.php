<html>
    <head>
        <!-- Insert your style sheets and scripts here -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <button type="button" id="button1"  class="btn btn-success btn-block">Click Here To Start Progress Bar</button>
                    <p>&nbsp;<p>
                    <button type="button" id="button2"  class="btn btn-danger btn-block">Click Here To Stop Progress Bar</button>
                </div>
                <div class="col-md-12">
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <div id="progressbar" style="border:1px solid #ccc; border-radius: 5px; "></div>
            
                    <!-- Progress information -->
                    <br>
                    <div id="information" ></div>
                </div>
            </div>
        </div>

        <iframe id="loadarea" style="display:none;"></iframe><br />


        <script >
            $("#button1").click(function(){
                document.getElementById('loadarea').src = 'progressbar.php';
            });
            $("#button2").click(function(){
                document.getElementById('loadarea').src = '';
            });
        </script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    </body>
</html>

<?php
session_start();

ini_set('max_execution_time', 0); // to get unlimited php script execution time

if(empty($_SESSION['i'])){
    $_SESSION['i'] = 0;
}

$total = 100;
for($i=$_SESSION['i'];$i<$total;$i++)
{
    $_SESSION['i'] = $i;
    $percent = intval($i/$total * 100)."%";   
	
    sleep(1); // Here call your time taking function like sending bulk sms etc.

    echo '<script>
    parent.document.getElementById("progressbar").innerHTML="<div style=\"width:'.$percent.';background:linear-gradient(to bottom, rgba(125,126,125,1) 0%,rgba(14,14,14,1) 100%); ;height:35px;\">&nbsp;</div>";
    parent.document.getElementById("information").innerHTML="<div style=\"text-align:center; font-weight:bold\">'.$percent.' is processed.</div>";</script>';

    ob_flush(); 
    flush(); 
}
echo '<script>parent.document.getElementById("information").innerHTML="<div style=\"text-align:center; font-weight:bold\">Process completed</div>"</script>';

session_destroy(); 

?>
