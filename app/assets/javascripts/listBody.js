/**
 *  * 一覧ボディの描画に関するクラス
 */
class ListBody {
  /**
   *  * 行を更新する
   *  * @param {jsonObject} json - 更新データ
   */
  updateLines(zaikoList){
    $.each(zaikoList, (i, line) => {
      console.log(line['zaikoCode']);
      console.log(line['itemCode']);
      console.log(line['itemName']);
      console.log(line['status']);
      console.log(line['registUser']);
      console.log(line['registMail']);
      console.log(line['registOrgName']);
      console.log(line['registDate']);
      console.log(line['updateUser']);
      console.log(line['updateMail']);
      console.log(line['updateOrgName']);
      console.log(line['updateDate']);
    })
  }

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
