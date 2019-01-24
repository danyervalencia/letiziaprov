Ext.define('Siace.view.pub.Personas_AccesosEditPsw',{extend:'Siace.view.WindowOk',alias:'widget.pub_persacceeditpsw',width:300,items:[
{xtype:'form',bodyPadding:8,border:true,defaults:{labelWidth:90,anchor:'100%'},items:[
{xtype:'comp_txt',itemId:'persacce_pswa',fieldLabel:'Clave Actual',inputType:'password',submitValue:false,width:190},
{xtype:'comp_txt',itemId:'persacce_pswn',id:'persacce_pswn',enableKeyEvents:true,fieldLabel:'Nueva Clave',inputType:'password',submitValue:false,vtype:'customPass',width:190},
{xtype:'comp_txt',itemId:'persacce_pswc',id:'persacce_pswc',enableKeyEvents:true,fieldLabel:'Confirmar Clave',inputType:'password',submitValue:false,width:190}
]}]
});