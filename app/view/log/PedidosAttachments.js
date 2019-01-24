Ext.define('Siace.view.logistics.PedidosAttachments', {
	extend: 'Siace.view.WindowBrowse',
	alias: 'widget.logistics_pedidosattachments',
	closable: true, width: 250, title: 'Archivos Adjuntos',

	items: [
		{
			xtype: 'form', border: false, layout: 'vbox',
		    items: [
		    	{   xtype: 'displayfield', itemId: 'ped_documento', fieldCls: 'df00105', padding: '10 0 -5 0', width: '100%', },
		    	{   xtype: 'displayfield', fieldCls: 'df00105', padding: '-5 0 0 0', value: fjsRepeat('=', 17), width: '100%', },
			    {
			        xtype: 'container', layout: 'hbox',  margin: '10 0 10 0', width: '100%',
			        items: [
						//{	xtype: 'image', itemId: 'pedettr_file1', flex: 1, margin: '2 0 3 0', width: '100%', style: { borderColor: '#BDBDBD', borderStyle: 'solid', background: 'center', position: 'relative' } },
						{   xtype: 'displayfield', flex: 1, },
						{   xtype: 'displayfield', itemId: 'tipped_abrev', fieldCls: 'df00205', width: 40, },
						{   xtype: 'displayfield', flex: 1, },
						{	xtype: 'image', itemId: 'pedettr_file1', width: 18, },
						{   xtype: 'displayfield', flex: 1, },
						{	xtype: 'image', itemId: 'pedettr_file2', width: 20, },
						{   xtype: 'displayfield', flex: 1, },
			        ]
			    },
			],
		}
	],
});