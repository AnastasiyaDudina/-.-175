var express = require("express");
var port = 3000;
var bodyParser = require("body-parser");
var app = express();
let request = require('request');

app.use(bodyParser.json());
app.use(
  bodyParser.urlencoded({
    extended: true
  })
);
 



//No. 1
// Get number like http://localhost:3000/p/34
app.get("/p/:number", function(req, res) {
  res.send(req.params.number);
});
 
// Get number like http://localhost:3000/p?number=5
app.get('/p', function (req, res) {
    res.send(req.query.number);
});

//No. 2

app.get("/", (req, res)=>
{
    request.get("http://www.mocky.io/v2/5c7db5e13100005a00375fda", function(error, response, body)
    {
        let string_X=body;
        let objX=JSON.parse(string_X);

        let array=objX.result.split(" ");
        objX.result=array.join("_");

        let jsonX = JSON.stringify(objX);
        res.send(jsonX);
    });
});


Deal.findById = (dealId, result) => {
sql.query(`SELECT * FROM TODO WHERE id = ${dealId}`, (err, res) => {
if (err) {
console.log(«error: », err);
result(err, null);
return;
}

if (res.length) {
console.log(«найдено дело: », res[0]);
result(null, res[0]);
return;
}

// когда ничего не удалось найти
result({ kind: «not_found» }, null);
});
};

Deal.getAll = result => {
sql.query(«SELECT * FROM TODO», (err, res) => {
if (err) {
console.log(«error: », err);
result(null, err);
return;
}

console.log(«deals: », res);
result(null, res);
});
};

Deal.updateById = (id, deal, result) => {
sql.query(
«UPDATE TODO SET text =? WHERE id = ?»,
[deal.text, id],
(err, res) => {
if (err) {
console.log(«error: », err);
result(null, err);
return;
}

if (res.affectedRows == 0) {
result({ kind: «not_found» }, null);
return;
}

console.log(«Обновлено дело », { id: id, ...deal });
result(null, { id: id, ...deal });
}
);
};

Deal.remove = (id, result) => {
sql.query(«DELETE FROM TODO WHERE id = ?», id, (err, res) => {
if (err) {
console.log(«error: », err);
result(null, err);
return;
}

if (res.affectedRows == 0) {
// если дело не удалось получить по id
result({ kind: «not_found» }, null);
return;
}
console.log(«Удален пользователь с », id);
result(null, res);
});
};

Deal.removeAll = result => {
sql.query(«DELETE FROM TODO», (err, res) => {
if (err) {
console.log(«error: », err);
result(null, err);
return;
}

console.log(`deleted ${res.affectedRows} deals`);
result(null, res);
});
};

const pool = require('../data/config');

// Route the app
const router = app => {
    // Display welcome message on the root
    app.get('/', (request, response) => {
        response.send({
            message: 'Welcome to the Node.js Express REST API!'
        });
    });

    // Display all users
    app.get('/users', (request, response) => {
        pool.query('SELECT * FROM users', (error, result) => {
            if (error) throw error;

            response.send(result);
        });
    });

    // Display a single user by ID
    app.get('/users/:id', (request, response) => {
        const id = request.params.id;

        pool.query('SELECT * FROM users WHERE id = ?', id, (error, result) => {
            if (error) throw error;

            response.send(result);
        });
    });

    // Add a new user
    app.post('/users', (request, response) => {
        pool.query('INSERT INTO users SET ?', request.body, (error, result) => {
            if (error) throw error;

            response.status(201).send(`User added with ID: ${result.insertId}`);
        });
    });

    // Update an existing user
    app.put('/users/:id', (request, response) => {
        const id = request.params.id;

        pool.query('UPDATE users SET ? WHERE id = ?', [request.body, id], (error, result) => {
            if (error) throw error;

            response.send('User updated successfully.');
        });
    });

    // Delete a user
    app.delete('/users/:id', (request, response) => {
        const id = request.params.id;

        pool.query('DELETE FROM users WHERE id = ?', id, (error, result) => {
            if (error) throw error;
            response.send('User deleted.');
        });
    });
}

// Export the router
module.exports = router;
// Start the server
var server = app.listen(port, error => {
  if (error) return console.log(`Error: ${error}`);

  console.log(`Server listening on port ${server.address().port}`);
});