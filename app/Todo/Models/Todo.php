<?php

namespace Todo\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Todo extends Eloquent {
  protected $fillable = ['author', 'email', 'text', 'image'];
}
