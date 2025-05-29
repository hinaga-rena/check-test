<!-- モーダル -->
<div id="detailModal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>FashionablyLate</h2>

        <table class="detail-table">
            <tr>
                <th>お名前</th>
                <td id="modal-name">山田　太郎</td>
            </tr>
            <tr>
                <th>性別</th>
                <td id="modal-gender">男性</td>
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td id="modal-email">test@example.com</td>
            </tr>
            <tr>
                <th>電話番号</th>
                <td id="modal-tel">08012345678</td>
            </tr>
            <tr>
                <th>住所</th>
                <td id="modal-address">東京都渋谷区千駄ヶ谷1-2-3</td>
            </tr>
            <tr>
                <th>建物名</th>
                <td id="modal-building">千駄ヶ谷マンション101</td>
            </tr>
            <tr>
                <th>お問い合わせの種類</th>
                <td id="modal-category">商品の交換について</td>
            </tr>
            <tr>
                <th>お問い合わせ内容</th>
                <td id="modal-content">届いた商品が注文した商品ではありませんでした。商品の交換をお願いします。</td>
            </tr>
        </table>

        <form method="POST" action="" id="deleteForm">
        @csrf
        @method('DELETE')
        <div class="modal-actions">
            <button type="submit" class="delete-btn">削除</button>
        </div>
        </form>
    </div>
</div>