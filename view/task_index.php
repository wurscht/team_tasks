<article class="hreview open special">
	<?php if (empty($tasks)): ?>
		<div class="dhd">
			<h2 class="item title">Hoopla! Keine Tasks gefunden.</h2>
		</div>
	<?php else: ?>
		<?php foreach ($tasks as $task): ?>
			<div class="panel panel-default">
				<div class="panel-heading"><?= $task->title;?></div>
				<div class="panel-body">
					<p class="description"><?= $task->description;?></p>
                    <p class="due_date">Muss erledigt werden bis am: <?= $task->due_date;?></p>
					<p>
						<a title="Löschen" href="/task/delete?id=<?= $task->id ?>">Löschen</a>
					</p>
				</div>
			</div>
		<?php endforeach ?>
	<?php endif ?>
</article>
