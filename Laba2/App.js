var express = require("express");
var port = 3000;
var bodyParser = require("body-parser");
var app = express();


app.use(bodyParser.json());
app.use(
    bodyParser.urlencoded({
        extended: true
    })
);


var mysql = require('mysql')

var connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'the_app_database'
})

connection.connect(function (err) {
    if (err) throw err
    console.log('You are now connected...')
})

// Get number like http://localhost:3000/p/34
app.get("/p/:number", function (req, res) {
    res.send(req.params.number);
});

// Get number like http://localhost:3000/p?number=5
app.get('/p', function (req, res) {
    res.send(req.query.number);
});

app.get('/client', function (req, res) {
    connection.query('SELECT * FROM client', function (error, results, fields) {
        if (error) throw error;
        return res.send({
            error: false,
            data: results,
            message: 'client list.'
        });
    });
});



// Retrieve client with id 
app.get('/client/:id', function (req, res) {
    let user_id = req.params.id;
    if (!user_id) {
        return res.status(400).send({
            error: true,
            message: 'Please provide client_id'
        });
    }
    connection.query('SELECT * FROM client where id_client=?', user_id, function (error, results, fields) {
        if (error) throw error;
        return res.send({
            error: false,
            data: results[0],
            message: 'client list.'
        });
    });
});

 app.post('/users', (request, response) => {
     connection.query('INSERT INTO client SET ?', request.body, (error, result) => {
         if (error) throw error;

         response.status(201).send(`User added with ID: ${result.insertId}`);
     });
 });

 
app.post('/clientw/:id', (request, response) => {
    const id = request.params.id;

    connection.query('UPDATE client SET? WHERE id_client=?', [request.body, id], (error, result) => {
        if (error) throw error;

        response.send('User updated successfully.');
    });
});
app.post('/clienttt/:id', (request, response) => {
    const id = request.params.id;

    connection.query('DELETE FROM client WHERE id_client = ?', id, (error, result) => {
        if (error) throw error;

        response.send('User deleted.');
    });
});
// Start the server
var server = app.listen(port, error => {
    if (error) return console.log(`Error: ${error}`);

    console.log(`Server listening on port ${server.address().port}`);
});