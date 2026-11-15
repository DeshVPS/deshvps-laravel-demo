<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Cha Ghor · Guestbook</title>
    <style>
        :root{--g:#065f46;--g2:#059669;--bg:#f6f7f5}*{box-sizing:border-box}
        body{margin:0;font:17px/1.55 system-ui,-apple-system,"Segoe UI",sans-serif;background:var(--bg);color:#1f2937}
        header{background:var(--g);color:#fff;padding:40px 24px;text-align:center}h1{margin:0;font-size:34px}header p{margin:6px 0 0;color:#d1fae5}
        main{max-width:720px;margin:-26px auto 0;padding:0 20px 20px}
        .card{background:#fff;border-radius:16px;box-shadow:0 6px 24px rgba(0,0,0,.08);padding:24px;margin-bottom:22px}
        label{display:block;font-weight:600;font-size:14px;margin:12px 0 6px}
        input,textarea{width:100%;font:inherit;padding:11px 13px;border:1px solid #d1d5db;border-radius:10px}textarea{min-height:90px;resize:vertical}
        button{margin-top:16px;font:700 16px system-ui;color:#fff;background:var(--g2);border:0;border-radius:10px;padding:12px 22px;cursor:pointer}
        .status{background:#ecfdf5;color:var(--g);font-weight:700;padding:12px 16px;border-radius:10px;margin-bottom:6px}
        .err{color:#b91c1c;font-size:14px;margin-top:6px}
        .msg{padding:14px 0;border-top:1px solid #f0f0f0}.msg:first-child{border-top:0}.msg b{color:var(--g)}.msg time{color:#9ca3af;font-size:13px;margin-left:8px}
        .msg p{margin:4px 0 0}h2{margin:0 0 6px;font-size:20px}.muted{color:#6b7280}
        footer{color:#6b7280;font-size:14px;text-align:center;padding:10px 0 30px}
    </style>
</head>
<body>
<header><h1>☕ Cha Ghor Guestbook</h1><p>Leave a note for the tea stall. Every message is stored in MySQL.</p></header>
<main>
    <form class="card" method="post" action="/messages">
        @csrf
        @if (session('status'))<div class="status">{{ session('status') }}</div>@endif
        <label for="name">Your name</label>
        <input id="name" name="name" value="{{ old('name') }}" maxlength="60" required>
        @error('name')<div class="err">{{ $message }}</div>@enderror
        <label for="body">Message</label>
        <textarea id="body" name="body" maxlength="280" required>{{ old('body') }}</textarea>
        @error('body')<div class="err">{{ $message }}</div>@enderror
        <button type="submit">Sign the guestbook</button>
    </form>
    <section class="card">
        <h2>{{ $count }} {{ \Illuminate\Support\Str::plural('message', $count) }}</h2>
        @forelse ($messages as $m)
            <div class="msg"><b>{{ $m->name }}</b><time>{{ $m->created_at->diffForHumans() }}</time><p>{{ $m->body }}</p></div>
        @empty
            <p class="muted">No messages yet. Be the first!</p>
        @endforelse
    </section>
</main>
<footer>Running on DeshVPS · Laravel {{ app()->version() }} · PHP {{ PHP_VERSION }} · MySQL (MariaDB {{ \Illuminate\Support\Str::before($db, '-') }}) · {{ gethostname() }}</footer>
</body>
</html>
