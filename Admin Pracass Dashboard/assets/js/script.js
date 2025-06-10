function toggleMode() {
  const body = document.body;
  body.classList.toggle("dark");
  body.classList.toggle("light");
  localStorage.setItem("mode", body.classList.contains("dark") ? "dark" : "light");
}

window.onload = function() {
  if (localStorage.getItem("mode") === "dark") {
    document.body.classList.remove("light");
    document.body.classList.add("dark");
  }

  const ctx = document.getElementById('myChart').getContext('2d');
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr'],
      datasets: [{
        label: 'User Visits',
        data: [12, 19, 3, 5],
        backgroundColor: 'rgba(75, 192, 192, 0.6)',
      }]
    }
  });
};