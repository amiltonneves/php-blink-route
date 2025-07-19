<header>
    <a href="/" class="button">Home</a>

    <?php if (!logged()): ?>
    <a href="/login" class="button">Login</a>

    <?php elseif (logged()): ?>
    <a href="/logout" class="button">Logout</a>
    <a href="/user/create" class="button">Create</a>


    <?php endif; ?>
</header>

<div id="status_login">
    <?php if (logged()): ?>
    <h3 class="name"><mark class="inline-block"><?= user()['nome'] ?></mark></h3>

    <?php else: ?>
    <h3 class="name"><mark class="secondary">Visitante</mark></h3>

    <?php endif; ?>
</div>