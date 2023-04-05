const Pool = require('pg').Pool;

const { DB_PASSWORD, DB_USERNAME } = process.env;

const pool = new Pool({
    user: "postgres",
    password: "king6123",
    host: "localhost",
    port: "5432",
    database: "obeassist"
});
if (pool) {
    console.log("connected to db!");
} else {
    console.log('Not connected to db!')
}

module.exports = pool;