<?php require 'views/layouts/top.php' ?>
<h1 class="w-auto"><?= $title ?></h1>
	<?php require 'views/layouts/sidebar.php' ?>
	<div class="row align-items-md-center g-5 py-5">
		<div class="col col-md-8 mx-auto">
			<?php require 'views/layouts/sortSelect.php' ?>
			<div class="list-group w-auto">
				<?php foreach ($toDoItems as $toDoItem) : ?>
					<label class="list-group-item d-flex justify-content-between gap-5">
						<input class="form-check-input flex-shrink-0" type="checkbox" value="" <?= $toDoItem['status'] ? 'checked' : '' ?> disabled>
						<span class="form-checked-content">
							<strong><?= $toDoItem['userName'] ?></strong>
						</span>
						<small class="d-block text-muted">
							<?= $toDoItem['email'] ?>
						</small>
						<span><?= $toDoItem['text'] ?></span>
						<?php if ($editable): ?>
							<small>
								<a class="page-link text-secondary" href="/item/<?= $toDoItem['id'] ?>/edit">
									Edit
								</a>
							</small>
							<small>
								<?php if (!$toDoItem['status']): ?>
									<a class="page-link text-secondary" href="/item/<?= $toDoItem['id'] ?>/complete">
										Make complete
									</a>
								<? else: ?>
									<b>Completed</b>
								<? endif; ?> 
							</small>
						<? endif; ?> 
					</label>
				<?php endforeach; ?>
				<nav class="mx-auto my-3">
					<ul class="pagination">
						<?php for ($j = 1; $j <= $pages_count; $j++) : ?>
							<?php if ($j == $page): ?>
								<li class="page-item active">
									<a class="page-link" href=?p=<?=$j?><?=$orderby?>>
										<?=$j?>
									</a>
								</li>
							<?php else: ?>
								<li class="page-item">
									<a class="page-link" href=?p=<?=$j?><?=$orderby?>>
										<?=$j?>
									</a>
								</li>
							<?php endif; ?>
							<?php if ($j != $pages_count):?><? endif ?>
						<?php endfor; ?>
					</ul>
				</nav>
			</div>
		</div>
</div>
<?php require 'views/layouts/bottom.php' ?>