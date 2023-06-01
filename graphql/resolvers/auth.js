const pool = require("../../config");
const bcrypt = require("bcrypt");
const jwt = require('jsonwebtoken');
const { transformUser } = require("../helpers/transform");

exports.authResolvers = {
    Query: {
        user: () => {
            return "Hello world!";
        },
        login: async (_, args) => {
            const email = args.userInput.email;
            const password = args.userInput.password;
            var existingUser, role;
            try {

                existingUser = await pool.query(
                    'SELECT * FROM learner WHERE email=$1',
                    [email]
                );
                role = "learner"


                if (existingUser.rows.length === 0) {
                    console.log('dadadadasda')
                    existingUser = await pool.query(
                        'SELECT * FROM admin_user WHERE email=$1',
                        [email]
                    );
                    role = "admin"
                }
                if (existingUser.rows.length === 0) {
                    existingUser = await pool.query(
                        'SELECT * FROM resource_person WHERE email=$1',
                        [email]
                    );
                    role = "resource_person"
                    console.log(existingUser, email)
                }



                if (existingUser.rows.length === 0) {
                    return new Error("User doesn't exist, Please Register");
                }
                var validPassword;
                if (role == 'resource_person') {
                    console.log('dadadasd', existingUser.rows[0])
                    const test = await pool.query(
                        'SELECT * FROM admin_user WHERE password=$1',
                        [existingUser ? existingUser.rows[0].password : '']
                    );
                    validPassword = true
                    console.log('jjjjjjjjjjjjjjjjjjj', existingUser ? existingUser.rows[0].password : '')
                } else {
                    console.log('jjjjjjjjjjjjjjjjjjj2222222222222222')
                    validPassword = await bcrypt.compare(password, existingUser.rows[0].password ? existingUser.rows[0].password : existingUser.rows[0].password);
                }
                if (validPassword) {
                    console.log('dadada11111111111111sd', existingUser.rows[0])
                    const token = jwt.sign({ email: existingUser.rows[0].email, id: existingUser.rows[0].learner_id ? existingUser.rows[0].learner_id : existingUser.rows[0].admin_id ? existingUser.rows[0].admin_id : '', date: new Date() }, process.env.SECRET, { expiresIn: "1hr" });


                    return {
                        token,
                        user: { email: existingUser.rows[0].email, id: existingUser.rows[0].learner_id ? existingUser.rows[0].learner_id : existingUser.rows[0].admin_id ? existingUser.rows[0].admin_id : '' },
                        role
                    };
                } else {
                    return new Error('Incorrect Password!');
                }
            } catch (err) {
                console.log("aaaaa" + err)
                throw err
            }
        }
    },
    Mutation: {
        createUser: async (_, args) => {
            try {
                const email = args.userInput.email;
                const password = args.userInput.password;
                var existingUser = await pool.query(
                    'SELECT * FROM learner WHERE email=$1',
                    [email]
                );

                if (existingUser.rows.length === 0) {
                    existingUser = await pool.query(
                        'SELECT * FROM admin_user WHERE email=$1',
                        [email]
                    );
                }

                if (existingUser.rows.length !== 0) {
                    return new Error('User already exists!');
                }

                const saltRound = 10;
                const salt = await bcrypt.genSalt(saltRound);
                const bcryptPassword = await bcrypt.hash(password, salt);

                newUser = await pool.query(
                    'INSERT INTO learner(learner_id, email, password, batch_id, semester_id, name) VALUES($1, $2, $3, 3,1, $4) RETURNING *',
                    [Math.floor(Math.random() * 1000 + Math.random() * 10000), email, bcryptPassword, email.split("@")[0]]
                );
                console.log(newUser.rows[0])
                return transformUser(newUser.rows[0]);

            } catch (err) {
                console.log(err.message);
                throw err;
            }
        },

    }
}