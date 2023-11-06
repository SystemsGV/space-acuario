$(($) => {
	speciesJson();
	//TODO: INIT INITIALIZE TABLE //
	$.ajax({
		url: "API-EDITABLE",
		type: "GET",
		dataType: "json",
		async: false,
	})
		.done(function (rsp) {
			// Se ejecuta cuando la solicitud es exitosa
			const data = rsp.data;
			console.log(rsp);
			data.forEach((item) => {
				const row = `
                <tr>
                    <td class="text-nowrap" scope="row">${item.type_bowl} ${item.name_bowl
					}</td>
                    <td>${checkSpecies(item.species)}</td>
                    <td class="editable" data-tank="${item.tank_name
					}" data-date="hour_12_am" data-min="${item.tmp_min
					}" data-max="${item.tmp_max}">${item.hour_12_am}</td>
                    <td class="editable" data-tank="${item.tank_name
					}" data-date="hour_4_am" data-min="${item.tmp_min
					}" data-max="${item.tmp_max}">${item.hour_4_am}</td>
                    <td class="editable" data-tank="${item.tank_name
					}" data-date="hour_8_am" data-min="${item.tmp_min
					}" data-max="${item.tmp_max}">${item.hour_8_am}</td>
                    <td class="editable" data-tank="${item.tank_name
					}" data-date="hour_12_pm" data-min="${item.tmp_min
					}" data-max="${item.tmp_max}">${item.hour_12_pm}</td>
                    <td class="editable" data-tank="${item.tank_name
					}" data-date="hour_4_pm" data-min="${item.tmp_min
					}" data-max="${item.tmp_max}">${item.hour_4_pm}</td>
                    <td class="editable" data-tank="${item.tank_name
					}" data-date="hour_8_pm" data-min="${item.tmp_min
					}" data-max="${item.tmp_max}">${item.hour_8_pm}</td>
                    <td 
					}" class="editable observation-cell" data-tank="${item.tank_name
					}" data-date="observation"> ${item.observation}</td>
                </tr>
            `;
				// Asegúrate de tener una referencia a tbody
				const tbody = document.querySelector("#table-temp tbody");
				tbody.insertAdjacentHTML("beforeend", row);
			});
		})
		.fail(function (error) {
			// Se ejecuta si hay un error en la solicitud
			console.error("Error en la solicitud:", error);
		});

	//TODO: FINISH TABLE //

	const recorded = getDateTemp();
	$("#date-temp").html(recorded);

	//TODO: INIT EDITABLE */
	let isCellEdited = false;
	let editedDataTank;
	let editedCellValue;
	let editedDate;
	// Function to enable cell editing
	function enableEditing(cell) {
		$(cell).attr("contenteditable", true);

		// Save the data-tank, cell value, and date
		editedDataTank = $(cell).data("tank");
		editedCellValue = $(cell).text();
		editedDate = $(cell).data("date");
		editedMin = $(cell).data("min");
		editedMax = $(cell).data("max");

		// Focus on the cell for tablets
		$(cell).focus();
		isCellEdited = true;
	}

	// Function to disable cell editing
	function disableEditing(cell) {
		$(cell).removeAttr("contenteditable");
		isCellEdited = false;
	}

	// Save changes when clicking on another cell
	function saveChanges() {
		if (isCellEdited) {
			let postData = {
				tank: editedDataTank,
				value: editedCellValue,
				date: editedDate,
				recorded: recorded,
			};

			fetch("API-EDIT-CELL", {
				method: "POST",
				headers: {
					"Content-Type": "application/json",
				},
				body: JSON.stringify(postData),
			})
				.then((response) => {
					if (!response.ok) {
						throw new Error("La respuesta de la red no fue exitosa");
					}
					return response.json();
				})
				.then((data) => { })
				.catch((err) => {
					console.error("Error:", err);
				});
		}
	}
	// Esto ejecuta la función para cada celda editable
	$(".editable").each(function () {
		let tank = $(this).data("tank");
		let date = $(this).data("date");
		let min = $(this).data("min");
		let max = $(this).data("max");

		let value = parseFloat($(this).text());

		setBackgroundColor(this, value, min, max, 2);

		$(this).on("input", function () {
			let editedValue = parseFloat($(this).text());
			setBackgroundColor(this, editedValue, min, max, 2);
		});
	});
	// Enable editing when clicking on an editable cell
	$(".editable").click(function () {
		// Before enabling the new cell, save the changes of the current cell
		if (
			editedDataTank !== undefined &&
			editedCellValue !== undefined &&
			editedDate !== undefined
		) {
			saveChanges();
		}

		enableEditing(this);
	});

	// Detect changes and update the data
	$(".editable").on("input", function () {
		editedCellValue = $(this).text();
	});

	// When pressing Enter, disable editing of the current cell
	$(".editable").on("keypress", function (e) {
		if (e.keyCode === 13) {
			// 13 is the key code for Enter
			e.preventDefault(); // Prevent Enter from creating a new line
			saveChanges();
			disableEditing(this);
		}
	});

	// When clicking outside the cell, disable editing and save the changes
	$(document).click(function (event) {
		let target = event.target;
		if (!$(target).closest(".editable").length) {
			if (
				editedDataTank !== undefined &&
				editedCellValue !== undefined &&
				editedDate !== undefined
			) {
				saveChanges();
			}
			disableEditing($(".editable"));
		}
	});

	//TODO: FINISH EDITABLE */

	//--------------------------------------------------------------------------//
});
const checkSpecies = (i) => {
	// Get the JSON string from sessionStorage
	const speciesObjectJSON = sessionStorage.getItem("speciesJSON");
	// Convert the JSON string back to a JavaScript object
	const speciesObject = JSON.parse(speciesObjectJSON);
	if (i != "") {
		const keys = i.split(",").map(Number);
		const result = keys.map((key) => speciesObject[key]).join(", ");
		return `${result}`;
	}
	return `Sin especies`;
};

const speciesJson = () => {
	fetch("API-SPECIES")
		.then((response) => {
			if (!response.ok) {
				throw new Error("La respuesta de la red no fue exitosa");
			}
			return response.json();
		})
		.then(({ data }) => {
			let Object = {};
			data.forEach((item) => {
				Object[item.id_specie] = item.common_specie;
			});

			let ObjectJSON = JSON.stringify(Object);
			sessionStorage.setItem("speciesJSON", ObjectJSON);
		})

		.catch((err) => {
			console.error("Error:", error);
		});
};
// Esta función determina el color de fondo según el rango
const setBackgroundColor = (cell, value, min, max, threshold) => {
	if (!value || isNaN(value)) {
		$(cell).css({ backgroundColor: "" }); // Elimina el color de fondo
		return;
	}

	let lowerThreshold = min + threshold;
	let upperThreshold = max - threshold;

	let color = "";
	if (value >= lowerThreshold && value <= upperThreshold) {
		color = "rgba(0, 128, 0, 0.5)";
	} else if (
		(value >= min && value <= lowerThreshold) ||
		(value >= upperThreshold && value <= max)
	) {
		color = "rgba(255, 165, 0, 0.5)";
	} else {
		color = "rgba(255, 0, 0, 0.5)";
	}

	$(cell).css({ backgroundColor: color });
};
