<a href="gerirUsers.php"><button>Voltar</button></a>
<?php
require_once __DIR__ . '/Config.php';
require_once Config::getApplicationManagerPath(). 'userManager.php';

$userName = $_GET['username'];
$users = new userManager();
$user = $users->getUserByName($userName);
?>

<form action="./validarEditUser.php" method="post" name="alterar">
    <label>Username:<input type="text" value="<?php echo $user[0]['username'] ?>" name="username" required></label>
    <br>
    Escolha a acçao que pretende tomar
    <select name="estadoServer" required>
        <option value="registado">Registado</option>
        <option value="aprovado">Aprovado</option>
        <option value="banido">Banido</option>
    </select>
    <input type="submit" name="submitValue" value="Confirmar">
</form>