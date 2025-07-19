<h2>Create</h2>

<?= getFlash('message'); ?>
<form action="/user/store" method="post">

    <input type="text" name="nome" placeholder="Seu nome">
    <?= getFlash('nome'); ?>
    <br>
    <br>
    <input type="text" name="email" placeholder="Seu e-mail">
    <?= getFlash('email'); ?>
    <br>
    <br>
    <input type="password" name="password" placeholder="Sua senha">
    <?= getFlash('password'); ?><br><br>
    <input type="submit" value="Inserir">
</form>