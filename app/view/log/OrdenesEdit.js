Ext.define('Siace.view.logistics.OrdenesEdit', {
	extend: 'Siace.view.WindowEdit',
	alias: 'widget.logistics_ordenesedit',
	width: 930,

	items: [
		{
			xtype: 'form', bodyPadding: 8, border: true, layout: { type: 'vbox' },
			items: [
				{
					xtype: 'container', layout: 'hbox', width: '100%',
					items: [
						{
							xtype: 'container', defaults: { labelWidth: 65, }, layout: 'vbox',  width: 580,
							items: [
								{
									xtype: 'fieldcontainer', fieldLabel: 'Documento', labelClsExtra: 'lbl00001', layout: 'hbox', width: '100%',
									items: [
										{	xtype: 'hiddenfield', itemId: 'coti_key', name: 'coti_key' },
										{	xtype: 'hiddenfield', itemId: 'bp_key', name: 'bp_key' },
										{	xtype: 'component_combo', itemId: 'year_id', name: 'year_id', store: 'array.Years', valueField: 'year_id', hidden: true, displayField: 'year_code', },
										{	xtype: 'component_combotop', itemId: 'doc_id', store: 'array.DocumentosOrden', valueField: 'doc_id', displayField: 'doc_nombre', disabled: true, width: 160, },
										{	xtype: 'component_combotop', itemId: 'tipgast_id', valueField: 'tipgast_id', displayField: 'tipgast_code', width: 45, },
										{	xtype: 'component_combotop', itemId: 'mes_id', store: 'array.Meses', valueField: 'mes_id', displayField: 'mes_nombre', disabled: true, width: 90, },
										{ 	xtype: 'component_textfieldtop', itemId: 'orden_nro', align: 'center', disabled: true, width: 60, },
										{	xtype: 'component_datefield', itemId: 'orden_fecha', allowBlank: false, disabled: true },
									]
								},
								{	xtype: 'component_combo', itemId: 'area_key', valueField: 'area_key', displayField: 'area_nombre', disabled: true, fieldLabel: 'U. Orgánica', width: '100%', },
								{	xtype: 'component_combo', itemId: 'meta_id', valueField: 'meta_id', displayField: 'meta_codename', fieldLabel: 'Meta SIAF', width: '100%', },
								{	xtype: 'component_combo', itemId: 'tarea_key', valueField: 'tarea_key', displayField: 'tarea_codename', fieldLabel: 'Tarea', width: '100%', },
								{	xtype: 'component_combo', itemId: 'tareacomp_key', valueField: 'tareacomp_key', displayField: 'tareacomp_nombre', fieldLabel: 'Comp.', disabled: true, width: '100%', },
								{	xtype: 'component_combo', itemId: 'fftr_id', valueField: 'fftr_id', displayField: 'fftr_codename', fieldLabel: 'Fue.Fin.', width: '100%', },
							    {
									xtype: 'fieldcontainer', fieldLabel: 'Proveedor', labelClsExtra: 'lbl00001', layout: 'hbox', width: '100%',
									items: [
										{ 	xtype: 'hiddenfield', itemId: 'pers_key', name: 'pers_key', },
										{   xtype: 'hiddenfield', itemId: 'PERS_RUC', },
										{	xtype: 'component_textfieldtop', itemId: 'pers_ruc', name: 'pers_ruc', disabled: true, enableKeyEvents: true, maxLength: 11, submitValue: false },
										{	xtype: 'component_button_imagesearch', itemId: 'btnPers_search', disabled: true, },
										{	xtype: 'displayfield', itemId: 'pers_nombre', name: 'pers_nombre', fieldCls: 'df00101' },
									]
								},
								{
									xtype: 'fieldcontainer', fieldLabel: 'Tipo Pago', labelClsExtra: 'lbl00001', layout: 'hbox', fieldLabel: 'Tipo Pago', width: '100%',
									items : [
								        { 	xtype: 'component_combotop', itemId: 'tippag_id', name: 'tippag_id', valueField: 'tippag_id', displayField: 'tippag_nombre', width: 125, },
								        { 	xtype: 'displayfield', flex: 1, },
								        {	xtype: 'component_datefield', itemId: 'orden_fechaini', fieldLabel: 'Periodo', labelWidth: 50, margin: '0 4 0 0', width: 145 },
										{	xtype: 'component_datefield', itemId: 'orden_fechafin' },
							        ]
							    },
							]
						},
						{ 	xtype: 'displayfield', width: 25, },
						{
							xtype: 'container', layout: 'vbox',  flex: 1,
							items: [
							    {
									xtype: 'fieldcontainer', fieldLabel: 'Generar desde', labelClsExtra: 'lbl00001', labelWidth: 80, layout: 'hbox', width: '100%',
									items: [
										{ 	xtype: 'hiddenfield', itemId: 'tablex_key', name: 'tablex_key', },
										{ 	xtype: 'component_combotop', itemId: 'tablex', name: 'tablex', valueField: 'tablex', displayField: 'tablex_nombre', disabled:true, flex: 1, },
										{ 	xtype: 'component_textfieldtop', itemId: 'tablex_nro', align: 'center', disabled: true, width: 60, },
										{	xtype: 'component_button_imagesearch', itemId: 'btnTablex_search', disabled: true, margin: '0 0 0 0', },
									]
								},
							]
						}
					]
				},				
				{
					xtype: 'tabpanel', activeTab: 0, plain: true, width: '100%',
					items: [
						{
							xtype: 'panel', itemId: 'panDetalle', title: 'Detalle de Orden',  height: 200,
							items: [
								{
									xtype: 'grid', itemId: 'grdLogistics_ordenes_det', columnLines: true, height: 200, stripeRows: true, //width: 400,
									columns: [
								        { 	xtype: 'rownumberer', width: 30 },
										{	dataIndex: 'bs_codigo', text: 'Código', sortable: false, width: 105, },
										{	dataIndex: 'bs_nombre', text: 'Descripción', sortable: false, width: 430, },
										{	dataIndex: 'unimed_abrev', text: 'Unidad', sortable: false, width: 50, },
										{	dataIndex: 'ordendet_cantid', text: 'Cantid', align: 'right', renderer: Ext.util.Format.numberRenderer('000,000,000.000'), sortable: false, width: 85, 
											editor: { xtype: 'component_numberfield', allowBlank: false, decimalPrecision: 3, maxLength: 15, maxValue: 999999999, value: '' }
										},
										{	dataIndex: 'ordendet_preuni', text: 'P.Unitario', align: 'right', renderer: Ext.util.Format.numberRenderer('0,000,000.000000'), sortable: false, width: 95, 
											editor: { xtype: 'component_numberfield', allowBlank: false, decimalPrecision: 6, maxLength: 15, maxValue: 999999999, value: '' }
										},
										{	dataIndex: 'ordendet_pretot', text: 'Importe', align: 'right', renderer: Ext.util.Format.numberRenderer('000,000,000.00'), sortable: false, width: 90, },
										{	dataIndex: 'espedet_codigo', text: 'Clasificador', sortable: false, width: 85, },
									]
								}
							]
						},
						{
							xtype: 'panel', itemId: 'panCompementos', title: 'Complementarios', bodyPadding: 8, height: 200, width: '100%', layout: 'vbox',
							items: [
								{	xtype: 'component_textarea', itemId: 'orden_observ', name: 'orden_observ', fieldLabel: 'Glosa', labelWidth: 65, width: '100%', height: 120 }
							],
						}
					]
				},
				{
					xtype : 'container', layout: 'hbox', width: '100%',
					items : [
						{
							xtype : 'container', layout: 'hbox', width: '100%', margin: '3 0 0 0',
							items: [
						   		{	xtype: 'button', itemId: 'btnAdd', text: 'Agregar', disabled: true, iconCls: 'icon_Add', margin: '0 5', padding: '2 6 2 8' },
					     		{   xtype: 'button', itemId: 'btnSuppress', text: 'Eliminar', disabled: true, iconCls: 'icon_Suppress', padding: '2 6 2 8', },
								{   xtype: 'displayfield', flex: 1, },
								{ 	xtype: 'component_currencyfield', itemId: 'orden_monto', disabled: true, fieldLabel: 'Importe', value: '0', width: 196, },
							]
						}
			        ]
			    },
			]
		}
	],
});