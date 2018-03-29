<?php namespace Furniture;

use Illuminate\Database\Eloquent\Model;

class MFile extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'files';

    /**
     * Get the model that owns the photo.
     */
    public function model()
    {
        return $this->belongsTo('Furniture\FModel','model_id');
    }

}
