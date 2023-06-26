<?php
session_start();

// Sprawdzenie, czy administrator jest zalogowany
if (isset($_SESSION['username'])) {
    $menuLoginText = "Wyloguj";
    $menuLoginLink = "logout.php"; // Plik PHP, który obsługuje wylogowanie
} else {
    $menuLoginText = "Logowanie";
    $menuLoginLink = "logowanie.php";
}
?>

<!DOCTYPE HTML>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>O mnie</title>

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
    <div class="text">
        <h1>O mnie</h1>
        <p>Cześć. Nazywam się Marian Pryncypałka.</p>
        <p>Na co dzień jestem studentem informatyki.</p>
        <p>Uwielbiam gotować i eksperymentować w kuchni</p>
        <p>Chcę się dzielić swoimi pomysłami na proste, smaczne i tanie
            dania, które można przygotować na studenckim kotlecie.</p>

        <h2>Kontakt</h2>
        <p>Jeśli masz pytania, sugestie lub chcesz podzielić się swoimi przepisami, napisz do mnie przez formularz
            kontaktowy na mojej stronie lub na adres [adres e-mail].</p>
    </div>
    <div class="images">
        <img src="autorbloga.jpg" alt="zdjęcie autora bloga">
        <img src="student.jpg" alt="drugie zdjęcie">
    </div>
</body>

</html>