
// Predefined light colors
const colors = ["#FFDDC1", "#FFABAB", "#FFC3A0", "#D5AAFF", "#85E3FF", "#B9FBC0", "#FAF4B7", "#FFD6A5", "#A0E7E5"];
let index = 0;

// Event listener for button click
document.getElementById("colorButton").addEventListener("click", function() {
    document.body.style.backgroundColor = colors[index]; 
    index = (index + 1) % colors.length; // Cycle through colors
});

