Ext.define('Siace.view.WindowOk',{extend:'Ext.window.Window',alias:'widget.windowok',autoScroll:true,closable:false,layout:{type:'fit'},modal:true,resizable:false,
buttons:{buttonAlign:'left',items:[{xtype:'comp_btnNew',hidden:true},{xtype:'comp_btnAccept',text:'Aceptar',formBind:true,iconCls:'icon_KeyGo'},{xtype:'comp_btnCancel'},{xtype:'comp_btnPrinter',disabled:false,hidden:true},{xtype:'comp_btnExit',disabled:false,hidden:true}]},
__menuId:'',__callButton:null,__callKey:'',__callStore:null,__callWindow:null,__typeEdit:'',
setMenuId:function(pcMenuId){this.__menuId=pcMenuId;},getMenuId:function(){return this.__menuId;},
setCallButton:function(pcCallBtn){this.__callButton=pcCallBtn;},getCallButton:function(){return this.__callButton;},
setCallKey:function(pcCallKey){this.__callKey=pcCallKey;},getCallKey:function(){return this.__callKey;},
setCallStore:function(pcCallStr){this.__callStore=pcCallStr;},getCallStore:function(){return this.__callStore;},
setCallWin:function(pcCallWin){this.__callWin=pcCallWin;},getCallWin:function(){return this.__callWin;},
setTypeEdit:function(pcTE){this.__typeEdit=pcTE;},getTypeEdit:function(){return this.__typeEdit;}
});