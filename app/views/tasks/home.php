<ul>
<?php foreach($tasks as $task): ?>
    <li>
        <?= $task->title ?> :
        <?= $task->status ?>
        <a href="<?= url('tasks/edit', $task->id) ?>">
            Edit
        </a>
    </li>
<?php endforeach; ?>
</ul>

<hr>

<a href="<?= url('tasks/add') ?>">
    + New Task
</a>