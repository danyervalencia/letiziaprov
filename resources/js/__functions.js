function fjsCalculateVVenta( pnMonto, pnInafecto, pnTribval_contable ) {
    var _vv = fjsRound(((pnMonto*1) - (pnInafecto*1)) / pnTribval_contable*1, 2)*1 + pnInafecto*1;
    return _vv*1;
}

function fjsCallNewPage( pcUrl, pcForm ) {
    _form = ( !pcForm || pcForm == '' ? 'frm' : pcForm );
    document.getElementById(_form).action = pcUrl;
    document.getElementById(_form).method = 'POST';
    document.getElementById(_form).target = '_blank';
    document.getElementById(_form).submit();
}

function fjsComprobarBisiesto( anio ) {
    if ( ( anio % 100 != 0) && ((anio % 4 == 0) || (anio % 400 == 0))) {
        return true;
    } else {
        return false;
    }
}

function fjsDateCurrent(pcFormat) {
    var _d = new Date();
    if ( pcFormat == '' || pcFormat == null ) {
        var _df = _d.getFullYear() +'-'+ fjsLpad((_d.getMonth()+1),2,'0') +'-'+ fjsLpad(_d.getDate(),2,'0');
    }
    return _df;
}

function fjsDateDDMMAAAA( pcFecha ) {
    if ( pcFecha == "" || pcFecha == null ) {
        lcReturn = "";
    } else {
       laData = pcFecha.split("-");
       lcReturn = laData[2] + "/" +  laData[1] +"/"+ laData[0];
    }
    return lcReturn;
}

function fjsDateFirstDayMonth(pcFormat) {
    var _d = fjsDateCurrent(pcFormat);
    if ( pcFormat == '' || pcFormat == null ) {
        var _df = _d.substring(0,8) + '01';
    }
    return _df;
}

function fjsDateFirstDayYear(pcFormat) {
    var _d = fjsDateCurrent(pcFormat);
    if ( pcFormat == '' || pcFormat == null ) {
        var _df = _d.substring(0,5) + '01-01';
    }
    return _df;
}

function fjsDateMonthName(pcMonth) {
    var _nro = pcMonth*1; var _name = '';
    if ( _nro == '1' ) { _name = 'Enero'; }
    else if ( _nro == '2' ) { _name = 'Febrero'; }
    else if ( _nro == '3' ) { _name = 'Marzo'; }
    else if ( _nro == '4' ) { _name = 'Abril'; }
    else if ( _nro == '5' ) { _name = 'Mayo'; }
    else if ( _nro == '6' ) { _name = 'Junio'; }
    else if ( _nro == '7' ) { _name = 'Julio'; }
    else if ( _nro == '8' ) { _name = 'Agosto'; }
    else if ( _nro == '9' ) { _name = 'Setiembre'; }
    else if ( _nro == '10' ) { _name = 'Octubre'; }
    else if ( _nro == '11' ) { _name = 'Noviembre'; }
    else if ( _nro == '12' ) { _name = 'Diciembre'; }
    return _name;
}

function fjsDateSQL( pcFecha ) {
    if ( pcFecha == '' ) {
        return '';
    } else {
        var laData = pcFecha.split("/");
        lcRetu = laData[2] + "-" + laData[1] + "-" + laData[0];
        return lcRetu;
    }
}

function fjsDtos( pcFech ) { /*  debe recibir fechas de tipo 2011-12-31*/
    var laData = pcFech.split("-");
    lcRetu = laData[0] + laData[1] + laData[2];
    return lcRetu;
}

function fjsFormatCurrency( num ) {
    num = num.toString().replace(/$|,/g,'');
    if(isNaN(num))
    num = "0";
    sign = ( num == ( num = Math.abs(num) ) );
    num = Math.floor( num*100+0.50000000001 );
    cents = num%100;
    num = Math.floor(num/100).toString();
    if( cents < 10 )
    cents = "0" + cents;
    for ( var i = 0; i < Math.floor( (num.length-(1+i))/3 ); i++ )
    num = num.substring( 0,num.length-(4*i+3) )+','+
    num.substring( num.length-(4*i+3) );
    //return (((sign)?'':'-') + '$' + num + '.' + cents);
    return ( ((sign)?'':'-') + num + '.' + cents );
}

function fjsFormatDate( evt ) {
    evt = (evt) ? evt : event; //Validar la existencia del objeto event
    var charCode = (evt.charCode) ? evt.charCode : ( (evt.keyCode) ? evt.keyCode : ((evt.which) ? evt.which : 0) );
    var lbRpta = true;
    if ( (charCode > 31) && (charCode < 47 || charCode > 57) ) {
        lbRpta = false;  
    }
    return lbRpta;
}

function fjsFormatFixed( pcObje, pcNume ) {
    lcNumero = $("#"+pcObje).val()*1;
    $("#"+pcObje).val( lcNumero.toFixed(pcNume) );
}

function fjsFormatInteger( num ) {
    var cadena = "";  var aux;
    var cont = 1,m,k;
  
    if( num < 0 ) aux=1; else aux=0;
    num = num.toString();

    for(m=num.length-1; m>=0; m--) {
        cadena = num.charAt(m) + cadena;
        if( cont%3 == 0 && m > aux )  cadena = "," + cadena; else cadena = cadena;
        if( cont == 3 ) cont = 1; else cont++;
    }
  
    //cadena = cadena.replace(/.,/,",");
    return cadena;
}

function fjsFormatNumeric( pnNumero, pnDec ) {
    var separador_miles = ',';
    if ( isNaN(pnNumero) ) { return ''; }
    var _num = (pnNumero*1).toFixed(20);
    var _arr = _num.split(".");
    var _e = _arr[0];  _d = _arr[1];

    if( pnDec !== undefined ) {
        if ( pnDec*1 > 0 ) {
            numero = pnNumero * 1;
            _num = numero.toFixed(pnDec);
            _arr = _num.split(".");
            _e = _arr[0];  _d = _arr[1];

            _ent = fjsFormatInteger(_e);  _dec = "." + _d;
        } else {
            _ent = _e;  _dec = "";
        }
    } else {
        _ent = _e;  _dec = "";
    }

    return _ent + _dec;
    
}

function fjsFormatTextZeros( pcObjeto, pcNumero ) {
    lcTexto = $("#"+pcObjeto).val();
    if ( lcTexto.length < pcNumero ) {
        $("#"+pcObjeto).val( fjsLpad(lcTexto, pcNumero, "0") );
    }
}

function fjsIn_array(needle, haystack, argStrict) {
    // *     example 1: in_array('van', ['Kevin', 'van', 'Zonneveld']);    // *     returns 1: true
    // *     example 2: in_array('vlado', {0: 'Kevin', vlado: 'van', 1: 'Zonneveld'});
    // *     returns 2: false
    // *     example 3: in_array(1, ['1', '2', '3']);
    // *     returns 3: true    // *     example 3: in_array(1, ['1', '2', '3'], false);
    // *     returns 3: true
    // *     example 4: in_array(1, ['1', '2', '3'], true);
    // *     returns 4: false
    var key = "";  strict = !! argStrict;
 
    if (strict) {
        for ( key in haystack ) {
            if (haystack[key] === needle) { return true; }
        }
    } else {
        for (key in haystack) {
            if (haystack[key] == needle) { return true; }
        }
    }
    return false;
}

function fjsLpad( pcCade, pnLen, pcChar ) {
    var _y = (pcCade+'').length;
    _y = pnLen - _y;
    for ( var _i=1; _i<=_y; _i++ ) { pcCade = pcChar + pcCade; }
    return pcCade;
}

function fjsLTrim( pcCade ) {
    return pcCade.replace(/^\s+/, "");
}

function fjsPersonaUsser(poData) {
    Ext.getCmp('ah_txtPerssess_key').setValue(poData.perssess_key);
    Ext.getCmp('ah_txtPersacce_key').setValue(poData.persacce_key);
    Ext.getCmp('ah_txtYear_id').setValue(poData.year_id);
    Ext.getCmp('ah_txtPers_key').setValue(poData.pers_key);
    Ext.getCmp('ah_lblDate_server').setText(poData.date_server);
    Ext.getCmp('ah_lblData_pers').setValue('Proveedor:  ' + poData.pers_ruc +' - '+ poData.pers_nombre +' ::: '+ poData.year_id);
    Ext.getCmp('ah_btnKeyGo').setDisabled(true); Ext.getCmp('ah_btnKeyGo').setVisible(false); Ext.getCmp('ah_btnLogout').setDisabled(false); Ext.getCmp('ah_btnLogout').setVisible(true);
    Siace.app.getController('access.Menus').am_AddMenu();
    Siace.util.SessionMonitor.start();
}

function fjsRepeat( pcChar, pnNume ) {
    var _lc = '';
    for ( _i=1; _i <= pnNume*1; _i++ ) { _lc = _lc +''+ pcChar; }     
    return _lc;
}

function fjsRound( pnNumero, pnDec ) {
    _numero = ( isNaN(pnNumero*1) ? 0 : pnNumero );
    var p = Math.pow(10, pnDec);
    return (Math.round(parseFloat(_numero) * p) / p).toFixed(pnDec);
}

function fjsRpad( pcCade, pnLen, pcChar ) {
    __y = (pcCade+"").length;
    __y = pnLen - __y;
    for ( __i=1; __i<=__y; __i++ ) { pcCade = pcCade + pcChar; }
    return pcCade;
}

function fjsRTrim( pcCade ) {
    return pcCade.replace(/\s+$/, "");
}

function fjsOnlyNumeric( evt ) {
    evt = (evt) ? evt : event; //Validar la existencia del objeto event
    //Extraer el codigo del caracter de uno de los diferentes grupos de codigos
    var charCode = (evt.charCode) ? evt.charCode : ( (evt.keyCode) ? evt.keyCode : ((evt.which) ? evt.which : 0) );
    var lbRpta = true;
    if ( charCode ==  46 )                                        { lbRpta = true; }
    else if ( charCode > 31 && (charCode < 48 || charCode > 57) ) { lbRpta = false; }
    return lbRpta;
}

function fjsTimeSubtractHours(pcHoraini, pcHorafin, pnRedondeo) {
    var _inicioHoras = pcHoraini.substr(0,2); //parseInt(pcHoraini.substr(0,2));
    var _inicioMinutos = pcHoraini.substr(3,2); //parseInt(pcHoraini.substr(3,2));
  
    var _finHoras = pcHorafin.substr(0,2); //parseInt(pcHorafin.substr(0,2));
    var _finMinutos = pcHorafin.substr(3,2); //parseInt(pcHorafin.substr(3,2));

    if ( (_finHoras+''+_finMinutos)*1 >= (_inicioHoras+''+_inicioMinutos)*1 ) {
        var _transcurridoHoras = _finHoras*1 - _inicioHoras*1;
        var _transcurridoMinutos = _finMinutos*1 - _inicioMinutos*1;
      
        if ( _transcurridoMinutos < 0 ) {
            _transcurridoHoras--;
            _transcurridoMinutos = 60 + _transcurridoMinutos;
        }
      
        var _horas = _transcurridoHoras.toString();
        var _minutos = _transcurridoMinutos.toString();

        if ( pnRedondeo == '1' ) { /* redondeo a media hora */
            if ( _minutos*1 > 0 && _minutos*1 < 30 ) { _minutos = '30' }
            if ( _minutos*1 > 31 && _minutos*1 <= 59 ) { _horas = _horas*1 + 1; _minutos = '0' }
        } else if ( pnRedondeo == '2' ) { /* redonde por horas */
            if ( _minutos*1 > 0 ) { _horas = _horas*1 + 1; _minutos = '0' }
        }
      
        if ( (_horas+'').length < 2 ) { _horas = '0'+_horas }
        if ( (_minutos+'').length < 2 ) { _minutos = '0' + _minutos; }

        return _horas+':'+_minutos;
    } else {
        var _res1 = fjsTimeSubtractHours(pcHoraini, '24:00', '0');
        var _res2 = fjsTimeSubtractHours('00:00', pcHorafin, '0');

        var _horas = _res1.substr(0, 2)*1 + _res2.substr(0, 2)*1
        var _minutos = _res1.substr(3, 2)*1 + _res2.substr(3, 2)*1
        if ( _minutos*1 >= 60 ) {
            _horas++; _minutos = _minutos*1 - 60;
        }

        if ( pnRedondeo == '1' ) { /* redondeo a media hora */
            if ( _minutos*1 > 0 && _minutos*1 < 30 ) { _minutos = '30' }
            if ( _minutos*1 > 31 && _minutos*1 <= 59 ) { _horas = _horas*1 + 1; _minutos = '0' }
        } else if ( pnRedondeo == '2' ) { /* redonde por horas */
            if ( _minutos*1 > 0 ) { _horas = _horas*1 + 1; _minutos = '0' }
        }

        if ( (_horas+'').length < 2 ) { _horas = '0' +''+ _horas }
        if ( (_minutos+'').length < 2 ) { _minutos = '0' +''+ _minutos; }

        if ( pnRedondeo > 0 ) {
        } else {
            return _horas+':'+_minutos;
        }
    }  
}

function fjsTrim( pcCade ) {
    return fjsRTrim(fjsLTrim( pcCade ));
}

function fjsValidateDate( poFech, pcTipo ) { /* 1=Blanqueqr;  cualquier otro no hace nada*/
    if ( poFech == undefined || poFech.value == "" ) {
        return false;
    }
    if ( !/^\d{2}\/\d{2}\/\d{4}$/.test(poFech.value) ) {
        if ( pcTipo == "1" ) {poFech.value = "";}
        return false;
    }
    var dia  =  parseInt( poFech.value.substring(0,2), 10 );
    var mes  =  parseInt( poFech.value.substring(3,5), 10 );
    var anio =  parseInt( poFech.value.substring(6), 10 );

    switch(mes) {
        case 1:
        case 3:
        case 5:
        case 7:
        case 8:
        case 10:
        case 12:
            numDias=31;
            break;
        case 4: case 6: case 9: case 11:
            numDias=30;
            break
        case 2:
            if ( comprobarSiBisisesto(anio) ) {numDias=29} 
            else                              {numDias=28};
            break;
        default:
            if ( pcTipo == "1" ) {poFech.value = "";}
            return false;
    }

    if ( dia > numDias || dia==0 ) {
        if ( pcTipo == "1" ) {poFech.value = "";}
        return false;
    }

    return true;
}

