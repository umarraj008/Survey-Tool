var survey = null;
var question = null;
var options = [];

function setSurvey(id, name, code, description, status) {
    survey = new Survey(id, name, description, status, code);
}

function setQuestion(id, type, text) {
    question = new Question(id, type, text);
}

function setOption(id, type, text) {
    var option = new Option(id, type, text);
    options.push(option);
}

function addQuestionToSurvey() {
    options.forEach(option => {
        question.addOption(option);
    });

    survey.addQuestion(question);

    question = null;
    options = [];
}

function deleteScripts() {
    var scripts = document.getElementsByClassName("deleteScript")
    console.log(scripts);

    for (i = scripts.length-1; i >= 0; i--) {
        scripts[i].parentNode.removeChild(scripts[i]);
    }
    
    scripts = document.getElementsByClassName("deleteScript")
    console.log(scripts);
}

function startSurvey() {
    document.getElementById("survey-start").style.opacity = 0;
    document.getElementById("survey-start").style.transform = "translateX(-50px)";
    setTimeout(() => {
        document.getElementById("survey-start").style.visibility = "hidden";
        document.getElementById("survey-start").style.transform = "translateX(50px)";
        //document.getElementById("survey-start").parentNode.removeChild(document.getElementById("survey-start"));
    }, 300);
}