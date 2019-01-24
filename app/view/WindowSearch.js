Ext.define('Siace.view.WindowSearch',{extend:'Ext.window.Window',alias:'widget.windowsearch',requires:['Siace.view.toolbar.OkCancelExit',],autoScroll:true,closeAction:'hide',closable:false,iconCls:'icon_Search_90',layout:{type:'fit'},modal:true,resizable:false,dockedItems:[{xtype:'okcancelexit'}],__actionDestroy:false,__callId:0,__callKey:'',__callWindow:null,__typeSearch:'',__typeRecord:'',__typeQuery:'',__typeReturn:'',
setActionDestroy:function(pcActionDestroy){this.__actionDestroy=pcActionDestroy;},getActionDestroy:function(){return this.__actionDestroy;},
setCallId:function(pcCallId){this.__callId=pcCallId;},getCallId:function(){return this.__callId;},
setCallKey:function(pcCallKey){this.__callKey=pcCallKey;},getCallKey:function(){return this.__callKey;},
setCallWindow:function(pcCallWindow){this.__callWindow=pcCallWindow;},getCallWindow:function(){return this.__callWindow;},
setTypeSearch:function(pcTypeSearch){this.__typeSearch=pcTypeSearch;},getTypeSearch:function(){return this.__typeSearch;},
setTypeRecord:function(pcTypeRecord){this.__typeRecord=pcTypeRecord;},getTypeRecord:function(){return this.__typeRecord;},
setTypeQuery:function(pcTypeQuery){this.__typeQuery=pcTypeQuery;},getTypeQuery:function(){return this.__typeQuery;},
setTypeReturn:function(pcTypeReturn){this.__typeReturn=pcTypeReturn;},getTypeReturn:function(){return this.__typeReturn;}
});