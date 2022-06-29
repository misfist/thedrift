!function(e){var t={};function n(r){if(t[r])return t[r].exports;var o=t[r]={i:r,l:!1,exports:{}};return e[r].call(o.exports,o,o.exports,n),o.l=!0,o.exports}n.m=e,n.c=t,n.d=function(e,t,r){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(n.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var o in e)n.d(r,o,function(t){return e[t]}.bind(null,o));return r},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=7)}([function(e,t){e.exports=window.wp.i18n},function(e,t){e.exports=window.wp.blockEditor},function(e,t){e.exports=window.wp.element},function(e,t){e.exports=window.wp.blocks},function(e){e.exports=JSON.parse('{"apiVersion":2,"version":"1.0.0","textdomain":"site-functionality","name":"site-functionality/hero","title":"Hero","category":"text","collection":"site-functionality","icon":"slides","className":"hero","description":"Display a hero element on page","keywords":["hero","landing"],"supports":{"align":true,"anchor":true,"color":{"background":true,"text":true,"gradients":false,"link":false},"customClassName":true,"defaultStylePicker":false,"__experimentalLayout":false},"attributes":{},"variations":[],"styles":[],"example":{},"style":"file:../../build/style-index.css","editorScript":"site-functionality","editorStyle":"file:../../build/index.css"}')},function(e,t,n){var r;!function(){"use strict";var n={}.hasOwnProperty;function o(){for(var e=[],t=0;t<arguments.length;t++){var r=arguments[t];if(r){var i=typeof r;if("string"===i||"number"===i)e.push(r);else if(Array.isArray(r)){if(r.length){var a=o.apply(null,r);a&&e.push(a)}}else if("object"===i)if(r.toString===Object.prototype.toString)for(var s in r)n.call(r,s)&&r[s]&&e.push(s);else e.push(r.toString())}}return e.join(" ")}e.exports?(o.default=o,e.exports=o):void 0===(r=function(){return o}.apply(t,[]))||(e.exports=r)}()},function(e,t){e.exports=window.wp.components},function(e,t,n){"use strict";n.r(t),n.d(t,"registerBlocks",(function(){return h}));var r={};n.r(r),n.d(r,"name",(function(){return d})),n.d(r,"category",(function(){return y})),n.d(r,"settings",(function(){return b}));var o=n(3),i=n(0),a=n(4),s=n(2),c=n(1),l=(n(6),n(5)),u=n.n(l);const f=[["core/heading",{placeholder:Object(i.__)("Add Heading...","site-functionality"),level:2,className:"hero__title h1"},[]],["core/paragraph",{placeholder:Object(i.__)("Add Content...","site-functionality"),className:"hero__content"},[]],["core/buttons",{className:"hero__buttons"},[["core/button",BUTTON_ATTRS,[]]]]],p=["core/heading","core/paragraph","core/buttons"];const{name:d,category:y}=a,b={edit:e=>{const{attributes:t,className:n,setAttributes:r}=e,o=Object(c.useBlockProps)({className:u()(n,"hero")});return Object(s.createElement)("div",o,Object(s.createElement)(c.InnerBlocks,{allowedBlocks:p,template:f,templateLock:"all"}))},save:e=>null},g=[r],m=e=>{if(!e)return;const{name:t,settings:n}=e;Object(o.registerBlockType)(t,{...n})},h=()=>{g.forEach(m)};h()}]);