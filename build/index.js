(window.webpackJsonp_agency=window.webpackJsonp_agency||[]).push([[1],{5:function(e,t,n){}}]),function(e){function t(t){for(var r,i,c=t[0],u=t[1],a=t[2],s=0,f=[];s<c.length;s++)i=c[s],Object.prototype.hasOwnProperty.call(o,i)&&o[i]&&f.push(o[i][0]),o[i]=0;for(r in u)Object.prototype.hasOwnProperty.call(u,r)&&(e[r]=u[r]);for(p&&p(t);f.length;)f.shift()();return l.push.apply(l,a||[]),n()}function n(){for(var e,t=0;t<l.length;t++){for(var n=l[t],r=!0,c=1;c<n.length;c++){var u=n[c];0!==o[u]&&(r=!1)}r&&(l.splice(t--,1),e=i(i.s=n[0]))}return e}var r={},o={0:0},l=[];function i(t){if(r[t])return r[t].exports;var n=r[t]={i:t,l:!1,exports:{}};return e[t].call(n.exports,n,n.exports,i),n.l=!0,n.exports}i.m=e,i.c=r,i.d=function(e,t,n){i.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:n})},i.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},i.t=function(e,t){if(1&t&&(e=i(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var n=Object.create(null);if(i.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var r in e)i.d(n,r,function(t){return e[t]}.bind(null,r));return n},i.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return i.d(t,"a",t),t},i.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},i.p="";var c=window.webpackJsonp_agency=window.webpackJsonp_agency||[],u=c.push.bind(c);c.push=t,c=c.slice();for(var a=0;a<c.length;a++)t(c[a]);var p=u;l.push([6,1]),n()}([function(e,t){e.exports=window.wp.element},function(e,t){e.exports=window.wp.components},function(e,t){e.exports=window.wp.i18n},function(e,t){e.exports=window.wp.blocks},function(e,t){e.exports=window.wp.blockEditor},,function(e,t,n){"use strict";n.r(t);var r=n(0),o=n(2),l=n(3),i=n(1),c=n(4),u={backgroundColor:"#e4e4e4",color:"#000",padding:"20px"};Object(l.registerBlockType)("agency/vita-block",{title:"Vita Gutenberg Block",icon:"universal-access-alt",category:"widgets",attributes:{slug:{type:"string",default:""},heading:{type:"string",default:""}},edit:function(e){var t=e.attributes,n=e.setAttributes;return Object(r.createElement)("div",null,Object(r.createElement)(c.InspectorControls,null,Object(r.createElement)(i.PanelBody,{title:Object(o.__)("Vita")},Object(r.createElement)("label",null,"Profil-Slug in der Agentur-DB:"),Object(r.createElement)(i.TextControl,{value:t.slug,onChange:function(e){return n({slug:e})}}),Object(r.createElement)("label",null,"Heading:"),Object(r.createElement)(i.TextControl,{value:t.heading,onChange:function(e){return n({heading:e})}}))),Object(r.createElement)("div",{style:u},Object(r.createElement)("div",null,"Importierte Vita wird hier angezeigt. Slug: ",t.slug)))},save:function(e){return null}}),n(5)}]);