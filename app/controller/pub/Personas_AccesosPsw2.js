Ext.define("Siace.controller.pub.Personas_AccesosPsw2",{extend:"Ext.app.Controller",views:["pub.Personas_AccesosPsw2","tool.CapsLockTooltip"],refs:[{ref:"capsLockToolTip",selector:"tool_capslocktooltip"}],
init:function(application){this.control({"pub_persaccepsw2":{beforeshow:this.ppap_beforeShow,show:this.ppap_Show},"pub_persaccepsw2 #btnAccept":{click:this.ppap_btnAcceptClick},"pub_persaccepsw2 #btnCancel":{click:this.ppap_btnCancelClick},"pub_persaccepsw2 #usur_psw2":{keypress:this.ppap_usur_psw2KeyPress}});},
ppap_beforeShow:function(comp,opt){comp.down("#persacce_psw2").focus();
	if(comp.getWarning()!==""){comp.down("#warning").setValue(comp.getWarning());}
	else if(comp.getFormType()==7){comp.down("#warning").setValue(trnslt.warning07);}
	else if(comp.getFormType()==10){comp.down("#warning").setValue(trnslt.warning10);}
},
ppap_Show:function(comp,opt){comp.down("#persacce_psw2").focus()},
ppap_btnAcceptClick:function(btn,e,opt){var _win=btn.up("window");var _pap=_win.down("#persacce_psw2").getValue();if(_pap==""){return false;}_pap=Siace.util.MD5.encode(_pap);
	if(_win.getAlert()!=""&&_win.down("#observ").getValue().length<=20){fext_MsgA(_win.getAlert(),_win.down("#observ"));return false;}
	if(_win.getFormType()==07&&_win.down("#observ").getValue().length<=20){fext_MsgA("Debe indicar el motivo por el cual se va a ELIMINAR el registro seleccionado (min. 20 dígitos)",_win.down("#observ"));return false;}
	if(_win.getFormType()==10&&_win.down("#observ").getValue().length<=20){fext_MsgA("Debe indicar el motivo por el cual se va a ANULAR el registro seleccionado (min. 20 dígitos)",_win.down("#observ"));return false;}
	_win.getCallButton().fireEvent("click",_win.getCallButton(),"",{"key":_win.getCallKey(),"persacce_psw2":_pap,"observ":_win.down("#observ").getValue(),"win":_win});
},
ppap_btnCancelClick:function(btn,e,opt){btn.up("window").close();},
ppap_usur_psw2KeyPress:function(field,e,opt){var _charCode=e.getCharCode();
	if((e.shiftKey&&_charCode>=97&&_charCode<=122)||(!e.shiftKey&&_charCode>=65&&_charCode<=90)){
		if(this.getCapsLockToolTip()===undefined){Ext.widget("tool_capslocktooltip",{target:"txtPersacce_psw2"});}this.getCapsLockToolTip().show();
	}else{if(this.getCapsLockToolTip()!==undefined){this.getCapsLockToolTip().hide();}}
}
});