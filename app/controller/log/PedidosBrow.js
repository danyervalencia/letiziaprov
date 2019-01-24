Ext.define("Siace.controller.log.PedidosBrow",{extend:"Ext.app.Controller",stores:["array.Years"],views:["log.PedidosBrow"],
init:function(application){this.control({
"log_pedbrow":{beforerender:this.lpb_BeforeRender},"log_pedbrow #panLP #opc_id":{change:this.lpb_plp_opc_idChange},
"log_pedbrow #panLP #btnEttr":{click:this.lpb_plp_btnEttrClick},"log_pedbrow #panLP #btnAttach":{click:this.lpb_plp_btnAttachClick},"log_pedbrow #panLP #btnCotiza":{click:this.lpb_plp_btnCotizaClick},
"log_pedbrow #panLP #area_key":{change:this.lpb_plp_area_keyChange},"log_pedbrow #panLP #fechaini":{change:this.lpb_plp_fechainiChange},"log_pedbrow #panLP #fechafin":{change:this.lpb_plp_fechafinChange},
"log_pedbrow #panLP #grdLP":{cellclick:this.lpb_plp_grdLPCellClick,selectionchange:this.lpb_plp_grdLPSelectionChange},
"log_pedbrow #panLP #meta_id":{change:this.lpb_plp_meta_idChange},"log_pedbrow #panLP #ped_nro":{change:this.lpb_plp_ped_nroChange,keypress:this.lpb_plp_ped_nroKeypress},"log_pedbrow #panLP #tarea_key":{change:this.lpb_plp_tarea_keyChange},"log_pedbrow #panLP #tipped_id":{change:this.lpb_plp_tipped_idChange},"log_pedbrow #panLP #year_id":{change:this.lpb_plp_year_idChange},
"log_pedbrow #tabLPD":{activate:this.lpb_tlpd_Activate}
});},
lpb_BeforeRender:function(comp,opt){var _mi=comp.getMenuId(); var _panLP=comp.down("#panLP"); var _tabLPD=comp.down("#tabLPD"); var _tabLC=comp.down("#tabLC"); var _grdLP=_panLP.down("#grdLP");var _pagLP=_panLP.down("#pagLP");var _tab=comp.down("#tab01");var _vs=fextpub_sessVar();var _me=this;
	fextbud_metasParameters({pan:_panLP});fextpub_yearsValue(_panLP.down("#year_id"),0);fextpub_areasFilter({obj:_panLP.down("#area_key"),filt:false,no_usk:"NoT"});
	fextpub_tabgenFilt({obj:_panLP.down("#tipped_id"),tgp:5005,TR:"combo_abrev"});if(_mi==5911){comp.down("#btnCotiza").setVisible(true);}

	var _strLPD=fext_CS("log.Pedidos_DetBrow");var _grdLPD=_tabLPD.down("#grdLPD");var _pagLPD=_tabLPD.down("#pagLPD");
	_grdLPD.bindStore(_strLPD);_pagLPD.bindStore(_strLPD);_strLPD.sort("peddet_item","ASC");
	_strLPD.on("beforeload",function(str,oper,opt){var _rec=fext_grdSR(_grdLP);var _prx=str.getProxy();_prx.setExtraParam("xxPed_key",_rec.data.ped_key);_prx.setExtraParam("xxType_record","gridLPBL");_prx.setExtraParam("xxPag",1);});

	var _strLP=fext_CS("log.PedidosBrow");_grdLP.bindStore(_strLP);_pagLP.bindStore(_strLP);_strLP.sort("ped_nro","DESC");
	_strLP.on("beforeload",function(str,oper,eOpt){var _prx=str.getProxy();_panLP.down("#btnCotiza").disable();
		_prx.setExtraParam("xxYear_id",_panLP.down("#year_id").getValue());_prx.setExtraParam("xxUnieje_key",Ext.getCmp("ah_txtUnieje_key").getValue());_prx.setExtraParam("xxTipped_id",_panLP.down("#tipped_id").getValue());_prx.setExtraParam('xxFechaini',_panLP.down('#fechaini').getSubmitData());_prx.setExtraParam('xxFechafin',_panLP.down('#fechafin').getSubmitData());_prx.setExtraParam("xxArea_key",_panLP.down("#area_key").getValue());
		_prx.setExtraParam("xxType_record","grd");_prx.setExtraParam("xxType_query","grdLPBL");_prx.setExtraParam("vs",fext_JE(_vs));_prx.setExtraParam("xxMenu_id",comp.getMenuId());_prx.setExtraParam("xxPag",1);
	});_strLP.load();
},
lpb_tabsActivate:function(poComp,poTab){if(!fext_grdSR(poComp.down("#grdLP"))){return false;}poTab.down("grid").getStore().load();},
lpb_tabsClean:function(poComp,pbBool,pnFase,pn511){var _mod=fext_CM("log.PedidoWindow");
	var _tabLPD=poComp.down("#tabLPD");var _pagLPD=_tabLPD.down("#pagLPD");var _strLPD=_pagLPD.getStore();fext_gridClean(_strLPD,_pagLPD);_tabLPD.down("form").loadRecord(_mod);_pagLPD.setDisabled(pbBool);	
},
lpb_plp_ViewEdit:function(poComp,pcTE){var _rec=fext_grdSR(poComp.down("#grdLP"));if(!_rec){return false;}
	fext_CC("log.Pedidos").lp_View({comp:poComp,TE:pcTE,mi:poComp.up("panel").getMenuId()});
},
lpb_plp_Clean:function(poComp){var _pag=poComp.down("#pagLP");var _str=_pag.getStore();fext_gridClean(_str,_pag);
	poComp.down("#btnSolicitud").disable();poComp.down("#btnCotiza").disable();this.lpb_tabsClean(poComp.up("log_pedbrow"),true);
},
lpb_plp_opc_idChange:function(cbo,newVal,oldVal,opt){},
lpb_plp_btnEttrClick:function(btn,e,opt){this.lpb_plp_ViewEdit(btn.up("#panLP"),5001);},
lpb_plp_btnAttachClick:function(btn,e,opt){this.lpb_plp_ViewEdit(btn.up("#panLP"),59);},
lpb_plp_btnCotizaClick:function(btn,e,opt){var _panLP=btn.up("#panLP");var _recLP=fext_grdSR(_panLP.down("#grdLP"));if(!_recLP){return false;}fext_mask(_panLP);
	fext_CC("log.CotizacionesEdit");var _win=fext_CW("log.CotizacionesEdit");
	_win.setTypeEdit(1);_win.setMenuId(_panLP.up("log_pedbrow").getMenuId());_win.setCallStore(_panLP.down("#grdLP").getStore());_win.down("#ped_key").setValue(_recLP.data.ped_key);_win.show();fext_unmask(_panLP);
},
lpb_plp_area_keyChange:function(cbo,newVal,oldVal,opt){fextbud_metasLoad({pan:cbo.up("#panLP")});this.lpb_plp_Clean(cbo.up("#panLP"));},
lpb_plp_fechainiChange:function(datf,newVal,oldVal,opt){this.lpb_plp_Clean(datf.up("#panLP"));},
lpb_plp_fechafinChange:function(datf,newVal,oldVal,opt){this.lpb_plp_Clean(datf.up("#panLP"));},
lpb_plp_grdLPCellClick:function(cell,td,cellI,rec,tr,rowI,e,opt){var _pan=cell.up("log_pedbrow"); _pan.down("#tab01").getActiveTab().down("grid").getStore().load();},
lpb_plp_grdLPSelectionChange:function(mod,rec,opt){if(rec.length==1){var _pan=mod.view.panel.up("log_pedbrow");var _panLP=_pan.down("#panLP");
	if(_pan.getMenuId()==5911){_panLP.down("#btnEttr").enable();_panLP.down("#btnAttach").setDisabled(rec[0].data.pedettr_file==""?true:false);_panLP.down("#btnCotiza").setDisabled(rec[0].data.coti_key==""?false:true);}
	this.lpb_tabsClean(_pan,false);
	Ext.Ajax.request({method:"POST",url:"php/logistics_pedidos_json_records.php",params:{xxPed_key:rec[0].data.ped_key,xxType_record:"win",xxMenu_id:_pan.getMenuId(),xxOrder_by:"ped_key",vs:fext_JE(fextpub_sessVar())},
		success:function(resp,opt){var _res=fext_DJ("",resp);var _mod=fext_CM("log.PedidoWindow");var _tabLPD=_panLP.up("panel").down("#tabLPD");
			if(_res.success&&_res.data.length==1){_mod.set(_res.data[0]);}_tabLPD.down("form").loadRecord(_mod);
		}
	});
}},
lpb_plp_meta_idChange:function(cbo,newVal,oldVal,opt){if(oldVal!==undefined){fextbud_tareasLoad({pan:cbo.up("#panLP")});this.lpb_plp_Clean(cbo.up("#panLP"));}},
lpb_plp_ped_nroChange:function(txtf,newVal,oldVal,opt){this.lpb_plp_Clean(txtf.up("#panLP"));},
lpb_plp_ped_nroKeypress:function(txtf,e,opt){if(e.getCharCode()==13){txtf.up("#panLP").down("#grdLP").getStore().load();}},
lpb_plp_tipped_idChange:function(cbo,newVal,oldVal,opt){if(oldVal!==undefined){this.lpb_plp_Clean(cbo.up("#panLP"));}},
lpb_plp_year_idChange:function(cbo,newVal,oldVal,opt){if(oldVal!==undefined){fextbud_metasLoad({pan:cbo.up("#panLP")});this.lpb_plp_Clean(cbo.up("#panLP"));}},
lpb_tlpd_Activate:function(comp,opt){this.lpb_tabsActivate(comp.up("log_pedbrow"),comp);},
});