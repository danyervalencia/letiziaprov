Ext.define('Siace.store.log.Pedidos_DetBrow',{extend:'Ext.data.Store',model:'Siace.model.log.Pedido_DetBrow',pageSize:500,proxy:{type:'general',url:'php/logistics_pedidos_det_json_records.php'}});