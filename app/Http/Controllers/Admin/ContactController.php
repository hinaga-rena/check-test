<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        // クエリビルダを初期化
        $query = Contact::query();

        // 名前（部分一致）
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        // メールアドレス（部分一致）
        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }

        // 性別（完全一致）
        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        // お問い合わせの種類（完全一致）
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // 日付（完全一致）
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        // データ取得（7件ずつページネーション）
        $contacts = $query->paginate(7);

        $categories = Category::all();

        return view('admin.index', compact('contacts', 'categories'));
    }

    // CSVエクスポート（絞り込み条件も適用）
    public function export(Request $request)
    {
        $query = Contact::query();

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }

        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $contacts = $query->get();

        // CSVダウンロード処理
        $csvHeader = ['ID', '名前', 'メールアドレス', '性別', 'お問い合わせの種類', '登録日'];
        $csvData = [];

        foreach ($contacts as $contact) {
            $csvData[] = [
                $contact->id,
                $contact->name,
                $contact->email,
                $contact->gender,
                $contact->category,
                $contact->created_at->format('Y-m-d'),
            ];
        }

        $filename = 'contacts_export_' . now()->format('Ymd_His') . '.csv';

        $handle = fopen('php://temp', 'r+');
        fputcsv($handle, $csvHeader);
        foreach ($csvData as $row) {
            fputcsv($handle, $row);
        }
        rewind($handle);

        return response(stream_get_contents($handle), 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ]);
    }
    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return response()->json($contact);
    }

    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();
        return response()->json(['message' => '削除しました']);
    }
}
