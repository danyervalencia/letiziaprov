Ext.define("Siace.view.pub.Personas_AccesosPsw2",{extend:"Siace.view.WindowOk",alias:"widget.pub_persaccepsw2",iconCls:"icon_key",title:"Clave de validación",width:400,items:[
{xtype:"form",bodyPadding:10,defaults:{anchor:"100%",labelWidth:60},frame:false,items:[{xtype:"displayfield",itemId:"subtitle",fieldCls:"df00105",value:""},	
	{xtype:"comp_txt",id:"txtPersacce_psw2",itemId:"persacce_psw2",fieldLabel:"Clave",allowBlank:false,enableKeyEvents:true,inputType:"password",minLength:3,maxLength:15},
	{xtype:"comp_txtarea",itemId:"observ",fieldLabel:"Comentario"},{xtype:"displayfield",itemId:"warning",fieldCls:"df00302"}
]}],
__warning:"",setWarning:function(pcWarning){this.__warning=pcWarning;},getWarning:function(){return this.__warning;},
__alert:"",setAlert:function(pcAlert){this.__alert=pcAlert;},getAlert:function(){return this.__alert;},
__formType:"10",setFormType:function(pcFormType){this.__formType=pcFormType;},getFormType:function(){return this.__formType;}
});