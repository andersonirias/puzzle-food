<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Bebida'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bebidas index large-9 medium-8 columns content">
    <h3><?= __('Bebidas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('valor') ?></th>
                <th scope="col"><?= $this->Paginator->sort('disponivel') ?></th>
                <th scope="col"><?= $this->Paginator->sort('categorias_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bebidas as $bebida): ?>
            <tr>
                <td><?= $this->Number->format($bebida->id) ?></td>
                <td><?= h($bebida->nome) ?></td>
                <td><?= $this->Number->format($bebida->valor) ?></td>
                <td><?= h($bebida->disponivel) ?></td>
                <td><?= $bebida->has('categoria') ? $this->Html->link($bebida->categoria->id, ['controller' => 'Categorias', 'action' => 'view', $bebida->categoria->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $bebida->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bebida->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bebida->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bebida->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
