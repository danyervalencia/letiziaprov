Ext.define('Siace.view.logistics.PedidosEdit', {
	extend: 'Siace.view.WindowEdit',
	alias: 'widget.logistics_pedidosedit',
	width: 930, 

	items: [
		{
			xtype: 'form',
			items: [
				{
					xtype: 'tabpanel', activeTab: 0,
					items: [
						{
							xtype: 'panel', itemId: 'tabLogistics_pedidos', bodyPadding: 10, layout: { type: 'vbox' }, title: 'Requerimiento',
							items: [
								{
									xtype: 'panel', border: false, defaults: { labelWidth: 65 }, layout: { type: 'hbox' }, width: '100%',
									items: [
										{
											xtype: 'panel', border: false, defaults: { labelWidth: 65 }, layout: { type: 'vbox' }, width: 600,
											items: [
												{   xtype: 'hiddenfield', itemId: 'ped_key', name: 'ped_key' },
												{	xtype: 'component_combo', itemId: 'year_id', store: 'array.Years', valueField: 'year_id', hidden: true, displayField: 'year_code', },
												{
													xtype: 'fieldcontainer', fieldLabel: 'Registro', labelClsExtra: 'lbl00001', layout: 'hbox', width: '100%',
													items: [
										    			{ 	xtype: 'component_textfieldtop', itemId: 'ped_nro', align: 'center', disabled: true, width: 60, },
														{	xtype: 'component_datefield', itemId: 'ped_fecha', allowBlank: false, disabled: true },
														{   xtype: 'displayfield', flex: 1, },
														{	xtype: 'component_combo', itemId: 'tipped_id', valueField: 'tabgen_id', displayField: 'tabgen_nombre', fieldLabel: 'Tipo', labelWidth: 40, width: 130, },
												    ]
												},
												{	xtype: 'component_combo', itemId: 'area_key', valueField: 'area_key', displayField: 'area_nombre', disabled: true, fieldLabel: 'U. Orgánica', width: '100%', },
												{	xtype: 'component_combo', itemId: 'meta_id', valueField: 'meta_id', displayField: 'meta_codename', fieldLabel: 'Meta SIAF', width: '100%', },
												{	xtype: 'component_combo', itemId: 'tarea_key', valueField: 'tarea_key', displayField: 'tarea_codename', fieldLabel: 'Tarea', width: '100%', },
												{	xtype: 'component_combo', itemId: 'tareacomp_key', valueField: 'tareacomp_key', displayField: 'tareacomp_nombre', fieldLabel: 'Comp.', width: '100%', },
												{	xtype: 'component_combo', itemId: 'fftr_id', valueField: 'fftr_id', displayField: 'fftr_codename', fieldLabel: 'Fue.Fin.', width: '100%', },
											]
										},
										{	xtype: 'container', layout: { type: 'vbox' }, flex: 1,
											items: [
												{
													xtype: 'panel', border: false, padding: '0 0 0 25', width: '100%',
													items: [
											        	{
												            xtype: 'grid', itemId: 'grdLogistics_pedidos_tareas_fftred', columnLines: true, height: 110, stripeRows: true,
												            columns: [
												            	{ 	xtype: 'rownumberer', width: 20 },
																{	dataIndex: 'espedet_codigo', text: 'Clasificador', width: 85, },
																{	dataIndex: 'pedtareafte_monto', align: 'right', renderer: Ext.util.Format.numberRenderer('000,000,000.00'), text: 'Importe', width: 80, },
																{	dataIndex: 'pedtareafte_monto_ampl', align: 'right', renderer: Ext.util.Format.numberRenderer('000,000,000.00'), text: 'Ampl.', width: 70, },
																{	dataIndex: 'pedtareafte_monto_rebj', align: 'right', renderer: Ext.util.Format.numberRenderer('000,000,000.00'), text: 'Rebj.', width: 70, },
																{	dataIndex: '', align: 'right', renderer: Ext.util.Format.numberRenderer('000,000,000.00'), text: 'Total', width: 85, },
															]
														},
														{	xtype: 'component_textarea', itemId: 'ped_observ', name: 'ped_observ', margin: '3 0 0 0', rows: 3, width: '100%', },													
													]
												}
											]
										}
									]
								},
								{
									xtype: 'panel', border: false, width: '100%', 
									items: [
							        	{
								            xtype: 'grid', itemId: 'grdLogistics_pedidos_det', columnLines: true, height: 200,
								            columns: [
								            	{ 	xtype: 'rownumberer', width: 30 },
												{	dataIndex: 'bs_codigo', text: 'Código', sortable: false, width: 105, },
												{	dataIndex: 'bs_nombre', text: 'Descripción', sortable: false, width: 430, },
												{	dataIndex: 'unimed_abrev', text: 'Unidad', sortable: false, width: 50, },
												{	dataIndex: 'peddet_cantid', text: 'Cantid', align: 'right', renderer: Ext.util.Format.numberRenderer('000,000,000.000'), sortable: false, width: 85, 
													editor: { xtype: 'component_numberfield', itemId: 'peddet_cantid', allowBlank: false, decimalPrecision: 3, maxLength: 15, maxValue: 999999999, value: '' }
												},
												{	dataIndex: 'peddet_preuni', text: 'P.Unitario', align: 'right', renderer: Ext.util.Format.numberRenderer('0,000,000.000000'), sortable: false, width: 95, 
													editor: { xtype: 'component_numberfield', itemId: 'peddet_preuni', allowBlank: false, decimalPrecision: 6, maxLength: 15, maxValue: 999999999, value: '' }
												},
												{	dataIndex: 'peddet_pretot', text: 'Importe', align: 'right', renderer: Ext.util.Format.numberRenderer('000,000,000.00'), sortable: false, width: 90, },
												{	dataIndex: 'espedet_codigo', text: 'Clasificador', sortable: false, width: 85, },
												{	dataIndex: 'peddet_detalle', text: 'Detalle', sortable: false, width: 350, 
													editor: { xtype: 'component_textarea', value: '' }
												},												
											]
										}
									]
								},
								{
									xtype : 'container', layout: 'hbox', width: '100%',
									items : [
								        {   
											xtype : 'container', layout: 'hbox', width: '100%', margin: '3 0 0 0',
											items: [
								        		{	xtype: 'button', itemId: 'btnAdd', text: translations.agregar, disabled: true, iconCls: 'icon_Add', margin: '0 5', padding: '2 6 2 8' },
								        		{   xtype: 'button', itemId: 'btnSuppress', text: translations.eliminar, disabled: true, iconCls: 'icon_Suppress', padding: '2 6 2 8', },
												{   xtype: 'displayfield', flex: 1, },
												{ 	xtype: 'component_currencyfield', itemId: 'ped_monto', disabled: true, fieldLabel: 'Importe', value: '0', width: 196, },
											]
										}
							        ]
							    },
							]
						},
						{
							xtype: 'panel', itemId: 'tabEttr01', bodyPadding: 10, height: 407, hidden: true, title: 'Especificaciones Técnicas I',
							items: [
								{
									xtype: 'panel', border: false, layout: 'vbox', width: '75%', 
									items: [
										{   xtype: 'hiddenfield', itemId: 'pedettr_key', name: 'pedettr_key' },
										{	xtype: 'component_textareatop', itemId: 'pedettr_nombre', name: 'pedettr_nombre', fieldLabel: '&nbsp;1. Denominación de la Adquisición', rows: 2, width: '100%', },
										{	xtype: 'component_textareatop', itemId: 'pedettr_finalidad', name: 'pedettr_finalidad', fieldLabel: '&nbsp;2. Finalidad Pública', rows: 2, width: '100%', },
										{	xtype: 'component_textareatop', itemId: 'pedettr_objetivo', name: 'pedettr_objetivo', fieldLabel: '&nbsp;3. Objetivo de la Adquisición', rows: 2, width: '100%', },
										{	xtype: 'component_combo', itemId: 'lugentr_id', name: 'lugentr_id', valueField: 'tabgen_id', displayField: 'tabgen_nombre', fieldLabel: '&nbsp;4.1. Lugar de Entrega', labelWidth: 115, margin: '5 0 2 0', width: 300, },
										{	xtype: 'component_textareatop', itemId: 'pedettr_lugar', name: 'pedettr_lugar', rows: 6, width: '100%', },
										{	xtype: 'component_textareatop', itemId: 'pedettr_condiciones', name: 'pedettr_condiciones', fieldLabel: '&nbsp;4.2. Condiciones de Operación', rows: 7, width: '100%', },
										{	xtype: 'component_textareatop', itemId: 'pedettr_actividades', name: 'pedettr_actividades', fieldLabel: '&nbsp;4.2. Actividades y Plan de Trabajo', hidden: true, width: '100%', },
										{	xtype: 'component_textareatop', itemId: 'pedettr_entregable', name: 'pedettr_entregable', fieldLabel: '&nbsp; 4.3. Productos y/o Servicio a Obtener (entregables)', hidden: true, rows: 6, width: '100%', },
									]
								}
							]
						},
						{
							xtype: 'panel', itemId: 'tabEttr02', bodyPadding: 10, height: 407, hidden: true, title: 'Especificaciones Técnicas II',
							items: [
								{
									xtype: 'panel', border: false, layout: 'vbox', width: '75%', 
									items: [
										{	xtype: 'component_textareatop', itemId: 'pedettr_persona', name: 'pedettr_persona', fieldLabel: '&nbsp;5. Requisitos y Perfil del Proveedor', rows: 6, width: '100%', },
										{	xtype: 'component_textareatop', itemId: 'pedettr_plazo', name: 'pedettr_plazo', fieldLabel: '&nbsp;6.1. Plazo de Entrega', width: '100%', },
										{
											xtype: 'container', layout: 'hbox', width: '100%',
											items: [
												{	xtype: 'component_combo', itemId: 'tipplaz_id', name: 'tipplaz_id', store: 'array.logistics.Tipos_Plazos', valueField: 'tipplaz_id', displayField: 'tipplaz_nombre', margin: '3 4 0 0', width: 120, },
												{   xtype: 'component_currencyfield', itemId: 'pedettr_plazo_nro', name: 'pedettr_plazo_nro', margin: '3 4 0 0', numberDecimal: 0, width: 60 },
												{   xtype: 'displayfield', flex: 1 },
									            {	xtype: 'component_datefield', itemId: 'pedettr_fechaini', name: 'pedettr_fechaini', endDateField: 'pedettr_fechafin', fieldLabel: '6.3. Periodo de Ejecución', labelWidth: 135, margin: '3 4 0 0', vtype: 'daterange', width: 240 },
									            {	xtype: 'component_datefield', itemId: 'pedettr_fechafin', name: 'pedettr_fechafin', startDateField: 'pedettr_fechaini', vtype: 'daterange', margin: '3 0 0 0', },
									        ]
									    },
										{	xtype: 'component_textareatop', itemId: 'pedettr_garantia', name: 'pedettr_garantia', fieldLabel: '&nbsp;7.1. Garantia Comercial del Bien', width: '100%', },
										{   xtype: 'component_currencyfield', itemId: 'pedettr_garantia_nro', name: 'pedettr_garantia_nro', fieldLabel: '&nbsp;7.2. Nro. Meses de Garantía', labelWidth: 155, margin: '3 4 0 0', numberDecimal: 0, width: 215 },
										{	xtype: 'component_textareatop', itemId: 'pedettr_forma_pago', name: 'pedettr_forma_pago', fieldLabel: '&nbsp;8. Forma de Pago', rows: 5, width: '100%', },
									]
								}
							]
						},
						{
							xtype: 'panel', itemId: 'tabEttr03', bodyPadding: 10, height: 407, hidden: true, title: 'Especificaciones Técnicas III',
							items: [
								{
									xtype: 'panel', itemId: 'pnlET03', border: false, width: 600, 
									items: [
										{	xtype: 'component_textareatop', itemId: 'pedettr_supervisa', name: 'pedettr_supervisa', fieldLabel: '&nbsp;9. Supervisión y Conformidad del Bien', rows: 5, width: '100%', },
										{	xtype: 'component_textareatop', itemId: 'pedettr_penalidad', name: 'pedettr_penalidad', fieldLabel: '&nbsp;10. Penalidades', rows: 5, width: '100%', },
										{	xtype: 'component_textareatop', itemId: 'pedettr_otros', name: 'pedettr_otros', fieldLabel: '&nbsp;11. Otras Condiciones Adicionales', rows: 6, width: '100%', },
										{   xtype: 'displayfield', fieldLabel: '&nbsp;12. Archivos adjuntos Opcionales', fieldCls: 'df00104', labelClsExtra: 'lbl00101', labelWidth: 350, margin: '8 0 2 0', width: '100%' },
										{
											xtype: 'container', layout: 'hbox', margin: '0 0 5 0', width: '100%',
											items: [
												{   xtype: 'hiddenfield', itemId: 'pedettr_file1', name: 'pedettr_file1', },
												{   xtype: 'component_filefield', itemId: 'ffiPedettr_file1', name: 'ffiPedettr_file1', buttonOnly: false,  hideLabel: false, fieldLabel: '&nbsp;12.1. Proveedor', labelWidth: 90, width: 500 },
												{	xtype: 'component_button_imagepdf', itemId: 'btnPedettr_file1Delete', hidden: true, iconCls: 'icon_Delete_90', },
												{	xtype: 'component_button_imagepdf', itemId: 'btnPedettr_file1Download', disabled: true, margin: '0 0 0 0', }
											]
										},
										{
											xtype: 'container', layout: 'hbox', width: '100%',
											items: [
												{   xtype: 'hiddenfield', itemId: 'pedettr_file2', name: 'pedettr_file2', },
												{   xtype: 'component_filefield', itemId: 'ffiPedettr_file2', name: 'ffiPedettr_file2', buttonOnly: false, hideLabel: false, fieldLabel: '&nbsp;12.2. Interno', labelWidth: 90, width: 500 },
												{	xtype: 'component_button_imagepdf', itemId: 'btnPedettr_file2Delete', hidden: true, iconCls: 'icon_Delete_90', },
												{	xtype: 'component_button_imagepdf', itemId: 'btnPedettr_file2Download', disabled: true, margin: '0 0 0 0', }
											]
										},
									]
								}
							],
						}
					]
				}
			]
		}
	],
	__componentPBSS: null,
	__filterFFTR: true,
	setComponentPBSS: function(poComponent) { this.__componentPBSS = poComponent; },
	getComponentPBSS: function() { return this.__componentPBSS; },	
	setFilterFFTR: function(poFilter) { this.__filterFFTR = poFilter; },
	getFilterFFTR: function() { return this.__filterFFTR; },
});