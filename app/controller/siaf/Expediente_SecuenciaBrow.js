Ext.define("Siace.controller.siaf.Expediente_SecuenciaBrow",{extend:"Ext.app.Controller",views:["siaf.Expediente_SecuenciaBrow"],
init:function(application) {this.control({
"bud_expesecuenbrow":{beforerender:this.besb_BeforeRender},
});},
besb_BeforeRender:function(comp,opt){var _frm=comp.down("form");var _vs=fextpub_sessVar();
if(comp.down("#tablex").getValue()==2020){
	_frm.load({method:"POST",url:"php/budget_egresos_json_records.php",waitMsg:"Loading...",params:{xxEgre_key:comp.getCallKey(),xxType_record:"window_siaf",ssNO_USK:"NoT",vs:fext_JE(fextpub_sessVar())},
		success:function(form,act){
			try{var _mod=fext_CM("log.OrdenWindowSiaf");var _res=fext_DJ(act);if(_res.data[0]){_mod.set(_res.data[0]);_frm.loadRecord(_mod);}}catch(x){fext_MsgC(x.Message);}
		},failure:function(form,act){Ext.Msg.alert("Load failed",action.result.errorMessage);}
	});
}else if(comp.down("#tablex").getValue()==5030){
	_frm.load({method:"POST", url:"php/logistics_ordenes_json_records.php", waitMsg:"Loading...",params:{xxOrden_key:comp.getCallKey(),xxType_record:"win_siaf",ssNO_USK:"NoT",vs:fext_JE(fextpub_sessVar())},
		success:function(form,act){
			try{var _mod=fext_CM("log.OrdenWindowSiaf");var _res=fext_DJ(act);if(_res.data[0]){_mod.set(_res.data[0]);_frm.loadRecord(_mod);}}catch(x){fext_MsgC(x.Message);}
		},failure:function(form,act){Ext.Msg.alert("Load failed",action.result.errorMessage);}
	});
}
var _str=fext_CS("siaf.Expediente_SecuenciaBrow");var _grd=comp.down("#grdBES");var _pag=comp.down("#pagBES");
_grd.bindStore(_str);_pag.bindStore(_str);
_str.on("beforeload",function(str,oper,eopt){str.getProxy().setExtraParam("xxExpe_nro",comp.down("#expe_nro").getValue());str.getProxy().setExtraParam("xxType_record","grd");});_str.load();
}
});