<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Candidatura Entity
 *
 * @property int $id
 * @property int $puesto_id
 * @property int $convocado_id
 * @property int $nota
 * @property string $observaciones
 *
 * @property \App\Model\Entity\Puesto $puesto
 * @property \App\Model\Entity\Convocado $convocado
 */
class Candidatura extends Entity
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
