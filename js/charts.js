(() => {
  const agectx = document.querySelector("#suicideChart");
  const ctx = document.querySelector("#ageGroupChart");

  new Chart(agectx, {
    type: "pie",
    data: {
      //   labels: ["Female", "Male"],
      datasets: [
        {
          data: [25, 75],
          backgroundColor: ["rgb(255, 99, 132)", "rgb(54, 162, 235)"],
        },
      ],
      hoverOffset: 4,
    },
    options: {
      responsive: true,
      //   maintainAspectRatio: false,

      animation: {
        duration: 4,
        easing: "easeInOutQuad",
      },
    },
  });

  new Chart(ctx, {
    type: "polarArea",
    data: {
      labels: ["10 to 14 y.o", "15 to 19 y.o", "20 to 24 y.o"],
      datasets: [
        {
          label: "Age Group Suicide Rate in Percentage",
          data: [21, 29, 24],
          backgroundColor: [
            "rgb(255, 99, 132)",
            "rgb(54, 162, 235)",
            "rgb(255, 205, 86)",
          ],
        },
      ],
    },
    options: {
      responsive: true,

      animation: {
        duration: 3,
        easing: "easeInOutQuad",
      },
    },
  });
})();
