
<?php
if(isset($_POST['username'])and (!empty($_POST['username']))){
    session_start();
    $username=$_POST['username'];
    $_SESSION['username']=$_POST['username'];
    $_SESSION['true']=0;
    $_SESSION['fals']=0;
    $_SESSION['checktrue']=null;
    $_SESSION['checkfals']=null;
    $_SESSION['quiznumber']=1;
    $con=mysqli_connect('localhost','root','','soalkhor_soalkhordb');
    $select="SELECT * FROM result WHERE username LIKE '$username'";
    $query=mysqli_query($con,$select);
    $result=mysqli_fetch_assoc($query);
    if($result){
        die("قبلا ثبت نام کردی جیگر❌");
    } else {
        header('location:http://google.com');
    }
    ?>
    <html>
    <h2> ...در حال انتقال به صفحه سوالات </h2>
    <?php
}elseif(isset($_POST['username'])and (empty($_POST['username']))){
    ?>
    <h3>!! خطای ورود حتما اسمت رو ننوشتی</h3>
    <?php
}
?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
    <style>
        body{
            background-color: #3498db;
        }
        h3{
            color:red;
            font-size:20px;
            text-align:center;
            background-color:white;
        }
        input{
            border: 4px solid #db9334;
            border-radius: 20px;
            width: 200px;
            height:50px;
        }
        button{
            margin-top: 15px;
            width: 90px;
            height:50px;
            border-radius: 10px;
            border: 3px solid #db9334;
            font-size: 25px;
            font-family: tahoma;
            cursor: pointer;
            color:rgb(204, 35, 35);
        }
        button:hover{
            background-color: rgb(206, 188, 188);
        }

        div{
            display:block;
            text-align: center;
            margin-top: 100px;
        }
        h2{
            font-size:40px;
            text-align: center;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-weight:700;
            color:rgb(81, 221, 99);
        }
        }
        }

    </style>
    <title>ورود و ثبت</title>
</head>
<body>
<h2>اسمت رو بنویس</h2>
<div>
    <form action="#" method='post'>
        <input type="text" name='username'>
        <br>
        <button type="submit">نوشتم</button>
    </form>
</div>
<audio  autoplay loop>
    <source src="backmusic.mp3
        "  type="audio/mpeg">
</audio>
</body>
</html>