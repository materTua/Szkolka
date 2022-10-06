<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="K">

    <link rel="stylesheet" href="styl_1.css">

    <title>Wędkowanie</title>
</head>
<body>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db_name = "wedkowanie";

        $conn = new mysqli($servername, $username, $password, $db_name);

        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        /* echo "Connected successfully"; */
        $query1 = "SELECT ryby.nazwa, lowisko.akwen, lowisko.wojewodztwo FROM ryby LEFT JOIN lowisko ON ryby.id = lowisko.Ryby_id WHERE lowisko.rodzaj=2";
        $result1 = $conn->query($query1);

        $query2 = "SELECT * FROM ryby WHERE styl_zycia = 1;";
        $result2 = $conn->query($query2);
    ?>
    <header>
        <h1>Portal dla wędkarzy</h1>
    </header>
    <main>
        <article>
            <section class="left">
                <h3>Ryby zamieszkujące rzeki</h3>
                <ol>
                    <?php
                        if($result1 -> num_rows > 0){
                            while($row = $result1 -> fetch_assoc()){
                                echo("<li>" . $row["nazwa"] . " pływa w rzece " . $row["akwen"] . ", " . $row["wojewodztwo"] . "</li>");
                            }
                        }
                    ?>
                </ol>
            </section>
            <section class="left">
                <h3>Ryby drapieżne naszych wód</h3>
                <table>
                    <tr>
                        <td><b>L.p</b></td>
                        <td><b>Gatunek</b></td>
                        <td><b>Występowanie</b></td>
                    </tr>
                    <?php
                        if($result2 -> num_rows > 0){
                            while($row = $result2 -> fetch_assoc()){
                                echo("<tr>" . "<td>" . $row["id"] . "</td>" . "<td>" . $row["nazwa"] . "</td>" . "<td>" . $row["wystepowanie"] . "</td>" . "</tr>");
                            }
                        }
                    ?>
                </table>
            </section>
        </article>
        <section id="img">
            <img src="ryba1.jpg" alt="">
            <br>
            <a href="kwerendy.txt">Pobierz kwerendy</a>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: 00000000000</p>
    </footer>
</body>
</html>