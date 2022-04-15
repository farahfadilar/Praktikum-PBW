<?php
if (isset($_POST['register'])) {
    include "connection.php";
    session_start();

    // Enkripsi menggunakan metode password_hash() masih belum berhasil.
    
    /* $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$password = password_hash($password, PASSWORD_DEFAULT);
					
    $sql = "INSERT INTO user(name, email, password) VALUES('$name', '$email', '$password')";
    $result = $conn->query($sql);
    
    if($result) {
        header('Location: login.php');
    } else {
        echo "Try again. Something went wrong<p><a href='register.php'>Register</a>" ;
    }

	$conn->close(); */

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hashing
    $password = sha1($password);

    $query = mysqli_query($conn, "SELECT email FROM user WHERE email='$email'");
    $data = mysqli_fetch_array($query);

    // Validasi
    if ($email == $data['email']) {
        $_SESSION['danger'] = "E-mail already used!";
        header("Location: register.php");
    } else {
            $create = mysqli_query($conn, "INSERT INTO user VALUES(null,'$name','$email','$password')");
            $_SESSION['name'] = $name;
            $_SESSION['success'] = "Congratulations " . $_SESSION['name'] . ", your registration was successful. Please login to enter!";
            header("Location: login.php");
    }
}
?>