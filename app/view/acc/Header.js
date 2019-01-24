Ext.define('Siace.view.access.Header',{extend:'Ext.toolbar.Toolbar',alias:'widget.acc_header',height:45,width:'100%',defaults:{margin:'-5 0 0 0'},margin:'-1 0 0 0',items:[
{xtype:'image',id:'ah_imgUnieje_logo',itemId:'ah_imgUnieje_logo',height:45,padding:'0 0 0 0',src:'resources/images/logo_letizia.jpg',width:43},
{xtype:'container',layout:'vbox',style:'background-color:#FFFFFF;',width:5,items:[
	{xtype:'label',html:'<div class="titleHeader" style="font-size:12px;">&nbsp;</div>',padding:'0 0 0 0'},
	{xtype:'label',html:'<div class="subtitleHeader">&nbsp;</div>'},
	{xtype:'label',html:'<div class="subtitleHeader" style="height:15px;">&nbsp;</div>'}
]},
{xtype:'container',layout:'vbox',style:'background-color:#FFFFFF;',width:300,items:[
	{xtype:'displayfield',id:'ah_lblUnieje_nombre',itemId:'ah_lblUnieje_nombre',fieldCls:'title_unieje',margin:'5 0 0 0',value:'Sin Registro de Sesión'},
	{xtype:'displayfield',margin:'-6 0 -6 0',fieldCls:'title_area',value:'Acceso Virtual Proveedores'},
	{xtype:'label',html:'<div class="subtitleHeader" style="color:#0000A0;">Letizia v10.0.1</div>'},
]},
{xtype:'container',	flex:1,layout:{type:'vbox',align:'right',},margin:'0 0 0 0', style: 'background-color:#FFFFFF;',items: [
	{xtype:'label',id:'ah_lblDate_server',itemId:'lblDate_server',margin:'0 2 0 0', style:'font-family:arial,Tahoma,verdana;font-size:11px;text-align:right;',text:'',width:'100%'},
	{xtype:'label',html:'<div class="lbl0003" style="height:7px;">&nbsp;</div>', },
	{xtype:'container',layout:{type:'hbox',align:'right',},style:'background-color:#FFFFFF;',items:[{xtype:'hiddenfield',id:'ah_txtPerssess_key'},{xtype:'hiddenfield',id:'ah_txtPersacce_key'},{xtype:'hiddenfield',id:'ah_txtPers_key'},{xtype:'hiddenfield',id:'ah_txtUnieje_key'},
		{xtype:'displayfield',id:'ah_lblData_pers',margin:'0 2 0 0',value:'',fieldCls:'df00101',style:'font-family:arial,Tahoma,verdana;font-size:10px;text-align:right;'},
		{xtype:'displayfield',margin:'0 2 0 0',value:'&nbsp; &nbsp;',style:'font-family:arial,Tahoma,verdana;text-align:right;'},
		{xtype:'button',id:'ah_btnKeyGo',text:'Iniciar Sesión',height:21,iconCls:'icon_KeyGo_90',padding:'1 2 1 3'},
		{xtype:'button',id:'ah_btnLogout',text:'Cerrar Sesión',height:21,hidden:true,iconCls:'icon_Logout_90',padding:'1 2 1 3'}
	]}
]}
]});