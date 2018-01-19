<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Filaentrega'), ['action' => 'edit', $filaentrega->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Filaentrega'), ['action' => 'delete', $filaentrega->id], ['confirm' => __('Are you sure you want to delete # {0}?', $filaentrega->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Filaentregas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Filaentrega'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="filaentregas view large-9 medium-8 columns content">
    <h3><?= h($filaentrega->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($filaentrega->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Observacoes') ?></th>
            <td><?= h($filaentrega->observacoes) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pedido') ?></th>
            <td><?= $filaentrega->has('pedido') ? $this->Html->link($filaentrega->pedido->id, ['controller' => 'Pedidos', 'action' => 'view', $filaentrega->pedido->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($filaentrega->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Posicao') ?></th>
            <td><?= $this->Number->format($filaentrega->posicao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Chegada') ?></th>
            <td><?= h($filaentrega->chegada) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Saida') ?></th>
            <td><?= h($filaentrega->saida) ?></td>
        </tr>
    </table>
</div>
