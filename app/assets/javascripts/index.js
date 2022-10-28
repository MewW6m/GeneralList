// 定義
var searchParam = {};
var sortParam = {};
var pageParam = {};
const listHeader = new ListHeader();
const listBody = new ListBody();
const aside = new Aside();
const footer = new Footer();


// イベントリスナー
// 初期表示時
document.addEventListener('DOMContentLoaded', function(e){
  console.log('DOMContentLoaded')
});
// 検索ボタンを押下したとき
document.querySelector('#searchBtn').addEventListener('click', function(e){
  console.log('ClickSearchButton')
});
// ソートボタンを押下したとき
document.querySelectorAll('.listHeader').forEach(function(row) {
  row.addEventListener('click', function(e){
    listHeader.updateArrow(e.currentTarget);
  });
});
// 一覧行を押下したとき
document.querySelectorAll('.listLine').forEach(function(line) {
  line.addEventListener('click', function(e){
    listBody.updateLineColor(e.currentTarget);
    aside.update(e.currentTarget);
    aside.open();
  });
});
// 最初ページボタンを押下したとき
document.querySelector('#firstPageBtn').addEventListener('click', function(e){
  footer.moveFirstPage();
});
// 前ページボタンを押下したとき
document.querySelector('#beforePageBtn').addEventListener('click', function(e){
  footer.moveBeforePage();
});
// ページセレクトボックスを切り替えしたとき
document.querySelector('#pageSelect').addEventListener('change', function(e){
  footer.updatePageSelect($('#pageSelect').val());
});
// 後ページボタンを押下したとき
document.querySelector('#afterPageBtn').addEventListener('click', function(e){
  footer.moveAfterPage();
});
// 最後ページボタンを押下したとき
document.querySelector('#lastPageBtn').addEventListener('click', function(e){
  footer.moveLastPage();
});
// 閉じるボタンを押下したとき
document.querySelector('#closeBtn').addEventListener('click', function(e){
  listBody.removeLineColor();
  aside.close()
});



const getList = (searchParam, sortParam, pageParam) => {
	return new Promise((resolve, reject) => {
		var xhr = new XMLHttpRequest();
		const url = `/lists/1`;
		xhr.onload = (e) => {
			if (xhr.status === 200) {
				resolve(xhr.response);
			} else {
				reject(JSON.parse(xhr.response));
			}
		}
		xhr.open("GET", url, true);
		xhr.send();
	});
};

getList(searchParam,sortParam,pageParam)
.then((data) => {
})
.catch((err) => {
});
