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


app.get('/abc', function tt (req, res) {
    var a = req.query.a;
    var b = req.query.b;
    var c = req.query.c;
    var D = b*b-4*(a*c);
    if (D>0) {
        var x1 = (-1 * b - (Math.sqrt(D))) / 2 * a;
        var x2 = (-1 * b + (Math.sqrt(D))) / 2 * a;
        res.send({x1:x1, x2:x2});
    }
    else{
        if (D === 0) {
            var x = (-1 * b) / 2 * a;
            res.send({x:x});
        }
        else{
            res.send("действительных корней нет");
        }
    }

});

//No. 3
app.get('/day', function (req, res) {
    var date = req.query.date;
    date = new Date(date);
    var day = date.getDay();
    var days = ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'];
    res.send({
        days: days[day]
    });
});


 //NO. 4
 app.get("/fib/:num", function (req, res) {
    var n = req.params.num;
    var a = 1,
        b = 1;
    for (let i = 3; i <= n; i++) {
        var temp = a + b;
        a = b;
        b = temp;
     };
     res.send({
         "число Фибоначчи": b
     });
 });



// Start the server
var server = app.listen(port, error => {
  if (error) return console.log(`Error: ${error}`);

  console.log(`Server listening on port ${server.address().port}`);
});