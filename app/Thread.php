<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    //

    /**
     * Get  for the user.
     */
    public function replies()
    {
        return $this->hasMany('App\Thread', 'parent_id');
    }

}
