<div class="d-flex align-items-center mb-3">
  <h2 class="mb-0">Тесты</h2>
  <a class="btn btn-primary btn-sm ml-3" href="#" onclick="alert('Пройти тест: заглушка');return false;">Пройти тест</a>
</div>

<ul class="list-group">
<?php foreach($tests as $t): ?>
<li class="list-group-item d-flex justify-content-between align-items-center">
  <div>
    <strong><?= esc($t['title']) ?></strong>
    <div class="small text-muted"><?= esc($t['description']) ?></div>
  </div>
  <span class="badge badge-secondary"><?= (int)$t['pass_threshold'] ?>%</span>
</li>
<?php endforeach; ?>
</ul>
