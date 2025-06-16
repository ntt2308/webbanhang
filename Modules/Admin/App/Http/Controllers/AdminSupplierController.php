<?php

namespace Modules\Admin\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Models\Supplier;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminSupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::paginate(10);
        $viewData = [
            'suppliers' => $suppliers
        ];
        return view('admin::supplier.index', $viewData);
    }
    public function create()
    {
        return view('admin::supplier.create');
    }
    public function store(Request $request)
    {
        $this->insertOrUpdate($request);

        return redirect()->route('admin.get.list.supplier')->with('success', 'Thêm mới thành công');
    }
    public function insertOrUpdate($request, $id = '')
    {
        $supplier = new Supplier();

        if ($id) $supplier = Supplier::find($id);
        $supplier->s_name = $request->s_name;
        $supplier->save();
    }
    public function deleteSupplier($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

        return redirect()->back()->with('success','Xoá nhà cung cấp thành công');
    }
}
