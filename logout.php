<?php
session_start();

// Usunięcie danych sesji
session_unset();
session_destroy();

// Przekierowanie na stronę logowania
header("Location: logowanie.php");
exit();
?>