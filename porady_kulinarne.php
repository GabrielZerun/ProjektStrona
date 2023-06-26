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
    <title>Porady kulinarne</title>
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
            <h1>Porady kulinarne</h1>
            <p>Tutaj znajdziesz przydatne porady kuchenne, które pomogą Ci przygotować smaczne i zdrowe dania.</p>
            <br>

            <h3>Jak gotować ryż</h3>
            <img src="gotowanie_ryż.jpg" alt="ryz"><br>
            <p>Ryż to podstawa wielu dań, ale jego gotowanie może sprawiać trudności. Oto kilka wskazówek:</p>
            <ol>

                <li>Przed gotowaniem dokładnie opłucz ryż w zimnej wodzie.</li>
                <li>Użyj proporcji 2 części wody na 1 część ryżu.</li>
                <li>Gotuj na małym ogniu pod przykryciem przez około 18 minut.</li>
                <li>Po ugotowaniu pozostaw ryż pod przykryciem na 5-10 minut, aby nasiąknął parą.</li>

            </ol><br>

            <h3>Jak przygotować kurczaka</h3>
            <img src="kurczak.jpeg" alt="kurczak"><br>
            <p>Kurczak to jedno z najpopularniejszych mięs w kuchni. Oto kilka wskazówek na jego przygotowanie:</p>

            <ol>
                <li>Przed gotowaniem dokładnie umyj kurczaka i osusz go papierowym ręcznikiem.</li>
                <li>Aby mięso było soczyste, marynuj je przez kilka godzin w przyprawach.</li>
                <li>Gotuj na niskim ogniu pod przykryciem przez około 30-40 minut.</li>
                <li>Przed podaniem pozostaw mięso na kilka minut, aby nasiąkło sokami.</li>
            </ol><br>


            <h3> Porady do zup</h3>
            <img src="zupa.jpg" alt="zupa"><br>

            <ol>
                <li>Kiedy solimy zupy? Zupy powinniśmy solić dopiero pod koniec gotowania, a właściwie 1/3 czasu
                    przed zakończeniem procesu obróbki termicznej. Wyznacznikiem jest tu miękkość warzyw..</li>
                <li>Dodaj świeżą cytrynę: Świeża cytryna jest świetnym sposobem, aby dodać kwasowości i wzbogacić
                    smak zupy. Wyciśnij trochę soku z cytryny bezpośrednio do zupy lub dodaj plasterki cytryny do
                    zupy podczas gotowania.</li>
            </ol>

        </section>
    </main>



</body>

</html>