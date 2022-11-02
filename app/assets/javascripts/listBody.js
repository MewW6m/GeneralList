/**
 *  * 一覧ボディの描画に関するクラス
 */
class ListBody {
  /**
   *  * 行を更新する
   *  * @param {jsonObject} json - 更新データ
   */
  updateLines(zaikoList){
    $('#listSection tbody').empty();

    $.each(zaikoList, (i, line) => {
      let tr = '<tr class="listLine">';
      tr += '<td class="uk-text-nowrap" data-row="zaikoCode"> ' + line['zaikoCode'] + '</td>';
      tr += '<td class="uk-text-nowrap" data-row="itemCode"> ' + line['itemCode'] + '</td>';
      tr += '<td class="uk-text-nowrap" data-row="itemName"> ' + line['itemName'] + '</td>';
      tr += '<td class="uk-text-nowrap" data-row="status"> ' + line['status'] + '</td>';
      tr += '<td class="uk-text-nowrap" data-row="registUser"> ' + line['registUser'] + '</td>';
      tr += '<td class="uk-text-nowrap" data-row="registDate"> ' + line['registDate'] + '</td>';
      tr += '<td class="uk-text-nowrap" data-row="updateUser"> ' + line['updateUser'] + '</td>';
      tr += '<td class="uk-text-nowrap" data-row="updateDate"> ' + line['updateDate'] + '</td>';
      tr += '<td class="uk-text-nowrap" data-row="registMail" style="display:none;"> ' + line['registMail'] + '</td>';
      tr += '<td class="uk-text-nowrap" data-row="registOrgName" style="display:none;"> ' + line['registOrgName'] + '</td>';
      tr += '<td class="uk-text-nowrap" data-row="updateMail" style="display:none;"> ' + line['updateMail'] + '</td>';
      tr += '<td class="uk-text-nowrap" data-row="updateOrgName" style="display:none;"> ' + line['updateOrgName'] + '</td>';
      tr += '<td> ' + '</tr>';
      $('#listSection tbody').append(tr);
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
