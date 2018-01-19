<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><h3><?= __('Menu') ?></h3></li>
	<li><?= $this->Html->link(__('Inicio'), ['controller' => 'Filapedidos','action' => 'index']) ?> </li>
	<li><?= $this->Html->link(__('Editar Prato'), ['action' => 'edit', $prato->id]) ?> </li>
        <li><?= $this->Html->link(__('Ingredientes'), ['controller' => 'Ingredientes','action' => 'index']) ?></li>
	<li><?= $this->Html->link(__('Pratos'), ['controller' => 'Pratos', 'action' => 'index']) ?></li>
	<li><?= $this->Html->link(__('Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
	<li><?= $this->Html->link(__('Meus dados'), ['controller' => 'estabelecimentos', 'action' => 'view', $estab]) ?></li>
    </ul>
</nav>
<div class="pratos view large-9 medium-8 columns content">
    <h3><?= h($prato->nome) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($prato->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Categoria') ?></th>
            <td><?= $prato->has('categoria') ? $this->Html->link($prato->categoria->id, ['controller' => 'Categorias', 'action' => 'view', $prato->categoria->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($prato->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Valor') ?></th>
            <td><?= $this->Number->format($prato->valor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Criação') ?></th>
            <td><?= h($prato->criacao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ativo') ?></th>
            <td><?= $prato->ativo ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Descrição') ?></h4>
        <?= $this->Text->autoParagraph(h($prato->descricao)); ?>
    </div>
</div>
