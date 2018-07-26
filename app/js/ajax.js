get = function(href){
	var xhr = new XMLHttpRequest()
	xhr.open('GET',href,true)
	xhr.send()
	return xhr
}

post = function(href,link){
	var xhr = new XMLHttpRequest();
	xhr.open('POST', href, true);
	xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xhr.send('link='+link);
	return xhr
}

function loadMore(){
   return get(wp_api.ajaxUrl+'?action=get_projects&paged='+(+wp_api.paged+1)+(wp_api.term_id?'&term_id='+wp_api.term_id:''))
}
function loadMoreHandler(){
	var req = loadMore()
	var moreButton = document.getElementsByClassName('more-button')[0].children[0]
	moreButton.parentNode.children[1].style.opacity = 1
	req.onload = function(){
		wp_api.paged++
		var container = document.getElementsByClassName('flex-left projects')[0]
		container.innerHTML += this.response
		moreButton.parentNode.children[1].style.opacity = 0
		if(wp_api.paged >= wp_api.max_num_pages){
			moreButton.parentNode.style.display = 'none'
        }
    }
}
function loadMoreHandler_port(){
	var req = get(wp_api.ajaxUrl+'?action=get_ports&paged='+(+wp_api.paged+1))
	var moreButton = document.getElementsByClassName('more-button')[0].children[0]
	moreButton.parentNode.children[1].style.opacity = 1
	req.onload = function(){
		wp_api.paged++
		var container = document.getElementsByClassName('ports')[0]
		container.innerHTML += this.response
		moreButton.parentNode.children[1].style.opacity = 0
		if(wp_api.paged >= wp_api.max_num_pages){
			moreButton.parentNode.style.display = 'none'
        }
    }
}
function fetchAndInsert(link){
	selected = document.getElementsByClassName('portfolio-selected')[0]
	selected.style.transition = '0.7s'
	selected.style.opacity = 0.5
	post(wp_api.ajaxUrl + '?action=get_single_port',link).onload = function(){
		selected.innerHTML = this.response
		selected.style.opacity = 1
	}
}

if ('scrollRestoration' in history) {
  history.scrollRestoration = 'manual';
}
galleryHandler = function(href){
	history.pushState(null,null,href)
	fetchAndInsert(href)
	return false
}
window.addEventListener('popstate',function(e){
	fetchAndInsert(location.href)
},false)