<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Estabelecimento Entity
 *
 * @property int $id
 * @property string $nome
 * @property string $razao_social
 * @property string $cnpj
 * @property string $ramo
 * @property string $descricao
 * @property string $rua
 * @property string $bairro
 * @property string $cidade
 * @property int $numero
 * @property string $email
 * @property string $site
 * @property string $telefone
 * @property \Cake\I18n\Time $criacao
 * @property \Cake\I18n\Time $alteracao
 * @property bool $entrega
 * @property string $login
 * @property string $senha
 */
class Estabelecimento extends Entity
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
	
    protected function _setPassword($senha)
    {
        return (new DefaultPasswordHasher)->hash($senha);
    }

}
