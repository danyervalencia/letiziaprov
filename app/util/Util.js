Ext.define("Siace.util.Util",{
	statics:{required:'<span style="color:red;font-weight:bold" data-qtip="Required">*</span>',
		decodeJSON:function(text){var _res=Ext.JSON.decode(text,true); // segundo parametro true es para silenciar mensaje exception
			if(!_res){_res={};_res.success=false;_res.msg=text;} return _res;
		},
		showErrorMsg:function(text){Ext.Msg.show({title:"Error!",msg:text,icon:Ext.Msg.ERROR,buttons:Ext.Msg.OK});}
	}
});