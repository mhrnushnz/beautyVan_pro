<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CkeditorController extends Controller{
    public function upload(Request $request){
        $request->validate(['upload' => ['required', 'image', 'max:5120'],]);
        $path = $request->file('upload')->store('articles', 'public');
        return response()->json(['url' => asset('storage/' . $path),]);
    }


    public function delete(Request $request){
        $request->validate(['url' => ['required', 'string'],]);
        $url = $request->input('url');
        $storageUrl = asset('storage/');
        if (!str_starts_with($url, $storageUrl)) {
            return response()->json([
                'message' => 'آدرس تصویر معتبر نیست.'
            ], 422);
        }
        $path = str_replace($storageUrl . '/', '', $url);
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
        return response()->json(['message' => 'تصویر با موفقیت حذف شد.']);
    }
}
