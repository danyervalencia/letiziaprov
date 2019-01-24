Ext.define('Siace.view.PanelBrowse',{extend:'Ext.panel.Panel',layout:{type:'fit'},__formParent:null,__menuId:'',__panelMaster:null,
setFormParent:function(pcFormParent){this.__formParent=pcFormParent;},getFormParent:function(){return this.__formParent;},
setMenuId:function(pcMenuId){this.__menuId=pcMenuId;},getMenuId:function(){return this.__menuId;},
setPanelMaster:function(pcPanelMaster){this.__panelMaster=pcPanelMaster;},getPanelMaster:function(){return this.__panelMaster;}
});