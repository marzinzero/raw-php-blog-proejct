//wow jqeury plugin init hrere...
new WOW().init();

//custom coding

function contactcheck(){
var name = document.forms['']("name").value;
var email = document.getElementById("email").value;
var age = document.getElementById("age").value;
var msg = document.getElementById("msg").value;

//send button 
var snd = document.querySelector("#send");

snd.addEvenetListener("click",function(){

	if (name == "" || email == "" || age == "" || msg == "")
	{
		document.write("Filed must not be empty");
	}
});
}