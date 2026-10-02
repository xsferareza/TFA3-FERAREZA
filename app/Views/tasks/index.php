<?= view('templates/header'); ?>

<h2>All System Tasks</h2>
<p class="text-muted">Complete master listing of all records ordered by date.</p>

<table class="table table-striped border">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Task Title</th>
            <th>Scheduled Date</th>
            <th>Status</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($tasks) && is_iterable($tasks)): ?>
    <?php foreach ($tasks as $task): ?>
        <tr>
            <td><?= esc(is_array($task) ? $task['id'] : $task->id); ?></td>
            <td><?= esc(is_array($task) ? $task['title'] : $task->title); ?></td>
            <td><?= esc(is_array($task) ? $task['task_date'] : $task->task_date); ?></td>
            <td>
                <?php 
                    $status = is_array($task) ? $task['status'] : $task->status; 
                ?>
                <span class="badge bg-<?= $status === 'completed' ? 'success' : 'warning'; ?>">
                    <?= esc(ucfirst($status)); ?>
                </span>
            </td>
            <td><?= esc(is_array($task) ? $task['created_at'] : $task->created_at); ?></td>
        </tr>
    <?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="5" class="text-center">No tasks found.</td>
    </tr>
<?php endif; ?>