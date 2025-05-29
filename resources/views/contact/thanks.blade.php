<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせ完了</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Hiragino Kaku Gothic ProN', sans-serif;
            background-color: #fff;
            color: #5c4434;
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .thanks-wrapper {
            text-align: center;
            position: relative;
            z-index: 2;
        }

        .thanks-wrapper h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .home-button {
            display: inline-block;
            background-color: #5c4434;
            color: white;
            padding: 10px 24px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .home-button:hover {
            background-color: #8b7765;
        }

        .background-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 150px;
            color: rgba(92, 68, 52, 0.04);
            z-index: 1;
            pointer-events: none;
            white-space: nowrap;
            user-select: none;
        }
    </style>
</head>
<body>
    <div class="thanks-wrapper">
        <h1>お問い合わせありがとうございました</h1>
        <a href="{{ route('home') }}" class="home-button">HOME</a>
        <div class="background-text">Thank you</div>
    </div>
</body>
</html>