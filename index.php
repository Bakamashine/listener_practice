<?php
require "includes/header.php";

use Model\Logs;

$logs = new Logs();
$result = $logs->getAll();
?>
<h1>Listener!</h1>
<p>Logs: </p>

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Text</th>
            <th scope="col">Code</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result):
            foreach ($result as $res):
                ?>
                <tr>
                    <th><?= $res['id'] ?></th>
                    <th><?= $res['name'] ?></th>
                    <th><?= $res['code'] ?></th>
                </tr>
            <?php endforeach;
        else:
            echo "<p>Логов нет</p>";
        endif;
        ?>
    </tbody>
</table>