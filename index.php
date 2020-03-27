<html>
<body style="margin:0;padding:0">

<article style="width:100%;">
	<div id="player"></div>
</article>

<div style="display: flex;width:100%;">
	<menu id="menu"></menu>

	<aside style="flex-grow:1;">
		<nav id="nav"></nav>
		<div style="clear:both;">
			<input type="checkbox" id="switch_series" value="1" checked/>
			Переключаться между сериалами после каждой серии
		</div>
	</aside>
	<button type="button" id="mark_seen">✔ Видели</button>
</div>

<script language="JavaScript">

	var views = localStorage.getItem('views');
	var tv, episode;

	function init() {
		tv = getQueryParam('tv') || 1;
		episode = parseInt(getQueryParam('e')) || 1;

		render();
	}

	var series = {
		// 0: "Малышарики",
		1: "Смешарики",
		2: "Три кота",
		// 3: "Фиксики",
		3: "Ми-ми-мишки",

		// 6: "Синий трактор",
		// 7: "Грузовичок Лёва",
		5: "Маша и медведь",
		6: "Лунтик",
		// 9: "Барбоскины",
		// 10: "Гора самоцветов",
		// 11: "Кротик и панда",
		// 12: "Тима тома",
		// 13: "котики вперед",
		//
		// 14: "катя и эф",
		// 15: "Веселая карусель",
		// 16: "Мишки Гамми",
		7: "Простоквашино",
		8: "Лео и тиг",
		9: "Тима тома",
		10: "Котики вперед",
		11: "Джинглики",
		12: "Чебурашка",
		13: "Винни Пух",
		14: "Робокар Поли",
		15: "Буренка Даша",
		16: "Котёнок и Волшебный гараж",
		17: "Ну, погоди!",
		18: "Викинг Вик",
		19: 'Летающие звери',
		20: 'Том и Джерри'
		// 19: "Четверо в кубе",


		//	Даша-Следопыт
		//	Супер крылья Джет
		//Пингвиненок Пороро
		//	робокар полли
		//	тайо
		//	Новые приключения медвежонка Паддингтона
		//	жили были искатели
		//	Зак шторм
		//	Буба
	};

	var shows = {
		// Смешарики
		1: [
			'-W2tJmIJltg',
			'rL8u4Y6holg',
			'U13KJMaJKk8',
			'oC27Mz_0r2A',
			'2s2pM5aAfBc',
			'odbwz_86Xvg',
			'Rc84ZglMJVY',
			'IZ2BQ0lQQv0',
			'DYgaq4lJd00',
			'-DzwOFVaMmQ',
			'JMCnGTNwXX0',
			'wVH6vZiWrl8',
			'B6qZlPXe_a4',
			'wC-mrwnfQZ0',
			'oGelCZ_cG1g',
			'rqAMbxbXr4c',
			'qpw-7O72DP8',
			'Iu9y-2nEAG0',
			'wvU2Y946C58',
			'D25OYJ4hdys',
			'38a0f-fXZCc',
			'pCdly8Bm5YY',
			'UsYe59gDCOI',
			'7F6eE0w4SWE',
			'8I1JS1cC8Mw',
			'ociddcCFe2Y',
			'okjt6KBVvaw',
			'1z8nmmFj8EQ',
			'jWwvuKaFsJc',
			'pUuSRISUpEQ',
			'WXjUaWMOOQw',
			'rhRexgFZ00A',
			'QSKYQKJq0ME',
			'rrgiVX5ulV0',
			'USMZm1QLPXs',
			'deSfIYuukCk',
			'ciq8VPeJHcI',
			'Ggp6bUL23mk',
			'j0TT6ZHxp0s',
			'x3HBYvvYufk',
			't8iggRi0MSU',
			'M4a5U9AIeac',
			'VEORBPrwuto',
			'pwEc7d0eUdg',
			'fgGz-tIF43c',
			'yhz_tbfoPNk',
			'HA2BbmebIDc',
			'iszyng98aLo',
			'gPrfogZBys0',
			'qPWSgPVNZq0',
			'iXQ81zQzw0Y',
			'47qA-RMRtVc',
			'PZRBcDn1BOM',
			'ngGOhNnkVd8',
			'-DzuecgGawo',
			'9IsFUwqf188',
			'9HkNyA55I70',
			'XwOtseL3btw',
			'MfdSBO1IPYo',
			'ifkQmUwx_QI',
			'2tkSZRrMRQE',
			'yOfYwFdqOVU',
			'TFYm7jOwhnM',
			'I5mNfhsimfA',
			'ywkGQskUbFk',
			'PYz64y9Ue-k',
			'ey-7n-dNUIs',
			'KSkaA0406Kw',
			'MTlwV2Yj1RI',
			'm4VFGJXr27g',
			'BX_WEjnr0_4',
			'iFU3cuX31F8',
			'uJxO8TMj-uI',
			'bKsPf-TZmOQ',
			'mNmG6dmToEc',
			'cXlM3ofUqKw',
			'nAhLGJHHdlQ',
			'yfPjfVryjMc',
			'li2r8KszZno',
			'opp3DPHlYZ4',
			'HVTilP58rCg',
			'2kXxiuPzsg4',
			'laQnmjBrd2o',
			'9GYbnREDGTo',
			'i-9FtF6ToPg',
			'dVYKNtI4UOA',
		],

		// три кота
		2: [
			'5V1Lm7GBhco',
			'vYrC74h7PJo',
			'cYCXlomatcY',
			'zM4ceRQDFig',
			'3xNCsdJFUuo',
			'KV6l70wds5o',
			'zqeNrsY6X1I',
			'oji5bfut2F4',
			'c464_Bsfp6s',
			'4e0KKzUrzDs',
			'xb_AJKhnTrA',
			'nZCqMg8jYzE',
			'EzIrXOtPdNU',
			'hrVbyebJEMo',
			'1ARSgRx7sLA',
			'7UooKUVssGQ',
			'adSi_AE8MG4',
			'R7lsibBLZH8',
			'dWZIAIdLiBI',
			'_n6q6s0Jx8o',
			'G8Y5q_CUK-I',
			'Xjj07HlV3es',
			'NTy-Bz7sdSQ',
			'B9PUP-gJRbw',
			'epNw9jnuUPI',
			'gdeEI4angiE',
			'ytBeU-o10ng'
		],

		//Ми-ми-мишки
		3: [
			'2JuQDG2PxMw',
			't3MI1CwVOqw',
			'2ZgsJjiI7RU',
			'sBvHfeRCZzA',
			'0HxnY3xkcW8',
			'HdHD2aNSfFU',
			'hS2GrXKBpEI',
			'iOzYXrxqHyA',
			'2AGWR9da1Uk',
			'6Ln0GbwnCFc',
			'I4z8CAZGWkc',
			'NZLTpewIcn4',
			'hmCOV3UuhcM',
			'uYaqiIQ8Nkg',
			'CMpOpH_UKg4',
			'GjnGurCVmHc',
			'kXJhM6qgl9Q',
			'crW-W7C_kHQ',
			'rewMdxcnnVE',
			'wJmezclS0nU',
			'2dSRO2rAxFM',
			'MogxkQndJlY',
			'J_bOzsz0JiI',
			'so0fob5iokY',
			'Ny0ZfuciqTA',
			'eDJeGgDnPqI',
			'ktBDymp09Vo',
			'TjTcZuMYea8',
			'yxx9xCJUvGU',
			'jbRwBTfUJvk'
		],
		// Маща
		5: [
			'1V3ZY_TXKwU',
			'o6wdh1KZeW0',
			'CU5o1wGnHsY',
			'zFr0egXs2eE',
			'sIWPQzDfLZo',
			'Cv93i0FHnNk',
			'GAvCFugqOYs',
			'xMGgU4zxDbo',
			'5yX6pakPFo0',
			'H9nzWmAFfNI',
			'lwiDLaEVSfI',
			'THMBD3fLO9U',
			'H17Dz1y9IUo',
			'Be0S-2_Dwh8',
			'8BMNqQQ-0as',
			'au85O1-Sqw0',
			'AqYsbttfgaQ',
			'zqhbZHvxYdE',
			'FWcCP8Dt2es',
			'Hfsgf9KwHRg',
			'Nmq1yU81ZyQ',
			'eTS53x2vgf8',
			'-OdXOlPeY9s',
			'jgeC3slsctk',
			'YZZAUsxfgX4',
			'sGcUenlQ_9I',
			'4H5K_2OBw6Q',
			'I1t8-QjiJ4U',
			'Al7K8ELBKI0',
			'YXh4Hr0Fl-c'
		],

		//Лунтик
		6: [
			'3Hz3kHRRISU',
			'slt7raw1ZEM',
			'XijaRayuc7k',
			'p8ydp7qdX5w',
			'rGEq-FpaclY',
			'qsHWUmNr0L0',
			'CwM5JXVMt_8',
			'yd42iEyVDK8',
			'wx71hjdgQFs',
			'ij7ejOpRjNQ',

			'28LFC5ORX6Q',
			'VIn8a7IqJRs',
			'3dJe5lCc_LY',
			'KWYQ4J3-sQk',
			'q1thnOrwGZ4',
			'a6vae9L6Hm4',
			'TyG9XKBrd8U',
			'NSf_KxfwwEQ',
			'3GyndkQ5N5I',
			'Ryv1AFzW8JA',

			'iMVpZOsSKLU',
			'io1jMsBWZHo',
			'D9ZdEBFMjvI',
			'wOp9_HSw9lA',
			'n9vyUK551JU',
			'gXIHLizmAS8',
			'xmSVNa599mM',
			'kYuNMP17DXw',
			'MFNHRiNtaMs',
			'SoKt2vLCv5w'
		],

		7: [
			'w8T_2oJ6OFQ',
			'7Gb7ORxkQbw',
			'wTLRSJH7Jj4',
			'IHEttUa2qNc',
			'31_HJ5fvfIQ',
			'e0-TJaWffaU',
			'nDOD4Psk7JE',
			'PWYk7b0J6wk',
			'thnw6QPKEOo',
			'toU9TmAKgpg',
			'Vzs6Ms0ta1U',
			'LJ4QQ2vh7AE',
			'pTQwx4sXf30',
			'JVoxfiH51es',
			'nZX4bdNDUr0',
			'5Az_HCrD8yo',
			'ZTIdRBFnyFc',
			'lO-b4pOA0Yk',
			'Pspcs8mJWZ0',
			'52BslVSHVEQ',
		],

		8: [
			'FeqXeTTPQrI',
			'Mwb037hUouU',
			'1wCWwFSgs7A',
			'xj3gYewb_j0',
			'xZrFszGTEZU',
			'5Erab5fc2p0',
			'ai6WXJlk_CY',
			'qbO4psDygSA',
			'0N0pd0n1YvQ',
			'RfxgGjGNLLs',
			'hMKmHJFp-mg',
			'E64qsnb_7Do',
			'Laf2lrPRBNs',
			'GlUR1M5tVJY',
			'iHmnXr_w6t8',
			'Ikabhk-0KRM',
			'96TdMyG6EPM',
			'd338k3GVXfQ',
			'jBh5EwljrXg',
			'vT2XR_QuNoA',
		],
		9: [
			'NdkzMGbhHw0',
			'yXqMFOyd8xM',
			'CzY2WKe4kW0',
			'wC7oTaLSaSk',
			'oXp9uwkTKB4',
			'K2WBxmf1JlY',
			'acrgyq2SsYk',
			'aZwgMXF_jDw',
			'2ge6SspJyK4',
			'6MnAmU9rso8',
		],

		10: [
			'jk5oF2fUcnY',
			'IAWAGrRdCHk',
			'KuZ7akIbn2Y',
			'YgJMWxglx94',
			'rVRyCUDCXXM',
			'PPgX1VnifVM',
			'AypmSRi5Khs',
			'8QyS9f8zl2w',
			'2ebqL3RaWoM',
			'-DOP7k0irQo',
			'N5rM0mdDGa8',
			'5TiRtnzccBE',
			'4CoEjEPwHnk',
			'o2_fyvfAcxQ',
			'JeVuG2RemI4',
			'r1T9JT3CFm0',
		],
		11: [
			'OAbMyko0rqM',
			'R3iUO8IiBDQ',
			'OvF-S3Ns_v4',
			'G8asJLAkGho',
			'VJ6BYRZJJyY',
			'AYEVAKhdyok',
			'mXOCEFtQrr0',
			'bh5Y8YxrwJ4',
			'9wMN0j5Sa-g',
			'rem54TXc-Eg',
			'u-XoZJFfuwo',
			'fLUg3XfcRZM',
			'MyIdjwIpfDU',
			'Rq9foxlhfCg',
		],
		12: [
			'C142fkaLLfc',
			'oO3IR6mIGLE',
			'MTwxi222RaQ',
			'ySgrvslaEb8'
		],
		13: [
			'VV_bis83NiQ',
			'lw5lOBDHkxQ',
			'Pa6NwJJCetA',

		],
		14: [
			'O16xBDBASxA',
			'O2_MLFa6oQE',
			'7_0fc9E8aUg',
			'TwkSon4t2oM',
			'1iMUx5RdzyQ',
			'FhHemHW2IMs',
			'TThWHFzi8SA',
			'KaInKbmgyDM',
			'aZOUAvomM78',
			'-0KP2SfCnp8',
			'q8hLGA6rxxI',
			'FVlGTPu1BB0',
			'_U3mq8odcLE',
			'WG_Spxq1DC8',
			'evR4cgzqMBI',
			'nNoyUI34YIw',
			'MQBrlkib4w0',
			'NbBX7H3jjxg',
			'kZPSPqpoChk',
		],
		15: [
			'zq_0DpJhrf0',
			'tm3CwlTaGBo',
			'osyfVwFZylY',
			'mzDfGCAPj7w',
			'rVhzGbEL1Ck',
			'5CI0i0qNnAE',
			'QaThmATIKKc',
			'Sm14jtTaMnA',
			's5ghOV42BRA',
			'fbkYEYrolvE',
			'0EAXBqyeM6M',
			'kMPocOpUCTM',
			'Co62knLMV7w',
			'wHtR5nYalYc',
			'aO-uc363GHE',
			'fnyD7onxY4g',
			'rmrWw1tzm7Q',
			'UwCgFdr7ys8',
			'SinGI1H6VZY',
			'xzI4O2C3WsM',
			'1ColdK3jxsI',
			'vmuGSNtChaU',
			'v5fPvTsbxMw',
			'lNCFjOIJNlM',
			'M_kV_9V-Ohc',
			'Wp4gnaLVd18',
			'AXKFuAasXA4',
			'PfW_1KT3Wnk',
			'qmkF5bSut0o',
			'X7J2fgRCIhk',
			'FETsfElpal4',
			'gRoXh7dauxQ',
			'sjCR61zupco',
			'QpDosEZoPzY',
			'gbRDPR2sCTc',
			'qBo-YdwZv_A',
			'ucyiChLwEnM',
			'OOEno315d10',
			'1ab2rbkjdds',
			'_N5OmX36bNM',
			'_3hEGh5CMOs',
			'ug-ucGZn_R4',
			'Ev3Hmfi1h5c',
			'B8EHkgaEURU',
			'nHr8aQPyhgM',
			'CvoUOg8YoOs',
			'drqQv1yfETg',
			'dJnZD0uj7S4',
			'94srCt8q8jc',
			'-QsrFXmvrV8',
			'xQVxEwa7qD8',
			'MYIe-DEDNes',
			's9_jww_DgWM',
			'tT7cGU8eYnk',
			'ODaEgorFzyc',
			'n27rDg1HdFo',
			'GYi6fU7Bqno',
			'mBrT4v0EIxU',
			'E0Aw_FTxuyU',
			'OhwDp5rwoCw',
			'Z1yKkgAWTcU',
			'xa9uFH8vF9k',
			'MuDVDhAD_5Q',
			'qKB9w3jHGPk'
		],
		16: [
			'Vd8REPrNPzs',
			'qQIHyOXuYLg',
			'g2yapU4qk5I',
			'CN8x07oGiKI',
			'ujP7cV5zRpI',
			'gQyWkrb4iVM',
			'mF1an0xnMLM',
			'Ms_3Zz3HYS0',
			'nbCXT2V2Hew',
			'zDucg7RiAgw',
			'spk9NUBeiFQ',
			'65GVopbAcFU'
		],
		17:[
			'QDDJLq2rs5Y',
			'llvrD15cEOI',
			'fbmpRPUbFHE',
			'dNuSSFZa9XU',
			'-P6meYInjlo',
			'ppWp90bBDD0',
			'k0nsQ-KPgrg',
			'e2WYkUwrHlE',
			'hylGDxa3ykI',
			'-PZmHw2fTlg',
			'LLr7BXipUvI',
			'ARtu-kd2Pqc',
			'LXlROQNR5cM',
			'ncHd3sxpEbo',
			'kxJXODbbAsE',
			'J0Z8r3_29xo',
			'ngXxhTjTINM',
			'nXOcRm1jiQY',
			'hBF0m_Iy9bw',
		],
		18:[
			'i_dp9mQ2sU4',
			'HQO7QvWF5rk',
			'V5KI0zFNjPI',
			'Mwlx1e-mo5o',
			'HFfkBouqAHA',
			'-K7OcDx5p5k',
			'A7WBJz0zNso',
			'U9fP6Zg0i-E',
			'lg1eVNi8-vY',
			'itmw0Ud4J3g',
			'U6S1nkTS2xM',
			'1VFlpuFq0Cw',
			'X-oCB0tFQC4',
			'K6lGaOPwqi4',
			'yZtY12yKTSo',
			'-bjzMl02e4o',
			'2Ofbiaz60o4',
			'SHqC3u60P-E',
			'E6MWf3gRdnc',
			'zjt-YCiQFXM',
			'wNtNQ4Uy3bY',
			'YSw0r1S-qkE',
			'RKt1bCvOKaI',
			'b5q44wQESjU',
			'DGAcAGZz3EA',
			'PfPnfyiw7XI',
			'99GH5Nd51vQ',
			'IKPLhEi7-JA',
			'YSq643XHkd4',
			'zvXZqrE6zCw',
			'ijibaWtGXE0',
			'dTzi5P-cpqI',
			'U21DvGHhn1Q',
			'qNwnWWLb394',
			'Cwr9EdZwGuE',
			'lfWUQY3mqlc',
			'C-Be9_Aho5M',
			'e3PLTq8I-lE',
			'7zd3rwyxRzU',
			'efTbOPZk8yE'
		],

		19:[
			'XXRZjRqKmqc',
			'3Sgx8QsC8-8',
			'7k43dETPYaE',
			'dgNi9cGbu28'
		],

		20: [
			'OdGTbca3E-0',
			'RlICesMfA-g',
			'uHKeD4hplNE',
			'DxF8JT6ghFA',
			'FdazhYfWP6Y',
			'KhJbMsnS2Ds',
			'7ixlbZ7v3Ao',
			'LVDiRytttxE',
			'qFBkP1f_-2w',


			'JBIER6pYNOE',
			'q3-dJxeuQfo',
			'Uuf6Wi_l_10',
			'uF8SZJAUXW0',
			'nkVc8nooyj4',
			'Fa3fK-Rm85M',
			'USSbnZ8Tb-s',
			'_Be5WmJp7Zc',
			'uU99vKu6EQI',
			'2OMiOnTKaXc',
			'0JahGeIblos',
			'kKimmOKY3m4',
			'b65vv0KqRyM',
			'MLzUZjmoHu0',
			'K8ptW835HRc',
			'jSTJvAR_M4A',
			'UoTQRbuhWKQ',
			'b6oysHnsXKM',
			'rZb5tUIq2ag',
			'hnzl49zl4HA',
			'BwN3zyepM0I',
			'QaADIrKvvB0',
			'nHUDxQls5sM',
			'T7m-GkBLQLY',
			'-M_MOIFxK-8',
			'wsCeJdetXCc',
			'M-P0upEW23k',

			't_9xAzPhIe8',
			'oOKvFQJuB1M',
			'_4QuJ0RASzg',
			'fK32STbhCVA',
			'NujPnMcRMNM',
			'9tX200xgL-0',

			'vbqPZUwxM3E',
			'oo6FS0p-afQ',
		]
	};

	function getQueryParam(param) {
		var found;
		window.location.hash.substr(1).split("&").forEach(function(item) {
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
		for (var ep = 1; ep < shows[tv].length; ep++) {
			if (seenEpisodes.indexOf(ep) === -1) {
				return ep;
			}
		}
		return null;
	}

	function pickRandomTV() {
		var min = 1;
		var max = Object.keys(series).length;
		return Math.floor(Math.random() * (max - min + 1) + min)
	}

	function goToNext(player, shows, t, ep) {
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
		player.loadVideoById(shows[tv][ep - 1]);
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


	function getMenuHtml(series, shows, tv) {
		var menuHtml = '';
		for (var key in series) {
			if (shows[key]) {
				var currentClass = key == tv ? 'current' : '';
				menuHtml += `<div class="tv">
<a href="#tv=${key}&e=0" onclick="openEpisode(${key})" class="${currentClass}">${series[key]}</a>
</div>`
			}
		}
		return menuHtml;
	}


	function getNavHtml(series, tv, episode, seenEpisodes) {
		var navHtml = '';
		for (var ep = 1; ep < shows[tv].length + 1; ep++) {
			var currentClass = ep == episode ? 'current' : '';
			var seenClass = seenEpisodes.indexOf(ep) !== -1 ? 'seen' : '';
			navHtml += `<a class="ep ${currentClass} ${seenClass}"
onclick="openEpisode(${tv},${ep})"
href="#tv=${tv}&e=${ep}">${ep}</a>`
		}
		return navHtml;
	}

	function render() {
		document.getElementById('nav').innerHTML = getNavHtml(series, tv, episode, getSeenEpisodes(tv));
		document.getElementById('menu').innerHTML = getMenuHtml(series, shows, tv);
	}

	// 2. This code loads the IFrame Player API code asynchronously.
	var tag = document.createElement('script');

	tag.src = "https://www.youtube.com/iframe_api";
	var firstScriptTag = document.getElementsByTagName('script')[0];
	firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

	// 3. This function creates an <iframe> (and YouTube player)
	//    after the API code downloads.
	var player;

	function onYouTubeIframeAPIReady() {
		player = new YT.Player('player', {
			height: '390',
			width: '100%',
			videoId: shows[tv][episode - 1],
			events: {
				'onReady': onPlayerReady,
				'onStateChange': onPlayerStateChange
			},
			playerVars: { rel: 0, showinfo: 0, ecver: 2 }
		});
	}

	// 4. The API will call this function when the video player is ready.
	function onPlayerReady(event) {
		event.target.playVideo();
	}

	// 5. The API calls this function when the player's state changes.
	//    The function indicates that when playing a video (state=1),
	//    the player should play for six seconds and then stop.
	function onPlayerStateChange(event) {
		if (event.data == YT.PlayerState.ENDED) {
			markAsSeen(tv, episode);
			// player.stopVideo();
			goToNext(player, shows, tv, episode);
		}
	}

	document.getElementById('mark_seen').addEventListener('click', () => {
		markAsSeen(tv, episode);
		goToNext(player, shows, tv, episode);
		render();
	});

	window.addEventListener("hashchange", init, false);
	init();
</script>

<style>
	body {
		font-family: Arial;
	}

	#menu {
		border: 2px solid #0068aa;
		background: #fff8ac;
		border-radius: 5px;
		padding: 5px;
		margin: 5px;
		width: 200px;
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

	#nav a.current {
		font-weight: bold;
		border: 2px solid black;
	}

	#nav a.seen {
		color: white;
		background: #ef2525;
	}

	button {
		font-size: 20px;
		padding: 20px;
		border-radius: 3px;
	}

	aside {
		padding: 30px;
		clear: both;
	}

	#mark_seen {
		background: #ef2525;
		color: white;
	}

	#next {
		background: #159b15;
		color: white;
	}
</style>
</body>
</html>
