<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Your Feedback</title>
    <link rel="stylesheet" type="text/css" href="styles_0.css">
    <script src="script.js"></script>
</head>

<body>
    <div class="container">
        <header class="header">
            <h1 id="title" class="text-center">Thank You for Your Feedback</h1>
            <p id="description" class="description text-center">
                We greatly appreciate your valuable feedback.
            </p>
        </header>

        <div class="form-group text-center">
            <button id="show-results-btn" class="submit-button">Show Results</button>
        </div>

        <div id="results-container" class="form-results" style="display: none;">
            <h2>Survey Results</h2>
            <table>
                <tr>
                    <th>Statement</th>
                    <th>Responses</th>
                    <th>Percentage</th>
                </tr>
                <?php
                // Connexion à la base de données
                $servername = "127.0.0.1";
                $username = "phpmyadmin";
                $password = "password";
                $dbname = "db";
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Requête pour compter le nombre de lignes dans la table survey_data
                $stmt = $conn->query("SELECT COUNT(*) FROM survey_data");
                $total_participants = $stmt->fetchColumn();

                // Tableau associatif pour stocker les questions et leurs colonnes correspondantes dans la base de données
                $questions = array(
                    "Satisfaction with module content" => "user_recommend",
                    "Desired improvements" => "prefer",
                    "Preparedness for practical applications" => "os_prep",
                    "Future domain interest" => "most_like"
                );

                // Pour chaque question, compter les occurrences de chaque choix
                foreach ($questions as $question => $column) {
                    echo "<tr>";
                    echo "<td colspan='3'><strong>$question</strong></td>";
                    echo "</tr>";

                    // Compter les occurrences de chaque choix
                    $stmt = $conn->query("SELECT COUNT(*) AS count, $column FROM survey_data GROUP BY $column");
                    $total_responses = 0;
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $total_responses += $row['count'];
                    }

                    // Afficher les résultats
                    $stmt->execute();
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $percentage = ($row['count'] / $total_responses) * 100;
                        echo "<tr>";
                        echo "<td>" . $row[$column] . "</td>";
                        echo "<td>" . $row['count'] . "</td>";
                        echo "<td>" . number_format($percentage, 1) . "%</td>";
                        echo "</tr>";
                    }
                }
                
                echo "<tr class='total-row'>"
                . "<td>Total Participants</td>"
                . "<td colspan='2'>$total_participants</td>"
                . "</tr>";
                ?>
            </table>
        </div>
    </div>
</body>

</html>
