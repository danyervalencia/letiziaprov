var _lang=(localStorage?(localStorage.getItem("user-lang")||"es"):"es");
var _file = "trnslt/es_.js";//var _file = "trnslt/"+_lang+".js";
var _extjsFile="extjs/locale/ext-lang-"+_lang+".js";
document.write("<script type='text/javascript' src='"+_file+"'></script>");
document.write("<script type='text/javascript' src='"+_extjsFile+"'></script>");