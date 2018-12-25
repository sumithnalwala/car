/*
 Highcharts JS v6.0.7 (2018-02-16)
 Gantt series

 (c) 2016 Lars A. V. Cabrera

 --- WORK IN PROGRESS ---

 License: www.highcharts.com/license
*/
(function(m){"object"===typeof module&&module.exports?module.exports=m:m(Highcharts)})(function(m){(function(k){var m=k.each,v=k.isObject,u=k.pick,l=k.wrap,n=k.Axis,r=k.Chart,p=k.Tick;n.prototype.isOuterAxis=function(){var b=this,d=-1,c=!0;m(this.chart.axes,function(g,f){g.side===b.side&&(g===b?d=f:0<=d&&f>d&&(c=!1))});return c};p.prototype.getLabelWidth=function(){return this.label.getBBox().width};n.prototype.getMaxLabelLength=function(b){var d=this.tickPositions,c=this.ticks,g=0;if(!this.maxLabelLength||
b)m(d,function(b){(b=c[b])&&b.labelLength>g&&(g=b.labelLength)}),this.maxLabelLength=g;return this.maxLabelLength};n.prototype.addTitle=function(){var b=this.chart.renderer,d=this.axisParent,c=this.horiz,g=this.opposite,f=this.options,e=f.title,a;this.showAxis=a=this.hasData()||u(f.showEmpty,!0);f.title="";this.axisTitle||((f=e.textAlign)||(f=(c?{low:"left",middle:"center",high:"right"}:{low:g?"right":"left",middle:"center",high:g?"left":"right"})[e.align]),this.axisTitle=b.text(e.text,0,0,e.useHTML).attr({zIndex:7,
rotation:e.rotation||0,align:f}).addClass("highcharts-axis-title").css(e.style).add(d),this.axisTitle.isNew=!0);this.axisTitle[a?"show":"hide"](!0)};k.dateFormats={W:function(b){b=new this.Date(b);var d=0===this.get("Day",b)?7:this.get("Day",b),c=b.getTime(),g=new Date(this.get("FullYear",b),0,1,-6);this.set("Date",b,this.get("Date",b)+4-d);return 1+Math.floor(Math.floor((c-g)/864E5)/7)},E:function(b){return this.dateFormat("%a",b,!0).charAt(0)}};l(p.prototype,"addLabel",function(b){var d=this.axis,
c=void 0!==d.options.categories,g=d.tickPositions,g=this.pos!==g[g.length-1];(!d.options.grid||c||g)&&b.apply(this)});l(p.prototype,"getLabelPosition",function(b,d,c,g){var f=b.apply(this,Array.prototype.slice.call(arguments,1)),e=this.axis,a=e.options,h=a.tickInterval||1,q,t;a.grid&&(q=a.labels.style.fontSize,t=e.chart.renderer.fontMetrics(q,g),q=t.b,t=t.h,e.horiz&&void 0===a.categories?(a=e.axisGroup.getBBox().height,h=this.pos+h/2,f.x=e.translate(h)+e.left,h=a/2+t/2-Math.abs(t-q),f.y=0===e.side?
c-h:c+h):(void 0===a.categories&&(h=this.pos+h/2,f.y=e.translate(h)+e.top+q/2),h=this.getLabelWidth()/2-e.maxLabelLength/2,f.x=3===e.side?f.x+h:f.x-h));return f});l(n.prototype,"tickSize",function(b){var d=b.apply(this,Array.prototype.slice.call(arguments,1)),c;this.options.grid&&!this.horiz&&(c=2*Math.abs(this.defaultLeftAxisOptions.labels.x),this.maxLabelLength||(this.maxLabelLength=this.getMaxLabelLength()),c=this.maxLabelLength+c,d[0]=c);return d});l(n.prototype,"getOffset",function(b){var d=
this.chart.axisOffset,c=this.side,g,f,e=this.options,a=e.title,h=a&&a.text&&!1!==a.enabled;this.options.grid&&v(this.options.title)?(f=this.tickSize("tick")[0],d[c]&&f&&(g=d[c]+f),h&&this.addTitle(),b.apply(this,Array.prototype.slice.call(arguments,1)),d[c]=u(g,d[c]),e.title=a):b.apply(this,Array.prototype.slice.call(arguments,1))});l(n.prototype,"renderUnsquish",function(b){this.options.grid&&(this.labelRotation=0,this.options.labels.rotation=0);b.apply(this)});l(n.prototype,"setOptions",function(b,
d){d.grid&&this.horiz&&(d.startOnTick=!0,d.minPadding=0,d.endOnTick=!0);b.apply(this,Array.prototype.slice.call(arguments,1))});l(n.prototype,"render",function(b){var d=this.options,c,g,f,e,a,h,q=this.chart.renderer;if(d.grid){if(c=2*Math.abs(this.defaultLeftAxisOptions.labels.x),c=this.maxLabelLength+c,g=d.lineWidth,this.rightWall&&this.rightWall.destroy(),b.apply(this),b=this.axisGroup.getBBox(),this.horiz&&(this.rightWall=q.path(["M",b.x+this.width+1,b.y,"L",b.x+this.width+1,b.y+b.height]).attr({stroke:d.tickColor||
"#ccd6eb","stroke-width":d.tickWidth||1,zIndex:7,class:"grid-wall"}).add(this.axisGroup)),this.isOuterAxis()&&this.axisLine&&(this.horiz&&(c=b.height-1),g)){b=this.getLinePath(g);a=b.indexOf("M")+1;h=b.indexOf("L")+1;f=b.indexOf("M")+2;e=b.indexOf("L")+2;if(0===this.side||3===this.side)c=-c;this.horiz?(b[f]+=c,b[e]+=c):(b[a]+=c,b[h]+=c);this.axisLineExtra?this.axisLineExtra.animate({d:b}):this.axisLineExtra=q.path(b).attr({stroke:d.lineColor,"stroke-width":g,zIndex:7}).add(this.axisGroup);this.axisLine[this.showAxis?
"show":"hide"](!0)}}else b.apply(this)});l(r.prototype,"render",function(b){var d=25/11,c,g;m(this.axes,function(b){var e=b.options;e.grid&&(g=e.labels.style.fontSize,c=b.chart.renderer.fontMetrics(g),"datetime"===e.type&&(e.units=[["millisecond",[1]],["second",[1]],["minute",[1]],["hour",[1]],["day",[1]],["week",[1]],["month",[1]],["year",null]]),b.horiz?e.tickLength=e.cellHeight||c.h*d:(e.tickWidth=1,e.lineWidth||(e.lineWidth=1)))});b.apply(this)})})(m);(function(k){var m=k.defined,v=k.Color,u=
k.seriesTypes.column,l=k.each,n=k.isNumber,r=k.isObject,p=k.merge,b=k.pick,d=k.seriesType,c=k.wrap,g=k.Axis,f=k.Point,e=k.Series;d("xrange","column",{colorByPoint:!0,dataLabels:{verticalAlign:"middle",inside:!0,formatter:function(){var a=this.point.partialFill;r(a)&&(a=a.amount);m(a)||(a=0);return 100*a+"%"}},tooltip:{headerFormat:'\x3cspan style\x3d"font-size: 0.85em"\x3e{point.x} - {point.x2}\x3c/span\x3e\x3cbr/\x3e',pointFormat:'\x3cspan style\x3d"color:{point.color}"\x3e\u25cf\x3c/span\x3e {series.name}: \x3cb\x3e{point.yCategory}\x3c/b\x3e\x3cbr/\x3e'},
borderRadius:3,pointRange:0},{type:"xrange",parallelArrays:["x","x2","y"],requireSorting:!1,animate:k.seriesTypes.line.prototype.animate,cropShoulder:1,getExtremesFromAll:!0,getColumnMetrics:function(){function a(){l(c.series,function(a){var b=a.xAxis;a.xAxis=a.yAxis;a.yAxis=b})}var b,c=this.chart;a();b=u.prototype.getColumnMetrics.call(this);a();return b},cropData:function(a,b,c,d){b=e.prototype.cropData.call(this,this.x2Data,b,c,d);b.xData=a.slice(b.start,b.end);return b},translatePoint:function(a){var h=
this.xAxis,c=this.columnMetrics,d=this.options.minPointLength||0,e=a.plotX,g=b(a.x2,a.x+(a.len||0)),f=h.translate(g,0,0,0,1),g=f-e,k=this.chart.inverted,l=b(this.options.borderWidth,1)%2/2;d&&(d-=g,0>d&&(d=0),e-=d/2,f+=d/2);e=Math.max(e,-10);f=Math.min(Math.max(f,-10),h.len+10);a.shapeArgs={x:Math.floor(Math.min(e,f))+l,y:Math.floor(a.plotY+c.offset)+l,width:Math.round(Math.abs(f-e)),height:Math.round(c.width),r:this.options.borderRadius};d=a.shapeArgs.x;f=d+a.shapeArgs.width;0>d||f>h.len?(d=Math.min(h.len,
Math.max(0,d)),f=Math.max(0,Math.min(f,h.len)),h=f-d,a.dlBox=p(a.shapeArgs,{x:d,width:f-d,centerX:h?h/2:null})):a.dlBox=null;a.tooltipPos[0]+=k?0:g/2;a.tooltipPos[1]-=k?g/2:c.width/2;if(h=a.partialFill)r(h)&&(h=h.amount),n(h)||(h=0),c=a.shapeArgs,a.partShapeArgs={x:c.x,y:c.y,width:c.width,height:c.height,r:this.options.borderRadius},a.clipRectArgs={x:c.x,y:c.y,width:Math.max(Math.round(g*h+(a.plotX-e)),0),height:c.height}},translate:function(){u.prototype.translate.apply(this,arguments);l(this.points,
function(a){this.translatePoint(a)},this)},drawPoint:function(a,b){var c=this.options,d=this.chart.renderer,h=a.graphic,e=a.shapeType,f=a.shapeArgs,g=a.partShapeArgs,k=a.clipRectArgs,l=a.partialFill,m=a.selected&&"select",n=c.stacking&&!c.borderRadius;if(a.isNull)h&&(a.graphic=h.destroy());else{if(h)a.graphicOriginal[b](p(f));else a.graphic=h=d.g("point").addClass(a.getClassName()).add(a.group||this.group),a.graphicOriginal=d[e](f).addClass(a.getClassName()).addClass("highcharts-partfill-original").add(h);
g&&(a.graphicOverlay?(a.graphicOverlay[b](p(g)),a.clipRect.animate(p(k))):(a.clipRect=d.clipRect(k.x,k.y,k.width,k.height),a.graphicOverlay=d[e](g).addClass("highcharts-partfill-overlay").add(h).clip(a.clipRect)));a.graphicOriginal.attr(this.pointAttribs(a,m)).shadow(c.shadow,null,n);g&&(r(l)||(l={}),r(c.partialFill)&&(l=p(l,c.partialFill)),b=l.fill||v(a.color||this.color).brighten(-.3).get(),a.graphicOverlay.attr(this.pointAttribs(a,m)).attr({fill:b}).shadow(c.shadow,null,n))}},drawPoints:function(){var a=
this,b=this.chart.pointCount<(a.options.animationLimit||250)?"animate":"attr";l(a.points,function(c){a.drawPoint(c,b)})}},{init:function(){f.prototype.init.apply(this,arguments);var a;a=this.series;var c=a.chart.options.chart.colorCount;this.y||(this.y=0);a.options.colorByPoint&&(a=a.options.colors||a.chart.options.colors,c=a.length,!this.options.color&&a[this.y%c]&&(this.color=a[this.y%c]));this.colorIndex=b(this.options.colorIndex,this.y%c);return this},getLabelConfig:function(){var a=f.prototype.getLabelConfig.call(this),
b=this.series.yAxis.categories;a.x2=this.x2;a.yCategory=this.yCategory=b&&b[this.y];return a},tooltipDateKeys:["x","x2"],isValid:function(){return"number"===typeof this.x&&"number"===typeof this.x2}});c(g.prototype,"getSeriesExtremes",function(a){var c=this.series,d,e;a.call(this);this.isXAxis&&(d=b(this.dataMax,-Number.MAX_VALUE),l(c,function(a){a.x2Data&&l(a.x2Data,function(a){a>d&&(d=a,e=!0)})}),e&&(this.dataMax=d))})})(m)});
