Ext.define("Siace.controller.acc.Menus",{extend:"Ext.app.Controller",stores:["Menus"],views:["acc.MenuAccordion","acc.MenuItem"],
init:function(application){this.control({
"acc_header":{render:this.ah_Render},"acc_header #ah_btnKeyGo":{click:this.ah_btnKeyGoClick},"acc_header #ah_btnLogout":{click:this.ah_btnLogoutClick},
"acc_menuaccordion":{render:this.ama_Render},"acc_menuitem":{itemclick:this.ami_Click},

});},
ah_Render:function(abstcomp,opt){},
ah_btnKeyGoClick:function(btn,e,opt){var _win=Ext.create("Siace.view.acc.Login"); _win.show();},
ah_btnLogoutClick:function(btn,e,opt){
	Ext.Ajax.request({url:"php/logout.php",
		success:function(conn,resp,opt,eOpts){btn.up("acc_mainviewport").destroy(); window.location.reload();},
		failure:function(conn,resp,opt,eOpts){Siace.util.Util.showErrorMsg(conn.responseText);}
	});
},
ama_Render:function(abstcomp,opt){
	this.getMenusStore().load(function(rec,opt,succ){var _menuPanel=Ext.ComponentQuery.query("acc_menuaccordion")[0];
		Ext.each(rec,function(root){var _menu=Ext.create("Siace.view.acc.MenuItem",{title:root.get("menu_nombre"),iconCls:root.get("menu_icon")}); var _submenu=""; var _menu_id="";
			Ext.each(root.items().data.items,function(item){
				if(item.data.menu_par==_menu_id){_submenu.appendChild({className:(item.get("menu_leaf")=="1"?item.get("menu_xtype"):""),controll:item.get("menu_controller"),id:item.get("menu_id"),leaf:true,text:item.get("submenu_nombre")});}
				else{_submenu=_menu.getRootNode().appendChild({className:(item.get("menu_leaf")=="1"?item.get("menu_xtype"):""),controll:item.get("menu_controller"),iconCls:item.get("menu_css"),id:item.get("menu_id"),leaf:(item.get("menu_leaf")=="1"?true:false),text: item.get("submenu_nombre")}); _menu_id=item.data.menu_id;}
			});
			_menuPanel.add(_menu);
		});
	});	
},
ami_Click:function(view,rec,item,index,event,opt){if(!rec.raw.leaf){return false;} var _mp=view.up("viewport").down("acc_mainpanel"); //this.getMainPanel();
	if(fjsIn_array(rec.data.id,["5931","5932"])){var _controller=this.getController("Siace.controller.pub.Personas_AccesosEditPsw"); var _win=Ext.create("Siace.view.pub.Personas_AccesosEditPsw"); _win.setMenuId(rec.data.id); _win.show();}
	else{var _newTab=_mp.items.findBy(function(tabb){return tabb.__menuId==rec.get("id");});
		if(!_newTab){Ext.util.Format.thousandSeparator=",";Ext.util.Format.decimalSeparator=".";Ext.util.Format.currencySign="";
	    	Siace.app.getController(rec.raw.controll); _newTab=_mp.add({xtype:rec.raw.className,closable:true,title:rec.get("text")}); _newTab.setMenuId(rec.data.id);
		}
	}
	_mp.setActiveTab(_newTab);
},
am_AddMenu:function(){var _str=Ext.create("Siace.store.pub.MenusProveedores");
	_str.load({params:{xxType_record:"menu_proveedores",xxType_query:"menu_proveedores"},
		callback:function(rec,opr,succ){var _menuPanel=Ext.ComponentQuery.query("acc_menuaccordion")[0];
			Ext.each(rec,function(root){var _menu=Ext.create("Siace.view.acc.MenuItem",{title:translations[root.get("menu_name")],iconCls:root.get("menu_icon")}); var _submenu=""; var _menu_id="";
				Ext.each(root.items().data.items, function(item){
					if(item.data.menu_par==_menu_id){_submenu.appendChild({className:(item.get("menu_leaf")=="1"?item.get("menu_xtype"):""),id:item.get("menu_id"),leaf:true,text:translations[item.get("submenu_name")]});}
					else{_submenu=_menu.getRootNode().appendChild({className:(item.get("menu_leaf")==1?item.get("menu_xtype"):""),iconCls:item.get("menu_css"),id:item.get("menu_id"),leaf:(item.get("menu_leaf")==1?true:false),text:translations[item.get("submenu_name")]}); _menu_id=item.data.menu_id;}
				});
				_menuPanel.add(_menu); 
			});
		}
	});
},
am_AddPedidos:function(poComp){var _mainPanel=poComp.down("acc_mainpanel"); Ext.util.Format.thousandSeparator=",";Ext.util.Format.decimalSeparator=".";Ext.util.Format.currencySign="";
	Siace.app.getController("Siace.controller.log.PedidosBrow");
	_newTab=_mainPanel.add({xtype:"log_pedbrow",closable:true,title:"Requerimientos en Línea"}); _newTab.setMenuId(""); _mainPanel.setActiveTab(_newTab);
}
});