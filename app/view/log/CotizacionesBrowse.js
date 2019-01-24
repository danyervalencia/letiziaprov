Ext.define('Siace.view.logistics.CotizacionesBrowse', {
	extend: 'Siace.view.PanelBrowse',
	alias: 'widget.logistics_cotizacionesbrowse',

    items: [
        {
            xtype: 'grid', itemId: 'grdLogistics_cotizaciones', autoHeight: true, columnLines: true, stripeRows: true, 
			viewConfig: {
		    	getRowClass: function(record, rowIndex, rowParams, store){
		        	return record.get('coti_flga') == '98' ? 'mx-letra-rojo' : 'mx-letra-negro';
		    	}
			},
            columns: [
            	{ 	xtype: 'rownumberer', width: 30, },
				{	dataIndex: 'coti_documento', text: 'Cotización', width: 100, },
				{	dataIndex: 'coti_fecha', text: 'Fecha', align: 'center', width: 85, renderer : Ext.util.Format.dateRenderer('d/m/Y') },
				{   dataIndex: 'tipcoti_code', text: '', width: 25, },
				{	dataIndex: 'tipped_abrev', text: 'Tipo', width: 40, },
				{	dataIndex: 'area_abrev', text: 'U.O.', width: 60, },
				{	dataIndex: 'tarea_codigo', text: 'Tarea', align: 'center', width: 70, },
				{	dataIndex: '', text: 'Co', tooltip: 'Componente', width: 40, },
				{	dataIndex: 'bp_fecha', text: 'Buena Pro', align: 'center', width: 85, renderer : Ext.util.Format.dateRenderer('d/m/Y') },
				{	dataIndex: 'ped_documento', text: 'Referencia', width: 80, },
				{	dataIndex: 'ped_fecha', text: 'Fecha', align: 'center', width: 85, renderer : Ext.util.Format.dateRenderer('d/m/Y') },

				{	dataIndex: 'bp_monto', text: 'Buena Pro', align: 'right', renderer: Ext.util.Format.numberRenderer('000,000,000.00'), width: 90, },

			]
		}
	],

	dockedItems: [
	    {
	        xtype: 'toolbar', dock: 'top', layout: 'hbox', padding: '1 0 3 2', ui: 'footer',
	        items: [
		        {	xtype: 'component_combotop', itemId: 'year_id', store: 'array.Years', valueField: 'year_id', displayField: 'year_nro', fieldLabel: '&nbsp;Año', listConfig: { cls: 'item00001', minWidth: 60, }, tpl:'<tpl for="."><div class="x-boundlist-item">{year_code}&nbsp;</div></tpl>', width: 60, },
	            {	xtype: 'component_textfieldtop', itemId: 'coti_nro', fieldLabel: '&nbsp;N° Cot.', maxLength: 5, vtype: 'onlyNumeric', width: 65, },
	            {	xtype: 'component_datefieldtop', itemId: 'fechaini', fieldLabel: '&nbsp;Fecha Inicial', endDateField: 'fechafin', vtype: 'daterange', },
	            {	xtype: 'component_datefieldtop', itemId: 'fechafin', fieldLabel: '&nbsp;Fecha Final', startDateField: 'fechaini', vtype: 'daterange', },
		        {	xtype: 'component_combotop', itemId: 'tipped_id', valueField: 'tabgen_id', displayField: 'tabgen_abrev', fieldLabel: '&nbsp;Tipo', tpl:'<tpl for="."><div class="x-boundlist-item">{tabgen_abrev}&nbsp;</div></tpl>', width: 70, },
		        {	xtype: 'component_combotop', itemId: 'area_key', valueField: 'area_key', displayField: 'area_abrev', fieldLabel: '&nbsp;U.O.', tpl:'<tpl for="."><div class="x-boundlist-item">{area_abrev}&nbsp;</div></tpl>', width: 70, },
	        ]
	    },
		{
            xtype: 'toolbar', dock: 'bottom', ui: 'footer',
            items: [
	            { 	xtype: 'component_buttonQuery' },
	            { 	xtype: 'component_button', itemId: 'btnAttach', disabled: true, iconCls: 'icon_Attach', text: 'Adjuntos', },
	            { 	xtype: 'component_buttonPrinter' },
	            { 	xtype: 'component_button', itemId: 'btnCuadro', disabled: true, icon: 'resources/icons/btnComplementary.png', text: 'Cuadro Comparativo', },
	            { 	xtype: 'component_button', itemId: 'btnOrdern', disabled: true, icon: 'resources/icons/orders.png', text: 'Imprimir Orden', },
            	{ 	xtype: 'component_button', itemId: 'btnHide', hidden: true }
            ]
        },
		{	xtype: 'component_pagingtoolbar', itemId: 'pagLogistics_cotizaciones', }
	],
});