<?php

function input_field($type,$placeholder,$value,$name){

    $level = ucfirst($name);
    $element = "
        <div class=\"form-group mx-auto mb-3\">
            <label for='$name' class=\"form-label\">$level </label>
            <input type='$type' name='$name' placeholder='$placeholder' class=\"form-control\" value='$value' autocomplete=\"off\">
        </div>
    ";
    echo $element;
}

?>