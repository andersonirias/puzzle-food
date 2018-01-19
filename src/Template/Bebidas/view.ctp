<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Bebida'), ['action' => 'edit', $bebida->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Bebida'), ['action' => 'delete', $bebida->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bebida->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Bebidas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bebida'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="bebidas view large-9 medium-8 columns content">
    <h3><?= h($bebida->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($bebida->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Disponivel') ?></th>
            <td><?= h($bebida->disponivel) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Categoria') ?></th>
            <td><?= $bebida->has('categoria') ? $this->Html->link($bebida->categoria->id, ['controller' => 'Categorias', 'action' => 'view', $bebida->categoria->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($bebida->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Valor') ?></th>
            <td><?= $this->Number->format($bebida->valor) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Descricao') ?></h4>
        <?= $this->Text->autoParagraph(h($bebida->descricao)); ?>
    </div>
</div>
