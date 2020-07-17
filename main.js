btnClear = document.getElementById("idClear");
btnClear.addEventListener('click', clear);

btnEdit = document.getElementsByName("edit");

for (let i = 0; i < btnEdit.length; i++) {
	btnEdit[i].addEventListener('click', () => {
		clear()
		info = document.querySelectorAll(".t" + btnEdit[i].id);
		textValues = []
		for (let i = 0; i < info.length; i++) 
			textValues.push(info[i].innerHTML);

		localStorage.setItem("id", btnEdit[i].id);
		localStorage.setItem("first", textValues[0]);
		localStorage.setItem("last", textValues[1]);
		localStorage.setItem("email", textValues[2]);
		
		let phone = textValues[3];
		let txtPhone = ''
		for (let j = 0; j < phone.length; j++)
			if (!isNaN(parseInt(phone[j])) && isFinite(phone[j]))
				txtPhone += phone[j]

		localStorage.setItem("phone", txtPhone);


		localStorage.setItem("location", textValues[4]);
		localStorage.setItem("job", textValues[5]);
	})
}

btnDelete = document.getElementsByName("delete");

for (let i = 0; i < btnDelete.length; i++)
	btnDelete[i].addEventListener('click', () => {
		inputId = document.getElementById("id");
		inputId.value = btnDelete[i].id
	})


function load() {
	let first = document.getElementById("idFirst");
	let last = document.getElementById("idLast")
	let email = document.getElementById("idEmail");
	let phone = document.getElementById("idPhone");
	let location = document.getElementById("idLocation");
	let job = document.getElementById("idJob");

	first.value = localStorage.getItem("first");
	last.value = localStorage.getItem("last");
	email.value = localStorage.getItem("email");
	phone.value = localStorage.getItem("phone");
	location.value = localStorage.getItem("location");
	job.value = localStorage.getItem("job");
}

function setData() {
	localStorage.setItem("first", document.getElementById("idFirst").value);
	localStorage.setItem("last", document.getElementById("idLast").value);
	localStorage.setItem("email", document.getElementById("idEmail").value);
	localStorage.setItem("phone", document.getElementById("idPhone").value);
	localStorage.setItem("location", document.getElementById("idLocation").value);
	localStorage.setItem("job", document.getElementById("idJob").value);
}

function clear() {
	localStorage.removeItem("first");
	localStorage.removeItem("last");
	localStorage.removeItem("email");
	localStorage.removeItem("phone");
	localStorage.removeItem("location");
	localStorage.removeItem("job");

	document.getElementById("idFirst").value = "";
	document.getElementById("idLast").value = "";
	document.getElementById("idEmail").value = "";
	document.getElementById("idPhone").value = "";
	document.getElementById("idLocation").value = "";
	document.getElementById("idJob").value = "";
}



