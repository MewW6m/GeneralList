/**
 *  * 検索APIに関するクラス
 */
class ListApi {
  #param = {};
  #result = {};

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
   ** * 検索APIを実行する
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

  get result(){
    return this.#result;
  }

  set result(arg){
    this.#result = arg;
  }
}
