Ext.define("Siace.view.log.OrdenesBrow",{extend:"Siace.view.PanelBrowse",alias:"widget.log_ordenbrow",layout:{type:"hbox"},items:[
{xtype:"panel",itemId:"panLO",layout:{type:"fit"},height:"100%",width:"62%",items:[
	{xtype:"comp_grid",itemId:"grdLO",viewConfig:{getRowClass:function(rec,rowI,rowP,str){return rec.data.orden_flga==98?"mx-letra-rojo":(rec.data.expe_nro*1>0?"mx-letra-negro":"mx-letra-verde");}},
	 columns:[{xtype:"rownumberer",width:30},
		{dataIndex:"orden_documento",text:"Número",width:80},{dataIndex:"orden_fecha",text:"Fecha",align:"center",width:80,renderer:Ext.util.Format.dateRenderer("d/m/Y")},{dataIndex:"tiporden_code",text:"Proc",tooltip:" Procedencia ",width:40},{dataIndex:"orden_fechanotif",text:"Notificación",align:"center",width:80,renderer:Ext.util.Format.dateRenderer("d/m/Y")},
		{dataIndex:"area_abrev",text:"U.O.",tooltip:" Unidad Orgánica ",width:60},{dataIndex:"tarea_codigo",text:"Tarea",align:"center",width:70},{dataIndex:"fftr_codigo",text:"Rb-TR",width:45},
		{dataIndex:"lugentr_nombre",text:"Lugar Entrega",width:100},{dataIndex:"expe_nro",text:"SIAF",align:"right",width:70},
		{dataIndex:"orden_monto",text:"Importe",align:"right",renderer:Ext.util.Format.numberRenderer("000,000,000.00"),width:90},{dataIndex:"orden_percep",text:"Percep.",align:"right",renderer:Ext.util.Format.numberRenderer("000,000.00"),width:70}
	]}
 ],
 dockedItems:[{xtype:"comp_cboopc"},
	{xtype:"comp_tooltop",items:[{xtype:"comppub_year_codeab"},{xtype:"comppub_doc_abrevab",store:"array.DocOrdenAB"},{xtype:"comp_nrotop",itemId:"orden_nro",enableKeyEvents:true},{xtype:"comp_fechaini"},{xtype:"comp_fechafin"},{xtype:"comppub_area_abrev"},{xtype:"compbud_secfunc_code"}]},
	{xtype:"toolbar",dock:"bottom",ui:"footer",items:[{xtype:"comp_btnPrinter"},{xtype:"comp_btnFases",text:"Fases SIAF"}]},{xtype:"comp_pag",itemId:"pagLO"}
 ]
},
{xtype:"panel",border:false,height:"100%",width:"1%"},
{xtype:"tabpanel",itemId:"tab01",height:"100%",plain:true,width:"37%",items:[
	{xtype:"panel",itemId:"tabLOD",height:"100%",layout:{type:"fit"},title:"Detalle",items:[
		{xtype:"comp_grid",itemId:"grdLOD",columns:[{xtype:"rownumberer",width:30},
			{dataIndex:"bs_codigo",text:"Código",width:105},{dataIndex:"bs_nombre",text:"Descripción",width:300},{dataIndex:"unimed_nombre",text:"U.M.",width:100},
			{dataIndex:"ordendet_cantid",text:"Cantidad",align:"right",renderer:Ext.util.Format.numberRenderer("000,000,000.000"),width:90},{dataIndex:"ordendet_preuni",text:"P.U.",align:"right",renderer:Ext.util.Format.numberRenderer("000,000,000.000000"),width:90},{dataIndex:"ordendet_pretot",text:"Importe",align:"right",renderer:Ext.util.Format.numberRenderer("000,000,000.00"),width:90},
			{dataIndex:"espedet_codigo",text:"Clasificador",width:95},
		]}
	 ],
	 dockedItems:[{xtype:"comp_cboopc"},
	 	{xtype:"form",border:false,width:"100%",items:[{xtype:"comp_tooltop",defaults:{labelWidth:65},layout:"vbox",items:[
			{xtype:"container",layout:"hbox",width:"100%",items:[{xtype:"comp_dato",name:"orden_documento",fieldLabel:"Documento",labelWidth:65,width:160},{xtype:"comp_datofecha",name:"orden_fecha",fieldLabel:"Fecha",labelWidth:35,width:140},{xtype:"comp_datomonto",name:"orden_monto",fieldLabel:"Importe",labelWidth:45}]},
			{xtype:"comp_dato",name:"area_nombre",fieldLabel:"U. Orgánica"},{xtype:"comp_dato",name:"secfunc_codename",fieldLabel:"Sec. Func."},{xtype:"comp_dato",name:"tarea_codename",fieldLabel:"Tarea Func."},{xtype:"comp_dato",name:"fuefin_codename",fieldLabel:"Rubro"},{xtype:"comp_dato",name:"tiprecur_codename",fieldLabel:"T. Recurso"},{xtype:"comp_dato",name:"orden_siaf",fieldLabel:"S.I.A.F."}
		]}]},{xtype:"comp_pag",itemId:"pagLOD",disabled:true}
	]},
	{xtype:"panel",itemId:"tabLI",height:"100%",hidden:true,layout:{type:"fit"},title:"Recepciones",items:[
		{xtype:"comp_grid",itemId:"grdLI",columns:[{xtype:"rownumberer",width:30},{dataIndex:"ing_documento",text:"Documento",width:100},{dataIndex:"ing_fecha",text:"Fecha",align:"center",renderer:Ext.util.Format.dateRenderer("d/m/Y"),width:85},{dataIndex:"ing_fecharec",text:"Recep.",align:"center",renderer:Ext.util.Format.dateRenderer("d/m/Y"),width:85},{dataIndex:"alma_abrev",text:"Almac",width:50},{dataIndex:"ing_monto",text:"Importe",align:"right",renderer:Ext.util.Format.numberRenderer("000,000,000.00"),width:90}]}
	 ],
	 dockedItems:[{xtype:"comppub_menu",value:5139},{xtype:"comp_cboopc"},
		{xtype:"form",border:false,width:"100%",items:[{xtype:"comp_tooltop",defaults:{labelWidth:65},layout:"vbox",items:[
			{xtype:"container",layout:"hbox",width:"100%",items:[{xtype:"comp_dato",name:"orden_documento",fieldLabel:"Documento",labelWidth:65,width:160},{xtype:"comp_datofecha",name:"orden_fecha",fieldLabel:"Fecha",labelWidth:35,width:140},{xtype:"comp_datomonto",name:"orden_monto",fieldLabel:"Importe",labelWidth:45}]},
			{xtype:"comp_dato",name:"area_nombre",fieldLabel:"U. Orgánica"},{xtype:"comp_dato",name:"secfunc_codename",fieldLabel:"Sec. Func."},{xtype:"comp_dato",name:"tarea_codename",fieldLabel:"Tarea Func."},{xtype:"comp_dato",name:"fuefin_codename",fieldLabel:"Rubro"},{xtype:"comp_dato",name:"tiprecur_codename",fieldLabel:"T. Recurso"},{xtype:"comp_dato",name:"orden_siaf",fieldLabel:"S.I.A.F."}
		]}]},{xtype:"toolbar",dock:"bottom",ui:"footer",items:[{xtype:"comp_btnQuery"},{xtype:"comp_btnPrinter"}]},{xtype:"comp_pag",itemId:"pagLI",disabled:true}
	]}
]}]
});