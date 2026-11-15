<?php

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('guestbook', [
        'messages' => Message::latest()->take(20)->get(),
        'count' => Message::count(),
        'db' => DB::selectOne('select version() as v')->v,
    ]);
});

Route::post('/messages', function (Request $request) {
    $data = $request->validate([
        'name' => ['required', 'string', 'max:60'],
        'body' => ['required', 'string', 'max:280'],
    ]);
    Message::create($data);

    return redirect('/')->with('status', 'Thanks! Your message is saved in MySQL.');
});
