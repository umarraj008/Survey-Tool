const Express = require("express");
const Mysql = require("mysql");
const Dotenv = require("dotenv");
const BodyParser = require("body-parser");
const Htmlspecialchars = require("htmlspecialchars");
const Path = require("path");

const app = Express();
const port = process.env.PORT || 3000;
const address = "localhost";
const path = __dirname.replace("server", "public")
const urlencodedParser = BodyParser.urlencoded({extended: false});

Dotenv.config({path: __dirname + "\\.env"});

//Static files routing
app.use(Express.static("public"));
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
    firstName = Htmlspecialchars(firstName);
    lastName = Htmlspecialchars(lastName);
    dateOfBirth = Htmlspecialchars(dateOfBirth);
    email = Htmlspecialchars(email);
    password = Htmlspecialchars(password);
    confirmPassword = Htmlspecialchars(confirmPassword);

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

    //If there are errors then redirect user to register page with error message
    if (error.status) {
        res.redirect("register.html?error=" + error.message);
        return;
    }

    //check if email is already used
    db.query("SELECT * FROM user WHERE email='" + email + "'", (error, results) => {
        if (!error) {
            if (results.length > 0) {
                //more than 1 user exists with email -> send error message
                res.redirect("register.html?error=Email is already used by another account.");
                return;
            } else {
                //add user to db
                db.query("INSERT INTO user (first_name, last_name, date_of_birth, email, password, account_verified) VALUES ('" + 
                        firstName + "', '" + 
                        lastName + "', '" + 
                        dateOfBirth + "', '" + 
                        email + "', '" + 
                        password + "', '" + 
                        0 + "')", (error, results) => {
                            
                    if (!error) {
                        //redirect user
                        res.redirect("dashboard.html?notif=Welcome to Cool Surveys");
                        return;
                    } else {
                        //send error message
                        res.redirect("register.html?error=Server Error: " + error);
                        return;
                    }
                });
            }
        } else {
            //send error message
            res.redirect("register.html?error=Server Error: " + error);
            return;
        }
    });
});

//Login requests
app.post("/login", urlencodedParser, (req, res) => {
    console.log(req.body);
    res.sendStatus(200);
});

//Database connection setup
var db = Mysql.createPool({
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
