<h1>Overview</h1>
<article class="hreview open special col-xs-6">
    <h2>All tasks</h2>
	<?php if (empty($tasks)): ?>
		<div class="dhd">
			<h2 class="item title">No Tasks found, you're free!</h2>
		</div>
	<?php else: ?>
		<?php foreach ($tasks as $task): ?>
            <?php if($task->is_done == 0): ?>
                <div class="panel panel-default">
                    <?php
                    $i = 0;
                    $current_id = 'id-' . $i; $i++;?>
                    <div class="panel-heading" data-toggle="collapse" data-target="#<?=$current_id?>"><?= $task->title;?><i class="fa fa-angle-double-down" aria-hidden="true"></i></div>
                    <div class="panel-body collapse" id="task_content">
                        <p class="description"><?= $task->description;?></p>
                        <p class="due_date">Has to be done until: <?= $task->due_date;?></p>
                            <a class="btn btn-primary btn_edit" title="Delete" href="/task/delete?id=<?= $task->id ?>">Delete</a>
                            <a class="btn btn-primary btn_edit" title="Edit" href="/task/edit?id=<?= $task->id ?>">Edit</a>
                    </div>
                </div>
            <?php endif ?>
		<?php endforeach ?>
	<?php endif ?>
</article>

<article class="hreview open special col-xs-6">
    <h2>Finished tasks</h2>
        <?php foreach ($tasks as $task): ?>
            <?php if($task->is_done == 1): ?>
                <div class="panel panel-default">
                    <div class="panel-heading"><?= $task->title;?></div>
                    <div class="panel-body">
                        <p class="description"><?= $task->description;?></p>
                        <p class="due_date">Has to be done until: <?= $task->due_date;?></p>
                            <a class="btn btn-primary btn_edit" title="Delete" href="/task/delete?id=<?= $task->id ?>">Delete</a>

                            <a class="btn btn-primary btn_edit" title="Edit" href="/task/edit?id=<?= $task->id ?>">Edit</a>

                    </div>
                </div>
            <?php endif ?>
        <?php endforeach ?>
</article>