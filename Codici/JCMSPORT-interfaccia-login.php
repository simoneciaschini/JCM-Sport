<?php
// Inizializzazione variabili di errore
$error = '';

// Esempio di un array di utenti registrati. In una vera applicazione, dovresti utilizzare un database.
$users = [
    'user@example.com' => 'password123',  // La chiave è l'email, e il valore è la password
];

// Controlla se il modulo è stato inviato
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recupera i dati dal modulo
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Verifica se l'email esiste
    if (array_key_exists($email, $users)) {
        // Verifica se la password è corretta
        if ($users[$email] === $password) {
            // Reindirizza alla home page se i dati sono corretti
            header('Location: HomePage.html');
            exit();
        } else {
            // Password errata
            $error = 'Password errata.';
        }
    } else {
        // Email non trovata
        $error = 'Email non registrata.';
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    
    <!-- Form di login -->
    <form action="login.php" method="post">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Login">
    </form>

    <!-- Bottone per la registrazione -->
    <form action="JCMSPORT-registrazione.php" method="get">
        <br>
        <button type="submit">Registrati</button>
    </form>
    
    <!-- Messaggio di errore, se presente -->
    <?php if ($error): ?>
        <p style="color:red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>
</body>
</html>
