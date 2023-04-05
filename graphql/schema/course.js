
exports.courseTypeDefs = () => `
        type Course {
            offeredCoursesId: String
            batchId: String
            resourcePersonId: String
            semesterId: String
            courseId: String
            courseTitle: String
            batchName: String
            semesterName: String
            courseRegistrationId: String
            learnerId: String
            offeredCourses: String
            password: String
            id: ID
            email: String
            name: String
            designation: String
            category: String
            courseCode: String
            courseCredits: String
            courseRating: String
            courseDescription: String
            isAccepted: String
        }

        type CourseRegistration {
            courseregistration_id: String
            learner_id: String
            course_id: String
        }

        type Query {
            course(id: String!): Course!
            courses: [Course!]!
            offeredCourses: [Course!]!
            registeredCourses: [Course!]!
        }

        type Mutation {
            registerCourse(courseId: String): CourseRegistration!
            courseApprove(courseId: String): String
        }

        schema {
            query: Query
            mutation: Mutation
        }
    `;