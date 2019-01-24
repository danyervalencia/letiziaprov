Ext.define("Siace.controller.log.Pedidos",{extend:"Ext.app.Controller",
lp_Comparative:function(poP){var _comp=poP["comp"];var _grd=(poP["grd"]==undefined?"grdLP":poP["grd"]);var _mi=(poP["mi"]==undefined?"0":poP["mi"]);var _oi=(poP["oi"]==undefined?5023:poP["oi"]);var _tit=(poP["tit"]==undefined?2:poP["tit"]);
	var _rec=fext_grdSR(_comp.down("#"+_grd));if(!_rec){return false;}
	_title="C.C. "+(_tit==1?_rec.data.ped_documento:(_tit==2?_rec.data.doc_abrev+"/ "+_rec.data.ped_documento:""));var _vs=fextpub_sessVar();
	fext_pdf("",_title,"php/pdf/pdf_logistics_pedidos_comparative.php?xxPed_key="+_rec.data.ped_key+"&zzUsursess_key="+_vs["us"]+"&zzUsuracce_key="+_vs["ua"]+"&zzYear_id="+_vs["y"]+"&zzArea_key="+_vs["a"]+"&xxMenu_id="+_mi+"&xxOpc_id="+_oi);
},
lp_View:function(poP){var _comp=poP["comp"];var _TE=(poP["TE"]==undefined?0:poP["TE"]);var _key=(Ext.isEmpty(poP["key"])?"":poP["key"]);var _grd=(poP["grd"]==undefined?"grdLP":poP["grd"]);
	var _cg=(Ext.isEmpty(poP["compg"])?_comp:poP["compg"]);
	if(_key==""){var _rec=fext_grdSR(_cg.down("#"+_grd));if(!_rec){return false;}_key=_rec.data.ped_key;}fext_mask(_comp);
	if(_TE==5001){Ext.Ajax.request({url:"php/logistics_pedidos_json_records.php",params:{xxPed_key:_key,xxType_record:"titleETTR",vs:fext_JE(fextpub_sessVar())},success:function(resp,opts){var _res=fext_DJ("",resp); fext_pdf("",_res.data[0].ped_title,"php/pdf/pdf_logistics_pedidos_ettr_printer.php?xxPed_key="+_key+"&xxType_record=printer");}});}
	else if(_TE==59){
		Ext.Ajax.request({method:"POST",url:"php/logistics_pedidos_json_records.php",params:{xxPed_key:_key,xxType_record:"down_file",xxOrder_by:"ped_key",vs:fext_JE(fextpub_sessVar())},
			success:function(resp,opt){var _res=Siace.util.Util.decodeJSON(resp.responseText);var _dat=_res.data[0];if(_dat){var _src="php/resources/download_file.php?xxTable=logistics_pedidos_ettr&xxField=file2&xxFile_name="+_dat.pedettr_key+"_"+_dat.pedettr_file2;fext_FileDownload(undefined,_src);}}
		});
	}
	fext_unmask(_comp);
}
});