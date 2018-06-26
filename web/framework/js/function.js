//Variables
var menu = document.getElementById('Menu');
var body = document.getElementById('corp_section');
var menuli = '#'+menu.id+" li";

//Function Click Menu
$(menuli).click(function(){  
    var body_enfant = $("#corp_section").children(); 
    var id = "#"+$(this).attr('id')+"_pages"; 
    if (body_enfant){ body_enfant.hide();}
    $('#corp_section').append(ShowDiv(id));
})

//Hide div au double click
// $(body).dblclick(function(){
//     var div = $(this).children('div');
//     HideDiv(div);
// });

//Function Div (Hide + Show)
function HideDiv(id){ setTimeout(function(){ $(id).hide();}, 2500);}
function ShowDiv(id){ $(id).show(); }