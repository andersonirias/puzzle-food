<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><h3><?= __('Menu') ?></h3></li>
	<li><?= $this->Html->link(__('Inicio'), ['controller' => 'Filapedidos','action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Novo Ingrediente'), ['action' => 'add']) ?></li>
	<li><?= $this->Html->link(__('Pratos'), ['controller' => 'Pratos', 'action' => 'index']) ?></li>
	<li><?= $this->Html->link(__('Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
	<li><?= $this->Html->link(__('Meus dados'), ['controller' => 'estabelecimentos', 'action' => 'view', $estab]) ?></li>
    </ul>
</nav>
<div class="ingredientes index large-9 medium-8 columns content">
    <h3><?= __('Ingredientes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('estoque') ?></th>
                <th scope="col"><?= $this->Paginator->sort('criação') ?></th>
                <th scope="col"><?= $this->Paginator->sort('valor') ?></th>
                <th scope="col"><?= $this->Paginator->sort('categorias_id') ?></th>
                <th scope="col" class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ingredientes as $ingrediente): ?>
            <tr>
                <td><?= $this->Number->format($ingrediente->id) ?></td>
                <td><?= h($ingrediente->nome) ?></td>
                <td><?= $this->Number->format($ingrediente->estoque) ?></td>
                <td><?= h($ingrediente->criacao) ?></td>
                <td><?= $this->Number->format($ingrediente->valor) ?></td>
                <td><?= $ingrediente->has('categoria') ? $this->Html->link($ingrediente->categoria->id, ['controller' => 'Categorias', 'action' => 'view', $ingrediente->categoria->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $ingrediente->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $ingrediente->id]) ?>
                    <?= $this->Form->postLink(__('Excluir'), ['action' => 'delete', $ingrediente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ingrediente->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Próximo') . ' >') ?>
        </ul>
    </div>
</div>
