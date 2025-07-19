<table class="table">
    <caption>Usuários</caption>
    <thead>
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Ação</th>
            <th>Editar</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($users as $user): ?>
        <tr>
            <td data-label="Nome"><?= $user['nome']; ?></td>
            <td data-label="E-mail"><?= $user['email']; ?></td>
            <td data-label="Apagar"><a href="/user/delete/<?= $user['id'] ?>">Apagar</a></td>
            <td data-label="Editar"><a href="/user/<?= $user['id'] ?>">Editar</a></td>

        </tr>
        <?php endforeach; ?>
    </tbody>
</table>