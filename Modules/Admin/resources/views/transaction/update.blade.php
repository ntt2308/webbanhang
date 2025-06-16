@extends('admin::layouts.master')
@section('content')
<form action="" method="POST">
    @csrf
    <div class="form-group">
      <label for="tr_status">Tạng thái đơn hàng</label>
      <input type="text" class="form-control" placeholder="trạng thái đơn hàng" value="{{old('tr_status',isset($transaction->tr_status)? $transaction->tr_status : '')}}" name="tr_status">
      @if($errors->has('tr_status'))
        <span class="error-text">
          {{$errors->first('tr_status')}}
        </span>
        @endif
    </div>
    <button type="submit" class="btn btn-success">Lưu thông tin</button>
  </form>
  @stop