Ext.define('Siace.store.array.budget.Tipos_TransaccionAB', {
	extend: 'Ext.data.ArrayStore',
 	storeId: 'budget_tipos_transaccionab', autoLoad: true,

	fields: [{ name: 'tiptrans_id', type: 'int' }, { name: 'tiptrans_code', type: 'string' }, { name: 'tiptrans_nombre', type: 'string' },  { name: 'tiptrans_codename', type: 'string' }],
	data: [['0', '', '', ''], ['1', '1', 'Ingresos Presupuestarios', '1  Ingresos Presupuestarios'], ['2', '2', 'Gastos Presupuestarios', '2  Gastos Presupuestarios']]
});