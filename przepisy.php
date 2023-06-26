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
    <title>Przepisy - Blog kulinarny</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Studenckie gotowanie</h1>
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
    <h1>Przepisy</h1>

    <?php
    // Połączenie z bazą danych
    $db_host = '127.0.0.1';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'blog';

    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    if ($conn->connect_error) {
        die("Błąd połączenia z bazą danych: " . $conn->connect_error);
    }

    // Pobranie przepisów z bazy danych
    $sql = "SELECT * FROM przepisy";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Wyświetlenie przepisów jako zdjęcia z linkiem do strony przepisu
        while ($row = $result->fetch_assoc()) {
            echo '<div class="przepis">';
            echo '<a href="strona_przepisu.php?id=' . $row["id"] . '"><img src="' . $row["zdjecie"] . '" alt="Przepis"></a>';
            echo '<p>Nazwa potrawy: ' . $row["nazwa_potrawy"] . '</p>';
            echo '<p><a href="strona_przepisu.php?id=' . $row["id"] . '">Czytaj więcej</a></p>';
            echo '</div>';
        }
    } else {
        echo "Brak przepisów do wyświetlenia.";
    }

    $conn->close();
    ?>
</body>

</html>
