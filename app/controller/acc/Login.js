Ext.define("Siace.controller.acc.Login",{extend:"Ext.app.Controller",stores:["array.Years"],views:["acc.Login","tool.CapsLockTooltip","acc.Translation"],
refs:[{ref:"mainPanel",selector:"acc_mainpanel"},{ref:"capsLockToolTip",selector:"tool_capslocktooltip"}],
init:function(application){this.control({
"acc_login":{show:this.al_Show},"acc_login #btnAccept":{click:this.al_btnAcceptClick},"acc_login #btnCancel":{click:this.al_btnCancelClick},
'acc_login #pers_ruc':{blur:this.al_pers_rucBlur,focus:this.al_pers_rucFocus,keypress:this.al_pers_rucKeyPress},
"acc_login form textfield":{specialkey:this.al_textfielSpecialKey},"acc_login #persacce_psw1":{keypress:this.al_persacce_psw1KeyPress},//"acc_header #btnLogout":{click:this.ah_btnLogoutClick}
});},
al_Show:function(comp,opt){var _cboUEK=comp.down('#unieje_key');
	_cboUEK.bindStore(Ext.create('Siace.store.pub.Personas_AccesosLogin'));
	_cboUEK.getStore().on('beforeload',function(str,oper,eOpt){var _prx=str.getProxy();
		_prx.setExtraParam('xxPers_ruc',comp.down('#pers_ruc').getValue()==''?'____Q':comp.down('#pers_ruc').getValue()); _prx.setExtraParam('xxPersacce_estado',1); _prx.setExtraParam('xxType_record','access_login');
	});comp.down('#pers_ruc').focus();
},
al_btnAcceptClick:function(btn,e,opt){var _win=btn.up("window"); var _form=btn.up("form");
	if(Ext.isEmpty(_win.down("#pers_ruc").getValue())){Ext.Msg.alert(translations.mensaje,"Debe indicar su número de RUC",function(){_win.down("#pers_ruc").focus();});return false;}
	if(_win.down("#persacce_login").getValue()==""){Ext.Msg.alert(translations.mensaje,"Debe indicar su LOGIN de acceso",function(){_win.down("#persacce_login").focus();});return false;}
	if(_win.down("#persacce_psw1").getValue()==""){Ext.Msg.alert(translations.mensaje,"Debe indicar su CLAVE de acceso",function(){_win.down("#persacce_psw1").focus();});return false;}
	if(!_form.getForm().isValid()){return false;}
	var _persacce_psw1=Siace.util.MD5.encode(_win.down("#persacce_psw1").getValue()); var _mainpanel=this.getMainPanel(); var _viewport=this.getMainPanel().up("viewport");
	Ext.get(_win.getEl()).mask("Validando información... por favor espere un momento...", "loading");
	Ext.Ajax.request({url:"php/public_personas_accesos_json_validate.php",params:{xx0005:"YES",xxPers_ruc:_win.down("#pers_ruc").getValue(),xxUnieje_key:_win.down("#unieje_key").getValue(),xxPersacce_login:_win.down("#persacce_login").getValue(),xxPersacce_psw1:_persacce_psw1},
		success:function(conn,resp,opt,eOpts){Ext.get(_win.getEl()).unmask(); var _res=Siace.util.Util.decodeJSON(conn.responseText);
			if(_res.success){_win.close(); _viewport.destroy(); var _view=Ext.create("Siace.view.acc.MainViewport"); fextpub_perssess(_res.data[0]); Ext.getCmp("ah_btnKeyGo").hide();Ext.getCmp("ah_btnLogout").show();}else{Siace.util.Util.showErrorMsg(_res.msg);}
		},failure: function(conn,resp,opt,eOpts){Ext.get(_win.getEl()).unmask();Siace.util.Util.showErrorMsg(conn.responseText);}
	});
},
al_btnCancelClick:function(btn,e,opt){btn.up("window").close();},
al_pers_rucBlur:function(txtf,e,opt){this.al_pers_rucSearchAccesos(txtf.up('window'),0);},
al_pers_rucFocus:function(txtf,e,opt){this.al_pers_rucSearchAccesos(txtf.up('window'),1);},
al_pers_rucKeyPress:function(txtf,e,opt){var _charCode=e.getCharCode(); if(_charCode==13){this.al_pers_rucSearchAccesos(txtf.up('window'),13);}},
al_pers_rucSearchAccesos:function(poWin,pcType){var _search=false; var _txtPR=poWin.down('#PERS_RUC'); var _txtpr=poWin.down('#pers_ruc');
	if(pcType==1){_txtPR.setValue(_txtpr.getValue());}else if(pcType==0){if(_txtPR.getValue()!==_txtpr.getValue()){_search=true;}}else if(pcType==13){_search=true; _txtPR.setValue(_txtpr.getValue());}
	if(_search){Ext.get(poWin.getEl()).mask('Validando información... por favor espere un momento...','loading'); var _cboUEK=poWin.down('#unieje_key');
		_cboUEK.getStore().load({callback:function(rec,oper,succ){
			if(rec.length>0){_cboUEK.enable(); _cboUEK.setValue(rec[0].data.unieje_key);}else{_cboUEK.disable(); _cboUEK.setValue('');}
			if(Ext.isEmpty(_cboUEK.getValue())){poWin.down('#persacce_login').setValue('');poWin.down('#persacce_psw1').setValue('');poWin.down('#persacce_login').disable();poWin.down('#persacce_psw1').disable(); poWin.down('#btnAccept').disable();}else{poWin.down('#persacce_login').enable();poWin.down('#persacce_psw1').enable();} Ext.get(poWin.getEl()).unmask();
		}});
	}
},
al_persacce_psw1KeyPress:function(field,e,opt){var _charCode=e.getCharCode();
	if((e.shiftKey&&_charCode>=97&&_charCode<=122)||(!e.shiftKey&&_charCode>=65&&_charCode<=90)){ 
		if(this.getCapsLockToolTip()===undefined){Ext.widget("tool_capslocktooltip",{target:"persacce_psw1"});} this.getCapsLockToolTip().show();
	}else{if(this.getCapsLockToolTip()!==undefined){this.getCapsLockToolTip().hide();}}
},
al_textfielSpecialKey:function(field,e,opt){if(e.getKey()==e.ENTER){var _btnA=field.up("form").down("#btnAccept");_btnA.fireEvent("click",_btnA,e,opt);}},
});