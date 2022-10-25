var searchParam = {};
var sortParam = {};
var pageParam = {};
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

