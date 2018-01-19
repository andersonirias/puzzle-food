<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><h3><?= __('Menu') ?></h3></li>
	<li><?= $this->Html->link(__('Editar meus Dados'), ['action' => 'edit', $consumidore->id]) ?> </li>
        <li><?= $this->Html->link(__('Novo Pedido'), ['controller' => 'Pedidos','action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Meus Endereços'), ['controller' => 'Enderecos', 'action' => 'index', $id]) ?></li>
    </ul>
</nav>
<div class="consumidores view large-9 medium-8 columns content">
    <h3><?= h($consumidore->nome) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($consumidore->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($consumidore->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Login') ?></th>
            <td><?= h($consumidore->login) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cpf') ?></th>
            <td><?= $this->Number->format($consumidore->cpf) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefone') ?></th>
            <td><?= $this->Number->format($consumidore->telefone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nascimento') ?></th>
            <td><?= h($consumidore->nascimento) ?></td>
        </tr>
    </table>
</div>
