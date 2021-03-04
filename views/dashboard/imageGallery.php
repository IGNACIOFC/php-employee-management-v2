<?php

$counter = 1;
foreach ($this->result as $avatar) {
  echo '<label class="label-avatar" for="avatar' . $counter . '">
              <input type="radio" id="avatar' . $counter . '" class="input_avatar" name="avatar" value="' . urldecode($avatar['photo']) . '" checked="false" >
              <img class="width-120 img-thumbnail rounded" src="' . urldecode($avatar['photo']) . '" alt="avatar' . $counter . '">
            </label>';
  $counter++;
}
