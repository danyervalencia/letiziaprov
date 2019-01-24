Ext.define('Siace.store.array.Bienes_Servs_Tipos', {
	extend: 'Ext.data.ArrayStore',
 	storeId: 'bienes_servs_tipos',
	autoLoad: true,

	fields: [
		{ name: 'bst_id', type: 'int' },
		{ name: 'bst_nombre', type: 'string' },
		{ name: 'bst_abrev', type: 'string' },
	],
	data: [
		['1', 'Bienes', 'B'],
		['2', 'Servicios', 'S']
	]
});
