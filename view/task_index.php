<h1>Overview</h1>
<article class="hreview open special col-xs-6">
    <h2>All tasks</h2>
	<?php if (empty($tasks)): ?>
		<div class="dhd">
			<h2 class="item title">Hoppla! Keine Tasks gefunden.</h2>
		</div>
	<?php else: ?>
		<?php foreach ($tasks as $task): ?>
            <?php if($task->is_done == 0): ?>
                <div class="panel panel-default">
                    <div class="panel-heading"><?= $task->title;?></div>
                    <div class="panel-body">
                        <p class="description"><?= $task->description;?></p>
                        <p class="due_date">Muss erledigt werden bis am: <?= $task->due_date;?></p>
                        <p>
                            <a title="Löschen" href="/task/delete?id=<?= $task->id ?>">Löschen</a>
                        </p>
                        <p>
                            <a title="Edit" href="/task/edit?id=<?= $task->id ?>">Edit</a>
                        </p>
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
                        <p class="due_date">Muss erledigt werden bis am: <?= $task->due_date;?></p>
                        <p>
                            <a title="Delete" href="/task/delete?id=<?= $task->id ?>">Delete</a>
                        </p>
                        <p>
                            <a title="Edit" href="/task/edit?id=<?= $task->id ?>">Edit</a>
                        </p>
                    </div>
                </div>
            <?php endif ?>
        <?php endforeach ?>
</article>