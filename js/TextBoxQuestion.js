class TextBoxQuestion {
    constructor(textBoxID, answers) {
        this.textBoxID = textBoxID;
        this.currentAnswer = 0;
        this.answers = answers;
    }

    nextAnswer() {
        this.currentAnswer++;
        if (this.currentAnswer >= this.answers.length) {
            this.currentAnswer = 0;
        }
        return this.currentAnswer;
    }

    previousAnswer() {
        this.currentAnswer--;
        if (this.currentAnswer <= -1) {
            this.currentAnswer = this.answers.length-1;
        }
        return this.currentAnswer;
    }

    setTextBoxID(textBoxID) { 
        this.textBoxID = textBoxID; 
    }

    setAnswers(answers) { 
        this.answers = answers; 
    }

    getAnswer(index) { 
        return this.answers[index]; 
    }

    getCurrentAnswerIndex() { 
        return this.currentAnswer; 
    }

    getTotal() {
        return (this.currentAnswer + 1) + " / " + this.answers.length; 
    }
}