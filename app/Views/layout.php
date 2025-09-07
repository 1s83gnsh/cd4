<?php ?><!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= esc($title ?? 'Система') ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .kanban-col { min-height:300px; background:#f8f9fa; border-radius:8px; padding:10px }
        .kanban-card { background:#fff; border:1px solid #e5e5e5; border-radius:6px; padding:10px; margin-bottom:10px }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-md navbar-light bg-light">
    <a class="navbar-brand" href="/">Система</a>

    <!-- Кнопка-гамбургер для телефонов -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNav"
                    aria-controls="mainNav" aria-expanded="false" aria-label="Переключить навигацию">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Сворачиваемое меню -->
    <div class="collapse navbar-collapse" id="mainNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="/board">Доска</a></li>
            <li class="nav-item"><a class="nav-link" href="/tickets">Обращения</a></li>
            <li class="nav-item"><a class="nav-link" href="/orders">Заказы (1С)</a></li>
            <li class="nav-item"><a class="nav-link" href="/tests">Тесты</a></li>
            <li class="nav-item"><a class="nav-link" href="/knowledge">База знаний</a></li>
            <li class="nav-item"><a class="nav-link" href="/orders-products">Заказы и товары</a></li>
        </ul>
    </div>
</nav>

<main class="container py-4">
    <?= $content ?? '' ?>
</main>

<footer class="text-center text-muted py-3">
    © <?= date('Y') ?> — Единая система
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
