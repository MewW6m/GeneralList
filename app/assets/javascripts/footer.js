/**
 *  * フッターの描画に関するクラス
 */
class Footer {
  #page = 1;
  #totalCount = 0; 

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
    this.updatePageSelect(this.page + 1);

  }

  /**
   *  * 最後のページに移動する
   */
  moveLastPage(){
    this.updatePageSelect(Math.floor(this.TotalCount/this.getPage));
  }

  /**
   *  * ページ番号を更新する
   *  * @param {number} num - ページ番号
   */
  updatePageSelect(num){
    this.page = num;
    $('#pageSelect').val(num);
  }

  /**
   *  * 件数を更新する
   *  * @param {number} num - 件数 
   */
  updateTotalCount(num){
    this.totalCount = num;
    $('#totalCount').text(num); 
  }

  get page(){ return this.#page; }
  set page(arg){ this.#page = arg; }
  get totalCount(){ return this.#totalCount; }
  set totalCount(arg){ this.#totalCount = arg; }
}
