class Survey {
    constructor(id, name, description, status, code) {
        this.id = id;
        this.name = name;
        this.description = description;
        this.status = status;
        this.code = code;
        this.questions = [];
    }

    addQuestion(question) {
        this.questions.push(question);
    }
}