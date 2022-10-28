// 機能
/**
 *  * 検索APIに関するクラス
 */
class ListApi {
  Connect(){}
  init(){}
  search(){}
  sort(){}
  paging(){}
}

/**
 *  * 一覧ヘッダの描画に関するクラス
 */
class ListHeader {
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
}

/**
 *  * 一覧ボディの描画に関するクラス
 */
class ListBody {
  /**
   *  * 行を更新する
   *  * @param {jsonObject} json - 更新データ
   */
  updateLines(json){}

  /**
   *  * 行の色を更新する
   *  * @param {object} elm - 押下した要素
   */
  updateLineColor(elm){
    $('.clicked-line').removeClass('clicked-line');
    $(elm).addClass('clicked-line');
  }

  /**
   *  * 行の色をリセットする
   */
  removeLineColor(){
    $('.clicked-line').removeClass('clicked-line');
  }
}

/**
 *  * 横パネルの描画に関するクラス
 */
class Aside {
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
  }
}

/**
 *  * フッターの描画に関するクラス
 */
class Footer {
  pageNum = 1;
  lineNum = 0; 

  /**
   *  * 最初のページに移動する
   */
  moveFirstPage(){
    this.updatePageSelect(1);
  }

  /**
   *  * 前のページに移動する
   */
  moveBeforePage(){
    this.updatePageSelect(this.pageNum - 1);
  }

  /**
   *  * 次のページに移動する
   */
  moveAfterPage(){
    this.updatePageSelect(this.pageNum + 1);

  }

  /**
   *  * 最後のページに移動する
   */
  moveLastPage(){
    this.updatePageSelect(Math.floor(this.lineNum/this.pageNum));
  }

  /**
   *  * ページ番号を更新する
   *  * @param {number} num - ページ番号
   */
  updatePageSelect(num){
    this.pageNum = num;
    $('#pageSelect').val(num);
  }

  /**
   *  * 件数を更新する
   *  * @param {number} num - 件数 
   */
  updateLineNum(num){
    this.lineNum = num;
    $('#lineNum').val(num); 
  }
}
