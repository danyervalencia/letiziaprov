Ext.define("Siace.controller.log.Cotizaciones",{extend:"Ext.app.Controller",
lc_Printer:function(poP){var _comp=poP["comp"];var _key=(Ext.isEmpty(poP["key"])?"":poP["key"]);var _grd=(poP["grd"]==undefined?"grdLC":poP["grd"]);var _mi=(poP["mi"]==undefined?0:poP["mi"]);var _tit=(poP["tit"]==undefined?2:poP["tit"]);
	if(_key==""){var _rec=fext_grdSR(_comp.down("#"+_grd));if(!_rec){return false;}_key=_rec.data.coti_key;}
	_tit=(_tit==1?_rec.data.coti_documento:(_tit==2?_rec.data.doc_abrev+"/ "+_rec.data.coti_documento:_title));var _vs=fextpub_sessVar();
	fext_pdf("",_tit,"php/pdf/pdf_logistics_cotizaciones_printer.php?xxCoti_key="+_key+"&xxType_record=printer&zzPerssess_key="+_vs["ps"]+"&zzPersacce_key="+_vs["pa"]+"&zzPers_key="+_vs["p"]+"&zzUnieje_key="+_vs["ue"]+"&xxMenu_id="+_mi);
},
lc_View:function(poP){var _comp=poP["comp"];var _grd=(poP["grd"]==undefined?"grdLC":poP["grd"]); 
	var _TE=(poP["TE"]==undefined?"":poP["TE"]);var _mi=(poP["mi"]==undefined?0:poP["mi"]);var _pk=(poP["pk"]==undefined?"":poP["pk"]);var _cs=(poP["cs"]==undefined?true:poP["cs"]);var _cg=(Ext.isEmpty(poP["compg"])?_comp:poP["compg"]);
	if(fjsIn_array(_TE,[2,3,13,23])){var _rec=fext_grdSR(_cg.down("#"+_grd)); if(!_rec){return false;}}fext_mask(_comp);
	fext_CC("log.CotizacionesEdit");var _win=fext_CW("log.CotizacionesEdit");
	_win.setTypeEdit(_TE);_win.setMenuId(_mi); if(_cs){_win.setCallStore(_cg.down("#"+_grd).getStore());}_win.down("#ped_key").setValue(_pk);
	if(fjsIn_array(_TE,[2,3,13,23])){_win.setCallKey(_rec.data.coti_key);}if(fjsIn_array(_TE,[13,23])){_win.down("#bp_key").setValue(_rec.data.bp_key);}
	_win.show();fext_unmask(_comp);
}
});