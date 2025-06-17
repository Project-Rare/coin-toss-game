<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Coin Toss Game</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body { font-family: sans-serif; text-align: center; margin-top: 50px; }
        button { margin: 10px; padding: 10px 20px; font-size: 16px; }
    </style>
</head>
<body>
    <h1>Coin Toss Game</h1>

    <p id="score">勝ち数：0｜試行回数：0</p>

    <div>
        <button class="choice-button" data-choice="表">表</button>
        <button class="choice-button" data-choice="裏">裏</button>
    </div>

    <p id="result">結果がここに表示されます</p>

    <div>
        <button id="reset-button">リセット</button>
    </div>

    <script src="/js/game.js"></script>
</body>
</html>
