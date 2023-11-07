/**
 *  * APIに関するクラス
 */
class Api {
  #param = {};
  #result = {};

  /**
   **  * リクエストパラメータを設定する
   **  * @param {integer} zaikoCode - 在庫コード
   **  * @param {integer} itemCode - 物品コード
   **  * @param {string} itemName - 物品名
   **  * @param {string} status - ステータス
   **  * @param {string} sort - ソート項目
   **  * @param {string} order - ソート順
   **  * @param {integer} page - ページ番号
   **/
  #setParam(zaikoCode, itemCode, itemName, status, sort, order, page) {
    this.#param.id = zaikoCode;
    this.#param.itemCode = itemCode;
    this.#param.itemName = itemName;
    this.#param.status = status;
    this.#param.sort = sort;
    this.#param.order = order;
    this.#param.page = page;
  }

  /**
   **  * 検索APIを実行する
   **  * @param {integer} zaikoCode - 在庫コード
   **  * @param {integer} itemCode - 物品コード
   **  * @param {string} itemName - 物品名
   **  * @param {string} status - ステータス
   **  * @param {string} sort - ソート項目
   **  * @param {string} order - ソート順
   **  * @param {integer} page - ページ番号
   **/
  async fireApi(zaikoCode, itemCode, itemName, status, sort, order, page) {
    this.#setParam(zaikoCode, itemCode, itemName, status, sort, order, page);
    await $.ajax({
      dataType: 'json',
      contentType: 'application/json',
      url: `/api/zaiko/list`,
      type: 'get',
      data: this.#param,
      beforeSend: () => { $('#loading').show(); },
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      }
    }).done((res) => {
      this.result = res;
      return true;
    }).fail((jqXHR, textStatus, errorThrown) => {
      UIkit.notification(errorThrown, { status: 'danger', timeout: 2000 });
      this.result = {};
      return false;
    }).always(() => {
      setInterval(() => { $('#loading').hide() }, 1000);
    });
  }

  get result() { return this.#result; }
  set result(arg) { this.#result = arg; }
}

export let api = new Api();