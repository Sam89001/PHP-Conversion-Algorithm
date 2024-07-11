    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
			<?php 
				//Variable Types
				$string = "Variable Text"; // String
				$integer = 12345; // Integer (Whole Number)
				$float = 2.12345; // Float (Decimal Number)
				$boolean = true; // Boolean
				$array = ["Array Value 1", "Array Value 2", "Array Value 3"]; // Array
			?>

			<main> 

				<form action="forms/formHandler.php" method="post" id="tshirtForm">
					<label>Select T-Shirt Type</label>
					<select required id="tshirtType" name="tshirtType" >
							<option value="Mens Organic T-Shirt" selected>Mens Organic T-Shirt</option>
							<option id="womens" value="Womens Organic T-Shirt">Womens Organic T-Shirt</option>
							<option id="kids" value="Kids Unisex Basic T-Shirt">Kids Unisex Basic T-Shirt</option>
					</select>

					<label>Quantity</label>
					<input required type="number" name="quantity" />

					<label>Colour</label>
					<select required id="colour" name="colour">
					</select>

					<label>Size</label>
					<select required id="size" name="size">
					</select>

					<button type="submit">Submit</button>
    		</form>

			</main>

			<script>
				//Event Listeners to change options on select box
					function updateOptions() {
							var tshirtTypeSelect = document.getElementById('tshirtType');
							var sizeSelect = document.getElementById('size');
							var colourSelect = document.getElementById('colour');
							
							sizeSelect.innerHTML = '';
							colourSelect.innerHTML = '';

							var sizes, colours;
							if (tshirtTypeSelect.value === 'Kids Unisex Basic T-Shirt') {
									sizes = ['1-2yrs', '3-4yrs', '5-6yrs', '7-8yrs', '9-11yrs'];
									colours = ['Dinosaur Green', 'Dolphin Blue', 'Ladybug Red'];
							} else if (tshirtTypeSelect.value === 'Womens Organic T-Shirt') {
									sizes = ['Small', 'Medium', 'Large', 'Extra Large'];
									colours = ['Pastel Green', 'Light Blue', 'Light Red'];
							} else { 
									sizes = ['Small', 'Medium', 'Large', 'Extra Large'];
									colours = ['Blue', 'Green', 'Red', 'White'];
							}

							for (var i = 0; i < sizes.length; i++) {
									var sizeOption = document.createElement('option');
									sizeOption.value = sizes[i];
									sizeOption.textContent = sizes[i];
									sizeSelect.appendChild(sizeOption);
							}

							for (var i = 0; i < colours.length; i++) {
									var colourOption = document.createElement('option');
									colourOption.value = colours[i];
									colourOption.textContent = colours[i];
									colourSelect.appendChild(colourOption);
							}
					}

					//Event Listener on load and change
					document.addEventListener('DOMContentLoaded', function() {
							updateOptions(); 
					});
					document.getElementById('tshirtType').addEventListener('change', function() {
							updateOptions();
					});

    	</script>

    </body>
    </html>