Ext.define('Siace.view.WindowBrowse',{extend:'Ext.window.Window',alias:'widget.windowbrowse',closable:false,layout:{type:'fit'},modal:true,resizable:false,__menuId:'',__actionDestroy:false,__callKey:'',__callWindow:null,__typeQuery:'',__typeQuery:'',__typeReturn:'',
setMenuId:function(pcMenuId){this.__menuId=pcMenuId;},getMenuId:function(){return this.__menuId;},
setActionDestroy:function(pcActionDestroy){this.__actionDestroy=pcActionDestroy;},getActionDestroy:function(){return this.__actionDestroy;},
setCallKey:function(pcCallKey){this.__callKey=pcCallKey;},getCallKey:function(){return this.__callKey;},
setCallWindow:function(pcCallWindow){this.__callWindow=pcCallWindow;},getCallWindow:function(){return this.__callWindow;},
setTypeQuery:function(pcTypeQuery){this.__typeQuery=pcTypeQuery;},getTypeQuery:function(){return this.__typeQuery;},
setTypeReturn:function(pcTypeReturn){this.__typeReturn=pcTypeReturn;},getTypeReturn:function(){return this.__typeReturn;}
});