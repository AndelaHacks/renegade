var url = prompt("What is the page url");

var a = ["bbc.com", "citizentv.co.ke", "ntv.nation.co.ke", "edgar.html", "david.html", "kamula.html"];


if(url=="edgar.html" || url=="david.html" || url=="kamula.html" || url=="bbc.com" || url=="citizentv.co.ke" || url=="ntv.nation.co.ke"){
  alert("This is a trusted source");
} else {
  alert("Not a trusted source!");
}
