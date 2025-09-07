<div class="d-flex align-items-center mb-3">
  <h2 class="mb-0">База знаний</h2>
  <form class="form-inline ml-3" onsubmit="return kbSearch(this)">
    <input class="form-control mr-2" type="text" name="q" placeholder="Поиск...">
    <button class="btn btn-outline-primary">Найти</button>
  </form>
</div>

<ul id="kbList" class="list-group mb-3">
<?php foreach($articles as $a): ?>
  <li class="list-group-item">
    <strong><?= esc($a['title']) ?></strong>
    <div class="small text-muted"><?= esc($a['content']) ?></div>
  </li>
<?php endforeach; ?>
</ul>

<script>
async function kbSearch(form){
  const q=form.q.value.trim();
  if(!q) return false;
  alert('Поиск по базе знаний "'+q+'" (заглушка)');
  return false;
}
</script>
