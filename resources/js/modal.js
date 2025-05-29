document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('detailModal');
    const closeBtn = document.querySelector('.modal .close');

    // 「詳細」ボタンにイベントを設定
    document.querySelectorAll('.detail-button').forEach(button => {
    button.addEventListener('click', () => {
        // data-* 属性から値を取得
        document.getElementById('modal-name').textContent = button.dataset.name;
        document.getElementById('modal-gender').textContent = button.dataset.gender;
        document.getElementById('modal-email').textContent = button.dataset.email;
        document.getElementById('modal-tel').textContent = button.dataset.tel;
        document.getElementById('modal-address').textContent = button.dataset.address;
        document.getElementById('modal-building').textContent = button.dataset.building;
        document.getElementById('modal-category').textContent = button.dataset.category;
        document.getElementById('modal-content').textContent = button.dataset.content;

        // 削除フォームのURLをセット
        document.getElementById('deleteForm').action = button.dataset.deleteUrl;

        // モーダルを表示
        modal.style.display = 'block';
      });
    });

    // 閉じるボタンをクリックしたら非表示に
    closeBtn.addEventListener('click', () => {
      modal.style.display = 'none';
    });

    // モーダルの外をクリックしても閉じる
    window.addEventListener('click', (event) => {
      if (event.target === modal) {
        modal.style.display = 'none';
      }
    });
});