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
    <title>Rejestracja administratora</title>
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
    <h2>Rejestracja administratora</h2>
    <form action="rejestracja.php" method="post">
        <label for="imie">Imię:</label>
        <input type="text" id="imie" name="imie" required><br>

        <label for="nazwisko">Nazwisko:</label>
        <input type="text" id="nazwisko" name="nazwisko" required><br>

        <label for="login">Login:</label>
        <input type="text" id="login" name="login" required><br>

        <label for="haslo">Hasło:</label>
        <input type="password" id="haslo" name="haslo" required><br>

        <label for="id_adresu">ID adresu:</label>
        <input type="text" id="id_adresu" name="id_adresu" required><br>

        <label for="data_urodzenia">Data urodzenia:</label>
        <input type="date" id="data_urodzenia" name="data_urodzenia" required><br>

        <input type="submit" name="register" value="Zarejestruj"><br>
    </form>
    <?php
    // Funkcja do hashowania hasła
    function hashPassword($password) {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    // Funkcja do rejestracji nowego administratora
    function registerAdmin($imie, $nazwisko, $login, $haslo, $id_adresu, $data_urodzenia) {
        // Połączenie z bazą danych
        $db_host = '127.0.0.1';
        $db_user = 'root';
        $db_pass = '';
        $db_name = 'blog';

        $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

        // Sprawdź, czy istnieje już administrator o podanym loginie w bazie danych
        $query = $conn->prepare("SELECT * FROM admini WHERE login = :login");
        $query->bindParam(':login', $login);
        $query->execute();

        if ($query->rowCount() > 0) {
            // Administrator o podanym loginie już istnieje
            return false;
        }

        // Haszuj hasło
        $hashedPassword = hashPassword($haslo);

        // Wstaw dane nowego administratora do bazy danych
        $query = $conn->prepare("INSERT INTO admini (imie, nazwisko, login, haslo, id_adresu, data_urodzenia) VALUES (:imie, :nazwisko, :login, :haslo, :id_adresu, :data_urodzenia)");
        $query->bindParam(':imie', $imie);
        $query->bindParam(':nazwisko', $nazwisko);
        $query->bindParam(':login', $login);
        $query->bindParam(':haslo', $hashedPassword);
        $query->bindParam(':id_adresu', $id_adresu);
        $query->bindParam(':data_urodzenia', $data_urodzenia);
        $query->execute();

        // Zamknij połączenie z bazą danych
        $conn = null;

        return true; // Rejestracja zakończona sukcesem
    }

    // Przykładowe użycie funkcji rejestracji
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['register'])) {
            $imie = $_POST['imie'];
            $nazwisko = $_POST['nazwisko'];
            $login = $_POST['login'];
            $haslo = $_POST['haslo'];
            $id_adresu = $_POST['id_adresu'];
            $data_urodzenia = $_POST['data_urodzenia'];

            if (registerAdmin($imie, $nazwisko, $login, $haslo, $id_adresu, $data_urodzenia)) {
                // Rejestracja powiodła się
                header("Location: logowanie.php");
                exit;
            } else {
                // Administrator o podanym loginie już istnieje
                echo "Administrator o podanym loginie już istnieje.";
            }
        }
    }
    ?>
</body>

</html>
