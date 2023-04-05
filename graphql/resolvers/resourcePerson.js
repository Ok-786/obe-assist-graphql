const pool = require("../../config");
const bcrypt = require("bcrypt");
const jwt = require('jsonwebtoken');
const { transformUser } = require("../helpers/transform");

exports.resourcePersonResolvers = {
    Query: {
        resourcePersons: async (_, args) => {
            try {
                existingUser = await pool.query(
                    `SELECT * 
                    FROM resource_person
                    `
                );
                console.log(existingUser.rows)
                return existingUser.rows.map(row => transformUser(row));

            } catch (err) {
                throw err;
            }
        }

    },

}