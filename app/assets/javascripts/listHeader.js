/**
 *  * 一覧ヘッダの描画に関するクラス
 */
class ListHeader {
  #sort = ""; #order = "";

  /**
   *  * 矢印を更新する
   *  * @param {object} elm - 押下した要素
   */
  updateArrow(elm) {
    let updownFlag = false;
    if ($(elm).find('span').attr('uk-icon') == 'icon: triangle-down') { updownFlag = true; }

    $('.uk-text-nowrap span').each((i, e) => { // resetArrow
      $(e).attr('uk-icon', 'icon: none');
      $(e).children().remove();
    });

    if (updownFlag) {
      $(elm).find('span').attr('uk-icon', 'icon: triangle-up');
    } else {
      $(elm).find('span').attr('uk-icon', 'icon: triangle-down');
    }
  }

  get sort(){ return this.#sort; }
  set sort(arg){ this.#sort = arg; }
  get order(){ return this.#order; }
  set order(arg){ this.#order = arg; }
}
