@extends('layouts.app')

@section('content')

<form class="form-horizontal" method="POST" action="/saveOrder/{{$order->id}}">
  {{ csrf_field() }}
  <fieldset>
    <div class="form-group">
      <label for="inputEmail" class="control-label col-xs-2">E-mail клиента</label>
      <div class="col-xs-10">
        <input name="email" value="{{$order->client_email}}" type="email" class="form-control" id="inputEmail">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPartner" class="control-label col-xs-2">Партнер</label>
      <div class="col-xs-10">
        <input  name="partner_name" value="{{ $order->partner->name }}" class="form-control" id="inputPartner">
      </div>
    </div>
    <div class="form-group">
      <label for="inputProduct" class="control-label col-xs-2">Продукты</label>
      <div class="col-xs-10">
       {{$order->orderProduct->product->name}}, {{$order->orderProduct->quantity}} шт.
      </div>
    </div>
    <div class="form-group">
      <label for="inputStatus" class="control-label col-xs-2">Статус заказа</label>
      <div class="col-xs-10">
        <select name="status">
          <option value="0" @if($order->status==0) selected="selected" @endif>новый</option>
          <option value="10" @if($order->status==10) selected="selected" @endif>подтвержден</option>
          <option value="20" @if($order->status==20) selected="selected" @endif>завершен</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="inputPrice" class="control-label col-xs-2">Стоимость заказ</label>
      <div class="col-xs-10">
        {{ $order->orderProduct->price }}
      </div>
    </div>        
    <div class="form-group">
      <div class="col-xs-offset-2 col-xs-10">
        <button type="submit" class="btn btn-primary">СОХРАНИТЬ</button>
      </div>
    </div>
  </fieldset>
</form>

@endsection
