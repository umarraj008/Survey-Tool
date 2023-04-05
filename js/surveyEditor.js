var numberOfQuestions = 1;

function addQuestion(type) {
    questionContainer = document.getElementById("questions-container");

    switch (type) {
        case "TextBox":
            let textBox = makeOpenTextBox(numberOfQuestions++);
            questionContainer.appendChild(textBox);
            break;

        case "MultipleChoice":
            let multipleChoice = makeMultipleChoice(numberOfQuestions++);
            questionContainer.appendChild(multipleChoice);
            break;
            
        case "YesNoChoice":
            let yesNoChoice = makeYesNoChoice(numberOfQuestions++);
            questionContainer.appendChild(yesNoChoice);
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
    // questionInput.setAttribute("name", "question" + index);
    questionInput.setAttribute("name", "question[]");
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

function makeMultipleChoice(index) {
    var openTextBox;

    //Creating Question Elements
    
    let li = document.createElement("li");
    li.setAttribute("class", "multiple-choice-question question");
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
    questionTypeText.innerHTML = "Multiple Choice Question";
    
    let addOptionContainer = document.createElement("div");
    addOptionContainer.setAttribute("id", "add-option-container");

    let addOptionButton = document.createElement("a");
    addOptionButton.setAttribute("class", "addOption")
    addOptionButton.setAttribute("href", "#")
    addOptionButton.setAttribute("onclick", "addOption(" + index + ")");
    addOptionButton.innerHTML = "Add Option";

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
    questionInput.setAttribute("name", "question[]");
    questionInput.setAttribute("form", "survey");
    questionInput.setAttribute("value", "");
    questionInput.setAttribute("placeholder", "Enter your question here...");

    let optionContainer = document.createElement("div");
    optionContainer.setAttribute("id", "option-container");

    // option 1
    let option1 = document.createElement("div");
    option1.setAttribute("class", "option");

    let optionLabel1 = document.createElement("p");
    optionLabel1.setAttribute("class", "option-label");
    optionLabel1.innerHTML = "Option 1:";

    let optionInput1 = document.createElement("input");
    optionInput1.setAttribute("class", "optionInput");
    optionInput1.setAttribute("type", "text");
    optionInput1.setAttribute("name", "question" + index + "option[]");
    optionInput1.setAttribute("form", "survey");
    optionInput1.setAttribute("value", "");
    optionInput1.setAttribute("placeholder", "Answer goes here...");

    let optionRemove1 = document.createElement("a");
    optionRemove1.setAttribute("href", "#")
    optionRemove1.setAttribute("onclick", "removeOption(" + index + ")");
    optionRemove1.innerHTML = "Remove";

    // option 2
    let option2 = document.createElement("div");
    option2.setAttribute("class", "option");

    let optionLabel2 = document.createElement("p");
    optionLabel2.setAttribute("class", "option-label");
    optionLabel2.innerHTML = "Option 2:";

    let optionInput2 = document.createElement("input");
    optionInput2.setAttribute("class", "optionInput");
    optionInput2.setAttribute("type", "text");
    optionInput2.setAttribute("name", "question" + index + "option[]");
    optionInput2.setAttribute("form", "survey");
    optionInput2.setAttribute("value", "");
    optionInput2.setAttribute("placeholder", "Answer goes here...");

    let optionRemove2 = document.createElement("a");
    optionRemove2.setAttribute("href", "#")
    optionRemove2.setAttribute("onclick", "removeOption(" + index + ")");
    optionRemove2.innerHTML = "Remove";

    // option 3
    let option3 = document.createElement("div");
    option3.setAttribute("class", "option");

    let optionLabel3 = document.createElement("p");
    optionLabel3.setAttribute("class", "option-label");
    optionLabel3.innerHTML = "Option 3:";

    let optionInput3 = document.createElement("input");
    optionInput3.setAttribute("class", "optionInput");
    optionInput3.setAttribute("type", "text");
    optionInput3.setAttribute("name", "question" + index + "option[]");
    optionInput3.setAttribute("form", "survey");
    optionInput3.setAttribute("value", "");
    optionInput3.setAttribute("placeholder", "Answer goes here...");

    let optionRemove3 = document.createElement("a");
    optionRemove3.setAttribute("href", "#")
    optionRemove3.setAttribute("onclick", "removeOption(" + index + ")");
    optionRemove3.innerHTML = "Remove";

    // option 4
    let option4 = document.createElement("div");
    option4.setAttribute("class", "option");

    let optionLabel4 = document.createElement("p");
    optionLabel4.setAttribute("class", "option-label");
    optionLabel4.innerHTML = "Option 4:";

    let optionInput4 = document.createElement("input");
    optionInput4.setAttribute("class", "optionInput");
    optionInput4.setAttribute("type", "text");
    optionInput4.setAttribute("name", "question" + index + "option[]");
    optionInput4.setAttribute("form", "survey");
    optionInput4.setAttribute("value", "");
    optionInput4.setAttribute("placeholder", "Answer goes here...");

    let optionRemove4 = document.createElement("a");
    optionRemove4.setAttribute("href", "#")
    optionRemove4.setAttribute("onclick", "removeOption(" + index + ")");
    optionRemove4.innerHTML = "Remove";

    //Constructing the question

    kababDotContainer.appendChild(kababDot);
    kababDotContainer.appendChild(kababDot.cloneNode(true));
    kababMenu.appendChild(kababDotContainer);
    kababMenu.appendChild(kababDotContainer.cloneNode(true));
    kababMenu.appendChild(kababDotContainer.cloneNode(true));
    
    option1.appendChild(optionLabel1);
    option1.appendChild(optionInput1);
    option1.appendChild(optionRemove1);
    
    option2.appendChild(optionLabel2);
    option2.appendChild(optionInput2);
    option2.appendChild(optionRemove2);

    option3.appendChild(optionLabel3);
    option3.appendChild(optionInput3);
    option3.appendChild(optionRemove3);

    option4.appendChild(optionLabel4);
    option4.appendChild(optionInput4);
    option4.appendChild(optionRemove4);

    optionContainer.appendChild(option1);
    optionContainer.appendChild(option2);
    optionContainer.appendChild(option3);
    optionContainer.appendChild(option4);

    leftContainer.appendChild(kababMenu);
    rightContainer.appendChild(questionTextLabel);
    rightContainer.appendChild(questionInput);
    rightContainer.appendChild(optionContainer);
    bottomContainer.appendChild(leftContainer);
    bottomContainer.appendChild(rightContainer);
    questionNumberContainer.appendChild(questionNumberText);
    questionTypeContainer.appendChild(questionTypeText);
    addOptionContainer.appendChild(addOptionButton);
    deleteQuestionContainer.appendChild(deleteButton);
    topContainer.appendChild(questionNumberContainer);
    topContainer.appendChild(questionTypeContainer);
    topContainer.appendChild(addOptionContainer);
    topContainer.appendChild(deleteQuestionContainer);
    li.appendChild(topContainer);
    li.appendChild(bottomContainer);
    
    openTextBox = li;
    return openTextBox;
}

function makeYesNoChoice(index) {

}

function deleteQuestion(index) {
    //delete question
    questionContainer.removeChild(document.getElementById("q" + index));
    
    //reasign questions ids
    let liIds = document.getElementsByClassName("question");
    for (i = 0; i < liIds.length; i++) {
        liIds[i].setAttribute("id", "q" + (i+1));
    }

    //reasign questions numbers
    let questions = document.getElementsByClassName("question-number-text");
    for (i = 0; i < questions.length; i++) {
        questions[i].innerHTML = "Q" + (i+1);
    }

    //reasign questions delete index
    let deleteQuestion = document.getElementsByClassName("deleteQuestion");
    for (i = 0; i < deleteQuestion.length; i++) {
        deleteQuestion[i].setAttribute("onclick", "deleteQuestion(" + (i+1) + ")");
    }

    //reasign questions input index
    let questionInput = document.getElementsByClassName("questionInput");
    for (i = 0; i < questionInput.length; i++) {
        questionInput[i].setAttribute("name", "question" + (i+1));
    }

    //recount number of questions
    numberOfQuestions = liIds.length;
}