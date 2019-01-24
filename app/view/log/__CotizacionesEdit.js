Ext.define('Siace.view.logistics.CotizacionesEdit', {
	extend: 'Siace.view.WindowEdit',
	alias: 'widget.logistics_cotizacionesedit',
	width: 900,

	items: [
		{
			xtype: 'form', bodyPadding: 8, border: false, layout: { type: 'vbox' },
			items: [
				{
					xtype: 'container', layout: 'hbox', width: '100%',
					items: [
						{
							xtype: 'container', defaults: { labelWidth: 65, }, layout: 'vbox',  width: 710,
							items: [
								{	xtype: 'hiddenfield', itemId: 'ped_key', name: 'ped_key', },
								{	xtype: 'component_combo', itemId: 'year_id', store: 'array.Years', valueField: 'year_id', hidden: true, displayField: 'year_code', },
								{
									xtype: 'fieldcontainer', fieldLabel: 'Documento', labelClsExtra: 'lbl00001', layout: 'hbox', width: '100%',
									items: [
										{	xtype: 'component_combotop', itemId: 'doc_id', valueField: 'doc_id', displayField: 'doc_nombre', disabled: true, width: 120, },
										{ 	xtype: 'component_textfieldtop', itemId: 'coti_nro', align: 'center', disabled: true, width: 60, },
										{	xtype: 'component_datefield', itemId: 'coti_fecha', name: 'coti_fecha', allowBlank: false, disabled: true },
								    ]
								},
								{   xtype: 'displayfield', itemId: 'area_nombre', name: 'area_nombre', fieldLabel: 'U. Orgánica', fieldCls: 'df00104', labelClsExtra: 'lbl00101', labelWidth: 68, padding: '-4 0 -2 0', },
								{   xtype: 'displayfield', itemId: 'meta_codename', name: 'meta_codename', fieldLabel: 'Meta SIAF', fieldCls: 'df00104', labelClsExtra: 'lbl00101', labelWidth: 68, padding: '-8 0 -2 0', },
								{   xtype: 'displayfield', itemId: 'tarea_codename', name: 'tarea_codename', fieldLabel: 'Tarea', fieldCls: 'df00104', labelClsExtra: 'lbl00101', labelWidth: 68, padding: '-8 0 -2 0', },
							]
						},
						{
							xtype: 'container', layout: 'vbox', flex: 1,
							items: [
								{   xtype: 'displayfield', itemId: 'ped_documento', name: 'ped_documento', fieldLabel: 'Requerimiento', fieldCls: 'df00106', labelClsExtra: 'lbl00101', labelWidth: 80, padding: '-4 0 -2 0', },
								{   xtype: 'displayfield', itemId: 'ped_fecha', name: 'ped_fecha', fieldLabel: 'Fecha', fieldCls: 'df00105', labelClsExtra: 'lbl00101', labelWidth: 80, padding: '-8 0 -2 0', },
								//{   xtype: 'displayfield', itemId: 'ped_monto', name: 'ped_monto', fieldLabel: 'Importe', fieldCls: 'df00106', labelClsExtra: 'lbl00101', labelWidth: 80, padding: '-8 0 -2 0', },
							]
						}
					]
				},
				{
					xtype: 'panel', border: false, width: '100%', 
					items: [
					    {
							xtype: 'grid', itemId: 'grdLogistics_cotizaciones_det', columnLines: true, height: 230,
							columns: [
								{	dataIndex: 'bs_nombre', text : 'Descripción', sortable: false, width: 400 },
								{	dataIndex: 'cotidet_cantid', text: 'Cant.', align: 'right', renderer: Ext.util.Format.numberRenderer('000,000,000.000'), sortable: false, width: 80, },
								{	dataIndex: 'unimed_nombre', text : 'U.M.', sortable: false, width: 80 },
								{
									dataIndex: 'cotidet_detalle', text: 'Marca', sortable: false, width: 100, 
						            editor: { xtype: 'component_textfield', maxLength: 40, value: '', }
								},
								{
									dataIndex: 'cotidet_preuni', text: 'Precio Unitario', align: 'right', renderer: Ext.util.Format.numberRenderer('000,000,000.00000000'), sortable: false, width: 120, 
						            editor: { xtype: 'component_numberfield', allowBlank: false, decimalPrecision: 8, maxLength: 20, maxValue: 999999999, value: '', }
								},
								{	dataIndex: 'cotidet_pretot', text: 'SubTotal', align: 'right', renderer: Ext.util.Format.numberRenderer('000,000,000.00'), sortable: false, width: 95, },
								{	dataIndex: 'bs_codigo', text: 'Código', sortable: false, width: 120, },
							],
						},
					]
				},
				{
					xtype: 'container', layout: 'hbox', width: '100%',
					items: [
						{	xtype: 'container', layout: { type: 'vbox' }, width: 350,
							items: [
								{	xtype: 'container', layout: { type: 'hbox' }, width: '100%',
									items: [
										{	xtype: 'component_combo', itemId: 'coti_inc_igv', name: 'coti_inc_igv', valueField: 'coti_inc_igv', displayField: 'mone_abrev', disabled: true, fieldLabel: '&nbsp; Incluye IGV', labelClsExtra: 'lbl00101', labelWidth: 80, margin: '3 0 5 0', width: 140 },
										{   xtype: 'displayfield', width: 20, },
										{	xtype: 'component_currencyfield', itemId: 'coti_plazo', name: 'coti_plazo', fieldLabel: '&nbsp; Plazo Entrega', margin: '3 0 5 0', labelWidth: 95, numberDecimal: 0, width: 155 },
									]
								},
								{	xtype: 'container', layout: { type: 'hbox' }, width: '100%',
									items: [
										{	xtype: 'component_currencyfield', itemId: 'coti_vigencia', name: 'coti_vigencia', fieldLabel: '&nbsp; Validez (Dias)', labelWidth: 80, numberDecimal: 0, width: 140  },
										{   xtype: 'displayfield', width: 20, },
										{	xtype: 'component_currencyfield', itemId: 'coti_garantia', name: 'coti_garantia', fieldLabel: '&nbsp; Garantia (Meses)', labelWidth: 95, numberDecimal: 0, width: 155 },
									]
								},
								{	xtype: 'component_combo', itemId: 'tippag_id', name: 'tippag_id', valueField: 'tippag_id', displayField: 'tippag_nombre', fieldLabel: '&nbsp; Forma Pago', labelClsExtra: 'lbl00001', labelWidth: 80, margin: '5 0 0 0', width: 250 },
								{	xtype: 'component_combo', itemId: 'lugentr_id', name: 'lugentr_id', valueField: 'tabgen_id', displayField: 'tabgen_nombre', fieldLabel: '&nbsp; Lugar Entrega', labelClsExtra: 'lbl00001', labelWidth: 80, margin: '5 0 0 0', width: 250 },
							]
						},
						{   xtype: 'displayfield', width: 40, },
						{	xtype: 'container', layout: { type: 'vbox' }, flex: 1,
							items: [
								{	xtype: 'container', defaults: { labelWidth: 95, width: '100%' }, layout: { type: 'hbox' }, margin: '3 0 0 0', width: '100%',
									items: [
										{   xtype: 'displayfield', flex: 1, },
										{	xtype: 'component_combo', itemId: 'mone_id', name: 'mone_id', store: 'array.Monedas', valueField: 'mone_id', displayField: 'mone_abrev', disabled: true, fieldLabel: 'Importe', labelWidth: 50, margin: '0 3', width: 100, },
										{ 	xtype: 'component_currencyfield', itemId: 'coti_monto', name: 'coti_monto', disabled: true, value: '', width: 96, }
								    ]
								},
								{	xtype: 'component_textarea', itemId: 'coti_observ', name: 'coti_observ', margin: '3 0 0 0', width: '100%', rows: 5 },
							]
						}
					]
				}
			]
		}
	],
	__componentPPS: null,
	setComponentPPS: function(poComponent) { this.__componentPPS = poComponent; },
	getComponentPPS: function() { return this.__componentPPS; },		
});