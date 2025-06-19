document.querySelectorAll('.choice-button').forEach(button => {
    button.addEventListener('click', async () => {
        const userChoice = button.dataset.choice;
        const res = await fetch('/api/coin-toss', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ choice: userChoice })
        });
        const data = await res.json();
        document.getElementById('result').textContent =
            `あなたの選択：${data.user_choice}｜結果：${data.coin_result}｜${data.message}`;
        document.getElementById('score').textContent =
            `勝ち数：${data.win_count}｜試行回数：${data.total_count}`;
    });
});

document.getElementById('reset-button').addEventListener('click', async () => {
    const res = await fetch('/reset', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    });

    const data = await res.json();
    document.getElementById('score').innerText = '勝ち数：0｜試行回数：0';
    document.getElementById('result').innerText = 'リセットしました';
});
