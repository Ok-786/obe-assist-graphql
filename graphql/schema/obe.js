
exports.obeTypeDefs = () => `
        type Obe {
            assesmentAttemptId: String
            learnerId: String
            assesmentActivityId: String
            type: String
            assessmentId: String
            courseId: String
            resourcePersonId: String
            courseTitle: String
            id: ID!
            email: String!
            password: String!
            designation: String!
            weightage: Int
            marks: Int
            category: String
            courseCode: String
            courseCredits: String
            courseRating: String
            courseDescription: String
            batchName: String
            semesterName: String
        }
        
        type Query {
            obe: [Obe!]!
            filterObeCourse(title: String): [Obe!]!
            filterObeSemester(title: String): [Obe!]!
            coursesTitle: [String!]!
        }


        schema {
            query: Query
        }
    `;