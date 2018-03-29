<?php namespace Furniture;

use Illuminate\Database\Eloquent\Model;

class MConnection extends Model {
  /**
   * Get the user for the connection.
   */
  public function user()
  {
      return $this->belongsTo('Furniture\User', 'user_id');
  }

  /**
   * Get the model for the connection.
   */
  public function model()
  {
      return $this->belongsTo('Furniture\FModel', 'model_id');
  }
}
