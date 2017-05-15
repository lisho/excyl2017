<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Convocado Entity
 *
 * @property int $id
 * @property string $dni
 * @property string $nombre
 * @property string $apellidos
 * @property string $telefono
 * @property int $nomina_id
 * @property int $expediente_id
 *
 * @property \App\Model\Entity\Nomina $nomina
 * @property \App\Model\Entity\Expediente $expediente
 * @property \App\Model\Entity\Candidatura[] $candidaturas
 * @property \App\Model\Entity\Valoracion[] $valoracions
 */
class Convocado extends Entity
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
