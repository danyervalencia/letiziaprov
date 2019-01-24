function fjsCalculateVVenta(pnMonto,pnInafecto,pnTribval_contable){var _vv=fjsRound(((pnMonto*1)-(pnInafecto*1))/pnTribval_contable*1,2)*1 + pnInafecto*1; return _vv*1;}
function fjsCallNewPage(pcUrl,pcForm){_form=(!pcForm || pcForm==""?"frm":pcForm); document.getElementById(_form).action=pcUrl; document.getElementById(_form).method="POST"; document.getElementById(_form).target="_blank"; document.getElementById(_form).submit();}
function fjsComprobarBisiesto(anio){if((anio%100 != 0)&&((anio%4 == 0) || (anio%400 == 0))) { return true; } else{ return false; } }
function fjsDateCurrent(pcFormat){var _d=new Date(); if(pcFormat=="" || pcFormat==null) { var _df=_d.getFullYear()+"-"+fjsLpad((_d.getMonth()+1),2,"0")+"-"+fjsLpad(_d.getDate(),2,"0"); return _df; }}
function fjsDateDDMMAAAA(pcFecha){if(pcFecha=="" || pcFecha==null){lcReturn="";}else{laData=pcFecha.split("-"); lcReturn=laData[2]+"/"+laData[1]+"/"+laData[0];} return lcReturn;}
function fjsDateDiffDay(pdF1,pdF2){var _d=pdF2 - pdF1; return Math.round(_d/(1000*60*60*24)); }
function fjsDateFirstDayMonth(pcFormat){var _d=fjsDateCurrent(pcFormat);if(pcFormat==""||pcFormat==null){var _df=_d.substring(0,8)+"01";}return _df;}
function fjsDateFirstDayYear(pcFormat){var _d=fjsDateCurrent(pcFormat);if(pcFormat==""||pcFormat==null){ var _df=_d.substring(0,5)+"01-01";}return _df;}
function fjsDateMonthName(pcMonth){var _nro=pcMonth*1;var _name="";
	if(_nro==1){_name="Enero";}else if(_nro==2){_name="Febrero";}else if(_nro==3){_name="Marzo";}else if(_nro==4){_name="Abril";}else if(_nro==5){_name="Mayo";}else if(_nro==6){_name="Junio";}
	else if(_nro==7){_name="Julio";}else if(_nro==8){_name="Agosto";}else if(_nro==9){_name="Setiembre";}else if(_nro==10){_name="Octubre";}else if(_nro==11){_name="Noviembre";}else if(_nro==12){_name="Diciembre";}
	return _name;
}
function fjsDateSQL(pcFecha){if(pcFecha==""){ return "";}else{var laData=pcFecha.split("/"); lcRetu=laData[2]+"-"+laData[1]+"-"+laData[0]; return lcRetu; } }
function fjsDtos(pcFech){var laData=pcFech.split("-");lcRetu=laData[0]+laData[1]+laData[2];return lcRetu;}
function fjsFormatInteger(num){var cadena=""; var aux;var cont=1,m,k;
	if(num<0) aux=1; else aux=0;
	num=num.toString();
	for(m=num.length-1;m>=0;m--){cadena = num.charAt(m) + cadena;
		if( cont%3 == 0 && m > aux )  cadena = "," + cadena; else cadena = cadena;
		if( cont == 3 ) cont=1; else cont++;
	}
	return cadena;
}
function fjsFormatNumeric(pnNumero,pnDec){var separador_miles=","; if(isNaN(pnNumero)){ return ""; }
	var _num=(pnNumero*1).toFixed(20); var _arr=_num.split("."); var _e=_arr[0];  _d=_arr[1];
	if(pnDec!==undefined){
		if(pnDec*1>0){numero=pnNumero*1; _num=numero.toFixed(pnDec); _arr=_num.split("."); _e=_arr[0]; _d=_arr[1]; _ent=fjsFormatInteger(_e); _dec="."+_d;}else{_ent=_e; _dec="";}
	}else{ _ent= e; _dec=""; }
	return _ent+_dec;
}
function fjsFormatTextZeros(pcObjeto,pcNumero){lcTexto=$("#"+pcObjeto).val(); if(lcTexto.length<pcNumero){$("#"+pcObjeto).val(fjsLpad(lcTexto,pcNumero,"0") );}}
function fjsIn_array(needle,haystack,argStrict){var key="";  strict = !! argStrict;
	if(strict){for(key in haystack){if(haystack[key]===needle){return true;}}} 
	else{for(key in haystack){if(haystack[key]==needle){return true;}}}
	return false;
}
function fjsLpad(pcCade,pnLen,pcChar){var _y=(pcCade+"").length; _y=pnLen-_y; for(var _i=1;_i<=_y;_i++){pcCade=pcChar+pcCade;} return pcCade;}
function fjsLTrim(pcCade){return pcCade.replace(/^\s+/, "");}
function fjsRepeat(pcChar,pnNume){var _lc=""; for(_i=1;_i<=pnNume*1;_i++){_lc=_lc+""+pcChar;} return _lc;}
function fjsRound(pnNumero,pnDec){var _numero=(isNaN(pnNumero*1)?0:pnNumero); var p=Math.pow(10,pnDec); return (Math.round(parseFloat(_numero)*p)/p).toFixed(pnDec);}
function fjsRpad(pcCade,pnLen,pcChar){var _y=(pcCade+"").length; _y=pnLen-_y; for(var _i=1;_i<=_y;_i++){pcCade=pcCade+pcChar;} return pcCade;}
function fjsRTrim(pcCade){return pcCade.replace(/\s+$/, "");}
function fjsOnlyNumeric(evt){evt=(evt)?evt:event;
	var charCode=(evt.charCode)?evt.charCode:((evt.keyCode)?evt.keyCode:((evt.which)?evt.which:0)); var lbRpta=true;
	if(charCode==46){ lbRpta=true; }else if(charCode>31&&(charCode<48 || charCode>57)){ lbRpta=false; }
	return lbRpta;
}
function fjsTimeSubtractHours(pcHoraini,pcHorafin,pnRedondeo){var _inicioHoras=pcHoraini.substr(0,2); var _inicioMinutos=pcHoraini.substr(3,2); var _finHoras=pcHorafin.substr(0,2); var _finMinutos=pcHorafin.substr(3,2);
	if((_finHoras+""+_finMinutos)*1>=(_inicioHoras+""+_inicioMinutos)*1){
		var _transcurridoHoras=_finHoras*1 - _inicioHoras*1; var _transcurridoMinutos=_finMinutos*1 - _inicioMinutos*1;
		if(_transcurridoMinutos<0){_transcurridoHoras--; _transcurridoMinutos=60+_transcurridoMinutos;}
		var _horas=_transcurridoHoras.toString(); var _minutos=_transcurridoMinutos.toString();
		if(pnRedondeo=="1"){ /* redondeo a media hora */
			if(_minutos*1>0&&_minutos*1<30){_minutos="30"}
			if(_minutos*1>31&&_minutos*1<=59){_horas=_horas*1 + 1; _minutos="0"}
		}else if(pnRedondeo=="2"){ /* redonde por horas */
			if(_minutos*1>0){_horas=_horas*1 + 1; _minutos="0";}
		}
		if((_horas+"").length<2){ _horas="0"+_horas }
		if((_minutos+"").length<2){ _minutos="0"+_minutos; }
		return _horas+":"+_minutos;
	}else{
		var _res1=fjsTimeSubtractHours(pcHoraini, "24:00", "0"); var _res2=fjsTimeSubtractHours("00:00", pcHorafin, "0");
		var _horas=_res1.substr(0, 2)*1 + _res2.substr(0, 2)*1; var _minutos=_res1.substr(3, 2)*1 + _res2.substr(3, 2)*1;
		if(_minutos*1>=60){_horas++; _minutos = _minutos*1 - 60;}
		if(pnRedondeo=="1"){
			if(_minutos*1>0 && _minutos*1 < 30){_minutos="30"}
			if(_minutos*1>31 && _minutos*1 <= 59){_horas=_horas*1 + 1; _minutos="0"}
		}else if(pnRedondeo=="2"){ /* redonde por horas */
			if(_minutos*1>0){_horas=_horas*1 + 1; _minutos="0"}
		}
		if((_horas+"").length<2){_horas = "0" +""+ _horas}
		if((_minutos+"").length<2){_minutos = "0" +""+ _minutos;}
		if(pnRedondeo>0){}else{return _horas+":"+_minutos;}
	}
}
function fjsTrim(pcCade){ return fjsRTrim(fjsLTrim( pcCade )); }
function fjsValidateMail(valor){ var filter = /[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/; if( filter.test(valor) ) return true; else return false; }
function fjsValidateLastDigitRUC(pcCruc,pcTipo){var lnP=0; var lnA=0; var lnB=0; var lnC=0; var lnDigi=0; var aPeso=[0,5,4,3,2,7,6,5,4,3,2];
	for(x=1;x<=10;x++){ lnP=(pcCruc.toString().substr(x-1,1)*1).toFixed(0)*(aPeso[x]*1).toFixed(0); lnA=lnA*1 + lnP*1; }
	lnB=parseInt(lnA*1/11); lnC=lnA*1 - (lnB*1*11); lnDigi=11 - lnC*1;
	if(lnDigi==10){lnDigi=0;}else if(lnDigi==11){lnDigi=1;}
	if(pcTipo=="1"){if(lnDigi==pcCruc.toString().substr(10,1)){return "";}else{return lnDigi;}}
	else{return lnDigi;}
}

/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
function fext_checkColor(poCon,poLab,pbVal){poCon.down("#"+poLab).fieldCls="";poCon.down("#"+poLab).fieldCls=(pbVal==true?"df00003":"df00303");}
function fext_compSearch(poP){var _compCall=(poP["compCall"]==undefined?"":poP["compCall"]);var _compSearch=(poP["compSearch"]==null?null:poP["compSearch"]);
var _view=(poP["view"]==undefined?"":poP["view"]);var _title=(poP["title"]==undefined?"":poP["title"]);var _keyCall=(poP["keyCall"]==undefined?"":poP["keyCall"]);
var _TQ=(poP["TQ"]==undefined?"":poP["TQ"]); var _tR=(poP["tR"]==undefined?"":poP["tR"]); var _actionDestroy=(poP["actionDestroy"]==undefined?false:poP["actionDestroy"]);
if(_compCall!==""){Ext.get(_compCall.getEl()).mask("Por favor espere un momento...","loading");}
if(_compSearch==null){var _comp=Ext.create(_view);
	_comp.setTitle(_title);_comp.setCallWindow(_compCall);_comp.setCallKey(_keyCall);_comp.setTypeQuery(_TQ);_comp.setTypeReturn(_tR);_comp.setActionDestroy(_actionDestroy);_comp.show();
	if(_compCall!==""){Ext.get(_compCall.getEl()).unmask();}return _comp;
}else{
	_compSearch.setCallKey(_keyCall);_compSearch.show();if(_compCall!==""){Ext.get(_compCall.getEl()).unmask();}return _compSearch;
}}
function fext_CC(pcC){return Siace.app.getController(pcC);}
function fext_CM(pcM){return Ext.create("Siace.model."+pcM);}
function fext_CS(pcS){return Ext.create("Siace.store."+pcS);}
function fext_CW(pcW){return Ext.create("Siace.view."+pcW);}
function fext_DJ(pAct,pResp){return Siace.util.Util.decodeJSON(pAct==""?pResp.responseText:pAct.response.responseText);}
function fext_fieldSearch(pcType,poCallWin,paComp,paServer,pcTE,paView){var _search=false;var _txtVALUE=poCallWin.down("#"+paComp[1]);var _txtValue=poCallWin.down("#"+paComp[2]);
if(pcType==1){_txtVALUE.setValue(_txtValue.getValue());}
else if(pcType==0){if(_txtValue.getValue()!==_txtVALUE.getValue()){_search=true;}}
else if(pcType==13){_search=true; _txtVALUE.setValue(_txtValue.getValue());}

if(_search){var _txtKey=poCallWin.down("#"+paComp[0]);var _lblName=poCallWin.down("#"+paComp[3]);var _val=_txtValue.getValue();
	if(_val==""){_txtKey.setValue("");_lblName.setValue("");return false;}fext_mask(poCallWin);
	var _TR=(!paServer[2]||paServer[2]==null?"":paServer[2]);var _TQ=(!paServer[3]||paServer[3]==null?"":paServer[3]);
	var _prmStr=Siace.util.Util.decodeJSON("{"+paServer[1]+": '"+_val+"', xxType_record: '"+_TR+"', xxType_query: '"+_TQ+"'}");
	Ext.Ajax.request({method:"POST",url:paServer[0],params:_prmStr,
		success:function(resp){var _res=fext_DJ(resp);
			if(_res.success){
				if(_res.subtotal==1){
					if(paServer[3]=="SOLO_VEHICULOS"){if(_res.data[0].tipveh_id!=="10"){_txtKey.setValue(_res.data[0].key);_lblName.setValue(_res.data[0].name);}else{_txtKey.setValue("");_lblName.setValue("");}}
					else if(paServer[3]=="SOLO_TRACTOS"){if(_res.data[0].tipveh_id=="10"){_txtKey.setValue(_res.data[0].key);_lblName.setValue(_res.data[0].name);}else{_txtKey.setValue("");_lblName.setValue("");}}
					else{_txtKey.setValue(_res.data[0].key);_lblName.setValue(_res.data[0].name);}
				}else{_txtKey.setValue("");_lblName.setValue("");
					if(pcTE==1){Siace.app.getController(paView[4]);var _win=Ext.create(paView[0]);_win.setTypeEdit(1);_win.setMenuId(paView[5]);_win.setTitle(paView[1]);_win.setTypeQuery(paView[3]);_nro = paView[2].length;
						if(_nro>1){var _array=_val.split(paView[2][_nro-1]);for(_i=0;_i<=(_nro-2);_i++){_win.down("#"+paView[2][_i]).setValue(_array[_i]);}}
						else{_win.down("#"+paView[2][0]).setValue(_val);}
						_win.setCallWindow(poCallWin);_win.show();
					}
				}
			}else{_txtKey.setValue("");_lblName.setValue("");Siace.util.Util.showErrorMsg(_res.msg);}
			fext_unmask(poCallWin);
		},failure:function(resp){fext_unmask(poCallWin);_txtKey.setValue("");_lblName.setValue("");Siace.util.Util.showErrorMsg(resp.responseText);}
	});
}}
function fext_FileDownload(pFile,pcSrc){console.log(pFile);console.log(pcSrc);
if(pFile==undefined){Ext.DomHelper.append(document.body,{tag:"iframe",itemId:"downloadIframe",frameBorder:0,height:0,width:0,css:"display:none;visibility:hidden;height:0px;",src:pcSrc});}
else{var _reader=new FileReader();
	_reader.onload=function(event){var _save=document.createElement("a");
		_save.href=event.target.result;_save.target="_blank";_save.download=pFile.name; //save.download = nombreArchivo || "archivo.dat";
		var _clicEvent=new MouseEvent("click",{"view":window,"bubbles":true,"cancelable":true});
		_save.dispatchEvent(_clicEvent);(window.URL||window.webkitURL).revokeObjectURL(_save.href);
	};
	_reader.readAsDataURL(pFile);
}}
function fext_FileReader(poFile,pcType,pcMsje,pnSizeMax,pcSizeMsje,poDele,poDown,pcHide){var _reader="";var _file=poFile.fileInputEl.dom.files[0];var _hide=(Ext.isEmpty(pcHide)?true:pcHide);
if(typeof FileReader==undefined){Ext.Msg.alert("Precaución","Navegador no permite FielReader");}
else if(pcType!==""&&!pcType.test(_file.type)){Ext.Msg.alert("Precaución","Debe seleccionar un archivo de tipo: "+pcMsje);}
else if(pnSizeMax!==""&&_file.size>pnSizeMax){Ext.Msg.alert("Precaución","Solo se permiten archivos de tamaño menores a "+pcSizeMsje);}
else{_reader=new FileReader();_reader.readAsDataURL(_file);
	if(!Ext.isEmpty(poDele)){if(_hide){poFile.hide();}else{poFile.setReadOnly(true);}poDele.enable();poDele.show();}
	if(!Ext.isEmpty(poDown)){poDown.enable();}
}
if(_reader==""){poFile.reset();poFile.setValue("");poFile.setRawValue("");if(!Ext.isEmpty(poDele)){poDele.disable();}if(!Ext.isEmpty(poDown)){poDown.disable();}}
return _reader;}
function fext_grdSR(poGrd){return poGrd.getSelectionModel().getSelection()[0];}
function fext_gridClean(poStr,poPag){poStr.removeAll();if(poPag!==""){poStr.currentPage=1;poPag.down("#first").disable();poPag.down("#prev").disable();poPag.down("#inputItem").disable();poPag.down("#inputItem").setValue("0");poPag.down("#afterTextItem").setText("de 0");poPag.down("#next").disable();poPag.down("#last").disable();poPag.down("#displayItem").setText("");}}
function fext_IE(po){return Ext.isEmpty(po.getValue())}
function fext_JE(pA){return Ext.JSON.encode(pA);}
function fext_mask(pO){Ext.get(pO.getEl()).mask("Validando información... por favor espere un momento...","loading");}
function fext_MsgA(pcM,poF){Ext.Msg.alert(trnslt.msg,pcM,function(){if(!Ext.isEmpty(poF)){poF.focus();}})}
function fext_MsgC(pcM){Ext.Msg.alert("Status","Exception: "+pcM);}
function fext_MsgE(pcM){Siace.util.Util.showErrorMsg(pcM);}
function fext_MsgFL(pA){Ext.Msg.alert("Load failed",pA.result.errorMessage);}
function fext_MsgFS(pA){Siace.util.Util.showErrorMsg(pA.response.responseText);}
function fext_removeAddCls(poComp,pcClassRemove,pcClassAdd){poComp.removeCls(pcClassRemove); poComp.addCls(pcClassAdd);}
function fext_removeAddConfig(poComp,pcConfig,pcClass){if(pcConfig=="" || !pcConfig){ poComp.labelClsExtra=""; poComp.labelClsExtra=pcClass;}}
function fext_pdf(pcIcon,pcTitle,pcSrc,poTab){var _mp=(Ext.isEmpty(poTab)?Ext.ComponentQuery.query("acc_mainpanel")[0]:poTab);var _vs=fextpub_sessVar();
_newTab=_mp.add({xtype:"panel",closable:true,iconCls:(pcIcon==""?"icon_Pdf_90":pcIcon),title:pcTitle,layout:"fit",html:"loading PDF...",items:[{xtype:"uxiframe",src:pcSrc+"&zzUsursess_key="+_vs["us"]+"&zzUsuracce_key="+_vs["ua"]+"&zzYear_id="+_vs["y"]+"&zzArea_key="+_vs["a"]}]});_mp.setActiveTab(_newTab);}
function fext_unmask(pO){Ext.get(pO.getEl()).unmask();}
function fext_SIE(pStr){return pStr.storeId=="ext-empty-store"?true:false}
function fext_winSearch(poP){var _win=poP["win"];
var _cW=(poP["cW"]==undefined?"":poP["cW"]);var _CK=(poP["CK"]==undefined?"":poP["CK"]);var _tit=(poP["tit"]==undefined?"":poP["tit"]);
var _TR=(poP["TR"]==undefined?"":poP["TR"]);var _TQ=(poP["TQ"]==undefined?"":poP["TQ"]);var _TRN=(poP["TRN"]==undefined?"":poP["TRN"]);var _AD=(poP["AD"]==undefined?false:poP["AD"]);
if(_cW!==""){fext_mask(_cW);}
win.setTitle(_tit);_win.setCallWindow(_cW);_win.setCallKey(_cK);_win.setTypeRecord(_TR);_win.setTypeQuery(_TQ);_win.setTypeReturn(_TRN);_win.setActionDestroy(_AD);_win.show();
if(_cW!==""){fext_unmask(_cW);}return _win;}
/*function fext_winSearch(poSearchWindow,poCallWindow,pcView,pcTitle,pcCallKey,pcTypeQuery,pcTypeReturn,pcActionDestroy){
Ext.get(poCallWindow.getEl()).mask("Por favor espere un momento...","loading");
if(poSearchWindow==undefined){var _win=Ext.create(pcView); _win.setTitle(pcTitle); //_win.setIconCls("icon_Search_90");
	_win.setCallWindow(poCallWindow); _win.setCallKey(!pcCallKey||pcCallKey==null||pcCallKey==""?"":pcCallKey);
	_win.setTypeQuery(!pcTypeQuery||pcTypeQuery==null||pcTypeQuery==""?"":pcTypeQuery); _win.setTypeReturn(!pcTypeReturn||pcTypeReturn==null||pcTypeReturn==""?"":pcTypeReturn);
	_win.setActionDestroy(!pcActionDestroy||pcActionDestroy==null||pcActionDestroy==""?"":pcActionDestroy);
	_win.show(); Ext.get(poCallWindow.getEl()).unmask(); return _win;
}else{
	poSearchWindow.setCallKey(!pcCallKey||pcCallKey==null||pcCallKey==""?"":pcCallKey); poSearchWindow.show();
	Ext.get(poCallWindow.getEl()).unmask(); return poSearchWindow;
}}*/
function fextbud_especificas_detFilter(poP){var _pan=poP["pan"];var _ttc=(poP["ttc"]==undefined?"":poP["ttc"]);var _gc=(poP["gc"]==undefined?"":poP["gc"]);var _ede=(poP["ede"]==undefined?"":poP["ede"]);
var _TR=(poP["TR"]==undefined?"combo_codename":poP["TR"]);var _TQ=(poP["TQ"]==undefined?"":poP["TQ"]);var _OB=(poP["OB"]==undefined?"":poP["OB"]);
var _AB=(poP["AB"]==undefined?"YES":poP["AB"]);var _dsb=(poP["dsb"]==undefined?false:poP["dsb"]);var _setVal=(poP["setVal"]==undefined?true:poP["setVal"]);var _val=(poP["val"]==undefined?"":poP["val"]);var _len=(_AB=="YES"?1:0);
var _cboED=(poP["obj"]==undefined?_pan.down("#espedet_id"):poP["obj"]);if(_cboED.getStore().storeId=="ext-empty-store"){_cboED.bindStore(fext_CS("bud.Especificas_DetCbo"));}
_cboED.getStore().load({params:{xxTiptrans_code:_ttc,xxGene_code:_gc,xxede:_espedet_estado,xxType_record:_TR,xxType_query:_TQ,xxOrder_by:_OB,xxAdd_blank:_AB},
	callback:function(rec,oper,succ){if(rec.length>_len){_cboED.setDisabled(_dsb);if(_setVal){_cboED.setValue((_val==""?rec[0].data.espedet_id:_val)*1);}}else{_cboED.disable();_cboED.setValue("");}}
});}
function fextbud_generericasLoad(poP){var _pan=poP["pan"];var _dsb=(poP["dsb"]==undefined?false:poP["dsb"]);var _setVal=(poP["setVal"]==undefined?true:poP["setVal"]);var _ttc=(_pan.down("#tiptrans_code")?_pan.down("#tiptrans_code").getValue():"");var _cboG=_pan.down("#gene_code");
if(_pan.down("#subgene_code")){_pan.down("#subgene_code").getStore().removeAll();_pan.down("#subgene_code").setValue("");_pan.down("#subgene_code").disable();}
if(_ttc!=""){_cboG.getStore().load({callback:function(rec,oper,succ){var _len=(_cboG.getStore().getProxy().extraParams["xxAdd_blank"]=="YES"?1:0);if(rec.length>_len){_cboG.setDisabled(_dsb);if(_setVal){_cboG.setValue(rec[0].data.gene_code);}}else{_cboG.disable();_cboG.setValue("");}}});}
else{_cboG.getStore().removeAll();_cboG.setValue("");_cboG.disable();}}
function fextbud_generericasParameters(poP){var _pan=poP["pan"];var _ge=(poP["gene_esta"]==undefined?"":poP["ge"]);
var _TR=(poP["TR"]==undefined?"combo_codename":poP["TR"]);var _TQ=(poP["TQ"]==undefined?"":poP["TQ"]);var _OB=(poP["OB"]==undefined?"":poP["OB"]);
var _AB=(poP["add_blank"]==undefined?"YES":poP["add_blank"]);
var _cboG=_pan.down("#gene_code"); if(_cboG.getStore().storeId=="ext-empty-store"){_cboG.bindStore(fext_CS("bud.GenericasCbo"));};
_cboG.getStore().on("beforeload",function(str,oper,opt){var _prx=str.getProxy();_prx.setExtraParam("xxTiptrans_code",(_pan.down("#tiptrans_code")?_pan.down("#tiptrans_code").getValue():"")); _prx.setExtraParam("xxGene_esta",_ge);_prx.setExtraParam("xxType_record",_TR); _prx.setExtraParam("xxType_query",_TQ); _prx.setExtraParam("xxOrder_by",_OB); _prx.setExtraParam("xxAdd_blank",_AB);});}
function fextbud_fuentes_financiamientoFilter(poP){var _pan=poP["pan"]; var _obj=(poP["obj"]==undefined?_pan.down("#fuefin_id"):poP["obj"]);var _ffai=(poP["ffai"]==undefined?"":poP["ffai"]);var _ffi=(poP["ffi"]==undefined?"":poP["ffi"]);var _ffe=(poP["ffe"]==undefined?1:poP["ffe"]);
var _TR=(poP["TR"]==undefined?"combo_codename":poP["TR"]);var _TQ=(poP["TQ"]==undefined?"":poP["TQ"]);var _AB=(poP["AB"]==undefined?"YES":poP["AB"]); var _dsb=(poP["dsb"]==undefined?false:poP["dsb"]);
var _setVal=(poP["setVal"]==undefined?true:poP["setVal"]);var _val=(poP["val"]==undefined?"":poP["val"]);var _len=(_AB=="YES"?1:0);
if(_obj.getStore().storeId=="ext-empty-store"){_obj.bindStore(fsxt_CS("bud.Fuentes_FinanciamientoCbo"));}
_obj.getStore().load({params:{xxFuefinagre_id:_ffai,xxFuefin_id:_ffi,xxFuefin_estado:_ffe,xxType_record:_TR,xxType_query:_TQ,xxAdd_blank:_AB},
	callback:function(rec,oper,succ){if(rec.length>_len){_obj.setDisabled(_dsb);if(_setVal){_obj.setValue((_val==""?rec[0].data.fuefin_id:_val)*1);}}else{_obj.disable(); _obj.setValue("");}}
});}

function fextbud_metasFilter(poP){var _pan=poP["pan"];var _mei=(poP["mei"]==undefined?"":poP["mei"]);var _yi=(poP["yi"]==undefined?"":poP["yi"]);var _uei=(poP["uei"]==undefined?"":poP["uei"]);var _sfc=(poP["sfc"]==undefined?"":poP["sfc"]);var _ak=(poP["ak"]==undefined?"":poP["ak"]);
var _TR=(poP["TR"]==undefined?"combo_codename":poP["TR"]);var _TQ=(poP["TQ"]==undefined?"":poP["TQ"]);var _OB=(poP["OB"]==undefined?"":poP["OB"]);var _AB=(poP["AB"]==undefined?"YES":poP["AB"]);var _dsb=(poP["dsb"]==undefined?false:poP["dsb"]);
var _setVal=(poP["setVal"]==undefined?true:poP["setVal"]);var _val=(poP["val"]==undefined?"":poP["val"]);var _len=(_AB=="YES"?1:0);
var _cboM=_pan.down("#meta_id");if(_cboM.getStore().storeId=="ext-empty-store"){_cboM.bindStore(fext_CS("store.bud.MetasCbo"));}
_cboM.getStore().load({params:{xxMeta_id:_mei,xxYear_id:_yi,xxUnieje_id:_uei,xxSecfunc_code:_sfc,xxArea_key:_ak,xxType_record:_TR,xxType_query:_TQ,xxOrder_by:_OB,xxAdd_blank:_AB},
	callback:function(rec,oper,succ){if(rec.length>_len){_cboM.setDisabled(_dsb);if(_setVal){_cboM.setValue(_val==""?rec[0].data.meta_id*1:_val*1);}}else{_cboM.disable();_cboM.setValue("");}}
});}
function fextbud_metasLoad(poP){var _pan=poP["pan"];var _dsb=(poP["dsb"]==undefined?false:poP["dsb"]);var _setVal=(poP["setVal"]==undefined?true:poP["setVal"]);
var _yi=(_pan.down("#year_id")?_pan.down("#year_id").getValue():0);var _val=(poP["val"]==undefined?"":poP["val"]); 
if(_pan.down("#tarea_key")){_pan.down("#tarea_key").getStore().removeAll();_pan.down("#tarea_key").setValue("");_pan.down("#tarea_key").disable();}
var _cboM=_pan.down("#meta_id");
if(_yi*1<=0){_cboM.getStore().removeAll();_cboM.setValue("");_cboM.disable();}else{_cboM.getStore().load({callback:function(rec,oper,succ){var _len=(_cboM.getStore().getProxy().extraParams["xxAdd_blank"]=="YES"?1:0); if(rec.length>_len){_cboM.setDisabled(_dsb); if(_setVal){_cboM.setValue((_val==""?rec[0].data.meta_id:_val)*1);}}else{_cboM.disable(); _cboM.setValue("");}}});}
var _fftr=(poP["fftr"]==undefined?"":poP["fftr"]);//( !pcFF_TR || pcFF_TR == "" ? "" : pcFF_TR );
if(_fftr!==""){
	var _clasif=(poP["clasif"]==undefined?"":poP["clasif"]);//_clasif = ( !pcClasif || pcClasif == "" ? "" : pcClasif );
	var _fftr_all=(poP["fftr_all"]==undefined?"":poP["fftr_all"]); //_fftr_all = ( !pcFFTR_all || pcFFTR_all == "" ? "" : pcFFTR_all );
	//fextbud_tareas_fftredLoad(); //funsag_tarea_saldoFuente_financFilter( "X", _prefijo, "", _ff_tr, _clasif, _fftr_all );
}}
function fextbud_metasParameters(poP){var _pan=poP["pan"];var _mei=(poP["mei"]==undefined?"":poP["mei"]);var _cboM=_pan.down("#meta_id");
var _TR=(poP["TR"]==undefined?"combo":poP["TR"]);var _TQ=(poP["TQ"]==undefined?"":poP["TQ"]);var _mi=(poP["mi"]==undefined?"":poP["mi"]); var _AB=(poP["AB"]==undefined?"YES":poP["AB"]);
if(_cboM.getStore().storeId=="ext-empty-store"){_cboM.bindStore(fext_CS("bud.MetasCbo"));};
_cboM.getStore().on("beforeload",function(str,oper,opt){var _prx=str.getProxy();
	_prx.setExtraParam("xxMeta_id",_mei);_prx.setExtraParam("xxYear_id",poP["objYear_id"]==undefined?(_pan.down("#year_id")?_pan.down("#year_id").getValue():0):poP["objYear_id"].getValue());_prx.setExtraParam("xxArea_key",(_pan.down("#area_key")?_pan.down("#area_key").getValue():""));
	_prx.setExtraParam("xxType_record",_TR);_prx.setExtraParam("xxType_query",_TQ);_prx.setExtraParam("xxMenu_id",_mi);_prx.setExtraParam("xxAdd_blank",_AB);
});}
function fextbud_tareasFilter(poP){var _pan=poP["pan"];var _obj=(poP["obj"]==undefined?_pan.down("#tarea_key"):poP["obj"]);var _ti=(poP["ti"]==undefined?"":poP["ti"]);var _tk=(poP["tk"]==undefined?"":poP["tk"]);var _mei=(poP["mei"]==undefined?"":poP["mei"]);var _yi=(poP["yi"]==undefined?"":poP["yi"]);var _uei=(poP["uei"]==undefined?"":poP["uei"]);var _ak=(poP["ak"]==undefined?"":poP["ak"]);
var _TR=(poP["TR"]==undefined?"combo_codename":poP["TR"]);var _TQ=(poP["TQ"]==undefined?"":poP["TQ"]);var _OB=(poP["OB"]==undefined?"":poP["OB"]);var _AB=(poP["AB"]==undefined?"YES":poP["AB"]);var _dsb=(poP["dsb"]==undefined?false:poP["dsb"]);
var _setVal=(poP["setVal"]==undefined?true:poP["setVal"]);var _val=(poP["val"]==undefined?"":poP["val"]);var _len=(_AB=="YES"?1:0);
if(_obj.getStore().storeId=="ext-empty-store"){_obj.bindStore(fext_CS("bud.TareasCbo"));}
_obj.getStore().load({params:{xxTarea_id:_ti,xxTarea_key:_tk,xxMeta_id:_mei,xxYear_id:_yi,xxArea_key:_ak,xxType_record:_TR,xxType_query:_TQ,xxOrder_by:_OB,xxAdd_blank:_AB},
	callback:function(rec,oper,succ){if(rec.length>_len){_obj.setDisabled(_dsb);if(_setVal){_obj.setValue(_val==""?rec[0].data.tarea_key:_val);}}else{_obj.disable();_obj.setValue("");}}
});}
function fextbud_tareasLoad(poP){var _pan=poP["pan"];var _dsb=(poP["dsb"]==undefined?false:poP["dsb"]);var _setVal=(poP["setVal"]==undefined?true:poP["setVal"]);
var _tk=(poP["tk"]==undefined?"":poP["tk"]);var _filterForce=(poP["filterForce"]==undefined?false:poP["filterForce"]);var _mei=(_pan.down("#mei")?_pan.down("#mei").getValue():0);var _cboT=_pan.down("#tarea_key");
if(_meta_id*1>0 || _filterForce==true){_cboT.getStore().load({callback:function(rec,oper,succ){var _len=(_cboT.getStore().getProxy().extraParams["xxAdd_blank"]=="YES"?1:0);if(rec.length>_len){_cboT.setDisabled(_dsb);if(_setVal){_cboT.setValue(_tarea_key==""?rec[0].data.tarea_key:_tarea_key);}}else{_cboT.disable(); _cboT.setValue("");}}});}else{_cboT.getStore().removeAll();_cboT.setValue("");_cboT.disable();}
var _fftr=(poP["fftr"]==undefined?"":poP["fftr"]);
if(_fftr!==""){var _obj=(poP["obj"]==undefined?poP["pan"].down("#fuefin_id"):poP["obj"]);
	var _type=(poP["type"]==undefined?"":poP["type"]);var _fftr_all=(poP["fftr_all"]==undefined?"":poP["fftr_all"]);var _clasif=(poP["clasif"]==undefined?"":poP["clasif"]);
	fextbud_tareas_fftredLoad({"panel":poP["panel"],"objeto":_obj,"type":_type,"fftr_all":_fftr_all});
}}
function fextbud_tareasParameters(poP){var _pan=poP["pan"];var _obj=(Ext.isEmpty(poP["obj"])?_pan.down("#tarea_key"):poP["obj"]);
var _tk=(poP["tk"]==undefined?"":poP["tk"]);var _mi=(poP["mi"]==undefined?"":poP["mi"]);var _TR=(poP["TR"]==undefined?"combo":poP["TR"]);var _TQ=(poP["TQ"]==undefined?"tarea_id":poP["TQ"]);var _OB=(poP["OB"]==undefined?"":poP["OB"]);
var _AB=(poP["AB"]==undefined?"YES":poP["AB"]);
if(_obj.getStore().storeId=="ext-empty-store"){_obj.bindStore(fsxt_CS("bud.TareasCbo"));};
_obj.getStore().on("beforeload",function(str,oper,opt){var _prx=str.getProxy();
	_prx.setExtraParam("xxTarea_key",_tk);_prx.setExtraParam("xxYear_id",poP["objYear_id"]==undefined?(_pan.down("#year_id")?_pan.down("#year_id").getValue():0):poP["objYear_id"].getValue());
	_prx.setExtraParam("xxArea_key",(_pan.down("#area_key")?_pan.down("#area_key").getValue():""));_prx.setExtraParam("xxMeta_id",(_pan.down("#meta_id")?_pan.down("#meta_id").getValue():0));_prx.setExtraParam("xxTipgast_id",(_pan.down("#tipgast_id")?_pan.down("#tipgast_id").getValue():0));
	_prx.setExtraParam("xxType_record",_TR); _prx.setExtraParam("xxType_query",_TQ); _prx.setExtraParam("xxOrder_by",_OB);_prx.setExtraParam("xxMenu_id",_menu_id); _prx.setExtraParam("xxAdd_blank",_AB);
});}
function fextbud_tareas_areasLoadA(poP){var _pan=poP["pan"];var _obj=(Ext.isEmpty(poP["obj"])?_pan.down("#area_key"):poP["obj"]);
var _dsb=(poP["dsb"]==undefined?false:poP["dsb"]);var _setVal=(poP["setVal"]==undefined?true:poP["setVal"]);
var _ak=(poP["ak"]==undefined?"":poP["ak"]);var _filterForce=(poP["filterForce"]==undefined?false:poP["filterForce"]);
var _tk=(_pan.down("#tarea_key")?_pan.down("#tarea_key").getValue():"");
if(!Ext.isEmpty(_tarea_key)||_filterForce==true){
	_obj.getStore().load({
		callback:function(rec,oper,succ){var _len=(_obj.getStore().getProxy().extraParams["xxAdd_blank"]=="YES"?1:0); if((rec.length>_len)&&_setVal){_obj.setDisabled(_dsb); _obj.setValue(_area_key==""?rec[0].data.area_key:_tarea_key);}else if(rec.length>_len){_obj.setDisabled(_dsb);}else{_obj.disable();_obj.setValue("");}}
	});
}else{_obj.getStore().removeAll(); _obj.setValue(""); _obj.disable();}}
function fextbud_tareas_areasParameters(poP){var _pan=poP["pan"];var _obj=(Ext.isEmpty(poP["objeto"])?_pan.down("#area_key"):poP["objeto"]);var _ot=(_pan.down("#tarea_key")?_pan.down("#tarea_key"):"");var _oa=(_pan.down("#area_key")?_pan.down("#area_key"):"");
var _TR=(poP["TR"]==undefined?"combo_area_nombre":poP["TR"]);var _TQ=(poP["TQ"]==undefined?"":poP["TQ"]);var _OB=(poP["OB"]==undefined?"area_nombre":poP["OB"]);var _mi=(poP["mi"]==undefined?"":poP["mi"]);
var _AB=(poP["AB"]==undefined?"YES":poP["AB"]);
if(_obj.getStore().storeId=="ext-empty-store"){_obj.bindStore(fext_CS("bud.Tareas_AreasCboArea"));};
_obj.getStore().on("beforeload",function(str,oper,eOpt){var _prx=str.getProxy();
	if(_ot!=""){_prx.setExtraParam("xxTarea_key",_ot.getValue());} if(_oa!=""){_prx.setExtraParam("xxArea_key",_oa.getValue());}
	_prx.setExtraParam("xxType_record",_TR); _prx.setExtraParam("xxType_query",_TQ); _prx.setExtraParam("xxOrder_by",_OB);_prx.setExtraParam("xxMenu_id",_menu_id); _prx.setExtraParam("xxAdd_blank",_AB);
});}
function fextbud_tareas_fftredLoad(poP){var _pan=poP["pan"];var _load=1;
var _dsb=(poP["dsb"]==undefined?false:poP["dsb"]);var _setVal=(poP["setVal"]==undefined?true:poP["setVal"]);var _val=(poP["val"]==undefined?"":poP["val"]);
var _area_key=(_pan.down("#area_key")?_pan.down("#area_key").getValue():"");var _mei=(_pan.down("#meta_id")?_pan.down("#meta_id").getValue()*1:"0"); var _tipgast_id=(_pan.down("#tipgast_id")?_pan.down("#tipgast_id").getValue():"0");var _tk=(_pan.down("#tarea_key")?_pan.down("#tarea_key").getValue():"");
var _obj=(poP["obj"]==undefined?_pan.down("#tareafte_key"):poP["obj"]);
var _clasif=(poP["clasif"]==undefined?"":poP["clasif"]);var _type=(poP["type"]==undefined?"":poP["type"]);
if(_type==""){
	if(Ext.isEmpty(_tk)){_load="";}
}else if(_type=="fftr"){var _fftr_all=(poP["fftr_all"]==undefined?"":poP["fftr_all"]);
	if(Ext.isEmpty(_area_key)&&_meta_id=="0"&&Ext.isEmpty(_tk)&&_fftr_all==""){_load="";}
}else if(_type=="fuefin"){var _fftr_all=(poP["fftr_all"]==undefined?"":poP["fftr_all"]);
	if(Ext.isEmpty(_area_key)&&_meta_id=="0"&&Ext.isEmpty(_tk)&&_fftr_all==""){ _load=""; }
}else if(_type=="tiprecur"){var _fuefin_id=(_pan.down("#fuefin_id")?_pan.down("#fuefin_id").getValue()*1:0);
	if(_fuefin_id=="0"){ _load=""; }
}else if(fjsIn_array(_type,["gene","espedet"])){
	if(Ext.isEmpty(_area_key)&&_meta_id=="0"&&Ext.isEmpty(_tk)&&_clasif.substr(0,1)!="F"){ _load=""; }
}
if(_load==""){
	if(_type==""){_obj.getStore().removeAll(); _obj.setValue(""); _obj.disable();}
	else{var _offtr=_pan.down("#fftr_id"); _off=_pan.down("#fuefin_id"); var _otr=_pan.down("#tiprecur_id"); var _oge=_pan.down("#gene_id"); var _oed=_pan.down("#espedet_id");
		if(_type==""){if(_off){_off.getStore().removeAll(); _off.setValue(""); _off.disable();}}
		if(fjsIn_array(_type,["","fuefin"])){if(_otr){_otr.getStore().removeAll(); _otr.setValue(""); _otr.disable();}}
		if(fjsIn_array(_type,["","fuefin","tiprecur"])){if(_oge){_oge.getStore().removeAll(); _oge.setValue(""); _oge.disable();}}
		if(fjsIn_array(_type,["","fuefin","tiprecur","gene"])){if(_oed){_oed.getStore().removeAll(); _oed.setValue(""); _oed.disable();}}
	}
}else{_obj.getStore().removeAll(); _obj.setValue("");
	_obj.getStore().load({callback:function(rec,oper,succ){var _len=(_obj.getStore().getProxy().extraParams["xxAdd_blank"]=="YES"?1:0); var _data=rec[0].data;
		if((rec.length>_len)&&_setVal){_obj.setDisabled(_dsb); _obj.setValue(_type==""?_data.tareafte_key:(_type=="fftr"?_data.fftr_id:(_type=="fuefin"?_data.fuefin_id:(_type=="tiprecur"?_data.tiprecur_id:(_type=="gene"?_data.gene_id:(_type=="espedet"?_data.espedet_id:""))))));}
		else if(rec.length>_len){_obj.setDisabled(_dsb);}else{_obj.disable();_obj.setValue("");}
		if(_type=="fuefin"){
			if(_pan.down("#tiprecur_id")){fextbud_tareas_fftredLoad({"panel":poP["panel"],"objeto":_pan.down("#tiprecur_id"),"type":"tiprecur","clasif":_clasif,"fftr_all":_fftr_all});}
			else{var _oge=_pan.down("#gene_id"); var _oed=_pan.down("#espedet_id");
				if(_clasif==""){if(_oge){_oge.getStore().removeAll();_oge.setValue("");_oge.disable();}if(_oed){_oed.getStore().removeAll();_oed.setValue("");_oed.disable();}}
				else{if(_oge){fextbud_tareas_fftredLoad({"panel":poP["panel"],"objeto":_pan.down("#gene_id"),"type":"gene","clasif":_clasif,"fftr_all":_fftr_all});}if(_oed){fextbud_tareas_fftredLoad({"panel":poP["panel"],"objeto":_pan.down("#espedet_id"),"type":"espedet","clasif":_clasif,"fftr_all":_fftr_all});}}
			}
		}
	}});
}

if(_type=="tiprecur"&&_clasif!=""){
	if(_pan.down("#gene_id")){fextbud_tareas_fftredLoad({pan:_pan,obj:_pan.down("#gene_id"),type:"gene",clasif:_clasif,fftr_all:_fftr_all});}
	if(_pan.down("#espedet_id")){fextbud_tareas_fftredLoad({pan:_pan,obj:_pan.down("#espedet_id"),type:"espedet",clasif:_clasif,fftr_all:_fftr_all});}
}}
function fextbud_tareas_fftredParameters(poP){var _pan=poP["pan"];var _mi=(poP["mi"]==undefined?"":poP["mi"]);
var _TR=(poP["TR"]==undefined?"":poP["TR"]);var _TQ=(poP["TQ"]==undefined?"":poP["TQ"]);var _OB=(poP["OB"]==undefined?"":poP["OB"]);
var _AB=(poP["AB"]==undefined?"YES":poP["AB"]);var _type=(poP["type"]==undefined?"":poP["type"]);
var _obj=(poP["obj"]==undefined?_pan.down("#tareafte_key"):poP["obj"]);
if(_obj.getStore().storeId=="ext-empty-store"){
	if(_type==""){ _obj.bindStore(fsxt_CS("bud.Tareas_FftredCbo")); }
	else if(fjsIn_array(_type,["fuefin"])){_obj.bindStore(fsxt_CS("bud.Tareas_FftredFuefin"));}
	else if(fjsIn_array(_type,["tiprecur"])){_obj.bindStore(fsxt_CS("bud.Tareas_FftredTiprecur"));}
	else if(fjsIn_array(_type,["gene"])){_obj.bindStore(fsxt_CS("bud.Tareas_FftredGene"));}
	else if(fjsIn_array(_type,["espedet"])){_obj.bindStore(fsxt_CS("bud.Tareas_FftredEspedet"));}
}
_obj.getStore().on("beforeload",function(str,oper,eOpt){var _prx=str.getProxy();
	_prx.setExtraParam("xxYear_id",poP["objYear_id"]==undefined?(_pan.down("#year_id")?_pan.down("#year_id").getValue():"0"):poP["objYear_id"].getValue());
	_prx.setExtraParam("xxArea_key",(_pan.down("#area_key")?_pan.down("#area_key").getValue():""));_prx.setExtraParam("xxMeta_id",(_pan.down("#meta_id")?_pan.down("#meta_id").getValue():"0"));_prx.setExtraParam("xxTarea_key",(_pan.down("#tarea_key")?_pan.down("#tarea_key").getValue():""));_prx.setExtraParam("xxTipgast_id",(_pan.down("#tipgast_id")?_pan.down("#tipgast_id").getValue():"0"));
	if(fjsIn_array(_type,["tiprecur","gene","espedet"])){_prx.setExtraParam("xxFuefin_id",(_pan.down("#fuefin_id")?_pan.down("#fuefin_id").getValue():"0"));}
	if(fjsIn_array(_type,["gene","espedet"])){_prx.setExtraParam("xxTiprecur_id",(_pan.down("#tiprecur_id") ? _pan.down("#tiprecur_id").getValue() : "0"));}
	if(fjsIn_array(_type,["espedet"])){_prx.setExtraParam("xxGene_id",(_pan.down("#gene_id")?_pan.down("#gene_id").getValue():"0"));}
	_prx.setExtraParam("xxMenu_id",_menu_id);_prx.setExtraParam("xxType_record",_TR); _prx.setExtraParam("xxType_query",_TQ); _prx.setExtraParam("xxOrder_by",_OB);_prx.setExtraParam("xxAdd_blank",_AB);
});} 

function fextbud_tipos_recursosFilter(poP){var _pan=poP["pan"];
var _tri=(poP["tri"]==undefined?"":poP["tri"]);var _yi=(poP["yi"]==undefined?"":poP["yi"]);var _ffi=(poP["ffi"]==undefined?"":poP["ffi"]);var _trc=(poP["trc"]==undefined?"":poP["trc"]);var _tre=(poP["tre"]==undefined?"1":poP["tre"]);
var _TR=(poP["TR"]==undefined?"combo_codename":poP["TR"]);var _TQ=(poP["TQ"]==undefined?"":poP["TQ"]);var _AB=(poP["AB"]==undefined?"YES":poP["AB"]);var _dsb=(poP["dsb"]==undefined?false:poP["dsb"]);
var _setVal=(poP["setVal"]==undefined?true:poP["setVal"]);var _val=(poP["val"]==undefined?"":poP["val"]); var _len=(_AB=="YES"?1:0);
var _cboTR=_pan.down("#tiprecur_id");if(_cboTR.getStore().storeId=="ext-empty-store"){_cboTR.bindStore(fext_CS("bud.Tipos_RecursosCbo"));}
_cboTR.getStore().load({params:{xxTiprecur_id:_tri,xxYear_id:_yi,xxFuefin_id:_ffi,xxTiprecur_estado:_tre,xxType_record:_TR,xxType_query:_TQ,xxAdd_blank:_AB},
	callback:function(rec,oper,succ){if(rec.length>_len){_cboTR.setDisabled(_dsb);if(_setVal){_cboTR.setValue((_val==""?rec[0].data.tiprecur_id:_val)*1);}}else{_cboTR.disable();_cboTR.setValue("");}}
});}
function fextbud_tipos_recursosLoad(poCombo,pbLoad){
if(pbLoad){poCombo.getStore().load({callback:function(rec,oper,succ){if(rec.length>0){poCombo.enable();poCombo.setValue(rec[0].data.tiprecur_id);}else{poCombo.disable();poCombo.setValue("");}}});}
else{poCombo.getStore().removeAll(); poCombo.disable(); poCombo.setValue("");}}
function fextbud_tipos_recursosParameters(poP){var _pan=poP["pan"];
var _TR=(poP["TR"]==undefined?"combo_codename":poP["TR"]);var _TQ=(poP["TQ"]==undefined?"":poP["TQ"]);var _AB=(poP["AB"]==undefined?"YES":poP["AB"]);
var _cboTR=_pan.down("#tiprecur_id");if(_cboTR.getStore().storeId=="ext-empty-store"){_cboTR.bindStore(fext_CS("bud.Tipos_RecursosCbo"));};
_cboTR.getStore().on("beforeload",function(str,oper,opt){var _prx=str.getProxy();
	_prx.setExtraParam("xxYear_id",poP["objYear_id"]==undefined?_pan.down("#year_id").getValue():poP["objYear_id"].getValue());_prx.setExtraParam("xxFuefin_id",_pan.down("#fuefin_id").getValue());
	_prx.setExtraParam("xxType_record",_TR); _prx.setExtraParam("xxType_query",_TQ);_prx.setExtraParam("xxAdd_blank",_AB);
});}
function fextlog_lugares_entregaFilter(poP){var _obj=poP["obj"];var _lei=(poP["lei"]==undefined?"":poP["lei"]);var _lee=(poP["lee"]==undefined?1:poP["lee"]);var _val=(poP["val"]==undefined?"":poP["val"]);
var _TR=(poP["TR"]==undefined?"cbo":poP["TR"]);var _TQ=(poP["TQ"]==undefined?"":poP["TQ"]);var _OB=(poP["OB"]==undefined?"":poP["OB"]);var _AB=(poP["AB"]==undefined?"YES":poP["AB"]);var _dsb=(poP["dsb"]==undefined?false:poP["dsb"]);var _setVal=(poP["setVal"]==undefined?true:poP["setVal"]);var _len=(_AB=="YES"?1:0);
if(_obj.getStore().storeId=="ext-empty-store"){_obj.bindStore(fext_CS("log.Lugares_EntregaCbo"));}
_obj.getStore().load({params:{xxLugentr_id:_lei,xxLugentr_estado:_lee,xxType_record:_TR,xxType_query:_TQ,xxOrder_by:_OB,xxAdd_blank:_AB},
	callback:function(rec,oper,succ){if(rec.length>_len){_obj.setDisabled(_dsb);if(_setVal){_obj.setValue(_val==""?rec[0].data.lugentr_id*1:_val*1);}}else{_obj.disable();_obj.setValue("");}}
});}
function fextpub_areasFilter(poP){var _obj=poP["obj"];var _visible=(poP["visible"]==undefined?true:poP["visible"]);_obj.setVisible(_visible);
var _ak=(poP["ak"]==undefined?"":poP["ak"]);var _ae=(poP["ae"]==undefined?"":poP["ae"]);var _uek=(poP["uek"]==undefined?Ext.getCmp("ah_txtUnieje_key").getValue():poP["uek"]);
var _TR=(poP["TR"]==undefined?"combo_abrev":poP["TR"]);var _TQ=(poP["TQ"]==undefined?"":poP["TQ"]);var _AB=(poP["AB"]==undefined?"YES":poP["AB"]);var _dsb=(poP["dsb"]==undefined?false:poP["dsb"]);
var _setVal=(poP["setVal"]==undefined?true:poP["setVal"]);var _val=(poP["val"]==undefined?"":poP["val"]);var _len=(_AB=="YES"?1:0);
if(_obj.getStore().storeId=="ext-empty-store"){_obj.bindStore(fext_CS("pub.AreasCbo"))};
_obj.getStore().load({params:{xxArea_key:_ak,xxArea_estado:_ae,xxUnieje_key:_uek,xxType_record:_TR,xxType_query:_TQ,xxAdd_blank:_AB},callback:function(rec,oper,succ){if(rec.length>_len){_obj.setDisabled(_dsb);if(_setVal){_obj.setValue(_val==""?rec[0].data.area_key:_val);}}else{_obj.disable();_obj.setValue("");}}});}
function fextpub_bienes_servs_clasesLoad(poP){var _pan=poP["pan"];var _dsb=(poP["dsb"]==undefined?false:poP["dsb"]);var _setVal=(poP["setVal"]==undefined?true:poP["setVal"]);var _bsg_id=(_pan.down("#bsg_id")?_pan.down("#bsg_id").getValue():0);var _cboBSC=_pan.down("#bsc_id");
if(_pan.down("#bsf_id")){ _pan.down("#bsf_id").getStore().removeAll();_pan.down("#bsf_id").setValue("");_pan.down("#bsf_id").disable(); }
if(_bsg_id*1>0){_cboBSC.getStore().load({callback:function(rec,oper,succ){var _len=(_cboBSC.getStore().getProxy().extraParams["xxAdd_blank"]=="YES"?1:0);if(rec.length>_len){_cboBSC.setDisabled(_dsb);if(_setVal){_cboBSC.setValue(rec[0].data.bsc_id);}}else{_cboBSC.disable();_cboBSC.setValue("");}}});}
else{_cboBSC.getStore().removeAll();_cboBSC.setValue("");_cboBSC.disable();}}
function fextpub_bienes_servs_clasesParameters(poP){var _pan=poP["pan"];var _bsce=(poP["bsce"]==undefined?"":poP["bsce"]);
var _TR=(poP["TR"]==undefined?"combo_codename":poP["TR"]);var _TQ=(poP["TQ"]==undefined?"":poP["TQ"]);var _OB=(poP["OB"]==undefined?"":poP["OB"]);var _AB=(poP["AB"]==undefined?"YES":poP["AB"]);
var _cboBSC=_pan.down("#bsc_id");if(_cboBSC.getStore().storeId=="ext-empty-store"){_cboBSC.bindStore(fext_CS("pub.Bienes_Servs_ClasesCbo"));};
_cboBSC.getStore().on("beforeload",function(str,oper,opt){var _prx=str.getProxy();
	_prx.setExtraParam("xxBst_id",(_pan.down("#bst_id")?_pan.down("#bst_id").getValue():0));_prx.setExtraParam("xxBsg_id",(_pan.down("#bsg_id")?_pan.down("#bsg_id").getValue():0));_prx.setExtraParam("xxBsc_estado",_bsce);
	_prx.setExtraParam("xxType_record",_TR);_prx.setExtraParam("xxType_query",_TQ);_prx.setExtraParam("xxOrder_by",_OB);_prx.setExtraParam("xxAdd_blank",_AB);
});}
function fextpub_bienes_servs_clases_marcasLoad(poP){var _pan=poP["panel"];var _bsc_id=(_pan.down("#bsc_id")?_pan.down("#bsc_id").getValue():"0");var _obj=(poP["objeto"]==undefined?_pan.down("#marc_key"):poP["objeto"]);
if(_bsc_id*1>0){_obj.getStore().load({callback:function(rec,oper,succ){if(rec.length>0){_obj.enable(); _obj.setValue(rec[0].data.marc_key);}else{_obj.disable(); _obj.setValue("");}}});}else{_obj.getStore().removeAll();_obj.setValue("");_obj.disable();}}
function fextpub_bienes_servs_clases_marcasParameters(poP){var _pan=poP["pan"]; var _obj=(poP["obj"]==undefined?_pan.down("#marc_key"):poP["objeto"]);
var _bscme=(poP["bscme"]==undefined?"":poP["bscme"]);
var _TR=(poP["TR"]==undefined?"combo_marcas":poP["TR"]);var _TQ=(poP["TQ"]==undefined?"":poP["TQ"]);var _OB=(poP["OB"]==undefined?"":poP["OB"]);var _AB=(poP["AB"]==undefined?"YES":poP["AB"]);
if(_obj.getStore().storeId=="ext-empty-store"){_obj.bindStore(fext_CS("pub.Bienes_Servs_Clases_MarcasCbo"));};
_obj.getStore().on("beforeload",function(str,oper,opt){var _prx=str.getProxy();_prx.setExtraParam("xxBsc_id",(_pan.down("#bsc_id")?_pan.down("#bsc_id").getValue():0));_prx.setExtraParam("xxBscmarc_estado",_bscme);_prx.setExtraParam("xxType_record",_TR); _prx.setExtraParam("xxType_query",_TQ); _prx.setExtraParam("xxOrder_by",_OB);_prx.setExtraParam("xxAdd_blank",_AB);});}
function fextpub_bienes_servs_familiasLoad(poP){var _pan=poP["pan"];var _dsb=(poP["dsb"]==undefined?false:poP["dsb"]);var _setVal=(poP["setVal"]==undefined?true:poP["setVal"]);var _bsc_id=(_pan.down("#bsc_id")?_pan.down("#bsc_id").getValue():0);var _cboBSF=_pan.down("#bsf_id");
if(_bsc_id*1>0){_cboBSF.getStore().load({callback:function(rec,oper,succ){var _len=(_cboBSF.getStore().getProxy().extraParams["xxAdd_blank"]=="YES"?1:0);if(rec.length>_len){_cboBSF.setDisabled(_dsb);if(_setVal){_cboBSF.setValue(rec[0].data.bsf_id);}}else{_cboBSF.disable();_cboBSF.setValue("");}}});}else{_cboBSF.getStore().removeAll();_cboBSF.setValue("");_cboBSF.disable();}}
function fextpub_bienes_servs_familiasParameters(poP){var _pan=poP["pan"];var _bsfe=(poP["bsfe"]==undefined?"":poP["bsfe"]);var _TR=(poP["TR"]==undefined?"combo_codename":poP["TR"]);var _TQ=(poP["TQ"]==undefined?"":poP["TQ"]);var _OB=(poP["OB"]==undefined?"":poP["OB"]);var _AB=(poP["AB"]==undefined?"YES":poP["AB"]);var _cboBSF=_pan.down("#bsf_id");
if(_cboBSF.getStore().storeId=="ext-empty-store"){_cboBSF.bindStore(Ext.create("Siace.store.pub.Bienes_Servs_FamiliasCbo"));};
_cboBSF.getStore().on("beforeload",function(str,oper,opt){var _prx=str.getProxy();
	_prx.setExtraParam("xxBst_id",(_pan.down("#bst_id")?_pan.down("#bst_id").getValue():0));_prx.setExtraParam("xxBsg_id",(_pan.down("#bsg_id")?_pan.down("#bsg_id").getValue():"0"));_prx.setExtraParam("xxBsc_id",(_pan.down("#bsc_id")?_pan.down("#bsc_id").getValue():0));_prx.setExtraParam("xxBsf_estado",_bsfe);
	_prx.setExtraParam("xxType_record",_TR); _prx.setExtraParam("xxType_query",_TQ); _prx.setExtraParam("xxOrder_by",_OB);_prx.setExtraParam("xxAdd_blank",_AB);
});}
function fextpub_bienes_servs_gruposLoad(poP){var _pan=poP["pan"];var _dsb=(poP["dsb"]==undefined?false:poP["dsb"]);var _setVal=(poP["setVal"]==undefined?true:poP["setVal"]);var _bst_id=(_pan.down("#bst_id")?_pan.down("#bst_id").getValue():0);var _cboBSG=_pan.down("#bsg_id");
if(_pan.down("#bsc_id")){_pan.down("#bsc_id").getStore().removeAll();_pan.down("#bsc_id").setValue("");_pan.down("#bsc_id").disable();}
if(_pan.down("#bsf_id")){_pan.down("#bsf_id").getStore().removeAll();_pan.down("#bsf_id").setValue("");_pan.down("#bsf_id").disable();}
if(_bst_id*1>0){_cboBSG.getStore().load({callback:function(rec,oper,succ){var _len=(_cboBSG.getStore().getProxy().extraParams["xxAdd_blank"]=="YES"?1:0);if(rec.length>_len){_cboBSG.setDisabled(_dsb);if(_setVal){_cboBSG.setValue(rec[0].data.bsg_id);}}else{_cboBSG.disable();_cboBSG.setValue("");}}});}
else{_cboBSG.getStore().removeAll();_cboBSG.setValue("");_cboBSG.disable();}}
function fextpub_bienes_servs_gruposParameters(poP){var _pan=poP["panel"];var _bsge=(poP["bsge"]==undefined?"":poP["bsge"]);var _TR=(poP["TR"]==undefined?"combo_codename":poP["TR"]);var _TQ=(poP["TQ"]==undefined?"":poP["TQ"]);var _OB=(poP["OB"]==undefined?"":poP["OB"]);var _AB=(poP["AB"]==undefined?"YES":poP["AB"]);var _cboBSG=_pan.down("#bsg_id");
if(_cboBSG.getStore().storeId=="ext-empty-store"){_cboBSG.bindStore(fext_CS("pub.Bienes_Servs_GruposCbo"));};
_cboBSG.getStore().on("beforeload",function(str,oper,opt){var _prx=str.getProxy();_prx.setExtraParam("xxBst_id",(_pan.down("#bst_id")?_pan.down("#bst_id").getValue():0));_prx.setExtraParam("xxBsg_estado",_bsge);_prx.setExtraParam("xxType_record",_TR); _prx.setExtraParam("xxType_query",_TQ); _prx.setExtraParam("xxOrder_by",_OB);_prx.setExtraParam("xxAdd_blank",_AB);});}
function fextpub_departamentosRecords(po_cboDpto_id,pcPais_id){po_cboDpto_id.getStore().load({params:{xxPais_id:pcPais_id,xxType_record:"cboPais_id"}});}
function fextpub_documentosFilter(poP){var _obj=poP["objeto"]; var _doc_id=(poP["doc_id"]==undefined?"":poP["doc_id"]);var _docser_estado=(poP["docser_estado"]==undefined?"":poP["docser_estado"]);
var _doc_escompra=(poP["doc_escompra"]==undefined?"":poP["doc_escompra"]); var _doc_esgasto=(poP["doc_esgasto"]==undefined?"":poP["doc_esgasto"]); var _doc_esventa=(poP["doc_esventa"]==undefined?"":poP["doc_esventa"]); var _doc_escobro=(poP["doc_escobro"]==undefined?"":poP["doc_escobro"]); var _doc_espago=(poP["doc_espago"]==undefined?"":poP["doc_espago"]); var _doc_esdocumentary=(poP["doc_esdocumentary"]==undefined?"":poP["doc_esdocumentary"]); var _doc_esexportar=(poP["doc_esexportar"]==undefined?"":poP["doc_esexportar"]);
var _TR=(poP["type_record"]==undefined?"combo":poP["type_record"]); var _TQ=(poP["type_query"]==undefined?"":poP["type_query"]); var _OB=(poP["order_by"]==undefined?"":poP["order_by"]);
var _AB=(poP["add_blank"]==undefined?"YES":poP["add_blank"]); var _dsb=(poP["disabled"]==undefined?false:poP["disabled"]);
var _setVal=(poP["setValue"]==undefined?true:poP["setValue"]); var _len=(_AB=="YES"?1:0);
if(_obj.getStore().storeId=="ext-empty-store"){_obj.bindStore(fext_CS("pub.DocumentosCbo"));}
_obj.getStore().load({params:{xxDoc_id:_doc_id,xxDoc_escompra:_doc_escompra,xxDoc_esgasto:_doc_esgasto,xxDoc_esventa:_doc_esventa,xxDoc_escobro:_doc_escobro,xxDoc_espago:_doc_espago,xxDoc_esdocumentary:_doc_esdocumentary,xxDoc_esexportar:_doc_esexportar,xxType_record:_TR,xxType_query:_TQ,xxOrder_by:_OB,xxAdd_blank:_AB},
	callback:function(rec,oper,succ){if(rec.length>_len){_obj.setDisabled(_dsb);if(_setVal){_obj.setValue(rec[0].data.doc_id);}}else{_obj.disable();_obj.setValue("");}}
});}
function fextpub_modelosLoad(poP){var _pan=poP["panel"];var _marc_key=(_pan.down("#marc_key")?_pan.down("#marc_key").getValue():"");
var _obj=(poP["objeto"]==undefined?_pan.down("#mod_key"):poP["objeto"]);
if(_marc_key==""||_marc_key==null){_obj.getStore().removeAll();_obj.setValue("");_obj.disable();}
else{_obj.getStore().load({callback:function(rec,oper,succ){if(rec.length>0){_obj.enable(); _obj.setValue(rec[0].data.mod_key);}else{_obj.disable();_obj.setValue("");}}});}}

function fextpub_modelosParameters(poP){var _pan=poP["panel"]; var _mod_estado=(poP["mod_estado"]==undefined?"":poP["mod_estado"]);
var _TR=(poP["type_record"]==undefined?"combo":poP["type_record"]); var _TQ=(poP["type_query"]==undefined?"":poP["type_query"]); var _OB=(poP["order_by"]==undefined?"":poP["order_by"]);var _AB=(poP["add_blank"]==undefined?"YES":poP["add_blank"]);
var _obj=(poP["objeto"]==undefined?_pan.down("#mod_key"):poP["objeto"]);
if(_obj.getStore().storeId=="ext-empty-store"){_obj.bindStore(fext_CS("pub.ModelosCbo"));};
_obj.getStore().on("beforeload",function(str,oper,opt){var _prx=str.getProxy();
	_prx.setExtraParam("xxMarc_key",(_pan.down("#marc_key")?(_pan.down("#marc_key").getValue()==""?"999":_pan.down("#marc_key").getValue()):""));_prx.setExtraParam("xxMod_estado",_mod_estado);
	_prx.setExtraParam("xxType_record",_TR);_prx.setExtraParam("xxType_query",_TQ);_prx.setExtraParam("xxOrder_by",_OB);_prx.setExtraParam("xxAdd_blank",_AB);
});}

function fextpub_paisesFilter(poP){var _obj=poP["objeto"]; var _TR=(poP["type_record"]==undefined?"combo":poP["type_record"]); var _TQ=(poP["type_query"]==undefined?"":poP["type_query"]); var _OB=(poP["order_by"]==undefined?"":poP["order_by"]); var _AB=(poP["add_blank"]==undefined?"YES":poP["add_blank"]); var _setVal=(poP["setValue"]==undefined?true:poP["setValue"]);
if(_obj.getStore().storeId=="ext-empty-store"){_obj.bindStore(Ext.create("Siace.store.pub.PaisesCbo"));}
_obj.getStore().load({params:{xxType_record:_TR,xxType_query:_TQ,xxAdd_blank:_AB},
	callback:function(rec,oper,succ){if(rec.length>0&&_setVal){_obj.setValue(rec[0].data.pais_id);}else if(rec.length>0){}else{_obj.disable();_obj.setValue("");}}
});}
function fextpub_perssess(poD){Ext.getCmp("ah_txtPerssess_key").setValue(poD.perssess_key);Ext.getCmp("ah_txtPersacce_key").setValue(poD.persacce_key);Ext.getCmp("ah_txtPers_key").setValue(poD.pers_key);Ext.getCmp("ah_txtUnieje_key").setValue(poD.unieje_key);Ext.getCmp("ah_imgUnieje_logo").setSrc("resources/images/"+poD.unieje_logo);Ext.getCmp("ah_lblUnieje_nombre").setValue(poD.unieje_nombre);Ext.getCmp("ah_lblDate_server").setText(poD.date_server);Ext.getCmp("ah_lblData_pers").setValue(poD.pers_ruc+" - "+poD.pers_nombre);}
//function fextpub_sessionVariables(){var _IDs=new Array();_IDs["ps"]=Ext.getCmp("ah_txtPerssess_key").getValue();_IDs["pa"]=Ext.getCmp("ah_txtPersacce_key").getValue();_IDs["p"]=Ext.getCmp("ah_txtPers_key").getValue();_IDs["ue"]=Ext.getCmp("ah_txtUnieje_key").getValue();return _IDs;}
function fextpub_sessVar(){var _IDs={ps:Ext.getCmp("ah_txtPerssess_key").getValue(),pa:Ext.getCmp("ah_txtPersacce_key").getValue(),p:Ext.getCmp("ah_txtPers_key").getValue(),ue:Ext.getCmp("ah_txtUnieje_key").getValue()};return _IDs;}
function fextpub_tabgenFilt(poP){var _obj=poP["obj"];var _tgp=(poP["tgp"]==undefined?0:poP["tgp"]);var _tge=(poP["tge"]==undefined?"":poP["tge"]);
var _TR=(poP["TR"]==undefined?"combo":poP["TR"]);var _TQ=(poP["TQ"]==undefined?"":poP["TQ"]);var _OB=(poP["OB"]==undefined?"":poP["OB"]);var _AB=(poP["AB"]==undefined?"YES":poP["AB"]);var _dsb=(poP["dsb"]==undefined?false:poP["dsb"]);
var _setVal=(poP["setVal"]==undefined?true:poP["setVal"]);var _val=(poP["val"]==undefined?"":poP["val"]*1);var _len=(_AB=="YES"?1:0);
if(fext_SIE(_obj.getStore())){_obj.bindStore(fext_CS("pub.Tablas_GeneralesCbo"));}
_obj.getStore().load({params:{xxTabgen_parent:_tgp,xxTabgen_estado:_tge,xxType_record:_TR,xxType_query:_TQ,xxOrder_by:_OB,xxAdd_blank:_AB},callback:function(rec){if((rec.length>_len)&&_setVal){_obj.setDisabled(_dsb);_obj.setValue(_val==""?rec[0].data.tabgen_id:_val);}else if(rec.length>_len){_obj.setDisabled(_dsb);}else{_obj.disable();_obj.setValue("");}}});}
function fextpub_tipos_documentos_identidadFilter(poP){var _obj=poP["obj"];var _tdiei=(poP["tdiei"]==undefined?"":poP["tdiei"]); var _tdiep=(poP["tdiep"]==undefined?"":poP["tdiep"]);
var _TR=(poP["TR"]==undefined?"combo_abrev":poP["TR"]);var _TQ=(poP["TQ"]==undefined?"":poP["TQ"]);var _OB=(poP["OB"]==undefined?"":poP["OB"]);
var _AB=(poP["AB"]==undefined?"YES":poP["AB"]);var _dsb=(poP["dsb"]==undefined?false:poP["dsb"]);
if(_obj.getStore().storeId=="ext-empty-store"){ _obj.bindStore(fext_CS("pub.Tipos_Documentos_IdentidadCbo")); }
_obj.getStore().load({params:{xxTipdocident_estado_individuos:_tdiei,xxTipdocident_estado_personas:_tdiep,xxType_record:_TR,xxType_query:_TQ,xxOrder_by:_OB,xxAdd_blank:_AB},
	callback:function(rec,oper,succ){if(rec.length>1){_obj.setDisabled(_dsb); _obj.setValue(rec[0].data.tipdocident_id);}else{_obj.disable();_obj.setValue("");}}
});}
function fextpub_tipos_pagoFilter(poP){var _obj=poP["obj"];var _tpi=(poP["tpi"]==undefined?"":poP["tpi"]);
var _tippag_escompra=(poP["tippag_escompra"]==undefined?"":poP["tippag_escompra"]); var _tippag_esventa=(poP["tippag_esventa"]==undefined?"":poP["tippag_esventa"]); var _tippag_escobro=(poP["tippag_escobro"]==undefined?"":poP["tippag_escobro"]); var _tippag_espago=(poP["tippag_espago"]==undefined?"":poP["tippag_espago"]);
var _TR=(poP["TR"]==undefined?"cbo":poP["TR"]);var _TQ=(poP["TQ"]==undefined?"":poP["TQ"]);var _OB=(poP["OB"]==undefined?"":poP["OB"]);var _AB=(poP["AB"]==undefined?"YES":poP["AB"]);var _dsb=(poP["dsb"]==undefined?false:poP["dsb"]);
var _setVal=(poP["setVal"]==undefined?true:poP["setVal"]);var _len=(_AB=="YES"?1:0);
if(_obj.getStore().storeId=="ext-empty-store"){_obj.bindStore(fext_CS("pub.Tipos_PagoCbo"));}
_obj.getStore().load({params:{xxTippag_id:_tpi,xxTippag_escompra:_tippag_escompra,xxTippag_esventa:_tippag_esventa,xxTippag_escobro:_tippag_escobro,xxTippag_espago:_tippag_espago,xxType_record:_TR,xxType_query:_TQ,xxOrder_by:_OB,xxAdd_blank:_AB},
	callback:function(rec,oper,succ){if((rec.length>_len)&&_setVal){_obj.setDisabled(_dsb);_obj.setValue(rec[0].data.tippag_id);}else if(rec.length>_len){_obj.setDisabled(_dsb);}else{_obj.disable();_obj.setValue("");}}
});}
function fextpub_unidades_medidaFilter(poP){var _obj=poP["obj"];var _umb=(poP["umb"]==undefined?"":poP["umb"]);var _ums=(poP["ums"]==undefined?"":poP["ums"]);
var _TR=(poP["TR"]==undefined?"combo":poP["TR"]);var _TQ=(poP["TQ"]==undefined?"":poP["TQ"]);var _OB=(poP["OB"]==undefined?"":poP["OB"]);var _AB=(poP["AB"]==undefined?"YES":poP["AB"]);var _dsb=(poP["dsb"]==undefined?false:poP["dsb"]);
var _setVal=(poP["setVal"]==undefined?true:poP["setVal"]);var _len=(_AB=="YES"?1:0);
if(_obj.getStore().storeId=="ext-empty-store"){ _obj.bindStore(fext_CS("pub.Unidades_MedidaCbo")); }
_obj.getStore().load({params:{xxUnimed_bien:_unimed_bien, xxUnimed_serv:_unimed_serv,xxType_record:_TR,xxType_query:_TQ,xxOrder_by:_OB,xxAdd_blank:_AB},
	callback:function(rec,oper,succ){if((rec.length>_len)&&_setVal){_obj.setDisabled(_dsb); _obj.setValue(rec[0].data.unimed_id);}else if(rec.length>_len){_obj.setDisabled(_dsb);}else{_obj.disable();_obj.setValue("");}}
});}
function fextpub_yearsFilter(poP){var _obj=poP["objeto"];var _ye=(poP["ye"]==undefined?"":poP["ye"]);
var _TR=(poP["TR"]==undefined?"combo":poP["TR"]);var _TQ=(poP["TQ"]==undefined?"":poP["TQ"]);var _OB=(poP["OB"]==undefined?"":poP["OB"]);var _AB=(poP["AB"]==undefined?"YES":poP["AB"]);
_obj.bindStore(fext_CS("pub.Years"));_obj.getStore().load({params:{xxYear_estado:_ye,xxType_record:_TR,xxType_query:_TQ,xxOrder_by:_OB,xxAdd_blank:_AB},callback:function(rec,oper,succ){if(rec.length>0){_obj.setValue(rec[0].data.year_id);}else{_obj.disable();_obj.setValue("");}}});}
function fextpub_yearsValue(poYear_id,pnVal){if(pnVal*1>0){poYear_id.setValue(pnVal);}else{var _rec=poYear_id.getStore().first();poYear_id.setValue(_rec.data.year_id);}}
function fextpub_yearsVisible(poCbo,pcYear_id){if(Ext.isEmpty(pcYear_id)||pcYear_id*1<=0){var _rec=poCbo.getStore().first();poCbo.setValue(_rec.data.year_id);poCbo.setVisible(true);}else{poCbo.setValue(pcYear_id*1);poCbo.setVisible(false);}}