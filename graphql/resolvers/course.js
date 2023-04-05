const pool = require("../../config");
const bcrypt = require("bcrypt");
const { transformCourse } = require("../helpers/transform");

exports.courseResolvers = {
    Query: {
        offeredCourses: async (_, args, context) => {
            try {
                // if (!context.isAuth)
                // return new Error("Invalid Jwt Token!");

                existingUser = await pool.query(
                    `SELECT * 
                    FROM offered_courses 
                    JOIN courses 
                        ON courses.course_id = offered_courses.course_id
                    JOIN batches
                        ON batches.batch_id = offered_courses.batch_id
                    JOIN semester
                        ON offered_courses.semester_id = semester.semester_id
                    LEFT JOIN resource_person
                        ON resource_person.resource_person_id = offered_courses.resourceperson_id
                    LEFT JOIN course_definition
                        ON offered_courses.course_id = course_definition.course_id
                    LEFT JOIN course_registration
                        ON offered_courses.course_id = course_registration.course_id
                        AND course_registration.learner_id = $1
                    WHERE course_registration.course_id IS NULL;  
                    `,
                    [context.userId]
                );
                console.log("aaa", existingUser.rows, '6767676')
                return existingUser.rows.map(row => transformCourse(row));

            } catch (err) {
                throw err;
            }
        },

        registeredCourses: async (_, args, context) => {
            try {
                if (!context.isAuth)
                    return new Error("Invalid Jwt Token!");

                existingUser = await pool.query(
                    `SELECT * 
                    FROM offered_courses 
                    JOIN courses 
                        ON courses.course_id = offered_courses.course_id
                    JOIN batches
                        ON batches.batch_id = offered_courses.batch_id
                    JOIN semester
                        ON offered_courses.semester_id = semester.semester_id
                    LEFT JOIN resource_person
                        ON resource_person.resource_person_id = offered_courses.resourceperson_id
                    LEFT JOIN course_definition
                        ON offered_courses.course_id = course_definition.course_id
                    LEFT JOIN course_registration
                        ON offered_courses.course_id = course_registration.course_id
                        AND course_registration.learner_id = $1
                    WHERE course_registration.learner_id = $1  
                    `,
                    [context.userId]
                );
                console.log("aaa", context)
                return existingUser.rows.map(row => transformCourse(row));

            } catch (err) {
                throw err;
            }
        },

        courses: async (_, args, context) => {
            try {
                if (!context.isAuth)
                    return new Error("Invalid Jwt Token!");

                existingUser = await pool.query(
                    `SELECT * 
                    FROM offered_courses 
                    JOIN courses 
                        ON courses.course_id = offered_courses.course_id
                    JOIN batches
                        ON batches.batch_id = batches.batch_id
                    JOIN semester
                        ON offered_courses.semester_id = semester.semester_id
                    LEFT JOIN resource_person
                        ON  resource_person.resource_person_id= offered_courses.resourceperson_id
                    LEFT JOIN course_registration
                        ON offered_courses.course_id = course_registration.course_id 
                    WHERE course_registration.learner_id = $1  
                    `
                );
                console.log("aaa", context, '000000')
                return existingUser.rows.map(row => transformCourse(row));

            } catch (err) {
                throw err;
            }
        },

        course: async (_, args) => {
            const id = args.id;
            console.log(id);
            try {
                existingUser = await pool.query(
                    `SELECT * 
                    FROM course_definition 
                    JOIN courses 
                        ON courses.course_id = course_definition.course_id
                    JOIN program
                        ON course_definition.program_id = program.program_id
                    JOIN resource_person
                        ON course_definition.resource_person_id = resource_person.resource_person_id
                    WHERE course_definition.course_id = $1`, [id]
                );
                // console.log("pppppp", existingUser.rows[0])
                return transformCourse(existingUser.rows[0]);

            } catch (err) {
                console.log(err)
                throw err;
            }
        }
    },
    Mutation: {
        registerCourse: async (_, args, context) => {
            try {
                if (!context.isAuth) {
                    console.log(context)
                    return new Error("Invalid Jwt Token!");
                }

                const learnerId = context.userId;
                const { courseId } = args;
                console.log("ooooo", learnerId, courseId);
                existingUser = await pool.query(
                    `INSERT INTO course_registration (courseregistration_id, learner_id, course_id)
                VALUES ($1, $2, $3) Returning *`, [Math.floor(Math.random() * 1000 + Math.random() * 10000), learnerId, courseId]
                );
                console.log(existingUser, '99999');
                return existingUser.rows[0];

            } catch (err) {
                console.log(err)
                throw err;
            }
        },

        courseApprove: async (_, args) => {
            try {
                const { courseId } = args;
                console.log("ooooo", courseId);
                existingUser = await pool.query(
                    `UPDATE offered_courses
                        SET is_accepted = 1
                        WHERE offeredcourses_id = $1`, [courseId]
                );

                return "Course Approved!"
            } catch (err) {
                console.log(err);
                throw err;
            }
        }
    }
}