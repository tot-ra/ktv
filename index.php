<html>
<body style="margin:0;padding:0">

<article style="width:100%;">
	<div id="player"></div>
</article>

<div style="margin: 0 auto;width: 200px;">
	<button type="button" id="mark_seen">✔ Видели</button>
	<br />
	<div style="clear:both;">
		<input type="checkbox" id="switch_series" value="1" checked/>
		Переключать сериал
	</div>
</div>

<div style="display: flex;width:100%; flex-direction: column;">
	<div id="filter">Возраст: <input type="number" id="age" min=0 max=18 /></div>
	<menu id="menu"></menu>

	<aside>
		<nav id="nav"></nav>
	</aside>
</div>

<script language="JavaScript">
	var seriesShows;
	var tv, episode;
	var player;
	var views = localStorage.getItem('views');

	function init() {
		tv = getQueryParam('tv') || 1;
		episode = parseInt(getQueryParam('e')) || 1;

		render();
	}

	function getQueryParam(param) {
		var found;
		window.location.hash.substr(1).split("&").forEach(function (item) {
			if (param == item.split("=")[0]) {
				found = item.split("=")[1];
			}
		});
		return found;
	}

	function updateUrl() {
		window.location.hash = `tv=${tv}&e=${episode}`;
	}

	function findFirstUnseenEpisode(tv) {
		var seenEpisodes = getSeenEpisodes(tv);
		for (var ep = 1; ep < seriesShows[tv].series.length; ep++) {
			if (seenEpisodes.indexOf(ep) === -1) {
				return ep;
			}
		}
		return null;
	}

	function pickRandomTV() {
		var min = 1;
		var max = Object.keys(seriesShows).length;
		return Math.floor(Math.random() * (max - min + 1) + min)
	}

	function goToNext(player, t, ep) {
		tv = document.getElementById('switch_series').checked ? pickRandomTV() : t;
		episode = findFirstUnseenEpisode(tv);
		if (!episode) {
			tv = pickRandomTV();
			episode = findFirstUnseenEpisode(tv);
		}
		updateUrl();
		openEpisode(tv, episode);
	}

	function openEpisode(tv, ep = 1) {
		episode = ep;
		player.loadVideoById(seriesShows[tv].series[ep - 1]);
		render();
	}

	function markAsSeen(tv, ep) {
		var views = window.localStorage.getItem('views');
		if (!views) {
			views = {};
		} else {
			views = JSON.parse(views);
		}

		if (!views[tv]) {
			views[tv] = [];
		}

		views[tv].push(ep);
		window.localStorage.setItem('views', JSON.stringify(views));
	}

	function getSeenEpisodes(tv) {
		var views = window.localStorage.getItem('views');
		if (!views) {
			return [];
		}

		views = JSON.parse(views);

		if (!views[tv]) {
			return [];
		}

		return views[tv];
	}

	function getMenuHtml(seriesShows, tv) {
		var menuHtml = '';
		for (var key in seriesShows) {
			if (seriesShows[key]) {
				var currentClass = key == tv ? 'current' : '';
				menuHtml += `<div class="tv">
<a href="#tv=${key}&e=0" onclick="openEpisode(${key})" class="${currentClass}">${seriesShows[key].title}</a>
</div>`
			}
		}
		return menuHtml;
	}

	function getNavHtml(seriesShows, tv, episode, seenEpisodes) {
		var navHtml = '';
		for (var ep = 1; ep < seriesShows[tv].series.length + 1; ep++) {
			var currentClass = ep == episode ? 'current' : '';
			var seenClass = seenEpisodes.indexOf(ep) !== -1 ? 'seen' : '';
			navHtml += `<a class="ep ${currentClass} ${seenClass}"
onclick="openEpisode(${tv},${ep})"
href="#tv=${tv}&e=${ep}">${ep}</a>`
		}
		return navHtml;
	}

	function render() {
		document.getElementById('nav').innerHTML = getNavHtml(seriesShows, tv, episode, getSeenEpisodes(tv));
		document.getElementById('menu').innerHTML = getMenuHtml(seriesShows, tv);
	}

	function loadPage(ss) {
		seriesShows = ss;

		document.getElementById('mark_seen').addEventListener('click', () => {
			markAsSeen(tv, episode);
			goToNext(player, tv, episode);
			render();
		});

		window.addEventListener("hashchange", init, false);
		initYoutubePlayer(tv, episode);
		init();

	}

	// 4. The API will call this function when the video player is ready.
	function onPlayerReady(event) {
		event.target.playVideo();
	}

	// needs to be in global scope
	function onYouTubeIframeAPIReady() {
		player = new YT.Player('player', {
			height: '470',
			width: '100%',
			videoId: seriesShows[tv].series[episode - 1],
			events: {
				'onReady': (event) => {
					event.target.playVideo();
				},
				'onStateChange': (event) => {
					if (event.data == YT.PlayerState.ENDED) {
						markAsSeen(tv, episode);
						// player.stopVideo();
						goToNext(player, tv, episode);
					}
				}
			},
			playerVars: {rel: 0, showinfo: 0, ecver: 2}
		});
	}

	function initYoutubePlayer(tv, episode) {
		// youtube player
		var tag = document.createElement('script');
		tag.src = "https://www.youtube.com/iframe_api";
		var firstScriptTag = document.getElementsByTagName('script')[0];
		firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
	}

	// get playlist
	var xmlhttp = new XMLHttpRequest();
	var url = "playlist.json";

	xmlhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			loadPage(JSON.parse(this.responseText));
		}
	};
	xmlhttp.open("GET", "playlist.json", true);
	xmlhttp.send();
</script>

<style>
	body {
		font-family: Arial;
	}

	#menu {
		background: #fff8ac;
		border-radius: 5px;
		padding: 7px;
		margin: 0;

		display: flex;
		flex-wrap: wrap;
	}
	#menu div{
		flex: 1 1 160px; /* explanation below */
		margin: 5px;
	}

	#filter{
		background: #ffe885;
		padding: 7px;
	}

	#filter input{
		padding: 3px;
		font-size:15px;
	}

	.tv {
		margin: 0 5px;
	}

	.tv .current {
		font-weight: bold;
	}

	#nav {
		padding: 5px;
		margin: 5px;
	}

	#nav a {
		display: inline-block;
		padding: 5px 10px;
		border-radius: 20px;
		text-decoration: none;
		margin: 1px;
		color: white;
		background: #159b15;
		float: left;
		border: 2px solid white;
	}

	#nav a.seen {
		color: white;
		background: #ef2525;
	}

	#nav a.current {
		font-weight: bold;
		border: 2px solid black;
		background: yellow;
		color:black;
	}

	button {
		font-size: 20px;
		padding: 20px;
		border-radius: 3px;
	}

	aside {
		padding: 10px 0;
		flex:1;
	}

	#mark_seen {
		background: #ef2525;
		color: white;
		height: 100px;
		width: 180px;
	}

	#next {
		background: #159b15;
		color: white;
	}
</style>
</body>
</html>
