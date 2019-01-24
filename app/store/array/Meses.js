Ext.define('Siace.store.array.Meses', {
	extend: 'Ext.data.ArrayStore',
 	storeId: 'meses', autoLoad: true,
	fields: [{ name: 'mes_id', type: 'int' }, { name: 'mes_nombre', type: 'string' }, { name: 'mes_abrev', type: 'string' }, { name: 'mes_code', type: 'string' },],

	data: [
		['1', 'Enero', 'ENE', '01'],['2', 'Febrero', 'FEB', '02'],['3', 'Marzo', 'MAR', '03'],['4', 'Abril', 'ABR', '04'],
		['5', 'Mayo', 'MAY', '05'],['6', 'Junio', 'JUN', '06'],['7', 'Julio', 'JUL', '07'],['8', 'Agosto', 'AGO', '08'],
		['9', 'Setiembre', 'SET', '09'],['10', 'Octubre', 'OCT', '10'],['11', 'Noviembre', 'NOV', '11'],['12', 'Diciembre', 'DIC', '12'],
	]
});
