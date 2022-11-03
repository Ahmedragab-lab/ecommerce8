<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;

class AdminOrderDetailsComponent extends Component
{
    public $order_id;
    public function mount($order_id){
        $this->order_id = $order_id;
    }
    public function render()
    {
        $order = Order::findorfail($this->order_id);
        return view('livewire.admin.admin-order-details-component',compact('order'))->layout('dashlayouts.master');
    }
}
