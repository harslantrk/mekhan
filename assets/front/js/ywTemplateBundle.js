
var dmm=dmm||{};dmm.config=dmm.config||{};dmm.config.AdData=dmm.config.AdData||{};dmm.config.AdData.DFP=dmm.config.AdData.DFP||{};dmm.config.AdData.DFP.lengthRanges=dmm.config.AdData.DFP.lengthRanges||{};dmm.config.AdData.DFP.lengthRanges={'range1':{min:'1',max:'17'},'range2':{min:'18',max:'28'},'range3':{min:'29',max:'37'},'range4':{min:'38',max:'44'},'range5':{min:'45',max:'55'},'range6':{min:'56',max:'72'},'range7':{min:'73',max:'85'},'range8':{min:'86',max:'92'},'range9':{min:'93',max:'115'},'range10':{min:'116',max:undefined}};function getLengthRanges(minLength,maxLength){var includedRanges=[];var partOfRange=false;if(!minLength||minLength<=0){minLength=1;}
for(var range in dmm.config.AdData.DFP.lengthRanges){if(!partOfRange&&includedRanges.length===0){partOfRange=inRange(minLength,dmm.config.AdData.DFP.lengthRanges[range]);}else if(partOfRange){partOfRange=maxLength?maxLength>=parseInt(dmm.config.AdData.DFP.lengthRanges[range].min):true;}
partOfRange?includedRanges.push(range):null;}
includedRanges.length===0?includedRanges=undefined:null;return includedRanges.toString();};function inRange(value,range){return value>=parseInt(range.min)&&(value<=parseInt(range.max)||range.max===undefined);};var Prototype={Version:'1.7',Browser:(function(){var ua=navigator.userAgent;var isOpera=Object.prototype.toString.call(window.opera)=='[object Opera]';return{IE:!!window.attachEvent&&!isOpera,Opera:isOpera,WebKit:ua.indexOf('AppleWebKit/')>-1,Gecko:ua.indexOf('Gecko')>-1&&ua.indexOf('KHTML')===-1,MobileSafari:/Apple.*Mobile/.test(ua)}})(),BrowserFeatures:{XPath:!!document.evaluate,SelectorsAPI:!!document.querySelector,ElementExtensions:(function(){var constructor=window.Element||window.HTMLElement;return!!(constructor&&constructor.prototype);})(),SpecificElementExtensions:(function(){if(typeof window.HTMLDivElement!=='undefined')
return true;var div=document.createElement('div'),form=document.createElement('form'),isSupported=false;if(div['__proto__']&&(div['__proto__']!==form['__proto__'])){isSupported=true;}
div=form=null;return isSupported;})()},ScriptFragment:'<script[^>]*>([\\S\\s]*?)<\/script>',JSONFilter:/^\/\*-secure-([\s\S]*)\*\/\s*$/,emptyFunction:function(){},K:function(x){return x}};if(Prototype.Browser.MobileSafari)
Prototype.BrowserFeatures.SpecificElementExtensions=false;var Abstract={};var Try={these:function(){var returnValue;for(var i=0,length=arguments.length;i<length;i++){var lambda=arguments[i];try{returnValue=lambda();break;}catch(e){}}
return returnValue;}};var Class=(function(){var IS_DONTENUM_BUGGY=(function(){for(var p in{toString:1}){if(p==='toString')return false;}
return true;})();function subclass(){};function create(){var parent=null,properties=$A(arguments);if(Object.isFunction(properties[0]))
parent=properties.shift();function klass(){this.initialize.apply(this,arguments);}
Object.extend(klass,Class.Methods);klass.superclass=parent;klass.subclasses=[];if(parent){subclass.prototype=parent.prototype;klass.prototype=new subclass;parent.subclasses.push(klass);}
for(var i=0,length=properties.length;i<length;i++)
klass.addMethods(properties[i]);if(!klass.prototype.initialize)
klass.prototype.initialize=Prototype.emptyFunction;klass.prototype.constructor=klass;return klass;}
function addMethods(source){var ancestor=this.superclass&&this.superclass.prototype,properties=Object.keys(source);if(IS_DONTENUM_BUGGY){if(source.toString!=Object.prototype.toString)
properties.push("toString");if(source.valueOf!=Object.prototype.valueOf)
properties.push("valueOf");}
for(var i=0,length=properties.length;i<length;i++){var property=properties[i],value=source[property];if(ancestor&&Object.isFunction(value)&&value.argumentNames()[0]=="$super"){var method=value;value=(function(m){return function(){return ancestor[m].apply(this,arguments);};})(property).wrap(method);value.valueOf=method.valueOf.bind(method);value.toString=method.toString.bind(method);}
this.prototype[property]=value;}
return this;}
return{create:create,Methods:{addMethods:addMethods}};})();(function(){var _toString=Object.prototype.toString,NULL_TYPE='Null',UNDEFINED_TYPE='Undefined',BOOLEAN_TYPE='Boolean',NUMBER_TYPE='Number',STRING_TYPE='String',OBJECT_TYPE='Object',FUNCTION_CLASS='[object Function]',BOOLEAN_CLASS='[object Boolean]',NUMBER_CLASS='[object Number]',STRING_CLASS='[object String]',ARRAY_CLASS='[object Array]',DATE_CLASS='[object Date]',NATIVE_JSON_STRINGIFY_SUPPORT=window.JSON&&typeof JSON.stringify==='function'&&JSON.stringify(0)==='0'&&typeof JSON.stringify(Prototype.K)==='undefined';function Type(o){switch(o){case null:return NULL_TYPE;case(void 0):return UNDEFINED_TYPE;}
var type=typeof o;switch(type){case'boolean':return BOOLEAN_TYPE;case'number':return NUMBER_TYPE;case'string':return STRING_TYPE;}
return OBJECT_TYPE;}
function extend(destination,source){for(var property in source)
destination[property]=source[property];return destination;}
function inspect(object){try{if(isUndefined(object))return'undefined';if(object===null)return'null';return object.inspect?object.inspect():String(object);}catch(e){if(e instanceof RangeError)return'...';throw e;}}
function toJSON(value){return Str('',{'':value},[]);}
function Str(key,holder,stack){var value=holder[key],type=typeof value;if(Type(value)===OBJECT_TYPE&&typeof value.toJSON==='function'){value=value.toJSON(key);}
var _class=_toString.call(value);switch(_class){case NUMBER_CLASS:case BOOLEAN_CLASS:case STRING_CLASS:value=value.valueOf();}
switch(value){case null:return'null';case true:return'true';case false:return'false';}
type=typeof value;switch(type){case'string':return value.inspect(true);case'number':return isFinite(value)?String(value):'null';case'object':for(var i=0,length=stack.length;i<length;i++){if(stack[i]===value){throw new TypeError();}}
stack.push(value);var partial=[];if(_class===ARRAY_CLASS){for(var i=0,length=value.length;i<length;i++){var str=Str(i,value,stack);partial.push(typeof str==='undefined'?'null':str);}
partial='['+partial.join(',')+']';}else{var keys=Object.keys(value);for(var i=0,length=keys.length;i<length;i++){var key=keys[i],str=Str(key,value,stack);if(typeof str!=="undefined"){partial.push(key.inspect(true)+':'+str);}}
partial='{'+partial.join(',')+'}';}
stack.pop();return partial;}}
function stringify(object){return JSON.stringify(object);}
function toQueryString(object){return $H(object).toQueryString();}
function toHTML(object){return object&&object.toHTML?object.toHTML():String.interpret(object);}
function keys(object){if(Type(object)!==OBJECT_TYPE){throw new TypeError();}
var results=[];for(var property in object){if(object.hasOwnProperty(property)){results.push(property);}}
return results;}
function values(object){var results=[];for(var property in object)
results.push(object[property]);return results;}
function clone(object){return extend({},object);}
function isElement(object){return!!(object&&object.nodeType==1);}
function isArray(object){return _toString.call(object)===ARRAY_CLASS;}
var hasNativeIsArray=(typeof Array.isArray=='function')&&Array.isArray([])&&!Array.isArray({});if(hasNativeIsArray){isArray=Array.isArray;}
function isHash(object){return object instanceof Hash;}
function isFunction(object){return _toString.call(object)===FUNCTION_CLASS;}
function isString(object){return _toString.call(object)===STRING_CLASS;}
function isNumber(object){return _toString.call(object)===NUMBER_CLASS;}
function isDate(object){return _toString.call(object)===DATE_CLASS;}
function isUndefined(object){return typeof object==="undefined";}
extend(Object,{extend:extend,inspect:inspect,toJSON:NATIVE_JSON_STRINGIFY_SUPPORT?stringify:toJSON,toQueryString:toQueryString,toHTML:toHTML,keys:Object.keys||keys,values:values,clone:clone,isElement:isElement,isArray:isArray,isHash:isHash,isFunction:isFunction,isString:isString,isNumber:isNumber,isDate:isDate,isUndefined:isUndefined});})();Object.extend(Function.prototype,(function(){var slice=Array.prototype.slice;function update(array,args){var arrayLength=array.length,length=args.length;while(length--)array[arrayLength+length]=args[length];return array;}
function merge(array,args){array=slice.call(array,0);return update(array,args);}
function argumentNames(){var names=this.toString().match(/^[\s\(]*function[^(]*\(([^)]*)\)/)[1].replace(/\/\/.*?[\r\n]|\/\*(?:.|[\r\n])*?\*\//g,'').replace(/\s+/g,'').split(',');return names.length==1&&!names[0]?[]:names;}
function bind(context){if(arguments.length<2&&Object.isUndefined(arguments[0]))return this;var __method=this,args=slice.call(arguments,1);return function(){var a=merge(args,arguments);return __method.apply(context,a);}}
function bindAsEventListener(context){var __method=this,args=slice.call(arguments,1);return function(event){var a=update([event||window.event],args);return __method.apply(context,a);}}
function curry(){if(!arguments.length)return this;var __method=this,args=slice.call(arguments,0);return function(){var a=merge(args,arguments);return __method.apply(this,a);}}
function delay(timeout){var __method=this,args=slice.call(arguments,1);timeout=timeout*1000;return window.setTimeout(function(){return __method.apply(__method,args);},timeout);}
function defer(){var args=update([0.01],arguments);return this.delay.apply(this,args);}
function wrap(wrapper){var __method=this;return function(){var a=update([__method.bind(this)],arguments);return wrapper.apply(this,a);}}
function methodize(){if(this._methodized)return this._methodized;var __method=this;return this._methodized=function(){var a=update([this],arguments);return __method.apply(null,a);};}
return{argumentNames:argumentNames,bind:bind,bindAsEventListener:bindAsEventListener,curry:curry,delay:delay,defer:defer,wrap:wrap,methodize:methodize}})());(function(proto){function toISOString(){return this.getUTCFullYear()+'-'+
(this.getUTCMonth()+1).toPaddedString(2)+'-'+
this.getUTCDate().toPaddedString(2)+'T'+
this.getUTCHours().toPaddedString(2)+':'+
this.getUTCMinutes().toPaddedString(2)+':'+
this.getUTCSeconds().toPaddedString(2)+'Z';}
function toJSON(){return this.toISOString();}
if(!proto.toISOString)proto.toISOString=toISOString;if(!proto.toJSON)proto.toJSON=toJSON;})(Date.prototype);RegExp.prototype.match=RegExp.prototype.test;RegExp.escape=function(str){return String(str).replace(/([.*+?^=!:${}()|[\]\/\\])/g,'\\$1');};var PeriodicalExecuter=Class.create({initialize:function(callback,frequency){this.callback=callback;this.frequency=frequency;this.currentlyExecuting=false;this.registerCallback();},registerCallback:function(){this.timer=setInterval(this.onTimerEvent.bind(this),this.frequency*1000);},execute:function(){this.callback(this);},stop:function(){if(!this.timer)return;clearInterval(this.timer);this.timer=null;},onTimerEvent:function(){if(!this.currentlyExecuting){try{this.currentlyExecuting=true;this.execute();this.currentlyExecuting=false;}catch(e){this.currentlyExecuting=false;throw e;}}}});Object.extend(String,{interpret:function(value){return value==null?'':String(value);},specialChar:{'\b':'\\b','\t':'\\t','\n':'\\n','\f':'\\f','\r':'\\r','\\':'\\\\'}});Object.extend(String.prototype,(function(){var NATIVE_JSON_PARSE_SUPPORT=window.JSON&&typeof JSON.parse==='function'&&JSON.parse('{"test": true}').test;function prepareReplacement(replacement){if(Object.isFunction(replacement))return replacement;var template=new Template(replacement);return function(match){return template.evaluate(match)};}
function gsub(pattern,replacement){var result='',source=this,match;replacement=prepareReplacement(replacement);if(Object.isString(pattern))
pattern=RegExp.escape(pattern);if(!(pattern.length||pattern.source)){replacement=replacement('');return replacement+source.split('').join(replacement)+replacement;}
while(source.length>0){if(match=source.match(pattern)){result+=source.slice(0,match.index);result+=String.interpret(replacement(match));source=source.slice(match.index+match[0].length);}else{result+=source,source='';}}
return result;}
function sub(pattern,replacement,count){replacement=prepareReplacement(replacement);count=Object.isUndefined(count)?1:count;return this.gsub(pattern,function(match){if(--count<0)return match[0];return replacement(match);});}
function scan(pattern,iterator){this.gsub(pattern,iterator);return String(this);}
function truncate(length,truncation){length=length||30;truncation=Object.isUndefined(truncation)?'...':truncation;return this.length>length?this.slice(0,length-truncation.length)+truncation:String(this);}
function strip(){return this.replace(/^\s+/,'').replace(/\s+$/,'');}
function stripTags(){return this.replace(/<\w+(\s+("[^"]*"|'[^']*'|[^>])+)?>|<\/\w+>/gi,'');}
function stripScripts(){return this.replace(new RegExp(Prototype.ScriptFragment,'img'),'');}
function extractScripts(){var matchAll=new RegExp(Prototype.ScriptFragment,'img'),matchOne=new RegExp(Prototype.ScriptFragment,'im');return(this.match(matchAll)||[]).map(function(scriptTag){return(scriptTag.match(matchOne)||['',''])[1];});}
function evalScripts(){return this.extractScripts().map(function(script){return eval(script)});}
function escapeHTML(){return this.replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;');}
function unescapeHTML(){return this.stripTags().replace(/&lt;/g,'<').replace(/&gt;/g,'>').replace(/&amp;/g,'&');}
function toQueryParams(separator){var match=this.strip().match(/([^?#]*)(#.*)?$/);if(!match)return{};return match[1].split(separator||'&').inject({},function(hash,pair){if((pair=pair.split('='))[0]){var key=decodeURIComponent(pair.shift()),value=pair.length>1?pair.join('='):pair[0];if(value!=undefined)value=decodeURIComponent(value);if(key in hash){if(!Object.isArray(hash[key]))hash[key]=[hash[key]];hash[key].push(value);}
else hash[key]=value;}
return hash;});}
function toArray(){return this.split('');}
function succ(){return this.slice(0,this.length-1)+
String.fromCharCode(this.charCodeAt(this.length-1)+1);}
function times(count){return count<1?'':new Array(count+1).join(this);}
function camelize(){return this.replace(/-+(.)?/g,function(match,chr){return chr?chr.toUpperCase():'';});}
function capitalize(){return this.charAt(0).toUpperCase()+this.substring(1).toLowerCase();}
function underscore(){return this.replace(/::/g,'/').replace(/([A-Z]+)([A-Z][a-z])/g,'$1_$2').replace(/([a-z\d])([A-Z])/g,'$1_$2').replace(/-/g,'_').toLowerCase();}
function dasherize(){return this.replace(/_/g,'-');}
function inspect(useDoubleQuotes){var escapedString=this.replace(/[\x00-\x1f\\]/g,function(character){if(character in String.specialChar){return String.specialChar[character];}
return'\\u00'+character.charCodeAt().toPaddedString(2,16);});if(useDoubleQuotes)return'"'+escapedString.replace(/"/g,'\\"')+'"';return"'"+escapedString.replace(/'/g,'\\\'')+"'";}
function unfilterJSON(filter){return this.replace(filter||Prototype.JSONFilter,'$1');}
function isJSON(){var str=this;if(str.blank())return false;str=str.replace(/\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g,'@');str=str.replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g,']');str=str.replace(/(?:^|:|,)(?:\s*\[)+/g,'');return(/^[\],:{}\s]*$/).test(str);}
function evalJSON(sanitize){var json=this.unfilterJSON(),cx=/[\u0000\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g;if(cx.test(json)){json=json.replace(cx,function(a){return'\\u'+('0000'+a.charCodeAt(0).toString(16)).slice(-4);});}
try{if(!sanitize||json.isJSON())return eval('('+json+')');}catch(e){}
throw new SyntaxError('Badly formed JSON string: '+this.inspect());}
function parseJSON(){var json=this.unfilterJSON();return JSON.parse(json);}
function include(pattern){return this.indexOf(pattern)>-1;}
function startsWith(pattern){return this.lastIndexOf(pattern,0)===0;}
function endsWith(pattern){var d=this.length-pattern.length;return d>=0&&this.indexOf(pattern,d)===d;}
function empty(){return this=='';}
function blank(){return/^\s*$/.test(this);}
function interpolate(object,pattern){return new Template(this,pattern).evaluate(object);}
return{gsub:gsub,sub:sub,scan:scan,truncate:truncate,strip:String.prototype.trim||strip,stripTags:stripTags,stripScripts:stripScripts,extractScripts:extractScripts,evalScripts:evalScripts,escapeHTML:escapeHTML,unescapeHTML:unescapeHTML,toQueryParams:toQueryParams,parseQuery:toQueryParams,toArray:toArray,succ:succ,times:times,camelize:camelize,capitalize:capitalize,underscore:underscore,dasherize:dasherize,inspect:inspect,unfilterJSON:unfilterJSON,isJSON:isJSON,evalJSON:NATIVE_JSON_PARSE_SUPPORT?parseJSON:evalJSON,include:include,startsWith:startsWith,endsWith:endsWith,empty:empty,blank:blank,interpolate:interpolate};})());var Template=Class.create({initialize:function(template,pattern){this.template=template.toString();this.pattern=pattern||Template.Pattern;},evaluate:function(object){if(object&&Object.isFunction(object.toTemplateReplacements))
object=object.toTemplateReplacements();return this.template.gsub(this.pattern,function(match){if(object==null)return(match[1]+'');var before=match[1]||'';if(before=='\\')return match[2];var ctx=object,expr=match[3],pattern=/^([^.[]+|\[((?:.*?[^\\])?)\])(\.|\[|$)/;match=pattern.exec(expr);if(match==null)return before;while(match!=null){var comp=match[1].startsWith('[')?match[2].replace(/\\\\]/g,']'):match[1];ctx=ctx[comp];if(null==ctx||''==match[3])break;expr=expr.substring('['==match[3]?match[1].length:match[0].length);match=pattern.exec(expr);}
return before+String.interpret(ctx);});}});Template.Pattern=/(^|.|\r|\n)(#\{(.*?)\})/;var $break={};var Enumerable=(function(){function each(iterator,context){var index=0;try{this._each(function(value){iterator.call(context,value,index++);});}catch(e){if(e!=$break)throw e;}
return this;}
function eachSlice(number,iterator,context){var index=-number,slices=[],array=this.toArray();if(number<1)return array;while((index+=number)<array.length)
slices.push(array.slice(index,index+number));return slices.collect(iterator,context);}
function all(iterator,context){iterator=iterator||Prototype.K;var result=true;this.each(function(value,index){result=result&&!!iterator.call(context,value,index);if(!result)throw $break;});return result;}
function any(iterator,context){iterator=iterator||Prototype.K;var result=false;this.each(function(value,index){if(result=!!iterator.call(context,value,index))
throw $break;});return result;}
function collect(iterator,context){iterator=iterator||Prototype.K;var results=[];this.each(function(value,index){results.push(iterator.call(context,value,index));});return results;}
function detect(iterator,context){var result;this.each(function(value,index){if(iterator.call(context,value,index)){result=value;throw $break;}});return result;}
function findAll(iterator,context){var results=[];this.each(function(value,index){if(iterator.call(context,value,index))
results.push(value);});return results;}
function grep(filter,iterator,context){iterator=iterator||Prototype.K;var results=[];if(Object.isString(filter))
filter=new RegExp(RegExp.escape(filter));this.each(function(value,index){if(filter.match(value))
results.push(iterator.call(context,value,index));});return results;}
function include(object){if(Object.isFunction(this.indexOf))
if(this.indexOf(object)!=-1)return true;var found=false;this.each(function(value){if(value==object){found=true;throw $break;}});return found;}
function inGroupsOf(number,fillWith){fillWith=Object.isUndefined(fillWith)?null:fillWith;return this.eachSlice(number,function(slice){while(slice.length<number)slice.push(fillWith);return slice;});}
function inject(memo,iterator,context){this.each(function(value,index){memo=iterator.call(context,memo,value,index);});return memo;}
function invoke(method){var args=$A(arguments).slice(1);return this.map(function(value){return value[method].apply(value,args);});}
function max(iterator,context){iterator=iterator||Prototype.K;var result;this.each(function(value,index){value=iterator.call(context,value,index);if(result==null||value>=result)
result=value;});return result;}
function min(iterator,context){iterator=iterator||Prototype.K;var result;this.each(function(value,index){value=iterator.call(context,value,index);if(result==null||value<result)
result=value;});return result;}
function partition(iterator,context){iterator=iterator||Prototype.K;var trues=[],falses=[];this.each(function(value,index){(iterator.call(context,value,index)?trues:falses).push(value);});return[trues,falses];}
function pluck(property){var results=[];this.each(function(value){results.push(value[property]);});return results;}
function reject(iterator,context){var results=[];this.each(function(value,index){if(!iterator.call(context,value,index))
results.push(value);});return results;}
function sortBy(iterator,context){return this.map(function(value,index){return{value:value,criteria:iterator.call(context,value,index)};}).sort(function(left,right){var a=left.criteria,b=right.criteria;return a<b?-1:a>b?1:0;}).pluck('value');}
function toArray(){return this.map();}
function zip(){var iterator=Prototype.K,args=$A(arguments);if(Object.isFunction(args.last()))
iterator=args.pop();var collections=[this].concat(args).map($A);return this.map(function(value,index){return iterator(collections.pluck(index));});}
function size(){return this.toArray().length;}
function inspect(){return'#<Enumerable:'+this.toArray().inspect()+'>';}
return{each:each,eachSlice:eachSlice,all:all,every:all,any:any,some:any,collect:collect,map:collect,detect:detect,findAll:findAll,select:findAll,filter:findAll,grep:grep,include:include,member:include,inGroupsOf:inGroupsOf,inject:inject,invoke:invoke,max:max,min:min,partition:partition,pluck:pluck,reject:reject,sortBy:sortBy,toArray:toArray,entries:toArray,zip:zip,size:size,inspect:inspect,find:detect};})();function $A(iterable){if(!iterable)return[];if('toArray'in Object(iterable))return iterable.toArray();var length=iterable.length||0,results=new Array(length);while(length--)results[length]=iterable[length];return results;}
function $w(string){if(!Object.isString(string))return[];string=string.strip();return string?string.split(/\s+/):[];}
Array.from=$A;(function(){var arrayProto=Array.prototype,slice=arrayProto.slice,_each=arrayProto.forEach;function each(iterator,context){for(var i=0,length=this.length>>>0;i<length;i++){if(i in this)iterator.call(context,this[i],i,this);}}
if(!_each)_each=each;function clear(){this.length=0;return this;}
function first(){return this[0];}
function last(){return this[this.length-1];}
function compact(){return this.select(function(value){return value!=null;});}
function flatten(){return this.inject([],function(array,value){if(Object.isArray(value))
return array.concat(value.flatten());array.push(value);return array;});}
function without(){var values=slice.call(arguments,0);return this.select(function(value){return!values.include(value);});}
function reverse(inline){return(inline===false?this.toArray():this)._reverse();}
function uniq(sorted){return this.inject([],function(array,value,index){if(0==index||(sorted?array.last()!=value:!array.include(value)))
array.push(value);return array;});}
function intersect(array){return this.uniq().findAll(function(item){return array.detect(function(value){return item===value});});}
function clone(){return slice.call(this,0);}
function size(){return this.length;}
function inspect(){return'['+this.map(Object.inspect).join(', ')+']';}
function indexOf(item,i){i||(i=0);var length=this.length;if(i<0)i=length+i;for(;i<length;i++)
if(this[i]===item)return i;return-1;}
function lastIndexOf(item,i){i=isNaN(i)?this.length:(i<0?this.length+i:i)+1;var n=this.slice(0,i).reverse().indexOf(item);return(n<0)?n:i-n-1;}
function concat(){var array=slice.call(this,0),item;for(var i=0,length=arguments.length;i<length;i++){item=arguments[i];if(Object.isArray(item)&&!('callee'in item)){for(var j=0,arrayLength=item.length;j<arrayLength;j++)
array.push(item[j]);}else{array.push(item);}}
return array;}
Object.extend(arrayProto,Enumerable);if(!arrayProto._reverse)
arrayProto._reverse=arrayProto.reverse;Object.extend(arrayProto,{_each:_each,clear:clear,first:first,last:last,compact:compact,flatten:flatten,without:without,reverse:reverse,uniq:uniq,intersect:intersect,clone:clone,toArray:clone,size:size,inspect:inspect});var CONCAT_ARGUMENTS_BUGGY=(function(){return[].concat(arguments)[0][0]!==1;})(1,2)
if(CONCAT_ARGUMENTS_BUGGY)arrayProto.concat=concat;if(!arrayProto.indexOf)arrayProto.indexOf=indexOf;if(!arrayProto.lastIndexOf)arrayProto.lastIndexOf=lastIndexOf;})();function $H(object){return new Hash(object);};var Hash=Class.create(Enumerable,(function(){function initialize(object){this._object=Object.isHash(object)?object.toObject():Object.clone(object);}
function _each(iterator){for(var key in this._object){var value=this._object[key],pair=[key,value];pair.key=key;pair.value=value;iterator(pair);}}
function set(key,value){return this._object[key]=value;}
function get(key){if(this._object[key]!==Object.prototype[key])
return this._object[key];}
function unset(key){var value=this._object[key];delete this._object[key];return value;}
function toObject(){return Object.clone(this._object);}
function keys(){return this.pluck('key');}
function values(){return this.pluck('value');}
function index(value){var match=this.detect(function(pair){return pair.value===value;});return match&&match.key;}
function merge(object){return this.clone().update(object);}
function update(object){return new Hash(object).inject(this,function(result,pair){result.set(pair.key,pair.value);return result;});}
function toQueryPair(key,value){if(Object.isUndefined(value))return key;return key+'='+encodeURIComponent(String.interpret(value));}
function toQueryString(){return this.inject([],function(results,pair){var key=encodeURIComponent(pair.key),values=pair.value;if(values&&typeof values=='object'){if(Object.isArray(values)){var queryValues=[];for(var i=0,len=values.length,value;i<len;i++){value=values[i];queryValues.push(toQueryPair(key,value));}
return results.concat(queryValues);}}else results.push(toQueryPair(key,values));return results;}).join('&');}
function inspect(){return'#<Hash:{'+this.map(function(pair){return pair.map(Object.inspect).join(': ');}).join(', ')+'}>';}
function clone(){return new Hash(this);}
return{initialize:initialize,_each:_each,set:set,get:get,unset:unset,toObject:toObject,toTemplateReplacements:toObject,keys:keys,values:values,index:index,merge:merge,update:update,toQueryString:toQueryString,inspect:inspect,toJSON:toObject,clone:clone};})());Hash.from=$H;Object.extend(Number.prototype,(function(){function toColorPart(){return this.toPaddedString(2,16);}
function succ(){return this+1;}
function times(iterator,context){$R(0,this,true).each(iterator,context);return this;}
function toPaddedString(length,radix){var string=this.toString(radix||10);return'0'.times(length-string.length)+string;}
function abs(){return Math.abs(this);}
function round(){return Math.round(this);}
function ceil(){return Math.ceil(this);}
function floor(){return Math.floor(this);}
return{toColorPart:toColorPart,succ:succ,times:times,toPaddedString:toPaddedString,abs:abs,round:round,ceil:ceil,floor:floor};})());function $R(start,end,exclusive){return new ObjectRange(start,end,exclusive);}
var ObjectRange=Class.create(Enumerable,(function(){function initialize(start,end,exclusive){this.start=start;this.end=end;this.exclusive=exclusive;}
function _each(iterator){var value=this.start;while(this.include(value)){iterator(value);value=value.succ();}}
function include(value){if(value<this.start)
return false;if(this.exclusive)
return value<this.end;return value<=this.end;}
return{initialize:initialize,_each:_each,include:include};})());var Ajax={getTransport:function(){return Try.these(function(){return new XMLHttpRequest()},function(){return new ActiveXObject('Msxml2.XMLHTTP')},function(){return new ActiveXObject('Microsoft.XMLHTTP')})||false;},activeRequestCount:0};Ajax.Responders={responders:[],_each:function(iterator){this.responders._each(iterator);},register:function(responder){if(!this.include(responder))
this.responders.push(responder);},unregister:function(responder){this.responders=this.responders.without(responder);},dispatch:function(callback,request,transport,json){this.each(function(responder){if(Object.isFunction(responder[callback])){try{responder[callback].apply(responder,[request,transport,json]);}catch(e){}}});}};Object.extend(Ajax.Responders,Enumerable);Ajax.Responders.register({onCreate:function(){Ajax.activeRequestCount++},onComplete:function(){Ajax.activeRequestCount--}});Ajax.Base=Class.create({initialize:function(options){this.options={method:'post',asynchronous:true,contentType:'application/x-www-form-urlencoded',encoding:'UTF-8',parameters:'',evalJSON:true,evalJS:true};Object.extend(this.options,options||{});this.options.method=this.options.method.toLowerCase();if(Object.isHash(this.options.parameters))
this.options.parameters=this.options.parameters.toObject();}});Ajax.Request=Class.create(Ajax.Base,{_complete:false,initialize:function($super,url,options){$super(options);this.transport=Ajax.getTransport();this.request(url);},request:function(url){this.url=url;this.method=this.options.method;var params=Object.isString(this.options.parameters)?this.options.parameters:Object.toQueryString(this.options.parameters);if(!['get','post'].include(this.method)){params+=(params?'&':'')+"_method="+this.method;this.method='post';}
if(params&&this.method==='get'){this.url+=(this.url.include('?')?'&':'?')+params;}
this.parameters=params.toQueryParams();try{var response=new Ajax.Response(this);if(this.options.onCreate)this.options.onCreate(response);Ajax.Responders.dispatch('onCreate',this,response);this.transport.open(this.method.toUpperCase(),this.url,this.options.asynchronous);if(this.options.asynchronous)this.respondToReadyState.bind(this).defer(1);this.transport.onreadystatechange=this.onStateChange.bind(this);this.setRequestHeaders();this.body=this.method=='post'?(this.options.postBody||params):null;this.transport.send(this.body);if(!this.options.asynchronous&&this.transport.overrideMimeType)
this.onStateChange();}
catch(e){this.dispatchException(e);}},onStateChange:function(){var readyState=this.transport.readyState;if(readyState>1&&!((readyState==4)&&this._complete))
this.respondToReadyState(this.transport.readyState);},setRequestHeaders:function(){var headers={'X-Requested-With':'XMLHttpRequest','X-Prototype-Version':Prototype.Version,'Accept':'text/javascript, text/html, application/xml, text/xml, */*'};if(this.method=='post'){headers['Content-type']=this.options.contentType+
(this.options.encoding?'; charset='+this.options.encoding:'');if(this.transport.overrideMimeType&&(navigator.userAgent.match(/Gecko\/(\d{4})/)||[0,2005])[1]<2005)
headers['Connection']='close';}
if(typeof this.options.requestHeaders=='object'){var extras=this.options.requestHeaders;if(Object.isFunction(extras.push))
for(var i=0,length=extras.length;i<length;i+=2)
headers[extras[i]]=extras[i+1];else
$H(extras).each(function(pair){headers[pair.key]=pair.value});}
for(var name in headers)
this.transport.setRequestHeader(name,headers[name]);},success:function(){var status=this.getStatus();return!status||(status>=200&&status<300)||status==304;},getStatus:function(){try{if(this.transport.status===1223)return 204;return this.transport.status||0;}catch(e){return 0}},respondToReadyState:function(readyState){var state=Ajax.Request.Events[readyState],response=new Ajax.Response(this);if(state=='Complete'){try{this._complete=true;(this.options['on'+response.status]||this.options['on'+(this.success()?'Success':'Failure')]||Prototype.emptyFunction)(response,response.headerJSON);}catch(e){this.dispatchException(e);}
var contentType=response.getHeader('Content-type');if(this.options.evalJS=='force'||(this.options.evalJS&&this.isSameOrigin()&&contentType&&contentType.match(/^\s*(text|application)\/(x-)?(java|ecma)script(;.*)?\s*$/i)))
this.evalResponse();}
try{(this.options['on'+state]||Prototype.emptyFunction)(response,response.headerJSON);Ajax.Responders.dispatch('on'+state,this,response,response.headerJSON);}catch(e){this.dispatchException(e);}
if(state=='Complete'){this.transport.onreadystatechange=Prototype.emptyFunction;}},isSameOrigin:function(){var m=this.url.match(/^\s*https?:\/\/[^\/]*/);return!m||(m[0]=='#{protocol}//#{domain}#{port}'.interpolate({protocol:location.protocol,domain:document.domain,port:location.port?':'+location.port:''}));},getHeader:function(name){try{return this.transport.getResponseHeader(name)||null;}catch(e){return null;}},evalResponse:function(){try{return eval((this.transport.responseText||'').unfilterJSON());}catch(e){this.dispatchException(e);}},dispatchException:function(exception){(this.options.onException||Prototype.emptyFunction)(this,exception);Ajax.Responders.dispatch('onException',this,exception);}});Ajax.Request.Events=['Uninitialized','Loading','Loaded','Interactive','Complete'];Ajax.Response=Class.create({initialize:function(request){this.request=request;var transport=this.transport=request.transport,readyState=this.readyState=transport.readyState;if((readyState>2&&!Prototype.Browser.IE)||readyState==4){this.status=this.getStatus();this.statusText=this.getStatusText();this.responseText=String.interpret(transport.responseText);this.headerJSON=this._getHeaderJSON();}
if(readyState==4){var xml=transport.responseXML;this.responseXML=Object.isUndefined(xml)?null:xml;this.responseJSON=this._getResponseJSON();}},status:0,statusText:'',getStatus:Ajax.Request.prototype.getStatus,getStatusText:function(){try{return this.transport.statusText||'';}catch(e){return''}},getHeader:Ajax.Request.prototype.getHeader,getAllHeaders:function(){try{return this.getAllResponseHeaders();}catch(e){return null}},getResponseHeader:function(name){return this.transport.getResponseHeader(name);},getAllResponseHeaders:function(){return this.transport.getAllResponseHeaders();},_getHeaderJSON:function(){var json=this.getHeader('X-JSON');if(!json)return null;json=decodeURIComponent(escape(json));try{return json.evalJSON(this.request.options.sanitizeJSON||!this.request.isSameOrigin());}catch(e){this.request.dispatchException(e);}},_getResponseJSON:function(){var options=this.request.options;if(!options.evalJSON||(options.evalJSON!='force'&&!(this.getHeader('Content-type')||'').include('application/json'))||this.responseText.blank())
return null;try{return this.responseText.evalJSON(options.sanitizeJSON||!this.request.isSameOrigin());}catch(e){this.request.dispatchException(e);}}});Ajax.Updater=Class.create(Ajax.Request,{initialize:function($super,container,url,options){this.container={success:(container.success||container),failure:(container.failure||(container.success?null:container))};options=Object.clone(options);var onComplete=options.onComplete;options.onComplete=(function(response,json){this.updateContent(response.responseText);if(Object.isFunction(onComplete))onComplete(response,json);}).bind(this);$super(url,options);},updateContent:function(responseText){var receiver=this.container[this.success()?'success':'failure'],options=this.options;if(!options.evalScripts)responseText=responseText.stripScripts();if(receiver=$(receiver)){if(options.insertion){if(Object.isString(options.insertion)){var insertion={};insertion[options.insertion]=responseText;receiver.insert(insertion);}
else options.insertion(receiver,responseText);}
else receiver.update(responseText);}}});Ajax.PeriodicalUpdater=Class.create(Ajax.Base,{initialize:function($super,container,url,options){$super(options);this.onComplete=this.options.onComplete;this.frequency=(this.options.frequency||2);this.decay=(this.options.decay||1);this.updater={};this.container=container;this.url=url;this.start();},start:function(){this.options.onComplete=this.updateComplete.bind(this);this.onTimerEvent();},stop:function(){this.updater.options.onComplete=undefined;clearTimeout(this.timer);(this.onComplete||Prototype.emptyFunction).apply(this,arguments);},updateComplete:function(response){if(this.options.decay){this.decay=(response.responseText==this.lastText?this.decay*this.options.decay:1);this.lastText=response.responseText;}
this.timer=this.onTimerEvent.bind(this).delay(this.decay*this.frequency);},onTimerEvent:function(){this.updater=new Ajax.Updater(this.container,this.url,this.options);}});function $(element){if(arguments.length>1){for(var i=0,elements=[],length=arguments.length;i<length;i++)
elements.push($(arguments[i]));return elements;}
if(Object.isString(element))
element=document.getElementById(element);return Element.extend(element);}
if(Prototype.BrowserFeatures.XPath){document._getElementsByXPath=function(expression,parentElement){var results=[];var query=document.evaluate(expression,$(parentElement)||document,null,XPathResult.ORDERED_NODE_SNAPSHOT_TYPE,null);for(var i=0,length=query.snapshotLength;i<length;i++)
results.push(Element.extend(query.snapshotItem(i)));return results;};}
if(!Node)var Node={};if(!Node.ELEMENT_NODE){Object.extend(Node,{ELEMENT_NODE:1,ATTRIBUTE_NODE:2,TEXT_NODE:3,CDATA_SECTION_NODE:4,ENTITY_REFERENCE_NODE:5,ENTITY_NODE:6,PROCESSING_INSTRUCTION_NODE:7,COMMENT_NODE:8,DOCUMENT_NODE:9,DOCUMENT_TYPE_NODE:10,DOCUMENT_FRAGMENT_NODE:11,NOTATION_NODE:12});}
(function(global){function shouldUseCache(tagName,attributes){if(tagName==='select')return false;if('type'in attributes)return false;return true;}
var HAS_EXTENDED_CREATE_ELEMENT_SYNTAX=(function(){try{var el=document.createElement('<input name="x">');return el.tagName.toLowerCase()==='input'&&el.name==='x';}
catch(err){return false;}})();var element=global.Element;global.Element=function(tagName,attributes){attributes=attributes||{};tagName=tagName.toLowerCase();var cache=Element.cache;if(HAS_EXTENDED_CREATE_ELEMENT_SYNTAX&&attributes.name){tagName='<'+tagName+' name="'+attributes.name+'">';delete attributes.name;return Element.writeAttribute(document.createElement(tagName),attributes);}
if(!cache[tagName])cache[tagName]=Element.extend(document.createElement(tagName));var node=shouldUseCache(tagName,attributes)?cache[tagName].cloneNode(false):document.createElement(tagName);return Element.writeAttribute(node,attributes);};Object.extend(global.Element,element||{});if(element)global.Element.prototype=element.prototype;})(this);Element.idCounter=1;Element.cache={};Element._purgeElement=function(element){var uid=element._prototypeUID;if(uid){Element.stopObserving(element);element._prototypeUID=void 0;delete Element.Storage[uid];}}
Element.Methods={visible:function(element){return $(element).style.display!='none';},toggle:function(element){element=$(element);Element[Element.visible(element)?'hide':'show'](element);return element;},hide:function(element){element=$(element);element.style.display='none';return element;},show:function(element){element=$(element);element.style.display='';return element;},remove:function(element){element=$(element);element.parentNode.removeChild(element);return element;},update:(function(){var SELECT_ELEMENT_INNERHTML_BUGGY=(function(){var el=document.createElement("select"),isBuggy=true;el.innerHTML="<option value=\"test\">test</option>";if(el.options&&el.options[0]){isBuggy=el.options[0].nodeName.toUpperCase()!=="OPTION";}
el=null;return isBuggy;})();var TABLE_ELEMENT_INNERHTML_BUGGY=(function(){try{var el=document.createElement("table");if(el&&el.tBodies){el.innerHTML="<tbody><tr><td>test</td></tr></tbody>";var isBuggy=typeof el.tBodies[0]=="undefined";el=null;return isBuggy;}}catch(e){return true;}})();var LINK_ELEMENT_INNERHTML_BUGGY=(function(){try{var el=document.createElement('div');el.innerHTML="<link>";var isBuggy=(el.childNodes.length===0);el=null;return isBuggy;}catch(e){return true;}})();var ANY_INNERHTML_BUGGY=SELECT_ELEMENT_INNERHTML_BUGGY||TABLE_ELEMENT_INNERHTML_BUGGY||LINK_ELEMENT_INNERHTML_BUGGY;var SCRIPT_ELEMENT_REJECTS_TEXTNODE_APPENDING=(function(){var s=document.createElement("script"),isBuggy=false;try{s.appendChild(document.createTextNode(""));isBuggy=!s.firstChild||s.firstChild&&s.firstChild.nodeType!==3;}catch(e){isBuggy=true;}
s=null;return isBuggy;})();function update(element,content){element=$(element);var purgeElement=Element._purgeElement;var descendants=element.getElementsByTagName('*'),i=descendants.length;while(i--)purgeElement(descendants[i]);if(content&&content.toElement)
content=content.toElement();if(Object.isElement(content))
return element.update().insert(content);content=Object.toHTML(content);var tagName=element.tagName.toUpperCase();if(tagName==='SCRIPT'&&SCRIPT_ELEMENT_REJECTS_TEXTNODE_APPENDING){element.text=content;return element;}
if(ANY_INNERHTML_BUGGY){if(tagName in Element._insertionTranslations.tags){while(element.firstChild){element.removeChild(element.firstChild);}
Element._getContentFromAnonymousElement(tagName,content.stripScripts()).each(function(node){element.appendChild(node)});}else if(LINK_ELEMENT_INNERHTML_BUGGY&&Object.isString(content)&&content.indexOf('<link')>-1){while(element.firstChild){element.removeChild(element.firstChild);}
var nodes=Element._getContentFromAnonymousElement(tagName,content.stripScripts(),true);nodes.each(function(node){element.appendChild(node)});}
else{element.innerHTML=content.stripScripts();}}
else{element.innerHTML=content.stripScripts();}
content.evalScripts.bind(content).defer();return element;}
return update;})(),replace:function(element,content){element=$(element);if(content&&content.toElement)content=content.toElement();else if(!Object.isElement(content)){content=Object.toHTML(content);var range=element.ownerDocument.createRange();range.selectNode(element);content.evalScripts.bind(content).defer();content=range.createContextualFragment(content.stripScripts());}
element.parentNode.replaceChild(content,element);return element;},insert:function(element,insertions){element=$(element);if(Object.isString(insertions)||Object.isNumber(insertions)||Object.isElement(insertions)||(insertions&&(insertions.toElement||insertions.toHTML)))
insertions={bottom:insertions};var content,insert,tagName,childNodes;for(var position in insertions){content=insertions[position];position=position.toLowerCase();insert=Element._insertionTranslations[position];if(content&&content.toElement)content=content.toElement();if(Object.isElement(content)){insert(element,content);continue;}
content=Object.toHTML(content);tagName=((position=='before'||position=='after')?element.parentNode:element).tagName.toUpperCase();childNodes=Element._getContentFromAnonymousElement(tagName,content.stripScripts());if(position=='top'||position=='after')childNodes.reverse();childNodes.each(insert.curry(element));content.evalScripts.bind(content).defer();}
return element;},wrap:function(element,wrapper,attributes){element=$(element);if(Object.isElement(wrapper))
$(wrapper).writeAttribute(attributes||{});else if(Object.isString(wrapper))wrapper=new Element(wrapper,attributes);else wrapper=new Element('div',wrapper);if(element.parentNode)
element.parentNode.replaceChild(wrapper,element);wrapper.appendChild(element);return wrapper;},inspect:function(element){element=$(element);var result='<'+element.tagName.toLowerCase();$H({'id':'id','className':'class'}).each(function(pair){var property=pair.first(),attribute=pair.last(),value=(element[property]||'').toString();if(value)result+=' '+attribute+'='+value.inspect(true);});return result+'>';},recursivelyCollect:function(element,property,maximumLength){element=$(element);maximumLength=maximumLength||-1;var elements=[];while(element=element[property]){if(element.nodeType==1)
elements.push(Element.extend(element));if(elements.length==maximumLength)
break;}
return elements;},ancestors:function(element){return Element.recursivelyCollect(element,'parentNode');},descendants:function(element){return Element.select(element,"*");},firstDescendant:function(element){element=$(element).firstChild;while(element&&element.nodeType!=1)element=element.nextSibling;return $(element);},immediateDescendants:function(element){var results=[],child=$(element).firstChild;while(child){if(child.nodeType===1){results.push(Element.extend(child));}
child=child.nextSibling;}
return results;},previousSiblings:function(element,maximumLength){return Element.recursivelyCollect(element,'previousSibling');},nextSiblings:function(element){return Element.recursivelyCollect(element,'nextSibling');},siblings:function(element){element=$(element);return Element.previousSiblings(element).reverse().concat(Element.nextSiblings(element));},match:function(element,selector){element=$(element);if(Object.isString(selector))
return Prototype.Selector.match(element,selector);return selector.match(element);},up:function(element,expression,index){element=$(element);if(arguments.length==1)return $(element.parentNode);var ancestors=Element.ancestors(element);return Object.isNumber(expression)?ancestors[expression]:Prototype.Selector.find(ancestors,expression,index);},down:function(element,expression,index){element=$(element);if(arguments.length==1)return Element.firstDescendant(element);return Object.isNumber(expression)?Element.descendants(element)[expression]:Element.select(element,expression)[index||0];},previous:function(element,expression,index){element=$(element);if(Object.isNumber(expression))index=expression,expression=false;if(!Object.isNumber(index))index=0;if(expression){return Prototype.Selector.find(element.previousSiblings(),expression,index);}else{return element.recursivelyCollect("previousSibling",index+1)[index];}},next:function(element,expression,index){element=$(element);if(Object.isNumber(expression))index=expression,expression=false;if(!Object.isNumber(index))index=0;if(expression){return Prototype.Selector.find(element.nextSiblings(),expression,index);}else{var maximumLength=Object.isNumber(index)?index+1:1;return element.recursivelyCollect("nextSibling",index+1)[index];}},select:function(element){element=$(element);var expressions=Array.prototype.slice.call(arguments,1).join(', ');return Prototype.Selector.select(expressions,element);},adjacent:function(element){element=$(element);var expressions=Array.prototype.slice.call(arguments,1).join(', ');return Prototype.Selector.select(expressions,element.parentNode).without(element);},identify:function(element){element=$(element);var id=Element.readAttribute(element,'id');if(id)return id;do{id='anonymous_element_'+Element.idCounter++}while($(id));Element.writeAttribute(element,'id',id);return id;},readAttribute:function(element,name){element=$(element);if(Prototype.Browser.IE){var t=Element._attributeTranslations.read;if(t.values[name])return t.values[name](element,name);if(t.names[name])name=t.names[name];if(name.include(':')){return(!element.attributes||!element.attributes[name])?null:element.attributes[name].value;}}
return element.getAttribute(name);},writeAttribute:function(element,name,value){element=$(element);var attributes={},t=Element._attributeTranslations.write;if(typeof name=='object')attributes=name;else attributes[name]=Object.isUndefined(value)?true:value;for(var attr in attributes){name=t.names[attr]||attr;value=attributes[attr];if(t.values[attr])name=t.values[attr](element,value);if(value===false||value===null)
element.removeAttribute(name);else if(value===true)
element.setAttribute(name,name);else element.setAttribute(name,value);}
return element;},getHeight:function(element){return Element.getDimensions(element).height;},getWidth:function(element){return Element.getDimensions(element).width;},classNames:function(element){return new Element.ClassNames(element);},hasClassName:function(element,className){if(!(element=$(element)))return;var elementClassName=element.className;return(elementClassName.length>0&&(elementClassName==className||new RegExp("(^|\\s)"+className+"(\\s|$)").test(elementClassName)));},addClassName:function(element,className){if(!(element=$(element)))return;if(!Element.hasClassName(element,className))
element.className+=(element.className?' ':'')+className;return element;},removeClassName:function(element,className){if(!(element=$(element)))return;element.className=element.className.replace(new RegExp("(^|\\s+)"+className+"(\\s+|$)"),' ').strip();return element;},toggleClassName:function(element,className){if(!(element=$(element)))return;return Element[Element.hasClassName(element,className)?'removeClassName':'addClassName'](element,className);},cleanWhitespace:function(element){element=$(element);var node=element.firstChild;while(node){var nextNode=node.nextSibling;if(node.nodeType==3&&!/\S/.test(node.nodeValue))
element.removeChild(node);node=nextNode;}
return element;},empty:function(element){return $(element).innerHTML.blank();},descendantOf:function(element,ancestor){element=$(element),ancestor=$(ancestor);if(element.compareDocumentPosition)
return(element.compareDocumentPosition(ancestor)&8)===8;if(ancestor.contains)
return ancestor.contains(element)&&ancestor!==element;while(element=element.parentNode)
if(element==ancestor)return true;return false;},scrollTo:function(element){element=$(element);var pos=Element.cumulativeOffset(element);window.scrollTo(pos[0],pos[1]);return element;},getStyle:function(element,style){element=$(element);style=style=='float'?'cssFloat':style.camelize();var value=element.style[style];if(!value||value=='auto'){var css=document.defaultView.getComputedStyle(element,null);value=css?css[style]:null;}
if(style=='opacity')return value?parseFloat(value):1.0;return value=='auto'?null:value;},getOpacity:function(element){return $(element).getStyle('opacity');},setStyle:function(element,styles){element=$(element);var elementStyle=element.style,match;if(Object.isString(styles)){element.style.cssText+=';'+styles;return styles.include('opacity')?element.setOpacity(styles.match(/opacity:\s*(\d?\.?\d*)/)[1]):element;}
for(var property in styles)
if(property=='opacity')element.setOpacity(styles[property]);else
elementStyle[(property=='float'||property=='cssFloat')?(Object.isUndefined(elementStyle.styleFloat)?'cssFloat':'styleFloat'):property]=styles[property];return element;},setOpacity:function(element,value){element=$(element);element.style.opacity=(value==1||value==='')?'':(value<0.00001)?0:value;return element;},makePositioned:function(element){element=$(element);var pos=Element.getStyle(element,'position');if(pos=='static'||!pos){element._madePositioned=true;element.style.position='relative';if(Prototype.Browser.Opera){element.style.top=0;element.style.left=0;}}
return element;},undoPositioned:function(element){element=$(element);if(element._madePositioned){element._madePositioned=undefined;element.style.position=element.style.top=element.style.left=element.style.bottom=element.style.right='';}
return element;},makeClipping:function(element){element=$(element);if(element._overflow)return element;element._overflow=Element.getStyle(element,'overflow')||'auto';if(element._overflow!=='hidden')
element.style.overflow='hidden';return element;},undoClipping:function(element){element=$(element);if(!element._overflow)return element;element.style.overflow=element._overflow=='auto'?'':element._overflow;element._overflow=null;return element;},clonePosition:function(element,source){var options=Object.extend({setLeft:true,setTop:true,setWidth:true,setHeight:true,offsetTop:0,offsetLeft:0},arguments[2]||{});source=$(source);var p=Element.viewportOffset(source),delta=[0,0],parent=null;element=$(element);if(Element.getStyle(element,'position')=='absolute'){parent=Element.getOffsetParent(element);delta=Element.viewportOffset(parent);}
if(parent==document.body){delta[0]-=document.body.offsetLeft;delta[1]-=document.body.offsetTop;}
if(options.setLeft)element.style.left=(p[0]-delta[0]+options.offsetLeft)+'px';if(options.setTop)element.style.top=(p[1]-delta[1]+options.offsetTop)+'px';if(options.setWidth)element.style.width=source.offsetWidth+'px';if(options.setHeight)element.style.height=source.offsetHeight+'px';return element;}};Object.extend(Element.Methods,{getElementsBySelector:Element.Methods.select,childElements:Element.Methods.immediateDescendants});Element._attributeTranslations={write:{names:{className:'class',htmlFor:'for'},values:{}}};if(Prototype.Browser.Opera){Element.Methods.getStyle=Element.Methods.getStyle.wrap(function(proceed,element,style){switch(style){case'height':case'width':if(!Element.visible(element))return null;var dim=parseInt(proceed(element,style),10);if(dim!==element['offset'+style.capitalize()])
return dim+'px';var properties;if(style==='height'){properties=['border-top-width','padding-top','padding-bottom','border-bottom-width'];}
else{properties=['border-left-width','padding-left','padding-right','border-right-width'];}
return properties.inject(dim,function(memo,property){var val=proceed(element,property);return val===null?memo:memo-parseInt(val,10);})+'px';default:return proceed(element,style);}});Element.Methods.readAttribute=Element.Methods.readAttribute.wrap(function(proceed,element,attribute){if(attribute==='title')return element.title;return proceed(element,attribute);});}
else if(Prototype.Browser.IE){Element.Methods.getStyle=function(element,style){element=$(element);style=(style=='float'||style=='cssFloat')?'styleFloat':style.camelize();var value=element.style[style];if(!value&&element.currentStyle)value=element.currentStyle[style];if(style=='opacity'){if(value=(element.getStyle('filter')||'').match(/alpha\(opacity=(.*)\)/))
if(value[1])return parseFloat(value[1])/100;return 1.0;}
if(value=='auto'){if((style=='width'||style=='height')&&(element.getStyle('display')!='none'))
return element['offset'+style.capitalize()]+'px';return null;}
return value;};Element.Methods.setOpacity=function(element,value){function stripAlpha(filter){return filter.replace(/alpha\([^\)]*\)/gi,'');}
element=$(element);var currentStyle=element.currentStyle;if((currentStyle&&!currentStyle.hasLayout)||(!currentStyle&&element.style.zoom=='normal'))
element.style.zoom=1;var filter=element.getStyle('filter'),style=element.style;if(value==1||value===''){(filter=stripAlpha(filter))?style.filter=filter:style.removeAttribute('filter');return element;}else if(value<0.00001)value=0;style.filter=stripAlpha(filter)+'alpha(opacity='+(value*100)+')';return element;};Element._attributeTranslations=(function(){var classProp='className',forProp='for',el=document.createElement('div');el.setAttribute(classProp,'x');if(el.className!=='x'){el.setAttribute('class','x');if(el.className==='x'){classProp='class';}}
el=null;el=document.createElement('label');el.setAttribute(forProp,'x');if(el.htmlFor!=='x'){el.setAttribute('htmlFor','x');if(el.htmlFor==='x'){forProp='htmlFor';}}
el=null;return{read:{names:{'class':classProp,'className':classProp,'for':forProp,'htmlFor':forProp},values:{_getAttr:function(element,attribute){return element.getAttribute(attribute);},_getAttr2:function(element,attribute){return element.getAttribute(attribute,2);},_getAttrNode:function(element,attribute){var node=element.getAttributeNode(attribute);return node?node.value:"";},_getEv:(function(){var el=document.createElement('div'),f;el.onclick=Prototype.emptyFunction;var value=el.getAttribute('onclick');if(String(value).indexOf('{')>-1){f=function(element,attribute){attribute=element.getAttribute(attribute);if(!attribute)return null;attribute=attribute.toString();attribute=attribute.split('{')[1];attribute=attribute.split('}')[0];return attribute.strip();};}
else if(value===''){f=function(element,attribute){attribute=element.getAttribute(attribute);if(!attribute)return null;return attribute.strip();};}
el=null;return f;})(),_flag:function(element,attribute){return $(element).hasAttribute(attribute)?attribute:null;},style:function(element){return element.style.cssText.toLowerCase();},title:function(element){return element.title;}}}}})();Element._attributeTranslations.write={names:Object.extend({cellpadding:'cellPadding',cellspacing:'cellSpacing'},Element._attributeTranslations.read.names),values:{checked:function(element,value){element.checked=!!value;},style:function(element,value){element.style.cssText=value?value:'';}}};Element._attributeTranslations.has={};$w('colSpan rowSpan vAlign dateTime accessKey tabIndex '+'encType maxLength readOnly longDesc frameBorder').each(function(attr){Element._attributeTranslations.write.names[attr.toLowerCase()]=attr;Element._attributeTranslations.has[attr.toLowerCase()]=attr;});(function(v){Object.extend(v,{href:v._getAttr2,src:v._getAttr2,type:v._getAttr,action:v._getAttrNode,disabled:v._flag,checked:v._flag,readonly:v._flag,multiple:v._flag,onload:v._getEv,onunload:v._getEv,onclick:v._getEv,ondblclick:v._getEv,onmousedown:v._getEv,onmouseup:v._getEv,onmouseover:v._getEv,onmousemove:v._getEv,onmouseout:v._getEv,onfocus:v._getEv,onblur:v._getEv,onkeypress:v._getEv,onkeydown:v._getEv,onkeyup:v._getEv,onsubmit:v._getEv,onreset:v._getEv,onselect:v._getEv,onchange:v._getEv});})(Element._attributeTranslations.read.values);if(Prototype.BrowserFeatures.ElementExtensions){(function(){function _descendants(element){var nodes=element.getElementsByTagName('*'),results=[];for(var i=0,node;node=nodes[i];i++)
if(node.tagName!=="!")
results.push(node);return results;}
Element.Methods.down=function(element,expression,index){element=$(element);if(arguments.length==1)return element.firstDescendant();return Object.isNumber(expression)?_descendants(element)[expression]:Element.select(element,expression)[index||0];}})();}}
else if(Prototype.Browser.Gecko&&/rv:1\.8\.0/.test(navigator.userAgent)){Element.Methods.setOpacity=function(element,value){element=$(element);element.style.opacity=(value==1)?0.999999:(value==='')?'':(value<0.00001)?0:value;return element;};}
else if(Prototype.Browser.WebKit){Element.Methods.setOpacity=function(element,value){element=$(element);element.style.opacity=(value==1||value==='')?'':(value<0.00001)?0:value;if(value==1)
if(element.tagName.toUpperCase()=='IMG'&&element.width){element.width++;element.width--;}else try{var n=document.createTextNode(' ');element.appendChild(n);element.removeChild(n);}catch(e){}
return element;};}
if('outerHTML'in document.documentElement){Element.Methods.replace=function(element,content){element=$(element);if(content&&content.toElement)content=content.toElement();if(Object.isElement(content)){element.parentNode.replaceChild(content,element);return element;}
content=Object.toHTML(content);var parent=element.parentNode,tagName=parent.tagName.toUpperCase();if(Element._insertionTranslations.tags[tagName]){var nextSibling=element.next(),fragments=Element._getContentFromAnonymousElement(tagName,content.stripScripts());parent.removeChild(element);if(nextSibling)
fragments.each(function(node){parent.insertBefore(node,nextSibling)});else
fragments.each(function(node){parent.appendChild(node)});}
else element.outerHTML=content.stripScripts();content.evalScripts.bind(content).defer();return element;};}
Element._returnOffset=function(l,t){var result=[l,t];result.left=l;result.top=t;return result;};Element._getContentFromAnonymousElement=function(tagName,html,force){var div=new Element('div'),t=Element._insertionTranslations.tags[tagName];var workaround=false;if(t)workaround=true;else if(force){workaround=true;t=['','',0];}
if(workaround){div.innerHTML='&nbsp;'+t[0]+html+t[1];div.removeChild(div.firstChild);for(var i=t[2];i--;){div=div.firstChild;}}
else{div.innerHTML=html;}
return $A(div.childNodes);};Element._insertionTranslations={before:function(element,node){element.parentNode.insertBefore(node,element);},top:function(element,node){element.insertBefore(node,element.firstChild);},bottom:function(element,node){element.appendChild(node);},after:function(element,node){element.parentNode.insertBefore(node,element.nextSibling);},tags:{TABLE:['<table>','</table>',1],TBODY:['<table><tbody>','</tbody></table>',2],TR:['<table><tbody><tr>','</tr></tbody></table>',3],TD:['<table><tbody><tr><td>','</td></tr></tbody></table>',4],SELECT:['<select>','</select>',1]}};(function(){var tags=Element._insertionTranslations.tags;Object.extend(tags,{THEAD:tags.TBODY,TFOOT:tags.TBODY,TH:tags.TD});})();Element.Methods.Simulated={hasAttribute:function(element,attribute){attribute=Element._attributeTranslations.has[attribute]||attribute;var node=$(element).getAttributeNode(attribute);return!!(node&&node.specified);}};Element.Methods.ByTag={};Object.extend(Element,Element.Methods);(function(div){if(!Prototype.BrowserFeatures.ElementExtensions&&div['__proto__']){window.HTMLElement={};window.HTMLElement.prototype=div['__proto__'];Prototype.BrowserFeatures.ElementExtensions=true;}
div=null;})(document.createElement('div'));Element.extend=(function(){function checkDeficiency(tagName){if(typeof window.Element!='undefined'){var proto=window.Element.prototype;if(proto){var id='_'+(Math.random()+'').slice(2),el=document.createElement(tagName);proto[id]='x';var isBuggy=(el[id]!=='x');delete proto[id];el=null;return isBuggy;}}
return false;}
function extendElementWith(element,methods){for(var property in methods){var value=methods[property];if(Object.isFunction(value)&&!(property in element))
element[property]=value.methodize();}}
var HTMLOBJECTELEMENT_PROTOTYPE_BUGGY=checkDeficiency('object');if(Prototype.BrowserFeatures.SpecificElementExtensions){if(HTMLOBJECTELEMENT_PROTOTYPE_BUGGY){return function(element){if(element&&typeof element._extendedByPrototype=='undefined'){var t=element.tagName;if(t&&(/^(?:object|applet|embed)$/i.test(t))){extendElementWith(element,Element.Methods);extendElementWith(element,Element.Methods.Simulated);extendElementWith(element,Element.Methods.ByTag[t.toUpperCase()]);}}
return element;}}
return Prototype.K;}
var Methods={},ByTag=Element.Methods.ByTag;var extend=Object.extend(function(element){if(!element||typeof element._extendedByPrototype!='undefined'||element.nodeType!=1||element==window)return element;var methods=Object.clone(Methods),tagName=element.tagName.toUpperCase();if(ByTag[tagName])Object.extend(methods,ByTag[tagName]);extendElementWith(element,methods);element._extendedByPrototype=Prototype.emptyFunction;return element;},{refresh:function(){if(!Prototype.BrowserFeatures.ElementExtensions){Object.extend(Methods,Element.Methods);Object.extend(Methods,Element.Methods.Simulated);}}});extend.refresh();return extend;})();if(document.documentElement.hasAttribute){Element.hasAttribute=function(element,attribute){return element.hasAttribute(attribute);};}
else{Element.hasAttribute=Element.Methods.Simulated.hasAttribute;}
Element.addMethods=function(methods){var F=Prototype.BrowserFeatures,T=Element.Methods.ByTag;if(!methods){Object.extend(Form,Form.Methods);Object.extend(Form.Element,Form.Element.Methods);Object.extend(Element.Methods.ByTag,{"FORM":Object.clone(Form.Methods),"INPUT":Object.clone(Form.Element.Methods),"SELECT":Object.clone(Form.Element.Methods),"TEXTAREA":Object.clone(Form.Element.Methods),"BUTTON":Object.clone(Form.Element.Methods)});}
if(arguments.length==2){var tagName=methods;methods=arguments[1];}
if(!tagName)Object.extend(Element.Methods,methods||{});else{if(Object.isArray(tagName))tagName.each(extend);else extend(tagName);}
function extend(tagName){tagName=tagName.toUpperCase();if(!Element.Methods.ByTag[tagName])
Element.Methods.ByTag[tagName]={};Object.extend(Element.Methods.ByTag[tagName],methods);}
function copy(methods,destination,onlyIfAbsent){onlyIfAbsent=onlyIfAbsent||false;for(var property in methods){var value=methods[property];if(!Object.isFunction(value))continue;if(!onlyIfAbsent||!(property in destination))
destination[property]=value.methodize();}}
function findDOMClass(tagName){var klass;var trans={"OPTGROUP":"OptGroup","TEXTAREA":"TextArea","P":"Paragraph","FIELDSET":"FieldSet","UL":"UList","OL":"OList","DL":"DList","DIR":"Directory","H1":"Heading","H2":"Heading","H3":"Heading","H4":"Heading","H5":"Heading","H6":"Heading","Q":"Quote","INS":"Mod","DEL":"Mod","A":"Anchor","IMG":"Image","CAPTION":"TableCaption","COL":"TableCol","COLGROUP":"TableCol","THEAD":"TableSection","TFOOT":"TableSection","TBODY":"TableSection","TR":"TableRow","TH":"TableCell","TD":"TableCell","FRAMESET":"FrameSet","IFRAME":"IFrame"};if(trans[tagName])klass='HTML'+trans[tagName]+'Element';if(window[klass])return window[klass];klass='HTML'+tagName+'Element';if(window[klass])return window[klass];klass='HTML'+tagName.capitalize()+'Element';if(window[klass])return window[klass];var element=document.createElement(tagName),proto=element['__proto__']||element.constructor.prototype;element=null;return proto;}
var elementPrototype=window.HTMLElement?HTMLElement.prototype:Element.prototype;if(F.ElementExtensions){copy(Element.Methods,elementPrototype);copy(Element.Methods.Simulated,elementPrototype,true);}
if(F.SpecificElementExtensions){for(var tag in Element.Methods.ByTag){var klass=findDOMClass(tag);if(Object.isUndefined(klass))continue;copy(T[tag],klass.prototype);}}
Object.extend(Element,Element.Methods);delete Element.ByTag;if(Element.extend.refresh)Element.extend.refresh();Element.cache={};};document.viewport={getDimensions:function(){return{width:this.getWidth(),height:this.getHeight()};},getScrollOffsets:function(){return Element._returnOffset(window.pageXOffset||document.documentElement.scrollLeft||document.body.scrollLeft,window.pageYOffset||document.documentElement.scrollTop||document.body.scrollTop);}};(function(viewport){var B=Prototype.Browser,doc=document,element,property={};function getRootElement(){if(B.WebKit&&!doc.evaluate)
return document;if(B.Opera&&window.parseFloat(window.opera.version())<9.5)
return document.body;return document.documentElement;}
function define(D){if(!element)element=getRootElement();property[D]='client'+D;viewport['get'+D]=function(){return element[property[D]]};return viewport['get'+D]();}
viewport.getWidth=define.curry('Width');viewport.getHeight=define.curry('Height');})(document.viewport);Element.Storage={UID:1};Element.addMethods({getStorage:function(element){if(!(element=$(element)))return;var uid;if(element===window){uid=0;}else{if(typeof element._prototypeUID==="undefined")
element._prototypeUID=Element.Storage.UID++;uid=element._prototypeUID;}
if(!Element.Storage[uid])
Element.Storage[uid]=$H();return Element.Storage[uid];},store:function(element,key,value){if(!(element=$(element)))return;if(arguments.length===2){Element.getStorage(element).update(key);}else{Element.getStorage(element).set(key,value);}
return element;},retrieve:function(element,key,defaultValue){if(!(element=$(element)))return;var hash=Element.getStorage(element),value=hash.get(key);if(Object.isUndefined(value)){hash.set(key,defaultValue);value=defaultValue;}
return value;},clone:function(element,deep){if(!(element=$(element)))return;var clone=element.cloneNode(deep);clone._prototypeUID=void 0;if(deep){var descendants=Element.select(clone,'*'),i=descendants.length;while(i--){descendants[i]._prototypeUID=void 0;}}
return Element.extend(clone);},purge:function(element){if(!(element=$(element)))return;var purgeElement=Element._purgeElement;purgeElement(element);var descendants=element.getElementsByTagName('*'),i=descendants.length;while(i--)purgeElement(descendants[i]);return null;}});(function(){function toDecimal(pctString){var match=pctString.match(/^(\d+)%?$/i);if(!match)return null;return(Number(match[1])/100);}
function getPixelValue(value,property,context){var element=null;if(Object.isElement(value)){element=value;value=element.getStyle(property);}
if(value===null){return null;}
if((/^(?:-)?\d+(\.\d+)?(px)?$/i).test(value)){return window.parseFloat(value);}
var isPercentage=value.include('%'),isViewport=(context===document.viewport);if(/\d/.test(value)&&element&&element.runtimeStyle&&!(isPercentage&&isViewport)){var style=element.style.left,rStyle=element.runtimeStyle.left;element.runtimeStyle.left=element.currentStyle.left;element.style.left=value||0;value=element.style.pixelLeft;element.style.left=style;element.runtimeStyle.left=rStyle;return value;}
if(element&&isPercentage){context=context||element.parentNode;var decimal=toDecimal(value);var whole=null;var position=element.getStyle('position');var isHorizontal=property.include('left')||property.include('right')||property.include('width');var isVertical=property.include('top')||property.include('bottom')||property.include('height');if(context===document.viewport){if(isHorizontal){whole=document.viewport.getWidth();}else if(isVertical){whole=document.viewport.getHeight();}}else{if(isHorizontal){whole=$(context).measure('width');}else if(isVertical){whole=$(context).measure('height');}}
return(whole===null)?0:whole*decimal;}
return 0;}
function toCSSPixels(number){if(Object.isString(number)&&number.endsWith('px')){return number;}
return number+'px';}
function isDisplayed(element){var originalElement=element;while(element&&element.parentNode){var display=element.getStyle('display');if(display==='none'){return false;}
element=$(element.parentNode);}
return true;}
var hasLayout=Prototype.K;if('currentStyle'in document.documentElement){hasLayout=function(element){if(!element.currentStyle.hasLayout){element.style.zoom=1;}
return element;};}
function cssNameFor(key){if(key.include('border'))key=key+'-width';return key.camelize();}
Element.Layout=Class.create(Hash,{initialize:function($super,element,preCompute){$super();this.element=$(element);Element.Layout.PROPERTIES.each(function(property){this._set(property,null);},this);if(preCompute){this._preComputing=true;this._begin();Element.Layout.PROPERTIES.each(this._compute,this);this._end();this._preComputing=false;}},_set:function(property,value){return Hash.prototype.set.call(this,property,value);},set:function(property,value){throw"Properties of Element.Layout are read-only.";},get:function($super,property){var value=$super(property);return value===null?this._compute(property):value;},_begin:function(){if(this._prepared)return;var element=this.element;if(isDisplayed(element)){this._prepared=true;return;}
var originalStyles={position:element.style.position||'',width:element.style.width||'',visibility:element.style.visibility||'',display:element.style.display||''};element.store('prototype_original_styles',originalStyles);var position=element.getStyle('position'),width=element.getStyle('width');if(width==="0px"||width===null){element.style.display='block';width=element.getStyle('width');}
var context=(position==='fixed')?document.viewport:element.parentNode;element.setStyle({position:'absolute',visibility:'hidden',display:'block'});var positionedWidth=element.getStyle('width');var newWidth;if(width&&(positionedWidth===width)){newWidth=getPixelValue(element,'width',context);}else if(position==='absolute'||position==='fixed'){newWidth=getPixelValue(element,'width',context);}else{var parent=element.parentNode,pLayout=$(parent).getLayout();newWidth=pLayout.get('width')-
this.get('margin-left')-
this.get('border-left')-
this.get('padding-left')-
this.get('padding-right')-
this.get('border-right')-
this.get('margin-right');}
element.setStyle({width:newWidth+'px'});this._prepared=true;},_end:function(){var element=this.element;var originalStyles=element.retrieve('prototype_original_styles');element.store('prototype_original_styles',null);element.setStyle(originalStyles);this._prepared=false;},_compute:function(property){var COMPUTATIONS=Element.Layout.COMPUTATIONS;if(!(property in COMPUTATIONS)){throw"Property not found.";}
return this._set(property,COMPUTATIONS[property].call(this,this.element));},toObject:function(){var args=$A(arguments);var keys=(args.length===0)?Element.Layout.PROPERTIES:args.join(' ').split(' ');var obj={};keys.each(function(key){if(!Element.Layout.PROPERTIES.include(key))return;var value=this.get(key);if(value!=null)obj[key]=value;},this);return obj;},toHash:function(){var obj=this.toObject.apply(this,arguments);return new Hash(obj);},toCSS:function(){var args=$A(arguments);var keys=(args.length===0)?Element.Layout.PROPERTIES:args.join(' ').split(' ');var css={};keys.each(function(key){if(!Element.Layout.PROPERTIES.include(key))return;if(Element.Layout.COMPOSITE_PROPERTIES.include(key))return;var value=this.get(key);if(value!=null)css[cssNameFor(key)]=value+'px';},this);return css;},inspect:function(){return"#<Element.Layout>";}});Object.extend(Element.Layout,{PROPERTIES:$w('height width top left right bottom border-left border-right border-top border-bottom padding-left padding-right padding-top padding-bottom margin-top margin-bottom margin-left margin-right padding-box-width padding-box-height border-box-width border-box-height margin-box-width margin-box-height'),COMPOSITE_PROPERTIES:$w('padding-box-width padding-box-height margin-box-width margin-box-height border-box-width border-box-height'),COMPUTATIONS:{'height':function(element){if(!this._preComputing)this._begin();var bHeight=this.get('border-box-height');if(bHeight<=0){if(!this._preComputing)this._end();return 0;}
var bTop=this.get('border-top'),bBottom=this.get('border-bottom');var pTop=this.get('padding-top'),pBottom=this.get('padding-bottom');if(!this._preComputing)this._end();return bHeight-bTop-bBottom-pTop-pBottom;},'width':function(element){if(!this._preComputing)this._begin();var bWidth=this.get('border-box-width');if(bWidth<=0){if(!this._preComputing)this._end();return 0;}
var bLeft=this.get('border-left'),bRight=this.get('border-right');var pLeft=this.get('padding-left'),pRight=this.get('padding-right');if(!this._preComputing)this._end();return bWidth-bLeft-bRight-pLeft-pRight;},'padding-box-height':function(element){var height=this.get('height'),pTop=this.get('padding-top'),pBottom=this.get('padding-bottom');return height+pTop+pBottom;},'padding-box-width':function(element){var width=this.get('width'),pLeft=this.get('padding-left'),pRight=this.get('padding-right');return width+pLeft+pRight;},'border-box-height':function(element){if(!this._preComputing)this._begin();var height=element.offsetHeight;if(!this._preComputing)this._end();return height;},'border-box-width':function(element){if(!this._preComputing)this._begin();var width=element.offsetWidth;if(!this._preComputing)this._end();return width;},'margin-box-height':function(element){var bHeight=this.get('border-box-height'),mTop=this.get('margin-top'),mBottom=this.get('margin-bottom');if(bHeight<=0)return 0;return bHeight+mTop+mBottom;},'margin-box-width':function(element){var bWidth=this.get('border-box-width'),mLeft=this.get('margin-left'),mRight=this.get('margin-right');if(bWidth<=0)return 0;return bWidth+mLeft+mRight;},'top':function(element){var offset=element.positionedOffset();return offset.top;},'bottom':function(element){var offset=element.positionedOffset(),parent=element.getOffsetParent(),pHeight=parent.measure('height');var mHeight=this.get('border-box-height');return pHeight-mHeight-offset.top;},'left':function(element){var offset=element.positionedOffset();return offset.left;},'right':function(element){var offset=element.positionedOffset(),parent=element.getOffsetParent(),pWidth=parent.measure('width');var mWidth=this.get('border-box-width');return pWidth-mWidth-offset.left;},'padding-top':function(element){return getPixelValue(element,'paddingTop');},'padding-bottom':function(element){return getPixelValue(element,'paddingBottom');},'padding-left':function(element){return getPixelValue(element,'paddingLeft');},'padding-right':function(element){return getPixelValue(element,'paddingRight');},'border-top':function(element){return getPixelValue(element,'borderTopWidth');},'border-bottom':function(element){return getPixelValue(element,'borderBottomWidth');},'border-left':function(element){return getPixelValue(element,'borderLeftWidth');},'border-right':function(element){return getPixelValue(element,'borderRightWidth');},'margin-top':function(element){return getPixelValue(element,'marginTop');},'margin-bottom':function(element){return getPixelValue(element,'marginBottom');},'margin-left':function(element){return getPixelValue(element,'marginLeft');},'margin-right':function(element){return getPixelValue(element,'marginRight');}}});if('getBoundingClientRect'in document.documentElement){Object.extend(Element.Layout.COMPUTATIONS,{'right':function(element){var parent=hasLayout(element.getOffsetParent());var rect=element.getBoundingClientRect(),pRect=parent.getBoundingClientRect();return(pRect.right-rect.right).round();},'bottom':function(element){var parent=hasLayout(element.getOffsetParent());var rect=element.getBoundingClientRect(),pRect=parent.getBoundingClientRect();return(pRect.bottom-rect.bottom).round();}});}
Element.Offset=Class.create({initialize:function(left,top){this.left=left.round();this.top=top.round();this[0]=this.left;this[1]=this.top;},relativeTo:function(offset){return new Element.Offset(this.left-offset.left,this.top-offset.top);},inspect:function(){return"#<Element.Offset left: #{left} top: #{top}>".interpolate(this);},toString:function(){return"[#{left}, #{top}]".interpolate(this);},toArray:function(){return[this.left,this.top];}});function getLayout(element,preCompute){return new Element.Layout(element,preCompute);}
function measure(element,property){return $(element).getLayout().get(property);}
function getDimensions(element){element=$(element);var display=Element.getStyle(element,'display');if(display&&display!=='none'){return{width:element.offsetWidth,height:element.offsetHeight};}
var style=element.style;var originalStyles={visibility:style.visibility,position:style.position,display:style.display};var newStyles={visibility:'hidden',display:'block'};if(originalStyles.position!=='fixed')
newStyles.position='absolute';Element.setStyle(element,newStyles);var dimensions={width:element.offsetWidth,height:element.offsetHeight};Element.setStyle(element,originalStyles);return dimensions;}
function getOffsetParent(element){element=$(element);if(isDocument(element)||isDetached(element)||isBody(element)||isHtml(element))
return $(document.body);var isInline=(Element.getStyle(element,'display')==='inline');if(!isInline&&element.offsetParent)return $(element.offsetParent);while((element=element.parentNode)&&element!==document.body){if(Element.getStyle(element,'position')!=='static'){return isHtml(element)?$(document.body):$(element);}}
return $(document.body);}
function cumulativeOffset(element){element=$(element);var valueT=0,valueL=0;if(element.parentNode){do{valueT+=element.offsetTop||0;valueL+=element.offsetLeft||0;element=element.offsetParent;}while(element);}
return new Element.Offset(valueL,valueT);}
function positionedOffset(element){element=$(element);var layout=element.getLayout();var valueT=0,valueL=0;do{valueT+=element.offsetTop||0;valueL+=element.offsetLeft||0;element=element.offsetParent;if(element){if(isBody(element))break;var p=Element.getStyle(element,'position');if(p!=='static')break;}}while(element);valueL-=layout.get('margin-top');valueT-=layout.get('margin-left');return new Element.Offset(valueL,valueT);}
function cumulativeScrollOffset(element){var valueT=0,valueL=0;do{valueT+=element.scrollTop||0;valueL+=element.scrollLeft||0;element=element.parentNode;}while(element);return new Element.Offset(valueL,valueT);}
function viewportOffset(forElement){element=$(element);var valueT=0,valueL=0,docBody=document.body;var element=forElement;do{valueT+=element.offsetTop||0;valueL+=element.offsetLeft||0;if(element.offsetParent==docBody&&Element.getStyle(element,'position')=='absolute')break;}while(element=element.offsetParent);element=forElement;do{if(element!=docBody){valueT-=element.scrollTop||0;valueL-=element.scrollLeft||0;}}while(element=element.parentNode);return new Element.Offset(valueL,valueT);}
function absolutize(element){element=$(element);if(Element.getStyle(element,'position')==='absolute'){return element;}
var offsetParent=getOffsetParent(element);var eOffset=element.viewportOffset(),pOffset=offsetParent.viewportOffset();var offset=eOffset.relativeTo(pOffset);var layout=element.getLayout();element.store('prototype_absolutize_original_styles',{left:element.getStyle('left'),top:element.getStyle('top'),width:element.getStyle('width'),height:element.getStyle('height')});element.setStyle({position:'absolute',top:offset.top+'px',left:offset.left+'px',width:layout.get('width')+'px',height:layout.get('height')+'px'});return element;}
function relativize(element){element=$(element);if(Element.getStyle(element,'position')==='relative'){return element;}
var originalStyles=element.retrieve('prototype_absolutize_original_styles');if(originalStyles)element.setStyle(originalStyles);return element;}
if(Prototype.Browser.IE){getOffsetParent=getOffsetParent.wrap(function(proceed,element){element=$(element);if(isDocument(element)||isDetached(element)||isBody(element)||isHtml(element))
return $(document.body);var position=element.getStyle('position');if(position!=='static')return proceed(element);element.setStyle({position:'relative'});var value=proceed(element);element.setStyle({position:position});return value;});positionedOffset=positionedOffset.wrap(function(proceed,element){element=$(element);if(!element.parentNode)return new Element.Offset(0,0);var position=element.getStyle('position');if(position!=='static')return proceed(element);var offsetParent=element.getOffsetParent();if(offsetParent&&offsetParent.getStyle('position')==='fixed')
hasLayout(offsetParent);element.setStyle({position:'relative'});var value=proceed(element);element.setStyle({position:position});return value;});}else if(Prototype.Browser.Webkit){cumulativeOffset=function(element){element=$(element);var valueT=0,valueL=0;do{valueT+=element.offsetTop||0;valueL+=element.offsetLeft||0;if(element.offsetParent==document.body)
if(Element.getStyle(element,'position')=='absolute')break;element=element.offsetParent;}while(element);return new Element.Offset(valueL,valueT);};}
Element.addMethods({getLayout:getLayout,measure:measure,getDimensions:getDimensions,getOffsetParent:getOffsetParent,cumulativeOffset:cumulativeOffset,positionedOffset:positionedOffset,cumulativeScrollOffset:cumulativeScrollOffset,viewportOffset:viewportOffset,absolutize:absolutize,relativize:relativize});function isBody(element){return element.nodeName.toUpperCase()==='BODY';}
function isHtml(element){return element.nodeName.toUpperCase()==='HTML';}
function isDocument(element){return element.nodeType===Node.DOCUMENT_NODE;}
function isDetached(element){return element!==document.body&&!Element.descendantOf(element,document.body);}
if('getBoundingClientRect'in document.documentElement){Element.addMethods({viewportOffset:function(element){element=$(element);if(isDetached(element))return new Element.Offset(0,0);var rect=element.getBoundingClientRect(),docEl=document.documentElement;return new Element.Offset(rect.left-docEl.clientLeft,rect.top-docEl.clientTop);}});}})();window.$$=function(){var expression=$A(arguments).join(', ');return Prototype.Selector.select(expression,document);};Prototype.Selector=(function(){function select(){throw new Error('Method "Prototype.Selector.select" must be defined.');}
function match(){throw new Error('Method "Prototype.Selector.match" must be defined.');}
function find(elements,expression,index){index=index||0;var match=Prototype.Selector.match,length=elements.length,matchIndex=0,i;for(i=0;i<length;i++){if(match(elements[i],expression)&&index==matchIndex++){return Element.extend(elements[i]);}}}
function extendElements(elements){for(var i=0,length=elements.length;i<length;i++){Element.extend(elements[i]);}
return elements;}
var K=Prototype.K;return{select:select,match:match,find:find,extendElements:(Element.extend===K)?K:extendElements,extendElement:Element.extend};})();Prototype._original_property=window.Sizzle;(function(){var chunker=/((?:\((?:\([^()]+\)|[^()]+)+\)|\[(?:\[[^[\]]*\]|['"][^'"]*['"]|[^[\]'"]+)+\]|\\.|[^ >+~,(\[\\]+)+|[>+~])(\s*,\s*)?((?:.|\r|\n)*)/g,done=0,toString=Object.prototype.toString,hasDuplicate=false,baseHasDuplicate=true;[0,0].sort(function(){baseHasDuplicate=false;return 0;});var Sizzle=function(selector,context,results,seed){results=results||[];var origContext=context=context||document;if(context.nodeType!==1&&context.nodeType!==9){return[];}
if(!selector||typeof selector!=="string"){return results;}
var parts=[],m,set,checkSet,check,mode,extra,prune=true,contextXML=isXML(context),soFar=selector;while((chunker.exec(""),m=chunker.exec(soFar))!==null){soFar=m[3];parts.push(m[1]);if(m[2]){extra=m[3];break;}}
if(parts.length>1&&origPOS.exec(selector)){if(parts.length===2&&Expr.relative[parts[0]]){set=posProcess(parts[0]+parts[1],context);}else{set=Expr.relative[parts[0]]?[context]:Sizzle(parts.shift(),context);while(parts.length){selector=parts.shift();if(Expr.relative[selector])
selector+=parts.shift();set=posProcess(selector,set);}}}else{if(!seed&&parts.length>1&&context.nodeType===9&&!contextXML&&Expr.match.ID.test(parts[0])&&!Expr.match.ID.test(parts[parts.length-1])){var ret=Sizzle.find(parts.shift(),context,contextXML);context=ret.expr?Sizzle.filter(ret.expr,ret.set)[0]:ret.set[0];}
if(context){var ret=seed?{expr:parts.pop(),set:makeArray(seed)}:Sizzle.find(parts.pop(),parts.length===1&&(parts[0]==="~"||parts[0]==="+")&&context.parentNode?context.parentNode:context,contextXML);set=ret.expr?Sizzle.filter(ret.expr,ret.set):ret.set;if(parts.length>0){checkSet=makeArray(set);}else{prune=false;}
while(parts.length){var cur=parts.pop(),pop=cur;if(!Expr.relative[cur]){cur="";}else{pop=parts.pop();}
if(pop==null){pop=context;}
Expr.relative[cur](checkSet,pop,contextXML);}}else{checkSet=parts=[];}}
if(!checkSet){checkSet=set;}
if(!checkSet){throw"Syntax error, unrecognized expression: "+(cur||selector);}
if(toString.call(checkSet)==="[object Array]"){if(!prune){results.push.apply(results,checkSet);}else if(context&&context.nodeType===1){for(var i=0;checkSet[i]!=null;i++){if(checkSet[i]&&(checkSet[i]===true||checkSet[i].nodeType===1&&contains(context,checkSet[i]))){results.push(set[i]);}}}else{for(var i=0;checkSet[i]!=null;i++){if(checkSet[i]&&checkSet[i].nodeType===1){results.push(set[i]);}}}}else{makeArray(checkSet,results);}
if(extra){Sizzle(extra,origContext,results,seed);Sizzle.uniqueSort(results);}
return results;};Sizzle.uniqueSort=function(results){if(sortOrder){hasDuplicate=baseHasDuplicate;results.sort(sortOrder);if(hasDuplicate){for(var i=1;i<results.length;i++){if(results[i]===results[i-1]){results.splice(i--,1);}}}}
return results;};Sizzle.matches=function(expr,set){return Sizzle(expr,null,null,set);};Sizzle.find=function(expr,context,isXML){var set,match;if(!expr){return[];}
for(var i=0,l=Expr.order.length;i<l;i++){var type=Expr.order[i],match;if((match=Expr.leftMatch[type].exec(expr))){var left=match[1];match.splice(1,1);if(left.substr(left.length-1)!=="\\"){match[1]=(match[1]||"").replace(/\\/g,"");set=Expr.find[type](match,context,isXML);if(set!=null){expr=expr.replace(Expr.match[type],"");break;}}}}
if(!set){set=context.getElementsByTagName("*");}
return{set:set,expr:expr};};Sizzle.filter=function(expr,set,inplace,not){var old=expr,result=[],curLoop=set,match,anyFound,isXMLFilter=set&&set[0]&&isXML(set[0]);while(expr&&set.length){for(var type in Expr.filter){if((match=Expr.match[type].exec(expr))!=null){var filter=Expr.filter[type],found,item;anyFound=false;if(curLoop==result){result=[];}
if(Expr.preFilter[type]){match=Expr.preFilter[type](match,curLoop,inplace,result,not,isXMLFilter);if(!match){anyFound=found=true;}else if(match===true){continue;}}
if(match){for(var i=0;(item=curLoop[i])!=null;i++){if(item){found=filter(item,match,i,curLoop);var pass=not^!!found;if(inplace&&found!=null){if(pass){anyFound=true;}else{curLoop[i]=false;}}else if(pass){result.push(item);anyFound=true;}}}}
if(found!==undefined){if(!inplace){curLoop=result;}
expr=expr.replace(Expr.match[type],"");if(!anyFound){return[];}
break;}}}
if(expr==old){if(anyFound==null){throw"Syntax error, unrecognized expression: "+expr;}else{break;}}
old=expr;}
return curLoop;};var Expr=Sizzle.selectors={order:["ID","NAME","TAG"],match:{ID:/#((?:[\w\u00c0-\uFFFF-]|\\.)+)/,CLASS:/\.((?:[\w\u00c0-\uFFFF-]|\\.)+)/,NAME:/\[name=['"]*((?:[\w\u00c0-\uFFFF-]|\\.)+)['"]*\]/,ATTR:/\[\s*((?:[\w\u00c0-\uFFFF-]|\\.)+)\s*(?:(\S?=)\s*(['"]*)(.*?)\3|)\s*\]/,TAG:/^((?:[\w\u00c0-\uFFFF\*-]|\\.)+)/,CHILD:/:(only|nth|last|first)-child(?:\((even|odd|[\dn+-]*)\))?/,POS:/:(nth|eq|gt|lt|first|last|even|odd)(?:\((\d*)\))?(?=[^-]|$)/,PSEUDO:/:((?:[\w\u00c0-\uFFFF-]|\\.)+)(?:\((['"]*)((?:\([^\)]+\)|[^\2\(\)]*)+)\2\))?/},leftMatch:{},attrMap:{"class":"className","for":"htmlFor"},attrHandle:{href:function(elem){return elem.getAttribute("href");}},relative:{"+":function(checkSet,part,isXML){var isPartStr=typeof part==="string",isTag=isPartStr&&!/\W/.test(part),isPartStrNotTag=isPartStr&&!isTag;if(isTag&&!isXML){part=part.toUpperCase();}
for(var i=0,l=checkSet.length,elem;i<l;i++){if((elem=checkSet[i])){while((elem=elem.previousSibling)&&elem.nodeType!==1){}
checkSet[i]=isPartStrNotTag||elem&&elem.nodeName===part?elem||false:elem===part;}}
if(isPartStrNotTag){Sizzle.filter(part,checkSet,true);}},">":function(checkSet,part,isXML){var isPartStr=typeof part==="string";if(isPartStr&&!/\W/.test(part)){part=isXML?part:part.toUpperCase();for(var i=0,l=checkSet.length;i<l;i++){var elem=checkSet[i];if(elem){var parent=elem.parentNode;checkSet[i]=parent.nodeName===part?parent:false;}}}else{for(var i=0,l=checkSet.length;i<l;i++){var elem=checkSet[i];if(elem){checkSet[i]=isPartStr?elem.parentNode:elem.parentNode===part;}}
if(isPartStr){Sizzle.filter(part,checkSet,true);}}},"":function(checkSet,part,isXML){var doneName=done++,checkFn=dirCheck;if(!/\W/.test(part)){var nodeCheck=part=isXML?part:part.toUpperCase();checkFn=dirNodeCheck;}
checkFn("parentNode",part,doneName,checkSet,nodeCheck,isXML);},"~":function(checkSet,part,isXML){var doneName=done++,checkFn=dirCheck;if(typeof part==="string"&&!/\W/.test(part)){var nodeCheck=part=isXML?part:part.toUpperCase();checkFn=dirNodeCheck;}
checkFn("previousSibling",part,doneName,checkSet,nodeCheck,isXML);}},find:{ID:function(match,context,isXML){if(typeof context.getElementById!=="undefined"&&!isXML){var m=context.getElementById(match[1]);return m?[m]:[];}},NAME:function(match,context,isXML){if(typeof context.getElementsByName!=="undefined"){var ret=[],results=context.getElementsByName(match[1]);for(var i=0,l=results.length;i<l;i++){if(results[i].getAttribute("name")===match[1]){ret.push(results[i]);}}
return ret.length===0?null:ret;}},TAG:function(match,context){return context.getElementsByTagName(match[1]);}},preFilter:{CLASS:function(match,curLoop,inplace,result,not,isXML){match=" "+match[1].replace(/\\/g,"")+" ";if(isXML){return match;}
for(var i=0,elem;(elem=curLoop[i])!=null;i++){if(elem){if(not^(elem.className&&(" "+elem.className+" ").indexOf(match)>=0)){if(!inplace)
result.push(elem);}else if(inplace){curLoop[i]=false;}}}
return false;},ID:function(match){return match[1].replace(/\\/g,"");},TAG:function(match,curLoop){for(var i=0;curLoop[i]===false;i++){}
return curLoop[i]&&isXML(curLoop[i])?match[1]:match[1].toUpperCase();},CHILD:function(match){if(match[1]=="nth"){var test=/(-?)(\d*)n((?:\+|-)?\d*)/.exec(match[2]=="even"&&"2n"||match[2]=="odd"&&"2n+1"||!/\D/.test(match[2])&&"0n+"+match[2]||match[2]);match[2]=(test[1]+(test[2]||1))-0;match[3]=test[3]-0;}
match[0]=done++;return match;},ATTR:function(match,curLoop,inplace,result,not,isXML){var name=match[1].replace(/\\/g,"");if(!isXML&&Expr.attrMap[name]){match[1]=Expr.attrMap[name];}
if(match[2]==="~="){match[4]=" "+match[4]+" ";}
return match;},PSEUDO:function(match,curLoop,inplace,result,not){if(match[1]==="not"){if((chunker.exec(match[3])||"").length>1||/^\w/.test(match[3])){match[3]=Sizzle(match[3],null,null,curLoop);}else{var ret=Sizzle.filter(match[3],curLoop,inplace,true^not);if(!inplace){result.push.apply(result,ret);}
return false;}}else if(Expr.match.POS.test(match[0])||Expr.match.CHILD.test(match[0])){return true;}
return match;},POS:function(match){match.unshift(true);return match;}},filters:{enabled:function(elem){return elem.disabled===false&&elem.type!=="hidden";},disabled:function(elem){return elem.disabled===true;},checked:function(elem){return elem.checked===true;},selected:function(elem){elem.parentNode.selectedIndex;return elem.selected===true;},parent:function(elem){return!!elem.firstChild;},empty:function(elem){return!elem.firstChild;},has:function(elem,i,match){return!!Sizzle(match[3],elem).length;},header:function(elem){return/h\d/i.test(elem.nodeName);},text:function(elem){return"text"===elem.type;},radio:function(elem){return"radio"===elem.type;},checkbox:function(elem){return"checkbox"===elem.type;},file:function(elem){return"file"===elem.type;},password:function(elem){return"password"===elem.type;},submit:function(elem){return"submit"===elem.type;},image:function(elem){return"image"===elem.type;},reset:function(elem){return"reset"===elem.type;},button:function(elem){return"button"===elem.type||elem.nodeName.toUpperCase()==="BUTTON";},input:function(elem){return/input|select|textarea|button/i.test(elem.nodeName);}},setFilters:{first:function(elem,i){return i===0;},last:function(elem,i,match,array){return i===array.length-1;},even:function(elem,i){return i%2===0;},odd:function(elem,i){return i%2===1;},lt:function(elem,i,match){return i<match[3]-0;},gt:function(elem,i,match){return i>match[3]-0;},nth:function(elem,i,match){return match[3]-0==i;},eq:function(elem,i,match){return match[3]-0==i;}},filter:{PSEUDO:function(elem,match,i,array){var name=match[1],filter=Expr.filters[name];if(filter){return filter(elem,i,match,array);}else if(name==="contains"){return(elem.textContent||elem.innerText||"").indexOf(match[3])>=0;}else if(name==="not"){var not=match[3];for(var i=0,l=not.length;i<l;i++){if(not[i]===elem){return false;}}
return true;}},CHILD:function(elem,match){var type=match[1],node=elem;switch(type){case'only':case'first':while((node=node.previousSibling)){if(node.nodeType===1)return false;}
if(type=='first')return true;node=elem;case'last':while((node=node.nextSibling)){if(node.nodeType===1)return false;}
return true;case'nth':var first=match[2],last=match[3];if(first==1&&last==0){return true;}
var doneName=match[0],parent=elem.parentNode;if(parent&&(parent.sizcache!==doneName||!elem.nodeIndex)){var count=0;for(node=parent.firstChild;node;node=node.nextSibling){if(node.nodeType===1){node.nodeIndex=++count;}}
parent.sizcache=doneName;}
var diff=elem.nodeIndex-last;if(first==0){return diff==0;}else{return(diff%first==0&&diff/first>=0);}}},ID:function(elem,match){return elem.nodeType===1&&elem.getAttribute("id")===match;},TAG:function(elem,match){return(match==="*"&&elem.nodeType===1)||elem.nodeName===match;},CLASS:function(elem,match){return(" "+(elem.className||elem.getAttribute("class"))+" ").indexOf(match)>-1;},ATTR:function(elem,match){var name=match[1],result=Expr.attrHandle[name]?Expr.attrHandle[name](elem):elem[name]!=null?elem[name]:elem.getAttribute(name),value=result+"",type=match[2],check=match[4];return result==null?type==="!=":type==="="?value===check:type==="*="?value.indexOf(check)>=0:type==="~="?(" "+value+" ").indexOf(check)>=0:!check?value&&result!==false:type==="!="?value!=check:type==="^="?value.indexOf(check)===0:type==="$="?value.substr(value.length-check.length)===check:type==="|="?value===check||value.substr(0,check.length+1)===check+"-":false;},POS:function(elem,match,i,array){var name=match[2],filter=Expr.setFilters[name];if(filter){return filter(elem,i,match,array);}}}};var origPOS=Expr.match.POS;for(var type in Expr.match){Expr.match[type]=new RegExp(Expr.match[type].source+/(?![^\[]*\])(?![^\(]*\))/.source);Expr.leftMatch[type]=new RegExp(/(^(?:.|\r|\n)*?)/.source+Expr.match[type].source);}
var makeArray=function(array,results){array=Array.prototype.slice.call(array,0);if(results){results.push.apply(results,array);return results;}
return array;};try{Array.prototype.slice.call(document.documentElement.childNodes,0);}catch(e){makeArray=function(array,results){var ret=results||[];if(toString.call(array)==="[object Array]"){Array.prototype.push.apply(ret,array);}else{if(typeof array.length==="number"){for(var i=0,l=array.length;i<l;i++){ret.push(array[i]);}}else{for(var i=0;array[i];i++){ret.push(array[i]);}}}
return ret;};}
var sortOrder;if(document.documentElement.compareDocumentPosition){sortOrder=function(a,b){if(!a.compareDocumentPosition||!b.compareDocumentPosition){if(a==b){hasDuplicate=true;}
return 0;}
var ret=a.compareDocumentPosition(b)&4?-1:a===b?0:1;if(ret===0){hasDuplicate=true;}
return ret;};}else if("sourceIndex"in document.documentElement){sortOrder=function(a,b){if(!a.sourceIndex||!b.sourceIndex){if(a==b){hasDuplicate=true;}
return 0;}
var ret=a.sourceIndex-b.sourceIndex;if(ret===0){hasDuplicate=true;}
return ret;};}else if(document.createRange){sortOrder=function(a,b){if(!a.ownerDocument||!b.ownerDocument){if(a==b){hasDuplicate=true;}
return 0;}
var aRange=a.ownerDocument.createRange(),bRange=b.ownerDocument.createRange();aRange.setStart(a,0);aRange.setEnd(a,0);bRange.setStart(b,0);bRange.setEnd(b,0);var ret=aRange.compareBoundaryPoints(Range.START_TO_END,bRange);if(ret===0){hasDuplicate=true;}
return ret;};}
(function(){var form=document.createElement("div"),id="script"+(new Date).getTime();form.innerHTML="<a name='"+id+"'/>";var root=document.documentElement;root.insertBefore(form,root.firstChild);if(!!document.getElementById(id)){Expr.find.ID=function(match,context,isXML){if(typeof context.getElementById!=="undefined"&&!isXML){var m=context.getElementById(match[1]);return m?m.id===match[1]||typeof m.getAttributeNode!=="undefined"&&m.getAttributeNode("id").nodeValue===match[1]?[m]:undefined:[];}};Expr.filter.ID=function(elem,match){var node=typeof elem.getAttributeNode!=="undefined"&&elem.getAttributeNode("id");return elem.nodeType===1&&node&&node.nodeValue===match;};}
root.removeChild(form);root=form=null;})();(function(){var div=document.createElement("div");div.appendChild(document.createComment(""));if(div.getElementsByTagName("*").length>0){Expr.find.TAG=function(match,context){var results=context.getElementsByTagName(match[1]);if(match[1]==="*"){var tmp=[];for(var i=0;results[i];i++){if(results[i].nodeType===1){tmp.push(results[i]);}}
results=tmp;}
return results;};}
div.innerHTML="<a href='#'></a>";if(div.firstChild&&typeof div.firstChild.getAttribute!=="undefined"&&div.firstChild.getAttribute("href")!=="#"){Expr.attrHandle.href=function(elem){return elem.getAttribute("href",2);};}
div=null;})();if(document.querySelectorAll)(function(){var oldSizzle=Sizzle,div=document.createElement("div");div.innerHTML="<p class='TEST'></p>";if(div.querySelectorAll&&div.querySelectorAll(".TEST").length===0){return;}
Sizzle=function(query,context,extra,seed){context=context||document;if(!seed&&context.nodeType===9&&!isXML(context)){try{return makeArray(context.querySelectorAll(query),extra);}catch(e){}}
return oldSizzle(query,context,extra,seed);};for(var prop in oldSizzle){Sizzle[prop]=oldSizzle[prop];}
div=null;})();if(document.getElementsByClassName&&document.documentElement.getElementsByClassName)(function(){var div=document.createElement("div");div.innerHTML="<div class='test e'></div><div class='test'></div>";if(div.getElementsByClassName("e").length===0)
return;div.lastChild.className="e";if(div.getElementsByClassName("e").length===1)
return;Expr.order.splice(1,0,"CLASS");Expr.find.CLASS=function(match,context,isXML){if(typeof context.getElementsByClassName!=="undefined"&&!isXML){return context.getElementsByClassName(match[1]);}};div=null;})();function dirNodeCheck(dir,cur,doneName,checkSet,nodeCheck,isXML){var sibDir=dir=="previousSibling"&&!isXML;for(var i=0,l=checkSet.length;i<l;i++){var elem=checkSet[i];if(elem){if(sibDir&&elem.nodeType===1){elem.sizcache=doneName;elem.sizset=i;}
elem=elem[dir];var match=false;while(elem){if(elem.sizcache===doneName){match=checkSet[elem.sizset];break;}
if(elem.nodeType===1&&!isXML){elem.sizcache=doneName;elem.sizset=i;}
if(elem.nodeName===cur){match=elem;break;}
elem=elem[dir];}
checkSet[i]=match;}}}
function dirCheck(dir,cur,doneName,checkSet,nodeCheck,isXML){var sibDir=dir=="previousSibling"&&!isXML;for(var i=0,l=checkSet.length;i<l;i++){var elem=checkSet[i];if(elem){if(sibDir&&elem.nodeType===1){elem.sizcache=doneName;elem.sizset=i;}
elem=elem[dir];var match=false;while(elem){if(elem.sizcache===doneName){match=checkSet[elem.sizset];break;}
if(elem.nodeType===1){if(!isXML){elem.sizcache=doneName;elem.sizset=i;}
if(typeof cur!=="string"){if(elem===cur){match=true;break;}}else if(Sizzle.filter(cur,[elem]).length>0){match=elem;break;}}
elem=elem[dir];}
checkSet[i]=match;}}}
var contains=document.compareDocumentPosition?function(a,b){return a.compareDocumentPosition(b)&16;}:function(a,b){return a!==b&&(a.contains?a.contains(b):true);};var isXML=function(elem){return elem.nodeType===9&&elem.documentElement.nodeName!=="HTML"||!!elem.ownerDocument&&elem.ownerDocument.documentElement.nodeName!=="HTML";};var posProcess=function(selector,context){var tmpSet=[],later="",match,root=context.nodeType?[context]:context;while((match=Expr.match.PSEUDO.exec(selector))){later+=match[0];selector=selector.replace(Expr.match.PSEUDO,"");}
selector=Expr.relative[selector]?selector+"*":selector;for(var i=0,l=root.length;i<l;i++){Sizzle(selector,root[i],tmpSet);}
return Sizzle.filter(later,tmpSet);};window.Sizzle=Sizzle;})();;(function(engine){var extendElements=Prototype.Selector.extendElements;function select(selector,scope){return extendElements(engine(selector,scope||document));}
function match(element,selector){return engine.matches(selector,[element]).length==1;}
Prototype.Selector.engine=engine;Prototype.Selector.select=select;Prototype.Selector.match=match;})(Sizzle);window.Sizzle=Prototype._original_property;delete Prototype._original_property;var Form={reset:function(form){form=$(form);form.reset();return form;},serializeElements:function(elements,options){if(typeof options!='object')options={hash:!!options};else if(Object.isUndefined(options.hash))options.hash=true;var key,value,submitted=false,submit=options.submit,accumulator,initial;if(options.hash){initial={};accumulator=function(result,key,value){if(key in result){if(!Object.isArray(result[key]))result[key]=[result[key]];result[key].push(value);}else result[key]=value;return result;};}else{initial='';accumulator=function(result,key,value){return result+(result?'&':'')+encodeURIComponent(key)+'='+encodeURIComponent(value);}}
return elements.inject(initial,function(result,element){if(!element.disabled&&element.name){key=element.name;value=$(element).getValue();if(value!=null&&element.type!='file'&&(element.type!='submit'||(!submitted&&submit!==false&&(!submit||key==submit)&&(submitted=true)))){result=accumulator(result,key,value);}}
return result;});}};Form.Methods={serialize:function(form,options){return Form.serializeElements(Form.getElements(form),options);},getElements:function(form){var elements=$(form).getElementsByTagName('*'),element,arr=[],serializers=Form.Element.Serializers;for(var i=0;element=elements[i];i++){arr.push(element);}
return arr.inject([],function(elements,child){if(serializers[child.tagName.toLowerCase()])
elements.push(Element.extend(child));return elements;})},getInputs:function(form,typeName,name){form=$(form);var inputs=form.getElementsByTagName('input');if(!typeName&&!name)return $A(inputs).map(Element.extend);for(var i=0,matchingInputs=[],length=inputs.length;i<length;i++){var input=inputs[i];if((typeName&&input.type!=typeName)||(name&&input.name!=name))
continue;matchingInputs.push(Element.extend(input));}
return matchingInputs;},disable:function(form){form=$(form);Form.getElements(form).invoke('disable');return form;},enable:function(form){form=$(form);Form.getElements(form).invoke('enable');return form;},findFirstElement:function(form){var elements=$(form).getElements().findAll(function(element){return'hidden'!=element.type&&!element.disabled;});var firstByIndex=elements.findAll(function(element){return element.hasAttribute('tabIndex')&&element.tabIndex>=0;}).sortBy(function(element){return element.tabIndex}).first();return firstByIndex?firstByIndex:elements.find(function(element){return/^(?:input|select|textarea)$/i.test(element.tagName);});},focusFirstElement:function(form){form=$(form);var element=form.findFirstElement();if(element)element.activate();return form;},request:function(form,options){form=$(form),options=Object.clone(options||{});var params=options.parameters,action=form.readAttribute('action')||'';if(action.blank())action=window.location.href;options.parameters=form.serialize(true);if(params){if(Object.isString(params))params=params.toQueryParams();Object.extend(options.parameters,params);}
if(form.hasAttribute('method')&&!options.method)
options.method=form.method;return new Ajax.Request(action,options);}};Form.Element={focus:function(element){$(element).focus();return element;},select:function(element){$(element).select();return element;}};Form.Element.Methods={serialize:function(element){element=$(element);if(!element.disabled&&element.name){var value=element.getValue();if(value!=undefined){var pair={};pair[element.name]=value;return Object.toQueryString(pair);}}
return'';},getValue:function(element){element=$(element);var method=element.tagName.toLowerCase();return Form.Element.Serializers[method](element);},setValue:function(element,value){element=$(element);var method=element.tagName.toLowerCase();Form.Element.Serializers[method](element,value);return element;},clear:function(element){$(element).value='';return element;},present:function(element){return $(element).value!='';},activate:function(element){element=$(element);try{element.focus();if(element.select&&(element.tagName.toLowerCase()!='input'||!(/^(?:button|reset|submit)$/i.test(element.type))))
element.select();}catch(e){}
return element;},disable:function(element){element=$(element);element.disabled=true;return element;},enable:function(element){element=$(element);element.disabled=false;return element;}};var Field=Form.Element;var $F=Form.Element.Methods.getValue;Form.Element.Serializers=(function(){function input(element,value){switch(element.type.toLowerCase()){case'checkbox':case'radio':return inputSelector(element,value);default:return valueSelector(element,value);}}
function inputSelector(element,value){if(Object.isUndefined(value))
return element.checked?element.value:null;else element.checked=!!value;}
function valueSelector(element,value){if(Object.isUndefined(value))return element.value;else element.value=value;}
function select(element,value){if(Object.isUndefined(value))
return(element.type==='select-one'?selectOne:selectMany)(element);var opt,currentValue,single=!Object.isArray(value);for(var i=0,length=element.length;i<length;i++){opt=element.options[i];currentValue=this.optionValue(opt);if(single){if(currentValue==value){opt.selected=true;return;}}
else opt.selected=value.include(currentValue);}}
function selectOne(element){var index=element.selectedIndex;return index>=0?optionValue(element.options[index]):null;}
function selectMany(element){var values,length=element.length;if(!length)return null;for(var i=0,values=[];i<length;i++){var opt=element.options[i];if(opt.selected)values.push(optionValue(opt));}
return values;}
function optionValue(opt){return Element.hasAttribute(opt,'value')?opt.value:opt.text;}
return{input:input,inputSelector:inputSelector,textarea:valueSelector,select:select,selectOne:selectOne,selectMany:selectMany,optionValue:optionValue,button:valueSelector};})();Abstract.TimedObserver=Class.create(PeriodicalExecuter,{initialize:function($super,element,frequency,callback){$super(callback,frequency);this.element=$(element);this.lastValue=this.getValue();},execute:function(){var value=this.getValue();if(Object.isString(this.lastValue)&&Object.isString(value)?this.lastValue!=value:String(this.lastValue)!=String(value)){this.callback(this.element,value);this.lastValue=value;}}});Form.Element.Observer=Class.create(Abstract.TimedObserver,{getValue:function(){return Form.Element.getValue(this.element);}});Form.Observer=Class.create(Abstract.TimedObserver,{getValue:function(){return Form.serialize(this.element);}});Abstract.EventObserver=Class.create({initialize:function(element,callback){this.element=$(element);this.callback=callback;this.lastValue=this.getValue();if(this.element.tagName.toLowerCase()=='form')
this.registerFormCallbacks();else
this.registerCallback(this.element);},onElementEvent:function(){var value=this.getValue();if(this.lastValue!=value){this.callback(this.element,value);this.lastValue=value;}},registerFormCallbacks:function(){Form.getElements(this.element).each(this.registerCallback,this);},registerCallback:function(element){if(element.type){switch(element.type.toLowerCase()){case'checkbox':case'radio':Event.observe(element,'click',this.onElementEvent.bind(this));break;default:Event.observe(element,'change',this.onElementEvent.bind(this));break;}}}});Form.Element.EventObserver=Class.create(Abstract.EventObserver,{getValue:function(){return Form.Element.getValue(this.element);}});Form.EventObserver=Class.create(Abstract.EventObserver,{getValue:function(){return Form.serialize(this.element);}});(function(){var Event={KEY_BACKSPACE:8,KEY_TAB:9,KEY_RETURN:13,KEY_ESC:27,KEY_LEFT:37,KEY_UP:38,KEY_RIGHT:39,KEY_DOWN:40,KEY_DELETE:46,KEY_HOME:36,KEY_END:35,KEY_PAGEUP:33,KEY_PAGEDOWN:34,KEY_INSERT:45,cache:{}};var docEl=document.documentElement;var MOUSEENTER_MOUSELEAVE_EVENTS_SUPPORTED='onmouseenter'in docEl&&'onmouseleave'in docEl;var isIELegacyEvent=function(event){return false;};if(window.attachEvent){if(window.addEventListener){isIELegacyEvent=function(event){return!(event instanceof window.Event);};}else{isIELegacyEvent=function(event){return true;};}}
var _isButton;function _isButtonForDOMEvents(event,code){return event.which?(event.which===code+1):(event.button===code);}
var legacyButtonMap={0:1,1:4,2:2};function _isButtonForLegacyEvents(event,code){return event.button===legacyButtonMap[code];}
function _isButtonForWebKit(event,code){switch(code){case 0:return event.which==1&&!event.metaKey;case 1:return event.which==2||(event.which==1&&event.metaKey);case 2:return event.which==3;default:return false;}}
if(window.attachEvent){if(!window.addEventListener){_isButton=_isButtonForLegacyEvents;}else{_isButton=function(event,code){return isIELegacyEvent(event)?_isButtonForLegacyEvents(event,code):_isButtonForDOMEvents(event,code);}}}else if(Prototype.Browser.WebKit){_isButton=_isButtonForWebKit;}else{_isButton=_isButtonForDOMEvents;}
function isLeftClick(event){return _isButton(event,0)}
function isMiddleClick(event){return _isButton(event,1)}
function isRightClick(event){return _isButton(event,2)}
function element(event){event=Event.extend(event);var node=event.target,type=event.type,currentTarget=event.currentTarget;if(currentTarget&&currentTarget.tagName){if(type==='load'||type==='error'||(type==='click'&&currentTarget.tagName.toLowerCase()==='input'&&currentTarget.type==='radio'))
node=currentTarget;}
if(node.nodeType==Node.TEXT_NODE)
node=node.parentNode;return Element.extend(node);}
function findElement(event,expression){var element=Event.element(event);if(!expression)return element;while(element){if(Object.isElement(element)&&Prototype.Selector.match(element,expression)){return Element.extend(element);}
element=element.parentNode;}}
function pointer(event){return{x:pointerX(event),y:pointerY(event)};}
function pointerX(event){var docElement=document.documentElement,body=document.body||{scrollLeft:0};return event.pageX||(event.clientX+
(docElement.scrollLeft||body.scrollLeft)-
(docElement.clientLeft||0));}
function pointerY(event){var docElement=document.documentElement,body=document.body||{scrollTop:0};return event.pageY||(event.clientY+
(docElement.scrollTop||body.scrollTop)-
(docElement.clientTop||0));}
function stop(event){Event.extend(event);event.preventDefault();event.stopPropagation();event.stopped=true;}
Event.Methods={isLeftClick:isLeftClick,isMiddleClick:isMiddleClick,isRightClick:isRightClick,element:element,findElement:findElement,pointer:pointer,pointerX:pointerX,pointerY:pointerY,stop:stop};var methods=Object.keys(Event.Methods).inject({},function(m,name){m[name]=Event.Methods[name].methodize();return m;});if(window.attachEvent){function _relatedTarget(event){var element;switch(event.type){case'mouseover':case'mouseenter':element=event.fromElement;break;case'mouseout':case'mouseleave':element=event.toElement;break;default:return null;}
return Element.extend(element);}
var additionalMethods={stopPropagation:function(){this.cancelBubble=true},preventDefault:function(){this.returnValue=false},inspect:function(){return'[object Event]'}};Event.extend=function(event,element){if(!event)return false;if(!isIELegacyEvent(event))return event;if(event._extendedByPrototype)return event;event._extendedByPrototype=Prototype.emptyFunction;var pointer=Event.pointer(event);Object.extend(event,{target:event.srcElement||element,relatedTarget:_relatedTarget(event),pageX:pointer.x,pageY:pointer.y});Object.extend(event,methods);Object.extend(event,additionalMethods);return event;};}else{Event.extend=Prototype.K;}
if(window.addEventListener){Event.prototype=window.Event.prototype||document.createEvent('HTMLEvents').__proto__;Object.extend(Event.prototype,methods);}
function _createResponder(element,eventName,handler){var registry=Element.retrieve(element,'prototype_event_registry');if(Object.isUndefined(registry)){CACHE.push(element);registry=Element.retrieve(element,'prototype_event_registry',$H());}
var respondersForEvent=registry.get(eventName);if(Object.isUndefined(respondersForEvent)){respondersForEvent=[];registry.set(eventName,respondersForEvent);}
if(respondersForEvent.pluck('handler').include(handler))return false;var responder;if(eventName.include(":")){responder=function(event){if(Object.isUndefined(event.eventName))
return false;if(event.eventName!==eventName)
return false;Event.extend(event,element);handler.call(element,event);};}else{if(!MOUSEENTER_MOUSELEAVE_EVENTS_SUPPORTED&&(eventName==="mouseenter"||eventName==="mouseleave")){if(eventName==="mouseenter"||eventName==="mouseleave"){responder=function(event){Event.extend(event,element);var parent=event.relatedTarget;while(parent&&parent!==element){try{parent=parent.parentNode;}
catch(e){parent=element;}}
if(parent===element)return;handler.call(element,event);};}}else{responder=function(event){Event.extend(event,element);handler.call(element,event);};}}
responder.handler=handler;respondersForEvent.push(responder);return responder;}
function _destroyCache(){for(var i=0,length=CACHE.length;i<length;i++){Event.stopObserving(CACHE[i]);CACHE[i]=null;}}
var CACHE=[];if(Prototype.Browser.IE)
window.attachEvent('onunload',_destroyCache);if(Prototype.Browser.WebKit)
window.addEventListener('unload',Prototype.emptyFunction,false);var _getDOMEventName=Prototype.K,translations={mouseenter:"mouseover",mouseleave:"mouseout"};if(!MOUSEENTER_MOUSELEAVE_EVENTS_SUPPORTED){_getDOMEventName=function(eventName){return(translations[eventName]||eventName);};}
function observe(element,eventName,handler){element=$(element);var responder=_createResponder(element,eventName,handler);if(!responder)return element;if(eventName.include(':')){if(element.addEventListener)
element.addEventListener("dataavailable",responder,false);else{element.attachEvent("ondataavailable",responder);element.attachEvent("onlosecapture",responder);}}else{var actualEventName=_getDOMEventName(eventName);if(element.addEventListener)
element.addEventListener(actualEventName,responder,false);else
element.attachEvent("on"+actualEventName,responder);}
return element;}
function stopObserving(element,eventName,handler){element=$(element);var registry=Element.retrieve(element,'prototype_event_registry');if(!registry)return element;if(!eventName){registry.each(function(pair){var eventName=pair.key;stopObserving(element,eventName);});return element;}
var responders=registry.get(eventName);if(!responders)return element;if(!handler){responders.each(function(r){stopObserving(element,eventName,r.handler);});return element;}
var i=responders.length,responder;while(i--){if(responders[i].handler===handler){responder=responders[i];break;}}
if(!responder)return element;if(eventName.include(':')){if(element.removeEventListener)
element.removeEventListener("dataavailable",responder,false);else{element.detachEvent("ondataavailable",responder);element.detachEvent("onlosecapture",responder);}}else{var actualEventName=_getDOMEventName(eventName);if(element.removeEventListener)
element.removeEventListener(actualEventName,responder,false);else
element.detachEvent('on'+actualEventName,responder);}
registry.set(eventName,responders.without(responder));return element;}
function fire(element,eventName,memo,bubble){element=$(element);if(Object.isUndefined(bubble))
bubble=true;if(element==document&&document.createEvent&&!element.dispatchEvent)
element=document.documentElement;var event;if(document.createEvent){event=document.createEvent('HTMLEvents');event.initEvent('dataavailable',bubble,true);}else{event=document.createEventObject();event.eventType=bubble?'ondataavailable':'onlosecapture';}
event.eventName=eventName;event.memo=memo||{};if(document.createEvent)
element.dispatchEvent(event);else
element.fireEvent(event.eventType,event);return Event.extend(event);}
Event.Handler=Class.create({initialize:function(element,eventName,selector,callback){this.element=$(element);this.eventName=eventName;this.selector=selector;this.callback=callback;this.handler=this.handleEvent.bind(this);},start:function(){Event.observe(this.element,this.eventName,this.handler);return this;},stop:function(){Event.stopObserving(this.element,this.eventName,this.handler);return this;},handleEvent:function(event){var element=Event.findElement(event,this.selector);if(element)this.callback.call(this.element,event,element);}});function on(element,eventName,selector,callback){element=$(element);if(Object.isFunction(selector)&&Object.isUndefined(callback)){callback=selector,selector=null;}
return new Event.Handler(element,eventName,selector,callback).start();}
Object.extend(Event,Event.Methods);Object.extend(Event,{fire:fire,observe:observe,stopObserving:stopObserving,on:on});Element.addMethods({fire:fire,observe:observe,stopObserving:stopObserving,on:on});Object.extend(document,{fire:fire.methodize(),observe:observe.methodize(),stopObserving:stopObserving.methodize(),on:on.methodize(),loaded:false});if(window.Event)Object.extend(window.Event,Event);else window.Event=Event;})();(function(){var timer;function fireContentLoadedEvent(){if(document.loaded)return;if(timer)window.clearTimeout(timer);document.loaded=true;document.fire('dom:loaded');}
function checkReadyState(){if(document.readyState==='complete'){document.stopObserving('readystatechange',checkReadyState);fireContentLoadedEvent();}}
function pollDoScroll(){try{document.documentElement.doScroll('left');}
catch(e){timer=pollDoScroll.defer();return;}
fireContentLoadedEvent();}
if(document.addEventListener){document.addEventListener('DOMContentLoaded',fireContentLoadedEvent,false);}else{document.observe('readystatechange',checkReadyState);if(window==top)
timer=pollDoScroll.defer();}
Event.observe(window,'load',fireContentLoadedEvent);})();Element.addMethods();Hash.toQueryString=Object.toQueryString;var Toggle={display:Element.toggle};Element.Methods.childOf=Element.Methods.descendantOf;var Insertion={Before:function(element,content){return Element.insert(element,{before:content});},Top:function(element,content){return Element.insert(element,{top:content});},Bottom:function(element,content){return Element.insert(element,{bottom:content});},After:function(element,content){return Element.insert(element,{after:content});}};var $continue=new Error('"throw $continue" is deprecated, use "return" instead');var Position={includeScrollOffsets:false,prepare:function(){this.deltaX=window.pageXOffset||document.documentElement.scrollLeft||document.body.scrollLeft||0;this.deltaY=window.pageYOffset||document.documentElement.scrollTop||document.body.scrollTop||0;},within:function(element,x,y){if(this.includeScrollOffsets)
return this.withinIncludingScrolloffsets(element,x,y);this.xcomp=x;this.ycomp=y;this.offset=Element.cumulativeOffset(element);return(y>=this.offset[1]&&y<this.offset[1]+element.offsetHeight&&x>=this.offset[0]&&x<this.offset[0]+element.offsetWidth);},withinIncludingScrolloffsets:function(element,x,y){var offsetcache=Element.cumulativeScrollOffset(element);this.xcomp=x+offsetcache[0]-this.deltaX;this.ycomp=y+offsetcache[1]-this.deltaY;this.offset=Element.cumulativeOffset(element);return(this.ycomp>=this.offset[1]&&this.ycomp<this.offset[1]+element.offsetHeight&&this.xcomp>=this.offset[0]&&this.xcomp<this.offset[0]+element.offsetWidth);},overlap:function(mode,element){if(!mode)return 0;if(mode=='vertical')
return((this.offset[1]+element.offsetHeight)-this.ycomp)/element.offsetHeight;if(mode=='horizontal')
return((this.offset[0]+element.offsetWidth)-this.xcomp)/element.offsetWidth;},cumulativeOffset:Element.Methods.cumulativeOffset,positionedOffset:Element.Methods.positionedOffset,absolutize:function(element){Position.prepare();return Element.absolutize(element);},relativize:function(element){Position.prepare();return Element.relativize(element);},realOffset:Element.Methods.cumulativeScrollOffset,offsetParent:Element.Methods.getOffsetParent,page:Element.Methods.viewportOffset,clone:function(source,target,options){options=options||{};return Element.clonePosition(target,source,options);}};if(!document.getElementsByClassName)document.getElementsByClassName=function(instanceMethods){function iter(name){return name.blank()?null:"[contains(concat(' ', @class, ' '), ' "+name+" ')]";}
instanceMethods.getElementsByClassName=Prototype.BrowserFeatures.XPath?function(element,className){className=className.toString().strip();var cond=/\s/.test(className)?$w(className).map(iter).join(''):iter(className);return cond?document._getElementsByXPath('.//*'+cond,element):[];}:function(element,className){className=className.toString().strip();var elements=[],classNames=(/\s/.test(className)?$w(className):null);if(!classNames&&!className)return elements;var nodes=$(element).getElementsByTagName('*');className=' '+className+' ';for(var i=0,child,cn;child=nodes[i];i++){if(child.className&&(cn=' '+child.className+' ')&&(cn.include(className)||(classNames&&classNames.all(function(name){return!name.toString().blank()&&cn.include(' '+name+' ');}))))
elements.push(Element.extend(child));}
return elements;};return function(className,parentElement){return $(parentElement||document.body).getElementsByClassName(className);};}(Element.Methods);Element.ClassNames=Class.create();Element.ClassNames.prototype={initialize:function(element){this.element=$(element);},_each:function(iterator){this.element.className.split(/\s+/).select(function(name){return name.length>0;})._each(iterator);},set:function(className){this.element.className=className;},add:function(classNameToAdd){if(this.include(classNameToAdd))return;this.set($A(this).concat(classNameToAdd).join(' '));},remove:function(classNameToRemove){if(!this.include(classNameToRemove))return;this.set($A(this).without(classNameToRemove).join(' '));},toString:function(){return $A(this).join(' ');}};Object.extend(Element.ClassNames.prototype,Enumerable);(function(){window.Selector=Class.create({initialize:function(expression){this.expression=expression.strip();},findElements:function(rootElement){return Prototype.Selector.select(this.expression,rootElement);},match:function(element){return Prototype.Selector.match(element,this.expression);},toString:function(){return this.expression;},inspect:function(){return"#<Selector: "+this.expression+">";}});Object.extend(Selector,{matchElements:function(elements,expression){var match=Prototype.Selector.match,results=[];for(var i=0,length=elements.length;i<length;i++){var element=elements[i];if(match(element,expression)){results.push(Element.extend(element));}}
return results;},findElement:function(elements,expression,index){index=index||0;var matchIndex=0,element;for(var i=0,length=elements.length;i<length;i++){element=elements[i];if(Prototype.Selector.match(element,expression)&&index===matchIndex++){return Element.extend(element);}}},findChildElements:function(element,expressions){var selector=expressions.toArray().join(', ');return Prototype.Selector.select(selector,element||document);}});})();Object.extend(Form,{deselectAll:function(form){var elements=Form.getElements(form);for(var index=0,len=elements.length;index<len;index++){var item=elements[index];if(item.type.toLowerCase()==='checkbox'){var checkboxs=Form.getInputs(item.form,'checkbox',item.name);for(var i=0,len=checkboxs.length;i<len;i++){checkboxs[i].checked=false;}}else if(item.tagName.toLowerCase()==='select'){if(item.type==='select-multiple'){for(var index=0,len=item.options.length;index<len;index++){item.options[index].selected=false;}}}}},deserialize:function(form,data){form=$(form);form.reset();Form.deselectAll(form);var tokens=data.split('&');tokens.each(function(data,index){data=data.split('=');var id=decodeURIComponent(data[0]);var value=decodeURIComponent(data[1]);if(id!=form.id&&value)
Form.Element.deserialize(form,id,value);});},deserializeJSON:function(form,data){form=$(form);form.reset();Form.deselectAll(form);var json=data.evalJSON();for(var i in json){var id=i;var value=json[i];if(id!=form.id&&value)
Form.Element.deserialize(form,id,value);}}});Object.extend(Form.Element,{deserialize:function(form,element,data){var elements=Form.getElements(form);for(var index=0,len=elements.length;index<len;++index){var item=elements[index];if(item.name==element){var method=item.tagName.toLowerCase();Form.Element.Deserializers[method](item,data);break;}}}});Form.Element.Deserializers={input:function(element,data){switch(element.type.toLowerCase()){case'submit':case'hidden':case'password':case'text':return Form.Element.Deserializers.textarea(element,data);case'checkbox':return Form.Element.Deserializers.inputSelector(element,data);case'radio':return Form.Element.Deserializers.radioSelector(element,data);}
return false;},inputSelector:function(element,data){var name=element.name;var checkboxs=Form.getInputs(element.form,'checkbox',element.name);for(var i=0,len=checkboxs.length;i<len;i++){checkboxs[i].checked=true;}},radioSelector:function(element,data){var name=element.name;var radiobuttons=Form.getInputs(element.form,'radio',element.name);for(var i=0,len=radiobuttons.length;i<len;i++){var radiobutton=radiobuttons[i];if(radiobutton.value===data)
radiobutton.checked=true;}},textarea:function(element,data){element.value=data;},select:function(element,data){return Form.Element.Deserializers[element.type==='select-one'?'selectOne':'selectMany'](element,data);},selectOne:function(element,data){element.value=data;},selectMany:function(element,data){if(data instanceof Array){for(var k=0,len=data.length;k<len;k++){for(var i=0,len=element.options.length;i<len;i++){var op=element.options[i];if(op.value===decodeURIComponent(data[k])){op.selected=true;break;}}}}else{for(var i=0,len=element.options.length;i<len;i++){var op=element.options[i];if(op.value===decodeURIComponent(data)){op.selected=true;break;}}}}}
function setReferrerCookie(referrerUrl){var expires=365*1000*60*60*24;var today=new Date();today.setTime(today.getTime());var expiresDate=new Date(today.getTime()+expires);document.cookie="DUMMY_REFERRER="+escape(referrerUrl)+";expires="+expiresDate.toGMTString()+";path=/";}
function changeClass(curr){if(curr==1){className='on';}else{className='off';}
document.getElementById('formholder').className=className;document.getElementById('keywords').focus();}
function MM_findObj(n,d){var p,i,x;if(!d)d=document;if((p=n.indexOf("?"))>0&&parent.frames.length){d=parent.frames[n.substring(p+1)].document;n=n.substring(0,p);}
if(!(x=d[n])&&d.all)x=d.all[n];for(i=0;!x&&i<d.forms.length;i++)x=d.forms[i][n];for(i=0;!x&&d.layers&&i<d.layers.length;i++)x=MM_findObj(n,d.layers[i].document);if(!x&&d.getElementById)x=d.getElementById(n);return x;}
function MM_showHideLayers()
{var i,p,v,obj,args=MM_showHideLayers.arguments;var lastVisibility;for(i=0;i<(args.length-2);i+=3)if((obj=MM_findObj(args[i]))!=null)
{v=args[i+2];if(obj.style)
{obj=obj.style;v=(v=='show')?'visible':(v=='hide')?'hidden':v;}
obj.visibility=v;lastVisibility=v;}
if(lastVisibility=='visible')
{if(document.getElementById('homeSearchPopInput')!=null)
document.getElementById('homeSearchPopInput').focus();}}
function detectFormSubmit(event)
{var keynum
var keychar
var numcheck
if(window.event)
{keynum=event.keyCode}
else if(event.which)
{keynum=event.which}
if(keynum==13)
{document.forms[0].submit();}}
function detectSearchFormBSubmit(event)
{var keynum
var keychar
var numcheck
if(window.event)
{keynum=event.keyCode}
else if(event.which)
{keynum=event.which}
if(keynum==13)
{jsSubmit();}}
function clickclear(thisfield,defaulttext){if(thisfield.value==defaulttext){thisfield.value="";}}
function clickrecall(thisfield,defaulttext){if(thisfield.value==""){thisfield.value=defaulttext;}}
function trim(str)
{while(str.charAt(0)==(" "))
{str=str.substring(1);}
while(str.charAt(str.length-1)==" ")
{str=str.substring(0,str.length-1);}
return str;}
function setPriceRange(){var priceRangeSelection=document.getElementById('pricderange');var selectString=(priceRangeSelection.selectedIndex==-1)?'-':priceRangeSelection.options[priceRangeSelection.selectedIndex].text;if(selectString.indexOf("0")==-1)
{document.getElementById('fromPrice').value=0;document.getElementById('toPrice').value="";}
else if(selectString.indexOf("+")!=-1&&selectString.indexOf("-")==-1)
{var lowerbound=selectString.replace("+","");lowerbound=trim(lowerbound);document.getElementById('fromPrice').value=lowerbound.substring(1);document.getElementById('toPrice').value="";}
else
{var priceValues=selectString.split("-");document.getElementById('fromPrice').value=trim(priceValues[0]).substring(1);document.getElementById('toPrice').value=trim(priceValues[1]).substring(1);}
return;}
function jsSubmitHP(bUS){var bChanged=(defaultSearch!=Form.serialize('yachtsearch'));clearHelpInfo();if(bUS){setPriceRange();}
if(bChanged){var curSearch=Form.serialize('yachtsearch');if(isExist(curSearch)<0){$('searchtype').value='homepage';}
saveSearch(curSearch);}
document.forms[0].submit();}
function searchMorePopup(URL)
{var top=(screen.height-500)/2;var left=(screen.width-650)/2;searchMoreWindow=window.open(URL,'searchMore','titlebar=0,toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=650,height=500,left='+left+',top='+top);searchMoreWindow.focus();}
function checkAll(field)
{for(i=0;i<field.length;i++)
field[i].checked=true;}
function uncheckAll(field)
{for(i=0;i<field.length;i++)
field[i].checked=false;}
function setCookie(name,value,days)
{var today=new Date();today.setTime(today.getTime());if(expires)
{expires=expires*1000*60*60*24;}
var expires_date=new Date(today.getTime()+(expires));document.cookie=name+"="+escape(value)+
((expires)?";expires="+expires_date.toGMTString():"");}
function readCookie(name)
{var cookieValue=null;var allCookies=document.cookie.split(';');for(i=0;i<allCookies.length;i++){var aCookie=allCookies[i].split('=');var aCookieName=aCookie[0].replace(/^\s+|\s+$/g,'');var aCookieValue=unescape(aCookie[1].replace(/^\s+|\s+$/g,''));if(aCookieName==name){cookieValue=aCookieValue;}}
return cookieValue;}
function validateForm(form)
{var checkedCount=0;var checkboxFields=form.checked_boats;for(i=0;i<checkboxFields.length;i++)
{if(checkboxFields[i].checked==true)
{checkedCount++;}}
if(checkedCount==0)
{alert("You must select at least one boat to view.");return false;}
else if(checkedCount>50)
{alert("You may only select a maximum of 50 boats to view.");return false;}
else
{return true;}}
function popup(mylink,windowname)
{if(!window.focus)
{return true;}
var href;if(typeof(mylink)=='string')
{href=mylink;}
else
{href=mylink.href;}
window.open(href,windowname,'width=800,height=800,scrollbars=yes');return false;}
function changeResultsPerPage(count,changeResultCountUrl)
{window.location=changeResultCountUrl+'&No=0'+'&ps='+count;}
function assignError(error)
{document.getElementById("showError").innerHTML="Error: "+error.message;}
function getNewPic(boatPicElt)
{var boatID=boatPicElt.getAttribute('alt');var pictureIdxElt=document.getElementById("pictureIdx"+boatID);var pictureIdx=parseInt(pictureIdxElt.value);var pictureLengthElt=document.getElementById("pictureLength"+boatID);if(pictureLengthElt!=null)
{var pictureLength=parseInt(pictureLengthElt.value);var pictureUrl="";var pictureHeight="120";var pictureWidth="180";if(pictureLength<=1)
{}
else
{if(pictureIdx<pictureLength)
{var pictureUrlElt=document.getElementById("picture_"+boatID+"_"+pictureIdx);pictureUrl=pictureUrlElt.value;var sz=pictureUrlElt.title.split(":");if(sz.length==2){if(sz[0]>0){pictureHeight=sz[0];}
if(sz[1]>0){pictureWidth=sz[1];}}
pictureIdx++;pictureIdxElt.value=pictureIdx;}
else
{pictureIdx=0;var pictureUrlElt=document.getElementById("picture_"+boatID+"_"+pictureIdx);pictureUrl=pictureUrlElt.value;var sz=pictureUrlElt.title.split(":");if(sz.length==2){if(sz[0]>0){pictureHeight=sz[0];}
if(sz[1]>0){pictureWidth=sz[1];}}
pictureIdxElt.value=1;}
boatPicElt.setAttribute("src",pictureUrl);boatPicElt.setAttribute("height",pictureHeight);boatPicElt.setAttribute("width",pictureWidth);}}}
function rotatePics()
{var boatPicArray=document.getElementsByName("boatpic");for(var i=0;i<boatPicArray.length;i++)
{getNewPic(boatPicArray[i]);}
setTimeout("rotatePics();",3000);}
function cm_bwcheck(){this.ver=navigator.appVersion
this.agent=navigator.userAgent.toLowerCase()
this.dom=document.getElementById?1:0
this.ns4=(!this.dom&&document.layers)?1:0;this.op=window.opera
this.moz=(this.agent.indexOf("gecko")>-1||window.sidebar)
this.ie=this.agent.indexOf("msie")>-1&&!this.op
if(this.op){this.op5=(this.agent.indexOf("opera 5")>-1||this.agent.indexOf("opera/5")>-1)
this.op6=(this.agent.indexOf("opera 6")>-1||this.agent.indexOf("opera/6")>-1)
this.op7=this.dom&&!this.op5&&!this.op6}else if(this.moz)this.ns6=1
else if(this.ie){this.ie4=!this.dom&&document.all
this.ie5=(this.agent.indexOf("msie 5")>-1)
this.ie55=(this.ie5&&this.agent.indexOf("msie 5.5")>-1)
this.ie6=this.dom&&!this.ie4&&!this.ie5&&!this.ie55}
this.mac=(this.agent.indexOf("mac")>-1)
this.bw=(this.ie6||this.ie5||this.ie4||this.ns4||this.ns6||this.op5||this.op6||this.op7)
this.usedom=this.ns6||this.op7
this.reuse=this.ie||this.op7||this.usedom
this.px=this.dom&&!this.op5?"px":""
return this}
var bw=new cm_bwcheck()
var cmpage
function cm_message(txt){alert(txt);return false}
function cm_makeObj(obj,nest,o,doc){if(!doc)doc=document
if(bw.usedom&&o)this.evnt=o
else{nest=(!nest)?"doc.":'doc.layers.'+nest+'.'
this.evnt=bw.dom?doc.getElementById(obj):bw.ie4?doc.all[obj]:bw.ns4?eval(nest+"layers."+obj):0;}
if(!this.evnt)return cm_message('The layer does not exist ('+obj+')'
+'- \nIf your using Netscape please check the nesting of your tags (on the entire page)\nNest:'+nest)
this.css=bw.dom||bw.ie4?this.evnt.style:this.evnt;this.ok=0
this.ref=bw.dom||bw.ie4?doc:this.css.document;this.obj=obj+"Object";eval(this.obj+"=this");this.x=0;this.y=0;this.w=0;this.h=0;this.vis=0;return this}
cm_makeObj.prototype.moveIt=function(x,y){this.x=x;this.y=y;this.css.left=x+bw.px;this.css.top=y+bw.px}
cm_makeObj.prototype.showIt=function(o){this.css.visibility="visible";this.vis=1;if(bw.op5&&this.arr){this.arr.showIt();}}
cm_makeObj.prototype.hideIt=function(no){this.css.visibility="hidden";this.vis=0;}
cm_makeObj.prototype.clipTo=function(t,r,b,l,setwidth){this.w=r;this.h=b;if(bw.ns4){this.css.clip.top=t;this.css.clip.right=r;this.css.clip.bottom=b;this.css.clip.left=l}else{if(t<0)t=0;if(r<0)r=0;if(b<0)b=0;if(b<0)b=0;this.css.clip="rect("+t+bw.px+","+r+bw.px+","+b+bw.px+","+l+bw.px+")";if(setwidth){if(bw.op5||bw.op6){this.css.pixelWidth=r;this.css.pixelHeight=b;}else{this.css.width=r+bw.px;this.css.height=b+bw.px;}}}}
function cm_active(on,h){if(this.o.arr)on?this.o.arr.hideIt():bw.op5?this.o.arr.showIt():this.o.arr.css.visibility="inherit"
if(bw.reuse||bw.usedom){if(!this.img2)this.o.evnt.className=on?this.cl2:this.cl
else this.o.ref.images["img"+this.name].src=on?this.img2.src:this.img1.src;if(on&&bw.ns6){this.o.hideIt();this.o.css.visibility='inherit'};}else{if(!this.img2){if(on)this.o.over.showIt();else this.o.over.hideIt();}else this.o.ref.images["img"+this.name].src=on?this.img2.src:this.img1.src;}this.isactive=on?1:0}
function cm_page(frame){if(!frame)frame=self
this.x=0;this.x2=(!bw.ie)?frame.innerWidth:frame.document.body.offsetWidth-20;this.y=0;this.orgy=this.y2=(!bw.ie)?frame.innerHeight:frame.document.body.offsetHeight-6;this.x50=this.x2/2;this.y50=this.y2/2;return this}
function cm_cp(num,w,minus){if(num){if(num.toString().indexOf("%")!=-1){var t=w?cmpage.x2:cmpage.y2;num=parseInt((t*parseFloat(num)/100))
if(minus)num-=minus}else num=eval(num);}else num=0;return num}
function cm_makeLevel(){var c=this,a=arguments;c.width=a[0]||null;c.height=a[1]||null;c.regClass=a[2]||null;c.overClass=a[3]||null;c.borderX=a[4]>-1?a[4]:null;c.borderY=a[5]>-1?a[5]:null;c.borderClass=a[6]||null;c.rows=a[7]>-1?a[7]:null;c.align=a[8]||null;c.offsetX=a[9]||null;c.offsetY=a[10]||null;c.arrow=a[11]||null;c.arrowWidth=a[12]||null;c.arrowHeight=a[13]||null;c.roundBorder=a[14]||null;return c}
function makeCM(name){var c=this;c.mc=0;c.name=name;c.m=new Array();c.scrollY=-1;c.level=new Array();c.l=new Array();c.tim=100;c.isresized=0;c.isover=0;c.zIndex=100;c.frameStartLevel=1;c.bar=0;c.z=0;c.totw=0;c.toth=0;c.maxw=0;c.maxh=0;cmpage=new cm_page();c.constructed=0;return this}
makeCM.prototype.onshow="";makeCM.prototype.onhide="";makeCM.prototype.onconstruct="";function cm_divCreate(id,cl,txt,w,c,app,ex,txt2){if(bw.usedom){var div=document.createElement("DIV");div.className=cl;div.id=id;if(txt)div.innerHTML=txt;if(app){app.appendChild(div);return div}
if(w)document.body.appendChild(div);return div}else{var dstr='<div id="'+id+'" class="'+cl+'"'
if(ex&&bw.reuse)dstr+=" "+ex;dstr+=">"+txt;;if(txt2)dstr+=txt2;if(c)dstr+='</div>';if(w)document.write(dstr);else return dstr}return""}
function cm_getLayerStr(m,app,name,fill,clb,arrow,ah,aw,root){var no=m.nolink,arrstr='',l=m.lev,str='',txt=m.txt,ev='',id=name+'_'+m.name,d1;if(app)d1=app
if((!bw.reuse||l==0)&&!no){ev=' onmouseover="'+name+'.showsub(\''+m.name+'\')"'
+' onmouseout="'+name+'.mout(\''+m.name+'\')"'
+' onclick="'+name+'.onclck(\''+m.name+'\'); return false" '}
if(bw.reuse&&l!=0)txt='';if(l==0)str+=d1=cm_divCreate(id+'_0',clb,'');str+=m.d2=cm_divCreate(id,m.cl,txt,0,0,d1,ev)
if(l==0&&bw.usedom){m.d2.onclick=new Function(name+'.onclck("'+m.name+'")');m.d1=d1;m.d2.onmouseover=new Function(name+'.showsub("'+m.name+'")');m.d2.onmouseout=new Function(name+'.mout("'+m.name+'")')}if(!bw.reuse&&!m.img1&&!no){str+=cm_divCreate(id+'_1',m.cl2,txt,0,1)
str+=cm_divCreate(id+'_3',"clCMAbs",'<a href="#" '+ev+'><img alt="" src="'+root+fill+'" width="'+m.w+'" height="'+m.h+'" border="0" /></a>',0,1)}str+='</div>';if(l==0){if(arrow)str+=m.d3=cm_divCreate(id+'_a','clCMAbs','<img alt="" height="'+aw+'" width="'+ah+'" src="'+root+arrow+'" />',0,1,d1);str+="</div>"}
str+="\n";if(!bw.reuse){m.txt=null;m.d2=null;m.d3=null;}
if(bw.usedom){if(l==0)document.body.appendChild(d1);str=''}
return str}
function cm_checkalign(a){switch(a){case"right":return 1;break;case"left":return 2;break;case"bottom":return 3;break;case"top":return 4;break;case"righttop":return 5;break;case"lefttop":return 6;break;case"bottomleft":return 7;break;case"topleft":return 8;break;}return null}
makeCM.prototype.makeMenu=function(name,parent,txt,lnk,targ,w,h,img1,img2,cl,cl2,align,rows,nolink,onclick,onmouseover,onmouseout){var c=this;if(!name)name=c.name+""+c.mc;var p=parent!=""&&parent&&c.m[parent]?parent:0;if(c.mc==0){if(bw.op7&&this.frames)bw.usedom=0
var tmp=location.href;if(tmp.indexOf('file:')>-1||tmp.charAt(1)==':')c.root=c.offlineRoot;else c.root=c.onlineRoot
if(c.useBar){if(!c.barBorderClass)c.barBorderClass=c.barClass;c.bar1=cm_divCreate(c.name+'bbar_0',c.barClass,'',0,1);c.bar=cm_divCreate(c.name+'bbar',c.barBorderClass,'',1,1,0,0,c.bar1);if(bw.usedom)c.bar.appendChild(c.bar1);}}var create=1,img,arrow;var m=c.m[name]=new Object();m.name=name;m.subs=new Array();m.parent=p;m.arnum=0;m.arr=0
var l=m.lev=p?c.m[p].lev+1:0;c.mc++;m.hide=0;if(l>=c.l.length){var p1,p2=0;if(l>=c.level.length)p1=c.l[c.level.length-1];else p1=c.level[l];c.l[l]=new Array();if(!p2)p2=c.l[l-1]
if(l!=0){if(isNaN(p1.align))p1["align"]=cm_checkalign(p1.align)
for(var i in p1){if(i!="str"&&i!="m"){if(p1[i]==null)c.l[l][i]=p2[i];else c.l[l][i]=p1[i]}}}else{c.l[l]=c.level[0];c.l[l].align=cm_checkalign(c.l[l].align)}
c.l[l]["str"]='';c.l[l].m=new Array();if(!c.l[l].borderClass)c.l[l].borderClass=c.l[l].regClass
c.l[l].app=0;c.l[l].max=0;c.l[l].arnum=0;c.l[l].o=new Array();c.l[l].arr=new Array()
c.level[l]=p1=p2=null
if(l!=0)c.l[l].str=c.l[l].app=cm_divCreate(c.name+'_'+l+'_0',c.l[l].borderClass,'')}if(p){p=c.m[p];p.subs[p.subs.length]=name;if(p.subs.length==1&&c.l[l-1].arrow){p.arr=1;if(p.parent){c.m[p.parent].arnum++
if(c.m[p.parent].arnum>c.l[l-1].arnum){c.l[l-1].str+=c.l[l-1].arr[c.l[l-1].arnum]=cm_divCreate(c.name+'_a'+(l-1)+'_'+c.l[l-1].arnum,'clCMAbs','<img height="'+c.l[l-1].arrowHeight
+'" width="'+c.l[l-1].arrowWidth+'" src="'+c.root+c.l[l-1].arrow+'" alt="" />',0,1,c.l[l-1].app);c.l[l-1].arnum++}}}if(bw.reuse)if(p.subs.length>c.l[l].max)c.l[l].max=p.subs.length;else create=0}m.rows=rows>-1?rows:c.l[l].rows;m.w=cm_cp(w||c.l[l].width,1);m.h=cm_cp(h||c.l[l].height,0);m.txt=txt;m.lnk=lnk;if(align)align=cm_checkalign(align);m.align=align||c.l[l].align;m.cl=cl=cl||c.l[l].regClass;m.targ=targ;m.cl2=cl2||c.l[l].overClass;m.create=create;m.mover=onmouseover;m.mout=onmouseout;m.onclck=onclick;m.active=cm_active;m.isactive=0;m.nolink=nolink
if(create)c.l[l].m[c.l[l].m.length]=name
if(img1){m.img1=new Image();m.img1.src=c.root+img1;if(!img2)img2=img1;m.img2=new Image();m.img2.src=c.root+img2;m.cl="clCMAbs";m.txt='';if(!bw.reuse&&!nolink)m.txt='<a href="#" onmouseover="'+c.name+'.showsub(\''+name+'\')" onmouseout="'+c.name+'.mout(\''+name+'\')" onclick="'+c.name+'.onclck(\''+name+'\'); return false">';;m.txt+='<img alt="" src="'+c.root+img1+'" width="'+m.w+'" height="'+m.h+'" id="img'+m.name+'" '
if(bw.dom&&!nolink)m.txt+='style="cursor:pointer; cursor:hand"';if(!bw.reuse){if(!bw.dom)m.txt+='name="img'+m.name+'"';m.txt+=' border="0"'};m.txt+=' />';if(!bw.reuse&&!nolink)m.txt+='</a>'}else{m.img1=0;m.img2=0};if(l==0||create)c.l[l].str+=cm_getLayerStr(m,c.l[l].app,c.name,c.fillImg,c.l[l].borderClass,c.l[l].arrow,c.l[l].arrowWidth,c.l[l].arrowHeight,c.root)
if(l==0){if(m.w>c.maxw)c.maxw=m.w;if(m.h>c.maxh)c.maxh=m.h;c.totw+=c.pxBetween+m.w+c.l[0].borderX;c.toth+=c.pxBetween+m.h+c.l[0].borderY}
if(lnk&&!onmouseover){var path=lnk.indexOf("mailto:")>-1||lnk.indexOf("http://")>-1?"":c.root
m.mover="self.status='"+path+m.lnk+"'"
if(!m.mout)m.mout="";m.mout+=";self.status='';"}}
makeCM.prototype.getcoords=function(m,bx,by,x,y,maxw,maxh,ox,oy){var a=m.align;x+=m.o.x;y+=m.o.y
switch(a){case 1:x+=m.w+bx;break;case 2:x-=maxw+bx;break;case 3:y+=m.h+by;break;case 4:y-=maxh+by;break;case 5:x-=maxw+bx;y-=maxh-m.h;break;case 6:x+=m.w+bx;y-=maxh-m.h;break;case 7:y+=m.h+by;x-=maxw-m.w;break;case 8:y-=maxh+by;x-=maxw-m.w+bx;break;}
if(m.lev==this.frameStartLevel-1&&this.frames){switch(a){case 1:x=0;break;case 2:x=this.cmpage.x2-maxw;break;case 3:y=0;break;case 4:y-=maxh+by;break;case 5:x-=maxw+bx;y-=maxh-m.h;break;case 6:x+=m.w+bx;y-=maxh-m.h;break;case 7:y+=m.h+by;x-=maxw-m.w;break;case 8:y-=maxh+by;x-=maxw-m.w+bx;break;}}
m.subx=x+ox;m.suby=y+oy}
makeCM.prototype.showsub=function(el){var c=this,pm=c.m[el],m,o,nl
if(!pm.b||(c.isresized&&pm.lev>0))pm.b=c.l[pm.lev].b;c.isover=1
clearTimeout(c.tim);var ln=pm.subs.length,l=pm.lev+1
if(c.l[pm.lev].a==el&&l!=c.l.length&&!c.openOnClick){if(c.l[pm.lev+1].a)c.hidesub(l+1,el);return}
c.hidesub(l,el);if(pm.mover)eval(pm.mover);if(!pm.isactive)pm.active(1);c.l[pm.lev].a=el;if(ln==0)return;if(c.openOnClick&&!c.clicked)return
if(!c.l[l].b)return
var b=c.l[l].b,bx=c.l[l].borderX,by=c.l[l].borderY,rows=pm.rows
var rb=c.l[l].roundBorder;var x=bx+rb,y=by+rb,maxw=0,maxh=0,cn=0;b.hideIt()
for(var i=0;i<c.l[l].m.length;i++){if(!bw.reuse)m=c.m[c.l[l].m[i]]
else m=c.m[c.m[el].subs[i]]
if(m&&m.parent==el&&!m.hide){if(!bw.reuse)o=m.o;else o=m.o=c.l[l].o[i]
if(x!=o.x||y!=o.y)o.moveIt(x,y);nl=m.subs.length
if(bw.reuse){if(o.w!=m.w||o.h!=m.h)o.clipTo(0,m.w,m.h,0,1)
if(o.evnt.className!=m.cl){m.isactive=0;o.evnt.className=m.cl
if(bw.ns6){o.hideIt();o.css.visibility='inherit'}}if(bw.ie6)b.showIt()
o.evnt.innerHTML=m.txt;if(bw.ie6)b.hideIt()
if(!m.nolink){o.evnt.onmouseover=new Function(c.name+".showsub('"+m.name+"')")
o.evnt.onmouseout=new Function(c.name+".mout('"+m.name+"')")
o.evnt.onclick=new Function(c.name+".onclck('"+m.name+"')")
if(o.oldcursor){o.css.cursor=o.oldcursor;o.oldcursor=0;}}else{o.evnt.onmouseover='';o.evnt.onclick='';if(o.css.cursor=='')o.oldcursor=bw.ns6?"pointer":"hand";else o.oldcursor=o.css.cursor;o.css.cursor="auto"}}if(m.arr){o.arr=c.l[l].arr[cn];o.arr.moveIt(x+m.w-c.l[l].arrowWidth-3,y+m.h/2-(c.l[l].arrowHeight/2));o.arr.css.visibility="inherit";cn++;}else o.arr=0
if(!rows){y+=m.h+by;if(m.w>maxw)maxw=m.w;maxh=y}
else{x+=m.w+bx;if(m.h>maxh)maxh=m.h;maxw=x;}
o.css.visibility="inherit";if(bw.op5||bw.op6)o.showIt()}else{o=c.m[c.l[l].m[i]].o;o.hideIt();}}
if(!rows)maxw+=bx*2+rb;else maxh+=by*2+rb;if(rb){maxw+=rb;maxh+=rb}
b.clipTo(0,maxw,maxh,0,1)
if(c.chkscroll)c.chkscroll()
if(c.chkscroll||!pm.subx||!pm.suby||c.scrollY>-1||c.isresized)c.getcoords(pm,c.l[l-1].borderX,c.l[l-1].borderY,pm.b.x,pm.b.y,maxw,maxh,c.l[l-1].offsetX,c.l[l-1].offsetY)
x=pm.subx;if(c.chkscroll&&l==c.frameStartLevel)pm.suby+=c.scrollY;y=pm.suby;b.moveIt(x,y);if(c.onshow)eval(c.onshow);b.showIt()}
makeCM.prototype.hidesub=function(l,el){var c=this,tmp,m,i,j,hide
if(!l){l=1;hide=1;c.clicked=0}
for(i=l-1;i<c.l.length;i++){if(i>0&&i>l-1)if(c.l[i].b)c.l[i].b.hideIt()
if(c.l[i].a&&c.l[i].a!=el){m=c.m[c.l[i].a];m.active(0,1);if(m.mout)eval(m.mout);c.l[i].a=0
if(i>0&&i>l-1)if(bw.op5||bw.op6)for(j=0;j<c.l[i].m.length;j++)c.m[c.l[i].m[j]].o.hideIt()}if(i>l){for(j=0;j<c.l[i-1].arnum;j++){c.l[i-1].arr[j].hideIt();if(bw.op6)c.l[i-1].arr[j].moveIt(-1000,-1000)}}}if(hide&&c.onhide)eval(c.onhide)}
makeCM.prototype.makeObjects=function(nowrite,fromframe){var c=this,oc,name,bx,by,w,h,l,no,ar,id,nest,st=0,en=c.l.length,bobj,o,m,i,j
if(fromframe){st=this.frameStartLevel
this.body=fromframe.document.body
this.doc=fromframe.document
this.deftarget=fromframe
this.cmpage=new cm_page(fromframe)}else{this.body=document.body
this.doc=document
if(this.frames)en=this.frameStartLevel
this.deftarget=self}
if(!nowrite){for(i=st;i<en;i++){if(!bw.usedom)this.doc.write(c.l[i].str)
else if(i>0)this.body.appendChild(c.l[i].app)
if(!this.frames)c.l[i].str=null}}c.z=c.zIndex+2
for(i=st;i<en;i++){oc=0
if(i!=0){bobj=c.l[i].b=new cm_makeObj(c.name+"_"+i+"_0","",c.l[i].app,this.doc);bobj.css.zIndex=c.z;if(bw.dom)bobj.css.overflow='hidden'};bx=c.l[i].borderX;by=c.l[i].borderY;c.l[i].max=0;for(j=0;j<c.l[i].m.length;j++){m=c.m[c.l[i].m[j]];name=m.name;w=m.w;h=m.h;l=m.lev;no=m.nolink;if(i>0){m.b=bobj;nest=i}
else{m.b=new cm_makeObj(c.name+"_"+name+"_0","",m.d1,this.doc);m.b.css.zIndex=c.z;m.b.clipTo(0,w+bx*2,h+by*2,0,1);nest=name}
id=c.name+"_"+name;nest=c.name+"_"+nest;if(m.create){o=m.o=new cm_makeObj(id,nest+"_0",m.d2,this.doc);o.z=o.css.zIndex=c.z+1;if(bw.reuse){c.l[l].o[oc]=o;oc++};if(l==0&&m.img1)o.css.visibility='inherit';if(bw.op5)o.showIt();o.arr=0;}if(!bw.reuse||l==0)o.clipTo(0,w,h,0,1);o.moveIt(bx,by);o.z=o.css.zIndex=c.z+2
if(j<c.l[i].arnum){c.l[i].arr[j]=new cm_makeObj(c.name+"_a"+i+"_"+j,nest+"_0",nowrite?0:c.l[i].arr[j],this.doc)
c.l[i].arr[j].css.zIndex=c.z+30+j;}else if(l==0&&m.arr==1){o.arr=new cm_makeObj(id+"_a",nest+"_0",m.d3,this.doc)
o.arr.moveIt(bx+m.w-c.l[i].arrowWidth-3,by+m.h/2-(c.l[i].arrowHeight/2));o.arr.css.zIndex=c.z+20;}if(!no&&!bw.reuse&&!m.img1){o.over=new cm_makeObj(c.name+"_"+name+"_1",nest+"_0"+".document.layers."+id,"",this.doc)
o.over.moveIt(0,0);o.over.hideIt();o.over.clipTo(0,w,h,0,1);o.over.css.zIndex=c.z+3
img=new cm_makeObj(c.name+"_"+name+"_3",nest+"_0"+".document.layers."+id,"",this.doc);img.moveIt(0,0)
img.css.visibility="inherit";img.css.zIndex=c.z+4;if(bw.op5)img.showIt()}c.z++;}}
if(fromframe){c.chkscroll=function(){if(bw.ie&&!bw.ie6)this.scrollY=this.body.scrollTop;else if(bw.ie6||bw.op7){if(this.doc.compatMode&&document.compatMode!="BackCompat")this.scrollY=this.doc.documentElement.scrollTop
else this.scrollY=this.body.scrollTop}else this.scrollY=this.deftarget.pageYOffset;}}}
makeCM.prototype.mout=function(){var c=this;clearTimeout(c.tim);c.isover=0;var f="if(!"+c.name+".isover)"+c.name+".hidesub()"
if(!c.closeOnClick)c.tim=setTimeout(f,c.wait)
else{if(bw.ns4){document.captureEvents("Event.MOUSEDOWN");document.onmousedown=new Function(f)}
else document.onclick=new Function(f);if(this.frames){if(bw.ns4){this.doc.captureEvents("Event.MOUSEDOWN");this.doc.onmousedown=new Function(f)}
else this.doc.onclick=new Function(f)}}}
makeCM.prototype.construct=function(nowrite){var c=this;if(!c.l[0]||c.l[0].m.length==0)return cm_message('No menus defined');if(!nowrite){for(var i=1;i<c.l.length;i++){c.l[i].str+="</div>"}}
c.makeObjects(nowrite);cmpage=new cm_page();var mpa,o,maxw=c.maxw,maxh=c.maxh,i,totw=c.totw,toth=c.toth,m,px=c.pxBetween
var bx=c.l[0].borderX,by=c.l[0].borderY,x=c.fromLeft,y=c.fromTop,mp=c.menuPlacement,rows=c.rows
if(rows){toth=maxh+by*2;totw=totw-px+bx;}else{totw=maxw+bx*2;toth=toth-px+by;}
switch(mp){case"center":x=cmpage.x2/2-totw/2;if(bw.ns4)x-=9;break;case"right":x=cmpage.x2-totw;break;case"bottom":case"bottomcenter":y=cmpage.y2-toth;if(mp=="bottomcenter")x=cmpage.x2/2-totw/2;break;default:if(mp.toString().indexOf(",")>-1)mpa=1;break;}for(var i=0;i<c.l[0].m.length;i++){m=c.m[c.l[0].m[i]];o=m.b;if(mpa)rows?x=cm_cp(mp[i]):y=cm_cp(mp[i],0,0,1);o.moveIt(x,y);o.showIt();if(m.arr)m.o.arr.showIt();o.oy=y;if(!mpa)rows?x+=m.w+px+bx:y+=m.h+px+by}if(c.useBar==1){var bbx=c.barBorderX,bby=c.barBorderY;var bar1=c.bar1=new cm_makeObj(c.name+'bbar_0',c.name+'bbar',nowrite?0:c.bar1,document)
var bar=c.bar=new cm_makeObj(c.name+'bbar','',nowrite?0:c.bar,document);bar.css.zIndex=c.zIndex+1
var barx=c.barX=="menu"?c.m[c.l[0].m[0]].b.x-bbx:cm_cp(c.barX,1);var bary=c.barY=="menu"?c.m[c.l[0].m[0]].b.y-bby:cm_cp(c.barY);var barw=c.barWidth=="menu"?totw:cm_cp(c.barWidth,1,bbx*2);var barh=c.barHeight=="menu"?toth:cm_cp(c.barHeight,0,bby*2);bar1.clipTo(0,barw,barh,0,1);bar1.moveIt(bbx,bby);bar1.showIt();bar.clipTo(0,barw+bbx*2,barh+bby*2,0,1);bar.moveIt(barx,bary);bar.showIt();}if(c.resizeCheck){if(bw.ns4||bw.op5||bw.op6)setTimeout('window.onresize=new Function("'+c.name+'.resized()")',500)
else window.onresize=new Function(c.name+".resized()")
c.resized=cm_resized;if(bw.op5||bw.op6)document.onmousemove=new Function(c.name+".resized()")}if(c.onconstruct)eval(c.onconstruct)
c.constructed=1
return true}
var cm_inresize=0
function cm_resized(){if(cm_inresize)return
page2=new cm_page();var off=(bw.op6||bw.op5)?20:5
if(page2.x2<cmpage.x2-off||page2.y2<cmpage.orgy-off||page2.x2>cmpage.x2+off||page2.y2>cmpage.orgy+off){if(bw.ie||bw.ns6||bw.op7||bw.ns4){cmpage=page2;this.isresized=1;if(this.onresize)eval(this.onresize);this.construct(1);if(this.onafterresize)eval(this.onafterresize);}else{cm_inresize=1;location.reload()}}}
makeCM.prototype.onclck=function(m){m=this.m[m]
if(m.onclck)eval(m.onclck);if(this.openOnClick&&m.subs.length>0){this.clicked=1;this.showsub(m.name);return}
var lnk=m.lnk,targ=m.targ
if(lnk){if(lnk.indexOf("mailto")!=0&&lnk.indexOf("http")!=0)lnk=this.root+lnk
if(String(targ)=="undefined"||targ==""||targ==0||targ=="_self"){if(this.frames){if(this.l[0].a){this.m[this.l[0].a].active(0,1)
this.l[0].a=0}
for(i=this.frameStartLevel;i<this.l.length;i++){if(this.l[i].b){this.l[i].b.hideIt()
this.l[i].b=null
for(j=0;j<this.l[i].m.length;j++){this.m[this.l[i].m[j]].b=null;}}}
this.isover=0}
this.deftarget.location.href=lnk;setReferrerCookie(".yachtworld.");}
else if(targ=="_blank"){window.open(lnk);setReferrerCookie(".yachtworld.");}
else if(targ=="_top"||targ=="window"){top.location.href=lnk;setReferrerCookie(".yachtworld.");}
else if(top[targ]){top[targ].location.href=lnk;setReferrerCookie(".yachtworld.");}
else if(parent[targ]){parent[targ].location.href=lnk;setReferrerCookie(".yachtworld.");}}else return false}
function doClear(theText)
{if(theText.value==theText.defaultValue)
{theText.value=""}}
function CreateBookmarkLink(title){var url="http://"+document.domain;if(window.sidebar){window.sidebar.addPanel(title,url,"");}else if(window.external){window.external.AddFavorite(url,title);}
else if(window.opera&&window.print){return true;}}
var SAVED_SEARCH_COOKIE="savedSearch";var LATEST_SAVED_SEARCHES="latestSavedSearches";var SAVED_SEARCH_PREFIX_ID=SAVED_SEARCH_COOKIE;var SEPERATOR='_';var LIVE_TIME=365;var HISTORY_LENGTH=5;var MAX_SEARCHES_LENGTH=(1+SEPERATOR.length)*HISTORY_LENGTH;var SAVED_LABEL_COOKIE="savedLabel";function populateSavedSearchOptions(selectId){var haveHistory=false;var searches=getLatestSearches();for(var i=0;i<HISTORY_LENGTH;i++){if(searches==null||searches.length<2)
break;if(searches.length>2*i){var curSearchIndex=searches.charAt(2*i);if(null!=getLabel(curSearchIndex)){document.getElementById(selectId).options[i]=new Option(getLabel(curSearchIndex),curSearchIndex);haveHistory=true;}}else{break;}}
return haveHistory;}
function loadForm(formId,options,selectedIdx){var index=selectedIdx;Form.deserialize(formId,getSavedSearchByIndex(options[index].value));options[index].selected=true;var pbsint=$('select-pbsint');var bas=$('select-boatsAddedSelected');if(pbsint!=null&&bas!=null){if(bas.value!=-1&&bas.value!='')
pbsint.options[1+1*bas.value].selected=true;}}
function loadFormForHP(formId,options,selectedIdx){var curSearch=getSavedSearchByIndex(options[selectedIdx].value);if(curSearch!=null&&curSearch.indexOf('searchtype=advancedsearch')>-1){changeLatestId(options[selectedIdx].value);document.location='/core/listing/advancedSearch.jsp';return;}else{loadForm(formId,options,selectedIdx);}}
function addSelectOption(options,label){var length=options.length;options[length]=new Option(label,length);options.selectedIndex=length;options[length].style.display='none';}
function getLatestHPSearch(){var searches=getLatestSearches();for(var i=0;i<HISTORY_LENGTH;i++){if(searches==null||searches.length<2)
break;if(searches.length>2*i){var curSearchIndex=searches.charAt(2*i);if(isAdvSearch(getSavedSearchByIndex(curSearchIndex)))
continue;else
return i;}else{break;}}
return-1;}
function isAdvSearch(curSearch){if(curSearch!=null&&curSearch.indexOf('searchtype=advancedsearch')>0){return true;}else{return false;}}
function getLabel(index){return readCookie(SAVED_LABEL_COOKIE+index);}
function getLabelBySearch(searchString){var length=null;var man=null;var is=null;var year=null;var pricderange=null;var priceRangeAdv=null;var luom=null;var ntt=null;var type=null;var cint=null;var hmid=null;var ftid=null;var rid=null;var enid=null;var spid=null;var boatsAddedSelected=null;var city=null;var fracts=null;var video=null;var searchtypeAdv=false;var tokens=searchString.split('&');tokens.each(function(data,index){data=data.split('=');var id=decodeURIComponent(data[0]);var value=decodeURIComponent(data[1]);if(value==null||value==''){}
else if(id=='searchtype'&&value=='advancedsearch'){searchtypeAdv=true;}else if(id=='fromLength')
length=value;else if(id=='toLength')
length+='-'+value;else if(id=='luom'){if(value=='127')luom='m';else
luom='ft';}
else if(id=='man')
man=value;else if(id=='is'){if(value=='true')is=$('select-is-new').firstChild.nodeValue;else if(value=='false')is=$('select-is-used').firstChild.nodeValue;}else if(id=='fromYear')
year=value;else if(id=='toYear')
year+='-'+value;else if(id=='pricderange'&&value!=0&&value!='Select Price Range'){pricderange=value;}else if(id=='fromPrice')
priceRangeAdv=value;else if(id=='toPrice')
priceRangeAdv+='-'+value;else if(id=='currencyid'&&value&&priceRangeAdv){priceRangeAdv+=' '+getSelectOptionLabel('select-'+id,value);}
else if(id=='Ntt')
ntt=value;else if(id=='type'){if($('select-type-sail')!=null&&$('select-type-sail').firstChild!=null){if('(Sail)'==value)
type=$('select-type-sail').firstChild.nodeValue;else if('(Power)'==value)
type=$('select-type-power').firstChild.nodeValue;}else if($('select-type')!=null){type=getSelectOptionLabel('select-'+id,value);if(type!=null)type=type.replace('+','');}}else if(id=='cint')
cint=getSelectOptionLabel('select-'+id,value);else if(id=='hmid'&&value!='0')
hmid=getSelectOptionLabel('select-'+id,value);else if(id=='ftid'&&value!='0')
ftid=getSelectOptionLabel('select-'+id,value);else if(id=='rid')
rid=getSelectOptionLabel('select-'+id,value);else if(id=='enid'&&value!='0')
enid=getSelectOptionLabel('select-'+id,value);else if(id=='spid')
spid=getSelectOptionLabel('select-'+id,value);else if(id=='boatsAddedSelected'&&value!=-1&&value!=''&&$('select-pbsint')!=null){boatsAddedSelected=$('select-pbsint').options[1+1*value].text;}else if(id=='city')
city=value;else if(id=='fracts'&&value==1){fracts=$('select-fracts-non').value;}else if(id=='video'&&value=='true'){video=$('select-video').value;}})
if(priceRangeAdv==0&&!searchtypeAdv){priceRangeAdv=null;}
var ret=labelAppend(length==null?null:length+' '+luom)+labelAppend(man)+labelAppend(is)+labelAppend(year)+labelAppend(pricderange==null?priceRangeAdv:pricderange)+labelAppend(ntt)+labelAppend(type)+labelAppend(cint)+labelAppend(hmid)+labelAppend(ftid)+labelAppend(rid)+labelAppend(enid)+labelAppend(spid)+labelAppend(boatsAddedSelected)+labelAppend(city)+labelAppend(fracts)+labelAppend(video);if(ret.charAt(ret.length-1)==','){ret=ret.substring(0,ret.length-1);}
return ret;}
function getSelectOptionLabel(selectId,value){var ret='';var select=$(selectId);if(select=='undefined'||select==null){}else if(select.options!=null&&select.options.length>0){for(var j=0;j<select.options.length;j++){if(select.options[j].value==value){ret=select.options[j].text;break;}}}
return ret;}
function labelAppend(field){return field?field+',':'';}
function saveSearch(curSearch){if(curSearch==null)
return false;else{if(null==saveLabel(getOldestId(),curSearch))
return false;else
return putSearch(getOldestId(),curSearch);}}
function saveLabel(index,curSearch){var label=getLabelBySearch(curSearch);if((label==null)||(label.length==0))
return null;else{label=label.replace(/^\s*/,'').replace(/\s*$/,'').replace(/\r*$/,'');if((label=='0')||(label.length==0))
return null;}
createCookie(SAVED_LABEL_COOKIE+index,label,LIVE_TIME);return label;}
function getOldestId(){if(getLatestSearchId()==null)
return 0;var searches=getLatestSearches();if(searches==null||searches.length<2)
return 0;if(searches.length<MAX_SEARCHES_LENGTH){for(var i=0;i<HISTORY_LENGTH;i++){if(searches.indexOf(i+SEPERATOR)<0)
break;}
return(1*i)%HISTORY_LENGTH;}else{return searches.charAt(MAX_SEARCHES_LENGTH-2);}}
function getLatestSearch(){return getSavedSearchByIndex(getLatestSearchId());}
function getLatestSearchId(){var ck=readCookie(LATEST_SAVED_SEARCHES);if(ck!=null&&ck.length>0)
return ck.charAt(0);return null;}
function putSearch(id,curSearch){var existingId=isExist(curSearch);if(existingId>-1){changeLatestId(existingId);return false;}
createCookie(SAVED_SEARCH_PREFIX_ID+id,curSearch,LIVE_TIME);addIdToLatestList(id);return true;}
function changeLatestId(id){var newValue=getLatestSearches();newValue=newValue.replace(id+SEPERATOR,'');newValue=id+SEPERATOR+newValue;createCookie(LATEST_SAVED_SEARCHES,newValue,LIVE_TIME);}
function addIdToLatestList(id){var newValue=id+SEPERATOR+(getLatestSearches()==null?'':getLatestSearches());if(newValue.length>MAX_SEARCHES_LENGTH){newValue=newValue.substring(0,MAX_SEARCHES_LENGTH);}
createCookie(LATEST_SAVED_SEARCHES,newValue,LIVE_TIME);}
function getLatestSearches(){return readCookie(LATEST_SAVED_SEARCHES);}
function getSavedSearchByIndex(index){if(index==null)
return null;else
return readCookie(SAVED_SEARCH_PREFIX_ID+index);}
function isExist(testSearch){for(var i=0;i<HISTORY_LENGTH;i++){if(testSearch==getSavedSearchByIndex(i)){return i;}}
return-1;}
function serialize(formId){var elements=$(formId).getElements();var matchingElements=[];for(i=0;i<elements.length;i++){var element=elements[i];if(element.type=='button'||element.type=='submit'||element.type=='hidden')
continue;if(element.type=='text'||element.type=='select-one'||element.type=='select-multiple'){if(''==element.value)
continue;}
matchingElements.push(element);}
return Form.serializeElements(matchingElements);}
function createCookie(name,value,days){if(days){var date=new Date();date.setTime(date.getTime()+(days*24*60*60*1000));var expires="; expires="+date.toGMTString();}
else var expires="";document.cookie=name+"="+escape(value)+expires+"; path=/;domain="+window.location.hostname;}
function readCookie(name){var nameEQ=name+"=";var ca=document.cookie.split(';');for(var i=0;i<ca.length;i++){var c=ca[i];while(c.charAt(0)==' ')c=c.substring(1,c.length);if(c.indexOf(nameEQ)==0)return unescape(c.substring(nameEQ.length,c.length));}
return null;}
function eraseCookie(name){createCookie(name,"",-1);}
function clearAdvForm(formId){with(document.forms[formId]){elements['searchtype'].value='advancedsearch';elements['Ntt'].value='';elements['is'].value='';elements['type'].value='';elements['man'].value='';elements['hmid'].value='';elements['ftid'].value='';elements['enid'].value='';elements['fromLength'].value='';elements['toLength'].value='';elements['fromYear'].value='';elements['toYear'].value='';elements['fromPrice'].value='';elements['toPrice'].value='';elements['city'].value='';elements['spid'].value='';elements['rid'].value='';elements['cint'].value='';elements['pbsint'].value='';elements['boatsAddedSelected'].value='';elements['fracts'].checked=false;elements['video'].checked=false;}
return Form.serialize('AdvancedSearchForm');}
var ContactSeller=function(){var muted=false;var cookiePrefix="ContactSellerForm";var cookieStorePeriod=90;var url;var fields;var postParams;var domElements;var statsCallback;var statsCallbackInititalData;return{init:function(ajaxUrl,extraPostParams,formFields,domElementsMap){url=ajaxUrl;postParams=extraPostParams;fields=formFields;domElements=domElementsMap;polpulateFormFieldsWithCookieData();},registerStatsTrackingCallback:function(callback,inititalData){statsCallback=callback;statsCallbackInititalData=inititalData;},submit:function(){if(!muted){tryToSubmitForm();}}}
function tryToSubmitForm(){muted=true;saveFormDataInCookies();if(checkValidity()){submitForm();}
muted=false;}
function submitForm(){fadeFields();showDomElements(domElements.showAfterValidation);hideDomElements(domElements.hideAfterValidation)
for(var key in fields)postParams[key]=fields[key].value;new Ajax.Request(url,{parameters:postParams,onSuccess:function(transport){var response=transport.responseText.evalJSON();if('OK'==response.result){if(response.boatEmailId){doStatsCallback(fields.email.value,response.boatEmailId);}
hideDomElements(domElements.hideAfterResponse);showDomElements(domElements.showOnSuccess);}else{hideDomElements(domElements.hideAfterResponse);showDomElements(domElements.showOnFailure);}},onFailure:function(){hideDomElements(domElements.hideAfterResponse);showDomElements(domElements.showOnFailure);}});}
function saveFormDataInCookies(){createCookie(cookiePrefix+"Name",fields.name.value,cookieStorePeriod);createCookie(cookiePrefix+"Email",fields.email.value,cookieStorePeriod);createCookie(cookiePrefix+"Bizphone",fields.bizphone.value,cookieStorePeriod);}
function polpulateFormFieldsWithCookieData(){if(null!=readCookie(cookiePrefix+"Name")&&fields.name)fields.name.value=readCookie(cookiePrefix+"Name");if(null!=readCookie(cookiePrefix+"Email")&&fields.email)fields.email.value=readCookie(cookiePrefix+"Email");if(null!=readCookie(cookiePrefix+"Bizphone")&&fields.bizphone)fields.bizphone.value=readCookie(cookiePrefix+"Bizphone");if(fields.name.value=="")fields.name.value=postParams['watermark_name'];if(fields.bizphone.value=="")fields.bizphone.value=postParams['watermark_phone'];if(fields.email.value=="")fields.email.value=postParams['watermark_email'];if(fields.message.value=="")fields.message.value=postParams['watermark_message'];}
function checkValidity(){var valid=true;hideErrors();if(!isNotEmpty(fields.name.value)||(fields.name.value==postParams['watermark_name']))
{flashError(fields.name);valid=false;}
if(!isEmail(fields.email.value)){flashError(fields.email);valid=false;}
if(!isNotEmpty(fields.message.value)||(fields.message.value==postParams['watermark_message'])){flashError(fields.message);valid=false;}
if(valid==true&&fields.bizphone.value==postParams['watermark_phone']){fields.bizphone.value='';}
return valid;}
function doStatsCallback(email,boatEmailId){if(statsCallback){statsCallbackInititalData['email']=email;statsCallbackInititalData['boatEmailId']=boatEmailId;statsCallback(statsCallbackInititalData);}}
function hideErrors(){for(var key in fields)hideError(fields[key]);}
function fadeFields(){for(var key in fields)fields[key].setStyle({'color':'rgb(222, 222, 222)'});}
function showDomElements(elements){for(var i=0;i<elements.inline.length;i++)elements.inline[i].style.display='inline';for(i=0;i<elements.block.length;i++)elements.block[i].style.display='block';}
function hideDomElements(elements){for(var i=0;i<elements.length;i++)elements[i].style.display='none';}
function flashError(formElement){formElement.up().down('span.error').style.display='inline';}
function hideError(formElement){formElement.up().down('span.error').style.display='none';}
function isNotEmpty(value){return''!=value.replace(/^\s+|\s+$/,'');}
function isEmail(value){return value.match(/^[A-Za-z0-9\._\-+]+@[A-Za-z0-9_\-+]+(\.[A-Za-z0-9_\-+]+)+$/);}};var FeaturedBoatPopover=function(){var popoverOffsetX=90;var popoverOffsetY=-35;var popoverVerticalShiftExtraOffset=-190;var showDelay=0.3;var hideDelay=0.1;var hoveredElement;var featuredBoatPopover;var boatData;var hideDelayId;var showDelayId;var cursorInHoveredElement=false;var cursorInFeaturedBoatPopover=false;return{init:function(offsetX,offsetY,delayShow,delayHide){popoverOffsetX=offsetX;popoverOffsetY=offsetY;showDelay=delayShow;hideDelay=delayHide;},initNewPopover:function(element,data){if(hoveredElement!==$(element)){destroyPopover();boatData=data;hoveredElement=$(element);cursorInHoveredElement=true;hoveredElement.observe('mouseover',function(){cursorInHoveredElement=true;});hoveredElement.observe('mouseout',function(){cursorInHoveredElement=false;hideDelayId=tryToHidePopover.delay(hideDelay);});showDelayId=showPopover.delay(showDelay);}}}
function needToShiftPopoverVertically(){return 0>document.viewport.getHeight()+document.viewport.getScrollOffsets().top-$(hoveredElement).cumulativeOffset()[1]-300;}
function showPopover(){if(cursorInHoveredElement){featuredBoatPopover=buildPopover(needToShiftPopoverVertically());featuredBoatPopover.observe('mouseover',function(){cursorInFeaturedBoatPopover=true;});featuredBoatPopover.observe('mouseout',function(){cursorInFeaturedBoatPopover=false;hideDelayId=tryToHidePopover.delay(hideDelay);});$$('body')[0].insert(featuredBoatPopover);}}
function buildPopover(shiftVertically){popoverElement=new Element('div',{'class':'previewThumb-content'});popoverElement.setStyle({left:$(hoveredElement).cumulativeOffset()[0]+popoverOffsetX+'px',top:$(hoveredElement).cumulativeOffset()[1]+popoverOffsetY+(shiftVertically?popoverVerticalShiftExtraOffset:0)+'px'});popoverElement.innerHTML=''
+'<div class="beaker"'+(shiftVertically?'style="top: 220px"':'')+'></div>'
+'<div id="previewDetails" class="clearfix">'
+' <div class="brief">'
+'  <a href="'+boatData.boatLink+'" >'
+'   <img src="'+boatData.boatImage+'" width="250" />'
+'   <span class="makeModel">'+boatData.boatTitle+'</span>'
+'  </a>'
+'  <div class="price">'+boatData.boatPrice+'</div>'
+' </div>'
+' <div class="details">'
+'  <div class="location">'+boatData.boatLocation+'</div>'
+'  <div class="featuredBroker"><a href="'+boatData.sellerLink+'" >'+boatData.sellerTitle+'</a></div>'
+' </div>'
+' <a href="'+boatData.boatLink+'" class="more" >See More</a>'
+'</div>';return popoverElement;}
function tryToHidePopover(){if(!cursorInHoveredElement&&!cursorInFeaturedBoatPopover){destroyPopover();}}
function destroyPopover(){if(typeof hideDelayId!=="undefined"){window.clearTimeout(hideDelayId);}
if(typeof showDelayId!=="undefined"){window.clearTimeout(showDelayId);}
if(typeof hoveredElement!=="undefined"){hoveredElement.stopObserving('mouseover');hoveredElement.stopObserving('mouseout');hoveredElement=undefined;}
if(typeof featuredBoatPopover!=="undefined"){featuredBoatPopover.remove();featuredBoatPopover=undefined;}}};function removeParameterFromUrl(parameter){var url=location.href;switch(parameter){case"fromLength":url=url.replace(new RegExp("\\bfromLength=[^&;]+[&;]?","gi"),"");url=url.replace(new RegExp("\\btoLength=[^&;]+[&;]?","gi"),"");break;case"fromYear":url=url.replace(new RegExp("\\bfromYear=[^&;]+[&;]?","gi"),"");url=url.replace(new RegExp("\\btoYear=[^&;]+[&;]?","gi"),"");break;case"fromPrice":url=url.replace(new RegExp("\\bfromPrice=[^&;]+[&;]?","gi"),"");url=url.replace(new RegExp("\\btoPrice=[^&;]+[&;]?","gi"),"");url=url.replace(new RegExp("\\bpricderange=[^&;]+[&;]?","gi"),"");break;default:url=url.replace(new RegExp("\\b"+parameter+"=[^&;]+[&;]?","gi"),"");}
url=url.replace(/[&;]$/,"");location.href=url;}
var dmm=dmm||{}
dmm.setImgRatio=(function(){function checkRatio($el){var ra=[3,2],toRatio=false;$el.css({'width':'auto','height':'auto'});if(($el.width()/$el.height())<([ra[0]/ra[1]])){toRatio='thin';}else if(($el.width()/$el.height())>([ra[0]/ra[1]])){toRatio='short';}
$el.removeAttr('style');return toRatio;}
function setStyle($el){$el.addClass(checkRatio($el))
$el.animate({opacity:1},200);}
return function($el){$el.on('load',function(){setStyle($el);});if($el[0].complete){setStyle($el);}}}());document.observe('dom:loaded',function(){$$('.brokerPhoto').each(function(element){$(element).observe('contextmenu',function(event){event.stop();});});});var dummyCookieName="DUMMY_REFERRER";var foundDummyCookie=false;var cookieName="HTTP_REFERRER";var referrerUrl=document.referrer;if(referrerUrl!=null){referrerUrl=referrerUrl.toLowerCase();}
var selfDomain=".yachtworld.";var foundCookie=false;var allCookies=document.cookie.split(';');for(i=0;i<allCookies.length;i++){var aCookie=allCookies[i].split('=');var aCookieName=aCookie[0].replace(/^\s+|\s+$/g,'');if(aCookieName==cookieName){foundCookie=true;}
if(aCookieName==dummyCookieName){foundDummyCookie=true;}}
if(foundDummyCookie){document.cookie=dummyCookieName+"="+";path=/"+";expires=Thu, 01-Jan-1970 00:00:01 GMT";}
if(!foundDummyCookie&&foundCookie&&(referrerUrl==null||referrerUrl.length==0)){document.cookie=cookieName+"="+";path=/"+";expires=Thu, 01-Jan-1970 00:00:01 GMT";}
if(referrerUrl!=null&&referrerUrl.length>0&&referrerUrl.indexOf(selfDomain)<0){var expires=365*1000*60*60*24;var today=new Date();today.setTime(today.getTime());var expiresDate=new Date(today.getTime()+expires);document.cookie=cookieName+"="+escape(referrerUrl)+";expires="+expiresDate.toGMTString()+";path=/";}
var dmm=dmm||{};dmm.Cookies={getItem:function(sKey){if(!sKey){return null;}
return decodeURIComponent(document.cookie.replace(new RegExp("(?:(?:^|.*;)\\s*"+encodeURIComponent(sKey).replace(/[\-\.\+\*]/g,"\\$&")+"\\s*\\=\\s*([^;]*).*$)|^.*$"),"$1"))||null;},setItem:function(sKey,sValue,vEnd,sPath,sDomain,bSecure){if(!sKey||/^(?:expires|max\-age|path|domain|secure)$/i.test(sKey)){return false;}
var sExpires="";if(vEnd){switch(vEnd.constructor){case Number:sExpires=vEnd===Infinity?"; expires=Fri, 31 Dec 9999 23:59:59 GMT":"; max-age="+vEnd;break;case String:sExpires="; expires="+vEnd;break;case Date:sExpires="; expires="+vEnd.toUTCString();break;}}
document.cookie=encodeURIComponent(sKey)+"="+encodeURIComponent(sValue)+sExpires+(sDomain?"; domain="+sDomain:"")+(sPath?"; path="+sPath:"")+(bSecure?"; secure":"");return true;},removeItem:function(sKey,sPath,sDomain){if(!this.hasItem(sKey)){return false;}
document.cookie=encodeURIComponent(sKey)+"=; expires=Thu, 01 Jan 1970 00:00:00 GMT"+(sDomain?"; domain="+sDomain:"")+(sPath?"; path="+sPath:"");return true;},hasItem:function(sKey){if(!sKey){return false;}
return(new RegExp("(?:^|;\\s*)"+encodeURIComponent(sKey).replace(/[\-\.\+\*]/g,"\\$&")+"\\s*\\=")).test(document.cookie);},keys:function(){var aKeys=document.cookie.replace(/((?:^|\s*;)[^\=]+)(?=;|$)|^\s*|\s*(?:\=[^;]*)?(?:\1|$)/g,"").split(/\s*(?:\=[^;]*)?;\s*/);for(var nLen=aKeys.length,nIdx=0;nIdx<nLen;nIdx++){aKeys[nIdx]=decodeURIComponent(aKeys[nIdx]);}
return aKeys;}};(function(){if(window.google&&google.gears){return;}
var factory=null;if(typeof(GearsFactory)!='undefined'){factory=new GearsFactory();}else{try{factory=new ActiveXObject('Gears.Factory');if(factory.getBuildInfo().indexOf('ie_mobile')!=-1){factory.privateSetGlobalObject(this);}}catch(e){if((typeof(navigator.mimeTypes)!='undefined')&&navigator.mimeTypes["application/x-googlegears"]){factory=document.createElement("object");factory.style.display="none";factory.width=0;factory.height=0;factory.type="application/x-googlegears";document.documentElement.appendChild(factory);if(factory&&(typeof(factory.create)=='undefined')){factory=null;}}}}if(!factory){return;}
if(!window.google){google={};}
if(!google.gears){google.gears={factory:factory};}})();var bb_success;var bb_error;var bb_blackberryTimeout_id=-1;function handleBlackBerryLocationTimeout(){if(bb_blackberryTimeout_id!=-1){bb_error({message:"Timeout error",code:3})}}
function handleBlackBerryLocation(){clearTimeout(bb_blackberryTimeout_id);bb_blackberryTimeout_id=-1;if(bb_success&&bb_error){if(blackberry.location.latitude==0&&blackberry.location.longitude==0){bb_error({message:"Position unavailable",code:2})}else{var a=null;if(blackberry.location.timestamp){a=new Date(blackberry.location.timestamp)}
bb_success({timestamp:a,coords:{latitude:blackberry.location.latitude,longitude:blackberry.location.longitude}})}
bb_success=null;bb_error=null}}
var geo_position_js=function(){var b={};var c=null;var a="undefined";b.getCurrentPosition=function(f,d,e){c.getCurrentPosition(f,d,e)};b.init=function(){try{if(typeof(geo_position_js_simulator)!=a){c=geo_position_js_simulator}else{if(typeof(bondi)!=a&&typeof(bondi.geolocation)!=a){c=bondi.geolocation}else{if(typeof(navigator.geolocation)!=a){c=navigator.geolocation;b.getCurrentPosition=function(h,e,g){function f(i){if(typeof(i.latitude)!=a){h({timestamp:i.timestamp,coords:{latitude:i.latitude,longitude:i.longitude}})}else{h(i)}}
c.getCurrentPosition(f,e,g)}}else{if(typeof(window.blackberry)!=a&&blackberry.location.GPSSupported){if(typeof(blackberry.location.setAidMode)==a){return false}
blackberry.location.setAidMode(2);b.getCurrentPosition=function(g,e,f){bb_success=g;bb_error=e;if(f.timeout){bb_blackberryTimeout_id=setTimeout("handleBlackBerryLocationTimeout()",f.timeout)}else{bb_blackberryTimeout_id=setTimeout("handleBlackBerryLocationTimeout()",60000)}
blackberry.location.onLocationUpdate("handleBlackBerryLocation()");blackberry.location.refreshLocation()};c=blackberry.location}else{if(typeof(window.google)!=a&&typeof(google.gears)!=a){c=google.gears.factory.create("beta.geolocation")}else{if(typeof(Mojo)!=a&&typeof(Mojo.Service.Request)!="Mojo.Service.Request"){c=true;b.getCurrentPosition=function(g,e,f){parameters={};if(f){if(f.enableHighAccuracy&&f.enableHighAccuracy==true){parameters.accuracy=1}
if(f.maximumAge){parameters.maximumAge=f.maximumAge}
if(f.responseTime){if(f.responseTime<5){parameters.responseTime=1}else{if(f.responseTime<20){parameters.responseTime=2}else{parameters.timeout=3}}}}
r=new Mojo.Service.Request("palm://com.palm.location",{method:"getCurrentPosition",parameters:parameters,onSuccess:function(h){g({timestamp:h.timestamp,coords:{latitude:h.latitude,longitude:h.longitude,heading:h.heading}})},onFailure:function(h){if(h.errorCode==1){e({code:3,message:"Timeout"})}else{if(h.errorCode==2){e({code:2,message:"Position Unavailable"})}else{e({code:0,message:"Unknown Error: webOS-code"+errorCode})}}}})}}else{if(typeof(device)!=a&&typeof(device.getServiceObject)!=a){c=device.getServiceObject("Service.Location","ILocation");b.getCurrentPosition=function(g,e,f){function i(l,k,j){if(k==4){e({message:"Position unavailable",code:2})}else{g({timestamp:null,coords:{latitude:j.ReturnValue.Latitude,longitude:j.ReturnValue.Longitude,altitude:j.ReturnValue.Altitude,heading:j.ReturnValue.Heading}})}}
var h=new Object();h.LocationInformationClass="BasicLocationInformation";c.ILocation.GetLocation(h,i)}}}}}}}}}catch(d){if(typeof(console)!=a){console.log(d)}
return false}
return c!=null};return b}();var dmm=dmm||{};dmm.Geo=(function(){var _successHandler,_errorHandler;var _opts={enableHighAccuracy:true};function setSuccess(success){_successHandler=success;}
function setError(error){_errorHandler=error;}
function _geoSuccess(p){var _location={latitude:p.coords.latitude,longitude:p.coords.longitude};dmm.Cookies.setItem('dmm-location',JSON.stringify(_location),null,'/');_successHandler(_location.latitude,_location.longitude);}
function _geoError(p){_errorHandler();}
return{getCoordinates:function(successCallback,errorCallback){setSuccess(successCallback);setError(errorCallback);if(!dmm.Cookies.hasItem('dmm-location')){if(geo_position_js.init()){geo_position_js.getCurrentPosition(_geoSuccess,_geoError,_opts);}}else{var _location=JSON.parse(dmm.Cookies.getItem('dmm-location'));_successHandler(_location.latitude,_location.longitude);}}}}());