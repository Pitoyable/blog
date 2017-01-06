<?php
class Form
{
  protected $fields = [];

  public function createForm($test) {

    foreach ($test as list($a, $b, $c)) {
      echo "<label>".$c." : <input type=".$a." name=".$b." value = ''></label><br>";
    }
    echo "<button type='button' name='button'>Submit</button>";
  }


}
