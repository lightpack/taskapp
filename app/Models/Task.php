<?php

namespace App\Models;

use Lightpack\Database\Lucid\Model;

class Task extends Model
{
    /** @inheritDoc */
    protected $table = 'tasks';

    /** @inheritDoc */
    protected $primaryKey = 'id';

    /** @inheritDoc */
    protected $timestamps = false;
}
