let loadFile = function(event) {
	let image = document.getElementById('output');
	image.src = URL.createObjectURL(event.target.files[0]);
};

//   Code hieronder is om begeleider optie te verbergen als je een eerstejaars bent

/*let year = document.querySelector("#year");

year.addEventListener("change", function(){

	if(year.value == "1IMD"){
		console.log("newb");
	}

});*/

