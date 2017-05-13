<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Valoracion Entity
 *
 * @property int $id
 * @property int $convocado_id
 * @property string $puede
 * @property string $sabe
 * @property string $quere
 *
 * @property \App\Model\Entity\Convocado $convocado
 */
class Valoracion extends Entity
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
