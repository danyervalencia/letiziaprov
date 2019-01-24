Ext.define("Siace.view.siaf.Expediente_SecuenciaBrow",{extend:"Siace.view.WindowBrowse",alias:"widget.bud_expesecuenbrow",closable:true,icon:"resources/icons/btnAccess.png",width:800,items:[{xtype:"form",border:false,layout:"vbox",items:[
{xtype:"container",layout:"hbox",width:"100%",margin:"0 0 5 0",items:[
	{xtype:"toolbar",layout:"vbox",defaults:{labelWidth:65},padding:"0 0 0 4",ui:"footer",width:600,items:[{xtype:"hiddenfield",itemId:"tablex"},{xtype:"hiddenfield",itemId:"expe_nro"},
		{xtype:"container",layout:"hbox",width:"100%",items:[{xtype:"comp_dato",name:"tablex_documento",fieldLabel:"Documento",labelWidth:65,width:200},{xtype:"comp_dato",name:"tablex_fecha",fieldLabel:"Fecha",labelWidth:40,renderer:Ext.util.Format.dateRenderer("d/m/Y")}]},
		{xtype:"comp_dato",name:"area_nombre",fieldLabel:"U. Orgánica"},{xtype:"comp_dato",name:"secfunc_codename",fieldLabel:"Sec. Func."},{xtype:"comp_dato",name:"tarea_codename",fieldLabel:"Tarea Func."},{xtype:"comp_dato",name:"fuefin_codename",fieldLabel:"Fue. Financ."},{xtype:"comp_dato",name:"pers_codename",fieldLabel:"Proveedor"}
	]},{xtype:"comp_dato",flex:1},
	{xtype:"comp_tooltop",defaults:{labelWidth:60},layout:"vbox",width:140,items:[
		{xtype:"comp_dato",name:"tablex_monto",fieldLabel:"Importe",renderer:Ext.util.Format.numberRenderer("000,000,000.00"),width:"100%"},
		{xtype:"comp_dato",name:"nota_monto",fieldLabel:"Not. Pres."},{xtype:"comp_dato",itemId:"tablex_pago",fieldLabel:"Pago"},{xtype:"comp_dato",itemId:"tablex_saldo",fieldLabel:"Saldo"},
	]},
]},
{xtype:"comp_grid",itemId:"grdBES",height:200,width:"100%",columns:[
	{dataIndex:"cicl_code",align:"center",text:"C",width:25},{dataIndex:"fase_code",align:"center",text:"F",width:25},{dataIndex:"certif_codigo",align:"center",text:"Certificado",width:110},{dataIndex:"doc_code",text:"Doc",sortable:false,width:35},{dataIndex:"doc_serie",text:"Serie",sortable:false,width:40},{dataIndex:"doc_num",text:"Número",sortable:false,width:80},{dataIndex:"doc_fecha",text:"Fecha",align:"center",width:80,renderer:Ext.util.Format.dateRenderer("d/m/Y")},
	{dataIndex:"rubr_codigo",text:"Rb",sortable:false,width:40},{dataIndex:"tippag_codigo",text:"TP",sortable:false,width:50},{dataIndex:"year_ctacte",text:"Año",sortable:false,width:40},{dataIndex:"banc_code",text:"Bco",sortable:false,width:40},{dataIndex:"ctacte_code",text:"Cta",sortable:false,width:40},{dataIndex:"mone_code",text:"Mo",sortable:false,width:35},
	{dataIndex:"expesecuen_monto",text:"Importe",align:"right",renderer:Ext.util.Format.numberRenderer("000,000,000.00"),width:90},{dataIndex:"expesecuen_estado_envio",align:"center",text:"EE",sortable:false,width:30}
]},
{xtype:"comp_pag",itemId:"pagBES",width:"100%"},
]}]});