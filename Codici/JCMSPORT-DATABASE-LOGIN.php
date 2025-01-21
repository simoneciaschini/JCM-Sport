<?php
// Parametri di connessione al database
$host = "localhost";
$username = "root";
$password = ""; // Modifica con la password del tuo database, se necessario

try {
    // Connessione al server MySQL
    $conn = new PDO("mysql:host=$host", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Creazione del database jcm_sport
    $sql = "CREATE DATABASE IF NOT EXISTS jcm_sport";
    $conn->exec($sql);
    echo "Database creato con successo!\n";

    // Connessione al database jcm_sport
    $conn->exec("USE jcm_sport");

    // Creazione della tabella utenti
    $sql = "CREATE TABLE IF NOT EXISTS utenti (
        id INT AUTO_INCREMENT PRIMARY KEY,
        mail VARCHAR(255) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        tipologia ENUM('amministratore', 'studente') NOT NULL
    )";
    $conn->exec($sql);
    echo "Tabella 'utenti' creata con successo!\n";
} catch (PDOException $e) {
    echo "Errore: " . $e->getMessage();
}

// Chiudere la connessione
$conn = null;
?>