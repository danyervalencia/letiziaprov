Ext.define("Siace.store.log.OrdenesBrow",{extend:"Ext.data.Store",model:"Siace.model.log.OrdenBrow",pageSize:500,proxy:{type:"general",url:"php/logistics_ordenes_json_records.php"}});