var textBoxQuestionList = [];

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

function setTextBoxData(textBoxID, questionIndex, answerString) {
    var textBoxQuestion = new TextBoxQuestion();
    var answers = answerString.split("#@#");
    
    textBoxQuestion.setTextBoxID(textBoxID);
    textBoxQuestion.setAnswers(answers);

    textBoxQuestionList.push(textBoxQuestion);

    setTextBoxAnswer(textBoxID, questionIndex-1, 0);
}

function setTextBoxAnswer(id, questionIndex, answerIndex) {
    var textBoxAnswer = document.getElementById(id);
    textBoxAnswer.innerHTML = textBoxQuestionList[questionIndex].getAnswer(answerIndex);
    updateTotal(questionIndex);
}

function nextTextBoxAnswer(id, questionIndex) {
    setTextBoxAnswer(id, questionIndex-1, textBoxQuestionList[questionIndex-1].nextAnswer());
}

function previousTextBoxAnswer(id, questionIndex) {
    setTextBoxAnswer(id, questionIndex-1, textBoxQuestionList[questionIndex-1].previousAnswer());
}

function updateTotal(questionIndex) {
    var textBoxTotal = document.getElementById("TextBoxTotal" + (questionIndex+1));
    textBoxTotal.innerHTML = textBoxQuestionList[questionIndex].getTotal();
}