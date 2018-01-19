<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pedido Entity
 *
 * @property int $id
 * @property float $valor
 * @property bool $entrega
 * @property string $form_pagamento
 * @property \Cake\I18n\Time $criacao
 * @property string $observacoes
 * @property \Cake\I18n\Time $alteracao
 * @property int $consumidores_id
 *
 * @property \App\Model\Entity\Consumidore $consumidore
 */
class Pedido extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
