Ext.define('Siace.view.log.PedidosBrow',{extend:'Siace.view.PanelBrowse',alias:'widget.log_pedbrow',layout:{type:'hbox'},items:[
{xtype:'panel',itemId:'panLP',layout:{type:'fit'},height:'100%',width:'50%',items:[
	{xtype:'comp_grid',itemId:'grdLP',viewConfig:{getRowClass:function(rec,rowI,rowP,str){return rec.data.coti_key==""?"mx-letra-rojo-negro":"mx-letra-azul";}},
	 columns:[{xtype:'rownumberer',width:30},{dataIndex:'ped_documento',text:'Registro',width:70},{dataIndex:'ped_fecha',text:'Fecha',align:'center',renderer:Ext.util.Format.dateRenderer('d/m/Y'),sortable:true,width:85},
		{dataIndex:'tipped_abrev',text:'Tipo',width:60},{dataIndex:'pedweb_fechafin',text:'Vigencia',align:'center',lockable:false,renderer:Ext.util.Format.dateRenderer('d/m/Y'),sortable:true,width:85},
		{dataIndex:'area_abrev',text:'U.O.',width:60},{dataIndex:'tarea_codigo',text:'Tarea',align:'center',width:70},
	]}
 ],
 dockedItems:[
	{xtype:'comp_tooltop',items:[{xtype:'comppub_year_code',hidden:true},{xtype:'complog_tipped_abrev'},{xtype:'comp_nrotop',itemId:'ped_nro'},{xtype:'comp_fechaini'},{xtype:'comp_fechafin'},{xtype:'comppub_area_abrev'},{xtype:'compbud_secfunc_code'}]},
	{xtype:'toolbar',dock:'bottom',ui:'footer',items:[{xtype:"comp_btn",itemId:"btnEttr",disabled:true,iconCls:"icon_Invoice",text:"E.T. / T.R."},{xtype:"comp_btnAttach",text:"Adjuntos"},{xtype:'comp_btn',itemId:'btnSolicitud',disabled:true,icon:'resources/icons/btnPdf.gif',text:'Solicitud'},{xtype:'comp_btn',itemId:'btnCotiza',disabled:true,hidden:true,iconCls:'icon_Invoice',text:'Registrar Cotización'}]},
	{xtype:'comp_pag',itemId:'pagLP'}
]},
{xtype:'panel',border:false,height:'100%',width:'1%'},
{xtype:'tabpanel',itemId:'tab01',height:'100%',plain:true,width:'49%',items:[
	{xtype:'panel',itemId:'tabLPD',height:'100%',layout:{type:'fit'},title:'Detalle',items:[{xtype:'comp_grid',itemId:'grdLPD',columns:[{xtype:'rownumberer',width:30},{dataIndex:'bs_codigo',text:'Código',width:105},{dataIndex:'bs_nombre',text:'Descripción',width:300},{dataIndex:'unimed_nombre',text:'U.M.',width:100},{dataIndex:'peddet_cantid',text:'Cantidad',align:'right',renderer:Ext.util.Format.numberRenderer('000,000,000.000'),width:85}]}],
	 dockedItems:[
	 	{xtype:'form',border:false,width:'100%',items:[{xtype:'comp_tooltop',defaults:{labelWidth:65},layout:'vbox',items:[
			{xtype:'container',layout:'hbox',width:'100%',items:[{xtype:'comp_dato',name:'ped_documento',fieldLabel:'Registro',labelWidth:65,width:160},{xtype:'comp_datofecha',name:'ped_fecha',fieldLabel:'Fecha',labelWidth:35}]},
			{xtype:'comp_dato',name:'area_nombre',fieldLabel:'U. Orgánica'},{xtype:'comp_dato',name:'secfunc_codename',fieldLabel:'Sec. Func.'},{xtype:'comp_dato',name:'tarea_codename',fieldLabel:'Tarea Func.'},{xtype:'comp_dato',name:'fuefin_codename',fieldLabel:'Rubro'},{xtype:'comp_dato',name:'tiprecur_codename',fieldLabel:'T. Recurso'}
		]}]},{xtype:'comp_pag',itemId:'pagLPD',disabled:true}
	]}
]}]
});