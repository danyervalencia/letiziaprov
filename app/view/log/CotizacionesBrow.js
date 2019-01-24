Ext.define("Siace.view.log.CotizacionesBrow",{extend:"Siace.view.PanelBrowse",alias:"widget.log_cotibrow",layout:{type:"hbox"},items:[
{xtype:"panel",itemId:"panLC",layout:{type:"fit"},height:"100%",width:"57%",items:[
	{xtype:"comp_grid",itemId:"grdLC",viewConfig:{getRowClass:function(rec,rowI,rowP,str){return (rec.data.coti_flga==98?'mx-letra-rojo-bold':(rec.data.coti_monto*1==rec.data.bp_monto*1?'mx-letra-azul':(rec.data.bp_monto*1>0?'mx-letra-azul-bold':'mx-letra-negro')));}},
	 columns:[{xtype:"rownumberer",width:30},{dataIndex:"coti_documento",text:"Número",width:80},{dataIndex:"coti_fecha",text:"Fecha",align:"center",width:80,renderer:Ext.util.Format.dateRenderer("d/m/Y")},{dataIndex:"bp_fecha",text:"Buena Pro",align:"center",width:80,renderer:Ext.util.Format.dateRenderer("d/m/Y")},
		{dataIndex:"area_abrev",text:"U.O.",width:60},{dataIndex:"tarea_codigo",text:"Tarea",align:"center",width:70},{dataIndex:"fftr_codigo",text:"Rb-TR",width:45},{dataIndex:"coti_plazo",text:"PE",align:"right",tooltip:" Plazo Entrega ",width:45},{dataIndex:"lugentr_nombre",text:"Lugar Entrega",width:120},
		{dataIndex:"coti_monto",text:"Importe",align:"right",renderer:Ext.util.Format.numberRenderer("000,000,000.00"),width:90},{dataIndex:"ped_documento",text:"Requerimiento",width:70},
	]}
 ],
 dockedItems:[{xtype:"comp_cboopc"},
	{xtype:"comp_tooltop",items:[{xtype:"comppub_year_codeab"},{xtype:"comp_nrotop",itemId:"coti_nro",enableKeyEvents:true},{xtype:"comp_fechaini"},{xtype:"comp_fechafin"},{xtype:"comppub_area_abrev"},{xtype:"compbud_secfunc_code"}]},
	{xtype:"toolbar",dock:"bottom",ui:"footer",items:[{xtype:"comp_btnAnnular"},{xtype:"comp_btnPrinter"},{xtype:"comp_btnPdf",itemId:"btnCCP",disabled:true,text:"Cuadro Comparativo"},{xtype:"comp_btnExcel",itemId:"btnCCE",disabled:true,text:"Cuadro Comparativo"}]},{xtype:"comp_pag",itemId:"pagLC"}
 ]
},
{xtype:"panel",border:false,height:"100%",width:"1%"},
{xtype:"tabpanel",itemId:"tab01",height:"100%",plain:true,width:"42%",items:[
	{xtype:"panel",itemId:"tabLCD",height:"100%",layout:{type:"fit"},title:"Detalle",items:[
		{xtype:"comp_grid",itemId:"grdLCD",columns:[{xtype:"rownumberer",width:30},{dataIndex:"bs_codigo",text:"Código",width:105},{dataIndex:"bs_nombre",text:"Descripción",width:300},{dataIndex:"unimed_nombre",text:"U.M.",width:100},
			{dataIndex:"cotidet_cantid",text:"Cantidad",align:"right",renderer:Ext.util.Format.numberRenderer("000,000,000.000"),width:90},{dataIndex:"cotidet_preuni",text:"P.U.",align:"right",renderer:Ext.util.Format.numberRenderer("000,000,000.000000"),width:90},{dataIndex:"cotidet_pretot",text:"Importe",align:"right",renderer:Ext.util.Format.numberRenderer("000,000,000.00"),width:90},
			{dataIndex:"cotidet_marca",text:"Marca",width:100},{dataIndex:"cotidet_modelo",text:"Modelo",width:100},{dataIndex:"espedet_codigo",text:"Clasificador",width:95},
		]}
	 ],
	 dockedItems:[{xtype:"comp_cboopc"},
	 	{xtype:"form",border:false,width:"100%",items:[{xtype:"comp_tooltop",defaults:{labelWidth:65},layout:"vbox",items:[
			{xtype:"container",layout:"hbox",width:"100%",items:[{xtype:"comp_dato",name:"coti_documento",fieldLabel:"Documento",labelWidth:65,width:160},{xtype:"comp_datofecha",name:"coti_fecha",fieldLabel:"Fecha",labelWidth:35,width:140},{xtype:"comp_datomonto",name:"coti_monto",fieldLabel:"Importe",labelWidth:45}]},
			{xtype:"comp_dato",name:"area_nombre",fieldLabel:"U. Orgánica"},{xtype:"comp_dato",name:"secfunc_codename",fieldLabel:"Sec. Func."},{xtype:"comp_dato",name:"tarea_codename",fieldLabel:"Tarea Func."},{xtype:"comp_dato",name:"fuefin_codename",fieldLabel:"Rubro"},{xtype:"comp_dato",name:"tiprecur_codename",fieldLabel:"T. Recurso"}
		]}]},{xtype:"comp_pag",itemId:"pagLCD",disabled:true}
	]}
]}]
});