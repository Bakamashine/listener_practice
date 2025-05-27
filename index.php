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
                    <td><?= $res['id'] ?></td>
                    <td><?= $res['name'] ?></td>
                    <?php if ($res['code'] == 1 || $res['code'] == '1'): ?>
                        <td>
                            <p class="text-danger"><?= $res['code'] ?></p>
                        </td>
                    <?php else: ?>
                        <td>
                            <p><?= $res['code'] ?></p>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach;
        else:
            echo "<p>Логов нет</p>";
        endif;
        ?>
    </tbody>
</table>