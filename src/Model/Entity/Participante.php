<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Participante Entity
 *
 * @property int $id
 * @property string $dni
 * @property string $sexo
 * @property string $nombre
 * @property string $apellidos
 * @property string $telefono
 * @property string $email
 * @property string $foto
 * @property string $observaciones
 * @property int $relation_id
 * @property \Cake\I18n\FrozenDate $nacimiento
 * @property int $expediente_id
 * @property bool $desactivado
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Relation $relation
 * @property \App\Model\Entity\Expediente $expediente
 */
class Participante extends Entity
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
