Ext.define('Siace.controller.pub.PaisDptoPrvnDstt',{extend: 'Ext.app.Controller',views:['pub.PaisDptoPrvnDstt'],
init:function(application){this.control({
'pub_paisdptoprvndstt':{loaddata:this.ppdpd_LoadData},
'pub_paisdptoprvndstt #dpto_id':{blur:this.ppdpd_dpto_idBlur,focus:this.ppdpd_dpto_idFocus},
'pub_paisdptoprvndstt #pais_id':{blur:this.ppdpd_pais_idBlur,change:this.ppdpd_pais_idChange,focus:this.ppdpd_pais_idFocus},
'pub_paisdptoprvndstt #prvn_id':{blur:this.ppdpd_prvn_idBlur,focus:this.ppdpd_prvn_idFocus}
});},
ppdpd_LoadData:function(poComp,pbDisabled,pnPais_id,pnDpto_id,pnPrvn_id,pnDstt_id){
poComp.down('#pais_id').setValue(pnPais_id*1); poComp.down('#pais_id').setDisabled(pbDisabled); var _cboDI=poComp.down('#dpto_id');
_cboDI.getStore().load({params:{xxPais_id:pnPais_id,xxType_record:'combo',xxAdd_blank:'YES'},
callback:function(record,operation,success){
	if(_cboDI.getStore().getCount()>1){_cboDI.setDisabled(pbDisabled);_cboDI.setValue(pnDpto_id*1);}else{_cboDI.disable();_cboDI.setValue('');}
	if(pnDpto_id*1>0){ var _cboPI=poComp.down('#prvn_id');
		_cboPI.getStore().load({params:{xxDpto_id:pnDpto_id,xxType_record:'combo',xxAdd_blank:'YES'},
		callback:function(records,operation,success){
			if(records.length>0){_cboPI.setDisabled(pbDisabled);_cboPI.setValue(pnPrvn_id*1);}else{_cboPI.disable();_cboPI.setValue('');}
			if(pnPrvn_id*1>0){var _cboDS=poComp.down('#dstt_id');
				_cboDS.getStore().load({params:{xxPrvn_id:pnPrvn_id,xxType_record:'combo',xxAdd_blank:'YES'},
				callback:function(record,operation,success){
					if(records.length>0){_cboDS.setDisabled(pbDisabled);_cboDS.setValue(pnDstt_id*1);}else{_cboDS.disable();_cboDS.setValue('');}
					if(pbDisabled==false){poComp.setChangeEnabled(true);}
				}});
			}else{if(pbDisabled==false){poComp.setChangeEnabled(true);}}
		}});
	}else{if(pbDisabled==false){poComp.setChangeEnabled(true);}}
}});
},
ppdpd_dpto_idBlur:function(combo,The,options){if(combo.getValue()!=combo.setValueTag()){this.ppdpd_dpto_idChangePrvn(combo.up('container').up('container'),combo.getValue());}},
ppdpd_dpto_idFocus:function(combo,The,options){combo.setValueTag(combo.getValue());},
ppdpd_dpto_idChangePrvn:function(poContainer,pnDpto_id){
var _cboPI=poContainer.down('#prvn_id');
if(pnDpto_id*1>0){
	_cboPI.getStore().load({params:{xxDpto_id:pnDpto_id,xxType_record:'combo',xxAdd_blank:'YES'},
	callback:function(records,operation,success){
		if(records.length>0){_cboPI.enable();_cboPI.setValue(records[0].data.prvn_id);}else{_cboPI.disable();_cboPI.setValue('');}
	}});_cboPI.enable();
}else{_cboPI.getStore().removeAll();_cboPI.setValue('');_cboPI.disable();}
var _cboDS=poContainer.down('#dstt_id');_cboDS.getStore().removeAll();_cboDS.setValue('');_cboDS.disable();
},
ppdpd_prvn_idBlur:function(combo,The,options){if(combo.getValue()!=combo.setValueTag()){this.ppdpd_prvn_idChangeDstt(combo.up('container').up('container'),combo.getValue());}},
ppdpd_prvn_idFocus:function(combo,The,options){combo.setValueTag(combo.getValue());},
ppdpd_prvn_idChangeDstt:function(poContainer,pnPrvn_id){
var _cboDS=poContainer.down('#dstt_id');
if(pnPrvn_id*1>0){
	_cboDS.getStore().load({params:{xxPrvn_id:pnPrvn_id,xxType_record:'combo',xxAdd_blank:'YES'},
	callback:function(records,operation,success){
		if(records.length>0){_cboDS.enable();_cboDS.setValue(records[0].data.dstt_id);}else{_cboDS.disable();_cboDS.setValue('');}
	}});_cboDS.enable();
}else{_cboDS.getStore().removeAll();_cboDS.setValue('');_cboDS.disable();}
},
ppdpd_pais_idBlur:function(combo,The,options){if(combo.getValue()!=combo.setValueTag()){this.ppdpd_pais_idChangeDpto(combo.up('container').up('container'),combo.getValue());}},
ppdpd_pais_idFocus:function(combo,The,options){combo.setValueTag(combo.getValue());},
ppdpd_pais_idChange:function(combo,newValue,oldValue,options){
var _container=combo.up('container').up('container');
if(oldValue==undefined&&_container.getChangeEnabled()==true){_container.setChangeEnabled(false);this.ppdpd_pais_idChangeDpto(_container, newValue);}
},
ppdpd_pais_idChangeDpto:function(poContainer,pnPais_id){
var _cboDI=poContainer.down('#dpto_id');
_cboDI.getStore().load({params:{xxPais_id:pnPais_id,xxType_record:'combo',xxAdd_blank:'YES'},
callback:function(records,operation,success){
	if(records.length>0){_cboDI.enable();_cboDI.setValue(records[0].data.dpto_id);}else{_cboDI.disable();_cboDI.setValue('');}
}});
var _cboPI=poContainer.down('#prvn_id'); _cboPI.getStore().removeAll(); _cboPI.setValue(''); _cboPI.disable();
var _cboDS=poContainer.down('#dstt_id'); _cboDS.getStore().removeAll(); _cboDS.setValue(''); _cboDS.disable();
}
});