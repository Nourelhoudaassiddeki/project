
<?php include('connectlogin.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
        if (isset($_POST["submit"])) {
           $fullName = $_POST["fullname"];
           $email = $_POST["email"];
           $password = $_POST["password"];
           $passwordRepeat = $_POST["repeat_password"];
           
           $passwordHash = password_hash($password, PASSWORD_DEFAULT);

           $errors = array();
           
           if (empty($fullName) OR empty($email) OR empty($password) OR empty($passwordRepeat)) {
            array_push($errors,"All fields are required");
           }
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");
           }
           if (strlen($password)<8) {
            array_push($errors,"Password must be at least 8 characters long");
           }
           if ($password !== $passwordRepeat) {
            array_push($errors,"Password does not match");
           }
           
           // Prepared statement to check if email exists
           $sql = "SELECT * FROM users WHERE email = ?";
           $stmt = mysqli_stmt_init($conn);
           if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, "s", $email);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);

                $rowCount = mysqli_stmt_num_rows($stmt);
                if ($rowCount > 0) {
                    array_push($errors, "Email already exists!");
                }
            } else {
                array_push($errors, "Database error!");
            }

           if (count($errors) > 0) {
            foreach ($errors as $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
           } else {
            
            // Prepared statement to insert user data
            $sql = "INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt,"sss",$fullName, $email, $passwordHash);
                mysqli_stmt_execute($stmt);
         header("location:login.php");
            } else {
                die("Something went wrong");
            }
           }
        }
        ?>
        <form action="register.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="fullname" placeholder="Full Name:">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email:">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password:">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password:">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Register" name="submit">
            </div>
            <div>
                <p>Already Registered? <a href="login.php">Login Here</a></p>
            </div>
        </form>
    </div>
</body>
</html>
<style>
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Poppins', sans-serif;
  background: linear-gradient(135deg, #B0C4DE, #F5F5DC); /* Blue and beige */
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
}

.container {
  position: relative;
  width: 100%; /* Full width */
  max-width: 450px; /* Max width for larger screens */
  padding: 20px; /* Padding around the container */
  background: #ffffff;
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.register-form {
  padding: 30px;
  border: 1px solid #d1d1d1;
  border-radius: 10px;
  background: #f9f9f9;
  box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}

h2 {
  color: #3a3a3a;
  margin-bottom: 30px;
  font-size: 24px;
  text-align: center;
}

.form-group {
  position: relative;
  margin-bottom: 20px;
}

.form-group input {
  width: 100%; /* Ensure full width of input fields */
  padding: 12px;
  background: #f1f1f1;
  border: 1px solid #ccc;
  border-radius: 10px;
  outline: none;
  transition: background 0.3s ease;
  font-size: 16px;
}

.form-group input:focus {
  background: #e8e8e8;
  border-color: #5a8fbe;
}

input[type="submit"] {
  width: 100%; /* Full width for the submit button */
  padding: 12px;
  background: #5a8fbe;
  color: white;
  border: none;
  border-radius: 10px;
  cursor: pointer;
  transition: background 0.3s ease;
  font-size: 16px;
}

input[type="submit"]:hover {
  background: #4778a6;
}

.links {
  margin-top: 10px;
  text-align: center;
}

.links a {
  color: #5a8fbe;
  text-decoration: none;
  font-size: 14px;
}

.alert {
  margin-bottom: 20px;
}

</style>