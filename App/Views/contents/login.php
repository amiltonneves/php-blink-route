<?php if (!logged()): ?>
    <?= getFlash('message'); ?>
    <form action="/login" method="post">
        <input type="email" name="email" placeholder="email@email.com" style="font-size:20px"><br><br>
        <input type="password" name="password" placeholder="Senha" style="font-size:20px"><br><br>
        <input type="submit" value="Logar" style="font-size:20px">
    </form>

<?php else: ?>
    <h2>Usuário já está logado!</h2>
<?php endif; ?>