function fjsValidateMail(valor) {
    // creamos nuestra regla con expresiones regulares.
    var filter = /[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
    // utilizamos test para comprobar si el parametro valor cumple la regla
    if( filter.test(valor) )
        return true;
    else
        return false;
}

function fjsValidateLastDigitRUC( pcCruc, pcTipo ) {
    lnP = 0;lnA = 0;lnB = 0;lnC = 0;lnDigi = 0; 
    aPeso = [0,5,4,3,2,7,6,5,4,3,2];
    for ( x=1;  x <= 10; x++ ) {
        lnP = (pcCruc.toString().substr(x-1, 1)*1).toFixed(0) * (aPeso[x]*1).toFixed(0);
    lnA = lnA*1 + lnP*1;
    }

    lnB = parseInt( lnA*1 / 11 );
    lnC = lnA*1 - ( lnB*1 * 11 );
    lnDigi = 11 - lnC*1;

    if        ( lnDigi == 10 ) {
        lnDigi = 0;
    } else if ( lnDigi == 11 ) {
    lnDigi = 1;
    }

    if ( pcTipo == '1' ) {
        if ( lnDigi == pcCruc.toString().substr(10, 1) ) {
            return '';
        } else {
            return lnDigi;
        }
    } else {
        return lnDigi;
    }
}

/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
function fext_checkColor(poContainer, poLabel, pbValue) {
    poContainer.down('#'+poLabel).fieldCls = '';
    poContainer.down('#'+poLabel).fieldCls = (pbValue == true ? 'df00003' : 'df00303');
}

function fext_componentSearch(poParam) {
    var _componentCall = (poParam['componentCall'] == undefined ? '' : poParam['componentCall']);
    var _componentSearch = (poParam['componentSearch'] == null ? null : poParam['componentSearch']);
    var _view = (poParam['view'] == undefined ? '' : poParam['view']);
    var _title = (poParam['title'] == undefined ? '' : poParam['title']);
    var _keyCall = (poParam['keyCall'] == undefined ? '' : poParam['keyCall']);
    var _typeQuery = (poParam['typeQuery'] == undefined ? '' : poParam['typeQuery']);
    var _typeReturn = (poParam['typeReturn'] == undefined ? '' : poParam['typeReturn']);
    var _actionDestroy = (poParam['actionDestroy'] == undefined ? false : poParam['actionDestroy']);
    if ( _componentCall !== '' ) { Ext.get(_componentCall.getEl()).mask('Por favor espere un momento...', 'loading'); }
    if ( _componentSearch == null ) {
        var _component = Ext.create(_view);
        _component.setTitle(_title); //_component.setIconCls('icon_Search_90');
        _component.setCallWindow(_componentCall); // metodo creado para guardar el window donde se mostrara los datos
        _component.setCallKey(_keyCall);
        _component.setTypeQuery(_typeQuery);
        _component.setTypeReturn(_typeReturn);
        _component.setActionDestroy(_actionDestroy);
        _component.show();
        if ( _componentCall !== '' ) { Ext.get(_componentCall.getEl()).unmask(); } return _component;
    } else {
        _componentSearch.setCallKey(_keyCall); _componentSearch.show();
        if ( _componentCall !== '' ) { Ext.get(_componentCall.getEl()).unmask(); } return _componentSearch;
    }
}

function fext_fieldSearch(pcType, poCallWindow, paComponent, paServer, pcType_edit, paView) {
    var _search = false;
    var _txtVALUE = poCallWindow.down('#'+paComponent[1]);
    var _txtValue = poCallWindow.down('#'+paComponent[2]);

    if ( pcType == '1' ) {
        _txtVALUE.setValue( _txtValue.getValue() );
    } else if ( pcType == '0' ) {
        if ( _txtValue.getValue() !== _txtVALUE.getValue() ) { _search = true; }
    } else if ( pcType == '13' ) {
        _search = true;  _txtVALUE.setValue( _txtValue.getValue() );
    }

    if ( _search ) {
        var _txtKey = poCallWindow.down('#'+paComponent[0]);
        var _lblName = poCallWindow.down('#'+paComponent[3]);
        var _value = _txtValue.getValue();
        if ( _value == '' ) {
            _txtKey.setValue('');  _lblName.setValue('');  return false;
        }
        Ext.get(poCallWindow.getEl()).mask('Validando información... por favor espere un momento...', 'loading');
        var _type_record = ( !paServer[2] || paServer[2] == null ? '' : paServer[2] );
        var _type_query = ( !paServer[3] || paServer[3] == null ? '' : paServer[3] );
        var _prmStr = Siace.util.Util.decodeJSON("{"+paServer[1]+": '"+_value+"', xxType_record: '"+_type_record+"', xxType_query: '"+_type_query+"'}");
        Ext.Ajax.request({
            method: 'POST',  url: paServer[0],  params: _prmStr,
            success: function(response) {
                var _result = Siace.util.Util.decodeJSON(response.responseText);
                if ( _result.success ) {
                    if ( _result.subtotal == 1 ) {
                        if ( paServer[3] == 'SOLO_VEHICULOS' ) { // SOLO usado para busqueda de placas
                            if ( _result.data[0].tipveh_id !== '10' ) {
                                _txtKey.setValue(_result.data[0].key);
                                _lblName.setValue(_result.data[0].name);
                            } else {
                                _txtKey.setValue('');  _lblName.setValue('');
                            }
                        } else if ( paServer[3] == 'SOLO_TRACTOS' ) { // SOLO usado para busqueda de placas
                            if ( _result.data[0].tipveh_id == '10' ) {
                                _txtKey.setValue(_result.data[0].key);
                                _lblName.setValue(_result.data[0].name);
                            } else {
                                _txtKey.setValue('');  _lblName.setValue('');
                            }
                        } else {
                            _txtKey.setValue(_result.data[0].key);
                            _lblName.setValue(_result.data[0].name);
                        }
                    } else {
                        _txtKey.setValue('');  _lblName.setValue('');
                        if ( pcType_edit == '1' ) {
                            var _win = Ext.create(paView[0]);
                            _win.setTypeEdit('1'); _win.setTitle(paView[1]); _win.setTypeQuery(paView[3]);
                            _nro = paView[2].length;
                            if ( _nro > 1 ) {
                                var _array = _value.split(paView[2][_nro-1]);
                                for (_i=0; _i <=(_nro-2); _i++) {
                                    _win.down('#'+paView[2][_i]).setValue(_array[_i]);
                                }
                            } else {
                                _win.down('#'+paView[2][0]).setValue(_value);
                            }                                
                            _win.setCallWindow(poCallWindow); _win.show();
                        }
                    }
                } else {
                    _txtKey.setValue('');  _lblName.setValue('');
                    Siace.util.Util.showErrorMsg(_result.msg);
                }
                Ext.get(poCallWindow.getEl()).unmask();
            },
            failure: function(response) {
                Ext.get(poCallWindow.getEl()).unmask();
                _txtKey.setValue('');  _lblName.setValue('');
                Siace.util.Util.showErrorMsg(response.responseText);
            }
        });
    }
}

function fext_FileDownload(pFile, pcSrc) {
    if ( pFile == undefined ) {
        Ext.DomHelper.append(document.body, {
            tag: 'iframe',
            itemId:'downloadIframe',
            frameBorder: 0,
            height: 0,
            width: 0,
            css: 'display:none;visibility:hidden;height:0px;',
            src: pcSrc,
        });
    } else {
       var _reader = new FileReader();
        _reader.onload = function (event) {
            var _save = document.createElement('a'); // crea un nuevo link
            _save.href = event.target.result;
            _save.target = '_blank';
            //save.download = nombreArchivo || 'archivo.dat';
            _save.download = pFile.name;
            var _clicEvent = new MouseEvent('click', {
                'view': window,
                'bubbles': true,
                'cancelable': true
            });
            _save.dispatchEvent(_clicEvent);
            (window.URL || window.webkitURL).revokeObjectURL(_save.href);
        };
        _reader.readAsDataURL(pFile);
    }
}

function fext_FileReader(poFilefield, pcTypeFile, pcTypeMessage, pnSizeMax, pcSizeMessage, poDelete, poDownload, pcHide) {
    var _reader = '';
    var _file = poFilefield.fileInputEl.dom.files[0];
    var _hide = (pcHide == undefined || pcHide == null ? true : pcHide);

    if ( typeof FileReader == undefined ) {
        Ext.Msg.alert('Precaución', 'Navegador no permite FielReader');
    } else if ( pcTypeFile !== '' && !pcTypeFile.test(_file.type) ) {
        Ext.Msg.alert('Precaución', 'Debe seleccionar un archivo de tipo: ' + pcTypeMessage);
    } else if ( pnSizeMax !== '' && _file.size > pnSizeMax ) {
        Ext.Msg.alert('Precaución', 'Solo se permiten archivos de tamaño menores a ' + pcSizeMessage);
    } else {
        _reader = new FileReader();
        _reader.readAsDataURL(_file);  _estado = '1';
        if ( poDelete !== '' && poDelete !== null ) { if ( _hide ) { poFilefield.hide(); } else { poFilefield.setReadOnly(true); } poDelete.show(); }
        if ( poDownload !== '' && poDownload !== null ) { poDownload.enable(); }
    }
    if ( _reader == '' ) {
        poFilefield.reset(); poFilefield.setValue(''); if ( poDownload !== '' && poDownload !== null ) { poDownload.disable(); }
    }
    return _reader;
}

function fext_gridClean(poStore, poPagingToolbar) {
    poStore.removeAll();
    if ( poPagingToolbar !== '' ) {
        poStore.currentPage = 1;
        poPagingToolbar.down('#first').setDisabled(true);
        poPagingToolbar.down('#prev').setDisabled(true);
        poPagingToolbar.down('#inputItem').setDisabled(true);
        poPagingToolbar.down('#inputItem').setValue('0');
        poPagingToolbar.down('#afterTextItem').setText('de 0');
        poPagingToolbar.down('#next').setDisabled(true);
        poPagingToolbar.down('#last').setDisabled(true);
        poPagingToolbar.down('#displayItem').setText('');
    }
}

function fext_removeAddCls(poComponent, pcClassRemove, pcClassAdd) {
    poComponent.removeCls(pcClassRemove); poComponent.addCls(pcClassAdd);
}

function fext_removeAddConfig(poComponent, pcConfig, pcClass) {
    if ( pcConfig == '' || !pcConfig ) {
        poComponent.labelClsExtra = ''; poComponent.labelClsExtra = pcClass;
    }
}

function fext_pdf(pcIcon, pcTitle, pcSrc, pcCloseAction) {
    var _mainpanel = Ext.ComponentQuery.query('access_mainpanel')[0];
    _newTab = _mainpanel.add({
        xtype: 'panel',
        closable: true,
        iconCls: (pcIcon == '' ? 'icon_Pdf_90' : pcIcon),
        title: pcTitle,
        layout: 'fit',
        html: 'loading PDF...',
        items: [{
            xtype: 'uxiframe',
            src: pcSrc,
        }]
    });

    _mainpanel.setActiveTab(_newTab);
    var _closeAction = ( pcCloseAction == undefined || pcCloseAction == null || pcCloseAction == '' ? '' : pcCloseAction);
    //if ( _closeAction == 'Destroy' ) { _newTab.close(); }
}

function fext_winSearch(poParam) {
    var _win = poParam['win'];
    var _callWin = (poParam['callWin'] == undefined ? '' : poParam['callWin']);
    var _callKey = (poParam['callKey'] == undefined ? '' : poParam['callKey']);
    var _title = (poParam['title'] == undefined ? '' : poParam['title']);
    var _typeRecord = (poParam['typeRecord'] == undefined ? '' : poParam['typeRecord']);
    var _typeQuery = (poParam['typeQuery'] == undefined ? '' : poParam['typeQuery']);
    var _typeReturn = (poParam['typeReturn'] == undefined ? '' : poParam['typeReturn']);
    var _actionDestroy = (poParam['actionDestroy'] == undefined ? false : poParam['actionDestroy']);

    if ( _callWin !== '' ) { Ext.get(_callWin.getEl()).mask('Por favor espere un momento...', 'loading'); }
    _win.setTitle(_title);
    _win.setCallWindow(_callWin);
    _win.setCallKey(_callKey);
        _win.setTypeRecord( _typeRecord );
        _win.setTypeQuery( _typeQuery );
        _win.setTypeReturn( _typeReturn );
        _win.setActionDestroy( _actionDestroy );
    _win.show();
    if ( _callWin !== '' ) { Ext.get(_callWin.getEl()).unmask(); } return _win;
}

function fext_windowSearch(poSearchWindow, poCallWindow, pcView, pcTitle, pcCallKey, pcTypeQuery, pcTypeReturn, pcActionDestroy) {
    Ext.get(poCallWindow.getEl()).mask('Por favor espere un momento...', 'loading');
    if ( poSearchWindow == undefined ) {
        var _win = Ext.create(pcView);
        _win.setTitle(pcTitle);
        //_win.setIconCls('icon_Search_90');
        _win.setCallWindow(poCallWindow); // metodo creado para guardar el window donde se mostrara los datos
        _win.setCallKey( !pcCallKey || pcCallKey == null || pcCallKey == '' ? '' : pcCallKey );
        _win.setTypeQuery( !pcTypeQuery || pcTypeQuery == null || pcTypeQuery == '' ? '' : pcTypeQuery );
        _win.setTypeReturn( !pcTypeReturn || pcTypeReturn == null || pcTypeReturn == '' ? '' : pcTypeReturn );
        _win.setActionDestroy( !pcActionDestroy || pcActionDestroy == null || pcActionDestroy == '' ? '' : pcActionDestroy );
        _win.show();
        Ext.get(poCallWindow.getEl()).unmask(); return _win;
    } else {
        poSearchWindow.setCallKey( !pcCallKey || pcCallKey == null || pcCallKey == '' ? '' : pcCallKey ); poSearchWindow.show();
        Ext.get(poCallWindow.getEl()).unmask(); return poSearchWindow;
    }
}

function fextlog_iyueffedFilter(poParam) {
    var _obj = poParam['objeto'];
    var _year_id = (poParam['year_id'] == undefined ? '' : poParam['year_id']);
    var _fuefin_id = (poParam['fuefin_id'] == undefined ? '' : poParam['fuefin_id']);
    var _espedet_id = (poParam['espedet_id'] == undefined ? '' : poParam['espedet_id']);
    var _type_record = (poParam['type_record'] == undefined ? 'combo' : poParam['type_record']);
    var _type_query = (poParam['type_query'] == undefined ? '' : poParam['type_query']);
    var _order_by = (poParam['order_by'] == undefined ? '' : poParam['order_by']);    
    var _add_blank = (poParam['add_blank'] == undefined ? 'YES' : poParam['add_blank']);
    var _disabled = (poParam['disabled'] == undefined ? false : poParam['disabled']);
    var _setValue = (poParam['setValue'] == undefined ? true : poParam['setValue']);
    var _length = (_add_blank == 'YES' ? 1 : 0);

    if ( _obj.getStore().storeId == 'ext-empty-store' ) { _obj.bindStore(Ext.create('Siace.store.budget.Iyueffed')); }
    _obj.getStore().load({ 
        params: { xxYear_id: _year_id, xxFuefin_id: _fuefin_id, xxEspedet_id: _espedet_id,
                  xxType_record: _type_record, xxType_query: _type_query, xxOrder_by: _order_by, xxAdd_blank: _add_blank },
        callback: function(records, operations, success) {
            if ( (records.length > _length) && _setValue ) { _obj.setDisabled(_disabled); _obj.setValue(records[0].data.fase_id); }
            else if ( records.length > _length ) { _obj.setDisabled(_disabled); }
            else { _obj.disable();  _obj.setValue(''); }
        }
    });
}

function fextbud_especificas_detFilter(poParam) {
    var _panel = poParam['panel'];
    var _tiptrans_code = (poParam['tiptrans_code'] == undefined ? '' : poParam['tiptrans_code']);
    var _gene_code = (poParam['gene_code'] == undefined ? '' : poParam['gene_code']);
    var _espedet_estado = (poParam['espedet_estado'] == undefined ? '' : poParam['espedet_estado']);
    var _type_record = (poParam['type_record'] == undefined ? 'combo_codename' : poParam['type_record']);
    var _type_query = (poParam['type_query'] == undefined ? '' : poParam['type_query']);
    var _order_by = (poParam['order_by'] == undefined ? '' : poParam['order_by']);
    var _add_blank = (poParam['add_blank'] == undefined ? 'YES' : poParam['add_blank']);
    var _disabled = (poParam['disabled'] == undefined ? false : poParam['disabled']);
    var _setValue = (poParam['setValue'] == undefined ? true : poParam['setValue']);
    var _length = (_add_blank == 'YES' ? 1 : 0);

    var _cboEspedet_id = _panel.down('#espedet_id');
    if ( _cboEspedet_id.getStore().storeId == 'ext-empty-store' ) { _cboEspedet_id.bindStore(Ext.create('Siace.store.budget.Especificas_Det')); }
    _cboEspedet_id.getStore().load({ 
        params: { xxTiptrans_code: _tiptrans_code, xxGene_code: _gene_code, xxEspedet_estado: _espedet_estado,
                  xxType_record: _type_record, xxType_query: _type_query, xxOrder_by: _order_by, xxAdd_blank: _add_blank },
        callback: function(records, operations, success) {
            if ( records.length > _length && _setValue ) { _cboEspedet_id.setDisabled(_disabled); _cboEspedet_id.setValue(records[0].data.espedet_id); }
            else if ( records.length > _length ) { _cboEspedet_id.setDisabled(_disabled); }
            else { _cboEspedet_id.disable();  _cboEspedet_id.setValue(''); }
        }
    });
}

function fextbud_fuentes_financiamientoFilter(poParam) {
    var _panel = poParam['panel'];
    var _fuefinagre_id = (poParam['fuefinagre_id'] == undefined ? '' : poParam['fuefinagre_id']);
    var _fuefin_id = (poParam['fuefin_id'] == undefined ? '' : poParam['fuefin_id']);
    var _fuefin_estado = (poParam['fuefin_estado'] == undefined ? '1' : poParam['fuefin_estado']);
    var _type_record = (poParam['type_record'] == undefined ? 'combo_codename' : poParam['type_record']);
    var _type_query = (poParam['type_query'] == undefined ? '' : poParam['type_query']);
    var _add_blank = (poParam['add_blank'] == undefined ? 'YES' : poParam['add_blank']);
    var _disabled = (poParam['disabled'] == undefined ? false : poParam['disabled']);
    var _setValue = (poParam['setValue'] == undefined ? true : poParam['setValue']);
    var _length = (_add_blank == 'YES' ? 1 : 0);    

    var _cboFuefin_id = _panel.down('#fuefin_id');
    if ( _cboFuefin_id.getStore().storeId == 'ext-empty-store' ) { _cboFuefin_id.bindStore(Ext.create('Siace.store.budget.Fuentes_Financiamiento')); }
    _cboFuefin_id.getStore().load({ 
        params: { xxFuefinagre_id: _fuefinagre_id, xxFuefin_id: _fuefin_id, xxFuefin_estado: _fuefin_estado,
                  xxType_record: _type_record, xxType_query: _type_query, xxAdd_blank: _add_blank },
        callback: function(records, operations, success) {
            if ( records.length > _length && _setValue ) { _cboFuefin_id.setDisabled(_disabled); _cboFuefin_id.setValue(records[0].data.fuefin_id); }
            else if ( records.length > _length ) { _cboFuefin_id.setDisabled(_disabled); }
            else { _cboFuefin_id.disable();  _cboFuefin_id.setValue(''); }
        }
    });
}

function fextbud_metasLoad(poParam) {
    var _panel = poParam['panel'];
    var _disabled = (poParam['disabled'] == undefined ? false : poParam['disabled']);
    var _setValue = (poParam['setValue'] == undefined ? true : poParam['setValue']);
    var _meta_id = (poParam['meta_id'] == undefined ? true : poParam['meta_id']);
    var _year_id = (_panel.down('#year_id') ? _panel.down('#year_id').getValue() : 0);

    if ( _panel.down('#tarea_key') ) { _panel.down('#tarea_key').getStore().removeAll(); _panel.down('#tarea_key').setValue(''); _panel.down('#tarea_key').disable(); }
    if ( _panel.down('#tareacomp_key') ) { _panel.down('#tareacomp_key').getStore().removeAll(); _panel.down('#tareacomp_key').setValue(''); _panel.down('#tarea_key').disable(); }

    var _cboMeta_id = _panel.down('#meta_id');
    if ( _year_id*1 <= 0 ) {
        _cboMeta_id.getStore().removeAll();  _cboMeta_id.setValue(''); _cboMeta_id.disable();
    } else {
        _cboMeta_id.getStore().load({
            callback: function(records, operations, success) {
                var _length = (_cboMeta_id.getStore().getProxy().extraParams['xxAdd_blank'] == 'YES' ? 1 : 0);
                if ( (records.length > _length) && _setValue ) { _cboMeta_id.setDisabled(_disabled); _cboMeta_id.setValue(_meta_id == '' ? records[0].data.meta_id : _meta_id*1); }
                else if ( records.length > _length ) { _cboMeta_id.setDisabled(_disabled); }
                else { _cboMeta_id.disable();  _cboMeta_id.setValue(''); }
            }
        });
    }

    var _ff_tr = '';// ( !pcFF_TR || pcFF_TR == '' ? '' : pcFF_TR );
    if ( _ff_tr !== '' ) {
        //_clasif = ( !pcClasif || pcClasif == "" ? "" : pcClasif );
        //_fftr_all = ( !pcFFTR_all || pcFFTR_all == "" ? "" : pcFFTR_all );
        //funsag_tarea_saldoFuente_financFilter( "X", _prefijo, "", _ff_tr, _clasif, _fftr_all );
    }
}

function fextbud_metasParameters(poParam) {
    var _panel = poParam['panel'];
    var _meta_id = (poParam['meta_id'] == undefined ? '' : poParam['meta_id']);
    var _menu_id = (poParam['menu_id'] == undefined ? '' : poParam['menu_id']);
    var _type_record = (poParam['type_record'] == undefined ? 'combo' : poParam['type_record']);
    var _type_query = (poParam['type_query'] == undefined ? '' : poParam['type_query']);
    var _add_blank = (poParam['add_blank'] == undefined ? 'YES' : poParam['add_blank']);

    var _cboMeta_id = _panel.down('#meta_id');
    if ( _cboMeta_id.getStore().storeId == 'ext-empty-store' ) { _cboMeta_id.bindStore(Ext.create('Siace.store.budget.Metas')); };
    _cboMeta_id.getStore().on('beforeload', function(store, operations, options) {
        store.getProxy().setExtraParam('xxMeta_id', _meta_id);
        store.getProxy().setExtraParam('xxYear_id', poParam['objYear_id'] == undefined ? (_panel.down('#year_id') ? _panel.down('#year_id').getValue() : '0') : poParam['objYear_id'].getValue());
        store.getProxy().setExtraParam('xxArea_key', (_panel.down('#area_key') ? _panel.down('#area_key').getValue() : ''));
        store.getProxy().setExtraParam('xxMenu_id', _menu_id);
        store.getProxy().setExtraParam('xxType_record', _type_record);
        store.getProxy().setExtraParam('xxType_query', _type_query);
        store.getProxy().setExtraParam('xxAdd_blank', _add_blank);
    });
}

function fextbud_tareasLoad(poParam) {
    var _panel = poParam['panel'];
    var _disabled = (poParam['disabled'] == undefined ? false : poParam['disabled']);
    var _setValue = (poParam['setValue'] == undefined ? true : poParam['setValue']);    
    var _tarea_key = (poParam['tarea_key'] == undefined ? '' : poParam['tarea_key']);
    var _filterForce = (poParam['filterForce'] == undefined ? false : poParam['filterForce']);
    var _meta_id = (_panel.down('#meta_id') ? _panel.down('#meta_id').getValue() : '0');

    if ( _panel.down('#tareacomp_key') ) { _panel.down('#tareacomp_key').getStore().removeAll(); _panel.down('#tareacomp_key').setValue(''); }

    var _cboTarea_key = _panel.down('#tarea_key');
    if ( _meta_id*1 > 0 || _filterForce == true ) {
        _cboTarea_key.getStore().load({
            callback: function(records, operations, success) {
                var _length = (_cboTarea_key.getStore().getProxy().extraParams['xxAdd_blank'] == 'YES' ? 1 : 0);
                if ( (records.length > _length) && _setValue ) { _cboTarea_key.setDisabled(_disabled); _cboTarea_key.setValue(_tarea_key == '' ? records[0].data.tarea_key : _tarea_key); }
                else if ( records.length > _length ) { _cboTarea_key.setDisabled(_disabled); }
                else { _cboTarea_key.disable();  _cboTarea_key.setValue(''); }
            }
         });
    } else {
        _cboTarea_key.getStore().removeAll();  _cboTarea_key.setValue(''); _cboTarea_key.disable();
    }

    var _ff_tr = '';// ( !pcFF_TR || pcFF_TR == '' ? '' : pcFF_TR );
    if ( _ff_tr !== '' ) {
        //_clasif = ( !pcClasif || pcClasif == "" ? "" : pcClasif );
        //_fftr_all = ( !pcFFTR_all || pcFFTR_all == "" ? "" : pcFFTR_all );
        //funsag_tarea_saldoFuente_financFilter( "X", _prefijo, "", _ff_tr, _clasif, _fftr_all );
    }
}

function fextbud_tareasParameters(poParam) {
    var _panel = poParam['panel'];
    var _tarea_key = (poParam['tarea_key'] == undefined ? '' : poParam['tarea_key']);
    var _menu_id = (poParam['menu_id'] == undefined ? '' : poParam['menu_id']);
    var _type_record = (poParam['type_record'] == undefined ? 'combo' : poParam['type_record']);
    var _type_query = (poParam['type_query'] == undefined ? 'tarea_id' : poParam['type_query']);
    var _order_by = (poParam['order_by'] == undefined ? 'tarea_id' : poParam['order_by']);
    var _add_blank = (poParam['add_blank'] == undefined ? 'YES' : poParam['add_blank']);

    var _cboTarea_key = _panel.down('#tarea_key');
    if ( _cboTarea_key.getStore().storeId == 'ext-empty-store' ) { _cboTarea_key.bindStore(Ext.create('Siace.store.budget.Tareas')); };
    _cboTarea_key.getStore().on('beforeload', function(store, operations, eOpts) {
        store.getProxy().setExtraParam('xxTarea_key', _tarea_key);
        store.getProxy().setExtraParam('xxYear_id', poParam['objYear_id'] == undefined ? (_panel.down('#year_id') ? _panel.down('#year_id').getValue() : '0') : poParam['objYear_id'].getValue());
        store.getProxy().setExtraParam('xxArea_key', (_panel.down('#area_key') ? _panel.down('#area_key').getValue() : ''));
        store.getProxy().setExtraParam('xxMeta_id', (_panel.down('#meta_id') ? _panel.down('#meta_id').getValue() : '0'));
        store.getProxy().setExtraParam('xxTipgast_id', (_panel.down('#tipgast_id') ? _panel.down('#tipgast_id').getValue() : '0'));
        store.getProxy().setExtraParam('xxMenu_id', _menu_id);
        store.getProxy().setExtraParam('xxType_record', _type_record);
        store.getProxy().setExtraParam('xxType_query', _type_query);
        store.getProxy().setExtraParam('xxOrder_by', _order_by);
        store.getProxy().setExtraParam('xxAdd_blank', _add_blank);
    });
}

function fextbud_tareas_fftredLoad(poParam) {
    var _panel = poParam['panel'];
    var _disabled = (poParam['disabled'] == undefined ? false : poParam['disabled']);
    var _setValue = (poParam['setValue'] == undefined ? true : poParam['setValue']);        
    var _tarea_key = (_panel.down('#tarea_key') ? _panel.down('#tarea_key').getValue() : '');

    //var _cboTareafte_key = _panel.down('#tareafte_key');
    var _obj = (poParam['objeto'] == undefined ? _panel.down('#tareafte_key') : poParam['objeto']);
    if ( _tarea_key == '' ) {
        _obj.getStore().removeAll();  _obj.setValue(''); _obj.disable();
    } else {
        _obj.getStore().load({
            callback: function(records, operations, success) {
                var _length = (_obj.getStore().getProxy().extraParams['xxAdd_blank'] == 'YES' ? 1 : 0);
                if ( (records.length > _length) && _setValue ) { _obj.setDisabled(_disabled); _obj.setValue(records[0].data.tareafte_key); }
                else if ( records.length > _length ) { _obj.setDisabled(_disabled); }
                else { _obj.disable();  _obj.setValue(''); }
            }
         });
    }

    var _ff_tr = '';// ( !pcFF_TR || pcFF_TR == '' ? '' : pcFF_TR );
    if ( _ff_tr !== '' ) {
        //_clasif = ( !pcClasif || pcClasif == "" ? "" : pcClasif );
        //_fftr_all = ( !pcFFTR_all || pcFFTR_all == "" ? "" : pcFFTR_all );
        //funsag_tarea_saldoFuente_financFilter( "X", _prefijo, "", _ff_tr, _clasif, _fftr_all );
    }
}

function fextbud_tareas_fftredParameters(poParam) {
    var _panel = poParam['panel'];
    var _menu_id = (poParam['menu_id'] == undefined ? '' : poParam['menu_id']);
    var _type_record = (poParam['type_record'] == undefined ? '' : poParam['type_record']);
    var _type_query = (poParam['type_query'] == undefined ? '' : poParam['type_query']);
    var _order_by = (poParam['order_by'] == undefined ? '' : poParam['order_by']);
    var _add_blank = (poParam['add_blank'] == undefined ? 'YES' : poParam['add_blank']);

    var _obj = (poParam['objeto'] == undefined ? _panel.down('#tareafte_key') : poParam['objeto']);
    if ( _obj.getStore().storeId == 'ext-empty-store' ) { _obj.bindStore(Ext.create('Siace.store.budget.Tareas_Fftred')); };
    _obj.getStore().on('beforeload', function(store, operations, eOpts) {
        store.getProxy().setExtraParam('xxYear_id', poParam['objYear_id'] == undefined ? (_panel.down('#year_id') ? _panel.down('#year_id').getValue() : '0') : poParam['objYear_id'].getValue());
        store.getProxy().setExtraParam('xxArea_key', (_panel.down('#area_key') ? _panel.down('#area_key').getValue() : ''));
        store.getProxy().setExtraParam('xxMeta_id', (_panel.down('#meta_id') ? _panel.down('#meta_id').getValue() : '0'));
        store.getProxy().setExtraParam('xxTarea_key', (_panel.down('#tarea_key') ? _panel.down('#tarea_key').getValue() : ''));
        store.getProxy().setExtraParam('xxTipgast_id', (_panel.down('#tipgast_id') ? _panel.down('#tipgast_id').getValue() : '0'));
        store.getProxy().setExtraParam('xxMenu_id', _menu_id);
        store.getProxy().setExtraParam('xxType_record', _type_record);
        store.getProxy().setExtraParam('xxType_query', _type_query);
        store.getProxy().setExtraParam('xxOrder_by', _order_by);
        store.getProxy().setExtraParam('xxAdd_blank', _add_blank);
    });
}

function fextbud_tareasAMLoad(poParam) {
    var _panel = poParam['panel'];
    var _disabled = (poParam['disabled'] == undefined ? false : poParam['disabled']);
    var _setValue = (poParam['setValue'] == undefined ? true : poParam['setValue']);
    var _meta_id = (poParam['meta_id'] == undefined ? '' : poParam['meta_id']);
    //var _year_id = (poParam['year_id'] == undefined ? (_panel.down('#year_id') ? _panel.down('#year_id').getValue() : 0) : poParam['year_id']);
    
    if ( _panel.down('#tarea_key') ) { _panel.down('#tarea_key').getStore().removeAll(); _panel.down('#tarea_key').setValue(''); _panel.down('#tarea_key').disable(); }
    if ( _panel.down('#tareacomp_key') ) { _panel.down('#tareacomp_key').getStore().removeAll(); _panel.down('#tareacomp_key').setValue(''); _panel.down('#tarea_key').disable(); }

    var _cboMeta_id = _panel.down('#meta_id');
    //if ( _year_id*1 <= 0 ) {
    //    _cboMeta_id.getStore().removeAll();  _cboMeta_id.setValue(''); _cboMeta_id.disable();
    //} else {
        _cboMeta_id.getStore().load({
            callback: function(records, operations, success) {
                var _length = (_cboMeta_id.getStore().getProxy().extraParams['xxAdd_blank'] == 'YES' ? 1 : 0);
                if ( (records.length > _length) && _setValue ) { _cboMeta_id.setDisabled(_disabled); _cboMeta_id.setValue(_meta_id == '' ? records[0].data.meta_id : _meta_id*1); }
                else if ( records.length > _length ) { _cboMeta_id.setDisabled(_disabled); }
                else { _cboMeta_id.disable();  _cboMeta_id.setValue(''); }
            }
        });
    //}

    var _ff_tr = '';// ( !pcFF_TR || pcFF_TR == '' ? '' : pcFF_TR );
    if ( _ff_tr !== '' ) {
        //_clasif = ( !pcClasif || pcClasif == "" ? "" : pcClasif );
        //_fftr_all = ( !pcFFTR_all || pcFFTR_all == "" ? "" : pcFFTR_all );
        //funsag_tarea_saldoFuente_financFilter( "X", _prefijo, "", _ff_tr, _clasif, _fftr_all );
    }
}

function fextbud_tareasAMParameters(poParam) {
    var _panel = poParam['panel'];
    //var _year_id = (poParam['year_id'] == undefined ? '' : poParam['year_id']);
    var _menu_id = (poParam['menu_id'] == undefined ? '' : poParam['menu_id']);
    var _docu_campo = (poParam['docu_campo'] == undefined ? '' : poParam['docu_campo']);
    var _docu_estado = (poParam['docu_estado'] == undefined ? '' : poParam['docu_estado']);
    var _type_record = (poParam['type_record'] == undefined ? 'combo' : poParam['type_record']);
    var _type_query = (poParam['type_query'] == undefined ? 'meta_id' : poParam['type_query']);
    var _add_blank = (poParam['add_blank'] == undefined ? 'YES' : poParam['add_blank']);
    var _nvuak = (poParam['nv_usuracce_key'] == undefined ? '' : poParam['nv_usuracce_key']); // si esta vacio verifica usuracce_key, con cualqiuer valor no verifica

    var _vs = fextpub_sessionVariables();
    var _cboMeta_id = _panel.down('#meta_id');
    if ( _cboMeta_id.getStore().storeId == 'ext-empty-store' ) { _cboMeta_id.bindStore(Ext.create('Siace.store.budget.TareasAccess')); };
    _cboMeta_id.getStore().on('beforeload', function(store, operations, options) {
        store.getProxy().setExtraParam('xxYear_id', Ext.getCmp('ah_txtYear_id').getValue()*1 <= 0 ? (poParam['objYear_id'] == undefined ? (_panel.down('#year_id') ? _panel.down('#year_id').getValue() : '0') : poParam['objYear_id'].getValue()) : Ext.getCmp('ah_txtYear_id').getValue());
        store.getProxy().setExtraParam('xxArea_key', (_panel.down('#area_key') ? _panel.down('#area_key').getValue() : ''));
        store.getProxy().setExtraParam('xxDocu_campo', _docu_campo);
        store.getProxy().setExtraParam('xxDocu_estado', _docu_estado);
        store.getProxy().setExtraParam('xxMenu_id', _menu_id);
        store.getProxy().setExtraParam('xxType_record', _type_record);
        store.getProxy().setExtraParam('xxType_query', _type_query);
        store.getProxy().setExtraParam('xxAdd_blank', _add_blank);
        store.getProxy().setExtraParam('nvUsuracce_key', _nvuak);
        store.getProxy().setExtraParam('zzUsursess_key', _vs['us']);
        store.getProxy().setExtraParam('zzUsuracce_key', _vs['ua']);
        store.getProxy().setExtraParam('zzYear_id', _vs['y']);
        store.getProxy().setExtraParam('zzUsur_key', _vs['u']);
        store.getProxy().setExtraParam('zzArea_key', _vs['a']);
    });
}

function fextbud_tareasATLoad(poParam) {
    var _panel = poParam['panel'];
    var _disabled = (poParam['disabled'] == undefined ? false : poParam['disabled']);
    var _setValue = (poParam['setValue'] == undefined ? true : poParam['setValue']);        
    var _meta_id = (_panel.down('#meta_id') ? _panel.down('#meta_id').getValue() : '0');
    var _tarea_key = (poParam['tarea_key'] == undefined ? '' : poParam['tarea_key']);

    if ( _panel.down('#tareacomp_key') ) { _panel.down('#tareacomp_key').getStore().removeAll(); _panel.down('#tareacomp_key').setValue(''); }

    var _cboTarea_key = _panel.down('#tarea_key');
    if ( _meta_id*1 <= 0 ) {
        _cboTarea_key.getStore().removeAll();  _cboTarea_key.setValue(''); _cboTarea_key.disable();
    } else {
        _cboTarea_key.getStore().load({
            callback: function(records, operations, success) {
                var _length = (_cboTarea_key.getStore().getProxy().extraParams['xxAdd_blank'] == 'YES' ? 1 : 0);
                if ( (records.length > _length) && _setValue ) { _cboTarea_key.setDisabled(_disabled); _cboTarea_key.setValue( _tarea_key == '' ? records[0].data.tarea_key : _tarea_key); }
                else if ( records.length > _length ) { _cboTarea_key.setDisabled(_disabled); }
                else { _cboTarea_key.disable();  _cboTarea_key.setValue(''); }
            }
         });
    }

    var _ff_tr = '';// ( !pcFF_TR || pcFF_TR == '' ? '' : pcFF_TR );
    if ( _ff_tr !== '' ) {
        //_clasif = ( !pcClasif || pcClasif == "" ? "" : pcClasif );
        //_fftr_all = ( !pcFFTR_all || pcFFTR_all == "" ? "" : pcFFTR_all );
        //funsag_tarea_saldoFuente_financFilter( "X", _prefijo, "", _ff_tr, _clasif, _fftr_all );
    }
}

function fextbud_tareasATParameters(poParam) {
    var _panel = poParam['panel'];
    var _menu_id = (poParam['menu_id'] == undefined ? '' : poParam['menu_id']);
    var _docu_campo = (poParam['docu_campo'] == undefined ? '' : poParam['docu_campo']);
    var _docu_estado = (poParam['docu_estado'] == undefined ? '' : poParam['docu_estado']);
    var _type_record = (poParam['type_record'] == undefined ? 'combo' : poParam['type_record']);
    var _type_query = (poParam['type_query'] == undefined ? 'tarea_id' : poParam['type_query']);
    var _add_blank = (poParam['add_blank'] == undefined ? 'YES' : poParam['add_blank']);
    var _nvuak = (poParam['nv_usuracce_key'] == undefined ? '' : poParam['nv_usuracce_key']); // si esta vacio verifica usuracce_key, con cualqiuer valor no verifica

    var _vs = fextpub_sessionVariables();
    var _cboTarea_key = _panel.down('#tarea_key');
    if ( _cboTarea_key.getStore().storeId == 'ext-empty-store' ) { _cboTarea_key.bindStore(Ext.create('Siace.store.budget.TareasAccess')); };
    _cboTarea_key.getStore().on('beforeload', function(store, operations, eOpts) {
        store.getProxy().setExtraParam('xxYear_id', Ext.getCmp('ah_txtYear_id').getValue()*1 <= 0 ? (poParam['objYear_id'] == undefined ? (_panel.down('#year_id') ? _panel.down('#year_id').getValue() : '0') : poParam['objYear_id'].getValue()) : Ext.getCmp('ah_txtYear_id').getValue());
        store.getProxy().setExtraParam('xxArea_key', (_panel.down('#area_key') ? _panel.down('#area_key').getValue() : ''));
        store.getProxy().setExtraParam('xxMeta_id', (_panel.down('#meta_id') ? _panel.down('#meta_id').getValue() : '0'));
        store.getProxy().setExtraParam('xxTipgast_id', (_panel.down('#tipgast_id') ? _panel.down('#tipgast_id').getValue() : '0'));
        store.getProxy().setExtraParam('xxDocu_campo', _docu_campo);
        store.getProxy().setExtraParam('xxDocu_estado', _docu_estado);
        store.getProxy().setExtraParam('xxMenu_id', _menu_id);
        store.getProxy().setExtraParam('xxType_record', _type_record);
        store.getProxy().setExtraParam('xxType_query', _type_query);
        store.getProxy().setExtraParam('xxAdd_blank', _add_blank);
        store.getProxy().setExtraParam('nvUsuracce_key', _nvuak);        
        store.getProxy().setExtraParam('zzUsursess_key', _vs['us']);
        store.getProxy().setExtraParam('zzUsuracce_key', _vs['ua']);
        store.getProxy().setExtraParam('zzYear_id', _vs['y']);
        store.getProxy().setExtraParam('zzUsur_key', _vs['u']);
        store.getProxy().setExtraParam('zzArea_key', _vs['a']);
    });
}

function fextbud_tipos_recursosLoad(poCombo, pbLoad) {
    if ( pbLoad ) {
        poCombo.getStore().load({
            callback: function(records, operations, success) {
                if ( records.length > 0 ) { poCombo.enable(); poCombo.setValue(records[0].data.tiprecur_id); }
                else { poCombo.disable();  poCombo.setValue(''); }
            }
        });
    } else {
        poCombo.getStore().removeAll(); poCombo.disable(); poCombo.setValue('');
    }
}

function fextbud_tipos_recursosParameters(poParam) {
    var _panel = poParam['panel'];
    var _type_record = (poParam['type_record'] == undefined ? 'combo_codename' : poParam['type_record']);
    var _add_blank = (poParam['add_blank'] == undefined ? 'YES' : poParam['add_blank']);

    var _cboTiprecur_id = _panel.down('#tiprecur_id');
    if ( _cboTiprecur_id.getStore().storeId == 'ext-empty-store' ) { _cboTiprecur_id.bindStore(Ext.create('Siace.store.budget.Tipos_Recursos')); };        
    _cboTiprecur_id.getStore().on('beforeload', function(store, operations, eOpts) {
        store.getProxy().setExtraParam('xxYear_id', poParam['objYear_id'] == undefined ? _panel.down('#year_id').getValue() : poParam['objYear_id'].getValue());
        store.getProxy().setExtraParam('xxFuefin_id', _panel.down('#fuefin_id').getValue());
        store.getProxy().setExtraParam('xxType_record', _type_record);
        store.getProxy().setExtraParam('xxAdd_blank', _add_blank);
    });
}

/*function fextope_almacenesAccess(poCombo) {
    fextope_almacenesCombo(poCombo, false, true, undefined, '', '', Ext.getCmp('ah_txtAlma_key').getValue() == '' ? 'YES' : '');
} */

/*function fextope_almacenesCombo(poCombo, pbVisible, pbFilterAlma, pcAlma_key, pcAlma_estado, pcType_record, pcAdd_blank) {
    var _visible = (pbVisible == '' || pbVisible == undefined ? false : pbVisible);
    var _filterAlma = (pbFilterAlma == '' || pbFilterAlma == undefined ? true : pbFilterAlma);
    var _alma_key = (pcAlma_key == undefined ? Ext.getCmp('ah_txtAlma_key').getValue() : pcAlma_key);
    var _alma_estado = (pcAlma_estado == '' || pcAlma_estado == undefined ? '' : pcAlma_estado);
    var _type_record = (pcType_record == '' || pcType_record == undefined ? 'combo_abrev' : pcType_record);
    var _add_blank = (pcAdd_blank == '' || pcAdd_blank == undefined ? '' : pcAdd_blank);    
    if ( _alma_key !== '' ) { poCombo.setVisible(_visible); }
    poCombo.bindStore(Ext.create('Siace.store.operations.Almacenes'));
    poCombo.getStore().load({ 
        params: { xxAlma_key: (_filterAlma == true ? _alma_key : ''), xxAlma_estado: _alma_estado, xxType_record: _type_record, xxAdd_blank: _add_blank },
        callback: function(records, operations, success) {
            if ( records.length > 0 ) { poCombo.setValue(records[0].data.alma_key); } 
            else { poCombo.setDisabled(true);  poCombo.setValue(''); }
        }
     });
} */

function fextlog_fasesFilter(poParam) {
    var _obj = poParam['objeto'];
    var _fase_id = (poParam['fase_id'] == undefined ? '' : poParam['fase_id']);
    var _doc_id = (poParam['doc_id'] == undefined ? '' : poParam['doc_id']);
    var _fase_orden = (poParam['fase_orden'] == undefined ? '' : poParam['fase_orden']);
    var _fase_obsv = (poParam['fase_obsv'] == undefined ? '' : poParam['fase_obsv']);
    var _fase_next = (poParam['fase_next'] == undefined ? '' : poParam['fase_next']);
    var _fase_type = (poParam['fase_type'] == undefined ? '' : poParam['fase_type']);
    var _fase_aux = (poParam['fase_aux'] == undefined ? '' : poParam['fase_aux']);
    var _fase_esvobo = (poParam['fase_esvobo'] == undefined ? '' : poParam['fase_esvobo']);
    var _fase_estado = (poParam['fase_estado'] == undefined ? '1' : poParam['fase_estado']);
    var _type_record = (poParam['type_record'] == undefined ? 'combo' : poParam['type_record']);
    var _type_query = (poParam['type_query'] == undefined ? '' : poParam['type_query']);
    var _order_by = (poParam['order_by'] == undefined ? '' : poParam['order_by']);    
    var _add_blank = (poParam['add_blank'] == undefined ? 'YES' : poParam['add_blank']);
    var _disabled = (poParam['disabled'] == undefined ? false : poParam['disabled']);
    var _setValue = (poParam['setValue'] == undefined ? true : poParam['setValue']);
    var _length = (_add_blank == 'YES' ? 1 : 0);

    if ( _obj.getStore().storeId == 'ext-empty-store' ) { _obj.bindStore(Ext.create('Siace.store.logistics.Fases')); }
    _obj.getStore().load({ 
        params: { xxFase_id: _fase_id, xxDoc_id: _doc_id, xxFase_orden: _fase_orden, xxFase_obsv: _fase_obsv, xxFase_next: _fase_next,
                  xxFase_type: _fase_type, xxFase_aux: _fase_aux, xxFase_esvobo: _fase_esvobo, xxFase_estado: _fase_estado,
                  xxType_record: _type_record, xxType_query: _type_query, xxOrder_by: _order_by, xxAdd_blank: _add_blank },
        callback: function(records, operations, success) {
            if ( (records.length > _length) && _setValue ) { _obj.setDisabled(_disabled); _obj.setValue(records[0].data.fase_id); }
            else if ( records.length > _length ) { _obj.setDisabled(_disabled); }
            else { _obj.disable();  _obj.setValue(''); }
        }
    });
}

function fextlog_unidades_vehicularesFilter(poParam) {
    var _obj = poParam['objeto'];
    var _unidveh_key = (poParam['unidveh_key'] == undefined ? '' : poParam['unidveh_key']);
    var _unidveh_rent = (poParam['unidveh_rent'] == undefined ? '' : poParam['unidveh_rent']);
    var _unidveh_estado = (poParam['unidveh_estado'] == undefined ? '' : poParam['unidveh_estado']);
    var _type_record = (poParam['type_record'] == undefined ? 'combo' : poParam['type_record']);
    var _type_query = (poParam['type_query'] == undefined ? '' : poParam['type_query']);
    var _order_by = (poParam['order_by'] == undefined ? '' : poParam['order_by']);    
    var _add_blank = (poParam['add_blank'] == undefined ? 'YES' : poParam['add_blank']);
    var _disabled = (poParam['disabled'] == undefined ? false : poParam['disabled']);
    var _setValue = (poParam['setValue'] == undefined ? true : poParam['setValue']);
    var _length = (_add_blank == 'YES' ? 1 : 0);

    if ( _obj.getStore().storeId == 'ext-empty-store' ) { _obj.bindStore(Ext.create('Siace.store.logistics.Unidades_Vehiculares')); }
    _obj.getStore().load({ 
        params: { xxUnidveh_key: _unidveh_key, xxUnidveh_rent: _unidveh_rent, xxUnidveh_estado: _unidveh_estado,
                  xxType_record: _type_record, xxType_query: _type_query, xxOrder_by: _order_by, xxAdd_blank: _add_blank },
        callback: function(records, operations, success) {
            if ( (records.length > _length) && _setValue ) { _obj.setDisabled(_disabled); _obj.setValue(records[0].data.unidveh_key); }
            else if ( records.length > _length ) { _obj.setDisabled(_disabled); }
            else { _obj.disable();  _obj.setValue(''); }
        }
    });
}

function fextope_aduanasFilter(poParam) {
    var _obj = poParam['objeto'];
    var _adua_estado = (poParam['adua_estado'] == undefined ? '' : poParam['adua_estado']);
    var _type_record = (poParam['type_record'] == undefined ? 'combo' : poParam['type_record']);
    var _type_query = (poParam['type_query'] == undefined ? '' : poParam['type_query']);
    var _order_by = (poParam['order_by'] == undefined ? '' : poParam['order_by']);
    var _add_blank = (poParam['add_blank'] == undefined ? 'YES' : poParam['add_blank']);
    var _setValue = (poParam['setValue'] == undefined ? true : poParam['setValue']);
    var _disabled = (poParam['disabled'] == undefined ? false : poParam['disabled']);
    var _length = (_add_blank == 'YES' ? 1 : 0);

    if ( _obj.getStore().storeId == 'ext-empty-store' ) { _obj.bindStore(Ext.create('Siace.store.operations.Aduanas')); }
    _obj.getStore().load({ 
        params: { xxAdua_estado: _adua_estado, xxType_record: _type_record, xxType_query: _type_query, xxAdd_blank: _add_blank },
        callback: function(records, operations, success) {
            if ( (records.length > _length) && _setValue ) { _obj.setDisabled(_disabled); _obj.setValue(records[0].data.adua_id); }
            else if ( records.length > _length ) { _obj.setDisabled(_disabled); }
            else { _obj.setDisabled(true);  _obj.setValue(''); }
        }
    });
}

function fextope_aduanas_operacionesFilter(poParam) {
    var _obj = poParam['objeto'];
    var _aduaoper_estado = (poParam['aduaoper_estado'] == undefined ? '' : poParam['aduaoper_estado']);
    var _type_record = (poParam['type_record'] == undefined ? 'combo' : poParam['type_record']);
    var _type_query = (poParam['type_query'] == undefined ? '' : poParam['type_query']);
    var _order_by = (poParam['order_by'] == undefined ? '' : poParam['order_by']);
    var _add_blank = (poParam['add_blank'] == undefined ? 'YES' : poParam['add_blank']);
    var _setValue = (poParam['setValue'] == undefined ? true : poParam['setValue']);
    var _disabled = (poParam['disabled'] == undefined ? false : poParam['disabled']);
    var _length = (_add_blank == 'YES' ? 1 : 0);

    if ( _obj.getStore().storeId == 'ext-empty-store' ) { _obj.bindStore(Ext.create('Siace.store.operations.Aduanas_Operaciones')); }
    _obj.getStore().load({ 
        params: { xxAduaoper_estado: _aduaoper_estado, xxType_record: _type_record, xxType_query: _type_query, xxAdd_blank: _add_blank },
        callback: function(records, operations, success) {
            if ( (records.length > _length) && _setValue ) { _obj.setDisabled(_disabled); _obj.setValue(records[0].data.aduaoper_id); }
            else if ( records.length > _length ) { _obj.setDisabled(_disabled); }
            else { _obj.setDisabled(true);  _obj.setValue(''); }
        }
    });
}

function fextope_almacenesFilter(poParam) {
    var _obj = poParam['objeto'];
    var _visible = (poParam['visible'] == undefined ? true : poParam['visible']);
    var _filter = (poParam['filter'] == undefined ? true : poParam['filter']);
    var _alma_key = (poParam['alma_key'] == undefined ? Ext.getCmp('ah_txtAlma_key').getValue() : poParam['alma_key']);
    var _alma_estado = (poParam['alma_estado'] == undefined ? '' : poParam['alma_estado']);
    var _type_record = (poParam['type_record'] == undefined ? 'combo_abrev' : poParam['type_record']);
    var _type_query = (poParam['type_query'] == undefined ? 'combo_abrev' : poParam['type_query']);
    var _add_blank = (poParam['add_blank'] == undefined ? 'YES' : poParam['add_blank']);
    var _setValue = (poParam['setValue'] == undefined ? true : poParam['setValue']);
    var _disabled = (poParam['disabled'] == undefined ? false : poParam['disabled']);
    var _length = (_add_blank == 'YES' ? 1 : 0);

    if ( _alma_key !== '' ) { _obj.setVisible(_visible); }
    if ( _obj.getStore().storeId == 'ext-empty-store' ) { _obj.bindStore(Ext.create('Siace.store.operations.Almacenes')); }
    _obj.getStore().load({ 
        params: { xxAlma_key: (_filter == true ? _alma_key : ''), xxAlma_estado: _alma_estado, xxType_record: _type_record, xxType_query: _type_query, xxAdd_blank: _add_blank },
        callback: function(records, operations, success) {
            if ( (records.length > _length) &&_setValue ) { _obj.setDisabled(_disabled); _obj.setValue(records[0].data.alma_key); }
            else if ( records.length > _length ) { _obj.setDisabled(_disabled); }
            else { _obj.setDisabled(true);  _obj.setValue(''); }
        }
    });
}

function fextope_tipos_documentos_aduanaFilter(poParam) {
    var _obj = poParam['objeto'];
    var _tipdocadua_ingreso = (poParam['tipdocadua_ingreso'] == undefined ? '' : poParam['tipdocadua_ingreso']);
    var _tipdocadua_salida = (poParam['tipdocadua_salida'] == undefined ? '' : poParam['tipdocadua_salida']);
    var _type_record = (poParam['type_record'] == undefined ? 'combo_abrev' : poParam['type_record']);
    var _type_query = (poParam['type_query'] == undefined ? '' : poParam['type_query']);
    var _order_by = (poParam['order_by'] == undefined ? '' : poParam['order_by']);
    var _add_blank = (poParam['add_blank'] == undefined ? 'YES' : poParam['add_blank']);
    var _setValue = (poParam['setValue'] == undefined ? true : poParam['setValue']);
    var _disabled = (poParam['disabled'] == undefined ? false : poParam['disabled']);
    var _length = (_add_blank == 'YES' ? 1 : 0);

    if ( _obj.getStore().storeId == 'ext-empty-store' ) { _obj.bindStore(Ext.create('Siace.store.operations.Tipos_Documentos_Aduana')); }
    _obj.getStore().load({ 
        params: { xxTipdocadua_ingreso: _tipdocadua_ingreso, xxTipdocadua_salida: _tipdocadua_salida, xxType_record: _type_record, xxType_query: _type_query, xxAdd_blank: _add_blank },
        callback: function(records, operations, success) {
            if ( (records.length > _length) && _setValue ) { _obj.setDisabled(_disabled); _obj.setValue(records[0].data.tipdocadua_id); }
            else if ( records.length > _length ) { _obj.setDisabled(_disabled); }
            else { _obj.setDisabled(true);  _obj.setValue(''); }
        }
    });
}

function fextope_tipos_documentos_internacionalFilter(poParam) {
    var _obj = poParam['objeto'];
    var _type_record = (poParam['type_record'] == undefined ? 'combo_abrev' : poParam['type_record']);
    var _type_query = (poParam['type_query'] == undefined ? '' : poParam['type_query']);
    var _order_by = (poParam['order_by'] == undefined ? '' : poParam['order_by']);
    var _add_blank = (poParam['add_blank'] == undefined ? 'YES' : poParam['add_blank']);
    var _setValue = (poParam['setValue'] == undefined ? true : poParam['setValue']);
    var _disabled = (poParam['disabled'] == undefined ? false : poParam['disabled']);
    var _length = (_add_blank == 'YES' ? 1 : 0);

    if ( _obj.getStore().storeId == 'ext-empty-store' ) { _obj.bindStore(Ext.create('Siace.store.operations.Tipos_Documentos_Internacional')); }
    _obj.getStore().load({ 
        params: { xxType_record: _type_record, xxType_query: _type_query, xxAdd_blank: _add_blank },
        callback: function(records, operations, success) {
            if ( (records.length > _length) && _setValue ) { _obj.setDisabled(_disabled); _obj.setValue(records[0].data.tipdocint_id); }
            else if ( records.length > _length ) { _obj.setDisabled(_disabled); }
            else { _obj.setDisabled(true);  _obj.setValue(''); }
        }
    });
}

function fextope_tipos_movimientoLoad(poCombo, pbLoad) {
    if ( pbLoad ) {
        poCombo.getStore().load({
            callback: function(records, operations, success) {
                if ( records.length > 0 ) { poCombo.enable(); poCombo.setValue(records[0].data.tipmov_id); }
                else { poCombo.disable();  poCombo.setValue(''); }
            }
        });
    } else {
        poCombo.getStore().removeAll(); poCombo.disable(); poCombo.setValue('');
    }
}

function fextope_tipos_movimientoParameters(poParam) {
    var _panel = poParam['panel'];
    var _tipmov_estado_ingresos = (poParam['tipmov_estado_ingresos'] == undefined ? '' : poParam['tipmov_estado_ingresos']);
    var _tipmov_estado_salidas = (poParam['tipmov_estado_salidas'] == undefined ? '' : poParam['tipmov_estado_salidas']);
    var _tipmov_estado_regadua = (poParam['tipmov_estado_regadua'] == undefined ? '' : poParam['tipmov_estado_regadua']);
    var _tipmov_estado_pais = (poParam['tipmov_estado_pais'] == undefined ? '' : poParam['tipmov_estado_pais']);
    var _type_record = (poParam['type_record'] == undefined ? 'combo' : poParam['type_record']);
    var _type_query = (poParam['type_query'] == undefined ? '' : poParam['type_query']);
    var _add_blank = (poParam['add_blank'] == undefined ? 'YES' : poParam['add_blank']);

    var _cboTipmov_id = _panel.down('#tipmov_id');
    if ( _cboTipmov_id.getStore().storeId == 'ext-empty-store' ) { _cboTipmov_id.bindStore(Ext.create('Siace.store.operations.Tipos_Movimiento')); };
    _cboTipmov_id.getStore().on('beforeload', function(store, operations, options) {
        store.getProxy().setExtraParam('xxTipmov_estado_ingresos', _tipmov_estado_ingresos == '' ? (_panel.down('#tipregadua_id') ? (_panel.down('#tipregadua_id').getValue() == '1' ? '1' : '') : '') : _tipmov_estado_ingresos);
        store.getProxy().setExtraParam('xxTipmov_estado_salidas', _tipmov_estado_salidas == '' ? (_panel.down('#tipregadua_id') ? (_panel.down('#tipregadua_id').getValue() == '2' ? '1' : '') : '') : _tipmov_estado_salidas);
        store.getProxy().setExtraParam('xxTipmov_estado_regadua', _tipmov_estado_regadua);
        store.getProxy().setExtraParam('xxTipmov_estado_pais', _tipmov_estado_pais);
        store.getProxy().setExtraParam('xxType_record', _type_record);
        store.getProxy().setExtraParam('xxType_query', _type_query);
        store.getProxy().setExtraParam('xxAdd_blank', _add_blank);
    });
}

/*function fextpub_areasCombo(poCombo, pbVisible, pbFilterArea, pcArea_key, pcArea_estado, pcVe_usuracce_key, pcMenu_id, pcType_record, pcAdd_blank) {
    var _visible = (pbVisible == '' || pbVisible == undefined ? false : pbVisible);
    var _filterArea = (pbFilterArea == '' || pbFilterArea == undefined ? true : pbFilterArea);
    var _area_key = (pcArea_key == undefined ? Ext.getCmp('ah_txtArea_key').getValue() : pcArea_key);
    var _area_estado = (pcArea_estado == '' || pcArea_estado == undefined ? '' : pcArea_estado);
    var _ve_usuracce_key = (pcVe_usuracce_key == '' || pcVe_usuracce_key == undefined ? '' : pcVe_usuracce_key);
    var _menu_id = (pcMenu_id == '' || pcMenu_id == undefined ? '0' : pcMenu_id);
    var _type_record = (pcType_record == '' || pcType_record == undefined ? 'combo' : pcType_record);
    var _add_blank = (pcAdd_blank == '' || pcAdd_blank == undefined ? '' : pcAdd_blank);    
    var _disabled = (poParam['disabled'] == undefined ? false : poParam['disabled']);
    var _setValue = (poParam['setValue'] == undefined ? true : poParam['setValue']);
    var _length = (_add_blank == 'YES' ? 1 : 0);

    if ( _area_key !== '' ) { poCombo.setVisible(_visible); }
    var _vs = fextpub_sessionVariables();
    poCombo.bindStore(Ext.create('Siace.store.public.Areas'));
    poCombo.getStore().load({ 
        params: { xxArea_key: (_filterArea == true ? _area_key : ''), xxArea_estado: _area_estado, xxType_record: _type_record, xxAdd_blank: _add_blank,
                  zzUsursess_key: _vs['us'], zzUsuracce_key: _vs['ua'], zzYear_id: _vs['y'], zzUsur_key: _vs['u'], zzArea_key: _vs['a'], zzAlma_key: _vs['alma'] },
        callback: function(records, operations, success) {
            if ( (records.length > 0) && _setValue ) { poCombo.setValue(records[0].data.area_key); }
            else { poCombo.setDisabled(true);  poCombo.setValue(''); }
        }
     });
}*/

function fextpub_actividadesFilter(poParam) {
    var _obj = poParam['objeto'];
    var _bst_id = (poParam['bst_id'] == undefined ? '' : poParam['bst_id']);
    var _activ_key = (poParam['activ_key'] == undefined ? '' : poParam['activ_key']);
    var _activ_estado = (poParam['activ_estado'] == undefined ? '' : poParam['activ_estado']);
    var _type_record = (poParam['type_record'] == undefined ? 'combo_bst' : poParam['type_record']);
    var _add_blank = (poParam['add_blank'] == undefined ? 'YES' : poParam['add_blank']);
    var _disabled = (poParam['disabled'] == undefined ? false : poParam['disabled']);
    var _setValue = (poParam['setValue'] == undefined ? true : poParam['setValue']);
    var _length = (_add_blank == 'YES' ? 1 : 0);

    if ( _obj.getStore().storeId == 'ext-empty-store' ) { _obj.bindStore(Ext.create('Siace.store.public.Actividades')) };
    _obj.getStore().load({ 
        params: { xxActiv_key: _activ_key, xxBst_id: _bst_id, xxActiv_estado: _activ_estado, xxType_record: _type_record, xxAdd_blank: _add_blank, },
        callback: function(records, operations, success) {
            if ( (records.length > _length) && _setValue ) { _obj.setDisabled(_disabled); _obj.setValue(records[0].data.area_key); }
            else if ( records.length > _length ) { _obj.setDisabled(_disabled); }
            else { _obj.disable();  _obj.setValue(''); }
        }
     });
}

function fextpub_areasFilter(poParam) {
    var _obj = poParam['objeto'];
    var _visible = (poParam['visible'] == undefined ? true : poParam['visible']);
    var _filter = (poParam['filter'] == undefined ? true : poParam['filter']);
    var _area_key = (poParam['area_key'] == undefined ? '' : poParam['area_key']);
    var _area_estado = (poParam['area_estado'] == undefined ? '' : poParam['area_estado']);
    var _ve_usuracce_key = (poParam['ve_usuracce_key'] == undefined ? 'NOT' : poParam['ve_usuracce_key']);
    var _menu_id = (poParam['menu_id'] == undefined ? '0' : poParam['menu_id']);
    var _type_record = (poParam['type_record'] == undefined ? 'combo_abrev' : poParam['type_record']);
    var _type_query = (poParam['type_query'] == undefined ? '' : poParam['type_query']);
    var _add_blank = (poParam['add_blank'] == undefined ? 'YES' : poParam['add_blank']);
    var _disabled = (poParam['disabled'] == undefined ? false : poParam['disabled']);
    var _setValue = (poParam['setValue'] == undefined ? true : poParam['setValue']);
    var _length = (_add_blank == 'YES' ? 1 : 0);

    if ( _area_key !== '' ) { _obj.setVisible(_visible); }
    var _vs = fextpub_sessionVariables();
    if ( _obj.getStore().storeId == 'ext-empty-store' ) { _obj.bindStore(Ext.create('Siace.store.public.Areas')) };
    _obj.getStore().load({ 
        params: { xxArea_key: (_filter == true ? _area_key : ''), xxArea_estado: _area_estado, xxType_record: _type_record, xxType_query: _type_query, xxAdd_blank: _add_blank,
                  zzPerssess_key: _vs['ps'] },
        callback: function(records, operations, success) {
            if ( (records.length > _length) && _setValue ) { _obj.setDisabled(_disabled); _obj.setValue(records[0].data.area_key); }
            else if ( records.length > _length ) { _obj.setDisabled(_disabled); }
            else { _obj.disable();  _obj.setValue(''); }
        }
     });
}

/*function fextpub_bienes_servs_clasesLoad(poParam) {
    var _panel = poParam['panel'];
    _bst_id = (_panel.down('#bst_id') ? _panel.down('#bst_id').getValue() : '0');

    if ( _panel.down('#bsc_id') ) { _panel.down('#bsc_id').getStore().removeAll(); _panel.down('#bsc_id').setValue(''); _panel.down('#bsc_id').disable(); }
    if ( _panel.down('#bsf_id') ) { _panel.down('#bsf_id').getStore().removeAll(); _panel.down('#bsf_id').setValue(''); _panel.down('#bsf_id').disable(); }

    var _cboBsg_id = _panel.down('#bsg_id');
    if ( _bst_id*1 > 0 ) {
        _cboBsg_id.getStore().load({
            callback: function(records, operations, success) {
                if ( records.length > 0 ) { _cboBsg_id.enable(); _cboBsg_id.setValue(records[0].data.bsg_id); }
                else { _cboBsg_id.disable();  _cboBsg_id.setValue(''); }
            }
         });
    } else {
        _cboBsg_id.getStore().removeAll();  _cboBsg_id.setValue(''); _cboBsg_id.disable();
    }
} */

function fextpub_bienes_servs_clasesLoad(poParam) {
    var _panel = poParam['panel'];
    var _disabled = (poParam['disabled'] == undefined ? false : poParam['disabled']);
    var _setValue = (poParam['setValue'] == undefined ? true : poParam['setValue']);    
    var _bsg_id = (_panel.down('#bsg_id') ? _panel.down('#bsg_id').getValue() : '0');

    if ( _panel.down('#bsf_id') ) { _panel.down('#bsf_id').getStore().removeAll(); _panel.down('#bsf_id').setValue(''); _panel.down('#bsf_id').disable(); }
    var _cboBsc_id = _panel.down('#bsc_id');
    if ( _bsg_id*1 > 0 ) {
        _cboBsc_id.getStore().load({
            callback: function(records, operations, success) {
                var _length = (_cboBsc_id.getStore().getProxy().extraParams['xxAdd_blank'] == 'YES' ? 1 : 0);
                if ( (records.length > _length) && _setValue ) { _cboBsc_id.setDisabled(_disabled); _cboBsc_id.setValue(records[0].data.bsc_id); }
                else if ( records.length > _length ) { _cboBsc_id.setDisabled(_disabled); }
                else { _cboBsc_id.disable();  _cboBsc_id.setValue(''); }
            }
         });
    } else {
        _cboBsc_id.getStore().removeAll();  _cboBsc_id.setValue(''); _cboBsc_id.disable();
    }
}

function fextpub_bienes_servs_clasesParameters(poParam) {
    var _panel = poParam['panel'];
    var _bsc_estado = (poParam['bsc_estado'] == undefined ? '' : poParam['bsc_estado']);
    var _type_record = (poParam['type_record'] == undefined ? 'combo_codename' : poParam['type_record']);
    var _type_query = (poParam['type_query'] == undefined ? '' : poParam['type_query']);
    var _order_by = (poParam['order_by'] == undefined ? '' : poParam['order_by']);
    var _add_blank = (poParam['add_blank'] == undefined ? 'YES' : poParam['add_blank']);

    var _cboBsc_id = _panel.down('#bsc_id');
    if ( _cboBsc_id.getStore().storeId == 'ext-empty-store' ) { _cboBsc_id.bindStore(Ext.create('Siace.store.public.Bienes_Servs_Clases')); };
    _cboBsc_id.getStore().on('beforeload', function(store, operations, options) {
        store.getProxy().setExtraParam('xxBst_id', (_panel.down('#bst_id') ? _panel.down('#bst_id').getValue() : '0'));
        store.getProxy().setExtraParam('xxBsg_id', (_panel.down('#bsg_id') ? _panel.down('#bsg_id').getValue() : '0'));
        store.getProxy().setExtraParam('xxBsc_estado', _bsc_estado);
        store.getProxy().setExtraParam('xxType_record', _type_record);
        store.getProxy().setExtraParam('xxType_query', _type_query);
        store.getProxy().setExtraParam('xxOrder_by', _order_by);
        store.getProxy().setExtraParam('xxAdd_blank', _add_blank);
    });
}

function fextpub_bienes_servs_clases_marcasLoad(poParam) {
    var _panel = poParam['panel'];
    _bsc_id = (_panel.down('#bsc_id') ? _panel.down('#bsc_id').getValue() : '0');

    var _obj = ( poParam['objeto'] == undefined ? _panel.down('#marc_key') : poParam['objeto'] );
    if ( _bsc_id*1 > 0 ) {
        _obj.getStore().load({
            callback: function(records, operations, success) {
                if ( records.length > 0 ) { _obj.enable(); _obj.setValue(records[0].data.marc_key); }
                else { _obj.disable();  _obj.setValue(''); }
            }
         });
    } else {
        _obj.getStore().removeAll();  _obj.setValue(''); _obj.disable();
    }
}

function fextpub_bienes_servs_clases_marcasParameters(poParam) {
    var _panel = poParam['panel'];
    var _bscmarc_estado = (poParam['bscmarc_estado'] == undefined ? '' : poParam['bscmarc_estado']);
    var _type_record = (poParam['type_record'] == undefined ? 'combo_marcas' : poParam['type_record']);
    var _type_query = (poParam['type_query'] == undefined ? '' : poParam['type_query']);
    var _order_by = (poParam['order_by'] == undefined ? '' : poParam['order_by']);
    var _add_blank = (poParam['add_blank'] == undefined ? 'YES' : poParam['add_blank']);

    var _obj = ( poParam['objeto'] == undefined ? _panel.down('#marc_key') : poParam['objeto'] );
    if ( _obj.getStore().storeId == 'ext-empty-store' ) { _obj.bindStore(Ext.create('Siace.store.public.Bienes_Servs_Clases_Marcas')); };
    _obj.getStore().on('beforeload', function(store, operations, options) {
        store.getProxy().setExtraParam('xxBsc_id', (_panel.down('#bsc_id') ? _panel.down('#bsc_id').getValue() : '0'));
        store.getProxy().setExtraParam('xxBscmarc_estado', _bscmarc_estado);
        store.getProxy().setExtraParam('xxType_record', _type_record);
        store.getProxy().setExtraParam('xxType_query', _type_query);
        store.getProxy().setExtraParam('xxOrder_by', _order_by);
        store.getProxy().setExtraParam('xxAdd_blank', _add_blank);
    });
}

function fextpub_bienes_servs_familiasLoad(poParam) {
    var _panel = poParam['panel'];
    var _disabled = (poParam['disabled'] == undefined ? false : poParam['disabled']);
    var _setValue = (poParam['setValue'] == undefined ? true : poParam['setValue']);    
    var _bsc_id = (_panel.down('#bsc_id') ? _panel.down('#bsc_id').getValue() : '0');

    var _cboBsf_id = _panel.down('#bsf_id');
    if ( _bsc_id*1 > 0 ) {
        _cboBsf_id.getStore().load({
            callback: function(records, operations, success) {
                var _length = (_cboBsf_id.getStore().getProxy().extraParams['xxAdd_blank'] == 'YES' ? 1 : 0);
                if ( (records.length > _length) && _setValue ) { _cboBsf_id.setDisabled(_disabled); _cboBsf_id.setValue(records[0].data.bsf_id); }
                else if ( records.length > _length ) { _cboBsf_id.setDisabled(_disabled); }
                else { _cboBsf_id.disable();  _cboBsf_id.setValue(''); }
            }
         });
    } else {
        _cboBsf_id.getStore().removeAll();  _cboBsf_id.setValue(''); _cboBsf_id.disable();
    }
}

function fextpub_bienes_servs_familiasParameters(poParam) {
    var _panel = poParam['panel'];
    var _bsf_estado = (poParam['bsf_estado'] == undefined ? '' : poParam['bsf_estado']);
    var _type_record = (poParam['type_record'] == undefined ? 'combo_codename' : poParam['type_record']);
    var _type_query = (poParam['type_query'] == undefined ? '' : poParam['type_query']);
    var _order_by = (poParam['order_by'] == undefined ? '' : poParam['order_by']);
    var _add_blank = (poParam['add_blank'] == undefined ? 'YES' : poParam['add_blank']);

    var _cboBsf_id = _panel.down('#bsf_id');
    if ( _cboBsf_id.getStore().storeId == 'ext-empty-store' ) { _cboBsf_id.bindStore(Ext.create('Siace.store.public.Bienes_Servs_Familias')); };
    _cboBsf_id.getStore().on('beforeload', function(store, operations, options) {
        store.getProxy().setExtraParam('xxBst_id', (_panel.down('#bst_id') ? _panel.down('#bst_id').getValue() : '0'));
        store.getProxy().setExtraParam('xxBsg_id', (_panel.down('#bsg_id') ? _panel.down('#bsg_id').getValue() : '0'));
        store.getProxy().setExtraParam('xxBsc_id', (_panel.down('#bsc_id') ? _panel.down('#bsc_id').getValue() : '0'));
        store.getProxy().setExtraParam('xxBsf_estado', _bsf_estado);
        store.getProxy().setExtraParam('xxType_record', _type_record);
        store.getProxy().setExtraParam('xxType_query', _type_query);
        store.getProxy().setExtraParam('xxOrder_by', _order_by);
        store.getProxy().setExtraParam('xxAdd_blank', _add_blank);
    });
}

function fextpub_bienes_servs_gruposLoad(poParam) {
    var _panel = poParam['panel'];
    var _disabled = (poParam['disabled'] == undefined ? false : poParam['disabled']);
    var _setValue = (poParam['setValue'] == undefined ? true : poParam['setValue']);
    var _bst_id = (_panel.down('#bst_id') ? _panel.down('#bst_id').getValue() : '0');

    if ( _panel.down('#bsc_id') ) { _panel.down('#bsc_id').getStore().removeAll(); _panel.down('#bsc_id').setValue(''); _panel.down('#bsc_id').disable(); }
    if ( _panel.down('#bsf_id') ) { _panel.down('#bsf_id').getStore().removeAll(); _panel.down('#bsf_id').setValue(''); _panel.down('#bsf_id').disable(); }

    var _cboBsg_id = _panel.down('#bsg_id');
    if ( _bst_id*1 > 0 ) {
        _cboBsg_id.getStore().load({
            callback: function(records, operations, success) {
                var _length = (_cboBsg_id.getStore().getProxy().extraParams['xxAdd_blank'] == 'YES' ? 1 : 0);
                if ( (records.length > _length) && _setValue ) { _cboBsg_id.setDisabled(_disabled); _cboBsg_id.setValue(records[0].data.bsg_id); }
                else if ( records.length > _length ) { _cboBsg_id.setDisabled(_disabled); }
                else { _cboBsg_id.disable();  _cboBsg_id.setValue(''); }
            }
        });
    } else {
        _cboBsg_id.getStore().removeAll();  _cboBsg_id.setValue(''); _cboBsg_id.disable();
    }
}

function fextpub_bienes_servs_gruposParameters(poParam) {
    var _panel = poParam['panel'];
    var _bsg_estado = (poParam['bsg_estado'] == undefined ? '' : poParam['bsg_estado']);
    var _type_record = (poParam['type_record'] == undefined ? 'combo_codename' : poParam['type_record']);
    var _type_query = (poParam['type_query'] == undefined ? '' : poParam['type_query']);
    var _order_by = (poParam['order_by'] == undefined ? '' : poParam['order_by']);
    var _add_blank = (poParam['add_blank'] == undefined ? 'YES' : poParam['add_blank']);

    var _cboBsg_id = _panel.down('#bsg_id');
    if ( _cboBsg_id.getStore().storeId == 'ext-empty-store' ) { _cboBsg_id.bindStore(Ext.create('Siace.store.public.Bienes_Servs_Grupos')); };
    _cboBsg_id.getStore().on('beforeload', function(store, operations, options) {
        store.getProxy().setExtraParam('xxBst_id', (_panel.down('#bst_id') ? _panel.down('#bst_id').getValue() : '0'));
        store.getProxy().setExtraParam('xxBsg_estado', _bsg_estado);
        store.getProxy().setExtraParam('xxType_record', _type_record);
        store.getProxy().setExtraParam('xxType_query', _type_query);
        store.getProxy().setExtraParam('xxOrder_by', _order_by);
        store.getProxy().setExtraParam('xxAdd_blank', _add_blank);
    });
}

function fextpub_cargos_usuariosFilter(poParam) { //poCombo, pnCargusur_id, pnCargusur_estado, pcType_record, pcAdd_blank) {
    var _obj = poParam['objeto'];
    var _cargusur_id = (poParam['cargusur_id'] == undefined ? '' : poParam['cargusur_id']);
    var _cargusur_estado = (poParam['cargusur_estado'] == undefined ? '1' : poParam['cargusur_estado']);
    var _type_record = (poParam['type_record'] == undefined ? 'combo' : poParam['type_record']);
    var _type_query = (poParam['type_query'] == undefined ? '' : poParam['type_query']);
    var _order_by = (poParam['order_by'] == undefined ? 'cargusur_estado' : poParam['order_by']);    
    var _add_blank = (poParam['add_blank'] == undefined ? 'YES' : poParam['add_blank']);
    var _disabled = (poParam['disabled'] == undefined ? false : poParam['disabled']);
    var _setValue = (poParam['setValue'] == undefined ? true : poParam['setValue']);
    var _length = (_add_blank == 'YES' ? 1 : 0);

    if ( _obj.getStore().storeId == 'ext-empty-store' ) { _obj.bindStore(Ext.create('Siace.store.public.Cargos_Usuarios')); }
    _obj.getStore().load({ 
        params: { xxCargusur_id: _cargusur_id, xxCargusur_estado: _cargusur_estado, 
                  xxType_record: _type_record, xxType_query: _type_query, xxOrder_by: _order_by, xxAdd_blank: _add_blank },
        callback: function(records, operations, success) {
            if ( (records.length > _length) && _setValue ) { _obj.setDisabled(_disabled); _obj.setValue(records[0].data.cargusur_id); }
            else if ( records.length > _length ) { _obj.setDisabled(_disabled); }
            else { _obj.disable();  _obj.setValue(''); }
        }
    });
}

function fextpub_departamentosRecords(po_cboDpto_id, pcPais_id) {
    po_cboDpto_id.getStore().load({
        params: { xxPais_id: pcPais_id, xxType_record: 'cboPais_id' }
    });
}

function fextpub_documentosFilter(poParam) {
    var _obj = poParam['objeto'];
    var _doc_id = (poParam['doc_id'] == undefined ? '' : poParam['doc_id']);
    var _doc_escompra = (poParam['doc_escompra'] == undefined ? '' : poParam['doc_escompra']);
    var _doc_esgasto = (poParam['doc_esgasto'] == undefined ? '' : poParam['doc_esgasto']);
    var _doc_esventa = (poParam['doc_esventa'] == undefined ? '' : poParam['doc_esventa']);
    var _doc_escobro = (poParam['doc_escobro'] == undefined ? '' : poParam['doc_escobro']);
    var _doc_espago = (poParam['doc_espago'] == undefined ? '' : poParam['doc_espago']);
    var _doc_esdocumentary = (poParam['doc_esdocumentary'] == undefined ? '' : poParam['doc_esdocumentary']);
    var _doc_esexportar = (poParam['doc_esexportar'] == undefined ? '' : poParam['doc_esexportar']);
    var _docser_estado = (poParam['docser_estado'] == undefined ? '' : poParam['docser_estado']);
    var _type_record = (poParam['type_record'] == undefined ? 'combo' : poParam['type_record']);
    var _type_query = (poParam['type_query'] == undefined ? '' : poParam['type_query']);
    var _order_by = (poParam['order_by'] == undefined ? '' : poParam['order_by']);    
    var _add_blank = (poParam['add_blank'] == undefined ? 'YES' : poParam['add_blank']);
    var _disabled = (poParam['disabled'] == undefined ? false : poParam['disabled']);
    var _setValue = (poParam['setValue'] == undefined ? true : poParam['setValue']);
    var _length = (_add_blank == 'YES' ? 1 : 0);

    if ( _obj.getStore().storeId == 'ext-empty-store' ) { _obj.bindStore(Ext.create('Siace.store.public.Documentos')); }
    _obj.getStore().load({ 
        params: { xxDoc_id: _doc_id, xxDoc_escompra: _doc_escompra, xxDoc_esgasto: _doc_esgasto, xxDoc_esventa: _doc_esventa, xxDoc_escobro: _doc_escobro, xxDoc_espago: _doc_espago, xxDoc_esdocumentary: _doc_esdocumentary, xxDoc_esexportar: _doc_esexportar,
                  xxType_record: _type_record, xxType_query: _type_query, xxOrder_by: _order_by, xxAdd_blank: _add_blank },
        callback: function(records, operations, success) {
            if ( (records.length > _length) && _setValue ) { _obj.setDisabled(_disabled); _obj.setValue(records[0].data.doc_id); }
            else if ( records.length > _length ) { _obj.setDisabled(_disabled); }
            else { _obj.disable();  _obj.setValue(''); }
        }
    });
}

function fextpub_documentos_seriesParameters(poParam) {
    var _panel = poParam['panel'];
    var _obj = _panel.down('#'+poParam['itemId']);
    var _docser_estado = (poParam['docser_estado'] == undefined ? '' : poParam['docser_estado']);
    var _type_record = (poParam['type_record'] == undefined ? 'combo' : poParam['type_record']);
    var _type_query = (poParam['type_query'] == undefined ? '' : poParam['type_query']);
    var _order_by = (poParam['order_by'] == undefined ? '' : poParam['order_by']);
    var _add_blank = (poParam['add_blank'] == undefined ? 'YES' : poParam['add_blank']);

    if ( _obj.getStore().storeId == 'ext-empty-store' ) { _obj.bindStore(Ext.create('Siace.store.public.Documentos_Series')); };
    _obj.getStore().on('beforeload', function(store, operations, options) {
        store.getProxy().setExtraParam('xxDoc_id', (_panel.down('#doc_id') ? _panel.down('#doc_id').getValue() : '0'));
        store.getProxy().setExtraParam('xxYear_id', (_panel.down('#year_id') ? _panel.down('#year_id').getValue() : '0'));
        store.getProxy().setExtraParam('xxDocser_estado', _docser_estado);
        store.getProxy().setExtraParam('xxType_record', _type_record);
        store.getProxy().setExtraParam('xxType_query', _type_query);
        store.getProxy().setExtraParam('xxOrder_by', _order_by);
        store.getProxy().setExtraParam('xxAdd_blank', _add_blank);
    });
}

function fextpub_documentos_seriesLoad(poParam) {
    var _panel = poParam['panel'];
    _doc_id = (_panel.down('#doc_id') ? _panel.down('#doc_id').getValue() : '0');

    var _obj = ( poParam['itemId'] == undefined ? _panel.down('#docser_id') : _panel.down('#'+poParam['itemId']) );
    if ( _doc_id == '0' || _doc_id == null ) {
        _obj.getStore().removeAll();  _obj.setValue(''); _obj.disable();
    } else {
        _obj.getStore().load({
            callback: function(records, operations, success) {
                if ( records.length > 0 ) { _obj.enable(); _obj.setValue(records[0].data.docser_serie); }
                else { _obj.disable();  _obj.setValue(''); }
            }
         });
    }
}

function fextpub_modelosLoad(poParam) {
    var _panel = poParam['panel'];
    _marc_key = (_panel.down('#marc_key') ? _panel.down('#marc_key').getValue() : '');

    var _obj = ( poParam['objeto'] == undefined ? _panel.down('#mod_key') : poParam['objeto'] );
    if ( _marc_key == '' || _marc_key == null ) {
        _obj.getStore().removeAll();  _obj.setValue(''); _obj.disable();
    } else {
        _obj.getStore().load({
            callback: function(records, operations, success) {
                if ( records.length > 0 ) { _obj.enable(); _obj.setValue(records[0].data.mod_key); }
                else { _obj.disable();  _obj.setValue(''); }
            }
         });
    }
}

function fextpub_modelosParameters(poParam) {
    var _panel = poParam['panel'];
    var _mod_estado = (poParam['mod_estado'] == undefined ? '' : poParam['mod_estado']);
    var _type_record = (poParam['type_record'] == undefined ? 'combo' : poParam['type_record']);
    var _type_query = (poParam['type_query'] == undefined ? '' : poParam['type_query']);
    var _order_by = (poParam['order_by'] == undefined ? '' : poParam['order_by']);
    var _add_blank = (poParam['add_blank'] == undefined ? 'YES' : poParam['add_blank']);

    var _obj = ( poParam['objeto'] == undefined ? _panel.down('#mod_key') : poParam['objeto'] );
    if ( _obj.getStore().storeId == 'ext-empty-store' ) { _obj.bindStore(Ext.create('Siace.store.public.Modelos')); };
    _obj.getStore().on('beforeload', function(store, operations, options) {
        store.getProxy().setExtraParam('xxMarc_key', (_panel.down('#marc_key') ? (_panel.down('#marc_key').getValue() == '' ? '999' : _panel.down('#marc_key').getValue()) : ''));
        store.getProxy().setExtraParam('xxMod_estado', _mod_estado);
        store.getProxy().setExtraParam('xxType_record', _type_record);
        store.getProxy().setExtraParam('xxType_query', _type_query);
        store.getProxy().setExtraParam('xxOrder_by', _order_by);
        store.getProxy().setExtraParam('xxAdd_blank', _add_blank);
    });
}

function fextpub_paisesFilter(poParam) {
    var _obj = poParam['objeto'];
    var _type_record = (poParam['type_record'] == undefined ? 'combo' : poParam['type_record']);
    var _type_query = (poParam['type_query'] == undefined ? '' : poParam['type_query']);
    var _order_by = (poParam['order_by'] == undefined ? '' : poParam['order_by']);
    var _add_blank = (poParam['add_blank'] == undefined ? 'YES' : poParam['add_blank']);
    var _setValue = (poParam['setValue'] == undefined ? true : poParam['setValue']);

    if ( _obj.getStore().storeId == 'ext-empty-store' ) { _obj.bindStore(Ext.create('Siace.store.public.Paises')); }
    _obj.getStore().load({ 
        params: { xxType_record: _type_record, xxType_query: _type_query, xxAdd_blank: _add_blank },
        callback: function(records, operations, success) {
            if ( records.length > 0 && _setValue ) { _obj.setValue(records[0].data.pais_id); }
            else if ( records.length > 0 ) { }
            else { _obj.setDisabled(true);  _obj.setValue(''); }
        }
    });
}


function fextpub_partidas_arancelarias_capitulosFilter(poParam) {
    var _obj = poParam['objeto'];
    var _partarancapi_id = (poParam['partarancapi_id'] == undefined ? '' : poParam['partarancapi_id']);
    var _partaransecc_id = (poParam['partaransecc_id'] == undefined ? '' : poParam['partaransecc_id']);
    var _partarancapi_estado = (poParam['partarancapi_estado'] == undefined ? '' : poParam['partarancapi_estado']);
    var _type_record = (poParam['type_record'] == undefined ? 'combo_codename' : poParam['type_record']);
    var _type_query = (poParam['type_query'] == undefined ? '' : poParam['type_query']);
    var _order_by = (poParam['order_by'] == undefined ? '' : poParam['order_by']);
    var _add_blank = (poParam['add_blank'] == undefined ? 'YES' : poParam['add_blank']);
    var _disabled = (poParam['disabled'] == undefined ? false : poParam['disabled']);
    var _setValue = (poParam['setValue'] == undefined ? true : poParam['setValue']);
    var _length = (_add_blank == 'YES' ? 1 : 0);

    if ( _obj.getStore().storeId == 'ext-empty-store' ) { _obj.bindStore(Ext.create('Siace.store.public.Partidas_Arancelarias_Capitulos')); }
    _obj.getStore().load({ 
        params: { xxPartarancapi_id: _partarancapi_id, xxPartaransecc_id: _partaransecc_id, xxPartarancapi_estado: _partarancapi_estado,
                  xxType_record: _type_record, xxType_query: _type_query, xxAdd_blank: _add_blank },
        callback: function(records, operations, success) {
            if ( (records.length > _length) && _setValue ) { _obj.setDisabled(_disabled); _obj.setValue(records[0].data.partarancapi_code); }
            else if ( records.length > _length ) { _obj.setDisabled(_disabled); }
            else { _obj.disable();  _obj.setValue(''); }
        }
    });
}

function fextpub_sessionVariables() {
    var _IDs = new Array();
    _IDs['ps'] = Ext.getCmp('ah_txtPerssess_key').getValue();
    _IDs['p'] = Ext.getCmp('ah_txtPers_key').getValue();
    _IDs['y'] = Ext.getCmp('ah_txtYear_id').getValue();
    return _IDs;        
}

function fextpub_tablas_generalesFilter(poParam) {
    var _obj = poParam['objeto'];
    var _tabgen_parent = (poParam['tabgen_parent'] == undefined ? '0' : poParam['tabgen_parent']);
    var _tabgen_estado = (poParam['tabgen_estado'] == undefined ? '' : poParam['tabgen_estado']);
    var _type_record = (poParam['type_record'] == undefined ? 'combo' : poParam['type_record']);
    var _type_query = (poParam['type_query'] == undefined ? '' : poParam['type_query']);
    var _add_blank = (poParam['add_blank'] == undefined ? 'YES' : poParam['add_blank']);
    var _disabled = (poParam['disabled'] == undefined ? false : poParam['disabled']);
    var _setValue = (poParam['setValue'] == undefined ? true : poParam['setValue']);
    var _length = (_add_blank == 'YES' ? 1 : 0);

    if ( _obj.getStore().storeId == 'ext-empty-store' ) { _obj.bindStore(Ext.create('Siace.store.public.Tablas_Generales')); }
    _obj.getStore().load({ 
        params: { xxTabgen_parent: _tabgen_parent, xxTabgen_estado: _tabgen_estado,
                  xxType_record: _type_record, xxType_query: _type_query, xxAdd_blank: _add_blank },
        callback: function(records, operations, success) {
            if ( (records.length > _length) && _setValue ) { _obj.setDisabled(_disabled); _obj.setValue(records[0].data.tabgen_id); }
            else if ( records.length > _length ) { _obj.setDisabled(_disabled); }
            else { _obj.disable();  _obj.setValue(''); }
        }
    });
}

function fextpub_tipos_documentos_identidadFilter(poParam) {
    var _obj = poParam['objeto'];
    var _tipdocident_estado_individuos = (poParam['tipdocident_estado_individuos'] == undefined ? '' : poParam['tipdocident_estado_individuos']);
    var _tipdocident_estado_personas = (poParam['tipdocident_estado_personas'] == undefined ? '' : poParam['tipdocident_estado_personas']);
    var _type_record = (poParam['type_record'] == undefined ? 'combo_abrev' : poParam['type_record']);
    var _type_query = (poParam['type_query'] == undefined ? '' : poParam['type_query']);
    var _order_by = (poParam['order_by'] == undefined ? '' : poParam['order_by']);
    var _add_blank = (poParam['add_blank'] == undefined ? 'YES' : poParam['add_blank']);
    var _disabled = (poParam['disabled'] == undefined ? false : poParam['disabled']);

    if ( _obj.getStore().storeId == 'ext-empty-store' ) { _obj.bindStore(Ext.create('Siace.store.public.Tipos_Documentos_Identidad')); }
    _obj.getStore().load({ 
        params: { xxTipdocident_estado_individuos: _tipdocident_estado_individuos, xxTipdocident_estado_personas: _tipdocident_estado_personas,
                  xxType_record: _type_record, xxType_query: _type_query, xxOrder_by: _order_by, xxAdd_blank: _add_blank },
        callback: function(records, operations, success) {
            if ( records.length > 1 ) { _obj.setDisabled(_disabled); _obj.setValue(records[0].data.tipdocident_id); }
            else { _obj.disable();  _obj.setValue(''); }
        }
    });
}

function fextpub_tipos_pagoFilter(poParam) {
    var _obj = poParam['objeto'];
    var _tippag_id = (poParam['tippag_id'] == undefined ? '' : poParam['tippag_id']);
    var _tippag_escompra = (poParam['tippag_escompra'] == undefined ? '' : poParam['tippag_escompra']);
    var _tippag_esventa = (poParam['tippag_esventa'] == undefined ? '' : poParam['tippag_esventa']);
    var _tippag_escobro = (poParam['tippag_escobro'] == undefined ? '' : poParam['tippag_escobro']);
    var _tippag_espago = (poParam['tippag_espago'] == undefined ? '' : poParam['tippag_espago']);
    var _type_record = (poParam['type_record'] == undefined ? 'combo' : poParam['type_record']);
    var _type_query = (poParam['type_query'] == undefined ? '' : poParam['type_query']);
    var _order_by = (poParam['order_by'] == undefined ? '' : poParam['order_by']);    
    var _add_blank = (poParam['add_blank'] == undefined ? 'YES' : poParam['add_blank']);
    var _disabled = (poParam['disabled'] == undefined ? false : poParam['disabled']);
    var _setValue = (poParam['setValue'] == undefined ? true : poParam['setValue']);
    var _length = (_add_blank == 'YES' ? 1 : 0);

    if ( _obj.getStore().storeId == 'ext-empty-store' ) { _obj.bindStore(Ext.create('Siace.store.public.Tipos_Pago')); }
    _obj.getStore().load({ 
        params: { xxTippag_id: _tippag_id, xxTippag_escompra: _tippag_escompra, xxTippag_esventa: _tippag_esventa, xxTippag_escobro: _tippag_escobro, xxTippag_espago: _tippag_espago,
                  xxType_record: _type_record, xxType_query: _type_query, xxOrder_by: _order_by, xxAdd_blank: _add_blank },
        callback: function(records, operations, success) {
            if ( (records.length > _length) && _setValue ) { _obj.setDisabled(_disabled); _obj.setValue(records[0].data.tippag_id); }
            else if ( records.length > _length ) { _obj.setDisabled(_disabled); }
            else { _obj.disable();  _obj.setValue(''); }
        }
    });
}

function fextpub_unidades_medidaFilter(poParam) {
    var _obj = poParam['objeto'];
    var _unimed_bien = (poParam['unimed_bien'] == undefined ? '' : poParam['unimed_bien']);
    var _unimed_serv = (poParam['unimed_serv'] == undefined ? '' : poParam['unimed_serv']);
    var _type_record = (poParam['type_record'] == undefined ? 'combo' : poParam['type_record']);
    var _type_query = (poParam['type_query'] == undefined ? '' : poParam['type_query']);
    var _order_by = (poParam['order_by'] == undefined ? '' : poParam['order_by']);
    var _add_blank = (poParam['add_blank'] == undefined ? 'YES' : poParam['add_blank']);
    var _disabled = (poParam['disabled'] == undefined ? false : poParam['disabled']);
    var _setValue = (poParam['setValue'] == undefined ? true : poParam['setValue']);
    var _length = (_add_blank == 'YES' ? 1 : 0);

    if ( _obj.getStore().storeId == 'ext-empty-store' ) { _obj.bindStore(Ext.create('Siace.store.public.Unidades_Medida')); }
    _obj.getStore().load({ 
        params: { xxUnimed_bien: _unimed_bien, xxUnimed_serv: _unimed_serv,
                  xxType_record: _type_record, xxType_query: _type_query, xxOrder_by: _order_by, xxAdd_blank: _add_blank },
        callback: function(records, operations, success) {
            if ( (records.length > _length) && _setValue ) { _obj.setDisabled(_disabled); _obj.setValue(records[0].data.unimed_id); }
            else if ( records.length > _length ) { _obj.setDisabled(_disabled); }
            else { _obj.disable();  _obj.setValue(''); }
        }
    });
}

function fextpub_usuarios_accesos_menus_opcionesPermits(poParam) {
    var _obj = poParam['objeto'];
    var _usuracce_id = (poParam['usuracce_id'] == undefined ? '' : poParam['usuracce_id']);
    var _usuracce_key = (poParam['usuracce_key'] == undefined ? Ext.getCmp('ah_txtUsuracce_key').getValue() : poParam['usuracce_key']);
    var _menuopc_id = (poParam['menuopc_id'] == undefined ? '' : poParam['menuopc_id']);
    var _usuraccemenuopc_estado = (poParam['usuraccemenuopc_estado'] == undefined ? '1' : poParam['usuraccemenuopc_estado']);
    var _menu_id = (poParam['menu_id'] == undefined ? '' : poParam['menu_id']);
    var _type_record = (poParam['type_record'] == undefined ? 'OPTIONS_ACCESS' : poParam['type_record']);
    var _type_query = (poParam['type_query'] == undefined ? '' : poParam['type_query']);
    var _order_by = (poParam['order_by'] == undefined ? '' : poParam['order_by']);
    var _add_blank = (poParam['add_blank'] == undefined ? '' : poParam['add_blank']);

    if ( _obj.getStore().storeId == 'ext-empty-store' ) { _obj.bindStore(Ext.create('Siace.store.public.Usuarios_Accesos_Menus_Opciones')); }
    _obj.getStore().load({ 
        params: { xxUsuracce_id: _usuracce_id, xxUsuracce_key: _usuracce_key, xxMenuopc_id: _menuopc_id, xxUsuraccemenuopc_estado: _usuraccemenuopc_estado, xxMenu_id: _menu_id,
                  xxType_record: _type_record, xxType_query: _type_query, xxOrder_by: _order_by, xxAdd_blank: _add_blank },
        callback: function(records, operations, success) { 
            if ( records.length > 0 ) { _obj.setValue(records[0].data.opc_id); } 
        }
    });
}

function fextpub_uamoButtons(poCombo, pnOpc_id) {
    return (poCombo.getStore().findRecord('opc_id', pnOpc_id) ? false : true);
}

function fextpub_yearsFilter(poParam) {
    var _obj = poParam['objeto'];
    var _year_estado = (poParam['year_estado'] == undefined ? '' : poParam['year_estado']);
    var _type_record = (poParam['type_record'] == undefined ? 'combo' : poParam['type_record']);
    var _type_query = (poParam['type_query'] == undefined ? '' : poParam['type_query']);
    var _order_by = (poParam['order_by'] == undefined ? '' : poParam['order_by']);
    var _add_blank = (poParam['add_blank'] == undefined ? 'YES' : poParam['add_blank']);

    _obj.bindStore(Ext.create('Siace.store.public.Years'));
    _obj.getStore().load({
        params: { xxYear_estado: _year_estado, xxType_record: _type_record, xxType_query: _type_query, xxOrder_by: _order_by, xxAdd_blank: _add_blank },
        callback: function(records, operations, success) {
            if ( records.length > 0 ) { _obj.setValue(records[0].data.year_id); } 
            else { _obj.disable();  _obj.setValue(''); }
        }
    });
}

/*function fextpub_yearsFilter(poParam) {
    var _obj = poParam['objeto'];
    var _visible = (poParam['visible'] == undefined ? true : poParam['visible']);
    var _filter = (poParam['filter'] == undefined ? true : poParam['filter']);
    var _area_key = (poParam['area_key'] == undefined ? Ext.getCmp('ah_txtArea_key').getValue() : poParam['area_key']);

    if ( pcYear_id == '0' || pcYear_id == null || pcYear_id == undefined ) {
        var _record = poCombo.getStore().first();
        poCombo.setValue(_record.data.year_id); poCombo.setVisible(true);
    } else {
        poCombo.setValue(pcYear_id); poCombo.setVisible(false);
    }
}*/

function fextpub_yearsValue(poYear_id, pcValue) {
    var _record = poYear_id.getStore().first(); poYear_id.setValue(_record.data.year_id);
}

function fextpub_yearsVisible(poCombo, pcYear_id) { // Year_id es el de la session de Acceso
    if ( pcYear_id == '0' || pcYear_id == null || pcYear_id == undefined ) {
        var _record = poCombo.getStore().first();
        poCombo.setValue(_record.data.year_id); poCombo.setVisible(true);
    } else {
        poCombo.setValue(pcYear_id*1); poCombo.setVisible(false);
    }
}

function fexttre_bienes_servs_categoriasFilter(poParam) {
    var _obj = poParam['objeto'];
    var _bscat_type = (poParam['bscat_type'] == undefined ? '' : poParam['bscat_type']);
    var _type_record = (poParam['type_record'] == undefined ? 'combo_abrev' : poParam['type_record']);
    var _type_query = (poParam['type_query'] == undefined ? '' : poParam['type_query']);
    var _order_by = (poParam['order_by'] == undefined ? '' : poParam['order_by']);    
    var _add_blank = (poParam['add_blank'] == undefined ? 'YES' : poParam['add_blank']);
    var _disabled = (poParam['disabled'] == undefined ? false : poParam['disabled']);
    var _setValue = (poParam['setValue'] == undefined ? true : poParam['setValue']);
    var _length = (_add_blank == 'YES' ? 1 : 0);

    if ( _obj.getStore().storeId == 'ext-empty-store' ) { _obj.bindStore(Ext.create('Siace.store.treasury.Bienes_Servs_Categorias')); }
    _obj.getStore().load({ 
        params: { xxBscat_type: _bscat_type,
                  xxType_record: _type_record, xxType_query: _type_query, xxOrder_by: _order_by, xxAdd_blank: _add_blank },
        callback: function(records, operations, success) {
            if ( (records.length > _length) && _setValue ) { _obj.setDisabled(_disabled); _obj.setValue(records[0].data.bscat_id); }
            else if ( records.length > _length ) { _obj.setDisabled(_disabled); }
            else { _obj.disable();  _obj.setValue(''); }
        }
    });
}

function fexttre_comprobantes_detAddPago(poWin, poRecord) {
        var _storeCD = poWin.down('#grdTreasury_comprobantes_det').getStore();
        var _storePC = poWin.down('#grdAccounting').getStore();
        var _storeED = poWin.down('#grdTreasury_comprobantes_especificas_det').getStore();
        _storeCD.removeAll(); _storePC.removeAll(); _storeED.removeAll();

        if ( poWin.down('#cuebanc_key').getValue() !== '' ) {
            var _recPC = poWin.down('#cuebanc_key').getStore().findRecord('cuebanc_key', poWin.down('#cuebanc_key').getValue());
        }

        var _comprobdet_monto = 0; var _found = ''; var _debe = ''; var pctbl_id = '';
        //for ( var _i = 0;  _i < records.length; _i++ ) {
            //console.log(poRecord.data);
            var _comprobdet_monto = fjsRound(poRecord.data.tipcamb_monto*1 <= 0 ? poRecord.data.comprobdet_monto : (poRecord.data.comprobdet_monto * poRecord.data.tipcamb_monto), 2);
            _storeCD.add({ tablex: poRecord.data.tablex, tablex_key: poRecord.data.tablex_key, tabley: poRecord.data.tabley, tabley_key: poRecord.data.tabley_key, tippag_id: poRecord.data.tippag_id, mone_id: poRecord.data.mone_id, mone_abrev: poRecord.data.mone_abrev, 
                           pctbl_id: poRecord.data.pctbl_id, pctbl_cuenta: poRecord.data.pctbl_cuenta, pctbl_nombre: poRecord.data.pctbl_nombre, espedet_id: poRecord.data.espedet_id, espedet_codigo: poRecord.data.espedet_codigo, espedet_nombre: poRecord.data.espedet_nombre, 
                           tablex_documento: poRecord.data.tablex_documento, tablex_fecha: poRecord.data.tablex_fecha, tippag_abrev: poRecord.data.tippag_abrev, tablex_monto: poRecord.data.tablex_monto, tablex_monto_pago: poRecord.data.tablex_monto_pago, tablex_monto_pago_real: poRecord.data.tablex_monto_pago_real, tipcamb_monto: poRecord.data.tipcamb_monto, comprobdet_monto: _comprobdet_monto });

            if ( poWin.down('#cuebanc_key').getValue() == '' ) {
                if ( (poRecord.data.tippag_id == '1' || poRecord.data.tippag_id == null) && poRecord.data.mone_id == '1' ) { _pctbl_cuenta = '101101'; }
                else if ( (poRecord.data.tippag_id == '1' || poRecord.data.tippag_id == null) && poRecord.data.mone_id == '2' ) { _pctbl_cuenta = '101102'; }
                else if ( (poRecord.data.tippag_id == '4' || poRecord.data.tablex == '111') && poRecord.data.mone_id == '1' ) { _pctbl_cuenta = '101201'; }
                else if ( (poRecord.data.tippag_id == '4' || poRecord.data.tablex == '111') && poRecord.data.mone_id == '2' ) { _pctbl_cuenta = '101202'; }
                else { pctbl_cuenta = '000000'; }
                var _recPC = poWin.down('#pctbl_id').getStore().findRecord('pctbl_cuenta', _pctbl_cuenta);
            } else if ( poRecord.data.doc_id == '515' && fjsIn_array(poRecord.data.conp_id, ['123','124']) ) {
                var _recPC = poWin.down('#pctbl_id').getStore().findRecord('pctbl_cuenta', '467102');
            } else if ( poRecord.data.doc_id == '515' && fjsIn_array(poRecord.data.conp_id, ['127']) ) {
                var _recPC = poWin.down('#pctbl_id').getStore().findRecord('pctbl_cuenta', '122102');
            }

            _debe = '';
            _found = _storePC.findBy(function(record, id) {
                if ( record.get('debe_id') == _recPC.data.pctbl_id ) {
                    if ( record.get('debe_cuenta') !== '' ) {
                        record.set('debe_monto', fjsRound(record.get('debe_monto')*1 + _comprobdet_monto*1,2) ); record.commit();
                    }
                    if ( record.get('haber_id') == poRecord.data.pctbl_id ) {
                        record.set('haber_monto', fjsRound(record.get('haber_monto')*1 + _comprobdet_monto*1,2) ); record.commit();
                        _debe = ''; return true;
                    } else {
                        _debe = _recPC.data.pctbl_id;
                    }
                }
            });
            if ( _found == '-1' ) {
                if ( _debe == '' ) {
                    _storePC.add({ haber_id: _recPC.data.pctbl_id, pctbl_cuenta: _recPC.data.pctbl_cuenta, haber_cuenta: _recPC.data.pctbl_cuenta, haber_nombre: _recPC.data.pctbl_nombre, haber_monto: _comprobdet_monto,
                                   debe_id: poRecord.data.pctbl_id, debe_cuenta: poRecord.data.pctbl_cuenta, debe_nombre: poRecord.data.pctbl_nombre, debe_monto: _comprobdet_monto });
                } else {
                    _storePC.add({ haber_id: _recPC.data.pctbl_id, pctbl_cuenta: _recPC.data.pctbl_cuenta, 
                                   debe_id: poRecord.data.pctbl_id, debe_cuenta: poRecord.data.pctbl_cuenta, debe_nombre: poRecord.data.pctbl_nombre, debe_monto: _comprobdet_monto });
                }
            }
            _storePC.sort('pctbl_cuenta', 'ASC');

            if ( poRecord.data.tablex == '104' ) {
                Ext.Ajax.request({
                    method: 'POST', url: 'php/treasury_cuentas_bancarias_movimientos_nexos_json_records.php',
                    params: { xxCuebancmov_id: poRecord.data.tabley_id,  xxType_record: 'grid_espedet_sum', xxOrder_by: 'espedet_codigo' },
                    success : function(response, options) {
                        var _result = Siace.util.Util.decodeJSON(response.responseText);
                        if ( _result.success ) { 
                            for (var _j=0; _j < _result.data.length; _j++) {
                                _found = _storeED.findBy(function(record, id) {
                                    if ( record.get('espedet_id') == _result.data[_j].espedet_id ) {
                                        record.set('comprobespedet_monto', fjsRound(record.get('comprobespedet_monto')*1 + _result.data[_j].espedet_monto*1,2) );
                                        record.set('comprobespedet_monto_igv', fjsRound(record.get('comprobespedet_monto_igv')*1 + _result.data[_j].espedet_monto_igv*1,2) ); record.commit();
                                        return true;
                                    }
                                });
                                if ( _found == '-1' ) {
                                    _storeED.add({ espedet_id: _result.data[_j].espedet_id, espedet_codigo: _result.data[_j].espedet_codigo, espedet_nombre: _result.data[_j].espedet_nombre, comprobespedet_monto: _result.data[_j].espedet_monto, comprobespedet_monto_igv: _result.data[_j].espedet_monto_igv });
                                }
                            }
                        }
                    },
                    failure : function(response, options) { }
                });
            } else {
                _found = _storeED.findBy(function(record, id) {
                    if ( record.get('espedet_id') == poRecord.data.espedet_id ) {
                        record.set('comprobespedet_monto', fjsRound(record.get('comprobespedet_monto')*1 + _comprobdet_monto*1,2) ); record.commit();
                        return true;
                    }
                });
                if ( _found == '-1' ) {
                    _storeED.add({ espedet_id: poRecord.data.espedet_id, espedet_codigo: poRecord.data.espedet_codigo, espedet_nombre: poRecord.data.espedet_nombre, comprobespedet_monto: _comprobdet_monto });
                }
            }
            _storeED.sort('espedet_codigo', 'ASC');
        //}
        return true;
}

function fexttre_conceptosFilter(poParam) {
    var _obj = poParam['objeto'];
    var _type_record = (poParam['type_record'] == undefined ? 'combo_codename' : poParam['type_record']);
    var _type_query = (poParam['type_query'] == undefined ? '' : poParam['type_query']);
    var _order_by = (poParam['order_by'] == undefined ? '' : poParam['order_by']);    
    var _add_blank = (poParam['add_blank'] == undefined ? 'YES' : poParam['add_blank']);
    var _disabled = (poParam['disabled'] == undefined ? false : poParam['disabled']);
    var _setValue = (poParam['setValue'] == undefined ? true : poParam['setValue']);
    var _length = (_add_blank == 'YES' ? 1 : 0);

    if ( _obj.getStore().storeId == 'ext-empty-store' ) { _obj.bindStore(Ext.create('Siace.store.treasury.Conceptos')); }
    _obj.getStore().load({
        params: { xxType_record: _type_record, xxType_query: _type_query, xxOrder_by: _order_by, xxAdd_blank: _add_blank },
        callback: function(records, operations, success) {
            if ( (records.length > _length) && _setValue ) { _obj.setDisabled(_disabled); _obj.setValue(records[0].data.concp_id); }
            else if ( records.length > _length ) { _obj.setDisabled(_disabled); }
            else { _obj.disable();  _obj.setValue(''); }
        }
    });
}

function fexttre_cuentas_bancariasFilter(poParam) {
    var _obj = poParam['objeto'];
    var _type_record = (poParam['type_record'] == undefined ? 'combo_codename' : poParam['type_record']);
    var _type_query = (poParam['type_query'] == undefined ? '' : poParam['type_query']);
    var _order_by = (poParam['order_by'] == undefined ? '' : poParam['order_by']);    
    var _add_blank = (poParam['add_blank'] == undefined ? 'YES' : poParam['add_blank']);
    var _disabled = (poParam['disabled'] == undefined ? false : poParam['disabled']);
    var _setValue = (poParam['setValue'] == undefined ? true : poParam['setValue']);
    var _length = (_add_blank == 'YES' ? 1 : 0);

    if ( _obj.getStore().storeId == 'ext-empty-store' ) { _obj.bindStore(Ext.create('Siace.store.treasury.Cuentas_Bancarias')); }
    _obj.getStore().load({ 
        params: { xxType_record: _type_record, xxType_query: _type_query, xxOrder_by: _order_by, xxAdd_blank: _add_blank },
        callback: function(records, operations, success) {
            if ( (records.length > _length) && _setValue ) { _obj.setDisabled(_disabled); _obj.setValue(records[0].data.cuebanc_key); }
            else if ( records.length > _length ) { _obj.setDisabled(_disabled); }
            else { _obj.disable();  _obj.setValue(''); }
        }
    });
}