$(($) => {
	
	LoadReports()

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

	flatpickr("#search-date", {
		dateFormat: "d-m-Y",
		maxDate: dateActuality(),
	});

	$("#search-date").on("change", function (e) {
		removeReports();
		LoadReports($(this).val());
	});
});
function LoadReports(date) {
	$.ajax({
		url: "Report-Temp",
		type: "POST",
		dataType: "json",
		data: { data: date },
		async: false,
	})
		.done((data) => {
			var gridContainer = document.getElementById("pecera-grid");
			data.forEach(function (pecera, index) {
				var peceraContainer = document.createElement("div");
				peceraContainer.className = "xl-50 col-xl-6 col-lg-12";
				peceraContainer.innerHTML = `
            <div class="card card-graphic">
                <div class="card-header">
                    <h5>${pecera.type_bowl + " " + pecera.name_bowl}</h5>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <div class="row">
                        <div class="col-12">
                            <div id="chart-container-${pecera.tank_name}"></div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            `;
				gridContainer.appendChild(peceraContainer);

				var series = {
					monthDataSeries1: {
						prices: [
							pecera.hour_12_am,
							pecera.hour_4_am,
							pecera.hour_8_am,
							pecera.hour_12_pm,
							pecera.hour_4_pm,
							pecera.hour_8_pm,
						],
						hours: [
							"12:00 AM",
							"04:00 AM",
							"08:00 AM",
							"12:00 PM",
							"04:00 PM",
							"08:00 PM",
						],
					},
				};

				var optionsannotation = {
					series: [
						{
							data: series.monthDataSeries1.prices,
						},
					],
					chart: {
						height: 400,
						type: "line",
						toolbar: {
							show: true,
						},
					},
					annotations: {
						yaxis: [
							{
								min: 0,
								max: 50,
								y: pecera.tmp_min,
								y2: pecera.tmp_max,
								borderColor: "#f8d62b",
								fillColor: "#f8d62b",
								opacity: 0.3,
								label: {
									borderColor: "#f8d62b",
									offsetX: -60,
									style: {
										fontSize: "10px",
										color: "#000",
										background: "#f8d62b",
									},
									text: "Rango de Temperatura",
								},
							},
						],
					},
					dataLabels: {
						enabled: true,
					},
					stroke: {
						color: "#0324C6",
						width: 5,
						curve: "smooth",
					},
					grid: {
						padding: {
							right: 30,
							left: 20,
						},
					},
					title: {
						text: pecera.type_bowl + " " + pecera.name_bowl,
						align: "left",
						style: {
							fontSize: "20px",
							fontFamily: "Rubik, sans-serif",
							fontWeight: 500,
						},
						enabled: false,
					},
					colors: [CubaAdminConfig.secondary],
					labels: series.monthDataSeries1.hours, // Cambiado a las horas
					xaxis: {
						type: "category", // Cambiado a "category"
					},
					responsive: [
						{
							breakpoint: 576,
							options: {
								title: {
									style: {
										fontSize: "16px",
									},
								},
							},
						},
					],
				};

				var chart = new ApexCharts(
					document.querySelector(`#chart-container-${pecera.tank_name}`),
					optionsannotation
				);
				chart.render();
			});
		})
		.fail((e) => {
			console.log(e.ResponseText);
		});
}
const removeReports = () => {
	var gridContainer = document.getElementById("pecera-grid");
	var xl50Elements = gridContainer.querySelectorAll(".xl-50");

	xl50Elements.forEach(function (element) {
		element.remove();
	});
};
