<?php
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'dane4';

function people($server, $username, $password, $db) {
    $conn = mysqli_connect($server, $username, $password, $db);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT id, imie, nazwisko, rok_urodzenia, zdjecie FROM osoby LIMIT 30;";
    
    $result = mysqli_query($conn, $sql);
    
    

    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo $row["id"];
            echo ". ";
            echo $row["imie"];
            echo " ";
            echo $row["nazwisko"];
            echo " ";
            $rok = 2024;
            $wiek = $rok - $row["rok_urodzenia"];
            echo $wiek;
            echo " ";
            echo "lat";
            echo "<br>";
    }

    mysqli_close($conn);
    }
}
    function person($server, $username, $password, $db) {
    $conn2 = mysqli_connect($server, $username, $password, $db);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql2 = "SELECT imie, nazwisko, rok_urodzenia, opis, zdjecie FROM osoby, hobby WHERE osoby.Hobby_id = hobby.id AND osoby.id = ;";

    $result2 = mysqli_query($conn, $sql);

    mysqli_close($conn);
    }
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel administratora</title>
    <link rel="stylesheet" href="styl4.css">
</head>

<body>
    <header>
        <h3>Portal Społecznościowy - panel administratora</h3>
    </header>
    <main>
        <section id="left">
            <h4>Użytkownicy</h4>
            <?php
            people($server, $username, $password, $db);
            ?>
            <a href="setting.html">Inne ustawienia</a>
        </section>
        <section id="right">
            <h4>Podaj id użytkownika</h4>
            <form action="users.php" method="post">
                <input type="number">
                <input type="submit" value="ZOBACZ" id="send">
            </form>
            <hr>
            <?php
            person($server, $username, $password, $db)
            ?>
        </section>
    </main>
    <footer>Stronę wykonał: 00000000000</footer>
</body>

</html>