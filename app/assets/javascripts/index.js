const listApi = new ListApi();
const search = new Search();
const listHeader = new ListHeader();
const listBody = new ListBody();
const aside = new Aside();
const footer = new Footer();

const itemCode = search.itemCode;
const itemName = search.itemName;
const status = search.status;
const registUser = search.registUser;
const updateUser = search.updateUser;
const sort = listHeader.sort;
const order = listHeader.order;
const page = footer.page;


// 初期表示時
document.addEventListener('DOMContentLoaded', async function(e){
  await listApi.fireApi(itemCode, itemName, status, registUser, updateUser, sort, order, page);
  listBody.updateLines(listApi.result.zaikoList);
  footer.updateTotalCount(listApi.result.total);
});

// 検索ボタンを押下したとき
document.querySelector('#searchBtn').addEventListener('click', async function(e){
  search.updateSearch();
  aside.close();
  await listApi.fireApi(itemCode, itemName, status, registUser, updateUser, sort, order, page);
  listBody.updateLines(listApi.result.zaikoList);
  footer.updateTotalCount(listApi.result.total);
});

// ソートボタンを押下したとき
document.querySelectorAll('.listHeader').forEach(function(row) {
  row.addEventListener('click', async function(e){
    listHeader.updateArrow(e.currentTarget);
    aside.close();
    await listApi.fireApi(itemCode, itemName, status, registUser, updateUser, sort, order, page);
    listBody.updateLines(listApi.result.zaikoList);
    footer.updateTotalCount(listApi.result.total);
  });
});

// 一覧行を押下したとき
document.querySelectorAll('.listLine').forEach(function(line) {
  line.addEventListener('click', async function(e){
    listBody.updateLineColor(e.currentTarget);
    aside.update(e.currentTarget);
    aside.open();
  });
});

// 最初ページボタンを押下したとき
document.querySelector('#firstPageBtn').addEventListener('click', async function(e){
  footer.moveFirstPage();
  aside.close();
  await listApi.fireApi(itemCode, itemName, status, registUser, updateUser, sort, order, page);
  listBody.updateLines(listApi.result.zaikoList);
  footer.updateTotalCount(listApi.result.total);
});

// 前ページボタンを押下したとき
document.querySelector('#beforePageBtn').addEventListener('click', async function(e){
  footer.moveBeforePage();
  aside.close();
  await listApi.fireApi(itemCode, itemName, status, registUser, updateUser, sort, order, page);
  listBody.updateLines(listApi.result.zaikoList);
  footer.updateTotalCount(listApi.result.total);
});

// ページセレクトボックスを切り替えしたとき
document.querySelector('#pageSelect').addEventListener('change', async function(e){
  footer.updatePageSelect($('#pageSelect').val());
  aside.close();
  await listApi.fireApi(itemCode, itemName, status, registUser, updateUser, sort, order, page);
  listBody.updateLines(listApi.result.zaikoList);
  footer.updateTotalCount(listApi.result.total);
});

// 後ページボタンを押下したとき
document.querySelector('#afterPageBtn').addEventListener('click', async function(e){
  footer.moveAfterPage();
  aside.close();
  await listApi.fireApi(itemCode, itemName, status, registUser, updateUser, sort, order, page);
  listBody.updateLines(listApi.result.zaikoList);
  footer.updateTotalCount(listApi.result.total);
});

// 最後ページボタンを押下したとき
document.querySelector('#lastPageBtn').addEventListener('click', async function(e){
  footer.moveLastPage();
  aside.close();
  await listApi.fireApi(itemCode, itemName, status, registUser, updateUser, sort, order, page);
  listBody.updateLines(listApi.result.zaikoList);
  footer.updateTotalCount(listApi.result.total);
});

// 閉じるボタンを押下したとき
document.querySelector('#closeBtn').addEventListener('click', async function(e){
  listBody.removeLineColor();
  aside.close()
});
