<?php

namespace ngframerphp\core\html;

final class Button
{
    public static function submit(string $name='', string $placeholder='', string $value='', string $id='', string $class='', bool $disabled=false): string
    {
        if ($disabled){
            return "<button type='submit' id='$id' id='$class' name='$name' value='$value' disabled>$placeholder</button>";
        }
        return "<button type='submit' id='$id' class='$class' name='$name' value='$value'>$placeholder</button>";
    }
}