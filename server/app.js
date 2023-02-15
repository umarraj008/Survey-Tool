const express = require("express");
const mysql = require("mysql");
const dotenv = require("dotenv");
const bodyParser = require("body-parser");
const htmlspecialchars = require("htmlspecialchars");
const path = require("path");

const app = express();
const port = process.env.PORT || 3000;
const address = "localhost";
const path = __dirname.replace("server", "public")
const urlencodedParser = bodyParser.urlencoded({extended: false});

dotenv.config({path: __dirname + "\\.env"});

//Static files routing
app.use(express.static("public"));
app.get('/', (req, res) => {  
    res.sendFile(path);
});

//Register requests
app.post("/register", urlencodedParser, (req, res) => {
    var error = {status: false, message: ""}
    
    //validate data
    var data = req.body;
    var firstName = data.first_name;
    var lastName = data.last_name;
    var dateOfBirth = data.date_of_birth;
    var email = data.email;
    var password = data.password;
    var confirmPassword = data.confirm_password;

    //trim data - remove spaces
    firstName = firstName.trim(); 
    lastName = lastName.trim(); 
    dateOfBirth = dateOfBirth.trim(); 
    email = email.trim(); 
    password = password.trim(); 
    confirmPassword = confirmPassword.trim(); 

    //html special characters
    firstName = htmlspecialchars(firstName);
    lastName = htmlspecialchars(lastName);
    dateOfBirth = htmlspecialchars(dateOfBirth);
    email = htmlspecialchars(email);
    password = htmlspecialchars(password);
    confirmPassword = htmlspecialchars(confirmPassword);

    //check if empty
    if (firstName.length <= 0) error = {status: true, message: "Please enter first name."};
    if (lastName.length <= 0) error = {status: true, message: "Please enter last name."};
    if (dateOfBirth.length <= 0) error = {status: true, message: "Please enter date of birth."};
    if (email.length <= 0) error = {status: true, message: "Please enter email."};
    if (password.length <= 0) error = {status: true, message: "Please enter password."};
    if (confirmPassword.length <= 0) error = {status: true, message: "Please enter confirm password."};

    //check if too long
    if (firstName.length > 50) error = {status: true, message: "First name is too long."};
    if (lastName.length > 50) error = {status: true, message: "Last name is too long."};
    if (dateOfBirth.length > 10) error = {status: true, message: "Date of birth too long."};
    if (email.length > 100) error = {status: true, message: "Email too long."};
    if (password.length > 255) error = {status: true, message: "Password too long."};
    if (confirmPassword.length > 255) error = {status: true, message: "Confirm password too long."};

    //check email contain @
    if (!email.includes("@")) error = {status: true, message: "Incorrect email format."};

    //check password confirm match
    if (password != confirmPassword) error = {status: true, message: "Confirm password doesn't match."};

    //check for errors
    if (error.status) {
        res.setHeader
        res.sendFile(path.join("register.html?error=" + error.message));
        return;
    }

    //check if email is already used
    db.query("SELECT * FROM user WHERE email='" + email + "'", (error, results) => {
        if (!error) {
            if (results.length > 0) {
                //send error message
            } else {
                //add user to db
                db.query("INSERT INTO user", (error, results) => {
                    if (!error) {
                        //redirect user
                    } else {
                        //send error message
                    }
                });
            }
        } else {
            //send error message
        }
    });
});

//Login requests
app.post("/login", urlencodedParser, (req, res) => {
    console.log(req.body);
    res.sendStatus(200);
});

//Database connection setup
var db = mysql.createPool({
    host:     process.env.DATABASE_HOST,
    database: process.env.DATABASE_NAME,
    user:     process.env.DATABASE_USERNAME,
    password: process.env.DATABASE_PASSWORD,
});

//Database test connection
db.query("SELECT 1", (error, results, fields) => {
    if (error) throw error
    console.log("Connected to Database"); 
});

//Database error handler
db.on("error", error => {
    console.log("Disconnected From Database");
    if (error.code == "PROTOCOL_CONNECTION_LOST") {
        db = mysql.createConnection({
            host:     process.env.DATABASE_HOST,
            database: process.env.DATABASE_NAME,
            user:     process.env.DATABASE_USERNAME,
            password: process.env.DATABASE_PASSWORD,
        });
    } else {
        throw error;
    }
});

//Start server
app.listen(port, () => {
    console.clear();
    console.log("Server has started.");
    console.log("Listening at: " + address + ":" + port);
});
