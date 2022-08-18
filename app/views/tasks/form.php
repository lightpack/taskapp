<form method="post">

    <!-- Title -->
    <input name="title" placeholder="Title" value="<?= $task->title ?? '' ?>" required>

    <!-- Status -->
    <?php if ($task->status ?? null) : ?>
        <select name="status">

            <?php foreach (['done', 'pending'] as $status) : ?>

                <option <?= $task->status == $status ? 'selected' : '' ?>>
                    <?= $status ?>
                </option>

            <?php endforeach; ?>

        </select>
    <?php endif; ?>

    <!-- Submit -->
    <button>Submit</button>

</form>

<a href="<?= url("tasks") ?>">Cancel</a>