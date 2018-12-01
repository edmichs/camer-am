<?php

namespace App\Repositories;

use App\Models\Affection;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AffectionRepository
 * @package App\Repositories
 * @version December 1, 2018, 7:13 am UTC
 *
 * @method Affection findWithoutFail($id, $columns = ['*'])
 * @method Affection find($id, $columns = ['*'])
 * @method Affection first($columns = ['*'])
*/
class AffectionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Affection::class;
    }
}
