<!DOCTYPE html>
<?php
include ("functions/functions.php");
?>
<html>
    <head>
        <title> My Social Network</title>
    <link rel="stylesheet" href="styles/style.css" media="all"/>
    <head>
<body>
    <!--container starts-->
    <div class="container">
        <!--Head wrap starts-->
        <div id="head_wrap">
            <!--Header starts-->
            <div id="header">
                <img src="images/images.png" style="float:left"/>
                <form method="post" action="" id="form1">
                    <strong>Email: </strong>
                <input type ="email" name="email" placeholder="Email" required="required"/>
                    <strong>Password:</strong>
                    <input type="password" name="pass" placeholder="********" required="required"/>
                <input type="submit" name="sub" value="Login"/>  
                 
                </form>
            </div>
        </div>
        <!--Header end-->
        <!--content area starts-->
        <div id="content">
            <div>
                <img src="images/images_home.png" style="float:left; margin-right:40px;"/>
            </div>
            <div id="form2">
                <form action="" method="post">
                    <h2>Sign Up Here</h2>
                    <table>
                        <tr>
                            <td align="right">UID:</td>
                            <td>
                            <input type="text" name="u_id" placeholder="Enter your university ID" required="required"/>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">Name:</td>
                            <td>
                            <input type="text" name="u_name" placeholder="Enter your name" required="required"/>
                            </td>
                        </tr>
                        
                        <tr>
                            <td align="right">Password:</td>
                            <td>
                            <input type="text" name="u_pass" placeholder="Enter your password" required="required"/>
                            </td>
                        </tr>
                        
                        <tr>
                            <td align="right">Email:</td>
                            <td>
                            <input type="email" name="u_email" placeholder="Enter your email" required="required"/>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">Year:</td>
                            <td>
                            <select type="text" name="u_year"  required="required">
                            <option>Select year</option>
                            <option>Freshman</option>
                            <option>Sophomore</option>
                            <option>Junior</option>
                            <option>Senior</option>
                            </select>
                            </td>
                        </tr>
                        <tr>
                        <td>
                            <td colspan="6">
                        <button name="sign_up">Sign Up
                            </button>
                        </td>
                        </tr>
                    </table>
                </form>
                <?php InsertUser();?>
            </div>
        </div>
        <!-- content area ends-->
        <div id="footer">
        <h2>&copy; 2016 Sepideh Hashemzadeh</h2>
        </div>
    </div>
    <!--container wrap ends-->


</body>
</html>