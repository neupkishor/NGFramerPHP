<?php

namespace ngframerphp\core\html;

final class Form
{

    public static function open(string $action, string $method): string
    {
        return "<form action='$action' method='$method'>";
    }


    public static function text(string $name='', string $placeholder='', string $value='', string $error='', string $id='', string $class=''): string
    {
        return "<input type='text' id='$id' class='$class' name='$name' placeholder='$placeholder' value='$value'> <br> $error";
    }


    public static function password(string $name='', string $placeholder='', string $value='', string $error='', string $id='', string $class=''): string
    {
        return "<input type='password' id='$id' class='$class' name='$name' placeholder='$placeholder' value='$value'>";
    }


    public static function submit(string $name='', string $placeholder='', string $value='', string $id='', string $class='', bool $disabled=false): string
    {
        if ($disabled){
            return "<input type='submit' id='$id' class='$class' name='$name' placeholder='$placeholder' value='$value' disabled>";
        }
        return "<input type='submit' id='$id' class='$class' name='$name' placeholder='$placeholder' value='$value'>";
    }


    public static function radio(string $name='', string $value = '', bool $checked = false, bool $disabled = false, string $id = '', string $class=''): string
    {
        if ($checked){
            if ($disabled){
                return "<input type='checkbox' name='$name' value='$value' checked id='$id' class='$class'disabled>";
            }
            return "<input type='checkbox' name='$name' value='$value' id='$id' class='$class'disabled>";
        }else{
            if ($disabled){
                return "<input type='checkbox' name='$name' value='$value' id='$id' class='$class'disabled>";
            }
            return "<input type='checkbox' name='$name' value='$value' id='$id' class='$class'>";
        }
    }


    public static function close(): string
    {
        return "</form>";
    }
}