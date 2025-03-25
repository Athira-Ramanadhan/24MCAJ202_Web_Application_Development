// Function to check if the input matrix is symmetric
function checkSymmetry() {
    // Getting input value from textarea
    let input = document.getElementById("matrixInput").value.trim();
    
    // Getting reference to error message and result elements
    let errorMessage = document.getElementById("errorMessage");
    let result = document.getElementById("result");

    // Clearing previous messages
    errorMessage.innerText = "";
    result.innerText = "";

    // Splitting input into rows and converting to numbers
    let rows = input.split("\n").map(row => row.trim().split(/\s+/).map(Number));

    // Checking if the input is a valid 3x3 matrix
    if (rows.length !== 3 || !rows.every(row => row.length === 3 && row.every(num => !isNaN(num)))) {
        errorMessage.innerText = "⚠️ Please enter a valid 3×3 matrix with numbers only!";
        return;
    }

    // Variable to track if the matrix is symmetric
    let isSymmetric = true;

    // Loop through the matrix to check symmetry
    for (let i = 0; i < 3; i++) {
        for (let j = 0; j < 3; j++) {
            if (rows[i][j] !== rows[j][i]) {
                isSymmetric = false;
                break;
            }
        }
    }

    // Displaying the result
    result.innerText = isSymmetric 
        ? "✅ The matrix is symmetric!" 
        : "❌ The matrix is NOT symmetric!";
    result.style.color = isSymmetric ? "green" : "red";
}
