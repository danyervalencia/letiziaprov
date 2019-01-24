Ext.define('Siace.store.array.DocumentosCobro', {
	extend: 'Ext.data.ArrayStore',
 	storeId: 'public_documentoscobro',
	autoLoad: true,
	fields: [ { name: 'doc_id', type: 'int' }, { name: 'doc_nombre', type: 'string' }, { name: 'doc_abrev', type: 'string' }, ],
	data: [	['511', 'Recibo de Ingreso', 'RI'], ['515', 'Recibo de Ejecución', 'RE'], ]
});