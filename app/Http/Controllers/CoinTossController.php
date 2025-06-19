<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CoinTossController extends Controller
{
    public function play(Request $request)
    {
        // バリデーション：choiceが「表」または「裏」であること
        $request->validate([
            'choice' => ['required', Rule::in(['表', '裏'])],
        ]);

        $userChoice = $request->input('choice');
        $coinResult = rand(0, 1) === 0 ? '表' : '裏';
        $isWin = $userChoice === $coinResult;

        // セッション更新
        session()->increment('total_count');
        if ($isWin) {
            session()->increment('win_count');
        }

        // JSONで返す
        return response()->json([
            'user_choice' => $userChoice,
            'coin_result' => $coinResult,
            'message' => $isWin ? 'あなたの勝ちです！' : 'あなたの負けです。',
            'win_count' => session('win_count', 0),
            'total_count' => session('total_count', 0),
        ]);
    }
}
