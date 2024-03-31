<?php

session_start();
include "access.php";
    $error = "";
    function create_userid()
    {
        
        $length = rand(4,20);
        $number = "";
        for ($i=0; $i < $length; $i++) {
            # code...
            $new_rand = rand(0,9);
            
            $number = $number . $new_rand;
        }
        
        return $number;
    }

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    if(!$DB = new PDO("mysql:host=pyasger62396.ipagemysql.com;dbname=ranks_db","pyasger","Iljvm7139!"))
    {
        
        die("could not connect to the database");
    }
    

    
    //save to database

    $arr['email'] = $_POST['email'];
    $arr['password'] = hash('sha1', $_POST['password']);

    
    $query = "select * from users where email = :email && password = :password limit 1";
    $stm = $DB->prepare($query);
    if($stm)
    {
        $check = $stm->execute($arr);
        if($check){
            $data = $stm->fetchAll(PDO::FETCH_ASSOC);
            if(is_array($data) && count($data) > 0)
            {
                 $_SESSION['myid'] = $data[0]['userid'];
                 $_SESSION['myname'] = $data[0]['name'];
                 $_SESSION['myrank'] = $data[0]['rank'];
            }else{
                
                $error = "wrong user name or password";
            }
        }
        
        if($error == "")
        {
           
            header("Location: index.php");
            die;
        }
    }
}

?>
<?php include "header.php" ?>

<h1>Login</h1>
<?php
        if($error != "")
        {
            echo "<br><span style='color:red'>$error</span><br><br>"; 
        }
        ?>
<style type="text/css">
    
    .input{
        border-radius: 5px;
        border: solid thin #aaa;
        padding: 10px;
        margin: 4px;
        
        
    }
    .button{
        border-radius: 5px;
        border: solid thin #aaa;
        padding: 10px;
        margin: 4px;
        cursor: pointer;
    }

</style>

<form method="post">

   
    <input class"input" type="email" name="email" placeholder="Email" required><br>
    <input class"input" type="password" name="password" placeholder="Password" required><br>

<br>
    <input class"button" type="submit" value="Login">

</form>

<?php include "footer.php" ?>