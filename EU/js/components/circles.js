var Circle=function(){"use strict";var handleCircle=function(){Circles.create({id:'circles-1',radius:65,value:55,width:2,textClass:'g-font-size-24--xs g-color--primary',text:function(value){return value+'%'},colors:['rgba(16,122,118,.2)','#13b1cd'],duration:1500});Circles.create({id:'circles-2',radius:65,value:72,width:2,textClass:'g-font-size-24--xs g-color--primary',text:function(value){return value+'%'},colors:['rgba(16,122,118,.2)','#13b1cd'],duration:1500});Circles.create({id:'circles-3',radius:65,value:69,width:2,textClass:'g-font-size-24--xs g-color--primary',text:function(value){return value+'%'},colors:['rgba(16,122,118,.2)','#13b1cd'],duration:1500});Circles.create({id:'circles-4',radius:65,value:82,width:2,textClass:'g-font-size-24--xs g-color--primary',text:function(value){return value+'%'},colors:['rgba(16,122,118,.2)','#13b1cd'],duration:1500})}
return{init:function(){handleCircle()}}}();$(document).ready(function(){Circle.init()});a