<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Select Countries</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 30px;
    }
    .container {
      max-width: 400px;
      border: 2px solid #ccc;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      margin: auto;
    }
    .title {
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 15px;
      text-align: center;
    }
    .country-list {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 10px;
    }
    label {
      display: flex;
      align-items: center;
    }
    .submit-container {
      text-align: center;
      margin-top: 20px;
    }
    .submit-container input[type="submit"] {
      background-color: #28a745;
      color: white;
      border: none;
      padding: 10px 20px;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
    }
    .submit-container input[type="submit"]:hover {
      background-color: #218838;
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="title">Select 10 cities</div>
    <form action="showaqi.php" method="post">
      <div class="country-list">
        <label><input type="checkbox" name="countries[]" value="Dhaka"> Dhaka</label>
        <label><input type="checkbox" name="countries[]" value="Delhi"> Delhi</label>
        <label><input type="checkbox" name="countries[]" value="Beijing"> Beijing</label>
        <label><input type="checkbox" name="countries[]" value="Los Angeles"> Los Angeles</label>
        <label><input type="checkbox" name="countries[]" value="London"> London</label>
        <label><input type="checkbox" name="countries[]" value="Paris"> Paris</label>
        <label><input type="checkbox" name="countries[]" value="Tokyo"> Tokyo</label>
        <label><input type="checkbox" name="countries[]" value="Karachi"> Karachi</label>
        <label><input type="checkbox" name="countries[]" value="Cairo"> Cairo</label>
        <label><input type="checkbox" name="countries[]" value="Jakarta"> Jakarta</label>
        <label><input type="checkbox" name="countries[]" value="Moscow"> Moscow</label>
        <label><input type="checkbox" name="countries[]" value="Madrid"> Madrid</label>
        <label><input type="checkbox" name="countries[]" value="Rome"> Rome</label>
        <label><input type="checkbox" name="countries[]" value="Bangkok"> Bangkok</label>
        <label><input type="checkbox" name="countries[]" value="Istanbul"> Istanbul</label>
        <label><input type="checkbox" name="countries[]" value="Lagos"> Lagos</label>
        <label><input type="checkbox" name="countries[]" value="Nairobi"> Nairobi</label>
        <label><input type="checkbox" name="countries[]" value="Santiago"> Santiago </label>
        <label><input type="checkbox" name="countries[]" value="Seoul"> Seoul</label>
        <label><input type="checkbox" name="countries[]" value="Kuala Lumpur"> Kuala Lumpur</label>
      </div>
      <div class="submit-container">
        <input type="submit" value="Submit">
      </div>
    </form>
  </div>

</body>
</html>
