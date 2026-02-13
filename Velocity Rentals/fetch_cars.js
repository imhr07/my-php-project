document.addEventListener("DOMContentLoaded", function () {

  const carContainer = document.getElementById("carContainer");
  const moreBtn = document.getElementById("moreBtn");
  const loading = document.getElementById("loading");

  let offset = 0;
  const limit = 3;

  function fetchCars() {

    loading.style.display = "block";

    // ✅ FIXED PATH
    fetch(`Velocity%20Rentals/fetch_cars.php?offset=${offset}`)
      .then(response => {
        if (!response.ok) {
          throw new Error("Network response was not ok");
        }
        return response.json();
      })
      .then(data => {

        loading.style.display = "none";

        if (!data || data.length === 0) {
          moreBtn.style.display = "none";
          return;
        }

        data.forEach(car => {

          let rentSection = "";

          if (typeof isCustomerSession !== "undefined" && isCustomerSession) {

            rentSection = `
              <form action="Velocity%20Rentals/customer/rent_car.php" method="POST" class="mt-3">

                <input type="hidden" name="car_id" value="${car.car_id}">

                <input type="date"
                       name="start_date"
                       class="form-control mb-2"
                       required>

                <input type="number"
                       name="number_of_days"
                       class="form-control mb-2"
                       min="1"
                       max="10"
                       value="1"
                       required>

                <button type="submit" class="rent-btn">
                  <i class="fas fa-car"></i> Rent Now
                </button>

              </form>
            `;

          } else {

            rentSection = `
              <a href="Velocity%20Rentals/signin.php" class="rent-btn mt-3 d-block text-center">
                <i class="fas fa-car"></i> Rent Now
              </a>

              <div class="login-text text-center">
                Please <a href="Velocity%20Rentals/signin.php">Login</a> to rent
              </div>
            `;
          }

          carContainer.innerHTML += `
            <div class="col-md-4 mb-4">
              <div class="modern-card">

                <div class="image-wrapper">
                  <img src="${car.images ? 'Velocity%20Rentals/uploads/' + car.images : 'Velocity%20Rentals/default_car_image.jpg'}"
                       alt="${car.vehicle_model}">
                  <div class="price-badge">
                    ₹ ${car.rent_per_day} <span>/day</span>
                  </div>
                </div>

                <div class="card-content">
                  <h4>${car.vehicle_model}</h4>
                  <p class="agency">${car.agency_name}</p>

                  <div class="features">
                    <span><i class="fas fa-car"></i> ${car.body_type}</span>
                    <span><i class="fas fa-gas-pump"></i> ${car.fuel}</span>
                    <span><i class="fas fa-cogs"></i> ${car.transmission}</span>
                    <span><i class="fas fa-chair"></i> ${car.seating_capacity} Seats</span>
                  </div>

                  ${rentSection}

                </div>

              </div>
            </div>
          `;
        });

        offset += data.length;
      })
      .catch(error => {
        console.error("Error fetching cars:", error);
        loading.style.display = "none";
      });
  }

  fetchCars();
  moreBtn.addEventListener("click", fetchCars);

});
