var textBoxQuestionList = [];

// Function to set a questions chart data
function setChartData(pieCanvas, barCanvas, options, data) {
    pieCanvas = document.getElementById(pieCanvas);
    barCanvas = document.getElementById(barCanvas);

    // Pie chart
    new Chart(pieCanvas, {
        type: 'doughnut',
        data: {
            labels: options.split(","),
            datasets: [{
                label: '# of Votes',
                data: data.split(","),
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });

    // Bar chart
    new Chart(barCanvas, {
        type: 'bar',
        data: {
            labels: options.split(","),
            datasets: [{
                label: '# of Votes',
                data: data.split(","),
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

// Function to set a questions textbox data
function setTextBoxData(textBoxID, questionIndex, answerString) {
    var textBoxQuestion = new TextBoxQuestion();
    var answers = answerString.split("#@#");
    
    textBoxQuestion.setTextBoxID(textBoxID);
    textBoxQuestion.setAnswers(answers);

    textBoxQuestionList.push(textBoxQuestion);

    setTextBoxAnswer(textBoxID, questionIndex-1, 0);
}

// Function used for non textbox questions so that textbox questions work
function setTextBoxDataEmpty() {
    var textBoxQuestion = new TextBoxQuestion();
    // var answers = answerString.split("#@#");
    var answers = [];
    textBoxQuestion.setTextBoxID("");
    textBoxQuestion.setAnswers(answers);
    textBoxQuestionList.push(textBoxQuestion);
}

// Function to update the current answer that is displayed in a textbox question
function setTextBoxAnswer(id, questionIndex, answerIndex) {
    console.log("id: " + id);
    console.log("questionIndex: " + questionIndex);
    console.log("answerIndex: " + answerIndex);
    console.log(textBoxQuestionList);
    var textBoxAnswer = document.getElementById(id);
    textBoxAnswer.innerHTML = textBoxQuestionList[questionIndex].getAnswer(answerIndex);
    updateTotal(questionIndex);
}

// Function to make next button work in textbox questions
function nextTextBoxAnswer(id, questionIndex) {
    setTextBoxAnswer(id, questionIndex-1, textBoxQuestionList[questionIndex-1].nextAnswer());
}

// Function to make previous button work in textbox questions
function previousTextBoxAnswer(id, questionIndex) {
    setTextBoxAnswer(id, questionIndex-1, textBoxQuestionList[questionIndex-1].previousAnswer());
}

// Function to update the answer number in textbox questions
function updateTotal(questionIndex) {
    var textBoxTotal = document.getElementById("TextBoxTotal" + (questionIndex+1));
    textBoxTotal.innerHTML = textBoxQuestionList[questionIndex].getTotal();
}