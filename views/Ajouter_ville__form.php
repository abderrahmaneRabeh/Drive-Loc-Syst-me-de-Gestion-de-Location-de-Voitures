<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Car</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            color: #000;
            font-family: 'Rubik', sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 80%;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        .btn {
            display: inline-block;
            padding: 12px 25px;
            color: #fff;
            background: #ff6700;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
            margin: 10px 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background: #e65c00;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #000;
        }

        .form-group input,
        .form-group select {
            width: 90%;
            padding: 12px;
            border: 1px solid #ffc107;
            border-radius: 5px;
            background: #fff;
            color: #000;
            font-size: 16px;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            box-shadow: 0 0 5px #ffc107;
        }

        .form-btn {
            background: #28a745;
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 16px;
        }

        .form-btn:hover {
            background: #218838;
        }

        h2 {
            text-align: center;
            color: #ff6700;
            margin-bottom: 30px;
            font-family: 'Oswald', sans-serif;
        }

        .top-buttons {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .car-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            background-color: #f9f9f9;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .car-card h3 {
            margin-top: 0;
            color: #007bff;
            font-size: 1.2em;
            font-weight: bold;
        }

        .car-card .remove-btn {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            margin-top: 10px;
            float: right;
        }

        .car-card .remove-btn:hover {
            background-color: #c82333;
        }

        .add-car-btn {
            background-color: #007bff;
            padding: 10px 20px;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            margin: 20px 0;
            display: block;
            width: fit-content;
        }

        .add-car-btn:hover {
            background-color: #0056b3;
        }

        .form-group-row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            /* Adds spacing between items */
        }

        .form-group-row .form-group {
            flex: 1 1 calc(33.333% - 20px);
            /* Adjusts width to fit three items per row */
            min-width: 200px;
            /* Ensures minimum width for smaller screens */
        }

        @media (max-width: 768px) {
            .form-group-row .form-group {
                flex: 1 1 calc(50% - 20px);
                /* Adjusts to two items per row for smaller screens */
            }
        }

        @media (max-width: 480px) {
            .form-group-row .form-group {
                flex: 1 1 100%;
                /* Adjusts to one item per row for very small screens */
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="top-buttons">
            <a href="/dashboard" class="btn"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a href="/home" class="btn"><i class="fas fa-home"></i> Home</a>
        </div>
        <h2>Ajouter une voiture</h2>

        <form action="add_car.php" method="POST" id="carForm">
            <div id="carGroupContainer">
                <div class="car-card">
                    <h3>Car 1</h3>
                    <div class="form-group-row">
                        <div class="form-group">
                            <label for="modele">Modele</label>
                            <input type="text" name="modele[]" placeholder="Enter car model" required>
                        </div>
                        <div class="form-group">
                            <label for="marque">Marque</label>
                            <input type="text" name="marque[]" placeholder="Enter car brand" required>
                        </div>
                        <div class="form-group">
                            <label for="prixJournalier">Prix Journalier</label>
                            <input type="number" name="prixJournalier[]" placeholder="Enter daily price" required>
                        </div>
                    </div>
                    <div class="form-group-row">
                        <div class="form-group">
                            <label for="transmission">Transmission</label>
                            <select name="transmission[]" required>
                                <option value="">Select transmission</option>
                                <option value="Manuelle">Manuelle</option>
                                <option value="Automatique">Automatique</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="couleur">Couleur</label>
                            <input type="text" name="couleur[]" placeholder="Enter car color" required>
                        </div>
                        <div class="form-group">
                            <label for="kilometrage">Kilométrage</label>
                            <input type="number" name="kilometrage[]" placeholder="Enter mileage" required>
                        </div>
                    </div>
                    <div class="form-group-row">
                        <div class="form-group">
                            <label for="voiture_img">Voiture Image</label>
                            <input type="text" name="voiture_img[]" placeholder="Enter url de l'image" required>
                        </div>
                        <div class="form-group">
                            <label for="disponible">Disponible</label>
                            <select name="disponible[]" required>
                                <option value="">Is it available?</option>
                                <option value="1">Oui</option>
                                <option value="0">Non</option>
                            </select>
                        </div>
                    </div>
                </div>

            </div>
            <button type="button" class="add-car-btn" id="addCarBtn">Add Another Car</button>
            <button type="submit" class="form-btn">Add Cars</button>
        </form>
    </div>

    <script>
        document.getElementById('addCarBtn').addEventListener('click', function () {
            const carGroupContainer = document.getElementById('carGroupContainer');
            const carCards = document.querySelectorAll('.car-card');
            console.log("cards", carCards);
            const newCard = carCards[0].cloneNode(true);
            console.log("New card", newCard);

            // Update the title of the new card
            newCard.querySelector('h3').textContent = `Car ${carCards.length + 1}`;

            // Clear input values in the cloned card
            newCard.querySelectorAll('input').forEach(input => input.value = '');
            newCard.querySelectorAll('select').forEach(select => select.value = '');

            carGroupContainer.appendChild(newCard);
        });
    </script>
</body>

</html>