var numco = require('numco');
var args = process.argv.slice(2);
if (args.length!==1) {
    console.error("Expected 1 parameter (JSON array).");
    return;
}

console.log(numco.decompress(args[0]));