/**
 *  * APIに関するクラス
 */
class Api {
  #param = {};
  #result = {};

  /**
   **  * リクエストパラメータを設定する
   **  * @param {string} itemCode - 物品コード
   **  * @param {string} itemName - 物品名
   **  * @param {string} status - ステータス
   **  * @param {string} registUser - 登録ユーザ
   **  * @param {string} updateUser - 更新ユーザ
   **  * @param {string} sort - ソート項目
   **  * @param {string} order - ソート順
   **  * @param {string} page - ページ番号
   **/
  #setParam(itemCode, itemName, status, registUser, updateUser, sort, order, page){
    this.#param.itemCode = itemCode;
    this.#param.itemName = itemName;
    this.#param.status = status;
    this.#param.registUser = registUser;
    this.#param.updateUser = updateUser;
    this.#param.sort = sort;
    this.#param.order = order;
    this.#param.page = page;
  }

  /**
   **  * 検索APIを実行する
   **  * @param {string} itemCode - 物品コード
   **  * @param {string} itemName - 物品名
   **  * @param {string} status - ステータス
   **  * @param {string} registUser - 登録ユーザ
   **  * @param {string} updateUser - 更新ユーザ
   **  * @param {string} sort - ソート項目
   **  * @param {string} order - ソート順
   **  * @param {string} page - ページ番号
   **/
  async fireApi(itemCode, itemName, status, registUser, updateUser, sort, order, page){
    this.#setParam(itemCode, itemName, status, registUser, updateUser, sort, order, page);
    await $.ajax({
	url: `/lists/1`,
	type: 'get', 
        data: this.#param,
	beforeSend: () => { $('#loading').show(); }
      }).done((res) => {
        this.result = res;
        return true;
      }).fail((jqXHR, textStatus, errorThrown) => {
        UIkit.notification(errorThrown,{status: 'danger', timeout: 2000});
        this.result = {};
        return false;
      }).always(()=>{
        setInterval(() => {$('#loading').hide()}, 1000);
      });
  }

  get result(){ return this.#result; }
  set result(arg){ this.#result = arg; }
}

export let api = new Api();