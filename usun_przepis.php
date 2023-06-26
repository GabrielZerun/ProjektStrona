<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: logowanie.php"); // Przekieruj na stronę logowania, jeśli nie jest zalogowany
    exit();
}

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
    <title>Usuń przepis - Blog kulinarny</title>
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
    <h1>Usuń przepis</h1>

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

    // Pobranie listy przepisów
    $sql = "SELECT * FROM przepisy";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<form action='" . $_SERVER['PHP_SELF'] . "' method='POST'>";
        echo "<select name='przepis_id'>";

        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['id'] . "'>" . $row['nazwa_potrawy'] . "</option>";
        }

        echo "</select>";
        echo "<button type='submit' name='submit'>Usuń przepis</button>";
        echo "</form>";
    } else {
        echo "Brak przepisów do wyświetlenia.";
    }

    if (isset($_POST['submit'])) {
        $przepis_id = $_POST['przepis_id'];

        // Sprawdzenie czy przepis istnieje
        $sql_check = "SELECT * FROM przepisy WHERE id = $przepis_id";
        $result_check = $conn->query($sql_check);

        if ($result_check->num_rows > 0) {
            // Usuwanie przepisu
            $sql_delete = "DELETE FROM przepisy WHERE id = $przepis_id";

            if ($conn->query($sql_delete) === TRUE) {
                echo "Przepis został usunięty.";
            } else {
                echo "Błąd podczas usuwania przepisu: " . $conn->error;
            }
        } else {
            echo "Nie znaleziono przepisu o podanym identyfikatorze.";
        }
    }

    $conn->close();
    ?>
</body>

</html>
