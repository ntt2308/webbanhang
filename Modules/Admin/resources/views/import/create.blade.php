@extends('admin::layouts.master')
@section('content')
<form action="" method="POST">
    @csrf
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="name">Tên sản phẩm</label>
                <select name="product_id" id="" class="form-control">
                    <option value="">---Chọn Sản Phẩm---</option>
                    @if (isset($importgood))
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" {{ $product->id == $importgood->product_id ? 'selected' : '' }}>
                                {{ $product->pro_name }}
                            </option>
                        @endforeach
                    @else
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->pro_name }}</option>
                        @endforeach
                    @endif
                </select>
                @if ($errors->has('product_id'))
                    <span class="error-text">
                        {{ $errors->first('product_id') }}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Tên Nhà cung cấp</label>
                <select name="supplier_id" id="" class="form-control">
                    <option value="">---Chọn nhà cung cấp---</option>
                    @if (isset($importgood))
                        @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}" {{ $supplier->id == $importgood->supplier_id ? 'selected' : '' }}>
                                {{ $supplier->s_name }}
                            </option>
                        @endforeach
                    @else
                        @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}">{{ $supplier->s_name }}</option>
                        @endforeach
                    @endif
                </select>
                @if ($errors->has('supplier_id'))
                    <span class="error-text">
                        {{ $errors->first('supplier_id') }}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="b_name">Giá nhập hàng</label>
                <input type="text" class="form-control" placeholder="Giá nhập"
                    value="{{ old('price', isset($importgood->price) ? $importgood->price : '') }}" name="price">
                @if ($errors->has('price'))
                    <span class="error-text">
                        {{ $errors->first('price') }}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="b_name">Số lượng</label>
                <input type="text" class="form-control" placeholder="số lượng"
                    value="{{ old('quantity', isset($importgood->quantity) ? $importgood->quantity : '') }}" name="quantity">
                @if ($errors->has('quantity'))
                    <span class="error-text">
                        {{ $errors->first('quantity') }}
                    </span>
                @endif
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Lưu thông tin</button>
</form>
  @stop