Ext.define("Siace.controller.log.Ordenes",{extend:"Ext.app.Controller",
lo_Fases:function(poParam){var _comp=poParam["comp"];var _grd=(poParam["grd"]==undefined?"grdLO":poParam["grd"]);var _rec=fext_grdSR(_comp.down("#"+_grd)); if(!_rec){return false;}fext_mask(_comp);
	fext_CC("siaf.Expediente_SecuenciaBrow");var _win=fext_CW("siaf.Expediente_SecuenciaBrow");
	_win.down("#tablex").setValue(5030);_win.setCallKey(_rec.data.orden_key);_win.down("#expe_nro").setValue(_rec.data.expe_nro);_win.setTitle("Fases Expediente ["+_rec.data.expe_nro+"] ::.");_win.show();
	fext_unmask(_comp);
},
lo_Printer:function(poParam){var _comp=poParam["comp"];var _grd=(poParam["grd"]==undefined?"grdLO":poParam["grd"]); 
	var _mi=(poParam["mi"]==undefined?0:poParam["mi"]);var _oi=(poParam["oi"]==undefined?"8":poParam["oi"]);var _tit=(poParam["tit"]==undefined?1:poParam["tit"]);
	var _rec=fext_grdSR(_comp.down("#"+_grd));if(!_rec){return false;}
	_tit=(_tit==1?_rec.data.orden_documento:(_tit==2?_rec.data.doc_abrev+"/ "+_rec.data.orden_documento:""));var _vs=fextpub_sessVar();
	fext_pdf("",_tit,"php/pdf/pdf_logistics_ordenes_printer.php?xxOrden_key="+_rec.data.orden_key+"&xxType_record=printer&zzPerssess_key="+_vs["ps"]+"&zzPersacce_key="+_vs["pa"]+"&zzPers_key="+_vs["p"]+"&zzUnieje_key="+_vs["ue"]+"&xxMenu_id="+_mi+"&xxOpc_id="+_oi);
}
});