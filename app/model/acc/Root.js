Ext.define('Siace.model.acc.Root',{extend:'Ext.data.Model',uses:['Siace.model.acc.Item'],idProperty:'menu_id',
fields:[{name:'menu_id',type:'int'},{name:'menu_parent',type:'int'},{name:'menu_par',type:'int'},{name:'menu_key'},{name:'menu_nombre',type:'string'},{name:'menu_name',type:'string'}],
hasMany:{model:'Siace.model.acc.Item',foreignKey:'menu_parent',name:'items'}
});