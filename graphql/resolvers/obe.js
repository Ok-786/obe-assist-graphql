const pool = require("../../config");
const bcrypt = require("bcrypt");
const jwt = require('jsonwebtoken');
const { transformObe } = require("../helpers/transform");

exports.obeResolvers = {
    Query: {
        obe: async (_, args, context) => {
            const id = context.userId;
            console.log("aa", id)
            try {
                if (!context.isAuth)
                    return new Error("Invalid Jwt Token!");

                existingUser = await pool.query(
                    `SELECT * 
                    FROM assessment_attempts
                    JOIN assessment_activities 
                        ON assessment_attempts.assessmentactivity_id = assessment_activities.assessmentactivity_id
                    JOIN course_assessments 
                        ON assessment_attempts.course_assessment_id = course_assessments.course_assessment_id
                    JOIN offered_courses 
                        ON offered_courses.course_id = course_assessments.course_id
                    LEFT JOIN course_definition
                        ON  course_definition.course_id = course_assessments.course_id
                    JOIN resource_person 
                        ON resource_person.resource_person_id = course_assessments.resourceperson_id
                    JOIN courses
                        ON courses.course_id = offered_courses.course_id
                    
                    JOIN semester
                        ON offered_courses.semester_id = semester.semester_id
                    WHERE assessment_attempts.learner_id = $1
                    ORDER BY courses.course_title ASC;`
                    , [id]
                );
                console.log('1existingUser.rows', existingUser.rows, "pppppppppppppppp")
                return existingUser.rows.map(row => transformObe(row));

            } catch (err) {
                console.log(err.message)
                throw err;
            }
        },

        filterObeCourse: async (_, args, context) => {
            console.log('args')
            console.log(args)
            const id = context.userId;
            console.log("aa", id)
            try {
                // if (!context.isAuth)
                //     return new Error("Invalid Jwt Token!");

                existingUser = await pool.query(
                    `SELECT * 
                        FROM assessment_attempts
                        JOIN assessment_activities 
                            ON assessment_attempts.assessmentactivity_id = assessment_activities.assessmentactivity_id
                        JOIN course_assessments AS ca1
                            ON assessment_attempts.course_assessment_id = ca1.course_assessment_id
                        JOIN offered_courses 
                            ON offered_courses.course_id = ca1.course_id
                        JOIN assessments
                            ON assessments.assessment_id = ca1.assessment_id
                        LEFT JOIN course_definition
                            ON course_definition.course_id = ca1.course_id
                        JOIN resource_person 
                            ON resource_person.resource_person_id = ca1.resourceperson_id
                        JOIN courses
                            ON courses.course_id = offered_courses.course_id
                        JOIN batches
                            ON batches.batch_id = offered_courses.batch_id
                        JOIN semester
                            ON offered_courses.semester_id = semester.semester_id
                        WHERE assessment_attempts.learner_id = $1 
                        AND courses.course_title = $2;`
                    , [id, args.title]
                );
                console.log('1.2existingUser.rows', 'existingUser.rowsaaaaaaaaaaa')
                console.log(existingUser.rows)
                return existingUser.rows.map(row => transformObe(row));

            } catch (err) {
                console.log(err.message)
                throw err;
            }
        },

        filterObeSemester: async (_, args, context) => {
            console.log('args')
            console.log(args)
            const id = context.userId;
            console.log("aa", id)
            try {
                if (!context.isAuth)
                    return new Error("Invalid Jwt Token!");

                existingUser = await pool.query(
                    `SELECT * 
                    FROM assessment_attempts
                    JOIN assessment_activities 
                        ON assessment_attempts.assessmentactivity_id = assessment_activities.assessmentactivity_id
                    JOIN course_assessments 
                        ON assessment_attempts.course_assessment_id = course_assessments.course_assessment_id
                    JOIN offered_courses 
                        ON offered_courses.course_id = course_assessments.course_id
                    LEFT JOIN course_definition
                        ON  course_definition.course_id = course_assessments.course_id
                    JOIN resource_person 
                        ON resource_person.resource_person_id = course_assessments.resourceperson_id
                    JOIN course_assessments 
                        ON assessment_attempts.course_assessment_id = course_assessments.course_assessment_id
                    JOIN courses 
                        ON courses.course_id = course_assessments.course_id
                    WHERE assessment_attempts.learner_id = $1 
                    AND courses.course_title = $2;`
                    , [id, args.title]
                );
                console.log('2existingUser.rows', 'existingUser.rows4444')
                return existingUser.rows.map(row => transformObe(row));

            } catch (err) {
                console.log(err.message)
                throw err;
            }
        },

        coursesTitle: async (_, args, context) => {
            const id = context.userId;
            console.log("aa", id)
            try {
                if (!context.isAuth)
                    return new Error("Invalid Jwt Token!");

                existingUser = await pool.query(
                    `SELECT DISTINCT courses.course_title 
                    FROM assessment_attempts
                    JOIN assessment_activities 
                        ON assessment_attempts.assessmentactivity_id = assessment_activities.assessmentactivity_id
                    JOIN course_assessments 
                        ON assessment_attempts.course_assessment_id = course_assessments.course_assessment_id
                    JOIN courses 
                        ON courses.course_id = course_assessments.course_id
                    JOIN resource_person 
                        ON resource_person.resource_person_id = course_assessments.resourceperson_id
                    WHERE assessment_attempts.learner_id = $1`
                    , [id]
                );
                console.log('3existingUser.rows', 'existingUser.rows5555')
                return existingUser.rows.map(row => row.course_title);

            } catch (err) {
                console.log(err.message)
                throw err;
            }
        }

    },

}


