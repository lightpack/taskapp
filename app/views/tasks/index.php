<ul>
    <?php foreach ($tasks as $task) : ?>
        <li>
            <?= $task->title ?> :
            <?= $task->status ?>
            <a href="<?= url()->to('tasks/edit', $task->id) ?>">
                Edit
            </a>
        </li>
    <?php endforeach; ?>
</ul>

<hr>

<a href="<?= url()->to('tasks/add') ?>">
    + New Task
</a>