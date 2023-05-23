/*
 Highstock JS v11.0.1 (2023-05-08)

 Indicator series type for Highcharts Stock

 (c) 2010-2021 Daniel Studencki

 License: www.highcharts.com/license
*/
'use strict';(function(a){"object"===typeof module&&module.exports?(a["default"]=a,module.exports=a):"function"===typeof define&&define.amd?define("highcharts/indicators/acceleration-bands",["highcharts","highcharts/modules/stock"],function(g){a(g);a.Highcharts=g;return a}):a("undefined"!==typeof Highcharts?Highcharts:void 0)})(function(a){function g(a,d,f,g){a.hasOwnProperty(d)||(a[d]=g.apply(null,f),"function"===typeof CustomEvent&&window.dispatchEvent(new CustomEvent("HighchartsModuleLoaded",{detail:{path:d,
module:a[d]}})))}a=a?a._modules:{};g(a,"Stock/Indicators/MultipleLinesComposition.js",[a["Core/Series/SeriesRegistry.js"],a["Core/Utilities.js"]],function(a,d){var f=a.seriesTypes.sma.prototype,g=d.defined,p=d.error,q=d.merge,k;(function(a){function v(b){return"plot"+b.charAt(0).toUpperCase()+b.slice(1)}function y(b,m){var a=[];(b.pointArrayMap||[]).forEach(function(b){b!==m&&a.push(v(b))});return a}function c(){var b=this,m=b.linesApiNames,a=b.areaLinesNames,e=b.points,c=b.options,x=b.graph,t={options:{gapSize:c.gapSize}},
h=[],d=y(b,b.pointValKey),k=e.length,u;d.forEach(function(b,a){for(h[a]=[];k--;)u=e[k],h[a].push({x:u.x,plotX:u.plotX,plotY:u[b],isNull:!g(u[b])});k=e.length});if(b.userOptions.fillColor&&a.length){var n=d.indexOf(v(a[0]));n=h[n];a=1===a.length?e:h[d.indexOf(v(a[1]))];d=b.color;b.points=a;b.nextPoints=n;b.color=b.userOptions.fillColor;b.options=q(e,t);b.graph=b.area;b.fillGraph=!0;f.drawGraph.call(b);b.area=b.graph;delete b.nextPoints;delete b.fillGraph;b.color=d}m.forEach(function(a,e){h[e]?(b.points=
h[e],c[a]?b.options=q(c[a].styles,t):p('Error: "There is no '+a+' in DOCS options declared. Check if linesApiNames are consistent with your DOCS line names."'),b.graph=b["graph"+a],f.drawGraph.call(b),b["graph"+a]=b.graph):p('Error: "'+a+" doesn't have equivalent in pointArrayMap. To many elements in linesApiNames relative to pointArrayMap.\"")});b.points=e;b.options=c;b.graph=x;f.drawGraph.call(b)}function t(b){var a,c=[];b=b||this.points;if(this.fillGraph&&this.nextPoints){if((a=f.getGraphPath.call(this,
this.nextPoints))&&a.length){a[0][0]="L";c=f.getGraphPath.call(this,b);a=a.slice(0,c.length);for(var e=a.length-1;0<=e;e--)c.push(a[e])}}else c=f.getGraphPath.apply(this,arguments);return c}function x(b){var a=[];(this.pointArrayMap||[]).forEach(function(c){a.push(b[c])});return a}function u(){var b=this,a=this.pointArrayMap,c=[],e;c=y(this);f.translate.apply(this,arguments);this.points.forEach(function(m){a.forEach(function(a,x){e=m[a];b.dataModify&&(e=b.dataModify.modifyValue(e));null!==e&&(m[c[x]]=
b.yAxis.toPixels(e,!0))})})}var k=[],n=["bottomLine"],A=["top","bottom"],B=["top"];a.compose=function(a){if(d.pushUnique(k,a)){var b=a.prototype;b.linesApiNames=b.linesApiNames||n.slice();b.pointArrayMap=b.pointArrayMap||A.slice();b.pointValKey=b.pointValKey||"top";b.areaLinesNames=b.areaLinesNames||B.slice();b.drawGraph=c;b.getGraphPath=t;b.toYData=x;b.translate=u}return a}})(k||(k={}));return k});g(a,"Stock/Indicators/ABands/ABandsIndicator.js",[a["Stock/Indicators/MultipleLinesComposition.js"],
a["Core/Series/SeriesRegistry.js"],a["Core/Utilities.js"]],function(a,d,f){var g=this&&this.__extends||function(){var a=function(d,c){a=Object.setPrototypeOf||{__proto__:[]}instanceof Array&&function(a,c){a.__proto__=c}||function(a,c){for(var d in c)Object.prototype.hasOwnProperty.call(c,d)&&(a[d]=c[d])};return a(d,c)};return function(d,c){function f(){this.constructor=d}if("function"!==typeof c&&null!==c)throw new TypeError("Class extends value "+String(c)+" is not a constructor or null");a(d,c);
d.prototype=null===c?Object.create(c):(f.prototype=c.prototype,new f)}}(),p=d.seriesTypes.sma,q=f.correctFloat,k=f.extend,z=f.merge;f=function(a){function d(){var c=null!==a&&a.apply(this,arguments)||this;c.data=void 0;c.options=void 0;c.points=void 0;return c}g(d,a);d.prototype.getValues=function(c,d){var f=d.period,g=d.factor;d=d.index;var k=c.xData,n=(c=c.yData)?c.length:0,p=[],t=[],b=[],m=[],v=[],e;if(!(n<f)){for(e=0;e<=n;e++){if(e<n){var l=c[e][2];var r=c[e][1];var w=g;l=q(r-l)/(q(r+l)/2)*1E3*
w;p.push(c[e][1]*q(1+2*l));t.push(c[e][2]*q(1-2*l))}if(e>=f){l=k.slice(e-f,e);var h=c.slice(e-f,e);w=a.prototype.getValues.call(this,{xData:l,yData:p.slice(e-f,e)},{period:f});r=a.prototype.getValues.call(this,{xData:l,yData:t.slice(e-f,e)},{period:f});h=a.prototype.getValues.call(this,{xData:l,yData:h},{period:f,index:d});l=h.xData[0];w=w.yData[0];r=r.yData[0];h=h.yData[0];b.push([l,w,h,r]);m.push(l);v.push([w,h,r])}}return{values:b,xData:m,yData:v}}};d.defaultOptions=z(p.defaultOptions,{params:{period:20,
factor:.001,index:3},lineWidth:1,topLine:{styles:{lineWidth:1}},bottomLine:{styles:{lineWidth:1}},dataGrouping:{approximation:"averages"}});return d}(p);k(f.prototype,{areaLinesNames:["top","bottom"],linesApiNames:["topLine","bottomLine"],nameBase:"Acceleration Bands",nameComponents:["period","factor"],pointArrayMap:["top","middle","bottom"],pointValKey:"middle"});a.compose(f);d.registerSeriesType("abands",f);"";return f});g(a,"masters/indicators/acceleration-bands.src.js",[],function(){})});
//# sourceMappingURL=acceleration-bands.js.map