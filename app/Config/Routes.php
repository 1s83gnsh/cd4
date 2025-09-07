<?php
namespace Config;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes = Services::routes();

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');

$routes->get('/','Home::index');

// Основные разделы (латиницей)
$routes->get('board','Board::index');
$routes->get('tickets','Tickets::index');
$routes->get('orders','Orders::index');
$routes->get('tests','Tests::index');
$routes->get('knowledge','Knowledge::index');

// Добавляем недостающие маршруты
$routes->get('projects','Projects::index');
$routes->get('help','Help::index');

// API
$routes->post('api/json/1c/orders/export','Api\OneC::exportOrder');
$routes->post('api/json/1c/orders/update','Api\OneC::updateOrder');
$routes->post('api/json/catalog/import','Api\Catalog::import');
$routes->get('api/json/tickets/export','Api\Tickets::export');
$routes->post('api/json/tickets/update','Api\Tickets::update');
$routes->get('api/json/kb/search','Api\Knowledge::search');

// Операции с задачами
$routes->post('board/task/create','Board::create');
$routes->post('board/card/move','Board::move');

// Заказы с товарами (латиницей в маршруте)
$routes->get('orders-products','OrdersProducts::index');
