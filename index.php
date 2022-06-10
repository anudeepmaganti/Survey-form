<?php
$insert = false;
if(isset($_POST['name'])){
    // set connection variables
    $server="localhost";
    $username="root";
    $password="";
    // set connection
    $con= mysqli_connect($server,$username,$password);
    
    //check connection
    if(!$con){
        die("connection to this data base failed due to". mysqli_connect_error());
    }

    //echo "success connection";
    
    // collect post variables
    $name=$_POST['name'];
    $gender =$_POST['gender'];
    $age =$_POST['age'];
    $email =$_POST['email'];
    $phone =$_POST['phone'];
    $desc  =$_POST['desc'];
    $sql ="INSERT INTO `trip`.`trip`  (`name` , `age` , `gender` , `email` , `phone` , `other` , `dt`) VALUES
    ('$name' , '$age' , '$gender' , '$email' , '$phone' , '$desc' , current_timestamp());";

    //echo $sql;
    
    // exicute query
    if($con->query($sql) == true){
        //echo "successfully inserted";
        $insert= true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // close the database connection
    $con->close(); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="./NIT-Calicutbg.jpg" alt="NIT CALICUT">
    <div class="container">
        <h1>Wellcome to NIT Calicut Wayanad trip</h1>
        <p>Enter your details and conform  to your participation in trip
        </p>
        <?php
        if($insert == true){
        echo "<p style='color: green;'>Thanks for submitting your form. We are happy to see you joining US trip.</p>
        ";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name"     placeholder="Enter ur name">
            <input type="age" name="age" id="age"    placeholder="Enter ur age">
            <input type="gender" name="gender" id="gender"    placeholder="Enter ur gender">

            <input type="email" name="email" id="email"  placeholder="Enter ur email">
            <input type="phone" name="phone" id="phone"  placeholder="Enter ur phone">
            <textarea name="desc" id="" cols="30" rows="10" placeholder="Enter any other information"></textarea>
            <br>
            <button class="btn">Submit</button>
           <!-- <button class="btn">Reset</button>-->

        </form>
    </div>
    <script> src="index.js"</script>
    
</body>
</html>