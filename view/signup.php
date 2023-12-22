<?php

use ngframerphp\core\html\{Form, Button};

?>

<div class="container">
    <div class="section">

        <?= Form::open('', 'post') ?>
        <?= Form::text("firstName", "First Name", "", "", "") ?>
        <?= Form::text("middleName", "Middle Name (Optional)", "", "", "") ?>
        <?= Form::text("lastName", "Last Name", "", "", "") ?>
        <?= Button::submit('submit', 'Submit', 'submit', '', 'button button--solid', false) ?>
        <?= Form::close()?>

    </div>
</div>