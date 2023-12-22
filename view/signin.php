<?php

use ngframerphp\core\html\{Form, Button};

?>

<div class="container">
    <div class="section">

        <?= Form::open('', 'post'); ?>
        <?= Form::text("neupId", "NeupId", "", "", "") ?>
        <?= Form::password("password", "Password", "", "", "") ?>
        <?= Button::submit('submit', 'Submit', 'submit', '', 'button button--solid', false) ?>
        <?= Form::close()?>

    </div>
</div>