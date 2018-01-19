<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Mesa'), ['action' => 'edit', $mesa->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Mesa'), ['action' => 'delete', $mesa->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mesa->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Mesas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mesa'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Estabelecimentos'), ['controller' => 'Estabelecimentos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Estabelecimento'), ['controller' => 'Estabelecimentos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="mesas view large-9 medium-8 columns content">
    <h3><?= h($mesa->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Estabelecimento') ?></th>
            <td><?= $mesa->has('estabelecimento') ? $this->Html->link($mesa->estabelecimento->id, ['controller' => 'Estabelecimentos', 'action' => 'view', $mesa->estabelecimento->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($mesa->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quant Pessoas') ?></th>
            <td><?= $this->Number->format($mesa->quant_pessoas) ?></td>
        </tr>
    </table>
</div>
