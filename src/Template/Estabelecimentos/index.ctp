<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Estabelecimento'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="estabelecimentos index large-9 medium-8 columns content">
    <h3><?= __('Estabelecimentos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('razao_social') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cnpj') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ramo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rua') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bairro') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cidade') ?></th>
                <th scope="col"><?= $this->Paginator->sort('numero') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('site') ?></th>
                <th scope="col"><?= $this->Paginator->sort('telefone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('criacao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('alteracao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('entrega') ?></th>
                <th scope="col"><?= $this->Paginator->sort('login') ?></th>
                <th scope="col"><?= $this->Paginator->sort('senha') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($estabelecimentos as $estabelecimento): ?>
            <tr>
                <td><?= $this->Number->format($estabelecimento->id) ?></td>
                <td><?= h($estabelecimento->nome) ?></td>
                <td><?= h($estabelecimento->razao_social) ?></td>
                <td><?= h($estabelecimento->cnpj) ?></td>
                <td><?= h($estabelecimento->ramo) ?></td>
                <td><?= h($estabelecimento->rua) ?></td>
                <td><?= h($estabelecimento->bairro) ?></td>
                <td><?= h($estabelecimento->cidade) ?></td>
                <td><?= $this->Number->format($estabelecimento->numero) ?></td>
                <td><?= h($estabelecimento->email) ?></td>
                <td><?= h($estabelecimento->site) ?></td>
                <td><?= h($estabelecimento->telefone) ?></td>
                <td><?= h($estabelecimento->criacao) ?></td>
                <td><?= h($estabelecimento->alteracao) ?></td>
                <td><?= h($estabelecimento->entrega) ?></td>
                <td><?= h($estabelecimento->login) ?></td>
                <td><?= h($estabelecimento->senha) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $estabelecimento->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $estabelecimento->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $estabelecimento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $estabelecimento->id)]) ?>
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
