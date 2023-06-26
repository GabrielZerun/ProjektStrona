<?php
session_start();

// Połączenie z bazą danych
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Błąd połączenia z bazą danych: " . $conn->connect_error);
}

// Pobranie danych z formularza logowania
$username = $_POST['username'];
$password = $_POST['password'];

// Wyszukanie użytkownika w bazie danych
$query = "SELECT * FROM admini WHERE login = '$username'";
$result = $conn->query($query);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $hashedPassword = $row['haslo'];
    
    // Porównanie zahaszowanych haseł
    if (password_verify($password, $hashedPassword)) {
        // Użytkownik został znaleziony i hasło jest poprawne - zaloguj
        $_SESSION['username'] = $username;
        header("Location: strona_glowna.php"); // Przekieruj na stronę po zalogowaniu
        exit();
    } else {
        header("Location: logowanie.php");
        exit();
    }
} else {
    header("Location: logowanie.php");
    exit();
}

$conn->close();
?>