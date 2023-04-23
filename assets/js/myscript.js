const flashData = $(".flash-data").data("flashdata");

if (flashData) {
	Swal.fire({
		icon: "success",
		title: "This Data",
		text: "Successfully" + flashData,
	});
}

// buttom delete
$(".buttom-delete").on("click", function (e) {
	e.preventDefault();
	const href = $(this).attr("href");

	Swal.fire({
		title: "Are you sure?",
		text: "This data will be deleted!",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Yes, delete it!",
	}).then((result) => {
		if (result.isConfirmed) {
			document.location.href = href;
		}
	});
});

// buttom edit
$(".buttom-edit").on("click", function (e) {
	e.preventDefault();
	const href = $(this).attr("href");

	Swal.fire({
		title: "Do you want to save the changes?",
		showDenyButton: true,
		showCancelButton: true,
		confirmButtonText: "Save",
		denyButtonText: `Don't save`,
	}).then((result) => {
		/* Read more about isConfirmed, isDenied below */
		if (result.isConfirmed) {
			document.location.href = href;
			Swal.fire("Saved!", "", "success");
		} else if (result.isDenied) {
			Swal.fire("Changes are not saved", "", "info");
		}
	});
});

// buttom logout
$(".buttom-logout").on("click", function (e) {
	e.preventDefault();
	const href = $(this).attr("href");

	const swalWithBootstrapButtons = Swal.mixin({
		customClass: {
			confirmButton: "btn btn-success",
			cancelButton: "btn btn-danger mr-3",
		},
		buttonsStyling: false,
	});

	swalWithBootstrapButtons
		.fire({
			title: "Are you sure?",
			text: "You won't be able to revert this!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonText: "Yes, Logout",
			cancelButtonText: "No, cancel!",
			reverseButtons: true,
		})
		.then((result) => {
			if (result.isConfirmed) {
				document.location.href = href;
				swalWithBootstrapButtons.fire("Logout!", "See you again.", "success");
			} else if (
				/* Read more about handling dismissals below */
				result.dismiss === Swal.DismissReason.cancel
			) {
				swalWithBootstrapButtons.fire(
					"Cancelled",
					"Your imaginary file is safe :)",
					"error"
				);
			}
		});
});
