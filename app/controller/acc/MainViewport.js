Ext.define("Siace.controller.acc.MainViewport",{extend:"Ext.app.Controller",views:["acc.MainViewport"],
init:function(application){this.control({"acc_mainviewport #ah_btnKeyGo":{click:this.amv_ah_btnKeyGoClick}});},
amv_ah_btnKeyGoClick:function(btn,e,opt){var _win=Ext.create("Siace.view.acc.Login"); _win.show();},
});