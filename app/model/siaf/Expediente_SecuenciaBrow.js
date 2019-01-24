Ext.define('Siace.model.siaf.Expediente_SecuenciaBrow',{extend:'Ext.data.Model',fields:[
{name:'year_id',type:'int'},{name:'cicl_code',type:'string'},{name:'fase_code',type:'string'},{name:'doc_code',type:'string'},{name:'doc_serie',type:'string'},{name:'doc_num',type:'string'},{name:'doc_fecha',type:'date',dateFormat:'Y-m-d'},
{name:'year_ctacte',type:'int',convert:null},{name:'banc_code',type:'string'},{name:'ctacte_code',type:'string'},{name:'mone_code',type:'string'},{name:'expesecuen_monto',type:'float'},
{name:'expesecuen_estado_envio',type:'string'},{name:'tippag_codigo',type:'string'},{name:'rubr_codigo',type:'string'},{name:'certif_codigo',type:'string'}
]});