let currentStep = 0;
let step = document.getElementsByClassName("step");
let prevBtn = document.getElementById("prev-btn");
let nextBtns = document.querySelectorAll("#next-btn");
let form = document.getElementsByTagName("form")[0];
let preloader = document.getElementById("preloader-wrapper");
let bodyElement = document.querySelector("body");
let successDiv = document.getElementById("success");
let progressBar = document.querySelector(".progress-bar");

function showStep(n) {
	Array.from(step).forEach((el, i) => {
		el.style.display = i === n ? "block" : "none";
	});
	progressBar.style.width = `${((n + 1) / step.length) * 100}%`;
	prevBtn.style.display = n === 0 ? "none" : "inline";
	nextBtns.forEach(
		(btn) => (btn.style.display = n === step.length - 1 ? "none" : "inline")
	);
}

function validateStep() {
	let inputFields = step[currentStep].getElementsByTagName("input");
	let isValid = true;
	Array.from(inputFields).forEach((el) => {
		if (el.value === "") {
			el.classList.add("is-invalid");
			isValid = false;
		} else {
			el.classList.remove("is-invalid");
			if (
				[
					"nomoridentitas",
					"nomoridentitaskt",
					"nomoridentitaspb",
					"nomorkkpb",
				].includes(el.id)
			) {
				let inputVal = el.value.replace(/\D/g, "");
				if (inputVal.length < 16) {
					el.classList.add("is-invalid");
					isValid = false;
				} else {
					el.classList.remove("is-invalid");
				}
			}
		}
	});
	return isValid;
}

function nextStep() {
	if (validateStep()) {
		showStep(++currentStep);
		if (currentStep === step.length) {
			preloader.style.display = "block";
			bodyElement.classList.add("overlay");
			setTimeout(function () {
				preloader.style.display = "none";
				bodyElement.classList.remove("overlay");
				successDiv.style.display = "block";
				Array.from(step).forEach((el) => {
					el.style.display = "none";
				});
			}, 1000);
		}
	}
}
function prevStep() {
	showStep(--currentStep);
}

nextBtns.forEach((btn) => {
	btn.addEventListener("click", function (e) {
		e.preventDefault();
		nextStep();
	});
});

prevBtn.addEventListener("click", function (e) {
	e.preventDefault();
	prevStep();
});

form.addEventListener("submit", function (e) {
	e.preventDefault();
	if (validateStep()) {
		setTimeout(function () {
			preloader.style.display = "block";
			bodyElement.classList.add("overlay");
			var xhr = new XMLHttpRequest();
			xhr.open("POST", "proposaladd");
			xhr.onload = function () {
				setTimeout(function () {
					preloader.style.display = "none";
					bodyElement.classList.remove("overlay");
					successDiv.style.display = "block";
					Array.from(step).forEach((el) => {
						el.style.display = "none";
					});
				}, 7000); // menambahkan delay 7 detik sebelum menampilkan div success
			};
			xhr.send(new FormData(form)); // Mengirim data form menggunakan objek FormData langsung pada xhr.send()
		});
	}
});

showStep(currentStep);

// radio button
const radioInputs = document.querySelectorAll('input[type="radio"]');

radioInputs.forEach((input) => {
	input.addEventListener("change", (e) => {
		const selectedValue = e.target.value;
		const inputContainer = e.target
			.closest(".step")
			.querySelector(".input-container input");
		inputContainer.value = selectedValue;
	});
});

// Memunculkan icon X saat upload Foto
const fileInputs = document.querySelectorAll(
	"input[name='fotoidentitas'], input[name='fotoidentitaskm'], input[name='fotoidentitaskt'], input[name='fotoidentitaspb'], input[name='fotokkpb']"
);
const fileRemoveIcons = document.querySelectorAll(".input-group-text i");

fileInputs.forEach(function (fileInput, index) {
	fileInput.addEventListener("change", function () {
		if (fileInput.value) {
			fileRemoveIcons[index].classList.remove("d-none");
		} else {
			fileRemoveIcons[index].classList.add("d-none");
		}
	});

	fileRemoveIcons[index].addEventListener("click", function () {
		fileInput.value = "";
		fileRemoveIcons[index].classList.add("d-none");
	});
});

// preview image
const inputElement = document.querySelector('input[name="filedokumentasi[]"]');
const previewElement = document.querySelector("#preview");

inputElement.addEventListener("change", (event) => {
	const files = event.target.files;

	for (let i = 0; i < files.length; i++) {
		const file = files[i];
		const reader = new FileReader();

		reader.onload = (e) => {
			const imgElement = document.createElement("img");
			imgElement.src = e.target.result;

			const deleteBtn = document.createElement("button");
			deleteBtn.innerHTML = "X";
			deleteBtn.classList.add("delete-btn");
			deleteBtn.addEventListener("click", () => {
				imgElement.remove();
				deleteBtn.remove();
			});

			const imageContainer = document.createElement("div");
			imageContainer.classList.add("image-container");
			imageContainer.appendChild(imgElement);
			imageContainer.appendChild(deleteBtn);

			previewElement.appendChild(imageContainer);
		};

		reader.readAsDataURL(file);
	}
});
