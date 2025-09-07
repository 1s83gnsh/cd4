<div class="d-flex align-items-center mb-3">
  <h2 class="mb-0">Обращения</h2>
  <button class="btn btn-primary btn-sm ml-3"
          onclick="document.getElementById('newTicketForm').classList.toggle('d-none')">+ Обращение</button>
</div>

<form id="newTicketForm" class="card card-body mb-3 d-none" onsubmit="return createTicket(this)">
  <div class="form-row">
    <div class="form-group col-md-6"><label>Тема</label><input name="title" class="form-control" required></div>
    <div class="form-group col-md-4"><label>Приоритет</label>
      <select name="priority" class="form-control"><option>normal</option><option>low</option><option>high</option></select>
    </div>
    <div class="form-group col-md-2"><label>&nbsp;</label><button class="btn btn-success btn-block">Создать</button></div>
  </div>
  <div class="form-group"><label>Описание</label><textarea name="description" class="form-control" rows="3"></textarea></div>
</form>

<table class="table table-sm">
  <thead><tr><th>ID</th><th>Тема</th><th>Статус</th><th>Приоритет</th><th></th></tr></thead>
  <tbody>
  <?php foreach($tickets as $t): ?>
    <tr>
      <td><?= $t['id'] ?></td>
      <td><?= esc($t['title']) ?></td>
      <td><?= esc($t['status']) ?></td>
      <td><?= esc($t['priority']) ?></td>
      <td>
        <button class="btn btn-outline-secondary btn-sm" onclick="quickStatus(<?= $t['id'] ?>,'В работе')">В работу</button>
        <button class="btn btn-outline-success btn-sm" onclick="quickStatus(<?= $t['id'] ?>,'Закрыты')">Закрыть</button>
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>

<script>
async function createTicket(form){
  const fd=new URLSearchParams(new FormData(form));
  const r=await fetch('/обращения/создать',{method:'POST',headers:{'Content-Type':'application/x-www-form-urlencoded'},body:fd});
  const j=await r.json(); if(j.status==='ok') location.reload(); return false;
}
async function quickStatus(id,status){
  const r=await fetch('/обращения/статус',{method:'POST',headers:{'Content-Type':'application/x-www-form-urlencoded'},body:'id='+id+'&status='+encodeURIComponent(status)});
  const j=await r.json(); if(j.status==='ok') location.reload();
}
</script>
