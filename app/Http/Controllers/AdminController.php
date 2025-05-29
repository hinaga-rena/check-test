<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class AdminController extends Controller
{
    public function index()
    {
    // カテゴリーをリレーションとして取得する
    $contacts = Contact::with('category')->get();

    return view('admin.index', compact('contacts'));
    }
}