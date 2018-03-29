<?php namespace Furniture;

use Illuminate\Database\Eloquent\Model;

class FModel extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'models';

    /**
     * Get the main photos for the model.
     */
    public function main_photo()
    {
        return $this->belongsTo('Furniture\FPhoto', 'photo_id');
    }

    /**
     * Get the photos for the model.
     */
    public function photos()
    {
        return $this->hasMany('Furniture\FPhoto', 'model_id');
    }

    /**
     * Get the files for the model.
     */
    public function files()
    {
        return $this->hasMany('Furniture\MFile', 'model_id');
    }

    /**
     * Get the owner for the model.
     */
    public function owner()
    {
        return $this->belongsTo('Furniture\User', 'created_by');
    }

    /**
     * Get the connections for the model.
     */
    public function connections()
    {
        return $this->hasMany('Furniture\MConnection', 'model_id');
    }

    public function isConnected($user_id)
    {
        $user = $this->connections()->where('user_id', $user_id)->first();
        
        if ($user)
        {
            return true;
        }

        return false;
    }
}
