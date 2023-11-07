/**
 **  * 検索条件の描画に関するクラス
 **/
export class Search{
  #zaikoCode = 0;
  #itemCode = 0;
  #itemName = "";
  #status = "";

  /**
   **  * 検索パラメータの更新を行う
   **/
  updateSearch(){
    this.zaikoCode = Number($('#zaikoCodeInput').val());
    this.itemCode = Number($('#itemCodeInput').val());
    this.itemName = $('#itemNameInput').val();
    this.status = $('#statusSelect').val();
  }

  get zaikoCode(){ return this.#zaikoCode; }
  set zaikoCode(arg){ if (typeof arg !== "number") throw new Error(""); this.#zaikoCode = arg; }
  get itemCode(){ return this.#itemCode; }
  set itemCode(arg){ if (typeof arg !== "number") throw new Error(""); this.#itemCode = arg; }
  get itemName(){ return this.#itemName; }
  set itemName(arg){ if (typeof arg !== "string") throw new Error(""); this.#itemName = arg; }
  get status(){ return this.#status; }
  set status(arg){ if (typeof arg !== "string") throw new Error(""); this.#status = arg; }
}

export let search = new Search();