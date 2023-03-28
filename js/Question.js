class Question {
    constructor(id, type, text) {
        this.id = id;
        this.type = type;
        this.text = text;
        this.options = [];
    }

    addOption(option) {
        this.options.push(option);
    }
}