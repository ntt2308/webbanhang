<form action="" method="POST">
    @csrf
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="name">Tên người quản trị</label>
                <input type="text" class="form-control" placeholder="Tên sản phẩm"
                    value="{{ old('name', isset($admin->name) ? $admin->name : '') }}" name="name">
                @if ($errors->has('name'))
                    <span class="error-text">
                        {{ $errors->first('name') }}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="text">Email</label>
                <input type="text" class="form-control" placeholder="Email"
                    value="{{ old('email', isset($admin->email) ? $admin->email : '') }}" name="email">
                @if ($errors->has('email'))
                    <span class="error-text">
                        {{ $errors->first('email') }}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="phone">Số điện thoại</label>
                <input type="text" class="form-control" placeholder="Số điện thoại"
                    value="{{ old('phone', isset($admin->phone) ? $admin->phone : '') }}" name="phone">
                @if ($errors->has('phone'))
                    <span class="error-text">
                        {{ $errors->first('phone') }}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="address">Mật khẩu</label>
                <input type="text" class="form-control" placeholder="Mật khẩu"
                    value="{{ old('password', isset($admin->password) ? $admin->password : '') }}" name="password">
                @if ($errors->has('password'))
                    <span class="error-text">
                        {{ $errors->first('password') }}
                    </span>
                @endif
            </div>
            
        </div>
    </div>
    <button type="submit" class="btn btn-success">Lưu thông tin</button>
</form>
@endsection
