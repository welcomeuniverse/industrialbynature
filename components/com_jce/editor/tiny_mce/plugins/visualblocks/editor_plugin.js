/* JCE Editor - 2.5.27 | 22 September 2016 | http://www.joomlacontenteditor.net | Copyright (C) 2006 - 2016 Ryan Demmer. All rights reserved | © Copyright, Moxiecode Systems AB | http://www.tinymce.com/license */
(function(){var cookie=tinymce.util.Cookie;tinymce.create('tinymce.plugins.VisualBlocks',{init:function(ed,url){var cssId;if(!window.NodeList){return;}
var state=cookie.get('wf_visualblocks_state');if(state&&tinymce.is(state,'string')){if(state=='null'){state=0;}
state=parseFloat(state);}
state=ed.getParam('visualblocks_default_state',state);function toggleVisualBlocks(){var dom=ed.dom,linkElm;if(!cssId){cssId=dom.uniqueId();linkElm=dom.create('link',{id:cssId,rel:'stylesheet',href:url+'/css/visualblocks.css'});ed.getDoc().getElementsByTagName('head')[0].appendChild(linkElm);}else{linkElm=dom.get(cssId);linkElm.disabled=!linkElm.disabled;}
ed.controlManager.setActive('visualblocks',!linkElm.disabled);if(linkElm.disabled){cookie.set('wf_visualblocks_state',0);}else{cookie.set('wf_visualblocks_state',1);}}
ed.addCommand('mceVisualBlocks',function(){toggleVisualBlocks();});ed.onSetContent.add(function(){var dom=ed.dom,linkElm;if(cssId){linkElm=dom.get(cssId);ed.controlManager.setActive('visualblocks',!linkElm.disabled);}});ed.addButton('visualblocks',{title:'visualblocks.desc',cmd:'mceVisualBlocks'});ed.onInit.add(function(){if(state){toggleVisualBlocks();}});},getInfo:function(){return{longname:'Visual blocks',author:'Moxiecode Systems AB',authorurl:'http://tinymce.moxiecode.com',infourl:'http://wiki.moxiecode.com/index.php/TinyMCE:Plugins/visualblocks',version:tinymce.majorVersion+"."+tinymce.minorVersion};}});tinymce.PluginManager.add('visualblocks',tinymce.plugins.VisualBlocks);})();