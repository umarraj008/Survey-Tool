function openSurveyResults(id) { 
    location.href = "viewResults.php?sid=" + id; 
}

function copyLink(code) {
    navigator.clipboard.writeText("http://localhost/survey-tool/survey.php?id=" + code);
}