<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // 入力画面
    public function create()
    {
        $categories = Category::all();
        return view('contact.create', compact('categories'));
    }

    // 確認画面
    public function confirm(ContactRequest $request)
{
    $inputs = $request->all();

    // 電話番号を結合して tel に入れる
    $inputs['tel'] = $request->input('tel1') . '-' . $request->input('tel2') . '-' . $request->input('tel3');

    // カテゴリ名を取得
    $category = Category::find($inputs['category_id']);
    $inputs['category'] = $category ? $category->name : '未設定';

    // ↓↓↓ 明示的に必要なフィールドを設定（エラー防止）
    $inputs['last_name'] = $request->input('last_name');
    $inputs['first_name'] = $request->input('first_name');
    $inputs['gender'] = $request->input('gender');
    $inputs['email'] = $request->input('email');
    $inputs['address'] = $request->input('address');
    $inputs['building'] = $request->input('building');
    $inputs['content'] = $request->input('content');

    return view('contact.confirm', compact('inputs'));
}

    // 完了画面
    public function store(ContactRequest $request)
    {
    $contact = new Contact();

    // tel1〜3を連結して tel に格納
    $contact->tel = $request->input('tel1') . '-' . $request->input('tel2') . '-' . $request->input('tel3');

    // その他の値を代入
    $contact->last_name = $request->input('last_name');
    $contact->first_name = $request->input('first_name');
    $contact->gender = $request->input('gender');
    $contact->email = $request->input('email');
    $contact->address = $request->input('address');
    $contact->building = $request->input('building');
    $contact->category_id = $request->input('category_id');
    $contact->content = $request->input('content');

    $contact->save();

    return redirect()->route('contact.thanks');
    }

    // 完了画面表示
    public function thanks()
    {
        return view('contact.thanks');
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('admin.index')->with('success', 'お問い合わせを削除しました');
    }
}