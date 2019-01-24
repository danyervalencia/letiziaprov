Ext.define('Siace.store.array.logistics.Tipos_Plazos', {
	extend: 'Ext.data.ArrayStore',
 	storeId: 'logistics_tipos_plazos', autoLoad: true,

	fields: [{ name: 'tipplaz_id', type: 'int' }, { name: 'tipplaz_nombre', type: 'string' },  { name: 'tipplaz_abrev', type: 'string' }],
	data: [['511', 'Días Hábiles', 'DH'], ['512', 'Días Calendario', 'DC']]
});