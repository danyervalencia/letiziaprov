Ext.define('Siace.controller.pub.Personas_AccesosEditPsw',{extend:'Ext.app.Controller',views:['pub.Personas_AccesosEditPsw','tool.CapsLockTooltip'],refs:[{ref:'capsLockToolTip',selector:'tool_capslocktooltip'}],
init:function(application){this.control({
'pub_persacceeditpsw':{beforeshow:this.ppaep_BeforeShow},'pub_persacceeditpsw #btnAccept':{click:this.ppaep_btnAcceptClick},'pub_persacceeditpsw #btnCancel':{click:this.ppaep_btnCancelClick},'pub_persacceeditpsw #usur_pswn':{keypress:this.ppaep_usur_pswnKeyPress}
});},
ppaep_BeforeShow:function(comp,opt){var _menu_id=comp.getMenuId(); var _icon='icon_Modify_90'; _title=(_menu_id=='5931'?'Cambiar Clave de Acceso':'Cambiar Clave de Validación');comp.setIconCls(_icon); comp.setTitle(_title);},
ppaep_btnAcceptClick:function(btn,e,opt){var _win=btn.up('window'); var _frm=_win.down('form');
	if(Ext.isEmpty(_win.down('#persacce_pswa').getValue())){Ext.Msg.alert(translations.mensaje,'Debe indicar la Clave actual',function(){ _win.down('#persacce_pswa').focus(); }); return false;}
	if(_win.down('#persacce_pswn').getValue()==''){Ext.Msg.alert(translations.mensaje,'Debe indicar la NUEVA Clave',function(){ _win.down('#persacce_pswn').focus(); }); return false;}
	if(_win.down('#persacce_pswa').getValue()==_win.down('#persacce_pswn').getValue()){Ext.Msg.alert(translations.mensaje,'Nueva clave, no debe ser igual a clave actual',function(){ _win.down('#persacce_pswn').focus(); }); return false;}
	if(_win.down('#persacce_pswc').getValue()==''){Ext.Msg.alert(translations.mensaje,'Debe indicar la CONFIRMACION de la Clave',function(){ _win.down('#persacce_pswc').focus(); }); return false;}
	if(_win.down('#persacce_pswn').getValue()!=_win.down('#persacce_pswc').getValue()){Ext.Msg.alert(translations.mensaje,'Confirmación de clave es incorrecta, vuela a intentarlo',function(){ _win.down('#persacce_pswc').focus(); }); return false;}
	if(!_frm.getForm().isValid()){return false;} var _persacce_pswa=Siace.util.MD5.encode(_win.down('#persacce_pswa').getValue()); var _persacce_pswn=Siace.util.MD5.encode(_win.down('#persacce_pswn').getValue()); var _vs=fextpub_sessionVariables();
	_frm.getForm().submit({method:'POST',url:'php/public_personas_accesos_save_psw.php',waitTitle:translations.valida_titulo,waitMsg:translations.valida_mensaje01,
		params:{xx0005:'YES',xxType_edit:(_win.getMenuId()=='5931'?'1':'2'),xxPersacce_psw1:_persacce_pswa,xxPersacce_psw2:_persacce_pswn,xxMenu_id:_win.getMenuId(),zzPerssess_key:_vs['ps'],zzPersacce_key:_vs['pa'],zzPers_key:_vs['p'],zzUnieje_key:_vs["ue"]},
		success:function(form,action){var _res=Siace.util.Util.decodeJSON(action.response.responseText);
			if(_res.success){if(_win.getCallStore()!==null){_win.getCallStore().load();}_win.close();}else{Siace.util.Util.showErrorMsg(_res.msg);}
		},failure:function(form,action){Siace.util.Util.showErrorMsg(action.response.responseText);}
	});
},
ppaep_btnCancelClick:function(btn,e,opt){btn.up('window').close();},
ppaep_usur_pswnKeyPress:function(field,e,opt){var _charCode=e.getCharCode();
	if((e.shiftKey&&_charCode>=97&&_charCode<=122) || (!e.shiftKey&&_charCode>=65&&_charCode<=90)){ 
		if(this.getCapsLockToolTip()===undefined){Ext.widget('tool_capslocktooltip',{target:'usur_pswn'});} this.getCapsLockToolTip().show();
	}else{if(this.getCapsLockToolTip()!==undefined){this.getCapsLockToolTip().hide();}}
}
});