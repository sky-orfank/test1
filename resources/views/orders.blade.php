@extends('layouts.app')

@section('content')
    <table class="table">
      <thead>
        <tr>
          <th>ид_заказа</th>
          <th>название_партнера</th>
          <th>стоимость_заказа</th>
          <th>наименование_состав_заказа</th>
          <th>статус_заказа</th>
        </tr>
      </thead>
      <tbody>

	    @foreach ($orders as $order)
        <tr>
          <td><a href="/order/{{ $order->id }}">{{ $order->id }}</a></td>
          <td>{{ $order->partner->name }}</td>
          <td>{{ $order->orderProduct->price }}</td>
          <td>{{ $order->orderProduct->quantity }}</td>
          <td>
	        @if($order->status==0) новый @endif 
	        @if($order->status==10) подтвержден @endif
	        @if($order->status==20)завершен @endif
          </td>
        </tr>
         @endforeach
      
      </tbody>
    </table>

{{ $orders->links() }}
@endsection