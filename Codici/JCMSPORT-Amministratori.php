<?php
// Dati di esempio per gli amministratori
$admins = [
    ['id' => 1, 'nome' => 'Mario Rossi', 'email' => 'Fedrigo.Massimo@example.com', 'ruolo' => 'Super Admin'],
    ['id' => 2, 'nome' => 'Luigi Bianchi', 'email' => 'Ciaschini.Simone@example.com', 'ruolo' => 'Amministratore'],
    ['id' => 3, 'nome' => 'Carla Verdi', 'email' => 'Alam.Jubayed@example.com', 'ruolo' => 'Amministratore'],
];
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabella Amministratori</title>
    <style>
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .action-buttons {
            text-align: center;
        }
    </style>
</head>
<body>

<h2 style="text-align: center;">Tabella Amministratori</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Ruolo</th>
            <th>Azioni</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($admins as $admin): ?>
            <tr>
                <td><?php echo $admin['id']; ?></td>
                <td><?php echo $admin['nome']; ?></td>
                <td><?php echo $admin['email']; ?></td>
                <td><?php echo $admin['ruolo']; ?></td>
                <td class="action-buttons">
                    <a href="modifica.php?id=<?php echo $admin['id']; ?>">Modifica</a> |
                    <a href="elimina.php?id=<?php echo $admin['id']; ?>" onclick="return confirm('Sei sicuro di voler eliminare questo amministratore?')">Elimina</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>


