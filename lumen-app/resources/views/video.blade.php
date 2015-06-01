<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if lt IE 7]>      <html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" class="no-js"> <!--<![endif]-->
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<script type="text/javascript">
		(window.NREUM||(NREUM={})).loader_config={xpid:"Uw4EWVRQGwcDXFJSBwc="};window.NREUM||(NREUM={}),__nr_require=function(t,e,n){function r(n){if(!e[n]){var o=e[n]={exports:{}};t[n][0].call(o.exports,function(e){var o=t[n][1][e];return r(o?o:e)},o,o.exports)}return e[n].exports}if("function"==typeof __nr_require)return __nr_require;for(var o=0;o<n.length;o++)r(n[o]);return r}({QJf3ax:[function(t,e){function n(t){function e(e,n,a){t&&t(e,n,a),a||(a={});for(var c=s(e),f=c.length,u=i(a,o,r),d=0;f>d;d++)c[d].apply(u,n);return u}function a(t,e){f[t]=s(t).concat(e)}function s(t){return f[t]||[]}function c(){return n(e)}var f={};return{on:a,emit:e,create:c,listeners:s,_events:f}}function r(){return{}}var o="nr@context",i=t("gos");e.exports=n()},{gos:"7eSDFh"}],ee:[function(t,e){e.exports=t("QJf3ax")},{}],3:[function(t){function e(t){try{i.console&&console.log(t)}catch(e){}}var n,r=t("ee"),o=t(1),i={};try{n=localStorage.getItem("__nr_flags").split(","),console&&"function"==typeof console.log&&(i.console=!0,-1!==n.indexOf("dev")&&(i.dev=!0),-1!==n.indexOf("nr_dev")&&(i.nrDev=!0))}catch(a){}i.nrDev&&r.on("internal-error",function(t){e(t.stack)}),i.dev&&r.on("fn-err",function(t,n,r){e(r.stack)}),i.dev&&(e("NR AGENT IN DEVELOPMENT MODE"),e("flags: "+o(i,function(t){return t}).join(", ")))},{1:23,ee:"QJf3ax"}],4:[function(t){function e(t,e,n,i,s){try{c?c-=1:r("err",[s||new UncaughtException(t,e,n)])}catch(f){try{r("ierr",[f,(new Date).getTime(),!0])}catch(u){}}return"function"==typeof a?a.apply(this,o(arguments)):!1}function UncaughtException(t,e,n){this.message=t||"Uncaught error with no additional information",this.sourceURL=e,this.line=n}function n(t){r("err",[t,(new Date).getTime()])}var r=t("handle"),o=t(6),i=t("ee"),a=window.onerror,s=!1,c=0;t("loader").features.err=!0,t(5),window.onerror=e;try{throw new Error}catch(f){"stack"in f&&(t(1),t(2),"addEventListener"in window&&t(3),window.XMLHttpRequest&&XMLHttpRequest.prototype&&XMLHttpRequest.prototype.addEventListener&&window.XMLHttpRequest&&XMLHttpRequest.prototype&&XMLHttpRequest.prototype.addEventListener&&!/CriOS/.test(navigator.userAgent)&&t(4),s=!0)}i.on("fn-start",function(){s&&(c+=1)}),i.on("fn-err",function(t,e,r){s&&(this.thrown=!0,n(r))}),i.on("fn-end",function(){s&&!this.thrown&&c>0&&(c-=1)}),i.on("internal-error",function(t){r("ierr",[t,(new Date).getTime(),!0])})},{1:10,2:9,3:7,4:11,5:3,6:24,ee:"QJf3ax",handle:"D5DuLP",loader:"G9z0Bl"}],5:[function(t){t("loader").features.ins=!0},{loader:"G9z0Bl"}],6:[function(t){function e(){}if(window.performance&&window.performance.timing&&window.performance.getEntriesByType){var n=t("ee"),r=t("handle"),o=t(1),i=t(2);t("loader").features.stn=!0,t(3),n.on("fn-start",function(t){var e=t[0];e instanceof Event&&(this.bstStart=Date.now())}),n.on("fn-end",function(t,e){var n=t[0];n instanceof Event&&r("bst",[n,e,this.bstStart,Date.now()])}),o.on("fn-start",function(t,e,n){this.bstStart=Date.now(),this.bstType=n}),o.on("fn-end",function(t,e){r("bstTimer",[e,this.bstStart,Date.now(),this.bstType])}),i.on("fn-start",function(){this.bstStart=Date.now()}),i.on("fn-end",function(t,e){r("bstTimer",[e,this.bstStart,Date.now(),"requestAnimationFrame"])}),n.on("pushState-start",function(){this.time=Date.now(),this.startPath=location.pathname+location.hash}),n.on("pushState-end",function(){r("bstHist",[location.pathname+location.hash,this.startPath,this.time])}),"addEventListener"in window.performance&&(window.performance.addEventListener("webkitresourcetimingbufferfull",function(){r("bstResource",[window.performance.getEntriesByType("resource")]),window.performance.webkitClearResourceTimings()},!1),window.performance.addEventListener("resourcetimingbufferfull",function(){r("bstResource",[window.performance.getEntriesByType("resource")]),window.performance.clearResourceTimings()},!1)),document.addEventListener("scroll",e,!1),document.addEventListener("keypress",e,!1),document.addEventListener("click",e,!1)}},{1:10,2:9,3:8,ee:"QJf3ax",handle:"D5DuLP",loader:"G9z0Bl"}],7:[function(t,e){function n(t){i.inPlace(t,["addEventListener","removeEventListener"],"-",r)}function r(t){return t[1]}var o=(t(1),t("ee").create()),i=t(2)(o),a=t("gos");if(e.exports=o,n(window),"getPrototypeOf"in Object){for(var s=document;s&&!s.hasOwnProperty("addEventListener");)s=Object.getPrototypeOf(s);s&&n(s);for(var c=XMLHttpRequest.prototype;c&&!c.hasOwnProperty("addEventListener");)c=Object.getPrototypeOf(c);c&&n(c)}else XMLHttpRequest.prototype.hasOwnProperty("addEventListener")&&n(XMLHttpRequest.prototype);o.on("addEventListener-start",function(t){if(t[1]){var e=t[1];"function"==typeof e?this.wrapped=t[1]=a(e,"nr@wrapped",function(){return i(e,"fn-",null,e.name||"anonymous")}):"function"==typeof e.handleEvent&&i.inPlace(e,["handleEvent"],"fn-")}}),o.on("removeEventListener-start",function(t){var e=this.wrapped;e&&(t[1]=e)})},{1:24,2:25,ee:"QJf3ax",gos:"7eSDFh"}],8:[function(t,e){var n=(t(2),t("ee").create()),r=t(1)(n);e.exports=n,r.inPlace(window.history,["pushState"],"-")},{1:25,2:24,ee:"QJf3ax"}],9:[function(t,e){var n=(t(2),t("ee").create()),r=t(1)(n);e.exports=n,r.inPlace(window,["requestAnimationFrame","mozRequestAnimationFrame","webkitRequestAnimationFrame","msRequestAnimationFrame"],"raf-"),n.on("raf-start",function(t){t[0]=r(t[0],"fn-")})},{1:25,2:24,ee:"QJf3ax"}],10:[function(t,e){function n(t,e,n){t[0]=o(t[0],"fn-",null,n)}var r=(t(2),t("ee").create()),o=t(1)(r);e.exports=r,o.inPlace(window,["setTimeout","setInterval","setImmediate"],"setTimer-"),r.on("setTimer-start",n)},{1:25,2:24,ee:"QJf3ax"}],11:[function(t,e){function n(){f.inPlace(this,p,"fn-")}function r(t,e){f.inPlace(e,["onreadystatechange"],"fn-")}function o(t,e){return e}function i(t,e){for(var n in t)e[n]=t[n];return e}var a=t("ee").create(),s=t(1),c=t(2),f=c(a),u=c(s),d=window.XMLHttpRequest,p=["onload","onerror","onabort","onloadstart","onloadend","onprogress","ontimeout"];e.exports=a,window.XMLHttpRequest=function(t){var e=new d(t);try{a.emit("new-xhr",[],e),u.inPlace(e,["addEventListener","removeEventListener"],"-",o),e.addEventListener("readystatechange",n,!1)}catch(r){try{a.emit("internal-error",[r])}catch(i){}}return e},i(d,XMLHttpRequest),XMLHttpRequest.prototype=d.prototype,f.inPlace(XMLHttpRequest.prototype,["open","send"],"-xhr-",o),a.on("send-xhr-start",r),a.on("open-xhr-start",r)},{1:7,2:25,ee:"QJf3ax"}],12:[function(t){function e(t){var e=this.params,r=this.metrics;if(!this.ended){this.ended=!0;for(var i=0;c>i;i++)t.removeEventListener(s[i],this.listener,!1);if(!e.aborted){if(r.duration=(new Date).getTime()-this.startTime,4===t.readyState){e.status=t.status;var a=t.responseType,f="arraybuffer"===a||"blob"===a||"json"===a?t.response:t.responseText,u=n(f);if(u&&(r.rxSize=u),this.sameOrigin){var d=t.getResponseHeader("X-NewRelic-App-Data");d&&(e.cat=d.split(", ").pop())}}else e.status=0;r.cbTime=this.cbTime,o("xhr",[e,r,this.startTime])}}}function n(t){if("string"==typeof t&&t.length)return t.length;if("object"!=typeof t)return void 0;if("undefined"!=typeof ArrayBuffer&&t instanceof ArrayBuffer&&t.byteLength)return t.byteLength;if("undefined"!=typeof Blob&&t instanceof Blob&&t.size)return t.size;if("undefined"!=typeof FormData&&t instanceof FormData)return void 0;try{return JSON.stringify(t).length}catch(e){return void 0}}function r(t,e){var n=i(e),r=t.params;r.host=n.hostname+":"+n.port,r.pathname=n.pathname,t.sameOrigin=n.sameOrigin}if(window.XMLHttpRequest&&XMLHttpRequest.prototype&&XMLHttpRequest.prototype.addEventListener&&!/CriOS/.test(navigator.userAgent)){t("loader").features.xhr=!0;var o=t("handle"),i=t(2),a=t("ee"),s=["load","error","abort","timeout"],c=s.length,f=t(1);t(4),t(3),a.on("new-xhr",function(){this.totalCbs=0,this.called=0,this.cbTime=0,this.end=e,this.ended=!1,this.xhrGuids={}}),a.on("open-xhr-start",function(t){this.params={method:t[0]},r(this,t[1]),this.metrics={}}),a.on("open-xhr-end",function(t,e){"loader_config"in NREUM&&"xpid"in NREUM.loader_config&&this.sameOrigin&&e.setRequestHeader("X-NewRelic-ID",NREUM.loader_config.xpid)}),a.on("send-xhr-start",function(t,e){var r=this.metrics,o=t[0],i=this;if(r&&o){var f=n(o);f&&(r.txSize=f)}this.startTime=(new Date).getTime(),this.listener=function(t){try{"abort"===t.type&&(i.params.aborted=!0),("load"!==t.type||i.called===i.totalCbs&&(i.onloadCalled||"function"!=typeof e.onload))&&i.end(e)}catch(n){try{a.emit("internal-error",[n])}catch(r){}}};for(var u=0;c>u;u++)e.addEventListener(s[u],this.listener,!1)}),a.on("xhr-cb-time",function(t,e,n){this.cbTime+=t,e?this.onloadCalled=!0:this.called+=1,this.called!==this.totalCbs||!this.onloadCalled&&"function"==typeof n.onload||this.end(n)}),a.on("xhr-load-added",function(t,e){var n=""+f(t)+!!e;this.xhrGuids&&!this.xhrGuids[n]&&(this.xhrGuids[n]=!0,this.totalCbs+=1)}),a.on("xhr-load-removed",function(t,e){var n=""+f(t)+!!e;this.xhrGuids&&this.xhrGuids[n]&&(delete this.xhrGuids[n],this.totalCbs-=1)}),a.on("addEventListener-end",function(t,e){e instanceof XMLHttpRequest&&"load"===t[0]&&a.emit("xhr-load-added",[t[1],t[2]],e)}),a.on("removeEventListener-end",function(t,e){e instanceof XMLHttpRequest&&"load"===t[0]&&a.emit("xhr-load-removed",[t[1],t[2]],e)}),a.on("fn-start",function(t,e,n){e instanceof XMLHttpRequest&&("onload"===n&&(this.onload=!0),("load"===(t[0]&&t[0].type)||this.onload)&&(this.xhrCbStart=(new Date).getTime()))}),a.on("fn-end",function(t,e){this.xhrCbStart&&a.emit("xhr-cb-time",[(new Date).getTime()-this.xhrCbStart,this.onload,e],e)})}},{1:"XL7HBI",2:13,3:11,4:7,ee:"QJf3ax",handle:"D5DuLP",loader:"G9z0Bl"}],13:[function(t,e){e.exports=function(t){var e=document.createElement("a"),n=window.location,r={};e.href=t,r.port=e.port;var o=e.href.split("://");return!r.port&&o[1]&&(r.port=o[1].split("/")[0].split("@").pop().split(":")[1]),r.port&&"0"!==r.port||(r.port="https"===o[0]?"443":"80"),r.hostname=e.hostname||n.hostname,r.pathname=e.pathname,r.protocol=o[0],"/"!==r.pathname.charAt(0)&&(r.pathname="/"+r.pathname),r.sameOrigin=!e.hostname||e.hostname===document.domain&&e.port===n.port&&e.protocol===n.protocol,r}},{}],14:[function(t,e){function n(t){return function(){r(t,[(new Date).getTime()].concat(i(arguments)))}}var r=t("handle"),o=t(1),i=t(2);"undefined"==typeof window.newrelic&&(newrelic=window.NREUM);var a=["setPageViewName","addPageAction","setCustomAttribute","finished","addToTrace","inlineHit","noticeError"];o(a,function(t,e){window.NREUM[e]=n("api-"+e)}),e.exports=window.NREUM},{1:23,2:24,handle:"D5DuLP"}],"7eSDFh":[function(t,e){function n(t,e,n){if(r.call(t,e))return t[e];var o=n();if(Object.defineProperty&&Object.keys)try{return Object.defineProperty(t,e,{value:o,writable:!0,enumerable:!1}),o}catch(i){}return t[e]=o,o}var r=Object.prototype.hasOwnProperty;e.exports=n},{}],gos:[function(t,e){e.exports=t("7eSDFh")},{}],handle:[function(t,e){e.exports=t("D5DuLP")},{}],D5DuLP:[function(t,e){function n(t,e,n){return r.listeners(t).length?r.emit(t,e,n):(o[t]||(o[t]=[]),void o[t].push(e))}var r=t("ee").create(),o={};e.exports=n,n.ee=r,r.q=o},{ee:"QJf3ax"}],id:[function(t,e){e.exports=t("XL7HBI")},{}],XL7HBI:[function(t,e){function n(t){var e=typeof t;return!t||"object"!==e&&"function"!==e?-1:t===window?0:i(t,o,function(){return r++})}var r=1,o="nr@id",i=t("gos");e.exports=n},{gos:"7eSDFh"}],G9z0Bl:[function(t,e){function n(){var t=p.info=NREUM.info,e=f.getElementsByTagName("script")[0];if(t&&t.licenseKey&&t.applicationID&&e){s(d,function(e,n){e in t||(t[e]=n)});var n="https"===u.split(":")[0]||t.sslForHttp;p.proto=n?"https://":"http://",a("mark",["onload",i()]);var r=f.createElement("script");r.src=p.proto+t.agent,e.parentNode.insertBefore(r,e)}}function r(){"complete"===f.readyState&&o()}function o(){a("mark",["domContent",i()])}function i(){return(new Date).getTime()}var a=t("handle"),s=t(1),c=(t(2),window),f=c.document,u=(""+location).split("?")[0],d={beacon:"bam.nr-data.net",errorBeacon:"bam.nr-data.net",agent:"js-agent.newrelic.com/nr-632.min.js"},p=e.exports={offset:i(),origin:u,features:{}};f.addEventListener?(f.addEventListener("DOMContentLoaded",o,!1),c.addEventListener("load",n,!1)):(f.attachEvent("onreadystatechange",r),c.attachEvent("onload",n)),a("mark",["firstbyte",i()])},{1:23,2:14,handle:"D5DuLP"}],loader:[function(t,e){e.exports=t("G9z0Bl")},{}],23:[function(t,e){function n(t,e){var n=[],o="",i=0;for(o in t)r.call(t,o)&&(n[i]=e(o,t[o]),i+=1);return n}var r=Object.prototype.hasOwnProperty;e.exports=n},{}],24:[function(t,e){function n(t,e,n){e||(e=0),"undefined"==typeof n&&(n=t?t.length:0);for(var r=-1,o=n-e||0,i=Array(0>o?0:o);++r<o;)i[r]=t[e+r];return i}e.exports=n},{}],25:[function(t,e){function n(t){return!(t&&"function"==typeof t&&t.apply&&!t[i])}var r=t("ee"),o=t(1),i="nr@wrapper",a=Object.prototype.hasOwnProperty;e.exports=function(t){function e(t,e,r,a){function nrWrapper(){var n,i,s,f;try{i=this,n=o(arguments),s=r&&r(n,i)||{}}catch(d){u([d,"",[n,i,a],s])}c(e+"start",[n,i,a],s);try{return f=t.apply(i,n)}catch(p){throw c(e+"err",[n,i,p],s),p}finally{c(e+"end",[n,i,f],s)}}return n(t)?t:(e||(e=""),nrWrapper[i]=!0,f(t,nrWrapper),nrWrapper)}function s(t,r,o,i){o||(o="");var a,s,c,f="-"===o.charAt(0);for(c=0;c<r.length;c++)s=r[c],a=t[s],n(a)||(t[s]=e(a,f?s+o:o,i,s))}function c(e,n,r){try{t.emit(e,n,r)}catch(o){u([o,e,n,r])}}function f(t,e){if(Object.defineProperty&&Object.keys)try{var n=Object.keys(t);return n.forEach(function(n){Object.defineProperty(e,n,{get:function(){return t[n]},set:function(e){return t[n]=e,e}})}),e}catch(r){u([r])}for(var o in t)a.call(t,o)&&(e[o]=t[o]);return e}function u(e){try{t.emit("internal-error",e)}catch(n){}}return t||(t=r),e.inPlace=s,e.flag=i,e}},{1:24,ee:"QJf3ax"}]},{},["G9z0Bl",4,12,6,5]);
	</script>
	
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta property="og:site_name" content="STACK" name="og:site_name" />
	
	<title>STACK Home | STACK</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

	<!-- Custom CSS -->
	<link rel="stylesheet" href="/assets/css/custom.css">

