var numberOfQuestions = 1;

function addQuestion(type) {
    questionContainer = document.getElementById("questions-container");

    switch (type) {
        case "TextBox":
            let textBox = makeOpenTextBox(numberOfQuestions++);
            questionContainer.appendChild(textBox);
            break;

        case "MultipleChoice":
            break;
            
        case "YesNoChoice":
            break;
            

    }
}

function makeOpenTextBox(index) {
    var openTextBox;

    //Creating Question Elements
    
    let li = document.createElement("li");
    li.setAttribute("class", "open-ended-question question");
    li.setAttribute("id", "q" + index);

    let topContainer = document.createElement("div");
    topContainer.setAttribute("id", "top-container");

    let questionNumberContainer = document.createElement("div");
    questionNumberContainer.setAttribute("id", "question-number-container");

    let questionNumberText = document.createElement("p");
    questionNumberText.setAttribute("class", "question-number-text");
    questionNumberText.innerHTML = "Q" + index;

    let questionTypeContainer = document.createElement("div");
    questionTypeContainer.setAttribute("id", "question-type-container");

    let questionTypeText = document.createElement("p");
    questionTypeText.innerHTML = "Text Box Question";

    let deleteQuestionContainer = document.createElement("div");
    deleteQuestionContainer.setAttribute("id", "delete-question-container");

    let deleteButton = document.createElement("a");
    deleteButton.setAttribute("class", "deleteQuestion")
    deleteButton.setAttribute("href", "#")
    deleteButton.setAttribute("onclick", "deleteQuestion(" + index + ")");
    deleteButton.innerHTML = "Delete Question";

    let bottomContainer = document.createElement("div");
    bottomContainer.setAttribute("id", "bottom-container");

    let leftContainer = document.createElement("div");
    leftContainer.setAttribute("id", "left-container");
    
    let kababMenu = document.createElement("div");
    kababMenu.setAttribute("class", "kabab-menu");

    let kababDotContainer = document.createElement("div");
    kababDotContainer.setAttribute("class", "dot-container");
    
    let kababDot = document.createElement("div")
    
    let rightContainer = document.createElement("div");
    rightContainer.setAttribute("id", "right-container");

    let questionTextLabel = document.createElement("p");
    questionTextLabel.innerHTML = "Question Text";

    let questionInput = document.createElement("input");
    questionInput.setAttribute("class", "questionInput");
    questionInput.setAttribute("type", "text");
    questionInput.setAttribute("name", "question" + index);
    questionInput.setAttribute("form", "survey");
    questionInput.setAttribute("value", "");
    questionInput.setAttribute("placeholder", "Enter your question here...");

    //Constructing the question

    kababDotContainer.appendChild(kababDot);
    kababDotContainer.appendChild(kababDot.cloneNode(true));
    kababMenu.appendChild(kababDotContainer);
    kababMenu.appendChild(kababDotContainer.cloneNode(true));
    kababMenu.appendChild(kababDotContainer.cloneNode(true));

    leftContainer.appendChild(kababMenu);
    rightContainer.appendChild(questionTextLabel);
    rightContainer.appendChild(questionInput);
    bottomContainer.appendChild(leftContainer);
    bottomContainer.appendChild(rightContainer);
    questionNumberContainer.appendChild(questionNumberText);
    questionTypeContainer.appendChild(questionTypeText);
    deleteQuestionContainer.appendChild(deleteButton);
    topContainer.appendChild(questionNumberContainer);
    topContainer.appendChild(questionTypeContainer);
    topContainer.appendChild(deleteQuestionContainer);
    li.appendChild(topContainer);
    li.appendChild(bottomContainer);
    
    openTextBox = li;
    return openTextBox;
}

function deleteQuestion(index) {
    questionContainer.removeChild(document.getElementById("q" + index));
    
    let liIds = document.getElementsByClassName("question");
    for (i = 0; i < liIds.length; i++) {
        liIds[i].setAttribute("id", "q" + (i+1));
    }

    let questions = document.getElementsByClassName("question-number-text");
    for (i = 0; i < questions.length; i++) {
        questions[i].innerHTML = "Q" + (i+1);
    }

    let deleteQuestion = document.getElementsByClassName("deleteQuestion");
    for (i = 0; i < deleteQuestion.length; i++) {
        deleteQuestion[i].setAttribute("onclick", "deleteQuestion(" + (i+1) + ")");
    }

    let questionInput = document.getElementsByClassName("questionInput");
    for (i = 0; i < questionInput.length; i++) {
        questionInput[i].setAttribute("name", "question" + (i+1));
    }

    numberOfQuestions = liIds.length;
}