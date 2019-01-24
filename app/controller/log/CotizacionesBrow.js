Ext.define("Siace.controller.log.CotizacionesBrow",{extend:"Ext.app.Controller",stores:["array.YearsAB"],views:["log.CotizacionesBrow"],
init:function(application){this.control({
"log_cotibrow":{beforerender:this.lcb_BeforeRender},"log_cotibrow #panLC #btnAnnular":{click:this.lcb_plc_btnAnnularClick},"log_cotibrow #panLC #btnPrinter":{click:this.lcb_plc_btnPrinterClick},"log_cotibrow #panLC #btnCCP":{click:this.lcb_plc_btnCCClick},"log_cotibrow #panLC #btnCCE":{click:this.lcb_plc_btnCCClick},
"log_cotibrow #panLC #area_key":{change:this.lcb_plc_area_keyChange},"log_cotibrow #panLC #fechaini":{change:this.lcb_plc_fechainiChange},"log_cotibrow #panLC #fechafin":{change:this.lcb_plc_fechafinChange},
"log_cotibrow #panLC #grdLC":{cellclick:this.lcb_plc_grdLCCellClick,selectionchange:this.lcb_plc_grdLCSelectionChange},
"log_cotibrow #panLC #meta_id":{change:this.lcb_plc_meta_idChange},"log_cotibrow #panLC #coti_nro":{change:this.lcb_plc_coti_nroChange,keypress:this.lcb_plc_coti_nroKeypress},"log_cotibrow #panLC #year_id":{change:this.lcb_plc_year_idChange},
});},
lcb_BeforeRender:function(comp,opt){var _mi=comp.getMenuId();var _panLC=comp.down("#panLC");var _tabLCD=comp.down("#tabLCD");var _grd=_panLC.down("#grdLC");var _pag=_panLC.down("#pagLC");var _tab=comp.down("#tab01");var _vs=fextpub_sessVar();var _me=this;
	fextbud_metasParameters({pan:_panLC});fextpub_areasFilter({obj:_panLC.down("#area_key")});
	var _strLCD=fext_CS("log.Cotizaciones_DetBrow");var _grdLCD=_tabLCD.down("#grdLCD");var _pagLCD=_tabLCD.down("#pagLCD");_grdLCD.bindStore(_strLCD);_pagLCD.bindStore(_strLCD);_strLCD.sort("cotidet_item","ASC");
	_strLCD.on("beforeload",function(str,oper,opt){var _rec=fext_grdSR(_grd);var _prx=str.getProxy();_prx.setExtraParam("xxCoti_key",_rec.data.coti_key);_prx.setExtraParam("xxType_record","grd");_prx.setExtraParam("xxPag",1);});

	var _str=fext_CS("log.CotizacionesBrow");_grd.bindStore(_str);_pag.bindStore(_str);_str.sort("coti_documento","DESC");
	_str.on("beforeload",function(str,oper,opt){_panLC.down("#btnAnnular").disable();_panLC.down("#btnPrinter").disable();_panLC.down("#btnCCP").disable();_panLC.down("#btnCCE").disable();_me.lcb_tabsClean(comp,true);var _prx=str.getProxy();
		_prx.setExtraParam("xxYear_id",_panLC.down("#year_id").getValue());_prx.setExtraParam("xxUnieje_key",Ext.getCmp("ah_txtUnieje_key").getValue());_prx.setExtraParam("xxCoti_nro",_panLC.down("#coti_nro").getValue());_prx.setExtraParam("xxFechaini",_panLC.down("#fechaini").getSubmitData());_prx.setExtraParam("xxFechafin",_panLC.down("#fechafin").getSubmitData());
		_prx.setExtraParam("xxArea_key",_panLC.down("#area_key").getValue());_prx.setExtraParam("xxMeta_id",_panLC.down("#meta_id").getValue());
		_prx.setExtraParam("xxType_record","grd");_prx.setExtraParam("vs",fext_JE(_vs));_prx.setExtraParam("xxMenu_id",comp.getMenuId());_prx.setExtraParam("xxPag",1);
	});_str.load();
},
lcb_tabsActivate:function(poComp,poTab){if(!fext_grdSR(poComp.down("#grdLO"))){return false;}poTab.down("grid").getStore().load();},
lcb_tabsClean:function(poComp,pbBool){var _mod=fext_CM("log.CotizaWin");var _tabLCD=poComp.down("#tabLCD");var _pagLCD=_tabLCD.down("#pagLCD");var _strLCD=_pagLCD.getStore();fext_gridClean(_strLCD,_pagLCD);_tabLCD.down("form").loadRecord(_mod);_pagLCD.setDisabled(pbBool);},
lcb_plc_Clean:function(poComp){var _pag=poComp.down("#pagLC");var _str=_pag.getStore();fext_gridClean(_str,_pag);poComp.down("#btnPrinter").disable();this.lcb_tabsClean(poComp.up("log_cotibrow"),true);},
lcb_plc_viewEdit:function(poComp, pcTE){},
lcb_plc_btnAnnularClick:function(btn,e,opt){var _panLC=btn.up("#panLC");
	if(opt==undefined){var _rec=fext_grdSR(_panLC.down("#grdLC"));if(!_rec){return false;}var _d=_rec.data;
		Ext.Msg.confirm("Confirmación","¿Esta Ud. seguro de ANULAR la cotización seleccionada?",function(b){if(b=="yes"){fext_CC("pub.Personas_AccesosPsw2");var _win=fext_CW("pub.Personas_AccesosPsw2");_win.setCallButton(btn);_win.setCallKey(_d.coti_key);_win.down("#subtitle").setValue(_d.doc_abrev+"/ "+_d.coti_documento);_win.setFormType(10);_win.show();}});
	}else{var _win=opt.win;var _str=_panLC.down("#grdLC").getStore();var _mi=_panLC.up("log_cotibrow").getMenuId();fext_mask(_panLC);
		Ext.Ajax.request({url:"php/logistics_cotizaciones_delete.php",params:{xx0010:"YES",xxType_edit:10,xxCoti_key:opt.key,xxPersacce_psw2:opt.persacce_psw2,xxCoti_observ:opt.observ,xxMenu_id:_mi,vs:fext_JE(fextpub_sessVar())},success:function(resp,opt){var _res=fext_DJ("",resp);if(_res.success){_win.close();_str.load({callback:function(rec){fext_unmask(_panLC);}});}else{fext_unmask(_panLC);fext_MsgE(_res.msg);}},failure:function(resp,opt){fext_unmask(_panLC);fext_MsgE(resp.responseText);}});
	}
},
lcb_plc_btnPrinterClick:function(btn,e,opt){var _panLC=btn.up("#panLC");fext_CC("log.Cotizaciones").lc_Printer({comp:_panLC,mi:_panLC.up("log_cotibrow").getMenuId()});},
lcb_plc_btnCCClick:function(btn,e,opt){var _pan=btn.up("log_cotibrow");var _rec=fext_grdSR(_pan.down("#grdLC"));if(!_rec){return false;}var _vs=fextpub_sessVar();
	fext_pdf("","C.C."+"/ "+_rec.data.ped_documento,"php/pdf/pdf_logistics_pedidos_comparative.php?xxPed_key="+_rec.data.ped_key+"&zzPerssess_key="+_vs["ps"]+"&zzPersacce_key="+_vs["pa"]+"&zzPers_key="+_vs["p"]+"&zzUnieje_key="+_vs["ue"]+"&xxMenu_id="+_pan.getMenuId()+"&xxFormat="+(btn.getItemId()=="btnCCP"?32:33));
},
lcb_plc_area_keyChange:function(cbo,newValue,oldValue,opt){this.lcb_plc_Clean(cbo.up("#panLC"));},
lcb_plc_fechainiChange:function(datf,newVal,oldVal,opt){this.lcb_plc_Clean(datf.up("#panLC"));},
lcb_plc_fechafinChange:function(datf,newVal,oldVal,opt){this.lcb_plc_Clean(datf.up("#panLC"));},
lcb_plc_grdLCCellClick:function(cell,td,cellI,rec,tr,rowI,e,opt){var _pan=cell.up("log_cotibrow");_pan.down("#tab01").getActiveTab().down("grid").getStore().load();},
lcb_plc_grdLCSelectionChange:function(mod,rec,opt){if(rec.length==1){var _panLC=mod.view.panel.up("#panLC");var _flga=rec[0].data.coti_flga;var _ff=Ext.Date.format(rec[0].data.pedweb_fechafin,"Y-m-d");
	_panLC.down("#btnAnnular").setDisabled(_flga==98||_ff==""||fjsDateCurrent()>_ff?true:false);_panLC.down("#btnPrinter").setDisabled(_flga==98?true:false);_panLC.down("#btnCCP").setDisabled(_ff==""||_ff>=fjsDateCurrent()?true:false);_panLC.down("#btnCCE").setDisabled(_ff==""||_ff>=fjsDateCurrent()?true:false);
	this.lcb_tabsClean(_panLC.up("panel"),false);
	Ext.Ajax.request({method:"POST",url:"php/logistics_cotizaciones_json_records.php",params:{xxCoti_key:rec[0].data.coti_key,xxType_record:"win",xxOrder_by:"coti_key",vs:fext_JE(fextpub_sessVar())},
		success:function(resp,opt){var _res=fext_DJ("",resp);var _mod=fext_CM("log.CotizaWin");var _tabLCD=_panLC.up("panel").down("#tabLCD");if(_res.success&&_res.data.length==1){_mod.set(_res.data[0]);}_tabLCD.down("form").loadRecord(_mod);}
	});
}},
lcb_plc_meta_idChange:function(cbo,newVal,oldVal,opt){if(oldVal!==undefined){this.lcb_plc_Clean(cbo.up("#panLC"));}},
lcb_plc_coti_nroChange:function(txtf,newVal,oldVal,opt){this.lcb_plc_Clean(txtf.up("#panLC"));},
lcb_plc_coti_nroKeypress:function(txtf,e,opt){if(e.getCharCode()==13){txtf.up("log_cotibrow").down("#grdLO").getStore().load();}},
lcb_plc_year_idChange:function(cbo,newVal,oldVal,opt){if(oldVal!==undefined){fextbud_metasLoad({pan:cbo.up("#panLC")});this.lcb_plc_Clean(cbo.up("#panLC"));}}
});