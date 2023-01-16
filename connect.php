<?
$email = filter_input(INPUT_POST, "email");
$password = filter_input(INPUT_POST, "password");
if(!empty($email) | !empty($password)){
    $host = "localhost";
    $DBURL = "jdbc:mysql://localhost:3306/student_db";
    $USERNAME = "root";
    $PASSWORD = "Apple@0827";
    $driver = "com.mysql.cj.jdbc.Driver";
    // $dbName = "student_db";
    $conn = new mysqli($host, $USERNAME, $password, $DBURL);
    if(mysqli_connect_error()){
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }else{
        $sql = "INSERT INTO reg(email, password) values('$email', '$password')";
        if($conn->query($sql)){
            echo "New record is added successfully";
        }else{
            echo "Error : ", $sql."<br>".$conn->error;
        }
        $conn->close();
    }

}else{
    echo "Uersemail & password should not be empty...";
    die();
}
?>