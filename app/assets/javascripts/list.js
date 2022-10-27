// 定義
var searchParam = {};
var sortParam = {};
var pageParam = {};


// イベントリスナー
// 初期表示時
$(document)[0].addEventListener('DOMContentLoaded', function(){console.log('DOMContentLoaded')});
// 検索ボタンを押下したとき
$('#searchBtn')[0].addEventListener('click', function(){console.log('ClickSearchButton')});
// 在庫コードソートボタンを押下したとき
$('#zaikoCodeHeader')[0].addEventListener('click', function(){console.log('ClickZaikoCodeHeader')});
// 物品コードソートボタンを押下したとき
$('#itemCodeHeader')[0].addEventListener('click', function(){console.log('ClickItemCodeHeader')});
// 物品名ソートボタンを押下したとき
$('#itemNameHeader')[0].addEventListener('click', function(){console.log('ClickItemNameHeader')});
// ステータスソートボタンを押下したとき
$('#statusHeader')[0].addEventListener('click', function(){console.log('ClickStatusHeader')});
// 登録者ソートボタンを押下したとき
$('#registUserHeader')[0].addEventListener('click', function(){console.log('ClickRegistUserHeader')});
// 登録日時ソートボタンを押下したとき
$('#registDateHeader')[0].addEventListener('click', function(){console.log('ClickRegistDateHeader')});
// 更新者ソートボタンを押下したとき
$('#updateUserHeader')[0].addEventListener('click', function(){console.log('ClickUpdateUserHeader')});
// 更新日時ソートボタンを押下したとき
$('#updateDateHeader')[0].addEventListener('click', function(){console.log('ClickUpdateDateHeader')});
// 一覧行を押下したとき
$('.listLine')[0].addEventListener('click', function(){console.log('ClickListLine')});
// 最初ページボタンを押下したとき
$('#firstPageBtn')[0].addEventListener('click', function(){console.log('ClickFIrstPageBtn')});
// 前ページボタンを押下したとき
$('#beforePageBtn')[0].addEventListener('click', function(){console.log('ClickBeforePageBtn')});
// 後ページボタンを押下したとき
$('#afterPageBtn')[0].addEventListener('click', function(){console.log('ClickAfterPageBtn')});
// 最後ページボタンを押下したとき
$('#lastPageBtn')[0].addEventListener('click', function(){console.log('ClickLastPageBtn')});
// 閉じるボタンを押下したとき
$('#closeBtn')[0].addEventListener('click', function(){console.log('ClickCloseBtn')});


// 機能

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

// sort
document.querySelectorAll('.uk-text-nowrap span').forEach(e => e.setAttribute('uk-icon', 'icon: none'));
document.querySelectorAll('.uk-text-nowrap span svg').forEach(e => e.remove());

document.querySelector('.uk-text-nowrap span').setAttribute('uk-icon', 'icon: triangle-down');
document.querySelector('.uk-text-nowrap span').setAttribute('uk-icon', 'icon: triangle-up');

