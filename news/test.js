var linkify = require('linkifyjs');
var linkifyHtml = require('linkifyjs/html');

var readline = require('readline');
var rl = readline.createInterface({
  input: process.stdin,
  output: process.stdout,
  terminal: false
});

rl.on('line', function(line){
	console.log (linkifyHtml(line));
})



