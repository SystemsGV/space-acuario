$(($) => {
	sessionStorage.clear();
	sessionStorage.setItem("dateIn", null);
	sessionStorage.setItem("dateOut", null);

	speciesJson();

	// Create date input with range mode
	let minDate = flatpickr("#date-range", {
		mode: "range",
		dateFormat: "d-m-Y",
		locale: "es",
		onClose: function (selectedDates, dateStr, instance) {
			let fechaInicio = selectedDates[0]
				? selectedDates[0]
						.toLocaleDateString("es-PE", {
							day: "2-digit",
							month: "2-digit",
							year: "numeric",
						})
						.replace(/\//g, "-")
				: null;
			let fechaFin = selectedDates[1]
				? selectedDates[1]
						.toLocaleDateString("es-PE", {
							day: "2-digit",
							month: "2-digit",
							year: "numeric",
						})
						.replace(/\//g, "-")
				: fechaInicio;
			$.ajax({
				url: "Reporte-PDF",
				type: "post",
				dataType: "json",
				data: { dateIn: fechaInicio, dateOut: fechaFin },
			})
				.done((data) => {})
				.fail((error) => {
					console.log("Error al enviar datos:", error.responseText);
				});
		},
	});

	// Custom filtering function which will search data in column four between two values
	$.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
		let startDate = minDate.selectedDates[0];
		let endDate = minDate.selectedDates[1];
		let date = new Date(data[9]);

		if (
			(startDate === undefined && endDate === undefined) ||
			(startDate === undefined && date <= endDate) ||
			(date >= startDate && endDate === undefined) ||
			(date >= startDate && date <= endDate)
		) {
			return true;
		}
		return false;
	});

	// DataTables initialisation
	let table = $("#example").DataTable({
		paging: true, // Habilita la paginación
		pageLength: 10,
		order: [["9", "desc"]],
		language: {
			url: "../assets/json/Spanish.json",
		},
		ajax: {
			url: "API-REPORT-TEMPERATURE",
		},
		columns: [
			{
				data: "tank_name",
				render: function (data, type, row) {
					return row.type_bowl + " " + row.name_bowl;
				},
			},
			{
				data: "species",
				render: function (data, type, row) {
					if (data == undefined || data == "") {
						return `Sin especies`;
					}
					return checkSpecies(data);
				},
			},
			{
				data: "hour_12_am",
			},
			{
				data: "hour_4_am",
			},
			{
				data: "hour_8_am",
			},
			{
				data: "hour_12_pm",
			},
			{
				data: "hour_4_pm",
			},
			{
				data: "hour_8_pm",
			},
			{
				data: "observation",
			},
			{
				data: "formatted_date",
			},
		],
	});

	// Refilter the table
	$("#date-range").on("change", function () {
		table.draw();
	});
	$("#export-pdf").on("click", function () {});
});
const checkSpecies = (i) => {
	// Get the JSON string from sessionStorage
	const speciesObjectJSON = sessionStorage.getItem("speciesJSON");
	// Convert the JSON string back to a JavaScript object
	const speciesObject = JSON.parse(speciesObjectJSON);
	if (i) {
		const keys = i.split(",").map(Number);
		const result = keys
			.map((key) => speciesObject && speciesObject[key])
			.join(",");
		return `${result}`;
	}
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
