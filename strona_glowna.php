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

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Studenckie gotowanie</title>
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
    <main>
        <section>
            <h3>Witaj na moim blogu Studenckie gotowanie!</h3>
            <p>Tutaj znajdziesz przepisy odpowiednie do studenckich warunków.</p>
            <p>Zapraszam śmiało do kontaktu ze mną drogą mailową, a być może Twój przepis niedługo wyląduje na
                moim blogu.</p>
        </section>
    </main>

</body>

</html>
