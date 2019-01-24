Ext.define('Siace.view.acc.Login',{extend:'Ext.window.Window',alias:'widget.acc_login',closable:false,closeAction:'destroy',iconCls:'icon_KeyGo',layout:{type:'fit'},modal:true,resizable:false,width:230,title:'Control Acceso Proveedores',items:[
{xtype:'form',bodyPadding:8,frame:false,defaults:{anchor:'100%',labelWidth:50},items:[{xtype:'hiddenfield',itemId:'PERS_RUC'},
	{xtype:'comp_txt',itemId:'pers_ruc',fieldLabel:'R.U.C.',allowBlank:false,minLength:11,maxLength:11},
	{xtype:'comp_cbo',itemId:'unieje_key',valueField:'unieje_key',displayField:'unieje_abrev',fieldLabel:'Ejecutora',disabled:true,tpl:'<tpl for="."><div class="x-boundlist-item">{unieje_abrev}&nbsp;</div></tpl>',width:70},
	{xtype:'comp_txt',itemId:'persacce_login',fieldLabel:'Login',allowBlank:false,enableKeyEvents:true,minLength:5,maxLength:15}, // , vtype: 'alphanum'
	{xtype:'comp_txt',itemId:'persacce_psw1',id:'persacce_psw1',fieldLabel:'Clave',allowBlank:false,enableKeyEvents:true,inputType:'password',minLength:8,maxLength:15}
],
dockedItems:[{xtype:'toolbar',dock:'bottom',items:[{xtype:'tbfill'},{xtype:'comp_btnAccept',iconCls:'icon_Key',text:'Iniciar Sesión',formBind:true},{xtype:'comp_btnCancel'}]}]}]
});