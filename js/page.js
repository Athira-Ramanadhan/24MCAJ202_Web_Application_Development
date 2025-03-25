// Function to Show Product Details on Hover
function showDetails() {
    document.getElementById("productDetails").style.display = "block";
}

// Function to Hide Product Details when Hovering Over Button or Description
function hideDetails() {
    document.getElementById("productDetails").style.display = "none";
}

// Function to Hide Product Details when Clicking Outside
document.addEventListener("click", function (event) {
    let productBox = document.querySelector(".product"); // The hoverable box
    let detailsBox = document.getElementById("productDetails"); // Cake details section

    // If the click is NOT inside the product box or details box, hide details
    if (!productBox.contains(event.target) && !detailsBox.contains(event.target)) {
        hideDetails();
    }
});

// Attach Event Listeners to Hide Details When Hovering Over Button or Description
document.querySelector("button").addEventListener("mouseover", hideDetails);
document.querySelector(".description").addEventListener("mouseover", hideDetails);
