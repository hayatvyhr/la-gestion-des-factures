<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<style>
 body {
    background-image: url("img/5594016-e1656071131636.webp");
    background-position: center;
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
        }
  


.login-box {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  width: 400px;
  padding: 15px;
  height: 400px;
 
background: rgba(255, 255, 255, 0.2);
border-radius: 16px;
box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
backdrop-filter: blur(5px);
-webkit-backdrop-filter: blur(5px);
border: 1px solid rgba(255, 255, 255, 0.3);
  border: 1px solid #ddd;
  margin: 0 auto;

  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}
.login-box h2 {
  color: #3c44a9;
  text-align: center;
  margin-bottom: 20px;
  font-size: 55px;
}


.login-box label {
    display: block;
    margin-bottom: 10px;
}

.login-box input[type="text"], .login-box input[type="password"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
}

.login-box input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #3c44a9;
    color: white;
    font-size: 20px;
    border-radius: 5rem;
    cursor: pointer;
}

.login-box input[type="submit"]:hover {
    background-color:#9c9d97;
}
</style>
<?php
$host = 'localhost';
$dbname = 'gestionclfr';
$username = 'root';
$password = '';
session_start();

if (isset($_POST['valider'])) {
    $nom = $_POST['username'];
    $pass = $_POST['password'];

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $query = "SELECT * FROM client WHERE username = :username";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':username', $nom);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            $data = $stmt->fetch();

            if (password_verify($pass, $data['password'])) {
                $_SESSION["username"] = $data['username'];
                $_SESSION["client_id"] = $data['id_client']; 
                header("Location: clientdash.php?id=".$data['id_client']);
                exit();
            } else {
                // If the password is not hashed, check directly
                if ($pass == $data['password']) {
                    $_SESSION["username"] = $data['username'];
                    $_SESSION["client_id"] = $data['id_client']; 
                    header("Location: clientdash.php?id=".$data['id_client']);
                    exit();
                } else {
                    echo "<script> alert('Login failed. Invalid username or password.');</script>";
                }
            }
        } else {
            echo "<script> alert('Login failed. Invalid username or password.');</script>";
        }
        
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
//fournisseur
if (isset($_POST['valider'])) {
    $nom = $_POST['username'];
    $pass = $_POST['password'];

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $query = "SELECT * FROM fournisseur WHERE username = :username";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':username', $nom);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            $data = $stmt->fetch();

            if (password_verify($pass, $data['password'])) {
                $_SESSION["username"] = $data['username'];
                $_SESSION["id_four"] = $data['id_four']; 
                header("Location: fourndash.php");
                exit();
            } else {
                // If the password is not hashed, check directly
                if ($pass == $data['password']) {
                    $_SESSION["username"] = $data['username'];
                    $_SESSION["id_four"] = $data['id_four']; 
                    header("Location: fourndash.php");
                    exit();
                } else {
                    echo "<script> alert('Login failed. Invalid username or password.');</script>";
                }
            }
        } else {
            echo "<script> alert('Login failed. Invalid username or password.');</script>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>








<body>
    <div class="login-box">
        <h2>Login</h2>
        <form action="" method="post">
            <label for="username">Username:</label>

            <input type="text" id="username" name="username">

            <label for="password">Password:</label>

            <input type="password" id="password" name="password">

            <input type="submit"  name = "valider" value="Submit">
            <a href="index.php">index</a>
        </form>
    </div>
</body>
</html>
