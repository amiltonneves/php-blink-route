<h2>Update</h2>

<?= getFlash('message'); ?>
<form action="/user/<?= $user['id']; ?>" method="post">

    <input type="text" name="nome" placeholder="Seu nome" value="<?= $user['nome']; ?>">
    <?= getFlash('nome'); ?>
    <br>
    <input type="email" name="email" placeholder="Seu email" value="<?= $user['email']; ?>">
    <br>
    <input type="submit" value="Salvar">
</form>