<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\WithdrawMoney;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products =  WithdrawMoney::orderBy('id', 'desc')->get();
        return view('admin.product.list', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.form', ['isUpdate' => false]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        try {
            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $filenameLogo = $file->getClientOriginalName(); // Tạo tên file duy nhất
                $file->move(public_path('asset/logo'), $filenameLogo);  // Lưu ảnh vào thư mục 'asset/logo'
            }
            
            if ($request->hasFile('qr_image')) {
                $file = $request->file('qr_image');
                $filename = $file->getClientOriginalName();  // Tạo tên file duy nhất
                $file->move(public_path('asset/qr'), $filename);  // Lưu ảnh vào thư mục 'asset/qr'
            }
            
            WithdrawMoney::create([
                'title' => $request->input('title'), 
                'logo' => $filenameLogo,
                'filename' => $filename
            ]);
            return redirect()->route('admin.product.index')->with('messageSuccess', config('message.create_success'));
        } catch (\Throwable $th) {
            Log::error($th);
            return redirect()->route('admin.product.create')->with('messageError', config('message.create_error'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = WithdrawMoney::findOrFail($id);
        if (!$product) return redirect()->route('admin.product.index')->with('messageError', config('message.data_not_found'));

        return view('admin.product.form', ['product' => $product, 'isUpdate' => true]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, $id)
    {
        try {
            DB::beginTransaction();

            $image = WithdrawMoney::findOrFail($id);

            // Cập nhật title
            if ($request->filled('title')) {
                $image->title = $request->input('title');
            }

            // Xử lý ảnh QR
            if ($request->hasFile('qr_image')) {
                $file = $request->file('qr_image');
                $filename = $file->getClientOriginalName(); // Tránh trùng tên file

                // Xóa ảnh QR cũ nếu có
                if (!empty($image->filename)) {
                    $oldFilePath = public_path('asset/qr/' . $image->filename);
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                // Lưu ảnh mới vào thư mục
                $file->move(public_path('asset/qr'), $filename);
                $image->filename = $filename;
            } else {
                // Nếu không có ảnh mới, giữ lại ảnh cũ
                $image->filename = $request->input('old_filename');
            }

            // Xử lý ảnh Logo
            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $logoFilename = $file->getClientOriginalName(); // Tránh trùng tên file

                // Xóa logo cũ nếu có
                if (!empty($image->logo)) {
                    $oldLogoPath = public_path('asset/logo/' . $image->logo);
                    if (file_exists($oldLogoPath)) {
                        unlink($oldLogoPath);
                    }
                }

                // Lưu logo mới vào thư mục
                $file->move(public_path('asset/logo'), $logoFilename);
                $image->logo = $logoFilename;
            } else {
                // Nếu không có ảnh mới, giữ lại ảnh cũ
                $image->logo = $request->input('old_logo');
            }

            // Lưu thay đổi vào database
            $image->save();

            DB::commit();
            return redirect()->route('admin.product.index')->with('messageSuccess', config('message.update_success'));
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);
            return redirect()->route('admin.product.update', $id)->with('messageError', config('message.update_error'));
        }
    }

    public function destroy(string $id)
    {
        try {
            $product = WithdrawMoney::findOrFail($id);
            if (!$product) return redirect()->route('admin.product.index')->with('messageError', config('message.data_not_found'));
            $filePath = public_path('asset/qr/' . $product->filename); // Đường dẫn ảnh
            $fileLogo = public_path('asset/logo/' . $product->logo);

        // Nếu file tồn tại, tiến hành xóa file
        if (file_exists($filePath)) {
            unlink($filePath); // Xóa ảnh
        }
        if (file_exists($fileLogo)) {
            unlink($fileLogo); // Xóa ảnh
        }

        DB::beginTransaction();
        $product->delete();
        DB::commit();
        return redirect()->route('admin.product.index')->with('messageSuccess', config('message.delete_success'));
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);
            return redirect()->route('admin.product.update', ['id' => $product->id])->with('messageError', config('message.delete_error'));
        }
    }

    public function postStatus($id)
    {
        $product = WithdrawMoney::where('id', $id)->first();
        if (!$product) return back()->with('messageError', config('message.data_not_found'));
        try {
            DB::beginTransaction();
            $product->status = ($product->status == 2 ? 1 : 2);
            $product->save();
            DB::commit();
            return redirect()->route('admin.product.index')->with('messageSuccess', config('message.status_success'));
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);
            return redirect()->route('admin.product.index')->with('messageError', config('message.status_error'));
        }
    }
}
