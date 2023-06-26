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

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

// Połączenie z bazą danych
$conn = new mysqli($servername, $username, $password, $dbname);

// Sprawdzenie połączenia
if ($conn->connect_error) {
    die("Błąd połączenia z bazą danych: " . $conn->connect_error);
}

// Pobranie wartości parametru "id" z linku
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Pobranie danych z bazy danych
    $sql = "SELECT * FROM przepisy WHERE id = $id";
    $result = $conn->query($sql);

    // Sprawdzenie, czy znaleziono ogłoszenie
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nazwa_potrawy = $row['nazwa_potrawy'];
        $czas_przygotowania = $row['czas_przygotowania'];
        $skladniki = $row['skladniki'];
        $sposob_przygotowania = $row['sposob_przygotowania'];
        $kalorie = $row['kalorie'];
        $zdjecie = $row['zdjecie'];
    } else {
        echo "Brak dostępnych ogłoszeń.";
    }
} else {
    echo "Nieprawidłowy parametr ID ogłoszenia.";
}

$conn->close();
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
        <img src="<?php echo $zdjecie; ?>" alt="zdjecie">
        <table>
            <thead>
                <tr>
                    <th>Nazwa potrawy</th>
                    <th>Czas przygotowania</th>
                    <th>Składniki</th>
                    <th>Sposob przygotowania</th>
                    <th>Kalorie</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $nazwa_potrawy; ?></td>
                    <td><?php echo $czas_przygotowania; ?></td>
                    <td><?php echo $skladniki; ?></td>
                    <td><?php echo $sposob_przygotowania; ?></td>
                    <td><?php echo $kalorie; ?></td>
                </tr>
            </tbody>
        </table>
    </main>
</body>
</html>