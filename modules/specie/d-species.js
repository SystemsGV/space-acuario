$(($) => {
	LoadBowlsFish();

	$("#exampleDataList1").on("input", function () {
		var filterValue = $(this).val().toLowerCase();
		var $cardGraphics = $(".xl-50");
		var $noResults = $("#no-results");

		$cardGraphics.hide();
		var hasResults = false;

		$cardGraphics.each(function () {
			var title = $(this).find(".card-header h5").text().toLowerCase();
			if (title.includes(filterValue)) {
				$(this).show();
				hasResults = true;
			}
		});

		if (hasResults) {
			$noResults.hide(); // Oculta el mensaje cuando hay resultados
		} else {
			$noResults.show(); // Muestra el mensaje cuando no hay resultados
		}
	});
});
function LoadBowlsFish() {
	$.ajax({
		url: "Report-Bowls",
		type: "POST",
		dataType: "json",
		async: false,
	})
		.done((rsp) => {
			let data = rsp.data;
			// Suponiendo que 'data' contiene tu información de peceras

			var gridContainer = document.getElementById("fish-grid");

			// Agrupar las especies por tanque
			var tanquesUnicos = {};
			data.forEach(function (pecera) {
				if (!tanquesUnicos[pecera.tank]) {
					tanquesUnicos[pecera.tank] = [];
				}
				tanquesUnicos[pecera.tank].push(pecera);
			});

			// Crear una tarjeta por cada tanque único con al menos una especie
			Object.keys(tanquesUnicos).forEach(function (tank) {
				// Verificar que el tanque tenga al menos una especie
				if (tanquesUnicos[tank].some((pecera) => parseInt(pecera.amount) > 0)) {
					var peceraContainer = document.createElement("div");
					peceraContainer.className = "xl-50 col-xl-6 col-lg-12";
					peceraContainer.innerHTML = `
					<div class="card card-graphic">
						<div class="card-header">
							<h5>${
								tanquesUnicos[tank][0].type_bowl +
								" " +
								tanquesUnicos[tank][0].name_bowl
							}</h5>
						</div>
						<div class="card-body">
							<div class="chart-container">
								<div class="row">
									<div class="col-12">
										<div id="piechart-${tank}"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				`;
					gridContainer.appendChild(peceraContainer);

					// Preparar los datos para el pie chart
					var labels = [];
					var series = [];
					tanquesUnicos[tank].forEach(function (pecera) {
						if (parseInt(pecera.amount) > 0) {
							labels.push(`${pecera.common_specie} (${pecera.amount})`);
							series.push(parseInt(pecera.amount));
						}
					});

					// Configurar las opciones del pie chart
					var options = {
						chart: {
							width: 380,
							type: "pie",
							toolbar: {
								show: true,
							},
						},
						labels: labels,
						series: series,
						responsive: [
							{
								breakpoint: 480,
								options: {
									chart: {
										width: 200,
									},
									legend: {
										show: false,
									},
								},
							},
						],
						colors: [
							CubaAdminConfig.primary,
							CubaAdminConfig.secondary,
							"#51bb25",
							"#a927f9",
							"#f8d62b",
						],
					};

					// Crear el pie chart
					var chart = new ApexCharts(
						document.getElementById(`piechart-${tank}`),
						options
					);
					chart.render();
				}
			});
		})
		.fail((e) => {
			console.log(e.ResponseText);
		});
}
