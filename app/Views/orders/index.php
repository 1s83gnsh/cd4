<div class="d-flex align-items-center mb-3">
  <h2 class="mb-0">Заказы (1С)</h2>
  <a class="btn btn-primary btn-sm ml-3" href="#" onclick="alert('Создание заказа: заглушка');return false;">+ Заказ</a>
</div>

<table class="table table-sm">
  <thead><tr><th>ID</th><th>Клиент</th><th>Сумма</th><th>Статус</th><th>Код 1С</th></tr></thead>
  <tbody>
  <?php foreach($orders as $o): ?>
    <tr>
      <td><?= $o['id'] ?></td>
      <td><?= esc($o['client_name']) ?></td>
      <td><?= number_format((float)$o['total'],2,'.',' ') ?></td>
      <td><?= esc($o['status']) ?></td>
      <td><?= esc($o['code_1c']) ?></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
