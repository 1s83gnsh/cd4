<h2>Заказы и товары</h2>
<?php foreach($orders as $o): ?>
<div class="card mb-3">
  <div class="card-header d-flex justify-content-between">
    <span><strong>Заказ №<?= $o['id'] ?></strong> — <?= esc($o['client_name']) ?></span>
    <span>Статус: <?= esc($o['status']) ?> | Сумма: <?= number_format((float)$o['total'],2,'.',' ') ?> </span>
  </div>
  <div class="card-body p-0">
    <table class="table table-sm mb-0">
      <thead><tr><th>Артикул</th><th>Наименование</th><th>Кол-во</th><th>Цена</th><th>Сумма</th></tr></thead>
      <tbody>
      <?php foreach($o['items'] as $it): ?>
        <tr>
          <td><?= esc($it['sku']) ?></td>
          <td><?= esc($it['name']) ?></td>
          <td><?= $it['qty'] ?></td>
          <td><?= number_format((float)$it['price'],2,'.',' ') ?></td>
          <td><?= number_format($it['qty']*$it['price'],2,'.',' ') ?></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <div class="card-footer">Код 1С: <?= esc($o['code_1c']) ?></div>
</div>
<?php endforeach; ?>
