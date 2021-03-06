<?php
    /* PHP warns you if you are using an undeclared variable. This happens very often if you are referencing columns from MySQL Search Results, so we turn that off here -Andrew */
    error_reporting(E_ALL ^ E_NOTICE);


    $con=mysqli_connect("127.0.0.1","root","","social_network") or die ("Connection was not established");
    function InsertUser(){
        global $con;
        if(isset($_POST['sign_up'])){
//          
            $id=mysqli_real_escape_string($con,$_POST['u_id']);
            $name=mysqli_real_escape_string($con,$_POST['u_name']);
            $pass=mysqli_real_escape_string($con,$_POST['u_pass']);
            $email=mysqli_real_escape_string($con,$_POST['u_email']);
            $year=mysqli_real_escape_string($con,$_POST['u_year']);
          
            $status="unverified";
            $posts="No";
            $get_email="select * from users where user_email='$email'";
            $run_email=mysqli_query($con,$get_email);
            $check=mysqli_num_rows($run_email);
            if($check==1){
//                echo "<h2> This email is already registered!</h2>";
                echo "<script>alert('Email is already registered, please try another!')</script>";
                exit();
            }
            if(strlen($pass)<8){
                echo "<script>alert('Password should be at least 8 characters!')</script>";
                exit();
            }
            else{
                $insert="insert into users (user_id,user_name,user_pass,user_email,user_image,user_year,last_login,register_date,status,post) VALUES ('$id','$name','$pass','$email','default.jpg','$year',NOW(),NOW(),'$status','$posts')";
                $run_insert=mysqli_query($con,$insert);
            
            if($run_insert){
                echo "<script>alert('Registration successful!')</script>";
                echo"<script>window.open('home.php','_self')</script>";
            }
        }
    }
    }
    /* Given the exact name of a Society, this function returns its id */
    function SearchSocieties(){
        global $con;
        if(isset($_POST['search'])){
            $soc_name = mysqli_real_escape_string($con,$_POST['soc_name']);
            $query="select id from societies where name='$soc_name'";
            $result=mysqli_query($con,$query);
            if(!$result)
            {
                print "Query failed";
            }
            return mysqli_fetch_assoc($result)[id];

        }
    }
    /* Prints all of a Society's posts, unsorted. */
    /* HOW TO SORT: 0 = default sorting, 1 = descending date, 2 = ascending date, 3 = ascending poster username, 4 = descending poster username. */
    function PrintSocietyPosts($id, $sortOpt = 0)
    {
        global $con;
        if(!$id)
        {
            die ("Invalid society id provided to Print Society Posts");   
        }
        $query;
        switch($sortOpt)
        {
            case 0:
                print "Default Sorting:<br>";
                $query = "select * from posts where society_id=$id";
                break;
            case 1:
                print "Descending Date Sorting:<br>";
                $query = "select * from posts where society_id=$id order by date desc";
                break;
            case 2:
                print "Ascending Date Sorting:<br>";
                $query = "select * from posts where society_id=$id order by date asc";
                break;
            case 3:
                print "Ascending Name Sorting:<br>";
                $query = "select * from posts, users where posts.society_id=$id and users.user_id = posts.poster_id order by users.user_name asc";
                break;
            case 4:
                print "Descending Name Sorting:<br>";
                $query = "select * from posts, users where posts.society_id=$id and users.user_id = posts.poster_id order by users.user_name desc";
                break;
            default:
                print "Invalid sorting option provided.";
                $query = "select * from posts where society_id=$id";
                break;
        }

        $result = mysqli_query($con,$query);
        while($row = mysqli_fetch_assoc($result))
        {
            $poster_query="select user_name from users where user_id = $row[poster_id]";
            $poster_result=mysqli_query($con,$poster_query);
            $poster=mysqli_fetch_assoc($poster_result)[user_name];
            print "$row[title]<br>";
            print "Posted on $row[date] by $poster";
            print "<br><br>";
        }
        return;
    }
    function sortPosts($sortOpt)
    {

    }
?>