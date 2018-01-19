<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><h3><?= __('Menu') ?></h3></li>
        <li><?= $this->Html->link(__('Novo Pedido'), ['controller' => 'Pedidos','action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Meus Endereços'), ['controller' => 'Enderecos', 'action' => 'index', $id]) ?></li>
        <li><?= $this->Html->link(__('Meus Dados'), ['controller' => 'Consumidores', 'action' => 'view', $id]) ?></li>
    </ul>
</nav>
<div class="filapedidos index large-9 medium-8 columns content">
    <h3><?= __('Meus Pedidos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Observações') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Ultima Alteração') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Detalhes') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($filapedidos as $filapedido): ?>
            <tr>
                <td><?= h($filapedido->status) ?></td>
                <td><?= h($filapedido->observacoes) ?></td>
                <td><?= h($filapedido->saida) ?></td>
                <td><?= $filapedido->has('pedido') ? $this->Html->link($filapedido->pedido->id, ['controller' => 'Pedidos', 'action' => 'view', $filapedido->pedido->id]) : '' ?></td>
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

