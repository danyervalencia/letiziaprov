Ext.define('Siace.view.WindowEdit',{extend:'Ext.window.Window',alias:'widget.windowform',requires:['Siace.view.tool.SaveUndoExit'],closable:false,frame:true,layout:{type:'fit'},modal:true,resizable:false,dockedItems:[{xtype:'saveundoexit'}],__menuId:'',__callId:0,__callKey:'',__callStore:null,__callWindow:null,__typeEdit:'',__typeQuery:'',__typeReturn:'',
setMenuId:function(pcMenuId){this.__menuId=pcMenuId;},getMenuId:function(){return this.__menuId;},
setCallId:function(pcCallId){this.__callId=pcCallId;},getCallId:function(){return this.__callId;},
setCallKey:function(pcCallKey){this.__callKey=pcCallKey;},getCallKey:function(){return this.__callKey;},
setCallStore:function(pcCallStore){this.__callStore=pcCallStore;},getCallStore:function(){return this.__callStore;},
setCallWindow:function(pcCallWindow){this.__callWindow=pcCallWindow;},getCallWindow:function(){return this.__callWindow;},
setTypeEdit:function(pcTypeEdit){this.__typeEdit=pcTypeEdit;},getTypeEdit:function(){return this.__typeEdit;},
setTypeQuery:function(pcTypeQuery){this.__typeQuery=pcTypeQuery;},getTypeQuery:function(){return this.__typeQuery;},
setTypeReturn:function(pcTypeReturn){this.__typeReturn=pcTypeReturn;},getTypeReturn:function(){return this.__typeReturn;}
});