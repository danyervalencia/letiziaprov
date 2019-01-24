function fjsPrinterVentas(poRecord, poDetalle) {
    if ( poRecord.doc_id == '1' ) {
        var _table = ''
        _table = '<table class="tbl501" border="0">';
        _table += '<tr>'
        _table += '<td class="lbl503" style="width:60px; height:10px;"></td>';
        _table += '<td class="lbl503" style="width:10px;"></td>';
        _table += '<td class="lbl503" style="width:400px;"></td>';
        _table += '<td class="lbl503" style="width:40px;"></td>';
        _table += '<td class="lbl503" style="width:50px;"></td>';
        _table += '<td class="lbl503" style="width:100px;"></td>';
        _table += '<td class="lbl503" style="width:80px;"></td>';
        _table += '</tr>';

        _table += '<tr>'
        _table += '<td class="lbl501" style="height:35px;" colspan=5></td>';
        _table += '<td class="lbl501" style="height:35px;" height:1px; colspan=2>' +poRecord.vent_documento+ '</td>';
        _table += '</tr>';

        _table += '<tr>'
        _table += '<td class="lbl501" height:1px; colspan=2></td>';
        _table += '<td class="lbl501" height:1px; height:20px;>' +poRecord.pers_nombre+ '</td>';
        _table += '</tr>';

        _table += '<tr>'
        _table += '<td class="lbl501" height:1px; colspan=2></td>';
        _table += '<td class="lbl501" height:1px; height:20px;>' +poRecord.pers_domicilio+ '</td>';
        _table += '</tr>';

        _table += '<tr>'
        _table += '<td class="lbl501" height:1px; colspan=2></td>';
        _table += '<td class="lbl501" height:1px; colspan=2>' +poRecord.pers_ruc+ '</td>';
        _table += '<td class="lbl501" height:1px;>'+poRecord.vent_fecha.substr(8,2)+'</td>';
        _table += '<td class="lbl501" height:1px;>'+fjsDateMonthName(poRecord.vent_fecha.substr(5,2))+'</td>';
        _table += '<td class="lbl501" height:1px;>'+poRecord.vent_fecha.substr(0,4)+'</td>';
        _table += '</tr>';

        _table += '<tr>'
        _table += '<td class="lbl503" style="height:1px;"></td>';
        _table += '</tr></table>'
        _table += '<br>'

        _table += '<table class="tbl501" border="0">';
        _table += '<tr>'
        _table += '<td class="lbl503" style="width:55px; height:1px;"></td>';
        _table += '<td class="lbl503" style="width:5px;"></td>';
        _table += '<td class="lbl503" style="width:560px;"></td>';
        _table += '<td class="lbl503" style="width:60px;"></td>';
        _table += '<td class="lbl503" style="width:90px;"></td>';
        _table += '</tr>';

        for (var _i=0; _i < poDetalle.length; _i++) {
            _table += '<tr>'
            _table += '<td class="lbl503">'+poDetalle[_i].ventdet_cantid+'</td>';
            _table += '<td class="lbl503"></td>';
            _table += '<td class="lbl501"> \xa0'+poDetalle[_i].bs_nombre.substr(0,70)+'</td>';
            _table += '<td class="lbl503">'+fjsFormatNumeric(poDetalle[_i].ventdet_preuni, 2)+'</td>';
            _table += '<td class="lbl503">'+fjsFormatNumeric(poDetalle[_i].ventdet_pretot, 2)+'</td>';
            _table += '</tr>';
        }
        if ( _i*1 < 12 ) {
            for (var _y=0; _y < (12-_i); _y++) {
            _table += '<tr>'
            _table += '<td class="lbl503">\xa0</td>';
            _table += '</tr>';
            }
        }
        _table += '<tr>'
        _table += '<td class="lbl503" colspan=2></td>';
        _table += '<td class="lbl501" colspan=3> \xa0SON: '+poRecord.vent_monto_letras+' \xa0'+poRecord.mone_nombre+'</td>';
        _table += '</tr>';

        var _vventa = fjsRound((poRecord.vent_monto*1 - poRecord.vent_monto_inafecto*1) / (poRecord.tribval_contable*1), 2)*1 + poRecord.vent_monto_inafecto*1;
        var _igv = fjsRound(poRecord.vent_monto*1 - _vventa*1, 2);
        _table += '<tr>'
        _table += '<td class="lbl503" colspan=3></td>';
        _table += '<td class="lbl503">'+poRecord.mone_abrev+'</td>';
        _table += '<td class="lbl503">'+fjsFormatNumeric(_vventa,2)+'</td>';
        _table += '</tr>';

        _table += '<tr>'
        _table += '<td class="lbl503" colspan=3></td>';
        _table += '<td class="lbl503">'+fjsRound((poRecord.tribval_contable*1 -1)*100,0)+'%'+'</td>';
        _table += '<td class="lbl503">'+fjsFormatNumeric(_igv,2)+'</td>';
        _table += '</tr>';

        _table += '<tr>'
        _table += '<td class="lbl503" colspan=3></td>';
        _table += '<td class="lbl503">'+poRecord.mone_abrev+'</td>';
        _table += '<td class="lbl503">'+fjsFormatNumeric(poRecord.vent_monto,2)+'</td>';
        _table += '</tr>';

        _table += '</table>';
    } else if ( poRecord.doc_id == '3' ) {
        var _table = ''
        _table = '<table class="tbl501" border="0">';
        _table += '<tr>'
        _table += '<td class="lbl503" style="width:70px; height:50px;"></td>';
        _table += '<td class="lbl503" style="width:400px;"></td>';
        _table += '<td class="lbl503" style="width:40px;"></td>';
        _table += '<td class="lbl503" style="width:50px;"></td>';
        _table += '<td class="lbl503" style="width:100px;"></td>';
        _table += '<td class="lbl503" style="width:80px;"></td>';
        _table += '</tr>';

        _table += '<tr>'
        _table += '<td class="lbl501" colspan=4></td>';
        _table += '<td class="lbl501" colspan=2>' +poRecord.vent_documento+ '</td>';
        _table += '</tr>';

        _table += '<tr>'
        _table += '<td class="lbl501" style="height:10px;"></td>';
        _table += '</tr>';

        _table += '<tr>'
        _table += '<td class="lbl501"></td>';
        _table += '<td class="lbl501" style="height:20px;">' +poRecord.pers_nombre+ '</td>';
        _table += '</tr>';

        _table += '<tr>'
        _table += '<td class="lbl501"></td>';
        _table += '<td class="lbl501"style="height:20px;">' +poRecord.pers_domicilio+ '</td>';
        _table += '</tr>';

        _table += '<tr>'
        _table += '<td class="lbl501"></td>';
        _table += '<td class="lbl501" colspan=2>' +(poRecord.pers_ruc == '' ? '' : 'DNI: '+poRecord.pers_ruc)+ '</td>';
        _table += '<td class="lbl501">'+poRecord.vent_fecha.substr(8,2)+'</td>';
        _table += '<td class="lbl501">'+fjsDateMonthName(poRecord.vent_fecha.substr(5,2))+'</td>';
        _table += '<td class="lbl501">'+poRecord.vent_fecha.substr(0,4)+'</td>';
        _table += '</tr>';

        _table += '<tr>'
        _table += '<td class="lbl503" style="height:1px;"></td>';
        _table += '</tr></table>'
        _table += '<br>'

        _table += '<table class="tbl501" border="0">';
        _table += '<tr>'
        _table += '<td class="lbl503" style="width:55px; height:1px;"></td>';
        _table += '<td class="lbl503" style="width:5px;"></td>';
        _table += '<td class="lbl503" style="width:560px;"></td>';
        _table += '<td class="lbl503" style="width:60px;"></td>';
        _table += '<td class="lbl503" style="width:90px;"></td>';
        _table += '</tr>';

        for (var _i=0; _i < poDetalle.length; _i++) {
            _table += '<tr>'
            _table += '<td class="lbl503">'+poDetalle[_i].ventdet_cantid+'</td>';
            _table += '<td class="lbl503"></td>';
            _table += '<td class="lbl501"> \xa0'+poDetalle[_i].bs_nombre.substr(0,70)+'</td>';
            _table += '<td class="lbl503">'+fjsFormatNumeric(poDetalle[_i].ventdet_preuni, 2)+'</td>';
            _table += '<td class="lbl503">'+fjsFormatNumeric(poDetalle[_i].ventdet_pretot, 2)+'</td>';
            _table += '</tr>';
        }
        if ( _i*1 < 12 ) {
            for (var _y=0; _y < (12-_i); _y++) {
            _table += '<tr>'
            _table += '<td class="lbl503">\xa0</td>';
            _table += '</tr>';
            }
        }

        _table += '<tr>'
        _table += '<td class="lbl503" style="height:5px;"></td>';
        _table += '</tr>';

        _table += '<tr>'
        _table += '<td class="lbl503" colspan=3></td>';
        _table += '<td class="lbl503">'+poRecord.mone_abrev+'</td>';
        _table += '<td class="lbl503">'+fjsFormatNumeric(poRecord.vent_monto,2)+'</td>';
        _table += '</tr>';

        _table += '</table>';
    }
    return _table;
}