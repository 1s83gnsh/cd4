<?php namespace App\Controllers;

class OrdersProducts extends BaseController
{
    private function demoOrders(): array
    {
        return [
            [
                'id'=>1,'client_name'=>'ООО Ромашка','total'=>1500.00,'status'=>'Открыт','code_1c'=>'ORD-0001',
                'items'=>[ ['sku'=>'A-1','name'=>'Товар A','qty'=>3,'price'=>100.00] ]
            ],
            [
                'id'=>2,'client_name'=>'ИП Иванов','total'=>320.50,'status'=>'Выполнен','code_1c'=>'ORD-0002',
                'items'=>[ ['sku'=>'B-2','name'=>'Товар B','qty'=>5,'price'=>64.10] ]
            ],
        ];
    }

    public function index()
    {
        $orders = $this->demoOrders();
        return view('layout',[
            'title'=>'Заказы и товары',
            'content'=>view('orders/products',['orders'=>$orders])
        ]);
    }
}
