<?php
session_start();

// Sprawdzenie, czy administrator jest zalogowany
if (isset($_SESSION['username'])) {
    $menuLoginText = "Wyloguj";
    $menuLoginLink = "logout.php"; // Plik PHP, który obsługuje wylogowanie
    exit;
} else {
    $menuLoginText = "Logowanie";
    $menuLoginLink = "logowanie.php";
}

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Logowanie</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>
            Studenckie gotowanie
        </h1>
        <nav>
            <ul>
            <li><a href="strona_glowna.php">Główna</a></li>
                <li><a href="przepisy.php">Przepisy</a></li>
                <li><a href="o-mnie.php">O mnie</a></li>
                <li><a href="porady_kulinarne.php">Porady</a> </li>
                <li><a href="kontakt.php">Kontakt</a></li>
                <li><a href="rejestracja.php">Rejestruj</a></li> <!-- Nowa podstrona logowania -->
                <li class="login"><a href="<?php echo $menuLoginLink; ?>"><?php echo $menuLoginText; ?></a></li>
                <li><a href="<?php echo isset($_SESSION['username']) ? 'usun_przepis.php' : 'logowanie.php'; ?>">Usuwanie</a></li>
                <li><a href="<?php echo isset($_SESSION['username']) ? 'dodaj_przepis.php' : 'logowanie.php'; ?>">Dodawanie</a></li>
            </ul>
        </nav>
    </header>
    <h2>Logowanie</h2>
    <form action="login.php" method="post">
        <label for="username">Login:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Hasło:</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Zaloguj"><br>
    </form>
  
</body>

</html>
