Ext.define('Siace.controller.acc.Translation',{extend:'Ext.app.Controller',views:['acc.Translation'],refs:[{ref:'translation',selector:'acc_translation'}],
init:function(application){this.control({
'acc_translation':{beforerender:this.t_buttonSplitBeforeRender},'acc_translation menuitem':{click:this.t_menuItemClick}
});},
t_menuItemClick: function(item,e,opt){var _menu=this.getTranslation();_menu.setIconCls(item.iconCls); _menu.setText(item.text);
	localStorage.setItem('user-lang',item.iconCls.substr(5)); window.location.reload();
},
t_buttonSplitBeforeRender:function(abstcomp,opt){var _lang=(localStorage?(localStorage.getItem('user-lang')||'es'):'es');
	abstcomp.iconCls='icon_'+_lang;
	if(_lang=='en'){abstcomp.text='English';}else if(_lang=='es'){abstcomp.text='Español';}else{abstcomp.text='Português';}
}
});