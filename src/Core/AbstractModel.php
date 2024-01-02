<?php
namespace App\Core;
use ArrayAccess;

class AbstractModel implements ArrayAccess {

  //implementing ArrayAccess so that we can access our data as arrays
  //(in addition to accessing it as objects already)
  public function offsetExists(mixed $offset): bool
  {
    return isset($this->$offset);
  }

  public function offsetGet(mixed $offset): mixed
  {
    return $this->$offset;
  }

  public function offsetSet(mixed $offset, mixed $value): void
  {
      $this->$offset = $value;
  }

  public function offsetUnset(mixed $offset): void
  {
    unset($this->$offset);
  }

}


 ?>
