$(document).ready(function(){

	//hide- show
	$(".addnew").click(function(){

    var title = prompt("Title", "My new task");
    var description = prompt("Description", "About my day");
    //var person = prompt("Title", "My new task");
    
    if (title!= null) {
        document.getElementById("title").innerHTML = title;
        document.getElementById("description").innerHTML = description;
    }
	})
})