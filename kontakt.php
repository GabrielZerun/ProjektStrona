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
    <title>Kontakt - Blog Kulinarny</title>
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
    <h1>Kontakt</h1>
    <main>
        <p>Jeśli masz jakieś pytania, uwagi lub sugestie, skontaktuj się z nami za pomocą poniższego formularza:</p>

        <!--Atrybut "action" określa adres e-mail, na który zostanie wysłana wiadomość po wciśnięciu przycisku "Wyślij".
        Atrybut "method" określa metodę, za pomocą której będą przesyłane dane, w tym przypadku używamy metody "POST".
        Atrybut "enctype" określa sposób kodowania danych przesyłanych w formularzu, w tym przypadku używamy
        "text/plain".-->

        <form action="mailto:twoj@mail.com" method="post" enctype="text/plain">
            <label for="name">Imię:</label>
            <input type="text" id="name" name="name" required><br><br>
            <label for="email">Adres e-mail:</label>
            <input type="email" id="email" name="email" required><br><br>
            <label for="message">Wiadomość:</label><br>
            <textarea id="message" name="message" rows="10" cols="50" required></textarea><br><br>
            <input type="submit" value="Wyślij">
        </form>
    </main>


</body>

</html>