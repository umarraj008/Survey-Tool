const EXPRESS = require("express");
const MYSQL = require("mysql");
const DOTENV = require("dotenv")
const APP = EXPRESS();
const PORT = process.env.PORT || 3000;
const ADDRESS = "localhost";

DOTENV.config({path: "./.env"});

const SERVER = APP.listen(PORT, () => {
    console.clear();
    console.log("Server has started.");
    console.log("Listening at: " + ADDRESS + ":" + PORT);
});

const PATH = __dirname.replace("server", "public/index.html")
// console.log(PATH);
APP.use(EXPRESS.static(PATH));

APP.get('/', (req, res) => {  
    res.sendFile(PATH);
});

// //database connection setup
// var db = MYSQL.createPool({
//     host:     process.env.DATABASE_HOST,
//     database: process.env.DATABASE_NAME,
//     user:     process.env.DATABASE_USERNAME,
//     password: process.env.DATABASE_PASSWORD,
// });

// //database test connection
// db.query("SELECT 1", (error, results, fields) => {
//     if (error) throw error
//     console.log("Connected to Database"); 
// });

// //database error handler
// db.on("error", error => {
//     console.log("Disconnected From Database");
//     if (error.code == "PROTOCOL_CONNECTION_LOST") {
//         db = MYSQL.createConnection({
//             host:     process.env.DATABASE_HOST,
//             database: process.env.DATABASE_NAME,
//             user:     process.env.DATABASE_USERNAME,
//             password: process.env.DATABASE_PASSWORD,
//         });
//     } else {
//         throw error;
//     }
// });
