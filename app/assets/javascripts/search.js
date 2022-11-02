/**
 **  * 検索条件の描画に関するクラス
 **/
class Search{
  #itemCode = "";
  #itemName = "";
  #status = "";
  #registUser = "";
  #updateUser = "";

  /**
   **  * 検索パラメータの更新を行う
   **/
  updateSearch(){
    this.itemCode = $('#itemCodeInput').val();
    this.itemName = $('#itemNameInput').val();
    this.status = $('#statusSelect').val();
    this.registUser = $('#registUserInput').val();
    this.updateUser = $('#updateUserInput').val();
  }

  get itemCode(){ return this.#itemCode; }
  set itemCode(arg){ this.#itemCode = arg; }
  get itemName(){ return this.#itemName; }
  set itemName(arg){ this.#itemName = arg; }
  get status(){ return this.#status; }
  set status(arg){ this.#status = arg; }
  get registUser(){ return this.#registUser; }
  set registUser(arg){ this.#registUser = arg; }
  get updateUser(){ return this.#updateUser; }
  set updateUser(arg){ this.#updateUser = arg; }
}
