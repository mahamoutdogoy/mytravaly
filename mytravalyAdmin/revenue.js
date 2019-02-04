new Chart(document.getElementById("revenue-chart"), {
	type: 'doughnut',
	data: {
		labels: ["Estimation Goal", "Actual Goal", " Extrat"],
		datasets: [
			{
				label: "Goals",
				backgroundColor: ["#F7CB15", "green", "#07775f"],
				data: [350, 200, 30]
        }
      ]
	},
	options: {
		title: {
			display: true,
			text: 'Predicted '
		}
	}
});
