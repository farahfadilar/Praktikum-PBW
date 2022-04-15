<?php
if (isset($_POST['login'])) {
    include "connection.php";
    session_start();

    // Enkripsi menggunakan metode password_hash() masih belum berhasil.

    /* $email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT email, password FROM user WHERE email = '$email'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc(); // output data tiap row

    if ($result->num_rows == 1 && $email==$row['email'] && password_verify($password, $row['password']) ) {
        $_SESSION['name'] = $row['name'];
        $_SESSION['success'] = "Welcome " . $_SESSION['name'] . " to the Dashboard Page!";
        header('Location: index.php');
    } else {
        header('Location: login.php');
    } */

    // end of isset
    /* $conn->close(); */

    $email = $_POST['email'];
    $password = $_POST['password']; 

    // Hashing
    $password = sha1($password);

    $query = mysqli_query($conn, "SELECT * FROM user WHERE email='$email' AND password='$password'");
    $data = mysqli_fetch_array($query);

    if (mysqli_num_rows($query) > 0) {
        $_SESSION['name'] = $data['name'];
        $_SESSION['success'] = "Welcome " . $_SESSION['name'] . " to the Dashboard Page!";
        header("Location: index.php");
    } else {
        $_SESSION['danger'] = "Login failed, wrong password!";
        header("Location: login.php");
    }
}
?>