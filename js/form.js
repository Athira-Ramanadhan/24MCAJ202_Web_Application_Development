document.getElementById("registrationForm").addEventListener("submit", function(event) {
 
    // Get input values and trim spaces

    let name = document.getElementById("name").value.trim();
    let email = document.getElementById("email").value.trim();
    let phone = document.getElementById("phone").value.trim();

    // Check if any field is empty
    if (name === "" || email === "" || phone === "") {
        alert("All fields are required!");
        event.preventDefault(); 
        return;
    }

    // Validate email format
    if (!email.includes("@") || !email.includes(".")) {
        alert("Enter a valid email address!");
        event.preventDefault(); 
        return;
    }

    // Validate phone number (should be exactly 10 digits and numeric)
    if (phone.length !== 10 || isNaN(phone)) {
        alert("Enter a valid 10-digit phone number!");
        event.preventDefault(); 
        return;
    }
});
