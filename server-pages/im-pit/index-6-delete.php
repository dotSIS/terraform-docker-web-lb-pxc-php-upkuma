<?php

    require 'rb.php';
    require 'software_class.php';

    R::setup('mysql:host=pxc_node0;dbname=im_pit', 'root', 'password');

    if(isset($_POST['softid'])){
        $sid = $_POST['softid'];
        $software = R::find('software', ' id = ' . $sid);
        foreach($software as $soft){
            R::trash($soft);
        }
        $message = "Software Successfully Deleted!";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }

    R::close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/style-sambaan-crud.css"> -->
    <title>Sambaan3R5</title>
    <style>
        html{
            scroll-behavior: smooth;
        }

        body{
            background-color:#F6F5F5;
            margin:0px;
            padding:0px;
        }

        ul{
            list-style:none;
        }

        a{
            text-decoration:none;
        }

        section{
            width:100%;
            height:100vh;
            background-image:url('images/bg-crud.png');
            background-repeat:no-repeat;
            background-size:cover;
            position:relative;
        }

        nav{
            display:flex;
            justify-content:space-between;
            align-items:center;
            height:60px;
            width:90%;
            background-color:#FFFFFF;
            box-shadow:2px 2px 12px rgba(0, 0, 0, 0.2);
            padding:0px 5%;
            position:fixed;
            z-index:999;
        }

        nav ul{
            display:flex;
        }

        nav ul li{
            margin:20px;
            font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            color:#3f42e4;
            font-size:15px;
            font-weight:700;
        }

        nav ul li a:visited{
            color:#3f42e4;
        }

        .logo{
            font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            color:#000000;
            font-size:22px;
        }

        .logo span{
            font-weight:bold;
            color:#3f42e4;
        }

        .text-container p:nth-child(1){
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-weight:bold;
            color:#6D6D6D;
            font-size:20px;
        }

        .text-container p:nth-child(2){
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-weight:bold;
            letter-spacing:1px;
            color:#1A1A1A;
            font-size:30px;
        }

        .text-container p:nth-child(3){
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-weight:bold;
            color:#6D6D6D;
            font-size:20px;
        }

        .text-container p:nth-child(4){
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-weight:bold;
            letter-spacing:1px;
            color:#1A1A1A;
            font-size:30px;
        }

        .text-container p:nth-child(5){
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-weight:bold;
            color:#6D6D6D;
            font-size:20px;
        }

        .text-container p:nth-child(6){
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-weight:bold;
            letter-spacing:1px;
            color:#1A1A1A;
            font-size:30px;
        }

        .text-container p:nth-child(7){
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-weight:bold;
            color:#6D6D6D;
            font-size:20px;
        }

        .text-container p:nth-child(8){
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-weight:bold;
            letter-spacing:1px;
            color:#1A1A1A;
            font-size:30px;
        }

        .text-container p{
            line-height:0px;
            /*margin:45px 300px 25px 0px;*/
            align-items:center;
        }

        .text-container{
            height:250px;
            width:550px;
            position:absolute;
            left:13%;
            top:42%;
            transform:translate(-13%, -42%);
            align-items:center;
        }

        input[type=text]{
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit]{
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover{
            background-color: #45a049;
        }

        #softwares{
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #softwares td, #softwares th{
            border: 1px solid #ddd;
            padding: 8px;
        }

        #softwares tr:nth-child(even){background-color: #f2f2f2;}

        #softwares tr:hover{background-color: #ddd;}

        #softwares th{
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>
<body id="top">
    <section>
    <!--Navigation-->
        <nav>
            <a href="index.php" class="logo">Sambaan3R5</a>
            <ul id="menu">
                <li><a href="index-1-create.php">Create</a></li>
                <li><a href="index-2-read.php">Read</a></li>
                <li><a href="index-3-search.php">Search</a></li>
                <li><a href="index-4-edit.php">Edit</a></li>
                <li><a href="index-5-update.php">Update</a></li>
                <li><a href="index-6-delete.php">Delete</a></li>
            </ul>
        </nav>
        <!--Text Content-->
        <div class="text-container">
            <form method="POST" action="index-6-delete.php">
                Software ID:
                <input type="text" name="softid"/><br/>
                <input type="submit" value="Delete"/>
            </form>
        </div>
    </section>
</body>
</html>
