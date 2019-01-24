Ext.define('Siace.view.log.CotizacionesEdit',{extend:'Siace.view.WindowEdit',alias:'widget.log_cotiedit',layout:{type:'vbox'},width:900,items:[
{xtype:'panel',itemId:'panLP',width:'100%',items:[{xtype:'form',border:false,bodyPadding:'4 4 4 6',defaults:{width:'100%'},layout:{type:'hbox'},width:'100%',items:[
	{xtype:'comp_tooltop',defaults:{labelWidth:65},layout:'vbox',width:710,items:[
		{xtype:'container',layout:'hbox',width:'100%',items:[{xtype:'comp_dato',name:'coti_documento',fieldLabel:'Cotización',labelWidth:65,value:'W-000000',width:160},{xtype:'comp_datofecha',itemId:'coti_fecha',name:'coti_fecha',fieldLabel:'Fecha',labelWidth:35,width:140}]},
		{xtype:'comp_dato',name:'area_nombre',fieldLabel:'U. Orgánica'},{xtype:'comp_dato',name:'secfunc_codename',fieldLabel:'Sec. Func.'},{xtype:'comp_dato',name:'tarea_codename',fieldLabel:'Tarea Func.'},{xtype:'comp_dato',name:'fftr_codename',fieldLabel:'Fue.Financ.'}
	]},{xtype:'comp_dato',flex:1},
	{xtype:'comp_tooltop',defaults:{labelWidth:50},layout:'vbox',width:135,items:[{xtype:'comp_dato',name:'ped_documento',fieldLabel:'Requer.'},{xtype:'comp_datofecha',name:'pedweb_fechafin',fieldLabel:'Vigencia'}]}
]}]},
{xtype:'panel',margin:'0 0 0 0',width:'100%',items:[
{xtype:'form',itemId:'frmLC',bodyPadding:'4 4 2 4',border:false,width:'100%',items:[{xtype:'hiddenfield',itemId:'ped_key',name:'ped_key'},
	{xtype:'comp_grid',itemId:'grdLCD',height:230,viewConfig:{getRowClass:function(rec,rowI,rowP,str){return rec.data.bpdet_cantid*1>0?'mx-letra-azul':'mx-letra-negro';}},
	 columns:[{xtype:'rownumberer',width:30},{dataIndex:'bs_nombre',text:'Descripción',sortable:false,width:380},
		{dataIndex:'cotidet_cantid',text:'Cant.',align:'right',renderer:Ext.util.Format.numberRenderer('000,000,000.000'),sortable:false,width:80},{dataIndex:'unimed_nombre',text:'U.M.',sortable:false,width:80},{dataIndex:'cotidet_preuni',text:'Precio Unitario',align:'right',renderer:Ext.util.Format.numberRenderer('000,000,000.00000000'),sortable:false,width:110,editor:{xtype:'comp_number',allowBlank:false,decimalPrecision:8,maxLength:20,maxValue:999999999,submitValue:false,value:''}},{dataIndex:'cotidet_pretot',text:'SubTotal',align:'right',renderer:Ext.util.Format.numberRenderer('000,000,000.00'),sortable:false,width:95},
		{dataIndex:'cotidet_marca',text:'Marca',sortable:false,width:90,editor:{xtype:'comp_txt',maxLength:40,submitValue:false,value:''}},{dataIndex:'cotidet_modelo',text:'Modelo',sortable:false,width:90,editor:{xtype:'comp_txt',maxLength:40,submitValue:false,value:''}},
		{dataIndex:'bs_codigo',text:'Código',sortable:false,width:120},{dataIndex:'espedet_codigo',text:'Clasificador',hidden:true,sortable:false,width:85},{dataIndex:'espedet_nombre',text:'Descripción Clasificador',hidden:true,sortable:false,width:300}
	]},
	{xtype:'container',itemId:'cntObserv',layout:'hbox',width:'100%',items:[
		{xtype:'container',layout:{type:'vbox'},width:350,items:[
			{xtype:'container',layout:{type:'hbox'},width:'100%',items:[
				{xtype:'comp_cbo',itemId:'coti_inc_igv',name:'coti_inc_igv',valueField:'coti_inc_igv',displayField:'mone_abrev',disabled:true,fieldLabel:'&nbsp; Incluye IGV',labelClsExtra:'lbl00101',labelWidth:80,margin:'3 0 5 0',submitValue:false,width:140},{xtype:'displayfield',width:20},
				{xtype:'comp_curr',itemId:'coti_plazo',name:'coti_plazo',fieldLabel:'&nbsp;Plazo Entrega',margin:'3 0 5 0',labelWidth:95,numberDecimal:0,width:155}
			]},
			{xtype:'container',layout:{type:'hbox'},width:'100%',items:[
				{xtype:'comp_curr',itemId:'coti_vigencia',name:'coti_vigencia',fieldLabel:'&nbsp; Validez (Días)',labelWidth:80,numberDecimal:0,width:140},{xtype:'displayfield',width:20},
				{xtype:'comp_curr',itemId:'coti_garantia',name:'coti_garantia',fieldLabel:'&nbsp;Garantia (Meses)',labelWidth:95,numberDecimal:0,width:155},
			]},
			{xtype:'comp_cbo',itemId:'lugentr_id',name:'lugentr_id',valueField:'lugentr_id',displayField:'lugentr_nombre',fieldLabel:'&nbsp; Lugar Entrega',labelClsExtra:'lbl00001',labelWidth:80,margin:'5 0 0 0',width:315},
			{xtype:'comp_cbo',itemId:'tippag_id',name:'tippag_id',valueField:'tippag_id',displayField:'tippag_nombre',fieldLabel:'&nbsp; Forma Pago',labelClsExtra:'lbl00001',labelWidth:80,margin:'5 0 0 0',width:315},
		]},{xtype:'displayfield',width:20},
		{xtype:'container',layout:{type:'vbox'},flex:1,items:[
			{xtype:'container',defaults:{labelWidth:95,width:'100%'},layout:{type:'hbox'},margin: '3 0 0 0',width:'100%',items:[
				{xtype:'displayfield',flex:1},
				{xtype:'comp_cbo',itemId:'mone_id',name:'mone_id',store:'array.Mone',valueField:'mone_id',displayField:'mone_abrev',disabled:true,fieldLabel:'Importe',labelWidth:50,margin:'0 3',submitValue:false,value:1,width:100},
				{xtype:'comp_curr',itemId:'coti_monto',name:'coti_monto',disabled:true,value:'',width:96}
			]},
			{xtype:'comp_txtarea',itemId:'coti_observ',name:'coti_observ',margin:'3 0 0 0',width:'100%',height:50},
			{xtype:'container',layout:'hbox',margin:'5 0 5 0',width:'100%',items:[{xtype:'hiddenfield',itemId:'coti_file1',name:'coti_file1'},
				{xtype:'comp_file',itemId:'ffiCoti_file1',name:'ffiCoti_file1',buttonOnly:false,hideLabel:false,fieldLabel:'&nbsp;Archivo Adjunto',labelWidth:90,flex:1},
				{xtype:'comp_btn_imgpdf',itemId:'btnCoti_file1Delete',iconCls:'icon_Delete_90',disabled:true},{xtype:'comp_btn_imgpdf',itemId:'btnCoti_file1Download',disabled:true,margin:'0 0 0 0'}
			]}
		]}
	]}
]}]} 
]});