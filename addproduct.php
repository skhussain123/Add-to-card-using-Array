<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Form</title>
    <!-- Include Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-10">
            </div>
            <div class="col-md-2">
                <a href="showproduct.php" class="btn btn-primary">Show Products</a>
            </div>
        </div>
        <h1>Add a New Product</h1>
        <br>
        <img id="imagePreview" class="mt-2" style="max-width: 200px;">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="productName">Product Name</label>
                <input type="text" class="form-control" name="productName" placeholder="Enter product name" required>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" name="price" placeholder="Enter price" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" rows="3" placeholder="Enter product description" required></textarea>
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" name="category" required>
                    <option value="">Select a category</option>
                    <option value="electronics">Electronics</option>
                    <option value="clothing">Clothing</option>
                    <option value="books">Books</option>
                    <!-- Add more categories as needed -->
                </select>
            </div>
            <div class="form-group">
                <label for="image">Product Image</label>
                <input type="file" class="form-control-file" id="image" name="image" accept="image/*" >
            </div>
            <br>
            <input type="submit" value="Add products" class="btn btn-primary" name="btnsave">
        </form>
    </div>


    <?php

    include 'config.php';

    if (isset($_POST['btnsave'])) {

        echo $product = $_POST['productName'];
        echo $price = $_POST['price'];
        echo $desc = $_POST['description'];
        echo $category = $_POST['category'];

       

        if (isset($_FILES["image"]) && $_FILES["image"]["error"] === 0) {

            $checkQuery = "SELECT id FROM products WHERE name = '$product'";
            $result = $conn->query($checkQuery);

            if ($result->num_rows > 0) {
                echo "Product with the same name already exists.";
            } else {



                $imageTmpPath = $_FILES["image"]["tmp_name"];
                $imageName = $_FILES["image"]["name"];
                $imagePath = "uploads/" . $imageName; // Define the path where you want to save the image
                move_uploaded_file($imageTmpPath, $imagePath);

                $insertQuery = "INSERT INTO products (name, price, description, category, image_path)
            VALUES ('$product', $price, '$desc', '$category', '$imagePath')";
                $result = mysqli_query($conn, $insertQuery);

                if ($result) {
                    echo "Product added successfully!";
                } else {
                    echo "Error: " . $insertQuery . "<br>" . $conn->error;
                }
            }
        } else {

            echo "NO select File";
        }





        
    }





    ?>

    <script>
        const imageInput = document.getElementById("image");
        const imagePreview = document.getElementById("imagePreview");


        imageInput.addEventListener("change", function() {
            const file = imageInput.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
    <!-- Include Bootstrap JS scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>