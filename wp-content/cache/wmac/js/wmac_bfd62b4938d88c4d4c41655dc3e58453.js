window.addComment=function(a){function b(){c(),g()}function c(a){if(t&&(m=j(r.cancelReplyId),n=j(r.commentFormId),m)){m.addEventListener("touchstart",e),m.addEventListener("click",e);for(var b,c=d(a),g=0,h=c.length;g<h;g++)b=c[g],b.addEventListener("touchstart",f),b.addEventListener("click",f)}}function d(a){var b,c=r.commentReplyClass;return a&&a.childNodes||(a=q),b=q.getElementsByClassName?a.getElementsByClassName(c):a.querySelectorAll("."+c)}function e(a){var b=this,c=r.temporaryFormId,d=j(c);d&&o&&(j(r.parentIdFieldId).value="0",d.parentNode.replaceChild(o,d),b.style.display="none",a.preventDefault())}function f(b){var c,d=this,e=i(d,"belowelement"),f=i(d,"commentid"),g=i(d,"respondelement"),h=i(d,"postid");e&&f&&g&&h&&(c=a.addComment.moveForm(e,f,g,h),!1===c&&b.preventDefault())}function g(){if(s){var a={childList:!0,subTree:!0};p=new s(h),p.observe(q.body,a)}}function h(a){for(var b=a.length;b--;)if(a[b].addedNodes.length)return void c()}function i(a,b){return u?a.dataset[b]:a.getAttribute("data-"+b)}function j(a){return q.getElementById(a)}function k(b,c,d,e){var f=j(b);o=j(d);var g,h,i,k=j(r.parentIdFieldId),p=j(r.postIdFieldId);if(f&&o&&k){l(o),e&&p&&(p.value=e),k.value=c,m.style.display="",f.parentNode.insertBefore(o,f.nextSibling),m.onclick=function(){return!1};try{for(var s=0;s<n.elements.length;s++)if(g=n.elements[s],h=!1,"getComputedStyle"in a?i=a.getComputedStyle(g):q.documentElement.currentStyle&&(i=g.currentStyle),(g.offsetWidth<=0&&g.offsetHeight<=0||"hidden"===i.visibility)&&(h=!0),"hidden"!==g.type&&!g.disabled&&!h){g.focus();break}}catch(t){}return!1}}function l(a){var b=r.temporaryFormId,c=j(b);c||(c=q.createElement("div"),c.id=b,c.style.display="none",a.parentNode.insertBefore(c,a))}var m,n,o,p,q=a.document,r={commentReplyClass:"comment-reply-link",cancelReplyId:"cancel-comment-reply-link",commentFormId:"commentform",temporaryFormId:"wp-temp-form-div",parentIdFieldId:"comment_parent",postIdFieldId:"comment_post_ID"},s=a.MutationObserver||a.WebKitMutationObserver||a.MozMutationObserver,t="querySelector"in q&&"addEventListener"in a,u=!!q.documentElement.dataset;return t&&"loading"!==q.readyState?b():t&&a.addEventListener("DOMContentLoaded",b,!1),{init:c,moveForm:k}}(window);
var getParents=function(e,t){Element.prototype.matches||(Element.prototype.matches=Element.prototype.matchesSelector||Element.prototype.mozMatchesSelector||Element.prototype.msMatchesSelector||Element.prototype.oMatchesSelector||Element.prototype.webkitMatchesSelector||function(e){for(var t=(this.document||this.ownerDocument).querySelectorAll(e),a=t.length;0<=--a&&t.item(a)!==this;);return-1<a});for(var a=[];e&&e!==document;e=e.parentNode)t?e.matches(t)&&a.push(e):a.push(e);return a},toggleClass=function(e,t){e.classList.contains(t)?e.classList.remove(t):e.classList.add(t)};!function(){function e(e,t){t=t||{bubbles:!1,cancelable:!1,detail:void 0};var a=document.createEvent("CustomEvent");return a.initCustomEvent(e,t.bubbles,t.cancelable,t.detail),a}"function"!=typeof window.CustomEvent&&(e.prototype=window.Event.prototype,window.CustomEvent=e)}();var astraTriggerEvent=function(e,t){var a=2<arguments.length&&void 0!==arguments[2]?arguments[2]:{},n=new CustomEvent(t,a);e.dispatchEvent(n)};!function(){var e,t,a,l=document.querySelectorAll(".main-header-menu-toggle"),n=function(){var e=document.querySelector("body").style.overflow;document.querySelector("body").style.overflow="hidden";var t=window.innerWidth;document.querySelector("body").style.overflow=e;var a=astra.break_point,n=document.querySelectorAll(".main-header-bar-wrap");if(0<n.length)for(var s=0;s<n.length;s++)"DIV"==n[s].tagName&&n[s].classList.contains("main-header-bar-wrap")&&(a<t?(null!=l[s]&&l[s].classList.remove("toggled"),document.body.classList.remove("ast-header-break-point"),document.body.classList.add("ast-desktop"),astraTriggerEvent(document.body,"astra-header-responsive-enabled")):(document.body.classList.add("ast-header-break-point"),document.body.classList.remove("ast-desktop"),astraTriggerEvent(document.body,"astra-header-responsive-disabled")))};n(),AstraToggleSubMenu=function(){var e=this.parentNode;if(e.classList.contains("ast-submenu-expanded")&&document.querySelector("header.site-header").classList.contains("ast-menu-toggle-link")&&!this.classList.contains("ast-menu-toggle")){var t=e.querySelector("a").getAttribute("href");""===t&&"#"===t||(window.location=t)}for(var a=e.querySelectorAll(".menu-item-has-children, .page_item_has_children"),n=0;n<a.length;n++)a[n].classList.remove("ast-submenu-expanded"),a[n].querySelector(".sub-menu, .children").style.display="none";var s=e.parentNode.querySelectorAll(".menu-item-has-children, .page_item_has_children");for(n=0;n<s.length;n++)if(s[n]!=e){s[n].classList.remove("ast-submenu-expanded");for(var o=s[n].querySelectorAll(".sub-menu, .children"),r=0;r<o.length;r++)o[r].style.display="none"}(e.classList.contains("menu-item-has-children")||e.classList.contains("page_item_has_children"))&&(toggleClass(e,"ast-submenu-expanded"),e.classList.contains("ast-submenu-expanded")?e.querySelector(".sub-menu, .children").style.display="block":e.querySelector(".sub-menu, .children").style.display="none")},AstraNavigationMenu=function(e){console.warn("AstraNavigationMenu() function has been deprecated since version 1.6.5 or above of Astra Theme and will be removed in the future.")},AstraToggleMenu=function(e){if(console.warn("AstraToggleMenu() function has been deprecated since version 1.6.5 or above of Astra Theme and will be removed in the future. Use AstraToggleSubMenu() instead."),0<e.length)for(var t=0;t<e.length;t++)e[t].addEventListener("click",AstraToggleSubMenu,!1)},AstraToggleSetup=function(){var e=document.querySelectorAll(".main-header-bar-navigation");if(0<l.length)for(var t=0;t<l.length;t++)if(l[t].setAttribute("data-index",t),l[t].addEventListener("click",astraNavMenuToggle,!1),void 0!==e[t]){if(document.querySelector("header.site-header").classList.contains("ast-menu-toggle-link"))var a=e[t].querySelectorAll(".ast-header-break-point .main-header-menu .menu-item-has-children > a, .ast-header-break-point .main-header-menu .page_item_has_children > a, .ast-header-break-point ul.main-header-menu .ast-menu-toggle");else a=e[t].querySelectorAll("ul.main-header-menu .ast-menu-toggle");if(0<a.length)for(var n=0;n<a.length;n++)a[n].addEventListener("click",AstraToggleSubMenu,!1)}},astraNavMenuToggle=function(e){e.preventDefault();var t=document.querySelectorAll(".main-header-bar-navigation"),a=this.getAttribute("data-index");if(void 0===t[a])return!1;for(var n=t[a].querySelectorAll(".menu-item-has-children, .page_item_has_children"),s=0;s<n.length;s++){n[s].classList.remove("ast-submenu-expanded");for(var o=n[s].querySelectorAll(".sub-menu, .children"),r=0;r<o.length;r++)o[r].style.display="none"}-1!==(this.getAttribute("class")||"").indexOf("main-header-menu-toggle")&&(toggleClass(t[a],"toggle-on"),toggleClass(l[a],"toggled"),t[a].classList.contains("toggle-on")?(t[a].style.display="block",document.body.classList.add("ast-main-header-nav-open")):(t[a].style.display="",document.body.classList.remove("ast-main-header-nav-open")))},document.body.addEventListener("astra-header-responsive-enabled",function(){var e=document.querySelectorAll(".main-header-bar-navigation");if(0<e.length)for(var t=0;t<e.length;t++){null!=e[t]&&(e[t].classList.remove("toggle-on"),e[t].style.display="");for(var a=e[t].getElementsByClassName("sub-menu"),n=0;n<a.length;n++)a[n].style.display="";for(var s=e[t].getElementsByClassName("children"),o=0;o<s.length;o++)s[o].style.display="";for(var r=e[t].getElementsByClassName("ast-search-menu-icon"),l=0;l<r.length;l++)r[l].classList.remove("ast-dropdown-active"),r[l].style.display=""}},!1),window.addEventListener("resize",function(){n(),AstraToggleSetup()}),document.addEventListener("DOMContentLoaded",function(){var e,t;for(AstraToggleSetup(),e=document.querySelectorAll(".navigation-accessibility"),t=0;t<=e.length-1;t++)e[t]&&r(e[t])}),a=(t=navigator.userAgent).match(/(opera|chrome|safari|firefox|msie|trident(?=\/))\/?\s*(\d+)/i)||[],/trident/i.test(a[1])?e=/\brv[ :]+(\d+)/g.exec(t)||[]:"Chrome"===a[1]&&null!=(e=t.match(/\bOPR|Edge\/(\d+)/))||(a=a[2]?[a[1],a[2]]:[navigator.appName,navigator.appVersion,"-?"],null!=(e=t.match(/version\/(\d+)/i))&&a.splice(1,1,e[1]),bodyElement=document.body,"Safari"===a[0]&&a[1]<11&&bodyElement.classList.add("ast-safari-browser-less-than-11"));for(var s=document.getElementsByClassName("astra-search-icon"),o=0;o<s.length;o++)s[o].onclick=function(e){if(this.classList.contains("slide-search")){e.preventDefault();var t=this.parentNode.parentNode.parentNode.querySelector(".ast-search-menu-icon");t.classList.contains("ast-dropdown-active")?(""!==(t.querySelector(".search-field").value||"")&&t.querySelector(".search-form").submit(),t.classList.remove("ast-dropdown-active")):(t.classList.add("ast-dropdown-active"),t.querySelector(".search-field").setAttribute("autocomplete","off"),setTimeout(function(){t.querySelector(".search-field").focus()},200))}};function r(e){if(e&&(button=e.getElementsByTagName("button")[0],"undefined"!=typeof button||(button=e.getElementsByTagName("a")[0],"undefined"!=typeof button)))if(menu=e.getElementsByTagName("ul")[0],"undefined"!=typeof menu){for(menu.setAttribute("aria-expanded","false"),-1===menu.className.indexOf("nav-menu")&&(menu.className+=" nav-menu"),button.onclick=function(){-1!==e.className.indexOf("toggled")?(e.className=e.className.replace(" toggled",""),button.setAttribute("aria-expanded","false"),menu.setAttribute("aria-expanded","false")):(e.className+=" toggled",button.setAttribute("aria-expanded","true"),menu.setAttribute("aria-expanded","true"))},links=menu.getElementsByTagName("a"),subMenus=menu.getElementsByTagName("ul"),o=0,len=subMenus.length;o<len;o++)subMenus[o].parentNode.setAttribute("aria-haspopup","true");for(o=0,len=links.length;o<len;o++)links[o].addEventListener("focus",c,!0),links[o].addEventListener("blur",d,!0),links[o].addEventListener("click",i,!0)}else button.style.display="none"}function i(){var e=this||"";if(e&&!e.classList.contains("astra-search-icon")&&-1!==new String(e).indexOf("#")){var t=e.parentNode;if(!document.body.classList.contains("ast-header-break-point")||document.querySelector("header.site-header").classList.contains("ast-menu-toggle-link")&&t.classList.contains("menu-item-has-children"))for(;-1===e.className.indexOf("nav-menu");)"li"===e.tagName.toLowerCase()&&-1!==e.className.indexOf("focus")&&(e.className=e.className.replace(" focus","")),e=e.parentElement;else{document.querySelector(".main-header-menu-toggle").classList.remove("toggled");var a=document.querySelector(".main-header-bar-navigation");a.classList.remove("toggle-on"),a.style.display="none";var n=document.querySelector(".menu-below-header-toggle"),s=document.querySelector(".ast-below-header"),o=document.querySelector(".ast-below-header-actual-nav");n&&s&&o&&(n.classList.remove("toggled"),s.classList.remove("toggle-on"),o.style.display="none");var r=document.querySelector(".menu-above-header-toggle"),l=document.querySelector(".ast-above-header"),i=document.querySelector(".ast-above-header-navigation");r&&l&&i&&(r.classList.remove("toggled"),l.classList.remove("toggle-on"),i.style.display="none"),astraTriggerEvent(document.querySelector("body"),"astraMenuHashLinkClicked")}}}function c(){for(var e=this;-1===e.className.indexOf("nav-menu");)"li"===e.tagName.toLowerCase()&&(-1!==e.className.indexOf("focus")?e.className=e.className.replace(" focus",""):e.className+=" focus"),e=e.parentElement}function d(){var e=this||"";if(link=new String(e),-1===link.indexOf("#")||!document.body.classList.contains("ast-mouse-clicked"))for(;-1===e.className.indexOf("nav-menu");)"li"===e.tagName.toLowerCase()&&(-1!==e.className.indexOf("focus")?e.className=e.className.replace(" focus",""):e.className+=" focus"),e=e.parentElement}if(document.body.onclick=function(e){if(!e.target.classList.contains("ast-search-menu-icon")&&0===getParents(e.target,".ast-search-menu-icon").length&&0===getParents(e.target,".ast-search-icon").length)for(var t=document.getElementsByClassName("ast-search-menu-icon"),a=0;a<t.length;a++)t[a].classList.remove("ast-dropdown-active")},"querySelector"in document&&"addEventListener"in window){var u=document.body;u.addEventListener("mousedown",function(){u.classList.add("ast-mouse-clicked")}),u.addEventListener("keydown",function(){u.classList.remove("ast-mouse-clicked")})}}();
!function(a,b){"use strict";function c(){if(!e){e=!0;var a,c,d,f,g=-1!==navigator.appVersion.indexOf("MSIE 10"),h=!!navigator.userAgent.match(/Trident.*rv:11\./),i=b.querySelectorAll("iframe.wp-embedded-content");for(c=0;c<i.length;c++){if(d=i[c],!d.getAttribute("data-secret"))f=Math.random().toString(36).substr(2,10),d.src+="#?secret="+f,d.setAttribute("data-secret",f);if(g||h)a=d.cloneNode(!0),a.removeAttribute("security"),d.parentNode.replaceChild(a,d)}}}var d=!1,e=!1;if(b.querySelector)if(a.addEventListener)d=!0;if(a.wp=a.wp||{},!a.wp.receiveEmbedMessage)if(a.wp.receiveEmbedMessage=function(c){var d=c.data;if(d)if(d.secret||d.message||d.value)if(!/[^a-zA-Z0-9]/.test(d.secret)){var e,f,g,h,i,j=b.querySelectorAll('iframe[data-secret="'+d.secret+'"]'),k=b.querySelectorAll('blockquote[data-secret="'+d.secret+'"]');for(e=0;e<k.length;e++)k[e].style.display="none";for(e=0;e<j.length;e++)if(f=j[e],c.source===f.contentWindow){if(f.removeAttribute("style"),"height"===d.message){if(g=parseInt(d.value,10),g>1e3)g=1e3;else if(~~g<200)g=200;f.height=g}if("link"===d.message)if(h=b.createElement("a"),i=b.createElement("a"),h.href=f.getAttribute("src"),i.href=d.value,i.host===h.host)if(b.activeElement===f)a.top.location.href=d.value}else;}},d)a.addEventListener("message",a.wp.receiveEmbedMessage,!1),b.addEventListener("DOMContentLoaded",c,!1),a.addEventListener("load",c,!1)}(window,document);