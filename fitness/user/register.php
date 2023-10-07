<?php
$host     = "localhost"; // Host name 
$username = "root"; // Mysql username 
$password = ""; // Mysql password 
$db_name  = "befit"; // Database name 

// Connect to server and select databse.
$con = mysqli_connect($host, $username, $password, $db_name);

// Check connection
if ($con->connect_error) {
    echo "Failed to connect to MySQL: " . $con->connect_error;
}
?>
<?php
function page_protect()
{
    session_start();
    
    global $db;
    
    /* Secure against Session Hijacking by checking user agent */
    if (isset($_SESSION['HTTP_USER_AGENT'])) {
        if ($_SESSION['HTTP_USER_AGENT'] != md5($_SERVER['HTTP_USER_AGENT'])) {
            session_destroy();
            echo "<meta http-equiv='refresh' content='0; url=../login/'>";
            exit();
        }
    }
    
    // before we allow sessions, we need to check authentication key - ckey and ctime stored in database
    
    /* If session not set, check for cookies set by Remember me */
    if (!isset($_SESSION['user_data']) && !isset($_SESSION['logged']) && !isset($_SESSION['auth_level'])) {
        session_destroy();
        echo "<meta http-equiv='refresh' content='0; url=../login/'>";
        exit();
    } else {
        
    }
    
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Fitness | Register</title>
	<link rel="stylesheet" href="./css/style.css"/>
	<link rel="stylesheet" type="text/css" href="./css/entypo.css">
</head>
<body>

<body class="page-body login-page login-form-fall">
    	<div id="container">
			<div class="login-container">
            <style>
            .frm-field {
                color: #fff!important;
            }
           </style>
	<div class="login-header login-caret">
		
		<div class="login-content">
			
			<a href="#" class="logo">
				<img src="./images/logo.png" alt="" />
			</a>
			
			<p class="description">Dear user, Please register to access the Dashboard area!</p>
			
			<!-- progress bar indicator -->
			<div class="login-progressbar-indicator">
				<h3>43%</h3>
				<span>logging in...</span>
			</div>
		</div>
		
	</div>
	
	<div class="login-progressbar">
		<div></div>
	</div>
	
	<div class="reg-form">
		
		<div class="reg-content">
			
        <form id="form1" name="form1" method="post" class="a1-container" action="new_submit.php">
         <table width="100%" border="0" align="center">
         <tr>
           <td height="35"><table width="100%" border="0" align="center">
           	 <tr>
           	   <td height="35">MEMBERSHIP ID:</td>
           	   <td height="35"><input type="text" id="boxx" name="m_id" value="<?php echo time(); ?>" readonly required/></td>
         	   </tr>
			   
			   <tr>
               <td height="35">NAME:</td>
               <td height="35"><input name="u_name" id="boxx"  required/></td>
             </tr>
             <tr>
               <td height="35">STREET NAME:</td>
               <td height="35"><input  name="street_name" id="boxx"   required/></td>
             </tr>
             <tr>
               <td height="35">CITY:</td>
               <td height="35"><input type="text" name="city" id="boxx" required / ></td>
             </tr>
             <tr>
               <td height="35">ZIPCODE:</td>
               <td height="35"><input type="number" name="zipcode" id="boxx" maxlength="6" required / ></td>
             </tr>
            <tr>
               <td height="35">STATE:</td>
               <td height="35"><input type="text" name="state" id="boxx" required/ size="30"></td>
             </tr>
            <tr>
               <td height="35">GENDER:</td>
               <td height="35"><select name="gender" id="boxx" required>

					<option value="">--Please Select--</option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
				</select></td>
             </tr>
            <tr>
               <td height="35">DATE OF BIRTH:</td>
               <td height="35"><input type="date" name="dob" id="boxx" required/ size="30"></td>
             </tr>
			 <tr>
               <td height="35">PHONE NO:</td>
               <td height="35"><input type="number" name="mobile" id="boxx" maxlength="10" required/ size="30"></td>
             </tr>
			  <tr>
               <td height="35">EMAIL ID:</td>
               <td height="35"><input type="email" name="email" id="boxx" required/ size="30"></td>
             </tr>
			 <tr>
               <td height="35">PASSWORD:</td>
               <td height="35"><input type="password" name="password" id="boxx" required/ size="30"></td>
             </tr>
			 <tr>
               <td height="35">JOINING DATE:</td>
               <td height="35"><input type="date" name="jdate" id="boxx" required size="30"></td>
             </tr>
             <tr>
               <td height="35">PLAN:</td>
               <td height="35"><select name="plan" id="boxx" required onchange="myplandetail(this.value)">
					<option value="">--Please Select--</option>
					<?php
						$query="select * from plan";
						$result=mysqli_query($con,$query);
						if(mysqli_affected_rows($con)!=0){
							while($row=mysqli_fetch_row($result)){
								echo "<option value=".$row[0].">".$row[1]."</option>";
							}
						}

					?>
					
				</select></td>
             </tr>
			
	    <tbody id="plandetls">
             
            </tbody>

             <tr>
             <tr>
               <td height="35">&nbsp;</td>
               <td height="35"><input class="a1-btn a1-blue" type="submit" name="submit" id="submit" value="Register" >
                 <input class="a1-btn a1-blue" type="reset" name="reset" id="reset" value="Reset"></td>
             </tr>
           </table></td>
         </tr>
         </table>
       </form>
      
    </div>
    </div>   
        
        <script>
        	function myplandetail(str){

        		if(str==""){
        			document.getElementById("plandetls").innerHTML = "";
        			return;
        		}else{
        			if (window.XMLHttpRequest) {
           		 // code for IE7+, Firefox, Chrome, Opera, Safari
           			 xmlhttp = new XMLHttpRequest();
       				 }
       			 	xmlhttp.onreadystatechange = function() {
            		if (this.readyState == 4 && this.status == 200) {
               		 document.getElementById("plandetls").innerHTML=this.responseText;
                
            			}
        			};
        			
       				 xmlhttp.open("GET","plandetail.php?q="+str,true);
       				 xmlhttp.send();	
        		}
        		
        	}
        </script>           
		
				<div class="login-bottom-links">
					<a href="forgot_password.php" class="link">Forgot your password?</a>
					<b style="color:'red'!important;"><a href="/register.php" class="link">New User! Please Register</a></b>
				</div>			
		</div>
		
	</div>
	
</div>

		</div>

</body>
</html>
