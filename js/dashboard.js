// Function used when a survey is clicked on the dashboard
// redirecting users to view survey results
function openSurveyResults(id) { 
    location.href = "viewResults.php?sid=" + id; 
}

// Function to copy survey code to clipboard
function copyLink(code) {
    navigator.clipboard.writeText("http://localhost/survey-tool/survey.php?id=" + code);
    notification("Link Coppied: " + ("http://localhost/survey-tool/survey.php?id=" + code));
}