<?php
$servername = "mysql-service";
$username = "user";
$password = "secret";
$dbname = "db";

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check required fields
        if (empty($_POST['name']) || empty($_POST['email'])) {
            throw new Exception("Name and email are required fields.");
        }

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Create table if not exists
        $sql = "CREATE TABLE IF NOT EXISTS survey_data (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            age INT,
            user_recommend VARCHAR(20),
            prefer VARCHAR(255),
            os_prep INT,
            most_like VARCHAR(255),
            comment TEXT
        )";
        $conn->exec($sql);

        // Prepare SQL statement for insertion
        $stmt = $conn->prepare("INSERT INTO survey_data (name, email, age, user_recommend, prefer, os_prep, most_like, comment) 
                                VALUES (:name, :email, :age, :user_recommend, :prefer, :os_prep, :most_like, :comment)");

        // Bind parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':user_recommend', $user_recommend);
        $stmt->bindParam(':prefer', $prefer);
        $stmt->bindParam(':os_prep', $os_prep);
        $stmt->bindParam(':most_like', $most_like);
        $stmt->bindParam(':comment', $comment);

        // Set parameters and execute
        $name = $_POST['name'];
        $email = $_POST['email'];
        $age = isset($_POST['age']) ? $_POST['age'] : null;
        $user_recommend = $_POST['user-recommend'];
        $prefer = isset($_POST['prefer']) ? implode(',', $_POST['prefer']) : null;
        $os_prep = $_POST['osPrep'];
        $most_like = $_POST['mostLike'];
        $comment = $_POST['comment'];

        $stmt->execute();

        echo "Thank you for submitting the form!";
    } else {
        echo "Invalid request method.";
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
} catch(Exception $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>
