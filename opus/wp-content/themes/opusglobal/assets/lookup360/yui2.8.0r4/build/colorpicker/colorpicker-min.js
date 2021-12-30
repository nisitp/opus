/*
Copyright (c) 2009, Yahoo! Inc. All rights reserved.
Code licensed under the BSD License:
http://developer.yahoo.net/yui/license.txt
version: 2.8.0r4
*/
YAHOO.util.Color=function(){var A="0",B=YAHOO.lang.isArray,C=YAHOO.lang.isNumber;return{real2dec:function(D){return Math.min(255,Math.round(D*256));},hsv2rgb:function(H,O,M){if(B(H)){return this.hsv2rgb.call(this,H[0],H[1],H[2]);}var D,I,L,G=Math.floor((H/60)%6),J=(H/60)-G,F=M*(1-O),E=M*(1-J*O),N=M*(1-(1-J)*O),K;switch(G){case 0:D=M;I=N;L=F;break;case 1:D=E;I=M;L=F;break;case 2:D=F;I=M;L=N;break;case 3:D=F;I=E;L=M;break;case 4:D=N;I=F;L=M;break;case 5:D=M;I=F;L=E;break;}K=this.real2dec;return[K(D),K(I),K(L)];},rgb2hsv:function(D,H,I){if(B(D)){return this.rgb2hsv.apply(this,D);}D/=255;H/=255;I/=255;var G,L,E=Math.min(Math.min(D,H),I),J=Math.max(Math.max(D,H),I),K=J-E,F;switch(J){case E:G=0;break;case D:G=60*(H-I)/K;if(H<I){G+=360;}break;case H:G=(60*(I-D)/K)+120;break;case I:G=(60*(D-H)/K)+240;break;}L=(J===0)?0:1-(E/J);F=[Math.round(G),L,J];return F;},rgb2hex:function(F,E,D){if(B(F)){return this.rgb2hex.apply(this,F);}var G=this.dec2hex;return G(F)+G(E)+G(D);},dec2hex:function(D){D=parseInt(D,10)|0;D=(D>255||D<0)?0:D;return(A+D.toString(16)).slice(-2).toUpperCase();},hex2dec:function(D){return parseInt(D,16);},hex2rgb:function(D){var E=this.hex2dec;return[E(D.slice(0,2)),E(D.slice(2,4)),E(D.slice(4,6))];},websafe:function(F,E,D){if(B(F)){return this.websafe.apply(this,F);}var G=function(H){if(C(H)){H=Math.min(Math.max(0,H),255);var I,J;for(I=0;I<256;I=I+51){J=I+51;if(H>=I&&H<=J){return(H-I>25)?J:I;}}}return H;};return[G(F),G(E),G(D)];}};}();(function(){var J=0,F=YAHOO.util,C=YAHOO.lang,D=YAHOO.widget.Slider,B=F.Color,E=F.Dom,I=F.Event,A=C.substitute,H="yui-picker";function G(L,K){J=J+1;K=K||{};if(arguments.length===1&&!YAHOO.lang.isString(L)&&!L.nodeName){K=L;L=K.element||null;}if(!L&&!K.element){L=this._createHostElement(K);}G.superclass.constructor.call(this,L,K);this.initPicker();}YAHOO.extend(G,YAHOO.util.Element,{ID:{R:H+"-r",R_HEX:H+"-rhex",G:H+"-g",G_HEX:H+"-ghex",B:H+"-b",B_HEX:H+"-bhex",H:H+"-h",S:H+"-s",V:H+"-v",PICKER_BG:H+"-bg",PICKER_THUMB:H+"-thumb",HUE_BG:H+"-hue-bg",HUE_THUMB:H+"-hue-thumb",HEX:H+"-hex",SWATCH:H+"-swatch",WEBSAFE_SWATCH:H+"-websafe-swatch",CONTROLS:H+"-controls",RGB_CONTROLS:H+"-rgb-controls",HSV_CONTROLS:H+"-hsv-controls",HEX_CONTROLS:H+"-hex-controls",HEX_SUMMARY:H+"-hex-summary",CONTROLS_LABEL:H+"-controls-label"},TXT:{ILLEGAL_HEX:"Illegal hex value entered",SHOW_CONTROLS:"Show color details",HIDE_CONTROLS:"Hide color details",CURRENT_COLOR:"Currently selected color: {rgb}",CLOSEST_WEBSAFE:"Closest websafe color: {rgb}. Click to select.",R:"R",G:"G",B:"B",H:"H",S:"S",V:"V",HEX:"#",DEG:"\u00B0",PERCENT:"%"},IMAGE:{PICKER_THUMB:"../../build/colorpicker/assets/picker_thumb.png",HUE_THUMB:"../../build/colorpicker/assets/hue_thumb.png"},DEFAULT:{PICKER_SIZE:180},OPT:{HUE:"hue",SATURATION:"saturation",VALUE:"value",RED:"red",GREEN:"green",BLUE:"blue",HSV:"hsv",RGB:"rgb",WEBSAFE:"websafe",HEX:"hex",PICKER_SIZE:"pickersize",SHOW_CONTROLS:"showcontrols",SHOW_RGB_CONTROLS:"showrgbcontrols",SHOW_HSV_CONTROLS:"showhsvcontrols",SHOW_HEX_CONTROLS:"showhexcontrols",SHOW_HEX_SUMMARY:"showhexsummary",SHOW_WEBSAFE:"showwebsafe",CONTAINER:"container",IDS:"ids",ELEMENTS:"elements",TXT:"txt",IMAGES:"images",ANIMATE:"animate"},skipAnim:true,_createHostElement:function(){var K=document.createElement("div");if(this.CSS.BASE){K.className=this.CSS.BASE;}return K;},_updateHueSlider:function(){var K=this.get(this.OPT.PICKER_SIZE),L=this.get(this.OPT.HUE);L=K-Math.round(L/360*K);if(L===K){L=0;}this.hueSlider.setValue(L,this.skipAnim);},_updatePickerSlider:function(){var L=this.get(this.OPT.PICKER_SIZE),M=this.get(this.OPT.SATURATION),K=this.get(this.OPT.VALUE);M=Math.round(M*L/100);K=Math.round(L-(K*L/100));this.pickerSlider.setRegionValue(M,K,this.skipAnim);},_updateSliders:function(){this._updateHueSlider();this._updatePickerSlider();},setValue:function(L,K){K=(K)||false;this.set(this.OPT.RGB,L,K);this._updateSliders();},hueSlider:null,pickerSlider:null,_getH:function(){var K=this.get(this.OPT.PICKER_SIZE),L=(K-this.hueSlider.getValue())/K;L=Math.round(L*360);return(L===360)?0:L;},_getS:function(){return this.pickerSlider.getXValue()/this.get(this.OPT.PICKER_SIZE);},_getV:function(){var K=this.get(this.OPT.PICKER_SIZE);return(K-this.pickerSlider.getYValue())/K;},_updateSwatch:function(){var M=this.get(this.OPT.RGB),O=this.get(this.OPT.WEBSAFE),N=this.getElement(this.ID.SWATCH),L=M.join(","),K=this.get(this.OPT.TXT);E.setStyle(N,"background-color","rgb("+L+")");N.title=A(K.CURRENT_COLOR,{"rgb":"#"+this.get(this.OPT.HEX)});N=this.getElement(this.ID.WEBSAFE_SWATCH);L=O.join(",");E.setStyle(N,"background-color","rgb("+L+")");N.title=A(K.CLOSEST_WEBSAFE,{"rgb":"#"+B.rgb2hex(O)});},_getValuesFromSliders:function(){this.set(this.OPT.RGB,B.hsv2rgb(this._getH(),this._getS(),this._getV()));},_updateFormFields:function(){this.getElement(this.ID.H).value=this.get(this.OPT.HUE);this.getElement(this.ID.S).value=this.get(this.OPT.SATURATION);this.getElement(this.ID.V).value=this.get(this.OPT.VALUE);this.getElement(this.ID.R).value=this.get(this.OPT.RED);this.getElement(this.ID.R_HEX).innerHTML=B.dec2hex(this.get(this.OPT.RED));this.getElement(this.ID.G).value=this.get(this.OPT.GREEN);this.getElement(this.ID.G_HEX).innerHTML=B.dec2hex(this.get(this.OPT.GREEN));this.getElement(this.ID.B).value=this.get(this.OPT.BLUE);this.getElement(this.ID.B_HEX).innerHTML=B.dec2hex(this.get(this.OPT.BLUE));this.getElement(this.ID.HEX).value=this.get(this.OPT.HEX);},_onHueSliderChange:function(N){var L=this._getH(),K=B.hsv2rgb(L,1,1),M="rgb("+K.join(",")+")";this.set(this.OPT.HUE,L,true);E.setStyle(this.getElement(this.ID.PICKER_BG),"background-color",M);if(this.hueSlider.valueChangeSource!==D.SOURCE_SET_VALUE){this._getValuesFromSliders();}this._updateFormFields();this._updateSwatch();},_onPickerSliderChange:function(M){var L=this._getS(),K=this._getV();this.set(this.OPT.SATURATION,Math.round(L*100),true);this.set(this.OPT.VALUE,Math.round(K*100),true);if(this.pickerSlider.valueChangeSource!==D.SOURCE_SET_VALUE){this._getValuesFromSliders();
}this._updateFormFields();this._updateSwatch();},_getCommand:function(K){var L=I.getCharCode(K);if(L===38){return 3;}else{if(L===13){return 6;}else{if(L===40){return 4;}else{if(L>=48&&L<=57){return 1;}else{if(L>=97&&L<=102){return 2;}else{if(L>=65&&L<=70){return 2;}else{if("8, 9, 13, 27, 37, 39".indexOf(L)>-1||K.ctrlKey||K.metaKey){return 5;}else{return 0;}}}}}}}},_useFieldValue:function(L,K,N){var M=K.value;if(N!==this.OPT.HEX){M=parseInt(M,10);}if(M!==this.get(N)){this.set(N,M);}},_rgbFieldKeypress:function(M,K,O){var N=this._getCommand(M),L=(M.shiftKey)?10:1;switch(N){case 6:this._useFieldValue.apply(this,arguments);break;case 3:this.set(O,Math.min(this.get(O)+L,255));this._updateFormFields();break;case 4:this.set(O,Math.max(this.get(O)-L,0));this._updateFormFields();break;default:}},_hexFieldKeypress:function(L,K,N){var M=this._getCommand(L);if(M===6){this._useFieldValue.apply(this,arguments);}},_hexOnly:function(L,K){var M=this._getCommand(L);switch(M){case 6:case 5:case 1:break;case 2:if(K!==true){break;}default:I.stopEvent(L);return false;}},_numbersOnly:function(K){return this._hexOnly(K,true);},getElement:function(K){return this.get(this.OPT.ELEMENTS)[this.get(this.OPT.IDS)[K]];},_createElements:function(){var N,M,P,O,L,K=this.get(this.OPT.IDS),Q=this.get(this.OPT.TXT),S=this.get(this.OPT.IMAGES),R=function(U,V){var W=document.createElement(U);if(V){C.augmentObject(W,V,true);}return W;},T=function(U,V){var W=C.merge({autocomplete:"off",value:"0",size:3,maxlength:3},V);W.name=W.id;return new R(U,W);};L=this.get("element");N=new R("div",{id:K[this.ID.PICKER_BG],className:"yui-picker-bg",tabIndex:-1,hideFocus:true});M=new R("div",{id:K[this.ID.PICKER_THUMB],className:"yui-picker-thumb"});P=new R("img",{src:S.PICKER_THUMB});M.appendChild(P);N.appendChild(M);L.appendChild(N);N=new R("div",{id:K[this.ID.HUE_BG],className:"yui-picker-hue-bg",tabIndex:-1,hideFocus:true});M=new R("div",{id:K[this.ID.HUE_THUMB],className:"yui-picker-hue-thumb"});P=new R("img",{src:S.HUE_THUMB});M.appendChild(P);N.appendChild(M);L.appendChild(N);N=new R("div",{id:K[this.ID.CONTROLS],className:"yui-picker-controls"});L.appendChild(N);L=N;N=new R("div",{className:"hd"});M=new R("a",{id:K[this.ID.CONTROLS_LABEL],href:"#"});N.appendChild(M);L.appendChild(N);N=new R("div",{className:"bd"});L.appendChild(N);L=N;N=new R("ul",{id:K[this.ID.RGB_CONTROLS],className:"yui-picker-rgb-controls"});M=new R("li");M.appendChild(document.createTextNode(Q.R+" "));O=new T("input",{id:K[this.ID.R],className:"yui-picker-r"});M.appendChild(O);N.appendChild(M);M=new R("li");M.appendChild(document.createTextNode(Q.G+" "));O=new T("input",{id:K[this.ID.G],className:"yui-picker-g"});M.appendChild(O);N.appendChild(M);M=new R("li");M.appendChild(document.createTextNode(Q.B+" "));O=new T("input",{id:K[this.ID.B],className:"yui-picker-b"});M.appendChild(O);N.appendChild(M);L.appendChild(N);N=new R("ul",{id:K[this.ID.HSV_CONTROLS],className:"yui-picker-hsv-controls"});M=new R("li");M.appendChild(document.createTextNode(Q.H+" "));O=new T("input",{id:K[this.ID.H],className:"yui-picker-h"});M.appendChild(O);M.appendChild(document.createTextNode(" "+Q.DEG));N.appendChild(M);M=new R("li");M.appendChild(document.createTextNode(Q.S+" "));O=new T("input",{id:K[this.ID.S],className:"yui-picker-s"});M.appendChild(O);M.appendChild(document.createTextNode(" "+Q.PERCENT));N.appendChild(M);M=new R("li");M.appendChild(document.createTextNode(Q.V+" "));O=new T("input",{id:K[this.ID.V],className:"yui-picker-v"});M.appendChild(O);M.appendChild(document.createTextNode(" "+Q.PERCENT));N.appendChild(M);L.appendChild(N);N=new R("ul",{id:K[this.ID.HEX_SUMMARY],className:"yui-picker-hex_summary"});M=new R("li",{id:K[this.ID.R_HEX]});N.appendChild(M);M=new R("li",{id:K[this.ID.G_HEX]});N.appendChild(M);M=new R("li",{id:K[this.ID.B_HEX]});N.appendChild(M);L.appendChild(N);N=new R("div",{id:K[this.ID.HEX_CONTROLS],className:"yui-picker-hex-controls"});N.appendChild(document.createTextNode(Q.HEX+" "));M=new T("input",{id:K[this.ID.HEX],className:"yui-picker-hex",size:6,maxlength:6});N.appendChild(M);L.appendChild(N);L=this.get("element");N=new R("div",{id:K[this.ID.SWATCH],className:"yui-picker-swatch"});L.appendChild(N);N=new R("div",{id:K[this.ID.WEBSAFE_SWATCH],className:"yui-picker-websafe-swatch"});L.appendChild(N);},_attachRGBHSV:function(L,K){I.on(this.getElement(L),"keydown",function(N,M){M._rgbFieldKeypress(N,this,K);},this);I.on(this.getElement(L),"keypress",this._numbersOnly,this,true);I.on(this.getElement(L),"blur",function(N,M){M._useFieldValue(N,this,K);},this);},_updateRGB:function(){var K=[this.get(this.OPT.RED),this.get(this.OPT.GREEN),this.get(this.OPT.BLUE)];this.set(this.OPT.RGB,K);this._updateSliders();},_initElements:function(){var O=this.OPT,N=this.get(O.IDS),L=this.get(O.ELEMENTS),K,M,P;for(K in this.ID){if(C.hasOwnProperty(this.ID,K)){N[this.ID[K]]=N[K];}}M=E.get(N[this.ID.PICKER_BG]);if(!M){this._createElements();}else{}for(K in N){if(C.hasOwnProperty(N,K)){M=E.get(N[K]);P=E.generateId(M);N[K]=P;N[N[K]]=P;L[P]=M;}}},initPicker:function(){this._initSliders();this._bindUI();this.syncUI(true);},_initSliders:function(){var K=this.ID,L=this.get(this.OPT.PICKER_SIZE);this.hueSlider=D.getVertSlider(this.getElement(K.HUE_BG),this.getElement(K.HUE_THUMB),0,L);this.pickerSlider=D.getSliderRegion(this.getElement(K.PICKER_BG),this.getElement(K.PICKER_THUMB),0,L,0,L);this.set(this.OPT.ANIMATE,this.get(this.OPT.ANIMATE));},_bindUI:function(){var K=this.ID,L=this.OPT;this.hueSlider.subscribe("change",this._onHueSliderChange,this,true);this.pickerSlider.subscribe("change",this._onPickerSliderChange,this,true);I.on(this.getElement(K.WEBSAFE_SWATCH),"click",function(M){this.setValue(this.get(L.WEBSAFE));},this,true);I.on(this.getElement(K.CONTROLS_LABEL),"click",function(M){this.set(L.SHOW_CONTROLS,!this.get(L.SHOW_CONTROLS));I.preventDefault(M);},this,true);this._attachRGBHSV(K.R,L.RED);this._attachRGBHSV(K.G,L.GREEN);this._attachRGBHSV(K.B,L.BLUE);this._attachRGBHSV(K.H,L.HUE);
this._attachRGBHSV(K.S,L.SATURATION);this._attachRGBHSV(K.V,L.VALUE);I.on(this.getElement(K.HEX),"keydown",function(N,M){M._hexFieldKeypress(N,this,L.HEX);},this);I.on(this.getElement(this.ID.HEX),"keypress",this._hexOnly,this,true);I.on(this.getElement(this.ID.HEX),"blur",function(N,M){M._useFieldValue(N,this,L.HEX);},this);},syncUI:function(K){this.skipAnim=K;this._updateRGB();this.skipAnim=false;},_updateRGBFromHSV:function(){var L=[this.get(this.OPT.HUE),this.get(this.OPT.SATURATION)/100,this.get(this.OPT.VALUE)/100],K=B.hsv2rgb(L);this.set(this.OPT.RGB,K);this._updateSliders();},_updateHex:function(){var N=this.get(this.OPT.HEX),K=N.length,O,M,L;if(K===3){O=N.split("");for(M=0;M<K;M=M+1){O[M]=O[M]+O[M];}N=O.join("");}if(N.length!==6){return false;}L=B.hex2rgb(N);this.setValue(L);},_hideShowEl:function(M,K){var L=(C.isString(M)?this.getElement(M):M);E.setStyle(L,"display",(K)?"":"none");},initAttributes:function(K){K=K||{};G.superclass.initAttributes.call(this,K);this.setAttributeConfig(this.OPT.PICKER_SIZE,{value:K.size||this.DEFAULT.PICKER_SIZE});this.setAttributeConfig(this.OPT.HUE,{value:K.hue||0,validator:C.isNumber});this.setAttributeConfig(this.OPT.SATURATION,{value:K.saturation||0,validator:C.isNumber});this.setAttributeConfig(this.OPT.VALUE,{value:C.isNumber(K.value)?K.value:100,validator:C.isNumber});this.setAttributeConfig(this.OPT.RED,{value:C.isNumber(K.red)?K.red:255,validator:C.isNumber});this.setAttributeConfig(this.OPT.GREEN,{value:C.isNumber(K.green)?K.green:255,validator:C.isNumber});this.setAttributeConfig(this.OPT.BLUE,{value:C.isNumber(K.blue)?K.blue:255,validator:C.isNumber});this.setAttributeConfig(this.OPT.HEX,{value:K.hex||"FFFFFF",validator:C.isString});this.setAttributeConfig(this.OPT.RGB,{value:K.rgb||[255,255,255],method:function(O){this.set(this.OPT.RED,O[0],true);this.set(this.OPT.GREEN,O[1],true);this.set(this.OPT.BLUE,O[2],true);var Q=B.websafe(O),P=B.rgb2hex(O),N=B.rgb2hsv(O);this.set(this.OPT.WEBSAFE,Q,true);this.set(this.OPT.HEX,P,true);if(N[1]){this.set(this.OPT.HUE,N[0],true);}this.set(this.OPT.SATURATION,Math.round(N[1]*100),true);this.set(this.OPT.VALUE,Math.round(N[2]*100),true);},readonly:true});this.setAttributeConfig(this.OPT.CONTAINER,{value:null,method:function(N){if(N){N.showEvent.subscribe(function(){this.pickerSlider.focus();},this,true);}}});this.setAttributeConfig(this.OPT.WEBSAFE,{value:K.websafe||[255,255,255]});var M=K.ids||C.merge({},this.ID),L;if(!K.ids&&J>1){for(L in M){if(C.hasOwnProperty(M,L)){M[L]=M[L]+J;}}}this.setAttributeConfig(this.OPT.IDS,{value:M,writeonce:true});this.setAttributeConfig(this.OPT.TXT,{value:K.txt||this.TXT,writeonce:true});this.setAttributeConfig(this.OPT.IMAGES,{value:K.images||this.IMAGE,writeonce:true});this.setAttributeConfig(this.OPT.ELEMENTS,{value:{},readonly:true});this.setAttributeConfig(this.OPT.SHOW_CONTROLS,{value:C.isBoolean(K.showcontrols)?K.showcontrols:true,method:function(N){var O=E.getElementsByClassName("bd","div",this.getElement(this.ID.CONTROLS))[0];this._hideShowEl(O,N);this.getElement(this.ID.CONTROLS_LABEL).innerHTML=(N)?this.get(this.OPT.TXT).HIDE_CONTROLS:this.get(this.OPT.TXT).SHOW_CONTROLS;}});this.setAttributeConfig(this.OPT.SHOW_RGB_CONTROLS,{value:C.isBoolean(K.showrgbcontrols)?K.showrgbcontrols:true,method:function(N){this._hideShowEl(this.ID.RGB_CONTROLS,N);}});this.setAttributeConfig(this.OPT.SHOW_HSV_CONTROLS,{value:C.isBoolean(K.showhsvcontrols)?K.showhsvcontrols:false,method:function(N){this._hideShowEl(this.ID.HSV_CONTROLS,N);if(N&&this.get(this.OPT.SHOW_HEX_SUMMARY)){this.set(this.OPT.SHOW_HEX_SUMMARY,false);}}});this.setAttributeConfig(this.OPT.SHOW_HEX_CONTROLS,{value:C.isBoolean(K.showhexcontrols)?K.showhexcontrols:false,method:function(N){this._hideShowEl(this.ID.HEX_CONTROLS,N);}});this.setAttributeConfig(this.OPT.SHOW_WEBSAFE,{value:C.isBoolean(K.showwebsafe)?K.showwebsafe:true,method:function(N){this._hideShowEl(this.ID.WEBSAFE_SWATCH,N);}});this.setAttributeConfig(this.OPT.SHOW_HEX_SUMMARY,{value:C.isBoolean(K.showhexsummary)?K.showhexsummary:true,method:function(N){this._hideShowEl(this.ID.HEX_SUMMARY,N);if(N&&this.get(this.OPT.SHOW_HSV_CONTROLS)){this.set(this.OPT.SHOW_HSV_CONTROLS,false);}}});this.setAttributeConfig(this.OPT.ANIMATE,{value:C.isBoolean(K.animate)?K.animate:true,method:function(N){if(this.pickerSlider){this.pickerSlider.animate=N;this.hueSlider.animate=N;}}});this.on(this.OPT.HUE+"Change",this._updateRGBFromHSV,this,true);this.on(this.OPT.SATURATION+"Change",this._updateRGBFromHSV,this,true);this.on(this.OPT.VALUE+"Change",this._updateRGBFromHSV,this,true);this.on(this.OPT.RED+"Change",this._updateRGB,this,true);this.on(this.OPT.GREEN+"Change",this._updateRGB,this,true);this.on(this.OPT.BLUE+"Change",this._updateRGB,this,true);this.on(this.OPT.HEX+"Change",this._updateHex,this,true);this._initElements();}});YAHOO.widget.ColorPicker=G;})();YAHOO.register("colorpicker",YAHOO.widget.ColorPicker,{version:"2.8.0r4",build:"2449"});