<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Filaentrega Entity
 *
 * @property int $id
 * @property \Cake\I18n\Time $chegada
 * @property string $status
 * @property string $observacoes
 * @property int $posicao
 * @property \Cake\I18n\Time $saida
 * @property int $pedidos_id
 *
 * @property \App\Model\Entity\Pedido $pedido
 */
class Filaentrega extends Entity
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