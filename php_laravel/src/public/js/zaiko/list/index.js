import { api } from "../../api.js";
import { aside } from "./aside.js";
import { footer } from "./footer.js";
import { listBody } from "./listBody.js";
import { listHeader } from "./listHeader.js";
import { search } from "./search.js";

// 初期表示時
$(document).on("DOMContentLoaded", async function(e){
  await commonSearchLogic();
  footer.updatePageSelectChoice();
});

// 検索ボタンを押下したとき
$(document).on("click", '#searchBtn', async function(e){
  search.updateSearch();
  footer.moveFirstPage();
  await commonSearchLogic();
  footer.updatePageSelectChoice();
});

// ソートボタンを押下したとき
$(document).on('click', '#listSection thead th', async function(e){
  listHeader.updateArrow(e.currentTarget);
  await commonSearchLogic();
});

// 一覧行を押下したとき
$(document).on('click', '#listSection tbody tr', async function(e){
  listBody.updateLineColor(e.currentTarget);
  aside.update(e.currentTarget);
  aside.open();
});

// 最初ページボタンを押下したとき
$(document).on('click', '#firstPageBtn', async function(e){
  footer.moveFirstPage();
  await commonSearchLogic();
});

// 前ページボタンを押下したとき
$(document).on('click', '#beforePageBtn', async function(e){
  footer.moveBeforePage();
  await commonSearchLogic();
});

// ページセレクトボックスを切り替えしたとき
$(document).on('change', '#pageSelect', async function(e){
  footer.updatePageSelect(Number($('#pageSelect').val()));
  await commonSearchLogic();
});

// 後ページボタンを押下したとき
$(document).on('click', '#afterPageBtn', async function(e){
  footer.moveAfterPage();
  await commonSearchLogic();
});

// 最後ページボタンを押下したとき
$(document).on('click', '#lastPageBtn', async function(e){
  footer.moveLastPage();
  await commonSearchLogic();
});

// 閉じるボタンを押下したとき
$(document).on('click', '#closeBtn', async function(e){
  listBody.removeLineColor();
  aside.close()
});

// 共通の検索ロジック
async function commonSearchLogic() {
  aside.close();
  await api.fireApi(
    search.itemCode, 
    search.itemName,
    search.status, 
    search.registUser, 
    search.updateUser, 
    listHeader.sort, 
    listHeader.order, 
    footer.page
  );
  listBody.updateLines(api.result.zaikoList);
  footer.updateTotalCount(api.result.total);
}
