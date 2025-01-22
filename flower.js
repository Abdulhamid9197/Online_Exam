<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Flowers</title>
    <style>
        /* Basic styling for the page */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
        }

        #notification-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 100;
            width: 300px;
            padding: 20px;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            border-radius: 5px;
            display: none; /* Initially hidden */
        }

        #notification-text {
            font-weight: bold;
        }

        #video-container {
            width: 640px;
            height: 360px;
            margin: 20px auto;
        }

        #video {
            width: 100%;
            height: 100%;
            border: 1px solid #ccc;
        }

        #form-container {
            width: 500px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        #form-label {
            display: block;
            margin-bottom: 5px;
        }

        #form-input {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        #submit-button {
            margin-top: 10px;
            padding: 5px 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        #error-message {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div id="notification-container">
        <span id="notification-text"></span>
        <button onclick="hideNotification()">إغلاق</button>
    </div>

    <div id="video-container">
        <video id="video" src="https://www.youtube.com/embed/jNQXAC9IVRw" controls></video>
        <h2>تعليم زراعة الورود في المنزل</h2>
    </div>

    <div id="form-container">
        <h2>طلب زهور</h2>
        <form id="flower-order-form" onsubmit="return validateForm()">
            <label id="form-label">اسم الزهرة:</label>
            <select id="flower-select" name="flower" required>
                <option value="">اختر الزهرة</option>
                <option value="rose">الورد</option>
                <option value="daisy">البنفسج</option>
                <option value="sunflower">عباد الشمس</option>
            </select>

            <label id="form-label">الكمية:</label>
            <input type="number" id="quantity-input" name="quantity" min="1" required>

            <label id="form-label">اسمك:</label>
            <input type="text" id="name-input" name="name" required>

            <label id="form-label">البريد الإلكتروني:</label>
            <input type="email" id="email-input" name="email" required>

            <button id="submit-button" type="submit">طلب</button>
            <div id="error-message"></div>
        </form>
    </div>

    <script>
        // Function to show notification (replace with your specific notification logic)
function showNotification(message) {
    const notificationContainer = document.getElementById("notification-container");
    const notificationText = document.getElementById("notification-text");
    notificationText.textContent = message;
    notificationContainer.style.display = "block"; // Make notification visible
}

// Function to hide notification
function hideNotification() {
    const notificationContainer = document.getElementById("notification-container");
    notificationContainer.style.display = "none"; // Hide notification
}

// Form validation function (called on form submission)
function validateForm() {
    const flowerSelect = document.getElementById("flower-select");
    const quantityInput = document.getElementById("quantity-input");
    const nameInput = document.getElementById("name-input");
    const emailInput = document.getElementById("email-input");
    const errorMessage = document.getElementById("error-message");

    // Clear any previous error messages
    errorMessage.textContent = "";

    // Validate flower selection
    if (flowerSelect.value === "") {
        errorMessage.textContent = "من فضلك اختر زهرة.";
        return false;
    }

    // Validate quantity
    if (quantityInput.value < 1) {
        errorMessage.textContent = "الرجاء إدخال كمية صحيحة (1 أو أكثر).";
        return false;
    }

    // Validate name
    if (nameInput.value === "") {
        errorMessage.textContent = "من فضلك أدخل اسمك.";
        return false;
    }

    // Validate email
    if (!validateEmail(emailInput.value)) {
        errorMessage.textContent = "من فضلك أدخل عنوان بريد إلكتروني صحيح.";
        return false;
    }

    // If all validations pass, submit the form or show a success notification (replace with your logic)
    // For example:
    showNotification("تم استلام طلبك بنجاح!");
    // alert("تم استلام طلبك بنجاح!"); // Replace with your logic
    return true; // Allow form submission
}

// Function to validate email format (basic check)
function validateEmail(email) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+)(\.[^<>()\[\]\\.,;:\s@"]+)*)@(([^<>()\[\]\\.,;:\s@"]+)(\.[^<>()\[\]\\.,;:\s@"]+)*)$/;
    return re.test(email);
}

 </script>