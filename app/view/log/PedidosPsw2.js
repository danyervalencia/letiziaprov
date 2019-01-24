Ext.define('Siace.view.logistics.PedidosPsw2', {
	extend: 'Siace.view.WindowOk',
	alias: 'widget.logistics_pedidospsw2',
	iconCls: 'icon_key', title: 'Registro de Validación', width: 400,

	items: [
		{
			xtype: 'form', bodyPadding: 10, defaults: { anchor: '100%', labelWidth: 60, }, frame: false,
			items: [
				{   xtype: 'displayfield', itemId: 'subtitle', fieldCls: 'df00105', value: '', },
				{   xtype: 'component_textfield', itemId: 'usur_psw2', id: 'txtUsur_psw2', enableKeyEvents: true, fieldLabel: 'Clave', allowBlank: false, inputType: 'password', minLength: 8, maxLength: 15, },
				{   xtype: 'component_currencyfield', itemId: 'ped_certificado', anchor: '', disabled: true, fieldLabel: 'Certificado', hidden: true, maxLength: 8, numberDecimal: 0, width: 150, },
				{	xtype: 'component_combo', itemId: 'usuracce_key', valueField: 'usuracce_key', displayField: 'indiv_apenom', disabled: true, fieldLabel: 'Cotizador', hidden: true, listConfig: { cls: 'item00001', minWidth: '100%' }, tpl:'<tpl for="."><div class="x-boundlist-item">{indiv_apenom}&nbsp;</div></tpl>', },
				{
			     	xtype: 'container', itemId: 'cntWeb', hidden: true, layout: 'hbox', margin: '0 0 5 0', width: '100%',
					items: [
						{   xtype: 'displayfield', width: 70, },
						{	xtype: 'checkbox', itemId: 'pedweb_estado', name: 'pedweb_estado', checked: false, disabled: true, width: 13, },
						{	xtype: 'label', itemId: 'lblPedweb_estado', cls: 'lbl00301', padding: '4 0 0 0', text: '\xa0 Publicar en Página Web', width: 140, },
						{   xtype: 'displayfield', flex: 1, },
						{   xtype: 'component_currencyfield', itemId: 'pedweb_dias', fieldLabel: 'Nro. días', labelWidth: 55, disabled: true, maxLength: 3, numberDecimal: 0, width: 105, },
					]
				},
				{   xtype: 'component_textarea', itemId: 'observ', fieldLabel: 'Comentario', },
				{   xtype: 'displayfield', itemId: 'message', fieldCls: 'df00302', },
			],
		}
	],
});