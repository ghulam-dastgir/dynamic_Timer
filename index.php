<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <title>Attendence | Login</title>
</head>
<body>
    <div class="main-div">
        <div class="login bg-light">
            <?php
            include("config.php");
            session_start();
            if(isset($_POST['submit'])){
                $sql = "SELECT * FROM agents WHERE a_name = '{$_POST['name']}' AND a_password = '{$_POST['pass']}'";
                $result = $conn->query($sql);
                if($result->num_rows == 1){
                    while($row = $result->fetch_assoc()){
                        $_SESSION['agent_id'] = $row['a_id'];
                        $_SESSION['agent_name'] = $row['a_name'];
                        header("Location: employee.php");
                    }
                }
            }
            ?>
            <form action="" method="POST">
                <input type="text" name="name" class="form-control mb-2" placeholder="Name">
                <input type="password" name="pass" class="form-control" placeholder="Password">
                <input type="submit" name="submit" value="Login" class="btn btn-sm btn-primary mt-2">
            </form>
        </div>
    </div>
</body>
</html>