<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><h3><?= __('Menu') ?></h3></li>
	<li><?= $this->Html->link(__('Inicio'), ['controller' => 'Filapedidos','action' => 'index']) ?> </li>
	<li><?= $this->Html->link(__('Novo Prato'), ['controller' => 'Pratos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Ingredientes'), ['controller' => 'Ingredientes','action' => 'index']) ?></li>
	<li><?= $this->Html->link(__('Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
	<li><?= $this->Html->link(__('Meus dados'), ['controller' => 'estabelecimentos', 'action' => 'view', $estab]) ?></li>
    </ul>
</nav>
<div class="pratos index large-9 medium-8 columns content">
    <h3><?= __('Pratos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Valor') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Nome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Criação') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Descrição') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Categoria') ?></th>
                <th scope="col" class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pratos as $prato): ?>
            <tr>
                <td><?= $this->Number->format($prato->id) ?></td>
                <td><?= $this->Number->format($prato->valor) ?></td>
                <td><?= h($prato->nome) ?></td>
                <td><?= h($prato->criacao) ?></td>
                <td><?= h($prato->descricao) ?></td>
                <td><?= $prato->has('categoria') ? $this->Html->link($prato->categoria->id, ['controller' => 'Categorias', 'action' => 'view', $prato->categoria->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $prato->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $prato->id]) ?>
                    <?= $this->Form->postLink(__('Excluir'), ['action' => 'delete', $prato->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prato->id)]) ?>
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
