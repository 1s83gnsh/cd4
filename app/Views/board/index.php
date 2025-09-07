<div class="d-flex align-items-center mb-3">
  <h2 class="mb-0">Доска задач</h2>
  <button class="btn btn-primary btn-sm ml-3"
          onclick="document.getElementById('newTaskForm').classList.toggle('d-none')">+ Задача</button>
</div>
<form id="newTaskForm" class="card card-body mb-3 d-none" onsubmit="return createTask(this)">
  <div class="form-row">
    <div class="form-group col-md-4"><label>Заголовок</label><input name="title" class="form-control" required></div>
    <div class="form-group col-md-6"><label>Описание</label><input name="description" class="form-control"></div>
    <div class="form-group col-md-2"><label>Статус</label>
      <select name="status" class="form-control"><option>План</option><option>В работе</option><option>Готово</option></select>
    </div>
  </div>
  <button class="btn btn-success btn-sm">Создать</button>
</form>
<div class="row">
  <?php foreach (['План','В работе','Готово'] as $status): ?>
  <div class="col-md-4">
    <h5><?= $status ?></h5>
    <div class="kanban-col" data-status="<?= $status ?>">
      <?php foreach ($cardsByColumn[$status] ?? [] as $card): ?>
        <div class="kanban-card" draggable="true" ondragstart="dragStart(event)" data-id="<?= $card['id'] ?>">
          <strong><?= esc($card['title']) ?></strong>
          <div class="small text-muted"><?= esc($card['description']) ?></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  <?php endforeach; ?>
</div>
<script>
document.querySelectorAll('.kanban-col').forEach(col=>{
  col.addEventListener('dragover',e=>e.preventDefault());
  col.addEventListener('drop',async e=>{
    e.preventDefault();
    const cardId=e.dataTransfer.getData('text/plain');
    const newStatus=col.getAttribute('data-status');
    await fetch('/доска/карточка/переместить',{method:'POST',headers:{'Content-Type':'application/x-www-form-urlencoded'},body:'card_id='+cardId+'&status='+encodeURIComponent(newStatus)});
    location.reload();
  });
});
function dragStart(e){ e.dataTransfer.setData('text/plain', e.target.getAttribute('data-id')); }
async function createTask(form){
  const fd=new URLSearchParams(new FormData(form));
  const r=await fetch('/доска/задача/создать',{method:'POST',headers:{'Content-Type':'application/x-www-form-urlencoded'},body:fd});
  const j=await r.json(); if(j.status==='ok') location.reload(); return false;
}
</script>
