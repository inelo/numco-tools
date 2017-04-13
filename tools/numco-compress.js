var numco = require('numco');
var args = process.argv.slice(2);
if (args.length!==1) {
    console.error("Expected 1 parameter (JSON array).");
    return;
}

var arrayToCompress = JSON.parse(args[0]);
console.log(numco.compress(arrayToCompress));