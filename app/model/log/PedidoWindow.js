Ext.define('Siace.model.log.PedidoWindow',{extend:'Ext.data.Model',fields:[
{name:'ped_key',type:'string'},{name:'ped_fecha',type:'date',dateFormat:'Y-m-d'},{name:'ped_monto',type:'float',convert:null},{name:'ped_documento',type:'string'},{name:'tipped_nombre',type:'string'},
{name:'area_nombre',type:'string'},{name:'secfunc_codename',type:'string'},{name:'tarea_codename',type:'string'},{name:'fuefin_codename',type:'string'},{name:'tiprecur_codename',type:'string'},
]});