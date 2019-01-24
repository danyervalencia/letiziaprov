Ext.define('Siace.view.logistics.Buena_ProEdit', {
	extend: 'Siace.view.WindowEdit',
	alias: 'widget.logistics_buena_proedit',
	width: 900,

	items: [
		{
			xtype: 'form', bodyPadding: 8, border: false, defaults: { labelWidth: 70, }, layout: { type: 'vbox' },
			items: [
				{	xtype: 'hiddenfield', itemId: 'coti_key', name: 'coti_key', },
				{
					xtype: 'container', layout: 'hbox', width: '100%',
					items: [
						{
							xtype: 'container', defaults: { labelWidth: 70, }, layout: 'vbox', width: 600,
							items: [
								{
									xtype: 'container', layout: 'hbox', width: '100%',
									items: [
										{   xtype: 'displayfield', itemId: 'coti_documento', fieldLabel: 'Cotización', fieldCls: 'df00104', labelClsExtra: 'lbl00101', labelWidth: 70, padding: '-4 0 -2 0', },
										{   xtype: 'displayfield', width: 40, },
										{   xtype: 'displayfield', itemId: 'coti_fecha', fieldLabel: 'Fecha', fieldCls: 'df00104', labelClsExtra: 'lbl00101', labelWidth: 40, padding: '-4 0 -2 0', },
									]
								},
								{   xtype: 'displayfield', itemId: 'pers_ruc', fieldLabel: 'Proveedor', fieldCls: 'df00104', labelClsExtra: 'lbl00101', padding: '-8 0 -2 0', },
								{   xtype: 'displayfield', itemId: 'area_nombre', fieldLabel: 'U. Orgánica', fieldCls: 'df00104', labelClsExtra: 'lbl00101', padding: '-8 0 -2 0', },
								{   xtype: 'displayfield', itemId: 'meta_codename', fieldLabel: 'Meta SIAF', fieldCls: 'df00104', labelClsExtra: 'lbl00101', padding: '-8 0 -2 0', },
								{   xtype: 'displayfield', itemId: 'tarea_codename', fieldLabel: 'Tarea', fieldCls: 'df00104', labelClsExtra: 'lbl00101', padding: '-8 0 -2 0', },
							]
						},
						{   xtype: 'displayfield', flex: 1, },
						{
							xtype: 'container', defaults: { labelWidth: 60, }, layout: 'vbox', width: 140, 
							items: [
								{   xtype: 'displayfield', itemId: 'ped_documento', fieldLabel: 'N° Req.', fieldCls: 'df00406', labelClsExtra: 'lbl00401', padding: '-4 0 -2 0', },
								{   xtype: 'displayfield', itemId: 'ped_fecha', fieldLabel: 'Fecha', fieldCls: 'df00406', labelClsExtra: 'lbl00401', padding: '-8 0 -2 0', },
								{   xtype: 'displayfield', itemId: 'ped_monto', fieldLabel: 'Importe', fieldCls: 'df00406', labelClsExtra: 'lbl00401', padding: '-8 0 -2 0', },
							]
						}
					]
				},
				{
					xtype: 'panel', border: false, width: '100%', 
					items: [
					    {
							xtype: 'grid', itemId: 'grdLogistics_cotizaciones_det', columnLines: true, height: 230, selType: 'checkboxmodel', selModel: { mode: 'MULTI', injectCheckbox: 0 },
							columns: [
								{	dataIndex: 'bs_nombre', text : 'Descripción', sortable: false, width: 380 },
								{	
									dataIndex: 'bpdet_cantid', text: 'Cant.', align: 'right', renderer: Ext.util.Format.numberRenderer('000,000,000.000'), sortable: false, width: 80, 
									editor: { xtype: 'component_numberfield', itemId: 'bpdet_cantid', allowBlank: false, decimalPrecision: 3, maxLength: 15, maxValue: 999999999, }
								},
								{	dataIndex: 'unimed_nombre', text : 'U.M.', sortable: false, width: 80 },
								{	dataIndex: 'cotidet_detalle', text: 'Marca', sortable: false, width: 95, },
								{	dataIndex: 'cotidet_preuni', text: 'Precio Unitario', align: 'right', renderer: Ext.util.Format.numberRenderer('000,000,000.00000000'), sortable: false, width: 120, },
								{	dataIndex: 'bpdet_pretot', text: 'SubTotal', align: 'right', renderer: Ext.util.Format.numberRenderer('000,000,000.00'), sortable: false, width: 90, },
								{	dataIndex: 'bs_codigo', text : 'Código', sortable: false, width: 120 },
							],
						},
					]
				},
				{
					xtype : 'container', layout: 'hbox', width: '100%', defaults: { margin: '3 0 0 0', },
					items : [
						{	xtype: 'component_textarea', itemId: 'bp_observ', name: 'coti_observ', width: 550, },
						{   xtype: 'displayfield', flex: 1, },
						{   xtype: 'fieldcontainer', fieldLabel: 'Importe', 
							labelClsExtra: 'lbl00001', labelWidth: 50, layout: { type: 'hbox' },
							items : [
								{	xtype: 'component_combo', itemId: 'mone_id', name: 'mone_id', store: 'array.Monedas', valueField: 'mone_id', displayField: 'mone_abrev', disabled: true, margin: '0 3', width: 60, },
								{ 	xtype: 'component_currencyfield', itemId: 'bp_monto', name: 'bp_monto', disabled: true, value: '', width: 96, }
						    ]
						},
					]
				},
			]
		}
	],	
});