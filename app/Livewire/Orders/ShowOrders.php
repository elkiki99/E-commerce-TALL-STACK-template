<?php

namespace App\Livewire\Orders;

use Carbon\Carbon;
use App\Models\Payment;
use Livewire\Component;
use App\Mail\OrderDelivered;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Builder;

class ShowOrders extends Component
{
    use WithPagination;

    public $searchOrders = '';
    public $searchDate = '';

    protected $listeners = ['completeOrder'];

    public function completeOrder(Payment $payment)
    {
        Mail::to(auth()->user())->queue(new OrderDelivered($payment));
        $payment->delete();
        session()->flash('message', 'Order delivered successfully');
    }

    public function updating($key)
    {
        if ($key === 'searchOrders' || $key === 'searchDate') {
            $this->resetPage();
        }
    }

    public function render()
    {
        $query = Payment::latest();

        if (auth()->user()->admin === 1) {
            $query->latest()
                ->when($this->searchOrders !== '', fn(Builder $query) => $query->where('user_email', 'like', '%' . $this->searchOrders . '%'));
        } else {
            $query->where('user_id', auth()->user()->id)->orderByDesc('created_at');
        }

        if ($this->searchDate) {
            $query->whereDate('created_at', $this->searchDate);
        }

        $payments = $query->paginate(12);
        $dates = collect();
        for ($i = 0; $i < 14; $i++) {
            $dates->push(Carbon::today()->subDays($i)->format('Y-m-d'));
        }

        return view('livewire.orders.show-orders', [
            'payments' => $payments,
            'dates' => $dates,
        ]);
    }
}