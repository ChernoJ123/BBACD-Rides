<?php
include 'navbar.php'; // Make sure navbar.php is in same folder
$vehicles = [
    'Bicycles' => [
        ['name' => 'Mongoose', 'image' => '/images/Bicycle.png'],
        ['name' => 'Electra', 'image' => '/images/EBicycle.png']
    ],
    'Scooters' => [
        ['name' => 'Razor', 'image' => '/images/Scooter.png'],
        ['name' => 'Gotrax', 'image' => '/images/EScooter.png']
    ],
    'Golf Carts' => [
        ['name' => 'Yamaha', 'image' => '/images/Golf_cart.png']
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <title>Vehicles | BBACD Rides</title>

  <style>
    body {
      background-color: #000; /* black background */
      color: #fff; /* white text */
      font-family: 'Poppins', sans-serif;
    }

    h2 {
      color: #FFD700; /* gold headings */
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    hr {
      border: 1px solid #FFD700;
      opacity: 0.3;
    }

    .card {
      background-color: #111; /* deep black card */
      border: 2px solid #FFD700;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
      transform: scale(1.03);
      box-shadow: 0 0 15px #FFD700;
    }

    .card-title {
      color: #FFD700;
      font-weight: 600;
    }

    .btn-gold {
      background-color: #FFD700;
      color: #000;
      font-weight: bold;
      border: none;
    }

    .btn-gold:hover {
      background-color: #e6c200;
      color: #000;
    }

    .category-header {
      border-bottom: 2px solid #FFD700;
      padding-bottom: 10px;
      margin-bottom: 25px;
    }

    .container {
      margin-top: 30px;
      margin-bottom: 50px;
    }

    .disabled-link {
      pointer-events: none;  /* prevents clicks */
      opacity: 0.5;          /* looks faded */
      cursor: not-allowed;   /* shows not-allowed cursor */
    }
  </style>
</head>
<body>

  <div class="container text-center mt-5">
    <h2>SELECT YOUR VEHICLE</h2>
    <p class="text-light">Choose from our collection of scooters, bikes, and golf carts.</p>
  </div>

  <!-- Display Vehicles w Pictures -->
  <div class="container">
    <?php foreach ($vehicles as $category => $items): ?>
      <div class="mb-5">
        <h2 class="category-header"><?php echo htmlspecialchars($category); ?></h2>
        <div class="row justify-content-center">
          <?php foreach ($items as $vehicle): ?>
            <div class="col-md-4 mb-4 d-flex justify-content-center">
              <div class="card" style="width: 20rem;">
                <img class="card-img-top" src="<?php echo htmlspecialchars($vehicle['image']); ?>" alt="<?php echo htmlspecialchars($vehicle['name']); ?>">
                <div class="card-body text-center">
                  <h4 class="card-title"><?php echo htmlspecialchars($vehicle['name']); ?></h4>
                  <a href="#" class="btn btn-gold mt-2 rent-btn" id = "rent_button" >Rent Now</a> <!---NEEDS TO BE FIXED Only rents/disables Monogose bike needs--->
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
      <hr>
    <?php endforeach; ?>
  </div>


  <!-- Rent Modal -->
  <div class="modal fade" id="rentModal" tabindex="-1" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-dark text-white">
          <h5 class="modal-title" id="rentModalLabel">Rent </h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <!--<form action="InsertRent.php" method="POST"> -->
          <div class="modal-body">
            <input type="hidden" id="vehicleName" name="vehicleName">

            <div class="mb-3">
              <label for="rentalDate" class="form-label fw-semibold text-body"> Select Date </label>
              <input type="date" class="form-control border-dark" id="rentalDate" name="rentalDate" required>
            </div>

            <div class="mb-3">
              <label for="rentalTime" class="form-label fw-semibold text-body"> Select Time Duration (hours) </label>
              <input type="number" class="form-control border-dark" id="rentalTime" name="rentalTime" min="1" required>
            </div>
          </div>
          <div class="modal-footer bg-light">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-dark text-warning fw-semibold" id = "confirm_rent" data-bs-toggle="modal" data-bs-target="#Thanks">Confirm Rent</button>
          </div>
        <!--</form> -->
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="Thanks">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-body text-center text-body">
                <h4>Thank You for Booking with BBACD Rides!</h4>
                <h5>Your Vehicle is now available for pick up. <br> See you Soon!</h5>
            <a href="#" class="btn btn-gold mt-2 border border-1 border-dark" data-bs-dismiss="modal">Close</a>
            </div>
        </div>
  </div>

  <!---Creates a pop up modal for each rent button-->
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const rentButtons = document.querySelectorAll('.rent-btn');
      rentButtons.forEach(button => {
        button.addEventListener('click', function (event) {
          event.preventDefault();
          const vehicleName = this.closest('.card-body').querySelector('.card-title').textContent;
          document.getElementById('vehicleName').value = vehicleName;
          const rentModal = new bootstrap.Modal(document.getElementById('rentModal'));
          rentModal.show();
        });
      });
    });

    // Disables and changes the Rent button to Rented NEEDS TO BE FIXED!!!!!!!!
    const disableBtn = document.getElementById('confirm_rent');
    const linkButton = document.getElementById('rent_button');

    disableBtn.addEventListener('click', function() {
      linkButton.classList.add('disabled-link');
      linkButton.textContent = "Rented";
    });
  </script>

</body>
</html>

