<h2>Справка</h2>
<div class="accordion" id="helpAccordion">
<?php foreach($pages as $i=>$p): ?>
  <div class="card">
    <div class="card-header" id="heading<?= $i ?>">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse<?= $i ?>">
          <?= esc($p['title']) ?>
        </button>
      </h2>
    </div>
    <div id="collapse<?= $i ?>" class="collapse" data-parent="#helpAccordion">
      <div class="card-body"><?= esc($p['content']) ?></div>
    </div>
  </div>
<?php endforeach; ?>
</div>
