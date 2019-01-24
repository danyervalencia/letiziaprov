Ext.define("Siace.view.tool.CapsLockTooltip",{extend:"Ext.tip.QuickTip",alias:"widget.tool_capslocktooltip",anchor:"top",anchorOffset:60,width:270,dismissDelay:0,autoHide:false,
    title:"<div class='capslock'>"+trnslt.toolbar_capslocktooltip_title+"</div>",
    html:"<div>"+trnslt.toolbar_capslocktooltip_msg1+"</div><div></div>"+"<div>"+trnslt.toolbar_capslocktooltip_msg2+"</div>"
});