const pool = require("../../config");
const bcrypt = require("bcrypt");
const jwt = require('jsonwebtoken');
const { transformUser } = require("../helpers/transform");

exports.learnerResolvers = {
    Query: {
        learners: async (_, args) => {
            try {
                console.log('adadadad')
                existingUser = await pool.query(
                    `SELECT * 
                    FROM learner 
                    LEFT JOIN batches 
                        ON learner.batch_id = batches.batch_id
                    LEFT JOIN semester
                        ON learner.semester_id = semester.semester_id
            
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

