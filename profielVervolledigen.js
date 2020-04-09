let loadFile = function(event) {
	let image = document.getElementById('output');
	image.src = URL.createObjectURL(event.target.files[0]);
};

let year = document.querySelector("#year");

year.addEventListener("change", function(){

	if(year.value == "1IMD"){
		console.log("newb");
	}

});

