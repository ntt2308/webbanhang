<form action="" method="POST">
    @csrf
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="b_name">Tên nhà cung cấp</label>
                <input type="text" class="form-control" placeholder="Tên nhà cung cấp"
                    value="{{ old('s_name', isset($supplier->s_name) ? $supplier->s_name : '') }}" name="s_name">
                @if ($errors->has('s_name'))
                    <span class="error-text">
                        {{ $errors->first('s_name') }}
                    </span>
                @endif
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Lưu thông tin</button>
</form>
