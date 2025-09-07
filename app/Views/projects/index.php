<h2>Проекты и этапы</h2>
<?php foreach($projects as $p): ?>
<div class="card mb-3">
  <div class="card-header"><strong><?= esc($p['name']) ?></strong></div>
  <div class="card-body">
    <p><?= esc($p['description']) ?></p>
    <ul class="list-group">
    <?php foreach($p['stages'] as $s): ?>
      <li class="list-group-item d-flex justify-content-between">
        <span><?= esc($s['name']) ?></span>
        <span class="badge badge-info"><?= esc($s['status']) ?></span>
      </li>
    <?php endforeach; ?>
    </ul>
  </div>
</div>
<?php endforeach; ?>
