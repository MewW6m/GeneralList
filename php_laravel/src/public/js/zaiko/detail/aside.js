/**
 *  * 横パネルの描画に関するクラス
 */
export class Aside {
  /**
   *  * 横パネルを開く
   */
  open() {
    $('aside').show('slide');
  }

  /**
   *  * 横パネルを閉じる
   */
  close() {
    $('aside').hide('slide');
  }

  /**
   *  * 横パネルのデータを更新する
   *  * @param {object} elm - 押下した要素(一覧行)
   */
  update(elm) {
    $(elm).children().each((i, e) => {
      $('aside input[data-row=' + $(e).data('row') + ']').val($(e).text());
    });
    $('aside').scrollTop(0);
  }
}

export let aside = new Aside();