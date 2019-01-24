Ext.define("Siace.controller.log.OrdenesBrow",{extend:"Ext.app.Controller",stores:["array.DocOrdenAB","array.YearsAB"],views:["log.OrdenesBrow"],
init:function(application){this.control({
"log_ordenbrow":{beforerender:this.lob_BeforeRender},
"log_ordenbrow #panLO #btnPrinter":{click:this.lob_plo_btnPrinterClick},"log_ordenbrow #panLO #btnFases":{click:this.lob_plo_btnFasesClick},
"log_ordenbrow #panLO #area_key":{change:this.lob_plo_area_keyChange},"log_ordenbrow #panLO #doc_id":{change:this.lob_plo_doc_idChange},"log_ordenbrow #panLO #fechaini":{change:this.lob_plo_fechainiChange},"log_ordenbrow #panLO #fechafin":{change:this.lob_plo_fechafinChange},
"log_ordenbrow #panLO #grdLO":{cellclick:this.lob_plo_grdLOCellClick,selectionchange:this.lob_plo_grdLOSelectionChange},
"log_ordenbrow #panLO #meta_id":{change:this.lob_plo_meta_idChange},"log_ordenbrow #panLO #orden_nro":{change:this.lob_plo_orden_nroChange,keypress:this.lob_plo_orden_nroKeypress},"log_ordenbrow #panLO #year_id":{change:this.lob_plo_year_idChange}
});},
lob_BeforeRender:function(comp,opt){var _mi=comp.getMenuId();var _panLO=comp.down("#panLO");var _tabLOD=comp.down("#tabLOD");var _tabLOP=comp.down("#tabLOP");var _tabLI=comp.down("#tabLI");var _grd=_panLO.down("#grdLO");var _pag=_panLO.down("#pagLO");var _tab=comp.down("#tab01");var _vs=fextpub_sessVar();var _me=this;
	fextbud_metasParameters({pan:_panLO});fextpub_yearsValue(_panLO.down("#year_id"),0);fextpub_areasFilter({obj:_panLO.down("#area_key"),filt:false,no_usk:"NoT"});

	var _strLOD=fext_CS("log.Ordenes_DetBrow");var _grdLOD=_tabLOD.down("#grdLOD");var _pagLOD=_tabLOD.down("#pagLOD");_grdLOD.bindStore(_strLOD);_pagLOD.bindStore(_strLOD);_strLOD.sort("ordendet_item","ASC");
	_strLOD.on("beforeload",function(str,oper,opt){var _rec=fext_grdSR(_grd);var _prx=str.getProxy();
		_prx.setExtraParam("xxOrden_key",_rec.data.orden_key);_prx.setExtraParam("xxType_record","grdLOB");_prx.setExtraParam("xxPag","1");
	});

	var _str=fext_CS("log.OrdenesBrow");_grd.bindStore(_str);_pag.bindStore(_str);_str.sort("orden_documento","DESC");
	_str.on("beforeload",function(str,oper,opt){_panLO.down("#btnPrinter").disable();_panLO.down("#btnFases").disable();_me.lob_tabsClean(comp,true,"");var _prx=str.getProxy();
		_prx.setExtraParam("xxYear_id",_panLO.down("#year_id").getValue());_prx.setExtraParam("xxUnieje_key",Ext.getCmp("ah_txtUnieje_key").getValue());_prx.setExtraParam("xxDoc_id",_panLO.down("#doc_id").getValue());_prx.setExtraParam("xxOrden_nro",_panLO.down("#orden_nro").getValue());_prx.setExtraParam("xxFechaini",_panLO.down("#fechaini").getSubmitData());_prx.setExtraParam("xxFechafin",_panLO.down("#fechafin").getSubmitData());
		_prx.setExtraParam("xxArea_key",_panLO.down("#area_key").getValue());_prx.setExtraParam("xxMeta_id",_panLO.down("#meta_id").getValue());
		_prx.setExtraParam("xxType_record","grd");_prx.setExtraParam("vs",Ext.JSON.encode(_vs));_prx.setExtraParam("xxMenu_id",comp.getMenuId());_prx.setExtraParam("xxPag","1");
	});_str.load();
},
lob_tabsActivate:function(poComp,poTab){if(!fext_grdSR(poComp.down("#grdLO"))){return false;}poTab.down("grid").getStore().load();},
lob_tabsClean:function(poComp,pbBool,pcFlga){var _mod=fext_CM("log.OrdenWindow");var _tabLOD=poComp.down("#tabLOD");var _pagLOD=_tabLOD.down("#pagLOD");var _strLOD=_pagLOD.getStore();fext_gridClean(_strLOD,_pagLOD);_tabLOD.down("form").loadRecord(_mod);_pagLOD.setDisabled(pbBool);},
lob_plo_Clean:function(poComp){var _pag=poComp.down("#pagLO");var _str=_pag.getStore();fext_gridClean(_str,_pag);
	poComp.down("#btnPrinter").disable(); poComp.down("#btnFases").disable();this.lob_tabsClean(poComp.up("log_ordenbrow"),true);
},
lob_plo_viewEdit:function(poComp, pcTE){},
lob_plo_btnPrinterClick:function(btn,e,opt){var _panLO=btn.up("#panLO");fext_CC("log.Ordenes").lo_Printer({comp:_panLO,mi:_panLO.up("panel").getMenuId()});},
lob_plo_btnFasesClick:function(btn,e,opt){fext_CC("log.Ordenes").lo_Fases({comp:btn.up("#panLO")});},
lob_plo_area_keyChange:function(cbo,newValue,oldValue,opt){this.lob_plo_Clean(cbo.up("#panLO"));},
lob_plo_doc_idChange:function(cbo,newVal,oldVal,opt){if(oldVal!==undefined){this.lob_plo_Clean(cbo.up("#panLO"));}},
lob_plo_fechainiChange:function(datf,newVal,oldVal,opt){this.lob_plo_Clean(datf.up("#panLO"));},
lob_plo_fechafinChange:function(datf,newVal,oldVal,opt){this.lob_plo_Clean(datf.up("#panLO"));},
lob_plo_grdLOCellClick:function(cell,td,cellI,rec,tr,rowI,e,opt){var _pan=cell.up("log_ordenbrow"); _pan.down("#tab01").getActiveTab().down("grid").getStore().load();},
lob_plo_grdLOSelectionChange:function(mod,rec,opt){if(rec.length==1){var _panLO=mod.view.panel.up("#panLO");var _flga=rec[0].data.orden_flga;var _expe=rec[0].data.expe_nro;
	_panLO.down("#btnPrinter").enable();_panLO.down("#btnFases").setDisabled(_expe*1<=0?true:false);
	this.lob_tabsClean(_panLO.up("panel"),false,_flga);
	Ext.Ajax.request({method:"POST",url:"php/logistics_ordenes_json_records.php",params:{xxOrden_key:rec[0].data.orden_key,xxType_record:"win",xxOrder_by:"orden_key",vs:fext_JE(fextpub_sessVar())},
		success:function(resp,opt){var _res=Siace.util.Util.decodeJSON(resp.responseText);var _mod=fext_CM("log.OrdenWindow");var _tabLOD=_panLO.up("panel").down("#tabLOD");
			if(_res.success&&_res.data.length==1){_mod.set(_res.data[0]);}_tabLOD.down("form").loadRecord(_mod);
		}
	});
}},
lob_plo_meta_idChange:function(cbo,newVal,oldVal,opt){if(oldVal!==undefined){this.lob_plo_Clean(cbo.up("#panLO"));}},
lob_plo_orden_nroChange:function(txtf,newVal,oldVal,opt){this.lob_plo_Clean(txtf.up("#panLO"));},
lob_plo_orden_nroKeypress:function(txtf,e,opt){if(e.getCharCode()==13){txtf.up("log_ordenbrow").down("#grdLO").getStore().load();}},
lob_plo_year_idChange:function(cbo,newVal,oldVal,opt){if(oldVal!==undefined){fextbud_metasLoad({pan:cbo.up("#panLO")});this.lob_plo_Clean(cbo.up("#panLO"));}},
});