<?php
// Configurazione del database
$servername = "localhost";
$username = "root"; // Nome utente di default di phpMyAdmin
$password = ""; // Password di default è vuota
$dbname = "GestioneUtenti";

// Connessione al server MySQL
$conn = new mysqli($servername, $username, $password);

// Verifica della connessione
if ($conn->connect_error) {
    die("Connessione al server MySQL fallita: " . $conn->connect_error);
}
echo "Connessione al server MySQL riuscita.<br>";

// Creazione del database
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Database '$dbname' creato con successo o già esistente.<br>";
} else {
    die("Errore durante la creazione del database: " . $conn->error);
}

// Selezione del database
$conn->select_db($dbname);

// Creazione della tabella Utenti
$sql = "CREATE TABLE IF NOT EXISTS Utenti (
    id_utente INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    tipo ENUM('prof', 'studente') NOT NULL,
    data_registrazione DATETIME DEFAULT CURRENT_TIMESTAMP
)";
if ($conn->query($sql) === TRUE) {
    echo "Tabella 'Utenti' creata con successo.<br>";
} else {
    echo "Errore durante la creazione della tabella 'Utenti': " . $conn->error . "<br>";
}

// Creazione della tabella Badge
$sql = "CREATE TABLE IF NOT EXISTS Badge (
    id_badge INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descrizione TEXT,
    difficolta ENUM('facile', 'medio', 'difficile') NOT NULL
)";
if ($conn->query($sql) === TRUE) {
    echo "Tabella 'Badge' creata con successo.<br>";
} else {
    echo "Errore durante la creazione della tabella 'Badge': " . $conn->error . "<br>";
}

// Creazione della tabella Badge_Utenti
$sql = "CREATE TABLE IF NOT EXISTS Badge_Utenti (
    id_badge_utente INT AUTO_INCREMENT PRIMARY KEY,
    id_utente INT NOT NULL,
    id_badge INT NOT NULL,
    data_ottenuto DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_utente) REFERENCES Utenti(id_utente),
    FOREIGN KEY (id_badge) REFERENCES Badge(id_badge)
)";
if ($conn->query($sql) === TRUE) {
    echo "Tabella 'Badge_Utenti' creata con successo.<br>";
} else {
    echo "Errore durante la creazione della tabella 'Badge_Utenti': " . $conn->error . "<br>";
}

// Creazione della tabella Statistiche_Studenti
$sql = "CREATE TABLE IF NOT EXISTS Statistiche_Studenti (
    id_statistica INT AUTO_INCREMENT PRIMARY KEY,
    id_utente INT UNIQUE NOT NULL,
    punteggio INT DEFAULT 0,
    livello VARCHAR(50),
    data_aggiornamento DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_utente) REFERENCES Utenti(id_utente)
)";
if ($conn->query($sql) === TRUE) {
    echo "Tabella 'Statistiche_Studenti' creata con successo.<br>";
} else {
    echo "Errore durante la creazione della tabella 'Statistiche_Studenti': " . $conn->error . "<br>";
}

// Creazione della tabella Log_Eventi
$sql = "CREATE TABLE IF NOT EXISTS Log_Eventi (
    id_evento INT AUTO_INCREMENT PRIMARY KEY,
    id_utente INT NOT NULL,
    azione VARCHAR(255) NOT NULL,
    data_evento DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_utente) REFERENCES Utenti(id_utente)
)";
if ($conn->query($sql) === TRUE) {
    echo "Tabella 'Log_Eventi' creata con successo.<br>";
} else {
    echo "Errore durante la creazione della tabella 'Log_Eventi': " . $conn->error . "<br>";
}

// Chiusura della connessione
$conn->close();
echo "Connessione chiusa.";
?>