</head>
<body>

	<div class="row condom">

		<div class="col-lg-2"></div>

		<div class="col-lg-8 main">

			<div class="row">

				<div class="col-lg-12">

					<!-- Navbar -->
					<nav class="navbar navbar-inverse bottom-red legroom">
						<div class="container-fluid">
							<div class="navbar-header">
								<a class="navbar-brand" href="#">
									<img alt="STACK" src="/assets/img/branding/logos/large_white.png" width="160" height="35">
								</a>
							</div>
						</div>
					</nav>	
				</div>

			</div>

			<div class="row legroom">

				<div class="col-lg-12 event" data-name="adunit-Top" data-template="video">

					<!-- Ad Unit: Top -->
					<center><div style="width:728px;height:90px;background-color:gray;"></div></center>	
				</div>

			</div>


			<div class="row panel headroom">

				<div class="col-xs-12 event legroom" data-name="content-player-right-thumbnails" data-template="video">

					<div class="player">video player w/thumbnails to the right</div>
				</div>

				<div class="col-xs-12 col-sm-8 col-lg-8">

					
					<div class="row event legroom" data-name="content-videos-related" data-template="video">

						<div class="col-lg-12">

							<div class="video-widgets">Related Videos</div>						

						</div>

					</div>		

					
					<div class="row event legroom" data-name="content-videos-trending" data-template="video">

						<div class="col-lg-12">

							<div class="video-widgets">Trending</div>						

						</div>

					</div>		

					
					<div class="row event legroom" data-name="content-videos-path-to-pros" data-template="video">

						<div class="col-lg-12">

							<div class="video-widgets">Path to the Pros: 2015</div>						

						</div>

					</div>		

					
					<div class="row event legroom" data-name="content-videos-real-workouts" data-template="video">

						<div class="col-lg-12">

							<div class="video-widgets">Real Workouts</div>						

						</div>

					</div>		

					
					<div class="row event legroom" data-name="content-videos-durkin" data-template="video">

						<div class="col-lg-12">

							<div class="video-widgets">World Class Workouts with Todd Durkin</div>						

						</div>

					</div>		

					
					<div class="row event legroom" data-name="content-videos-speed" data-template="video">

						<div class="col-lg-12">

							<div class="video-widgets">Speed</div>						

						</div>

					</div>		

					
					<div class="row event legroom" data-name="content-videos-strength" data-template="video">

						<div class="col-lg-12">

							<div class="video-widgets">Strength</div>						

						</div>

					</div>		



					<div class="spacer"></div>		

				</div>

				<!-- Sidebar -->
				<div class="col-xs-12 col-sm-4 col-lg-4 sidebar">

					
					<div class="row event" data-name="sidebar-right2" data-template="video">

						<div class="col-lg-12">

							<div class="adunit">right2</div>
							<hr />

						</div>

					</div>

					
					<div class="row event" data-name="sidebar-vsp" data-template="video">

						<div class="col-lg-12">

							<div class="vsp">velocity location finder</div>
							<hr />

						</div>

					</div>

					
					<div class="row event" data-name="sidebar-outbrain" data-template="video">

						<div class="col-lg-12">

							<div class="row">

								<div class="col-xs-12">

									<h3>Recommended</h3>

									<div class="outbrain-sidebar">outbrain</div>

								</div>

							</div>
							<hr />

						</div>

					</div>

					
					<div class="row event" data-name="sidebar-social" data-template="video">

						<div class="col-lg-12">

							<div class="social">social share buttons</div>
							<hr />

						</div>

					</div>

					
					<div class="row event" data-name="sidebar-newsletter" data-template="video">

						<div class="col-lg-12">

							<div class="social">newsletter optin</div>
							<hr />

						</div>

					</div>

					
					<div class="row event" data-name="sidebar-right3" data-template="video">

						<div class="col-lg-12">

							<div class="adunit">right3</div>
							<hr />

						</div>

					</div>

					
					<div class="row event" data-name="sidebar-trending" data-template="video">

						<div class="col-lg-12">

							<div class="row">

								<div class="col-xs-12">

									<h1>Trending</h1>

								</div>

							</div>

							<div class="row">

								<div class="col-xs-12">

									<div class="img-trending"></div>

								</div>

							</div>

							<div class="spacer"></div>

							<div class="row">

								<div class="col-xs-12">

									<div class="img-trending"></div>

								</div>

							</div>

							<div class="spacer"></div>

							<div class="row">

								<div class="col-xs-12">

									<div class="img-trending"></div>

								</div>

							</div>

							<div class="spacer"></div>

							<div class="row">

								<div class="col-xs-12">

									<div class="img-trending"></div>

								</div>

							</div>

							<div class="spacer"></div>

							<div class="row">

								<div class="col-xs-12">

									<div class="img-trending"></div>

								</div>

							</div>

							<div class="spacer"></div>
							<hr />

						</div>

					</div>

					
					<div class="row event" data-name="sidebar-bottomleft" data-template="video">

						<div class="col-lg-12">

							<div class="bottomleft">BottomLeft</div>
							<hr />

						</div>

					</div>

					
				</div>

			</div>			

			<div class="footer headroom">

				

				<div class="row">

					<div class="col-xs-12 col-sm-12">

						<div class="row">

							<div class="col-sm-1"></div>

							<div class="col-xs-6 col-sm-2">

								<p class="footer-title">STACK Resources</p>
								<ul class="footer-links">
									<li><a href-"#">STACK Fitness</a></li>
									<li><a href-"#">STACK Conditioning</a></li>
									<li><a href="#">Coaches & Trainers</a></li>
									<li><a href="#">Magazine</a></li>
									<li><a href="#">STACK 4W</a></li>
								</ul>

							</div>		

							<div class="col-xs-6 col-sm-2">

								<p class="footer-title">&nbsp;</p>
								<ul class="footer-links">
									<li><a href-"#">Gamer</a></li>
									<li><a href-"#">Basic Training</a></li>
									<li><a href="#">News</a></li>
									<li><a href="#">STACK A to Z</a></li>
									<li>&nbsp;</li>
								</ul>

							</div>			

							<div class="col-xs-6 col-sm-2">

								<p class="footer-title">STACK Partners</p>
								<ul class="footer-links">
									<li><a href-"#">Fox Sports</a></li>
									<li><a href-"#">YardBarker</a></li>
									<li><a href="#">Eastbay</a></li>
									<li><a href="#">Foot Locker</a></li>
									<li><a href="#">Men's Fitness</a></li>
									<li><a href="#">Yahoo! Sports</a></li>
								</ul>

							</div>		

							<div class="col-xs-6 col-sm-2">

								<p class="footer-title">STACK</p>
								<ul class="footer-links">
									<li><a href-"#">About STACK</a></li>
									<li><a href-"#">Contact Us</a></li>
									<li><a href="#">Terms of Use</a></li>
									<li><a href="#">Privacy Policy</a></li>
									<li><a href="#">STACK Experts</a></li>
									<li><a href="#">Advertising</a></li>
								</ul>

							</div>	

							<div class="col-xs-6 col-sm-2">

								<p class="footer-title">Follow STACK</p>
								<ul class="footer-links">
									<li><a href-"#">Facebook</a></li>
									<li><a href-"#">Twitter</a></li>
									<li><a href="#">YouTube</a></li>
									<li><a href="#">Instagram</a></li>
									<li><a href="#">Pinterest</a></li>
									<li><a href="#">RSS</a></li>
								</ul>

							</div>	

							<div class="col-xs-12">

								<div class="spacer"></div>

							</div>

						</div>
					</div>

				</div>

				<div class="row">

					<div class="col-xs-12">

						<center><img src="/assets/img/partners/yardbarker.gif" /></center>
					</div>

				</div>

				<div class="row">

					<div class="col-xs-12">

						<div class="spacer"></div>

					</div>

				</div>


				<!-- Load Scripts -->


				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
				<script src="/assets/js/viewport.js"></script>

				
				<script type="text/javascript">

					$(document).ready(function(){

						//////////////////////////////////////////////////////
						// track impression events
						$('[data-name^=adunit-]').each(function(index){

							var widget 		= $(this).attr('data-name');
							var template 	= $(this).attr('data-template');

							// track event 
							_event(template,'impression',widget,index);

							// set position
							$(this).attr('data-position',index);

						});	

						$('[data-name^=content-]').each(function(index){

							var widget 		= $(this).attr('data-name');
							var template 	= $(this).attr('data-template');

							// track event 
							_event(template,'impression',widget,index);

							// set position
							$(this).attr('data-position',index);

						});

						$('[data-name^=sidebar-]').each(function(index){

							var widget 		= $(this).attr('data-name');
							var template 	= $(this).attr('data-template');

							// track event 
							_event(template,'impression',widget,index);

							// set position
							$(this).attr('data-position',index);

						});

						$('[data-name^=postcontent-]').each(function(index){

							var widget 		= $(this).attr('data-name');
							var template 	= $(this).attr('data-template');

							// track event 
							_event(template,'impression',widget,index);

							// set position
							$(this).attr('data-position',index);
						});	

						// track widget events (within widgets)
						$('[data-template^=content-]').each(function(index){

							var widget 		= $(this).attr('data-name');
							var template 	= $(this).attr('data-template');

							// track event 
							_event(template,'impression',widget,index);

							// set position
							$(this).attr('data-position',index);

						});	
						
						$('[data-template^=sidebar-]').each(function(index){

							var widget 		= $(this).attr('data-name');
							var template 	= $(this).attr('data-template');

							// track event 
							_event(template,'impression',widget,index);

							// set position
							$(this).attr('data-position',index);

						});	


						//////////////////////////////////////////////////////
						// track click events
						$('.event').on('click',function(){

							var widget 		= $(this).attr('data-name');
							var template 	= $(this).attr('data-template');
							var position 	= $(this).attr('data-position');

							// track event 
							_event(template,'click',widget,position);

						});


						//////////////////////////////////////////////////////
						// track viewport events
						$(window).scroll(function(event){

							// track viewport events
							$('.event:in-viewport(300)').each(function(){

								var viewport 	= $(this).attr('data-viewport');

								if (viewport == undefined)
								{
									var widget 		= $(this).attr('data-name');
									var template 	= $(this).attr('data-template');
									var position 	= $(this).attr('data-position');

									// track event 
									_event(template,'viewport',widget,position);

									// add viewport attribute (so we don't track this again)
									$(this).attr('data-viewport',true);
								}

							});

						});


					});

					// track an event
					function _event(category,action,label,value) {

						// log to console
						console.log('[EVENT] ' + category + ' ' + action + ' ' + label + ' ' + value);

						// send to GA
						//ga('send','event',category,action,label,value);
					}

				</script>

			</div>

		</div>		

	</div>

	<script type="text/javascript">window.NREUM||(NREUM={});NREUM.info={"beacon":"bam.nr-data.net","licenseKey":"ce0279c0f3","applicationID":"4383006","transactionName":"YQNSMEcAXUpRWkRfXFhJZRZcTlFWX01DQkFXFh8SXAVWVh5JWEY=","queueTime":0,"applicationTime":1,"ttGuid":"","agentToken":"","atts":"TURRRg8aTkQ=","errorBeacon":"bam.nr-data.net","agent":"js-agent.newrelic.com\/nr-632.min.js"}</script>

</body>
</html>