Ext.define("Siace.controller.log.CotizacionesEdit",{extend:"Ext.app.Controller",stores:["array.Mone","array.TipDocIdentVenta","array.Years"],views:["log.CotizacionesEdit"],
init:function(application){this.control({
"log_cotiedit":{beforeshow:this.lce_BeforeShow},"log_cotiedit #btnSave":{click:this.lce_btnSaveClick},"log_cotiedit #btnUndo":{click:this.lce_btnUndoClick},"log_cotiedit #btnExit":{click:this.lce_btnExitClick},
"log_cotiedit #ffiCoti_file1":{change:this.lce_ffiCoti_file1Change},"log_cotiedit #btnCoti_file1Delete":{click:this.lce_btnCoti_file1DeleteClick},"log_cotiedit #btnCoti_file1Download":{click:this.lce_btnCoti_file1DownloadClick},
"log_cotiedit #pers_ruc":{blur:this.lce_pers_rucBlur,focus:this.lce_pers_rucFocus,keypress:this.lce_pers_rucKeypress}
});},
lce_BeforeShow:function(comp,opt){var _TE=comp.getTypeEdit(); var _frm=comp.down("#frmLC");_grdLCD=comp.down("#grdLCD");var _txtCM=comp.down("#coti_monto");var _vs=fextpub_sessVar();var _me=this;
	Ext.Ajax.request({method:"POST",url:"php/logistics_pedidos_json_records.php",params:{xxPed_key:comp.down("#ped_key").getValue(),xxType_record:"winLCE",vs:fext_JE(fextpub_sessVar())},
		success:function(resp,opt){var _res=fext_DJ("",resp); var _mod=fext_CM("log.PedidoWLCE");if(_res.success&&_res.data.length==1){var _dat=_res.data[0];_mod.set(_dat);comp.down("#panLP").down("form").loadRecord(_mod);fextlog_lugares_entregaFilter({obj:comp.down("#lugentr_id"),AB:"NO",dsb:(_dat.tipped_id==5006&&_TE==1?false:true),setVal:false});}}
	});
	fextpub_tipos_pagoFilter({obj:comp.down("#tippag_id"),tpi:15,tippag_escompra:1,AB:"NO",dsb:true});
	if(!fjsIn_array(_TE,[1,3])){return false;}
	if(_TE==1){var _icon="icon_New_90";var _title="Nueva Cotización ::.";var _tr="winLCE"; comp.down("#coti_fecha").setValue(fjsDateCurrent(""));
		var _strLCD=Ext.create("Siace.store.log.Cotizaciones_DetEdit",{listeners:{update:function(str,rec,oper,opt){var _monto=0;str.each(function(recc){_monto+=recc.data.cotidet_pretot;});_txtCM.setValue(_monto);}}});
		var _ce=Ext.create("Ext.grid.plugin.CellEditing",{clicksToEdit:1,listeners:{edit:function(editor,e,opt){var _rec=e.record;_rec.set("cotidet_pretot",fjsRound(_rec.data.cotidet_cantid*_rec.data.cotidet_preuni,2));}}});_ce.init(_grdLCD);
	}else{var _icon="icon_Query_90";var _title="Consulta de Cotización ::.";var _tr="query";var _strLCD=fext_CS("log.Cotizaciones_DetEdit");}

	_grdLCD.bindStore(_strLCD);_grdLCD.getView().refresh();_strLCD.sort("cotidet_item","ASC");
	_strLCD.on("beforeload",function(str,oper,opt){str.getProxy().setExtraParam("xxType_record",_tr);if(comp.getTypeEdit()==1){str.getProxy().setExtraParam("xxType_query","cotiza_"+comp.down("#ped_key").getValue());} str.getProxy().setExtraParam("xxOrder_by",str.sorters.items[0].property+" "+str.sorters.items[0].direction);});

	if(_TE==1){comp.down("#mone_id").setValue(1); _strLCD.load();}
	else{
		_frm.load({method:"POST",url:"php/logistics_cotizaciones_json_records.php",params:{xxCoti_key:comp.getCallKey(),xxType_record:"form",xxMenu_id:comp.getMenuId(),zzPerssess_key:_vs["ps"],zzPersacce_key:_vs["pa"],zzPers_key:_vs["p"],zzUnieje_key:_vs["ue"]},waitMsg:"Loading...",
			success:function(form,act){try {var _mod=fext_CM("log.CotizacionEdit");var _res=fext_DJ(act);if(_res.data[0]){_mod.set(_res.data[0]);_frm.loadRecord(_mod);var _dat=_res.data[0];comp.down("#coti_nro").setValue(fjsLpad(_dat.coti_nro,6,0));comp.down("#grdLCD").getStore().load({params:{xxCoti_key:comp.getCallKey(),xxType_record:"edit"}});}}catch(x){fext_MsgC(x.Message);}},failured:function(form,act){fext_MsgFL(act);}
		});
		comp.down("#coti_plazo").disable();comp.down("#coti_vigencia").disable();comp.down("#coti_garantia").disable();comp.down("#tippag_id").disable();comp.down("#lugentr_id").disable();comp.down("#coti_observ").setReadOnly(true);comp.down("#btnSave").disable();comp.down("#btnUndo").disable();comp.down("#btnExit").enable();
	}
	comp.setIconCls(_icon);comp.setTitle(_title);
},
lce_btnSaveClick:function(btn,e,opt){var _win=btn.up("window");var _frm=_win.down("#frmLC");
	if(fext_IE(_win.down("#coti_monto"))||_win.down("#coti_monto").getValue()*1<=0){fext_MsgA("IMPORTE de cotización no puede ser cero(0)");return false;}
	if(fext_IE(_win.down("#coti_vigencia"))||_win.down("#coti_vigencia").getValue()*1<=0){fext_MsgA("Debe indicar la VIGENCIA de la cotización",_win.down("#coti_vigencia"));return false;}
	if(fext_IE(_win.down("#coti_plazo"))||_win.down("#coti_plazo").getValue()*1<=0){fext_MsgA("Debe indicar la cantidad de días para el "+_win.down("#coti_plazo").getFieldLabel().trim()+" de la cotización",_win.down("#coti_plazo"));return false;}
	if(fext_IE(_win.down("#tippag_id"))||_win.down("#tippag_id").getValue()*1<=0){fext_MsgA("Debe indicar el TIPO DE PAGO de la cotización",_win.down("#tippag_id"));return false;}
	var _det="";var _coti_monto=0;var _recLCD=_win.down("#grdLCD").getStore().getRange();
	for(var _i=0;_i<_recLCD.length;_i++){
		if(Ext.isEmpty(_recLCD[_i].get("cotidet_preuni"))){fext_MsgA("Precio Unitario en detalle no pueder ser cero (0)");return false;}
		_det+=(_i==0?"":",")+"{*"+_recLCD[_i].get("cotidet_key")+","+_i+","+_recLCD[_i].get("peddet_key")+","+_recLCD[_i].get("bs_key")+","+_recLCD[_i].get("cotidet_cantid")+","+_recLCD[_i].get("cotidet_preuni")+","+_recLCD[_i].get("cotidet_pretot")+",*"+_recLCD[_i].get("cotidet_marca")+",*"+_recLCD[_i].get("cotidet_modelo")+"}";
		_coti_monto=fjsRound(_coti_monto*1 + _recLCD[_i].get("cotidet_pretot")*1,2);
	}
	if(_det==""){fext_MsgA("Documento no registra detalle");return false;}
	if(!_frm.getForm().isValid()){return false;}
	Ext.Msg.confirm(trnslt.cnf,trnslt.msg_qst_save,function(b){if(b=="yes"){
		_frm.getForm().submit({method:"POST",url:"php/logistics_cotizaciones_save.php",waitMsg:trnslt.msg_wait_save,params:{xx0005:"YES",xxType_edit:_win.getTypeEdit(),xxCoti_key:_win.getCallKey(),xxCoti_fecha:_win.down("#coti_fecha").getSubmitValue(),xxTippag_id:_win.down("#tippag_id").getValue(),xxCoti_monto:_win.down("#coti_monto").getValue(),xxLugentr_id:_win.down("#lugentr_id").getValue(),xxDet:_det,xxMenu_id:_win.getMenuId(),vs:fext_JE(fextpub_sessVar())},
			success:function(form,act){var _res=fext_DJ(act);if(_res.success){if(_win.getTypeEdit()==1){fext_CC("log.CotizacionesOK");var _winF=fext_CW("log.CotizacionesOK");_winF.setCallKey(_res.key);_winF.setCallStore(_win.getCallStore());_winF.down("#btnAccept").setVisible(false);_winF.down("#btnCancel").setVisible(false);_winF.down("#btnPrinter").setVisible(true);_winF.down("#btnExit").setVisible(true);_win.close();_winF.show();}else{if(_win.getCallStore()!==null){_win.getCallStore().load();}_win.close();}}else{fext_MsgE(_res.msg);}},failure:function(form,act){fext_MsgFS(act);}
		});
	}});
},
lce_btnUndoClick:function(btn,e,opt){btn.up("window").close();},
lce_btnExitClick:function(btn,e,opt){btn.up("window").close();},
lce_ffiCoti_file1Change:function(file,val,opt){var _win=file.up("window");fext_FileReader(file,/pdf/,"[PDF]",10485760,"10 MB",_win.down("#btnCoti_file1Delete"),_win.down("#btnCoti_file1Download"),false);},
lce_btnCoti_file1DeleteClick:function(btn,e,opt){var _win=btn.up("window");btn.disable();
	_win.down("#ffiCoti_file1").reset();_win.down("#ffiCoti_file1").setValue("");_win.down("#ffiCoti_file1").setRawValue("");_win.down("#ffiCoti_file1").setReadOnly(false);
	_win.down("#coti_file1").setValue("");btn.disable();_win.down("#btnCoti_file1Download").disable();
},
lce_btnCoti_file1DownloadClick:function(btn,e,opt){var _win=btn.up("window");var _file=_win.down("#ffiCoti_file1").fileInputEl.dom.files[0];
	var _src="php/resources/download_file.php?xxTable=logistics_cotizaciones&xxField=file1&xxFile_name="+_win.getCallKey()+"_"+_win.down("#coti_file1").getValue();
	fext_FileDownload(_file,_src);
}
});